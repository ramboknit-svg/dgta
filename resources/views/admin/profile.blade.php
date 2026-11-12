@extends('admin.index')
@section('content')

<div class="wrapper">

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
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="card card-widget widget-user">
                            <a href="{{url('admin/get-profile')}}"  class="abc"><i class="fas fa-pencil"></i></a>
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">{{auth()->user()->name}}</h3>
                                <h5 class="widget-user-desc">{{auth()->user()->type == 2 ? 'Admin' : ""}}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{asset(auth()->user()->profile_image)}}">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">Email</h5>
                                            <span class="description">{{auth()->user()->email}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6 ">
                                        <div class="description-block">
                                            <h5 class="description-header">Registered Users</h5>
                                            <span class="description-text">{{$countRegisteredUsers ?? 0}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                   
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
        </section>
    </div>
</div>

<style  nonce="{{ app('cspNonce') }}">
     .abc{
     position: absolute;right: 3%;
    }
  .fas .fa-pencil{
    color:white
  }
    .fa-pencil{

        display: block;
        padding: 7px;

    }
    .fa-pencil:hover{
        background-color: #006633;
        transition: background-color 1000ms linear;
    }
</style>
@endsection

