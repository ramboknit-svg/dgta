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
                        <li class="breadcrumb-item active">Upload TelDir CSV</li>
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
                            <h3 class="card-title">Upload TelDir CSV</strong></h3>
                        </div>
                        @include('admin.partials.messages')
                        <form class="form-horizontal" method="post" action="{{url('admin/teldir-upload')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Thumbnail" class="col-sm-2 col-form-label">Csv File</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="csv_file" accept=".csv" required>
                                        <p class="help-block" style="margin-top:8px;">
                                            <a href="{{ asset('/public/files/teldir_sample.csv') }}" download>Download sample CSV</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Upload CSV</button>
                                <a href="{{url('admin/teldir_list')}}" class="btn btn-default custom-btn">Cancel</a>
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
