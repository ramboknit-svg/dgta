@extends('admin.index')

@section('after-style')

<style nonce="{{ app('cspNonce') }}">
    .csp-add-link {
        float: right;
    }

    .csp-add-link-icon {
        font-size: 25px;
    }

    .csp-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .csp-thumb-img {
        width: 100px;
    }

    .csp-pdf-icon {
        width: 60px;
    }

    .csp-text-center {
        text-align: center;
    }

    .csp-error-text {
        color: red;
    }

    .csp-w-100 {
        width: 100%;
    }

    .csp-preview-img-sm {
        width: 100px;
        margin-top: 10px;
    }

    .csp-preview-img-lg {
        max-width: 200px;
        margin-top: 10px;
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
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Manage New</li>
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
                                <h3 class="card-title">Whats New List</h3>

                                <a href="{{url('admin/new_add')}}" class="csp-add-link"><i class="fas fa-plus-square csp-add-link-icon"></i></a>
                            </div>
                            @if(session('message'))
                                <div class="alert alert-success csp-success-alert">{{ session('message') }}</div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="news-list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Name</th>
                                            <th>Thumbnail</th> 
                                            
                                            <th data-orderable="false">Status</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($news) && $news != null)
                                         @php($count=1)
                                            @foreach($news as $new)
                                                <tr>
                                                    <td>{{$count++}}</td>                            
                                                    <td>{{$new->name}}</td>
                                                     <td>
    <?php
        if (!empty($new->image)) {
            $ext = strtolower(pathinfo($new->image, PATHINFO_EXTENSION));
        } else {
            echo "No PDF";
            $ext = '';
        }
    ?>

    @if($ext == 'pdf')
        <!-- 📄 PDF Icon Preview -->
        <!-- <a href="{{ asset($new->image) }}" target="_blank" title="View PDF">
            <img src="{{asset('/public/images/pdf.png')}}" alt="PDF File" class="csp-pdf-icon">
        </a> -->
         <a href="{{ route('whatsnew.download', $new->id ?? 0) }}"
                                   class="news-paper-link d-block whatsnew-link"
                                   target="_blank"
                                   data-id="{{ $new->id }}">
                                   <img src="{{asset('/public/images/pdf.png')}}" alt="PDF File" class="csp-pdf-icon">
    </a>
    @elseif(!empty($new->image))
        <span>No PDF</span>
    @endif
</td>
                                                    
                                                    
                                                    <td class="status">{{isset($new->status) && $new->status == 1 ? 'Active' : 'In-active'}}</td>
                                                    
                                                    <td class="csp-text-center">
                                                        
                                                        <a href="{{url('admin/new_edit/'.$new->id)}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>
                                                        <a href="{{url('admin/new_delete/'.$new->id)}}" class="csp-delete-link" data-confirm-message="Are you sure you want to delete?" ><i class="fas fa-trash"></i></a>
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
