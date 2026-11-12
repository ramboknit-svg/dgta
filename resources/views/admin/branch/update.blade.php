@extends('admin.index')


@section('after-style')

<style nonce="{{ app('cspNonce') }}">
    /* =========================================================
       SUMMERNOTE EDITOR
       ========================================================= */

    .note-editor.note-frame {
        width: 100%;
        border: 1px solid #ced4da !important;
        border-radius: 4px;
    }

    .note-editor .note-toolbar {
        padding: 7px;
        background-color: #f3f3f3;
        border-bottom: 1px solid #ced4da;
    }

    .note-editor .note-editable {
        min-height: 320px;
        padding: 15px;
        background-color: #ffffff;
        color: #212529;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        line-height: 1.6;
    }

    .note-editor .note-dropdown-menu {
        z-index: 99999 !important;
    }

    .note-editor .note-btn {
        cursor: pointer !important;
    }


    /* =========================================================
       COMMON UNORDERED LIST
       ========================================================= */

    .note-editable ul,
    .description-content ul {
        display: block !important;
        list-style: none !important;
        margin: 8px 0 !important;
        padding-left: 30px !important;
    }

    .note-editable ul > li,
    .description-content ul > li {
        display: block !important;
        list-style: none !important;
        position: relative !important;
        margin: 6px 0 !important;
        padding-left: 26px !important;
    }

    /*
     * Default bullet: •
     */
    .note-editable ul > li::before,
    .description-content ul > li::before {
        content: "•" !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        display: inline-block !important;
        font-size: 18px !important;
        font-weight: bold !important;
        line-height: 1.4 !important;
    }


    /* =========================================================
       UNORDERED BULLET STYLES
       ========================================================= */

    /*
     * Disc bullet: •
     */
    .note-editable ul.bullet-disc > li::before,
    .description-content ul.bullet-disc > li::before {
        content: "•" !important;
        top: 0 !important;
        font-size: 18px !important;
    }

    /*
     * Circle bullet: ○
     */
    .note-editable ul.bullet-circle > li::before,
    .description-content ul.bullet-circle > li::before {
        content: "○" !important;
        top: 0 !important;
        font-size: 18px !important;
    }

    /*
     * Square bullet: ■
     */
    .note-editable ul.bullet-square > li::before,
    .description-content ul.bullet-square > li::before {
        content: "■" !important;
        top: 4px !important;
        font-size: 11px !important;
    }

    /*
     * Arrow bullet: >
     */
    .note-editable ul.bullet-arrow > li::before,
    .description-content ul.bullet-arrow > li::before {
        content: ">" !important;
        top: 0 !important;
        font-size: 16px !important;
    }

    /*
     * Check bullet: ✓
     */
    .note-editable ul.bullet-check > li::before,
    .description-content ul.bullet-check > li::before {
        content: "✓" !important;
        top: 0 !important;
        font-size: 16px !important;
    }

    /*
     * Dash bullet: –
     */
    .note-editable ul.bullet-dash > li::before,
    .description-content ul.bullet-dash > li::before {
        content: "–" !important;
        top: 0 !important;
        font-size: 18px !important;
    }

    /*
     * Diamond bullet: ◆
     */
    .note-editable ul.bullet-diamond > li::before,
    .description-content ul.bullet-diamond > li::before {
        content: "◆" !important;
        top: 4px !important;
        font-size: 11px !important;
    }

    /*
     * Sub-category bullet: ➢
     */
    .note-editable ul.bullet-subcategory > li::before,
    .description-content ul.bullet-subcategory > li::before {
        content: "➢" !important;
        top: 0 !important;
        font-size: 17px !important;
        font-weight: normal !important;
    }

    /*
     * Deepest/last sub-category bullet: ◆
     *
     * JavaScript automatically adds
     * bullet-subcategory-last to a nested UL
     * when it contains no further nested UL.
     */
    .note-editable ul.bullet-subcategory-last > li::before,
    .description-content ul.bullet-subcategory-last > li::before {
        content: "◆" !important;
        top: 4px !important;
        left: 0 !important;
        font-size: 11px !important;
        font-weight: normal !important;
    }


    /* =========================================================
       NESTED/SUB-LIST SPACING
       ========================================================= */

    .note-editable ul ul,
    .description-content ul ul {
        margin-top: 5px !important;
        margin-bottom: 5px !important;
        padding-left: 32px !important;
    }

    .note-editable ul ul ul,
    .description-content ul ul ul {
        padding-left: 32px !important;
    }


    /* =========================================================
       ORDERED LISTS
       ========================================================= */

    .note-editable ol,
    .description-content ol {
        display: block !important;
        margin: 8px 0 !important;
        padding-left: 42px !important;
    }

    .note-editable ol > li,
    .description-content ol > li {
        display: list-item !important;
        position: static !important;
        margin: 6px 0 !important;
        padding-left: 4px !important;
    }

    .note-editable ol > li::before,
    .description-content ol > li::before {
        content: none !important;
        display: none !important;
    }

    /*
     * 1, 2, 3
     */
    .note-editable ol.number-decimal,
    .description-content ol.number-decimal {
        list-style-type: decimal !important;
    }

    /*
     * a, b, c
     */
    .note-editable ol.number-lower-alpha,
    .description-content ol.number-lower-alpha {
        list-style-type: lower-alpha !important;
    }

    /*
     * A, B, C
     */
    .note-editable ol.number-upper-alpha,
    .description-content ol.number-upper-alpha {
        list-style-type: upper-alpha !important;
    }

    /*
     * i, ii, iii
     */
    .note-editable ol.number-lower-roman,
    .description-content ol.number-lower-roman {
        list-style-type: lower-roman !important;
    }

    /*
     * I, II, III
     */
    .note-editable ol.number-upper-roman,
    .description-content ol.number-upper-roman {
        list-style-type: upper-roman !important;
    }


    /* =========================================================
       TOOLBAR BUTTONS
       ========================================================= */

    .note-list-style-button {
        min-width: 37px !important;
        padding-left: 9px !important;
        padding-right: 9px !important;
        font-weight: bold !important;
    }

    .note-list-action-button {
        min-width: 42px !important;
        padding-left: 9px !important;
        padding-right: 9px !important;
        font-weight: bold !important;
    }


    /* =========================================================
       IMAGE PREVIEW
       ========================================================= */

    .existing-image-preview {
        display: block;
        margin-top: 12px;
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 4px;
    }

    #thumbnailPreview {
        display: none;
        margin-top: 12px;
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 4px;
    }
</style>

@endsection


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6"></div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Update Branch
                        </li>

                    </ol>

                </div>

            </div>

        </div>
    </section>


    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-1"></div>

                <div class="col-md-10">

                    <div class="card card-info">

                        <div class="card-header">

                            <h3 class="card-title">

                                Update

                                <strong>
                                    {{ $hod->name }}
                                </strong>

                            </h3>

                        </div>


                        <form
                            class="form-horizontal branch-update-form"
                            method="POST"
                            action="{{ url('admin/branch_update') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf

                            <input
                                type="hidden"
                                name="id"
                                value="{{ $hod->id }}"
                            >


                            <div class="card-body">

                                {{-- Name --}}
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
                                            autocomplete="off"
                                            id="name"
                                            name="name"
                                            value="{{ old('name', $hod->name) }}"
                                        >

                                        @error('name')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Role --}}
                                <div class="form-group row">

                                    <label
                                        for="role"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Role
                                    </label>

                                    <div class="col-sm-10">

                                        <textarea
                                            class="form-control branch-role-editor"
                                            id="role"
                                            name="role"
                                        
                                        >{!! old('role', $hod->role) !!}</textarea>

                                        @error('role')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Duty --}}
                                <div class="form-group row">

                                    <label
                                        for="duty"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Duty
                                    </label>

                                    <div class="col-sm-10">

                                        <textarea
                                            class="form-control branch-role-editor"
                                            id="duty"
                                            name="duty"
                                            
                                        >{!! old('duty', $hod->duty) !!}</textarea>

                                        @error('duty')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Description --}}
                                <div class="form-group row">

                                    <label
                                        for="description"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Description
                                    </label>

                                    <div class="col-sm-10">

                                        <textarea
                                            class="form-control branch-role-editor"
                                            id="description"
                                            name="description"
                                            
                                        >{!! old('description', $hod->description) !!}</textarea>

                                        @error('description')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Policy --}}
                                <div class="form-group row">

                                    <label
                                        for="policy"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Policy
                                    </label>

                                    <div class="col-sm-10">

                                        <textarea
                                            class="form-control branch-role-editor"
                                            id="policy"
                                            name="policy"
                                        >{!! old('policy', $hod->policy) !!}</textarea>

                                        @error('policy')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Head Name --}}
                                <div class="form-group row">

                                    <label
                                        for="head_name"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Head Name
                                    </label>

                                    <div class="col-sm-10">

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="head_name"
                                            name="head_name"
                                            placeholder="Head Name"
                                            value="{{ old('head_name', $hod->head_name) }}"
                                        >

                                        @error('head_name')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Image --}}
                                <div class="form-group row">

                                    <label
                                        for="thumbnail"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Image
                                    </label>

                                    <div class="col-sm-10">

                                        <input
                                            type="file"
                                            id="thumbnail"
                                            name="image"
                                            accept="image/*"
                                        >

                                        @error('image')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror


                                        @if(!empty($hod->image))

                                            <div>

                                                <small class="d-block mt-2">
                                                    Current Image
                                                </small>

                                                <img
                                                    src="{{ asset($hod->image) }}"
                                                    alt="Current Image"
                                                    class="existing-image-preview"
                                                >

                                            </div>

                                        @endif


                                        <img
                                            id="thumbnailPreview"
                                            src=""
                                            alt="New Image Preview"
                                        >

                                    </div>

                                </div>


                                {{-- Designation --}}
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
                                            placeholder="Designation"
                                            value="{{ old('designation', $hod->designation) }}"
                                        >

                                        @error('designation')

                                            <div class="alert-re text-danger">
                                                {{ $message }}
                                            </div>

                                        @enderror

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
                                    href="{{ url('admin/branch_list') }}"
                                    class="btn btn-default float-right"
                                >
                                    Cancel
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

                <div class="col-md-1"></div>

            </div>

        </div>

    </section>

</div>

@endsection


@section('after-scripts')


@endsection