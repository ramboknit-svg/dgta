@extends('admin.index')

@section('after-style')

   

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
                            <li class="breadcrumb-item active">Manage Dgta Detail</li>
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
                                <h3 class="card-title">Dgta Detail List</h3>

                              
                            </div>
                            @if(session('message'))
                                <div class="alert alert-success" >{{ session('message') }}</div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="hod-list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Profile Description</th>
                                            <th>Left Image</th> 
                                            <th>Right Image</th> 
                                            <th data-orderable="false">Status</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($hods) && $hods != null)
                                         @php($count=1)
                                            @foreach($hods as $hod)
                                                <tr>
                                                    <td>{{$count++}}</td>
                                                    
                                                   
                                                    <td>{!!$hod->long_description!!}</td>
                                                     
                                                    <td> 
                                                 
                                                       <img src="{{asset($hod->left_image)}}" height="50px" width="50px"/>
                                                    </td> 
                                                     <td> 
                                                 
                                                       <img src="{{asset($hod->right_image)}}" height="50px" width="50px"/>
                                                    </td> 
                                                    
                                                    <td class="status">{{isset($hod->status) && $hod->status == 1 ? 'Active' : 'In-active'}}</td>
                                                    
                                                    <td>
                                                        
                                                        <a href="{{url('admin/dgta_edit/'.$hod->id)}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>
                                                       
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

