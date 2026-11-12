@extends('admin.index')

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
                            <li class="breadcrumb-item active">Add HOD</li>
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
                                <h3 class="card-title">Add HOD</strong></h3>
                            </div>
                           
            
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="{{url('admin/hod_add')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder ="Name" > 
                                         @if ($errors->has('name'))
                                                <div class="alert-re" style="color: red">{{ $errors->first('name') }}</div>
                                            @endif                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder ="Designation" > 
                                         @if ($errors->has('designation'))
                                                <div class="alert-re" style="color: red">{{ $errors->first('designation') }}</div>
                                            @endif                                       
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="summernote" name="description" required></textarea>                                        
                                    </div>
                                </div>
                                
                               <div class="form-group row">
                                    <label for="Thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="thumbnail" name="image" accept="image/*" >
                                        <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" style="display: none; margin-top: 10px; max-width: 200px;">
                                         @if ($errors->has('image'))
                                                <div class="alert-re" style="color: red">{{ $errors->first('image') }}</div>
                                            @endif  
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" style="width: 100%;" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                            
                                        </select>    
                                    </div>
                                </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                <button type="submit" class="btn btn-info">Add HOD</button>
                                <a href="{{url('admin/hod_list')}}" class="btn btn-default float-right">Cancel</a>
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
<script>
document.getElementById('thumbnail').addEventListener('change', function(event) {
    const input = event.target;
    const preview = document.getElementById('thumbnailPreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>
@endsection
