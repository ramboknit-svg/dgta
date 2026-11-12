@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* =========================================================
       TEL DIRECTORY EDIT PAGE
       ========================================================= */

    .teldir-error-text {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }

    .teldir-required {
        color: #dc3545;
    }

    .teldir-input-error {
        border-color: #dc3545 !important;
    }

    .teldir-input-error:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .teldir-card-title {
        margin-bottom: 0;
    }

    .teldir-cancel-btn {
        float: right;
    }

</style>

@endsection

@section('content')

<div class="content-wrapper">

```
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
                        Update TelDir
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

            <div class="col-1"></div>


            <div class="col-10">

                <div class="card card-info">


                    <!-- =================================================
                         CARD HEADER
                         ================================================= -->

                    <div class="card-header">

                        <h3 class="card-title teldir-card-title">
                            Update TelDir
                        </h3>

                    </div>


                    


                    <!-- =================================================
                         FORM
                         ================================================= -->

                    <form
                        class="form-horizontal"
                        method="post"
                        action="{{ url('admin/update_teldir') }}"
                        enctype="multipart/form-data"
                        autocomplete="off"
                    >

                        @csrf


                        <input
                            type="hidden"
                            name="id"
                            value="{{ $item->id }}"
                        >


                        <div class="card-body">


                            <!-- =================================================
                                 RANK
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="rank"
                                    class="col-sm-2 col-form-label"
                                >
                                    Rank
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="text"
                                        id="rank"
                                        name="rank"
                                        value="{{ old('rank', $item->rank) }}"
                                        class="form-control @error('rank') teldir-input-error @enderror"
                                        autocomplete="off"
                                        aria-describedby="rank-error"
                                        @error('rank') aria-invalid="true" @enderror
                                    >


                                    @error('rank')

                                        <span
                                            id="rank-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            <!-- =================================================
                                 NAME
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="name"
                                    class="col-sm-2 col-form-label"
                                >
                                    Name
                                    
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $item->name) }}"
                                        class="form-control @error('name') teldir-input-error @enderror"
                                        autocomplete="name"
                                       
                                        aria-describedby="name-error"
                                        @error('name') aria-invalid="true" @enderror
                                    >


                                    @error('name')

                                        <span
                                            id="name-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            <!-- =================================================
                                 APPOINTMENT
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="appointment"
                                    class="col-sm-2 col-form-label"
                                >
                                    Appointment
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="text"
                                        id="appointment"
                                        name="appointment"
                                        value="{{ old('appointment', $item->appointment) }}"
                                        class="form-control @error('appointment') teldir-input-error @enderror"
                                        autocomplete="organization-title"
                                        aria-describedby="appointment-error"
                                        @error('appointment') aria-invalid="true" @enderror
                                    >


                                    @error('appointment')

                                        <span
                                            id="appointment-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            <!-- =================================================
                                 BR
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="br"
                                    class="col-sm-2 col-form-label"
                                >
                                    BR
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="text"
                                        id="br"
                                        name="br"
                                        value="{{ old('br', $item->br) }}"
                                        class="form-control @error('br') teldir-input-error @enderror"
                                        autocomplete="off"
                                        aria-describedby="br-error"
                                        @error('br') aria-invalid="true" @enderror
                                    >


                                    @error('br')

                                        <span
                                            id="br-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>





                            <!-- =================================================
                                 NFS
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="nfs"
                                    class="col-sm-2 col-form-label"
                                >
                                    NFS
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="number"
                                        id="nfs"
                                        name="nfs"
                                        value="{{ old('nfs', $item->nfs) }}"
                                        class="form-control @error('nfs') teldir-input-error @enderror"
                                        autocomplete="off"
                                        aria-describedby="nfs-error"
                                        @error('nfs') aria-invalid="true" @enderror
                                    >


                                    @error('nfs')

                                        <span
                                            id="nfs-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            <!-- =================================================
                                 INTERCOM
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="intercom"
                                    class="col-sm-2 col-form-label"
                                >
                                    Intercom
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="number"
                                        id="intercom"
                                        name="intercom"
                                        value="{{ old('intercom', $item->intercom) }}"
                                        class="form-control @error('intercom') teldir-input-error @enderror"
                                        autocomplete="off"
                                        aria-describedby="intercom-error"
                                        @error('intercom') aria-invalid="true" @enderror
                                    >


                                    @error('intercom')

                                        <span
                                            id="intercom-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>

                            <!-- =================================================
                                 TOS
                                 ================================================= -->

                            <div class="form-group row">

                                <label
                                    for="tos"
                                    class="col-sm-2 col-form-label"
                                >
                                    Civil Telephone No
                                </label>


                                <div class="col-sm-10">

                                    <input
                                        type="number"
                                        id="tos"
                                        name="tos"
                                        value="{{ old('tos', $item->tos) }}"
                                        class="form-control @error('tos') teldir-input-error @enderror"
                                        autocomplete="off"
                                        aria-describedby="tos-error"
                                        @error('tos') aria-invalid="true" @enderror
                                    >


                                    @error('tos')

                                        <span
                                            id="tos-error"
                                            class="teldir-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                        </div>

                        <!-- /.card-body -->


                        <!-- =================================================
                             FOOTER
                             ================================================= -->

                        <div class="card-footer">

                            <button
                                type="submit"
                                class="btn btn-info"
                            >
                                Update
                            </button>


                            <a
                                href="{{ url('admin/teldir_list') }}"
                                class="btn btn-default teldir-cancel-btn"
                            >
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
