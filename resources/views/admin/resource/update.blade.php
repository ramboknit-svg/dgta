@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .validation-error {
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }

    .resource-select,
    .resource-name {
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
                            Update 
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
                                Update 
                            </h3>

                        </div>


                       

                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{ url('admin/update_resource') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <!-- Resource ID -->
                            <input
                                type="hidden"
                                name="id"
                                value="{{ $resource->id }}"
                            >


                            
                            <input
                                type="hidden"
                                name="category_id"
                                value="{{ $resource->category_id }}"
                            >


                            <div class="card-body">


                                <!-- Reporting / Category -->
                                <div class="form-group row">

                                    <label
                                        for="category_id_display"
                                        class="col-sm-2 col-form-label"
                                    >
                                       TA RULES
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            id="category_id_display"
                                            class="form-control resource-select"
                                            disabled
                                        >

                                            <option value="">
                                                None
                                            </option>

                                            @foreach($parents as $parent)

                                                <option
                                                    value="{{ $parent->id }}"
                                                    {{ old('category_id', $resource->category_id) == $parent->id ? 'selected' : '' }}
                                                >
                                                    {{ $parent->name }}
                                                </option>

                                            @endforeach

                                        </select>


                                        @if ($errors->has('category_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('category_id') }}
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
                                            name="name"
                                            id="name"
                                            atucomplete="off"
                                            value="{{ old('name', $resource->name) }}"
                                            class="form-control resource-name"
                                            
                                        >


                                        @if ($errors->has('name'))

                                            <div class="validation-error">
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
                                    Update 
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

@endsection