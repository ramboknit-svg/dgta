@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    /* Success Message */
    .tel-success-message {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    
    /* Action Column */
    .tel-action {
        text-align: center;
        white-space: nowrap;
    }

    /* Table */
    #user-list {
        width: 100%;
    }

    #user-list th,
    #user-list td {
        vertical-align: middle;
    }

</style>

@endsection

@section('content')

<div class="content-wrapper">

```
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
                        Tel Directory
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
                            Tel Directory
                        </h3>

                        <!--
                        <a href="{{ url('admin/teldir-upload') }}">
                            Upload
                        </a>
                        -->

                    </div>


                    @if(session('message'))

                        <div class="alert alert-success tel-success-message">
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
                                    <th>Rank</th>
                                    <th>Name</th>
                                    <th>Appointment</th>
                                    <th>BR</th>
                                    <th>NFS</th>
                                    <th>Intercom</th>
                                    <th>Civil Telephone No</th>
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
                                                {{ $item->rank }}
                                            </td>

                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->appointment }}
                                            </td>

                                            <td>
                                                {{ $item->br }}
                                            </td>

                                            <td>
                                                {{ $item->nfs }}
                                            </td>


                                            <td>
                                                {{ $item->intercom }}
                                            </td>
                                            <td>
                                                {{ $item->tos }}
                                            </td>


                                            <td class="tel-action">

                                                <a
                                                    href="{{ url('admin/edit_teldir/'.$item->id) }}"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                    &nbsp;&nbsp;
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
