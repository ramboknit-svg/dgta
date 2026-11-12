@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    #sub_gate_div,
    #sub_sub_gate_div,
    #sub_sub_sub_gate_div {
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
                            Add TAC/ RECT Pdf
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
                                Add TAC/RECT Pdf
                            </h3>

                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->

                        <form
                            class="form-horizontal"
                            method="post"
                            action="{{url('admin/add_gate_pdf')}}"
                            enctype="multipart/form-data"
                        >

                            @csrf


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
                                            name="gate_id"
                                        >

                                            

                                            @if(isset($sections) && $sections != null)

                                                @foreach($sections as $section)

                                                    <option
                                                        value="{{$section->id}}"
                                                        {{ old('gate_id') == $section->id ? 'selected' : '' }}
                                                    >
                                                        {{$section->name}}
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


                                <!-- Sub Gate -->
                                <div
                                    class="form-group row"
                                    id="sub_gate_div"
                                >

                                    <label
                                        for="sub_gate"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Gate
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_gate"
                                            name="sub_gate_id"
                                        >

                                            <option value="">
                                                Select Sub Gate
                                            </option>

                                        </select>


                                        @if ($errors->has('sub_gate_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('sub_gate_id') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- Sub Sub Gate -->
                                <div
                                    class="form-group row"
                                    id="sub_sub_gate_div"
                                >

                                    <label
                                        for="sub_sub_gate"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Sub Gate
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_sub_gate"
                                            name="sub_sub_gate_id"
                                        >

                                            <option value="">
                                                Select Sub Sub Gate
                                            </option>

                                        </select>


                                        @if ($errors->has('sub_sub_gate_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('sub_sub_gate_id') }}
                                            </div>

                                        @endif

                                    </div>

                                </div>


                                <!-- Sub Sub Sub Gate -->
                                <div
                                    class="form-group row"
                                    id="sub_sub_sub_gate_div"
                                >

                                    <label
                                        for="sub_sub_sub_gate"
                                        class="col-sm-2 col-form-label"
                                    >
                                        Sub Sub Sub Gate
                                    </label>

                                    <div class="col-sm-10">

                                        <select
                                            class="form-control"
                                            id="sub_sub_sub_gate"
                                            name="sub_sub_sub_gate_id"
                                        >

                                            <option value="">
                                                Select Sub Sub Sub Gate
                                            </option>

                                        </select>


                                        @if ($errors->has('sub_sub_sub_gate_id'))

                                            <div class="validation-error">
                                                {{ $errors->first('sub_sub_sub_gate_id') }}
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
                                            autocomplete="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                            placeholder="Name"
                                           
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
                                            required
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
                                    Save
                                </button>

                                <a
                                    href="{{url('admin/gate_pdf_list')}}"
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

<script nonce="{{ app('cspNonce') }}">

$(document).ready(function(){


    // Gate Change
    $('#section').on('change', function(){

        let gate_id = $(this).val();
        
        $('#sub_gate_div').hide();
        $('#sub_sub_gate_div').hide();
        $('#sub_sub_sub_gate_div').hide();

        $('#sub_gate').html(
            '<option value="">Select Sub Gate</option>'
        );

        $('#sub_sub_gate').html(
            '<option value="">Select Sub Sub Gate</option>'
        );

        $('#sub_sub_sub_gate').html(
            '<option value="">Select Sub Sub Sub Gate</option>'
        );


        if(gate_id != ''){

            loadSubCategory(gate_id);

        }

    });


    // Load Sub Gate
    function loadSubCategory(gate_id){
           
        $.ajax({

            url: "{{ url('admin/get_sub_gate') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                category_id: gate_id

            },

            success: function(response){

                if(response.length > 0){

                    $('#sub_gate_div').show();

                    $.each(response, function(key, value){

                        $('#sub_gate').append(
                            `<option value="${value.id}">${value.name}</option>`
                        );

                    });

                }

            }

        });

    }


    // Sub Gate Change
    $('#sub_gate').on('change', function(){

        let sub_gate_id = $(this).val();

        $('#sub_sub_gate_div').hide();
        $('#sub_sub_sub_gate_div').hide();

        $('#sub_sub_gate').html(
            '<option value="">Select Sub Sub Gate</option>'
        );

        $('#sub_sub_sub_gate').html(
            '<option value="">Select Sub Sub Sub Gate</option>'
        );


        if(sub_gate_id != ''){

            $.ajax({

                url: "{{ url('admin/get_sub_gate') }}",

                type: "POST",

                data: {

                    _token: "{{ csrf_token() }}",

                    category_id: sub_gate_id

                },

                success: function(response){

                    if(response.length > 0){

                        $('#sub_sub_gate_div').show();

                        $.each(response, function(key, value){

                            $('#sub_sub_gate').append(
                                `<option value="${value.id}">${value.name}</option>`
                            );

                        });

                    }

                }

            });

        }

    });


    // Sub Sub Gate Change
    $('#sub_sub_gate').on('change', function(){

        let sub_gate_id = $(this).val();

        $('#sub_sub_sub_gate_div').hide();

        $('#sub_sub_sub_gate').html(
            '<option value="">Select Sub Sub Sub Gate</option>'
        );


        if(sub_gate_id != ''){

            $.ajax({

                url: "{{ url('admin/get_sub_gate') }}",

                type: "POST",

                data: {

                    _token: "{{ csrf_token() }}",

                    category_id: sub_gate_id

                },

                success: function(response){

                    if(response.length > 0){

                        $('#sub_sub_sub_gate_div').show();

                        $.each(response, function(key, value){

                            $('#sub_sub_sub_gate').append(
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