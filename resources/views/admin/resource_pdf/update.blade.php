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
                            <a href="{{url('admin/dashboard')}}">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Update TA RULES Pdf
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
                                Update Pdf
                            </h3>

                        </div>

                        <!-- /.card-header -->

                        @include('admin.partials.messages')


                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{url('admin/update_resource_pdf')}}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="id"
                                value="{{$knowledgeCategory->id}}"
                            >


                            <div class="card-body">


                                <!-- Resource -->
                                <div class="form-group row">

                                    <label
                                        for="section"
                                        class="col-sm-2 col-form-label"
                                    >
                                        TAC
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
                                                        value="{{$section->id}}"
                                                        {{ $knowledgeCategory->resource_id == $section->id ? 'selected' : '' }}
                                                    >
                                                        {{$section->name}}
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
                                            autocomplete="off"
                                            value="{{$knowledgeCategory->name}}"
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
                                    href="{{url('admin/resource_pdf_list')}}"
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