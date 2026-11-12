@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">

    .resource-pdf-add-btn {
        float: right;
    }

    .resource-pdf-add-icon {
        font-size: 25px;
    }

    .resource-pdf-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .resource-pdf-action-cell {
        text-align: center;
    }
   .csp-pdf-icon {
        width: 60px;
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
                            Manage TA RULES Pdf
                        </li>

                    </ol>

                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">
                                TA RULES Pdf List
                            </h3>

                            <a
                                href="{{url('admin/add_resource_pdf_form')}}"
                                class="resource-pdf-add-btn"
                            >
                                <i class="fas fa-plus-square resource-pdf-add-icon"></i>
                            </a>

                        </div>


                        @if(session('message'))

                            <div class="alert alert-success resource-pdf-success-alert">
                                {{ session('message') }}
                            </div>

                        @endif


                        <!-- /.card-header -->
                        <div class="card-body">

                            <table
                                id="user-list"
                                class="table table-bordered table-striped"
                            >

                                <thead>

                                    <tr>

                                        <th>ID</th>

                                        <th>Name</th>

                                        <th>Resource</th>

                                        <th>PDF</th>

                                        <th>Actions</th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @if(isset($categories) && $categories != null)

                                        @php($count=1)

                                        @foreach($categories as $row)

                                            <tr>

                                                <td>
                                                    {{ $count ++ }}
                                                </td>

                                                <td>
                                                    {{ $row->name }}
                                                </td>

                                                <td>
                                                    {{ $row->resource->name ?? '-' }}
                                                </td>

                                                <td>

                                                     @if(!empty($row->link))

                                                        <a href="{{ route('resource_pdf.download', $row->id ?? 0) }}"
                                                           class="news-paper-link d-block whatsnew-link"
                                                           target="_blank"
                                                           data-id="{{ $row->id }}">
                                                            <img src="{{ asset('/public/images/pdf.png') }}" alt="PDF File" class="csp-pdf-icon">
                                                        </a>

                                                    @else

                                                        No PDF

                                                    @endif

                                                </td>

                                                <td class="resource-pdf-action-cell">

                                                    <a href="{{url('admin/edit_resource_pdf/'.$row->id)}}">

                                                        <i class="fas fa-edit"></i>&nbsp;&nbsp;

                                                    </a>

                                                    <a
                                                        href="{{url('admin/delete_resource_pdf/'.$row->id)}}"
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
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->

</div>

@endsection


@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

    $(function () {

        $("#user-list").DataTable({

            "responsive": true,

            "autoWidth": false,

            "ordering": false,

        });

    });

</script>
<script nonce="{{ app('cspNonce') }}">
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.csp-delete-link').forEach(function (link) {
        link.addEventListener('click', function (event) {
            const message = link.getAttribute('data-confirm-message') || 'Are you sure you want to delete?';
            if (!window.confirm(message)) {
                event.preventDefault();
            }
        });
    });
    document.querySelectorAll('.whatsnew-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const now = new Date();
            const localDateTime =
                now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + ' ' +
                String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0') + ':' +
                String(now.getSeconds()).padStart(2, '0');

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = this.href;
            form.target = '_blank';

            const token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = '{{ csrf_token() }}';

            const time = document.createElement('input');
            time.type = 'hidden';
            time.name = 'local_time';
            time.value = localDateTime;

            form.appendChild(token);
            form.appendChild(time);
            document.body.appendChild(form);
            form.submit();
            form.remove();
        });
    });
});
</script>
@endsection