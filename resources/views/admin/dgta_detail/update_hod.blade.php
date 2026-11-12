@extends('admin.index')


@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* Validation Error */
    .alert-re {
        color: red;
    }

    /* Image Preview */
    .dgta-image-preview {
        width: 100px;
        margin-top: 10px;
    }

    /* Status Select */
    .dgta-status-select {
        width: 100%;
    }

    /* Used when image preview needs to be hidden */
    .dgta-image-preview.is-hidden {
        display: none;
    }

</style>

@endsection



@section('content')

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
                            Update Dgta Detail
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
                            action="{{ url('admin/dgta_update') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="id"
                                value="{{ $hod->id }}"
                            />


                            <div class="card-body">



                                <!-- =========================================
                                     DESCRIPTION
                                     ========================================= -->

                                <div class="form-group row">

                                    <label
                                        for="long_description"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Description
                                    </label>


                                    <div class="col-sm-10">

                                        <textarea
                                            id="long_description"
                                            class="form-control"
                                            name="long_description"
                                            required
                                        >{!! $hod->long_description !!}</textarea>


                                        @if ($errors->has('long_description'))

                                            <div class="alert-re">
                                                {{ $errors->first('long_description') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- =========================================
                                     LEFT IMAGE
                                     ========================================= -->

                                <div class="form-group row">

                                    <label
                                        for="left_image"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Left Image
                                    </label>


                                    <div class="col-sm-10">

                                        <input
                                            type="file"
                                            id="left_image"
                                            name="left_image"
                                            accept="image/*"
                                            data-preview="leftImagePreview"
                                        >


                                        <img
                                            id="leftImagePreview"
                                            src="{{ asset($hod->left_image) }}"
                                            class="dgta-image-preview"
                                            alt="Left Image Preview"
                                        >


                                        @if ($errors->has('left_image'))

                                            <div class="alert-re">
                                                {{ $errors->first('left_image') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- =========================================
                                     RIGHT IMAGE
                                     ========================================= -->

                                <div class="form-group row">

                                    <label
                                        for="right_image"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Right Image
                                    </label>


                                    <div class="col-sm-10">

                                        <input
                                            type="file"
                                            id="right_image"
                                            name="right_image"
                                            accept="image/*"
                                            data-preview="rightImagePreview"
                                        >


                                        <img
                                            id="rightImagePreview"
                                            src="{{ asset($hod->right_image) }}"
                                            class="dgta-image-preview"
                                            alt="Right Image Preview"
                                        >


                                        @if ($errors->has('right_image'))

                                            <div class="alert-re">
                                                {{ $errors->first('right_image') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>



                                <!-- =========================================
                                     STATUS
                                     ========================================= -->

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
                                    href="{{ url('admin/dgta_list') }}"
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

    const imageInputs = document.querySelectorAll(
        'input[type="file"][data-preview]'
    );

    imageInputs.forEach(function (input) {

        input.addEventListener('change', function (event) {

            const selectedInput = event.target;

            const previewId = selectedInput.getAttribute('data-preview');

            const preview = document.getElementById(previewId);


            if (!preview) {
                return;
            }


            if (
                selectedInput.files &&
                selectedInput.files.length > 0
            ) {

                const reader = new FileReader();


                reader.onload = function (e) {

                    preview.src = e.target.result;

                    preview.classList.remove('is-hidden');

                };


                reader.readAsDataURL(
                    selectedInput.files[0]
                );

            }

        });

    });

});

</script>

@endsection