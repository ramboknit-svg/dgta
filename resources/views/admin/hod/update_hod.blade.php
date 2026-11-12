@extends('admin.index')

@section('content')

<style nonce="{{ app('cspNonce') }}">

    /* Validation Error */
    .alert-re {
        color: red;
    }

    /* Thumbnail Preview */
    .dgta-thumbnail-preview {
        width: 100px;
        margin-top: 10px;
    }

    /* Status Select */
    .dgta-status-select {
        width: 100%;
    }

    /* Hide Elements */
    .dgta-hidden {
        display: none !important;
    }

</style>






<!-- <div class="wrapper"> -->

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
                            Update DGTA
                        </li>

                    </ol>

                </div>

            </div>

        </div>

        <!-- /.container-fluid -->

    </section>



    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-1"></div>


                <div class="col-10">


                    <div class="card card-info">


                        <div class="card-header">

                            <h3 class="card-title">
                                Update <strong>{{ $hod->title }}</strong>
                            </h3>

                        </div>

                        <!-- /.card-header -->


                        <!-- form start -->

                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{ url('admin/hod_update') }}"
                            enctype="multipart/form-data"
                            autocomplete="off"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="id"
                                value="{{ $hod->id }}"
                            >


                            <div class="card-body">

                              <!-- Rank -->

                                <div class="form-group row">

                                    <label
                                        for="user_id"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Rank
                                    </label>


                                    <div class="col-sm-10">

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="user_id"
                                            name="user_id"
                                            value="{{ $hod->user_id }}"
                                            autocomplete="off"
                                            disabled
                                        >


                                        @if ($errors->has('user_id'))

                                            <div class="alert-re">
                                                {{ $errors->first('user_id') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- Name -->

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
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{ $hod->name }}"
                                            autocomplete="off"
                                        >


                                        @if ($errors->has('name'))

                                            <div class="alert-re">
                                                {{ $errors->first('name') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- Designation -->

                                <div class="form-group row">

                                    <label
                                        for="designation"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Designation
                                    </label>


                                    <div class="col-sm-10">

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="designation"
                                            name="designation"
                                            value="{{ $hod->designation }}"
                                            autocomplete="off"
                                        >


                                        @if ($errors->has('designation'))

                                            <div class="alert-re">
                                                {{ $errors->first('designation') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- Description -->

                                <div class="form-group row">

                                    <label
                                        for="description"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Description
                                    </label>


                                    <div class="col-sm-10">

                                        <textarea
                                            class="form-control"
                                            id="description"
                                            name="description"
                                            autocomplete="off"
                                            required
                                        >{!! $hod->description !!}</textarea>


                                        @if ($errors->has('description'))

                                            <div class="alert-re">
                                                {{ $errors->first('description') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- Thumbnail -->

                                <div class="form-group row">

                                    <label
                                        for="thumbnail"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Thumbnail
                                    </label>


                                    <div class="col-sm-10">

                                        <input
                                            type="file"
                                            id="thumbnail"
                                            name="image"
                                            accept="image/*"
                                        >


                                        <img
                                            id="thumbnailPreview"
                                            src="{{ asset($hod->image) }}"
                                            class="dgta-thumbnail-preview"
                                            alt="DGTA Thumbnail Preview"
                                        >


                                        @if ($errors->has('image'))

                                            <div class="alert-re">
                                                {{ $errors->first('image') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- Status -->

                                <div class="form-group row">

                                    <label
                                        for="status"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Status
                                    </label>


                                    <div class="col-sm-10">

                                        <select
                                            class="form-control select2 dgta-status-select"
                                            name="status"
                                            id="status"
                                            autocomplete="off"
                                        >

                                            <option
                                                value="0"
                                                {{ $hod->status == 0 ? 'selected' : '' }}
                                            >
                                                Inactive
                                            </option>


                                            <option
                                                value="1"
                                                {{ $hod->status == 1 ? 'selected' : '' }}
                                            >
                                                Active
                                            </option>

                                        </select>

                                    </div>

                                </div>


                            </div>

                            <!-- /.card-body -->



                            <div class="card-footer">

                                <button
                                    type="submit"
                                    class="btn btn-info"
                                >
                                    Update
                                </button>


                                <a
                                    href="{{ url('admin/hod_list') }}"
                                    class="btn btn-default float-right"
                                >
                                    Cancel
                                </a>

                            </div>

                            <!-- /.card-footer -->


                        </form>


                    </div>


                </div>


                <div class="col-1"></div>


            </div>

        </div>

    </section>


</div>

<!-- </div> -->

@endsection



@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('thumbnail');
    const preview = document.getElementById('thumbnailPreview');


    if (!input || !preview) {
        return;
    }


    input.addEventListener('change', function (event) {

        const fileInput = event.target;


        if (
            fileInput.files &&
            fileInput.files.length > 0
        ) {

            const reader = new FileReader();


            reader.onload = function (e) {

                preview.src = e.target.result;
                preview.classList.remove('dgta-hidden');

            };


            reader.readAsDataURL(fileInput.files[0]);

        } else {

            preview.removeAttribute('src');
            preview.classList.add('dgta-hidden');

        }

    });

});

</script>

@endsection

