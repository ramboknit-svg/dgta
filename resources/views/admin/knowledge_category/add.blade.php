@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* Initially hide dependent category dropdowns */
    #sub_category_div,
    #sub_sub_category_div,
    #sub_sub_sub_category_div {
        display: none;
    }

    /* Validation error */
    .alert-re {
        color: red;
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
                            Add UNIT
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
                                Add UNIT
                            </h3>

                        </div>


                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{ url('admin/add_knowledge_category') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="card-body">


                                <!-- Category -->
                                <div class="form-group row">

                                    <label
                                        for="section"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Category
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            name="category_id"
                                            class="form-control"
                                            id="section"
                                        >

                                            <option value="">
                                                None
                                            </option>

                                            @foreach($parents as $parent)

                                                <option value="{{ $parent->id }}">
                                                    {{ $parent->name }}
                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                <!-- Sub Category -->
                                <div
                                    class="form-group row"
                                    id="sub_category_div"
                                >

                                    <label
                                        for="sub_category"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Category
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_category"
                                            name="sub_category_id"
                                        >

                                            <option value="">
                                                Select Sub Category
                                            </option>

                                        </select>

                                    </div>

                                </div>


                                <!-- Sub Sub Category -->
                                <div
                                    class="form-group row"
                                    id="sub_sub_category_div"
                                >

                                    <label
                                        for="sub_sub_category"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Sub Category
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_sub_category"
                                            name="sub_sub_category_id"
                                        >

                                            <option value="">
                                                Select Sub Sub Category
                                            </option>

                                        </select>

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
                                            placeholder="Name"
                                            autocomplete="off"
                                            value="{{ old('name') }}"
                                        >

                                        @if ($errors->has('name'))

                                            <div class="alert-re">
                                                {{ $errors->first('name') }}
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
                                            name="description"
                                            id="description"
                                            class="form-control"
                                        >{{ old('description') }}</textarea>

                                        @if ($errors->has('description'))

                                            <div class="alert-re">
                                                {{ $errors->first('description') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                            </div>


                            <div class="card-footer">

                                <button
                                    type="submit"
                                    class="btn btn-info"
                                >
                                    Save
                                </button>

                                <a
                                    href="{{ url('admin/knowledge_category_list') }}"
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

    /*
    |--------------------------------------------------------------------------
    | Category Change
    |--------------------------------------------------------------------------
    */
    $('#section').on('change', function () {

        let category_id = $(this).val();

        $('#sub_category_div').hide();
        $('#sub_sub_category_div').hide();

        $('#sub_category').html(
            '<option value="">Select Sub Category</option>'
        );

        $('#sub_sub_category').html(
            '<option value="">Select Sub Sub Category</option>'
        );

        if (category_id !== '') {

            loadSubCategory(category_id);

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Load Sub Category
    |--------------------------------------------------------------------------
    */
    function loadSubCategory(category_id) {

        $.ajax({

            url: "{{ url('admin/get_sub_category') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                category_id: category_id

            },

            success: function (response) {

                if (response.length > 0) {

                    $('#sub_category_div').show();

                    $.each(response, function (key, value) {

                        $('#sub_category').append(

                            `<option value="${value.id}">
                                ${value.name}
                            </option>`

                        );

                    });

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Sub Category Change
    |--------------------------------------------------------------------------
    */
    $('#sub_category').on('change', function () {

        let sub_category_id = $(this).val();

        $('#sub_sub_category_div').hide();

        $('#sub_sub_category').html(
            '<option value="">Select Sub Sub Category</option>'
        );

        if (sub_category_id !== '') {

            $.ajax({

                url: "{{ url('admin/get_sub_category') }}",

                type: "POST",

                data: {

                    _token: "{{ csrf_token() }}",

                    category_id: sub_category_id

                },

                success: function (response) {

                    if (response.length > 0) {

                        $('#sub_sub_category_div').show();

                        $.each(response, function (key, value) {

                            $('#sub_sub_category').append(

                                `<option value="${value.id}">
                                    ${value.name}
                                </option>`

                            );

                        });

                    }

                }

            });

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Sub Sub Category Change
    |--------------------------------------------------------------------------
    */
    $('#sub_sub_category').on('change', function () {

        let sub_category_id = $(this).val();

        $('#sub_sub_sub_category_div').hide();

        $('#sub_sub_sub_category').html(
            '<option value="">Select Sub Sub Sub Category</option>'
        );

        if (sub_category_id !== '') {

            $.ajax({

                url: "{{ url('admin/get_sub_category') }}",

                type: "POST",

                data: {

                    _token: "{{ csrf_token() }}",

                    category_id: sub_category_id

                },

                success: function (response) {

                    if (response.length > 0) {

                        $('#sub_sub_sub_category_div').show();

                        $.each(response, function (key, value) {

                            $('#sub_sub_sub_category').append(

                                `<option value="${value.id}">
                                    ${value.name}
                                </option>`

                            );

                        });

                    }

                }

            });

        }

    });

});

</script>

@endsection