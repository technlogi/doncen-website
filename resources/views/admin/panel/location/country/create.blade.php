 <!-- Add Category Modal-->
 <div class="modal fade" id="addCountryModel" tabindex="-1" role="dialog" aria-labelledby="addCountryModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCountryModelLabel"> Create New  Country</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        <form name="addCountryForm" id="addCountryFormId" method="POST" action="" onsubmit="return false">
                <div class="modal-body">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name"  autofocus>
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="country_code" class="control-label">Country Code</label>
                        <input id="country_code" type="text"  class="form-control" name="country_code" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit"  class="btn btn-primary pull-right">Create Country </button>                
                </div>
        </form>
        </div>
      </div>
    </div>