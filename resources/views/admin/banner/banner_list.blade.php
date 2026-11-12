@extends('admin.index')

@section('after-style')
<style nonce="{{ app('cspNonce') }}">
    .banner-add-link {
        float: right;
    }

    .banner-add-link i {
        font-size: 25px;
    }

    .banner-success-alert {
        padding: 5px 20px;
        margin-bottom: 5px;
    }

    .banner-thumb-img {
        width: 100px;
    }

    .banner-thumb-video {
        width: 70%;
    }

    .banner-action-cell {
        text-align: center;
    }

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
                            <li class="breadcrumb-item active">Manage Banner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Banner List</h3>

                                <a href="{{url('admin/banner_add')}}" class="banner-add-link">
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            </div>

                            @if(session('message'))
                                <div class="alert alert-success banner-success-alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <table id="banner-list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <!-- <th>Title</th> -->
                                            <th>Description</th>
                                            <th>Thumbnail</th>
                                            <th data-orderable="false">Status</th>
                                            <th data-orderable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($banners) && $banners != null)
                                            @php($count=1)
                                            @foreach($banners as $banner)
                                                <tr>
                                                    <td>{{$count++}}</td>

                                                    <!-- <td>{{$banner->title}}</td> -->
                                                    <td>{!! $banner->description !!}</td>

                                                    <td>
                                                        <?php
                                                            $ext = '';
                                                            if (!empty($banner->image)) {
                                                                $ext = pathinfo($banner->image, PATHINFO_EXTENSION);
                                                            } else {
                                                                echo "No Image";
                                                            }
                                                        ?>

                                                        @if(!empty($banner->image))
                                                            @if($ext != 'mp4')
                                                                <img class="banner-thumb-img" src="{{ asset($banner->image) }}">
                                                            @else
                                                                <video class="banner-thumb-video" controls>
                                                                    <source src="{{ asset($banner->image) }}" type="video/mp4">
                                                                </video>
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td class="status">
                                                        {{ isset($banner->status) && $banner->status == 1 ? 'Active' : 'In-active' }}
                                                    </td>

                                                    <td class="banner-action-cell">
                                                        <a href="{{url('admin/banner_edit/'.$banner->id)}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        &nbsp;&nbsp;
                                                        <a href="{{url('admin/banner_delete/'.$banner->id)}}" class="csp-delete-confirm">
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
