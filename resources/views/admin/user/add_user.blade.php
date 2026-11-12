@extends('admin.index')

@section('after-style')
<style nonce="{{ app('cspNonce') }}">
   
.add-user-select {
    width: 100%;
}
</style>
@endsection

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Add User</li>
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
                            <h3 class="card-title">Add User</h3>
                        </div>

                        @include('admin.partials.messages')

                        <form class="form-horizontal"
                              method="post"
                              action="{{ url('admin/add-user') }}"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <!-- Reporting Users -->
                                <div class="form-group row">

                                    <label for="type" class="col-sm-2 col-form-label">
                                        Reporting Users
                                    </label>

                                    <div class="col-sm-10">

                                        <select class="form-control select2 add-user-select"
                                                name="reporting"
                                                id="type">

                                            @if(isset($users) && $users != null)

                                                @foreach($users as $user)

                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}
                                                    </option>

                                                @endforeach

                                            @endif

                                        </select>

                                    </div>

                                </div>


                                <!-- Name -->
                                <div class="form-group row">

                                    <label for="name" class="col-sm-2 col-form-label">
                                        Name
                                    </label>

                                    <div class="col-sm-10">

                                        <input type="text"
                                               class="form-control"
                                               id="name"
                                               name="name"
                                               value="{{ old('name') }}"
                                               placeholder="Name"
                                               required />

                                    </div>

                                </div>


                                <!-- Designation -->
                                <div class="form-group row">

                                    <label for="mobile" class="col-sm-2 col-form-label">
                                        Designation
                                    </label>

                                    <div class="col-sm-10">

                                        <input type="text"
                                               class="form-control"
                                               id="mobile"
                                               name="designation"
                                               value="{{ old('designation') }}"
                                               placeholder="Designation"
                                               required />

                                    </div>

                                </div>


                                <!-- Status -->
                                <div class="form-group row">

                                    <label for="status" class="col-sm-2 col-form-label">
                                        Status
                                    </label>

                                    <div class="col-sm-10">

                                        <select class="form-control select2 add-user-select"
                                                id="status"
                                                name="status"
                                                required>

                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>

                                        </select>

                                    </div>

                                </div>


                                <!-- Profile Image -->
                                <div class="form-group row">

                                    <label for="profile_image" class="col-sm-2 col-form-label">
                                        Profile Image
                                    </label>

                                    <div class="col-sm-10">

                                        <input type="file"
                                               id="profile_image"
                                               name="profile_image"
                                               accept="image/*">

                                    </div>

                                </div>

                            </div>


                            <!-- Footer -->
                            <div class="card-footer">

                                <button type="submit" class="btn btn-info">
                                    Add User
                                </button>

                                <a href="{{ url('admin/users-list') }}"
                                   class="btn btn-default custom-btn">
                                    Cancel
                                </a>

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