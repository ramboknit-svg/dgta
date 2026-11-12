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
                            <li class="breadcrumb-item active">Manage Application</li>
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
                                <h3 class="card-title">Application List</h3>

                                <a href="{{url('admin/application_add')}}" class="csp-add-link"><i class="fas fa-plus-square"></i></a>
                            </div>
                            @if(session('message'))
                                <div class="alert alert-success csp-success-alert">{{ session('message') }}</div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="application-list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Name</th>
                                            <th>Thumbnail</th> 
                                            <th>Link</th>
                                            <th data-orderable="false">Status</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($applications) && $applications != null)
                                         @php($count=1)
                                            @foreach($applications as $application)
                                                <tr>
                                                    <td>{{$count++}}</td>                            
                                                    <td>{{$application->name}}</td>
                                                     <td>
                                                          <?php
                                                    if(!empty($application->image)){
                                                        $ext = pathinfo($application->image, PATHINFO_EXTENSION);
                                                    }
                                                    else{
                                                       echo "No Image";
                                                    }                     
                                                ?>
                                               
                                                @if($ext!='mp4')
                                                    <img class="csp-thumb-100" src="{{ asset("{$application->image}") }}">
                                                @else
                                                    <video width="70%" controls>
                                                        <source src="{{asset("{$application->image}") }}" type="video/mp4">
                                                            
                                                    </video>  
                                                  
                                                @endif 
                                                       
                                                       
                                                    </td> 
                                                    <td>{{$application->link}}</td>
                                                    
                                                    <td class="status">{{isset($application->status) && $application->status == 1 ? 'Active' : 'In-active'}}</td>
                                                    
                                                    <td class="csp-action-cell">
                                                        
                                                        <a href="{{url('admin/application_edit/'.$application->id)}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>
                                                        <a href="{{url('admin/application_delete/'.$application->id)}}" class="csp-delete-confirm" ><i class="fas fa-trash"></i></a>
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
