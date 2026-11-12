@extends('admin.index')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update Award</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Update Award</strong></h3>
                        </div>
                        @include('admin.partials.messages')
                        <form class="form-horizontal" method="post" action="{{url('admin/update_award')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}" />
                            <div class="card-body">

                               
                                <div class="form-group row">
                                    <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"
                   value="{{ $item->name }}"
                   class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Name" class="col-sm-2 col-form-label">Appointment</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="appointment"
                   value="{{ $item->appointment }}"
                   class="form-control">
                                    </div>
                                </div>


                            

                               

                              
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{url('admin/award_list')}}" class="btn btn-default custom-btn">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>

</div>

@endsection
