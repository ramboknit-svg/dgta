@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .gate-add-btn {
        float: right;
    }

    .gate-add-icon {
        font-size: 25px;
    }

    .gate-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .gate-action-cell {
        text-align: center;
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
                            <a href="{{url('admin/dashboard')}}">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Manage TAC/RECT
                        </li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">
                                TAC/RECT List
                            </h3>

                            <a
                                href="{{url('admin/add_gate_form')}}"
                                class="gate-add-btn"
                            >
                                <i class="fas fa-plus-square gate-add-icon"></i>
                            </a>

                        </div>


                        @if(session('message'))

                            <div class="alert alert-success gate-success-alert">
                                {{ session('message') }}
                            </div>

                        @endif


                        <!-- /.card-header -->
                        <div class="card-body">

                            <table
                                id="user-list"
                                class="table table-bordered table-striped"
                            >

                                <thead>

                                    <tr>

                                        <th>ID</th>

                                        <th>Name</th>

                                        <th>Parent</th>

                                        <th>Actions</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @if(isset($gates) && $gates != null)

                                        @php($count=1)

                                        @foreach($gates as $gate)

                                            <tr>

                                                <td>
                                                    {{ $count ++ }}
                                                </td>

                                                <td>
                                                    {{ $gate->name }}
                                                </td>

                                                <td>
                                                    {{ $gate->parent->name ?? '-' }}
                                                </td>

                                                <td class="gate-action-cell">

                                                    <a href="{{url('admin/edit_gate/'.$gate->id)}}">

                                                        <i class="fas fa-edit"></i>&nbsp;&nbsp;

                                                    </a>

                                                    <a
                                                        href="{{url('admin/delete_gate/'.$gate->id)}}"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                    >

                                                        <i class="fas fa-trash"></i>

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


@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

    $(function () {

        $("#user-list").DataTable({

            "responsive": true,

            "autoWidth": false,

            "ordering": false,

        });

    });

</script>

@endsection