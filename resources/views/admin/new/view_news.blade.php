 <style nonce="{{ app('cspNonce') }}">
     label.col-form-label {
    margin-left: 10px;
}
 
.csp-thumb-img {
    width: 50px;
}
</style>
 @foreach($news as $new)
<div class="modal fade" id="new-info{{$new->id}}">
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
                                     <input type="text" class="form-control" id="name" name="name" value="{{$new->name }}"  readonly  />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                        <div class="form-group">
                            <label for="Status" class="col-form-label">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="status" name="status" value="{{$new->status == 1 ? 'Active' : 'In-active'}}"  readonly  />
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
