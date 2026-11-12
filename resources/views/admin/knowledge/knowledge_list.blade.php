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
                            <li class="breadcrumb-item active">Manage Knowledge</li>
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
                                <h3 class="card-title">Knowledge List</h3>

                                <!-- <a href="{{url('admin/knowledge_add')}}" style="float: right;"><i class="fas fa-plus-square" style="font-size:25px;"></i></a> -->
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
                                            
                                            <th>Thumbnail</th> 
                                            <!-- <th>Link</th>  -->
                                            <th data-orderable="false">Status</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($knows) && $knows != null)
                                         @php($count=1)
                                            @foreach($knows as $know)
                                                <tr>
                                                    <td>{{$count++}}</td>                            
                                                    
                                                     <td>
                                                         
                                                 
                                                       <img src="{{asset($know->image)}}" height="50px" width="50px"/>
                                                    </td> 
                                                    <!-- <td>{{$know->link}}</td> -->
                                                    
                                                    <td class="status">{{isset($know->status) && $know->status == 1 ? 'Active' : 'In-active'}}</td>
                                                    
                                                    <td class="csp-action-cell">
                                                         
                                                        <a href="{{url('admin/knowledge_edit/'.$know->id)}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>
                                                        
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

</script>
@endsection
