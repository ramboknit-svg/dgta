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
                            <li class="breadcrumb-item active">Manage Place</li>
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
                                <h3 class="card-title">Place List</h3>

                                <!-- <a href="{{url('admin/place_add')}}" class="csp-add-link"><i class="fas fa-plus-square csp-add-link-icon"></i></a> -->
                            </div>
                            @if(session('message'))
                                <div class="alert alert-success csp-success-alert">{{ session('message') }}</div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="place-list" class="table table-bordered table-striped">
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
                                        @if(isset($places) && $places != null)
                                         @php($count=1)
                                            @foreach($places as $place)
                                                <tr>
                                                    <td>{{$count++}}</td>
                                                    <td>{{$place->name}}</td>
                                                     <td>
                                                          <?php
                                                    if(!empty($place->image)){
                                                        $ext = pathinfo($place->image, PATHINFO_EXTENSION);
                                                    }
                                                    else{
                                                       echo "No Image";
                                                    }                     
                                                ?>
                                               
                                                @if($ext!='mp4')
                                                    <img  class="csp-thumb-img" src="{{ asset("{$place->image}") }}">
                                                @else
                                                    <video width="70%" controls>
                                                        <source src="{{asset("{$place->image}") }}" type="video/mp4">
                                                            
                                                    </video>  
                                                  
                                                @endif 
                                                       
                                                       
                                                    </td> 
                                                    
                                                    <td class="status">{{isset($place->status) && $place->status == 1 ? 'Active' : 'In-active'}}</td>
                                                    
                                                    <td class="csp-text-center">
                                                         
                                                        <a href="{{url('admin/place_edit/'.$place->id)}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>
                                                        <a href="{{url('admin/place_delete/'.$place->id)}}" class="csp-delete-link" data-confirm-message="Are you sure you want to delete?" ><i class="fas fa-trash"></i></a>
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
});
</script>
@endsection
