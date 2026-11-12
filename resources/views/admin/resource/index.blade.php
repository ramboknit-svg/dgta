@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .resource-add-btn {
        float: right;
    }

    .resource-add-icon {
        font-size: 25px;
    }

    .resource-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .resource-action-cell {
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
                        <li class="breadcrumb-item active">Manage TA RULES</li>
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

                            <h3 class="card-title">TA RULES List</h3>

                            <a
                                href="{{url('admin/add_resource_form')}}"
                                class="resource-add-btn"
                            >
                                <i class="fas fa-plus-square resource-add-icon"></i>
                            </a>

                        </div>

                        @if(session('message'))

                            <div class="alert alert-success resource-success-alert">
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

                                    @if(isset($resources) && $resources != null)

                                        @php($count=1)

                                        @foreach($resources as $resource)

                                            <tr>

                                                <td>{{ $count ++ }}</td>

                                                <td>{{ $resource->name }}</td>

                                                <td>{{ $resource->parent->name ?? '-' }}</td>

                                                </td>

                                                <td class="resource-action-cell">

                                                    <a href="{{url('admin/edit_resource/'.$resource->id)}}">
                                                        <i class="fas fa-edit"></i>&nbsp;&nbsp;
                                                    </a>

                                                    <a
                                                        href="{{url('admin/delete_resource/'.$resource->id)}}"
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