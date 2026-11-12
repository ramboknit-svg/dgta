@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    #sub_category_div,
    #sub_sub_category_div,
    #sub_sub_sub_category_div {
        display: none;
    }

    .alert-re {
        color: red;
        margin-top: 5px;
        font-size: 14px;
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
                                Add TA RULES
                            </h3>

                        </div>


                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{ url('admin/add_resource') }}"
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

                                                <option
                                                    value="{{ $parent->id }}"
                                                    {{ old('category_id') == $parent->id ? 'selected' : '' }}
                                                >
                                                    {{ $parent->name }}
                                                </option>

                                            @endforeach

                                        </select>


                                        @if ($errors->has('category_id'))

                                            <div class="alert-re">
                                                {{ $errors->first('category_id') }}
                                            </div>

                                        @endif

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


                                        @if ($errors->has('sub_category_id'))

                                            <div class="alert-re">
                                                {{ $errors->first('sub_category_id') }}
                                            </div>

                                        @endif

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


                                        @if ($errors->has('sub_sub_category_id'))

                                            <div class="alert-re">
                                                {{ $errors->first('sub_sub_category_id') }}
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
                                            autcomplete="off"
                                            value="{{ old('name') }}"
                                            placeholder="Name"
                                        >


                                        @if ($errors->has('name'))

                                            <div class="alert-re">
                                                {{ $errors->first('name') }}
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
                                    href="{{ url('admin/resources_list') }}"
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


    // Category Change
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

        if (category_id != '') {

            loadSubCategory(category_id);

        }

    });


    // Load Sub Category
    function loadSubCategory(category_id) {

        $.ajax({

            url: "{{ url('admin/get_sub_resource') }}",

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
                            `<option value="${value.id}">${value.name}</option>`
                        );

                    });

                }

            }

        });

    }


    // Sub Category Change
    $('#sub_category').on('change', function () {

        let sub_category_id = $(this).val();

        $('#sub_sub_category_div').hide();

        $('#sub_sub_category').html(
            '<option value="">Select Sub Sub Category</option>'
        );

        if (sub_category_id != '') {

            $.ajax({

                url: "{{ url('admin/get_sub_resource') }}",

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
                                `<option value="${value.id}">${value.name}</option>`
                            );

                        });

                    }

                }

            });

        }

    });


    // Sub Sub Category Change
    $('#sub_sub_category').on('change', function () {

        let sub_category_id = $(this).val();

        $('#sub_sub_sub_category_div').hide();

        $('#sub_sub_sub_category').html(
            '<option value="">Select Sub Sub Sub Category</option>'
        );

        if (sub_category_id != '') {

            $.ajax({

                url: "{{ url('admin/get_sub_resource') }}",

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
                                `<option value="${value.id}">${value.name}</option>`
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