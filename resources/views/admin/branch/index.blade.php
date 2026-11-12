@extends('admin.index')

@section('after-style')



<style nonce="{{ app('cspNonce') }}">

    /* =========================================================
       BULLET SUB CATEGORY
       ========================================================= */

    ul.bullet-subcategory li::marker {
        content: "➢" !important;
        font-size: 17px !important;
        font-weight: normal !important;
    }


    /* =========================================================
       ADD BUTTON
       ========================================================= */

    .branch-add-btn {
        float: right;
    }

    .branch-add-btn i {
        font-size: 25px;
    }


    /* =========================================================
       SUCCESS MESSAGE
       ========================================================= */

    .branch-success-message {
        padding: 5px 20px;
        margin-bottom: 5px;
    }


    /* =========================================================
       BRANCH IMAGE
       ========================================================= */

    .branch-list-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }


    /* =========================================================
       ACTION COLUMN
       ========================================================= */

    .branch-action {
        text-align: center;
        white-space: nowrap;
    }

    .branch-action a {
        display: inline-block;
        margin: 0 5px;
    }


    /* =========================================================
       DATATABLE
       ========================================================= */

    #hod-list {
        width: 100% !important;
    }

    #hod-list thead th {
        vertical-align: middle;
    }

    #hod-list tbody td {
        vertical-align: middle;
    }


    /* DataTables Search */

    div.dt-container .dt-search {
        margin-bottom: 10px;
    }

    div.dt-container .dt-search input {
        margin-left: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 5px 10px;
        outline: none;
    }


    /* DataTables Length Dropdown */

    div.dt-container .dt-length select {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 4px 8px;
        margin: 0 5px;
    }


    /* DataTables Paging */

    div.dt-container .dt-paging {
        margin-top: 10px;
    }


    /* Keep table properly inside card */

    .branch-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

</style>

@endsection


@section('content')

<div class="content-wrapper">

    <!-- =========================================================
         CONTENT HEADER
         ========================================================= -->

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
                            Manage Branch
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         MAIN CONTENT
         ========================================================= -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">


                        <!-- =================================================
                             CARD HEADER
                             ================================================= -->

                        <div class="card-header">

                            <h3 class="card-title">
                                Branch List
                            </h3>

<!-- 
                            <a
                                href="{{ url('admin/branch_add') }}"
                                class="branch-add-btn"
                                title="Add Branch"
                            >
                                <i class="fas fa-plus-square"></i>
                            </a> -->

                        </div>


                        <!-- =================================================
                             SUCCESS MESSAGE
                             ================================================= -->

                        @if(session('message'))

                            <div class="alert alert-success branch-success-message">
                                {{ session('message') }}
                            </div>

                        @endif


                        <!-- =================================================
                             CARD BODY
                             ================================================= -->

                        <div class="card-body">

                            <div class="branch-table-wrapper">

                                <table
                                    id="hod-list"
                                    class="table table-bordered table-striped"
                                >

                                    <thead>

                                        <tr>

                                            <th>S No</th>

                                            <th>Name</th>

                                            <th>Role</th>

                                            <th>Duty</th>

                                            <th>Head</th>

                                            <th>Image</th>

                                            <th>Designation</th>

                                            <th>Action</th>

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
                                                        {{ $hod->name }}
                                                    </td>


                                                    <td>
                                                        {!! $hod->role !!}
                                                    </td>


                                                    <td>
                                                        {!! $hod->duty !!}
                                                    </td>


                                                    <td>
                                                        {{ $hod->head_name }}
                                                    </td>


                                                    <td>

                                                        <img
                                                            src="{{ asset($hod->image) }}"
                                                            class="branch-list-image"
                                                            alt="Branch Image"
                                                        >

                                                    </td>


                                                    <td>
                                                        {{ $hod->designation }}
                                                    </td>


                                                    <td class="branch-action">

                                                        <!-- Edit -->

                                                        <a
                                                            href="{{ url('admin/branch_edit/'.$hod->id) }}"
                                                            title="Edit"
                                                        >
                                                            <i class="fas fa-edit"></i>
                                                        </a>


                                                        <!-- Delete -->

                                                        <a
                                                            href="{{ url('admin/branch_delete/'.$hod->id) }}"
                                                            class="branch-delete-btn"
                                                            title="Delete"
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

{{-- =========================================================
     IMPORTANT
     jQuery is already loaded from admin.index.
     DO NOT load jQuery again here.
     ========================================================= --}}



<script nonce="{{ app('cspNonce') }}">

 $(function () {
        $("#hod-list").DataTable({
            responsive: true,
            autoWidth: false,
            ordering: false
        });
    });
</script>

@endsection