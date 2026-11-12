@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .validation-error {
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }

    .gate-reporting-select,
    .gate-name-input {
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
                            <a href="{{ url('admin/dashboard') }}">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Update Gate
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
                            action="{{ url('admin/update_gate') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="id"
                                value="{{ $gate->id }}"
                            >


                            <div class="card-body">


                                <!-- Reporting -->
                                <div class="form-group row">

                                    <label
                                        for="category_id"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Category  
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            name="category_id"
                                            id="category_id"
                                            class="form-control gate-reporting-select"
                                            disabled
                                        >

                                            <option value="">
                                                None
                                            </option>

                                            @foreach($parents as $parent)

                                                <option
                                                    value="{{ $parent->id }}"
                                                    {{ $gate->category_id == $parent->id ? 'selected' : '' }}
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
                                            autocomplete="name"
                                            id="name"
                                            value="{{ old('name', $gate->name) }}"
                                            class="form-control gate-name-input"
                                            
                                            required
                                        >


                                        @if ($errors->has('name'))

                                            <div class="validation-error">
                                                {{ $errors->first('name') }}
                                            </div>

                                        @endif

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
                                    href="{{ url('admin/gate_list') }}"
                                    class="btn btn-default custom-btn"
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

@endsection


@section('after-scripts')

@endsection