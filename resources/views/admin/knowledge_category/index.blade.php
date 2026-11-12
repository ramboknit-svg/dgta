@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .knowledge-card {
        background-color: #E6FBFF;
    }

    .knowledge-add-btn {
        float: right;
    }

    .knowledge-add-icon {
        font-size: 25px;
    }

    .knowledge-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .knowledge-action-cell {
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
                            <a href="{{ url('admin/dashboard') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Manage UNIT
                        </li>

                    </ol>

                </div>

            </div>

        </div>
    </section>


    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card knowledge-card">

                        <div class="card-header">

                            <h3 class="card-title">
                                UNIT List
                            </h3>

                            <a
                                href="{{ url('admin/add_knowledge_category_form') }}"
                                class="knowledge-add-btn"
                            >
                                <i class="fas fa-plus-square knowledge-add-icon"></i>
                            </a>

                        </div>


                        @if(session('message'))

                            <div class="alert alert-success knowledge-success-alert">
                                {{ session('message') }}
                            </div>

                        @endif


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

                                        <th>Description</th>

                                        <th>Actions</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @if(isset($categories) && $categories != null)

                                        @php($count = 1)

                                        @foreach($categories as $category)

                                            <tr>

                                                <td>
                                                    {{ $count++ }}
                                                </td>

                                                <td>
                                                    {{ $category->name }}
                                                </td>

                                                <td>
                                                    {{ $category->parent->name ?? '-' }}
                                                </td>

                                                <td>
                                                    {{ $category->description }}
                                                </td>

                                                <td class="knowledge-action-cell">

                                                    <a
                                                        href="{{ url('admin/edit_knowledge_category/'.$category->id) }}"
                                                    >
                                                        <i class="fas fa-edit"></i>
                                                        &nbsp;&nbsp;
                                                    </a>

                                                    <a
                                                        href="{{ url('admin/delete_knowledge_category/'.$category->id) }}"
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

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection


@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

    $(function () {

        $("#user-list").DataTable({

            responsive: true,

            autoWidth: false,

            ordering: false

        });

    });

</script>

@endsection