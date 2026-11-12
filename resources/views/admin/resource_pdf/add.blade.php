@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    #sub_resource_div,
    #sub_sub_resource_div,
    #sub_sub_sub_resource_div {
        display: none;
    }

    .validation-error {
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }

    .resource-file-input {
        width: 100%;
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
                            Add TA RULES
                        </li>

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

                            <h3 class="card-title">
                                Add TA RULES Pdf
                            </h3>

                        </div>


                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{ url('admin/add_resource_pdf') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="card-body">


                                <!-- Resource -->
                                <div class="form-group row">

                                    <label
                                        for="section"
                                        class="col-sm-2 col-form-label"
                                    >
                                        TA RULES
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="section"
                                            name="resource_id"
                                        >

                                           

                                            @if(isset($sections) && $sections != null)

                                                @foreach($sections as $section)

                                                    <option
                                                        value="{{ $section->id }}"
                                                        {{ old('resource_id') == $section->id ? 'selected' : '' }}
                                                    >
                                                        {{ $section->name }}
                                                    </option>

                                                @endforeach

                                            @endif

                                        </select>


                                        @if ($errors->has('resource_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('resource_id') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- Sub Resource -->
                                <div
                                    class="form-group row"
                                    id="sub_resource_div"
                                >

                                    <label
                                        for="sub_resource"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Resource
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_resource"
                                            name="sub_resource_id"
                                            data-old="{{ old('sub_resource_id') }}"
                                        >

                                            <option value="">
                                                Select Sub Resource
                                            </option>

                                        </select>


                                        @if ($errors->has('sub_resource_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('sub_resource_id') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- Sub Sub Resource -->
                                <div
                                    class="form-group row"
                                    id="sub_sub_resource_div"
                                >

                                    <label
                                        for="sub_sub_resource"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Sub Resource
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_sub_resource"
                                            name="sub_sub_resource_id"
                                            data-old="{{ old('sub_sub_resource_id') }}"
                                        >

                                            <option value="">
                                                Select Sub Sub Resource
                                            </option>

                                        </select>


                                        @if ($errors->has('sub_sub_resource_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('sub_sub_resource_id') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- Sub Sub Sub Resource -->
                                <div
                                    class="form-group row"
                                    id="sub_sub_sub_resource_div"
                                >

                                    <label
                                        for="sub_sub_sub_resource"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Sub Sub Resource
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_sub_sub_resource"
                                            name="sub_sub_sub_resource_id"
                                            data-old="{{ old('sub_sub_sub_resource_id') }}"
                                        >

                                            <option value="">
                                                Select Sub Sub Sub Resource
                                            </option>

                                        </select>


                                        @if ($errors->has('sub_sub_sub_resource_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('sub_sub_sub_resource_id') }}
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
                                            value="{{ old('name') }}"
                                            placeholder="Name"
                                            autocomplete="off"
                                            
                                        >


                                        @if ($errors->has('name'))

                                            <div class="validation-error">
                                                {{ $errors->first('name') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- PDF -->
                                <div class="form-group row">

                                    <label
                                        for="link"
                                        class="col-sm-2 col-form-label"
                                    >
                                        PDF
                                    </label>

                                    <div class="col-sm-10">

                                        <input
                                            type="file"
                                            id="link"
                                            name="link"
                                            class="resource-file-input"
                                            accept=".pdf,application/pdf"
                                           
                                        >


                                        @if ($errors->has('link'))

                                            <div class="validation-error">
                                                {{ $errors->first('link') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                            </div>


                            <!-- Card Footer -->
                            <div class="card-footer">

                                <button
                                    type="submit"
                                    class="btn btn-info"
                                >
                                    Save
                                </button>

                                <a
                                    href="{{ url('admin/resource_pdf_list') }}"
                                    class="btn btn-default custom-btn"
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


@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

$(document).ready(function () {

    let oldSubResource = $('#sub_resource').data('old');
    let oldSubSubResource = $('#sub_sub_resource').data('old');
    let oldSubSubSubResource = $('#sub_sub_sub_resource').data('old');


    /*
    |--------------------------------------------------------------------------
    | Resource Change
    |--------------------------------------------------------------------------
    */
    $('#section').on('change', function () {

        let resource_id = $(this).val();

        $('#sub_resource_div').hide();
        $('#sub_sub_resource_div').hide();
        $('#sub_sub_sub_resource_div').hide();

        $('#sub_resource').html(
            '<option value="">Select Sub Resource</option>'
        );

        $('#sub_sub_resource').html(
            '<option value="">Select Sub Sub Resource</option>'
        );

        $('#sub_sub_sub_resource').html(
            '<option value="">Select Sub Sub Sub Resource</option>'
        );


        if (resource_id != '') {

            loadSubResource(resource_id, oldSubResource);

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Load Sub Resource
    |--------------------------------------------------------------------------
    */
    function loadSubResource(resource_id, selectedValue = '') {

        $.ajax({

            url: "{{ url('admin/get_sub_resource') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                category_id: resource_id

            },

            success: function (response) {

                $('#sub_resource').html(
                    '<option value="">Select Sub Resource</option>'
                );

                if (response.length > 0) {

                    $('#sub_resource_div').show();

                    $.each(response, function (key, value) {

                        let selected =
                            selectedValue != '' &&
                            String(selectedValue) === String(value.id)
                                ? 'selected'
                                : '';

                        $('#sub_resource').append(
                            `<option value="${value.id}" ${selected}>${value.name}</option>`
                        );

                    });


                    if (selectedValue != '') {

                        loadSubSubResource(
                            selectedValue,
                            oldSubSubResource
                        );

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Sub Resource Change
    |--------------------------------------------------------------------------
    */
    $('#sub_resource').on('change', function () {

        let sub_resource_id = $(this).val();

        oldSubResource = '';

        $('#sub_sub_resource_div').hide();
        $('#sub_sub_sub_resource_div').hide();

        $('#sub_sub_resource').html(
            '<option value="">Select Sub Sub Resource</option>'
        );

        $('#sub_sub_sub_resource').html(
            '<option value="">Select Sub Sub Sub Resource</option>'
        );


        if (sub_resource_id != '') {

            loadSubSubResource(sub_resource_id);

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Load Sub Sub Resource
    |--------------------------------------------------------------------------
    */
    function loadSubSubResource(sub_resource_id, selectedValue = '') {

        $.ajax({

            url: "{{ url('admin/get_sub_resource') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                category_id: sub_resource_id

            },

            success: function (response) {

                $('#sub_sub_resource').html(
                    '<option value="">Select Sub Sub Resource</option>'
                );

                if (response.length > 0) {

                    $('#sub_sub_resource_div').show();

                    $.each(response, function (key, value) {

                        let selected =
                            selectedValue != '' &&
                            String(selectedValue) === String(value.id)
                                ? 'selected'
                                : '';

                        $('#sub_sub_resource').append(
                            `<option value="${value.id}" ${selected}>${value.name}</option>`
                        );

                    });


                    if (selectedValue != '') {

                        loadSubSubSubResource(
                            selectedValue,
                            oldSubSubSubResource
                        );

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Sub Sub Resource Change
    |--------------------------------------------------------------------------
    */
    $('#sub_sub_resource').on('change', function () {

        let sub_resource_id = $(this).val();

        oldSubSubResource = '';

        $('#sub_sub_sub_resource_div').hide();

        $('#sub_sub_sub_resource').html(
            '<option value="">Select Sub Sub Sub Resource</option>'
        );


        if (sub_resource_id != '') {

            loadSubSubSubResource(sub_resource_id);

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Load Sub Sub Sub Resource
    |--------------------------------------------------------------------------
    */
    function loadSubSubSubResource(sub_resource_id, selectedValue = '') {

        $.ajax({

            url: "{{ url('admin/get_sub_resource') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                category_id: sub_resource_id

            },

            success: function (response) {

                $('#sub_sub_sub_resource').html(
                    '<option value="">Select Sub Sub Sub Resource</option>'
                );

                if (response.length > 0) {

                    $('#sub_sub_sub_resource_div').show();

                    $.each(response, function (key, value) {

                        let selected =
                            selectedValue != '' &&
                            String(selectedValue) === String(value.id)
                                ? 'selected'
                                : '';

                        $('#sub_sub_sub_resource').append(
                            `<option value="${value.id}" ${selected}>${value.name}</option>`
                        );

                    });

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Restore old dropdown values after validation error
    |--------------------------------------------------------------------------
    */
    if ($('#section').val() != '') {

        loadSubResource(
            $('#section').val(),
            oldSubResource
        );

    }

});

</script>

@endsection