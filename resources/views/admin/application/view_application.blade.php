 <style nonce="{{ app('cspNonce') }}">
     label.col-form-label {
    margin-left: 10px;
}

 @foreach($applications as $application)
<div class="modal fade" id="application-info{{$application->id}}">
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
                                     <input type="text" class="form-control" id="name" name="name" value="{{$application->name }}"  readonly  />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="Link" class="col-form-label">Link</label>
                                <div class="col-sm-12">
                                     <input type="text" class="form-control" id="link" name="link" value="{{$application->link }}"  readonly  />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group">
                            <label for="Status" class="col-form-label">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="status" name="status" value="{{$application->status == 1 ? 'Active' : 'In-active'}}"  readonly  />
                            </div>
                        </div>
                    </div>
                        
                    </div>
                <div class="row">
                    <div class="col-12">
                            <div class="form-group">
                                <label for="Description" class="col-form-label">Application Image</label>
                                <div class="col-sm-12">
                                      <img src="{{asset($application->image)}}" height="50px" width="50px"/>
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
