 <!-- Add Category Modal-->
 <div class="modal fade" id="addCategoryModel" tabindex="-1" role="dialog" aria-labelledby="addCategoryModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModelLabel"> Create New  Category</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        <form name="addCtegoryForm" id="addCtegoryFormId" method="POST" action="" onsubmit="return false"  enctype="multipart/form-data">
                <div class="modal-body">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name"  autofocus>
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="control-label">Title</label>
                        <input id="title" type="text"  class="form-control" name="title" >
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="control-label">Image</label>
                        <input id="image" type="file" name="image"  class="form-control"  autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit"  class="btn btn-primary pull-right">Create Category </button>                
                </div>
        </form>
        </div>
      </div>
    </div>
   