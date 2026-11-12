 <style nonce="{{ app('cspNonce') }}">
     label.col-form-label {
    margin-left: 10px;
}

 @foreach($banners as $banner)
<div class="modal fade" id="banner-info{{$banner->id}}">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
<!--                    <div class="col-12">
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Title</label>
                                <div class="col-sm-12">
                                     <input type="text" class="form-control" id="status" name="status" value="{{$banner->title }}"  readonly  />
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Description</label>
                                <div class="col-sm-12">
                                     <input type="text" class="form-control" id="status" name="status" value="{{$banner->description }}"  readonly  />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group">
                            <label for="Status" class="col-form-label">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="status" name="status" value="{{$banner->status == 1 ? 'Active' : 'In-active'}}"  readonly  />
                            </div>
                        </div>
                    </div>
                        
                    </div>
                <div class="row">
                    <div class="col-12">
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Banner Image</label>
                                <div class="col-sm-12">
                                      <img src="{{asset($banner->image)}}" height="50px" width="50px"/>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
