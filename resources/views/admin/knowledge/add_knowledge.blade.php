@extends('admin.index')

@section('content')
<style nonce="{{ app('cspNonce') }}">

.csp-error-text { color: red; }
.csp-full-width { width: 100%; }
.csp-preview-thumb { width: 100px; margin-top: 10px; }
.csp-preview-large { margin-top: 10px; max-width: 200px; }
.csp-hidden { display: none !important; }

</style>


<!-- <div class="wrapper"> -->

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                     
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add Knowledge</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Knowledge</strong></h3>
                            </div>
                           
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="{{url('admin/knowledge_add')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">                                
                                
                                 <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="link" placeholder ="Link" required="">                                        
                                    </div>
                                </div>
                                
                               <div class="form-group row">
                                    <label for="Thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="thumbnail" name="image" accept="image/*" >
                                        <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" class="csp-preview-large csp-hidden">
                                         @if ($errors->has('image'))
                                                <div class="alert-re csp-error-text">{{ $errors->first('image') }}</div>
                                            @endif  
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 csp-full-width" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                            
                                        </select>    
                                    </div>
                                </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                <button type="submit" class="btn btn-info">Add</button>
                                <a href="{{url('admin/knowledge_list')}}" class="btn btn-default float-right">Cancel</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                            </div>

                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </section>

    </div>

<!-- </div> -->
@endsection
@section('after-scripts')
<script nonce="{{ app('cspNonce') }}">
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('thumbnail');
    const preview = document.getElementById('thumbnailPreview');
    if (!input || !preview) return;

    input.addEventListener('change', function(event) {
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('csp-hidden');
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('csp-hidden');
        }
    });
});
</script>
@endsection
