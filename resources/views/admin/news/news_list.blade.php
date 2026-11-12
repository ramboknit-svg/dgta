@extends('admin.index')

@section('after-style')
<style nonce="{{ app('cspNonce') }}">

.csp-add-link { float: right; }
.csp-add-link i { font-size: 25px; }
.csp-success-alert { padding: 5px 20px; margin-bottom: 5px; }
.csp-thumb-100 { width: 100px; }
.csp-thumb-60 { width: 60px; }
.csp-action-cell { text-align: center; }

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
                            <li class="breadcrumb-item active">Manage Our Milestones</li>
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
                                <h3 class="card-title">Our Milestones</h3>

                                <a href="{{url('admin/news_add')}}" class="csp-add-link"><i class="fas fa-plus-square"></i></a>
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
                                            <th>Description</th>
                                            <th>Image</th> 
                                            
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
                                                   
                                                    <td>{!!$new->name!!}</td>
                                                     <td>
                                                         <img src="{{asset($new->image)}}" height="50px" width="50px"/>   
                                                    </td> 
                                                     
                                                    
                                        
                                                    
                                                    <td class="status">{{isset($new->status) && $new->status == 1 ? 'Active' : 'In-active'}}</td>
                                                    
                                                    
                                                    <td class="csp-action-cell">
                                                        
                                                        <a href="{{url('admin/news_edit/'.$new->id)}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>
                                                        <a href="{{url('admin/news_delete/'.$new->id)}}" class="csp-delete-confirm" ><i class="fas fa-trash"></i></a>
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
    document.querySelectorAll('.csp-delete-confirm').forEach(function(link) {
        link.addEventListener('click', function (event) {
            if (!confirm('Are you sure you want to delete?')) {
                event.preventDefault();
            }
        });
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
</script>
@endsection