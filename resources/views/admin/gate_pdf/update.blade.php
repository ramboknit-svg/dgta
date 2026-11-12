@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .validation-error {
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
                            Update
                        </li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

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

                        <!-- /.card-header -->

                       


                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{ url('admin/update_gate_pdf') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="id"
                                value="{{ $knowledgeCategory->id }}"
                            >


                            <!-- Disabled select value is not submitted,
                                 therefore gate_id is kept in hidden field -->
                            <input
                                type="hidden"
                                name="gate_id"
                                value="{{ $knowledgeCategory->gate_id }}"
                            >


                            <div class="card-body">


                                <!-- Gate -->
                                <div class="form-group row">

                                    <label
                                        for="section"
                                        class="col-sm-2 col-form-label"
                                    >
                                        TAC/RECT
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="section"
                                            disabled
                                        >

                                            <option value="">
                                                Select Gate
                                            </option>

                                            @if(isset($sections) && $sections != null)

                                                @foreach($sections as $section)

                                                    <option
                                                        value="{{ $section->id }}"
                                                        {{ $section->id == old('gate_id', $knowledgeCategory->gate_id) ? 'selected' : '' }}
                                                    >
                                                        {{ $section->name }}
                                                    </option>

                                                @endforeach

                                            @endif

                                        </select>


                                        @if ($errors->has('gate_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('gate_id') }}
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
                                            id="name"
                                            autocomplete="name"
                                            name="name"
                                            value="{{ old('name', $knowledgeCategory->name) }}"
                                            class="form-control"
                                            required
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
                                        for="thumbnail"
                                        class="col-sm-2 col-form-label"
                                    >
                                        PDF
                                    </label>

                                    <div class="col-sm-10">

                                        <input
                                            type="file"
                                            id="thumbnail"
                                            name="link"
                                        >


                                        @if ($errors->has('link'))

                                            <div class="validation-error">
                                                {{ $errors->first('link') }}
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
                                    href="{{ url('admin/gate_pdf_list') }}"
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