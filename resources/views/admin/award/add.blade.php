@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* =========================================================
       AWARD ADD PAGE
       ========================================================= */

    .award-error-text {
        display: block;
        margin-top: 5px;
        color: #dc3545;
        font-size: 14px;
    }

    .award-required {
        color: #dc3545;
    }

    .award-input-error {
        border-color: #dc3545 !important;
    }

    .award-input-error:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .award-cancel-btn {
        float: right;
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
                        Add Awards
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

                        <h3 class="card-title">
                            Add Awards
                        </h3>

                    </div>


                   


                    <!-- =================================================
                         FORM
                         ================================================= -->

                    <form
                        class="form-horizontal"
                        method="post"
                        action="{{ url('admin/award_add') }}"
                        enctype="multipart/form-data"
                        autocomplete="off"
                    >

                        @csrf


                        <div class="card-body">


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
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') award-input-error @enderror"
                                        autocomplete="off"
                                        @error('name')
                                            aria-invalid="true"
                                            aria-describedby="name-error"
                                        @enderror
                                    >


                                    @error('name')

                                        <span
                                            id="name-error"
                                            class="award-error-text"
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
                                        type="number"
                                        id="appointment"
                                        name="appointment"
                                        value="{{ old('appointment') }}"
                                        class="form-control @error('appointment') award-input-error @enderror"
                                        autocomplete="off"
                                        @error('appointment')
                                            aria-invalid="true"
                                            aria-describedby="appointment-error"
                                        @enderror
                                    >


                                    @error('appointment')

                                        <span
                                            id="appointment-error"
                                            class="award-error-text"
                                        >
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                        </div>

                        <!-- /.card-body -->


                        <!-- =================================================
                             CARD FOOTER
                             ================================================= -->

                        <div class="card-footer">

                            <button
                                type="submit"
                                class="btn btn-info"
                            >
                                Add Award
                            </button>


                            <a
                                href="{{ url('admin/award_list') }}"
                                class="btn btn-default award-cancel-btn"
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
