@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .knowledge-category-select {
        width: 100%;
    }

    .knowledge-category-name {
        width: 100%;
    }

    .knowledge-category-description {
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
                            Update UNIT
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
                            action="{{ url('admin/update_knowledge_category') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="id"
                                value="{{ $knowledgeCategory->id }}"
                            >


                            <div class="card-body">


                                <!-- Reporting Users / Category -->
                                <div class="form-group row">

                                    <label
                                        for="category_id"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Reporting Users
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            name="category_id"
                                            id="category_id"
                                            class="form-control knowledge-category-select"
                                            disabled
                                        >

                                            <option value="">
                                                None
                                            </option>

                                            @foreach($parents as $parent)

                                                <option
                                                    value="{{ $parent->id }}"
                                                    {{ $knowledgeCategory->category_id == $parent->id ? 'selected' : '' }}
                                                >
                                                    {{ $parent->name }}
                                                </option>

                                            @endforeach

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
                                            name="name"
                                            id="name"
                                            
                                            value="{{ old('name', $knowledgeCategory->name) }}"
                                            class="form-control knowledge-category-name"
                                        
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
                                            class="form-control knowledge-category-description"
                                        >{{ old('description', $knowledgeCategory->description) }}</textarea>

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
                                    Update 
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

@endsection