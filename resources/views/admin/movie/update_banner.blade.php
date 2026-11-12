@extends('admin.index')



@section('after-style')

<style nonce="{{ app('cspNonce') }}">
    .csp-add-link {
        float: right;
    }

    .csp-add-link-icon {
        font-size: 25px;
    }

    .csp-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .csp-thumb-img {
        width: 100px;
    }

    .csp-pdf-icon {
        width: 60px;
    }

    .csp-text-center {
        text-align: center;
    }

    .csp-error-text {
        color: red;
    }

    .csp-w-100 {
        width: 100%;
    }

    .csp-preview-img-sm {
        width: 100px;
        margin-top: 10px;
    }

    .csp-preview-img-lg {
        max-width: 200px;
        margin-top: 10px;
    }
</style>

@endsection

@section('content')

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
                        <li class="breadcrumb-item active">Update Avtar</li>
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
                            <h3 class="card-title">Update <strong>{{$banner->title}}</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form class="form-horizontal" method="post" action="{{url('admin/movie_update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$banner->id}}"/>
                            <div class="card-body">
                              

                                <div class="form-group row">
                                    <label for="day" class="col-sm-2 col-form-label">Day</label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" id="day" name="day" value="{{$banner->name}}" >
				 
				 
				 @foreach($days as $day)
				 <option value="{{$day->id}}">{{$day->day}}</option>
				 @endforeach
				 
                                   </select>     
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" autocomplete ="name" id="name" name="name" value="{{$banner->name}}" />
                                         @if ($errors->has('name'))
                                                <div class="alert-re csp-error-text">{{ $errors->first('name') }}</div>
                                            @endif
                                    </div>
                                </div>
                                
                              
                                     
                             <div class="form-group row">
                                <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <input type="file" id="thumbnail" name="image" accept="image/*" >
                                    <img id="thumbnailPreview" src="{{asset($banner->image)}}" class="csp-preview-img-sm">
                                    @if ($errors->has('image'))
                                                <div class="alert-re csp-error-text">{{ $errors->first('image') }}</div>
                                            @endif
                                    
                                </div>
                            </div>
                                                            
                               
                            </div>
                            
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{url('admin/movie_list')}}" class="btn btn-default float-right">Cancel</a>
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

    if (!input || !preview) {
        return;
    }

    input.addEventListener('change', function (event) {
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.hidden = false;
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.src = '';
            preview.hidden = true;
        }
    });
});
</script>
@endsection
