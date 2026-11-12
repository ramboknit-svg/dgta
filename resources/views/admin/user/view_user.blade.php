@foreach($users as $user)
<div class="modal fade" id="user-info{{$user->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$user->name}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4" style="display: none">
                        <div class="form-group">
                            <label for="Name" class="col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="Email" class="col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="Last Name" class="col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="type" name="type" value="{{$user->type == 3 ? 'Store Customer' : 'User'}}" disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="Mobile" class="col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" disabled />
                            </div>
                        </div>
                    </div>
                   <!--  <div class="col-4">
                        <div class="form-group">
                            <label for="Address" class="col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" disabled />
                            </div>
                        </div>
                    </div> -->

                    <div class="col-4">
                        <div class="form-group">
                            <label for="DeviceType" class="col-form-label">Device Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="device_type" name="device_type" value="{{$user->device_type == 1 ? 'iOS' : 'Android'}}" disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="DeviceToken" class="col-form-label">Device Token</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="device_token" name="device_token" value="{{$user->device_token}}" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="Status" class="col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status" name="status" value="{{$user->status == 1 ? 'Active' : 'In-active'}}" disabled />
                            </div>
                        </div>
                    </div>
                </div>

               <!--  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ProfileImage" class="col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <img src="{{asset($user->profile_image) ?? asset('public/images/user-logo.png')}}" style="width:50px;" />
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach