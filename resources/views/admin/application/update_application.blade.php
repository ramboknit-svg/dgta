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
                        <li class="breadcrumb-item active">Update Application</li>
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
                            <h3 class="card-title">Update <strong>{{$application->title}}</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form class="form-horizontal" method="post" action="{{url('admin/application_update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$application->id}}"/>
                            <div class="card-body">
                              
                            <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" autocomplete ="name" id="name" name="name" value="{{$application->name}}" />
                                         @if ($errors->has('name'))
                                                <div class="alert-re csp-error-text">{{ $errors->first('name') }}</div>
                                            @endif
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link" name="link" value="{{$application->link}}"/>
                                         @if ($errors->has('link'))
                                                <div class="alert-re csp-error-text">{{ $errors->first('link') }}</div>
                                            @endif
                                    </div>
                                </div>

                             <div class="form-group row">
                                <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <input type="file" id="thumbnail" name="image" accept="image/*" >
                                    <img id="thumbnailPreview" src="{{asset($application->image)}}" class="csp-preview-thumb">
                                    @if ($errors->has('image'))
                                                <div class="alert-re csp-error-text">{{ $errors->first('image') }}</div>
                                            @endif
                                    
                                </div>
                            </div>
                                                            
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 csp-full-width" name="status" id="status">
                                            <option value="0" {{$application->status == 0  ? 'selected' : ''}}>Inactive</option>
                                            <option value="1" {{$application->status == 1  ? 'selected' : ''}}>Active</option>
                                        </select>    
                                    </div>
                                </div>
                            </div>
                            
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{url('admin/application_list')}}" class="btn btn-default float-right">Cancel</a>
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
