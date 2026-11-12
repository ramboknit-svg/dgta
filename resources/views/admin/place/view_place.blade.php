 <style nonce="{{ app('cspNonce') }}">
     label.col-form-label {
    margin-left: 10px;
}
 
.csp-thumb-img {
    width: 50px;
}
</style>
 @foreach($places as $place)
<div class="modal fade" id="place-info{{$place->id}}">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="col-12">
                            <div class="form-group">
                                <label for="Name" class="col-form-label">Name</label>
                                <div class="col-sm-12">
                                     <input type="text" class="form-control" id="name" name="name" value="{{$place->name }}"  readonly  />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group">
                            <label for="Status" class="col-form-label">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="status" name="status" value="{{$place->status == 1 ? 'Active' : 'In-active'}}"  readonly  />
                            </div>
                        </div>
                    </div>
                        
                    </div>
                <div class="row">
                    <div class="col-12">
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Place Image</label>
                                <div class="col-sm-12">
                                      <img src="{{asset($place->image)}}" height="50px" width="50px"/>
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
