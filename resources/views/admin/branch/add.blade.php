@extends('admin.index')


@section('after-style')

{{-- Summernote Lite CDN CSS --}}
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css"
>

<style>
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
                            Add Branch
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
                                Add Branch
                            </h3>

                        </div>


                        <form
                            class="form-horizontal"
                            id="branchAddForm"
                            method="POST"
                            action="{{ url('admin/branch_add') }}"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="card-body">

                                <div class="form-group row">

                                    <label
                                        for="role"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Role
                                    </label>


                                    <div class="col-sm-10">

                                        {{--
                                            Important:

                                            Do not use class="summernote".

                                            This unique class prevents conflict
                                            with the Summernote initialized
                                            globally inside admin.index.
                                        --}}

                                        <textarea
                                            class="form-control branch-role-editor"
                                            id="role"
                                            name="role"
                                            required
                                        >{!! old('role') !!}</textarea>


                                        @error('role')

                                            <div class="text-danger mt-1">
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
                                    Add
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

{{--
    jQuery should already be loaded inside admin.index.

    Do not load jQuery twice.
--}}

{{-- Summernote Lite CDN JavaScript --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


<script>
$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Check dependencies
    |--------------------------------------------------------------------------
    */

    if (typeof window.jQuery === 'undefined') {

        console.error(
            'jQuery is not loaded. Summernote requires jQuery.'
        );

        return;
    }


    if (typeof $.fn.summernote !== 'function') {

        console.error(
            'Summernote CDN could not be loaded.'
        );

        return;
    }


    var $roleEditor = $('#role');


    /*
    |--------------------------------------------------------------------------
    | Unordered bullet classes
    |--------------------------------------------------------------------------
    */

    var unorderedBulletClasses = [

        'bullet-disc',

        'bullet-circle',

        'bullet-square',

        'bullet-arrow',

        'bullet-check',

        'bullet-dash',

        'bullet-diamond',

        'bullet-subcategory'

    ];


    /*
    |--------------------------------------------------------------------------
    | Ordered list classes
    |--------------------------------------------------------------------------
    */

    var orderedListClasses = [

        'number-decimal',

        'number-lower-alpha',

        'number-upper-alpha',

        'number-lower-roman',

        'number-upper-roman'

    ];


    /*
    |--------------------------------------------------------------------------
    | Focus editor and restore cursor
    |--------------------------------------------------------------------------
    */

    function focusEditor(context) {

        context.invoke(
            'editor.focus'
        );


        try {

            context.invoke(
                'editor.restoreRange'
            );

        } catch (error) {

            /*
             * Ignore when no saved range is available.
             */
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Get active selected node
    |--------------------------------------------------------------------------
    */

    function getActiveNode(context) {

        var node = null;


        try {

            var range = context.invoke(
                'editor.getLastRange'
            );


            if (range && range.sc) {

                node = range.sc;
            }

        } catch (error) {

            node = null;
        }


        if (!node) {

            var selection = window.getSelection();


            if (
                selection &&
                selection.rangeCount > 0
            ) {

                node = selection.anchorNode;
            }
        }


        if (
            node &&
            node.nodeType === 3
        ) {

            node = node.parentNode;
        }


        return node;
    }


    /*
    |--------------------------------------------------------------------------
    | Get current unordered list
    |--------------------------------------------------------------------------
    */

    function getCurrentUnorderedList(context) {

        var node = getActiveNode(context);


        if (!node) {

            return $();
        }


        return $(node)
            .closest('.note-editable ul')
            .first();
    }


    /*
    |--------------------------------------------------------------------------
    | Get current ordered list
    |--------------------------------------------------------------------------
    */

    function getCurrentOrderedList(context) {

        var node = getActiveNode(context);


        if (!node) {

            return $();
        }


        return $(node)
            .closest('.note-editable ol')
            .first();
    }


    /*
    |--------------------------------------------------------------------------
    | Get current UL or OL
    |--------------------------------------------------------------------------
    */

    function getCurrentList(context) {

        var node = getActiveNode(context);


        if (!node) {

            return $();
        }


        return $(node)
            .closest(
                '.note-editable ul, .note-editable ol'
            )
            .first();
    }


    /*
    |--------------------------------------------------------------------------
    | Remove existing unordered classes
    |--------------------------------------------------------------------------
    */

    function removeUnorderedClasses($list) {

        $list.removeClass(
            unorderedBulletClasses.join(' ')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Remove existing ordered classes
    |--------------------------------------------------------------------------
    */

    function removeOrderedClasses($list) {

        $list.removeClass(
            orderedListClasses.join(' ')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Synchronize hidden textarea
    |--------------------------------------------------------------------------
    */

    function synchronizeEditor() {

        var html = $roleEditor.summernote(
            'code'
        );


        $roleEditor.val(
            html
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Apply unordered-list style
    |--------------------------------------------------------------------------
    |
    | First click:
    | Create/apply selected bullet style.
    |
    | Same button again:
    | Remove unordered list.
    |
    */

    function applyUnorderedStyle(
        context,
        bulletClass
    ) {

        focusEditor(context);


        var $currentList = getCurrentUnorderedList(
            context
        );


        if (
            $currentList.length &&
            $currentList.hasClass(bulletClass)
        ) {

            context.invoke(
                'editor.insertUnorderedList'
            );


            synchronizeEditor();

            return;
        }


        if (!$currentList.length) {

            context.invoke(
                'editor.insertUnorderedList'
            );


            $currentList = getCurrentUnorderedList(
                context
            );
        }


        if ($currentList.length) {

            removeUnorderedClasses(
                $currentList
            );


            $currentList.addClass(
                bulletClass
            );
        }


        synchronizeEditor();
    }


    /*
    |--------------------------------------------------------------------------
    | Apply ordered-list style
    |--------------------------------------------------------------------------
    */

    function applyOrderedStyle(
        context,
        numberClass
    ) {

        focusEditor(context);


        var $currentList = getCurrentOrderedList(
            context
        );


        if (
            $currentList.length &&
            $currentList.hasClass(numberClass)
        ) {

            context.invoke(
                'editor.insertOrderedList'
            );


            synchronizeEditor();

            return;
        }


        if (!$currentList.length) {

            context.invoke(
                'editor.insertOrderedList'
            );


            $currentList = getCurrentOrderedList(
                context
            );
        }


        if ($currentList.length) {

            removeOrderedClasses(
                $currentList
            );


            $currentList.addClass(
                numberClass
            );
        }


        synchronizeEditor();
    }


    /*
    |--------------------------------------------------------------------------
    | Reusable unordered bullet button
    |--------------------------------------------------------------------------
    */

    function createUnorderedButton(
        context,
        symbol,
        tooltip,
        bulletClass
    ) {

        var ui = $.summernote.ui;


        return ui.button({

            className:
                'note-list-style-button',

            contents:
                '<strong style="font-size:17px;">' +
                    symbol +
                '</strong>',

            tooltip:
                tooltip,

            click: function () {

                applyUnorderedStyle(
                    context,
                    bulletClass
                );
            }

        }).render();
    }


    /*
    |--------------------------------------------------------------------------
    | Reusable numbered-list button
    |--------------------------------------------------------------------------
    */

    function createOrderedButton(
        context,
        symbol,
        tooltip,
        numberClass
    ) {

        var ui = $.summernote.ui;


        return ui.button({

            className:
                'note-list-style-button',

            contents:
                '<strong>' +
                    symbol +
                '</strong>',

            tooltip:
                tooltip,

            click: function () {

                applyOrderedStyle(
                    context,
                    numberClass
                );
            }

        }).render();
    }


    /*
    |--------------------------------------------------------------------------
    | Unordered-list buttons
    |--------------------------------------------------------------------------
    */

    var DiscBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&#8226;',

            'Disc bullet',

            'bullet-disc'

        );
    };


    var CircleBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&#9675;',

            'Circle bullet',

            'bullet-circle'

        );
    };


    var SquareBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&#9632;',

            'Square bullet',

            'bullet-square'

        );
    };


    var ArrowBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&gt;',

            'Arrow bullet',

            'bullet-arrow'

        );
    };


    var CheckBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&#10003;',

            'Check bullet',

            'bullet-check'

        );
    };


    var DashBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&ndash;',

            'Dash bullet',

            'bullet-dash'

        );
    };


    var DiamondBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&#9670;',

            'Diamond bullet',

            'bullet-diamond'

        );
    };


    /*
    |--------------------------------------------------------------------------
    | Sub-category bullet button: ➢
    |--------------------------------------------------------------------------
    */

    var SubCategoryBulletButton = function (context) {

        return createUnorderedButton(

            context,

            '&#10146;',

            'Sub-category bullet',

            'bullet-subcategory'

        );
    };


    /*
    |--------------------------------------------------------------------------
    | Ordered-list buttons
    |--------------------------------------------------------------------------
    */

    var DecimalListButton = function (context) {

        return createOrderedButton(

            context,

            '1.',

            'Numbered list: 1, 2, 3',

            'number-decimal'

        );
    };


    var LowerAlphaListButton = function (context) {

        return createOrderedButton(

            context,

            'a.',

            'Lower alphabet list: a, b, c',

            'number-lower-alpha'

        );
    };


    var UpperAlphaListButton = function (context) {

        return createOrderedButton(

            context,

            'A.',

            'Upper alphabet list: A, B, C',

            'number-upper-alpha'

        );
    };


    var LowerRomanListButton = function (context) {

        return createOrderedButton(

            context,

            'i.',

            'Lower Roman list: i, ii, iii',

            'number-lower-roman'

        );
    };


    var UpperRomanListButton = function (context) {

        return createOrderedButton(

            context,

            'I.',

            'Upper Roman list: I, II, III',

            'number-upper-roman'

        );
    };


    /*
    |--------------------------------------------------------------------------
    | Create sub-list
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | • Category
    |     ➢ Sub Category
    |
    */

    var SubListButton = function (context) {

        var ui = $.summernote.ui;


        return ui.button({

            className:
                'note-list-action-button',

            contents:
                '<strong>&gt;&gt;</strong>',

            tooltip:
                'Create sub-category or nested list',

            click: function () {

                focusEditor(context);


                var node = getActiveNode(
                    context
                );


                var $listItem = node
                    ? $(node).closest('li')
                    : $();


                /*
                 * If cursor is not in a list,
                 * create unordered list first.
                 */
                if (!$listItem.length) {

                    context.invoke(
                        'editor.insertUnorderedList'
                    );
                }


                /*
                 * Indent current list item.
                 */
                context.invoke(
                    'editor.indent'
                );


                /*
                 * Automatically apply ➢ to
                 * newly created nested UL.
                 */
                setTimeout(function () {

                    var $nestedList =
                        getCurrentUnorderedList(
                            context
                        );


                    if ($nestedList.length) {

                        removeUnorderedClasses(
                            $nestedList
                        );


                        $nestedList.addClass(
                            'bullet-subcategory'
                        );
                    }


                    synchronizeEditor();

                }, 0);
            }

        }).render();
    };


    /*
    |--------------------------------------------------------------------------
    | Return to previous list level
    |--------------------------------------------------------------------------
    */

    var MainListButton = function (context) {

        var ui = $.summernote.ui;


        return ui.button({

            className:
                'note-list-action-button',

            contents:
                '<strong>&lt;&lt;</strong>',

            tooltip:
                'Return to previous list level',

            click: function () {

                focusEditor(context);


                context.invoke(
                    'editor.outdent'
                );


                synchronizeEditor();
            }

        }).render();
    };


    /*
    |--------------------------------------------------------------------------
    | Convert list to paragraph
    |--------------------------------------------------------------------------
    */

    var NormalParagraphButton = function (context) {

        var ui = $.summernote.ui;


        return ui.button({

            className:
                'note-list-action-button',

            contents:
                '<strong>P</strong>',

            tooltip:
                'Convert list to normal paragraph',

            click: function () {

                focusEditor(context);


                var $currentList =
                    getCurrentList(context);


                if (
                    $currentList.length &&
                    $currentList.is('ul')
                ) {

                    context.invoke(
                        'editor.insertUnorderedList'
                    );


                    synchronizeEditor();

                    return;
                }


                if (
                    $currentList.length &&
                    $currentList.is('ol')
                ) {

                    context.invoke(
                        'editor.insertOrderedList'
                    );


                    synchronizeEditor();

                    return;
                }


                context.invoke(
                    'editor.formatPara'
                );


                synchronizeEditor();
            }

        }).render();
    };


    /*
    |--------------------------------------------------------------------------
    | Initialize Summernote
    |--------------------------------------------------------------------------
    */

    $roleEditor.summernote({

        height: 430,

        minHeight: 320,

        maxHeight: null,

        focus: false,

        tabsize: 4,

        placeholder:
            'Enter role description here...',


        /*
         * Paragraph and heading dropdown.
         */
        styleTags: [

            'p',

            'blockquote',

            'pre',

            'h1',

            'h2',

            'h3',

            'h4',

            'h5',

            'h6'

        ],


        /*
        |--------------------------------------------------------------------------
        | Complete toolbar
        |--------------------------------------------------------------------------
        */

        toolbar: [

            [
                'history',
                [
                    'undo',
                    'redo'
                ]
            ],

            [
                'style',
                [
                    'style'
                ]
            ],

            [
                'font',
                [
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'superscript',
                    'subscript',
                    'clear'
                ]
            ],

            [
                'fontname',
                [
                    'fontname'
                ]
            ],

            [
                'fontsize',
                [
                    'fontsize'
                ]
            ],

            [
                'color',
                [
                    'color'
                ]
            ],

            /*
             * All unordered bullet styles.
             */
            [
                'unorderedStyles',
                [
                    'discBullet',
                    'circleBullet',
                    'squareBullet',
                    'arrowBullet',
                    'checkBullet',
                    'dashBullet',
                    'diamondBullet',
                    'subCategoryBullet'
                ]
            ],

            /*
             * All numbered-list styles.
             */
            [
                'orderedStyles',
                [
                    'decimalList',
                    'lowerAlphaList',
                    'upperAlphaList',
                    'lowerRomanList',
                    'upperRomanList'
                ]
            ],

            /*
             * Sub-list, previous level and paragraph.
             */
            [
                'listActions',
                [
                    'subList',
                    'mainList',
                    'normalParagraph'
                ]
            ],

            /*
             * Alignment and indent dropdown.
             */
            [
                'paragraph',
                [
                    'paragraph'
                ]
            ],

            [
                'height',
                [
                    'height'
                ]
            ],

            [
                'table',
                [
                    'table'
                ]
            ],

            [
                'insert',
                [
                    'link',
                    'picture',
                    'video',
                    'hr'
                ]
            ],

            [
                'view',
                [
                    'fullscreen',
                    'codeview',
                    'help'
                ]
            ]
        ],


        /*
        |--------------------------------------------------------------------------
        | Register custom toolbar buttons
        |--------------------------------------------------------------------------
        */

        buttons: {

            discBullet:
                DiscBulletButton,

            circleBullet:
                CircleBulletButton,

            squareBullet:
                SquareBulletButton,

            arrowBullet:
                ArrowBulletButton,

            checkBullet:
                CheckBulletButton,

            dashBullet:
                DashBulletButton,

            diamondBullet:
                DiamondBulletButton,

            subCategoryBullet:
                SubCategoryBulletButton,

            decimalList:
                DecimalListButton,

            lowerAlphaList:
                LowerAlphaListButton,

            upperAlphaList:
                UpperAlphaListButton,

            lowerRomanList:
                LowerRomanListButton,

            upperRomanList:
                UpperRomanListButton,

            subList:
                SubListButton,

            mainList:
                MainListButton,

            normalParagraph:
                NormalParagraphButton
        },


        /*
        |--------------------------------------------------------------------------
        | Font options
        |--------------------------------------------------------------------------
        */

        fontNames: [

            'Arial',

            'Arial Black',

            'Calibri',

            'Courier New',

            'Georgia',

            'Roboto',

            'Tahoma',

            'Times New Roman',

            'Verdana'

        ],


        fontSizes: [

            '8',

            '9',

            '10',

            '11',

            '12',

            '14',

            '16',

            '18',

            '20',

            '24',

            '28',

            '32',

            '36',

            '48'

        ],


        /*
        |--------------------------------------------------------------------------
        | Editor callbacks
        |--------------------------------------------------------------------------
        */

        callbacks: {

            onInit: function () {

                console.log(
                    'Summernote with all bullets initialized successfully.'
                );
            },


            /*
             * Tab:
             * Create sub-category.
             *
             * Shift + Tab:
             * Return to previous level.
             */
            onKeydown: function (event) {

                var isTab =
                    event.key === 'Tab' ||
                    event.keyCode === 9;


                if (!isTab) {

                    return;
                }


                var selection =
                    window.getSelection();


                var node =
                    selection &&
                    selection.rangeCount > 0
                        ? selection.anchorNode
                        : null;


                if (
                    node &&
                    node.nodeType === 3
                ) {

                    node = node.parentNode;
                }


                var $listItem = node
                    ? $(node).closest('li')
                    : $();


                /*
                 * Normal Tab outside lists.
                 */
                if (!$listItem.length) {

                    return;
                }


                event.preventDefault();


                if (event.shiftKey) {

                    $roleEditor.summernote(
                        'outdent'
                    );

                    synchronizeEditor();

                } else {

                    $roleEditor.summernote(
                        'indent'
                    );


                    setTimeout(function () {

                        var currentSelection =
                            window.getSelection();


                        var currentNode =
                            currentSelection &&
                            currentSelection.rangeCount > 0
                                ? currentSelection.anchorNode
                                : null;


                        if (
                            currentNode &&
                            currentNode.nodeType === 3
                        ) {

                            currentNode =
                                currentNode.parentNode;
                        }


                        var $nestedList =
                            currentNode
                                ? $(currentNode)
                                    .closest(
                                        '.note-editable ul'
                                    )
                                    .first()
                                : $();


                        if ($nestedList.length) {

                            removeUnorderedClasses(
                                $nestedList
                            );


                            $nestedList.addClass(
                                'bullet-subcategory'
                            );
                        }


                        synchronizeEditor();

                    }, 0);
                }
            },


            onChange: function (contents) {

                $roleEditor.val(
                    contents
                );
            }
        }
    });


    /*
    |--------------------------------------------------------------------------
    | Synchronize editor before submit
    |--------------------------------------------------------------------------
    */

    $('#branchAddForm').on(
        'submit',
        function () {

            var roleHtml =
                $roleEditor.summernote(
                    'code'
                );


            $roleEditor.val(
                roleHtml
            );
        }
    );

});
</script>

@endsection
