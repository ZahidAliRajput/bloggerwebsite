<!-- {{-- Add Modal --}} -->
<div class="modal fade" id="AddCategoryModal" tabindex="-1" aria-labelledby="AddCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddCategoryModalLabel">Add Category Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('storecategory') }}" method="POST" id="addCategoryForm">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name='name' required class="name form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('category_add')  
                <button type="submit" class="btn btn-primary add_category">Save</button>
                @endcan
            </div>
            </form>
        </div>
    </div>
</div>



<!-- {{-- Update Modal --}} -->
<div class="modal fade" id="UpdateCategory" tabindex="-1" aria-labelledby="UpdateCategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateCategoryModalLabel">Update Category Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updatecategory') }}" method="POST" id="updateCategoryForm">
                    @csrf
                    <input type="hidden" id="CategoryID" name="id"/>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name='name' required class="form-control" id="CategoryName">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('category_edit')    
                <button type="submit" class="btn btn-primary update_category">Save</button>
                @endcan
            </div>
            </form>
        </div>
    </div>
</div>