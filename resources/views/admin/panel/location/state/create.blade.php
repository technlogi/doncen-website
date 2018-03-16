 <!-- Add Category Modal-->
 <div class="modal fade" id="addStateModel" tabindex="-1" role="dialog" aria-labelledby="addStateModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStateModelLabel"> Create New  State</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        <form name="addStateForm" id="addStateFormId" method="POST" action="" onsubmit="return false">
                <div class="modal-body">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
                      <label for="country_code" class="control-label">Country</label>
                         <select name="country_id" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->key }}">{{ $country->name }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" type="text"  class="form-control" name="name" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit"  class="btn btn-primary pull-right">Create State </button>                
                </div>
        </form>
        </div>
      </div>
    </div>