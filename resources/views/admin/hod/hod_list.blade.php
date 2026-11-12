@extends('admin.index')


@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* Success Message */
    .dgta-success-message {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    /* DGTA Thumbnail */
    .dgta-thumbnail {
        width: 50px;
        height: 50px;
    }

    /* Action Column */
    .dgta-action {
        text-align: center;
    }

    /* Add Button - Existing Design */
    .dgta-add-button {
        float: right;
    }

    .dgta-add-icon {
        font-size: 25px;
    }

</style>

@endsection



@section('content')

<div class="content-wrapper">


    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                </div>


                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Manage DGTA
                        </li>

                    </ol>

                </div>

            </div>

        </div>

        <!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">


                    <div class="card">


                        <div class="card-header">

                            <h3 class="card-title">
                                DGTA List
                            </h3>


                            <!--
                            <a
                                href="{{ url('admin/hod_add') }}"
                                class="dgta-add-button"
                            >
                                <i class="fas fa-plus-square dgta-add-icon"></i>
                            </a>
                            -->

                        </div>



                        @if(session('message'))

                            <div class="alert alert-success dgta-success-message">
                                {{ session('message') }}
                            </div>

                        @endif


                        <!-- /.card-header -->


                        <div class="card-body">

                            <table
                                id="hod-list"
                                class="table table-bordered table-striped"
                            >

                                <thead>

                                    <tr>

                                        <th>S No</th>
                                         <th>Rank</th>
                                        <th>Name</th>

                                        <th>Designation</th>

                                        <th>Description</th>

                                        <th>Thumbnail</th>

                                        <th data-orderable="false">
                                            Status
                                        </th>

                                        <th data-orderable="false">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @if(isset($hods) && $hods != null)

                                        @php($count = 1)

                                        @foreach($hods as $hod)

                                            <tr>

                                                <td>
                                                    {{ $count++ }}
                                                </td>
                                                <td>
                                                    {{ $hod->user_id }}
                                                </td>

                                                <td>
                                                    {{ $hod->name }}
                                                </td>


                                                <td>
                                                    {{ $hod->designation }}
                                                </td>


                                                <td>
                                                    {!! $hod->description !!}
                                                </td>


                                                <td>

                                                    <img
                                                        src="{{ asset($hod->image) }}"
                                                        class="dgta-thumbnail"
                                                        alt="DGTA Thumbnail"
                                                    >

                                                </td>


                                                <td class="status">

                                                    {{ isset($hod->status) && $hod->status == 1 ? 'Active' : 'In-active' }}

                                                </td>


                                                <td class="dgta-action">

                                                    <a href="{{ url('admin/hod_edit/'.$hod->id) }}">

                                                        <i class="fas fa-edit"></i>

                                                        &nbsp;&nbsp;

                                                    </a>

                                                </td>

                                            </tr>

                                        @endforeach

                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <!-- /.card-body -->


                    </div>

                    <!-- /.card -->


                </div>

                <!-- /.col -->

            </div>

            <!-- /.row -->

        </div>

        <!-- /.container-fluid -->

    </section>

    <!-- /.content -->


</div>

@endsection