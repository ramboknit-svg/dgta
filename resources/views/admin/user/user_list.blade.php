@extends('admin.index')

@section('after-style')
<style nonce="{{ app('cspNonce') }}">
    /* ==========================================
   ADMIN MANAGE USERS PAGE
========================================== */


/* Add user button */

.user-add-btn {
    float: right;
}

.user-add-btn i {
    font-size: 25px;
}


/* Success message */

.user-success-message {
    padding: 5px 20px;
    margin-bottom: 5px;
}


/* User profile image */

.user-profile-image {
    height: 50px;
    width: 50px;
}


/* User status cell */

.user-status-cell {
    text-align: center;
}


/* Active status */

.user-status-active {
    color: green;
}


/* Inactive status */

.user-status-inactive {
    color: red;
}


/* Action cell */

.user-action-cell {
    text-align: center;
}


/* Edit button */

.user-edit-btn {
    margin-right: 12px;
}


/* Delete button */

.user-delete-btn {
    cursor: pointer;
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
                            <a href="{{ url('admin/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Manage Users</li>
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

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">Users List</h3>

                            <a href="{{ url('admin/add-user-form') }}"
                               class="user-add-btn">

                                <i class="fas fa-plus-square"></i>

                            </a>

                        </div>

                        @if(session('message'))

                            <div class="alert alert-success user-success-message">
                                {{ session('message') }}
                            </div>

                        @endif

                        <div class="card-body">

                            <table id="user-list"
                                   class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Reporting Name</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Image</th>
                                        <th data-orderable="false">Status</th>
                                        <th data-orderable="false">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if(isset($users) && $users != null)

                                        @php($count = 1)

                                        @foreach($users as $user)

                                            <tr>

                                                <td>{{ $count++ }}</td>

                                                <td>
                                                    {{ $user->reportingManager->name ?? 'N/A' }}
                                                </td>

                                                <td>{{ $user->name }}</td>

                                                <td>{{ $user->designation }}</td>

                                                <td>

                                                    <img
                                                        src="{{ asset($user->profile_image) }}"
                                                        class="user-profile-image"
                                                        alt="User Image"
                                                    />

                                                </td>

                                                <td class="user-status-cell">

                                                    @if($user->status == 1)

                                                        <p class="user-status-active">
                                                            Active
                                                        </p>

                                                    @elseif($user->status == 0)

                                                        <p class="user-status-inactive">
                                                            In-active
                                                        </p>

                                                    @endif

                                                </td>

                                                <td class="user-action-cell">

                                                    <a href="{{ url('admin/edit-user/'.$user->id) }}"
                                                       class="user-edit-btn">

                                                        <i class="fas fa-edit"></i>

                                                    </a>

                                                    <a href="{{ url('admin/delete-user/'.$user->id) }}"
                                                       class="user-delete-btn">

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

        // Initialize DataTable
        $("#user-list").DataTable({
            responsive: true,
            autoWidth: false,
            ordering: false
        });


        // CSP Compatible Delete Confirmation
        $(document).on("click", ".user-delete-btn", function (event) {

            var confirmDelete = confirm(
                "Are you sure you want to delete?"
            );

            if (!confirmDelete) {
                event.preventDefault();
            }

        });

    });

</script>

@endsection