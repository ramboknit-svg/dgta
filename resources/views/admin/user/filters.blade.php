<div class="row" style="padding: 10px;">
    <div class="col-4">
        <div class="text-left">
            <label for="device_type" class="form-control-label">Device Type</label>
        </div>
        <select class="form-control" name="device_type" id="device_type">
            <option value="">Select Device Type</option>
            <option value="1">iOS</option>
            <option value="2">Android</option>
        </select>

    </div>
    <div class="col-4">
        <div class="text-left">
            <label class="form-control-label" for="verified">Registration Status</label>
        </div>
        <select class="form-control" name="verified" id="verified">
            <option value="">Select registration status</option>
            <option value="0">Not-verified</option>
            <option value="1">Verified</option>
        </select>

    </div>
    <div class="col-4">
        <div class="text-left">
            <label class="form-control-label" for="status">User Status</label>
        </div>

        <select class="form-control" name="status" id="status">
            <option value="">Select user status</option>
            <option value="0">In-active</option>
            <option value="1">Active</option>            
        </select>

    </div>
</div>
<div class="row" style="padding:10px;">
    <div class="col-6">
        <button type="submit" class="btn btn-success" id="filter" name="filter">
            <span>Apply Filters</span>
        </button>
        <button type="button" class="btn btn-danger" id="reset" name="reset">
            <span>Reset Filters</span>
        </button>
    </div>
</div>

<div class="clearfix"></div>