 <!-- Add Category Modal-->
 <div class="modal fade" id="addSubCategoryModel" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addSubCategoryModelLabel"> Create New  Sub-Category</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        <form name="addSubCategory" id="addSubCategoryId" method="POST" action="" onsubmit="return false">
            <div class="modal-body">
                    {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>
                    <input id="name" type="text" class="form-control" name="name"  autofocus>
                </div>
                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Category</label>
                <select  class="form-control" name="id" id="id">
                    @foreach($categories as $category)
                    <option value="{{$category->key}}">{{$category->name}}</option>
                    @endforeach
                </select> 
                </div>  
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit"  class="btn btn-primary pull-right">Create Sub-Category </button>                
            </div>
        </form>
        </div>
      </div>
    </div>
   