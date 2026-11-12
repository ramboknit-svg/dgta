@extends('admin.index')
<style nonce="{{ app('cspNonce') }}">
    .abc{
         width:150px;
    }
   
</style>
@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--<h1>DataTables</h1>--}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>

                    @include('admin.partials.messages')
                    <form class="form-horizontal" action="{{url('admin/update-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{auth()->id()}}" />
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$user->name}}" oninput="validateInput(this)" required />
                                </div>
                            </div>
                            <script nonce="{{ app('cspNonce') }}">
                             function validateInput(input) {
                             // Replace any character that is not a letter with an empty string
                           input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
                               }
                         </script>

                            <div class="form-group row">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{$user->email}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ProfileImage" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="" id="profile_image" name="profile_image">
                                    <img src="{{asset($user->profile_image)}}" class="abc"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update Profile</button>
                            <a href="{{url('admin/profile')}}" class="btn btn-default custom-btn">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
            <div class="col-2"></div>

        </div>

    </section>


    @endsection