@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* Add Award Button */
    .award-add-btn {
        float: right;
    }

    .award-add-btn i {
        font-size: 25px;
    }

    /* Success Message */
    .award-success-message {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    /* Action Column */
    .award-action {
        text-align: center;
        white-space: nowrap;
    }

    /* Table Alignment */
    #user-list th,
    #user-list td {
        vertical-align: middle;
    }

    #user-list {
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
                        Awards
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">


                <div class="card">


                    <div class="card-header">

                        <h3 class="card-title">
                            Awards
                        </h3>

                        <a
                            href="{{ url('admin/award_add') }}"
                            class="award-add-btn"
                        >
                            <i class="fas fa-plus-square"></i>
                        </a>

                    </div>


                    @if(session('message'))

                        <div class="alert alert-success award-success-message">
                            {{ session('message') }}
                        </div>

                    @endif


                    <div class="card-body">


                        <table
                            id="user-list"
                            class="table table-bordered table-striped"
                        >

                            <thead>

                                <tr>

                                    <th>S NO</th>

                                    <th>AWARDS</th>

                                    <th>ACHEVEMENTS</th>

                                    <th>Actions</th>

                                </tr>

                            </thead>


                            <tbody>

                                @if(isset($items) && $items != null)

                                    @php($count = 1)

                                    @foreach($items as $item)

                                        <tr>

                                            <td>
                                                {{ $count++ }}
                                            </td>

                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->appointment }}
                                            </td>

                                            <td class="award-action">

                                                <a
                                                    href="{{ url('admin/edit_award/'.$item->id) }}"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                    &nbsp;&nbsp;
                                                </a>

                                                <a
                                                    href="{{ url('admin/delete_award/'.$item->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </td>

                                        </tr>

                                    @endforeach

                                @endif

                            </tbody>


                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


</div>

@endsection

@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

    $(function () {

        $("#user-list").DataTable({
            responsive: true,
            autoWidth: false,
            ordering: false
        });

    });

</script>

@endsection
