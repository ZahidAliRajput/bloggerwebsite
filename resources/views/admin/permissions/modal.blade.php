<!-- {{-- Add Modal --}} -->
<div class="modal fade" id="AddPermissionModal" tabindex="-1" aria-labelledby="AddPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddPermissionModalLabel">Add Permission Data</h5>    
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('storepermission') }}" method="POST" id="addPermissionForm">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name='name' required class="name form-control">
                    </div>
                    <input type="hidden" name='guard_name' required class="guard_name form-control" value="web">
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('permission_add')   
                <button type="submit" class="btn btn-primary">Save</button>
                @endcan
            </div>
            </form>
        </div>
    </div>
</div>

<!-- {{-- Update Modal --}} -->
<div class="modal fade" id="UpdatePermission" tabindex="-1" aria-labelledby="UpdatePermission" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdatePermissionModalLabel">Update Permission Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updatepermission') }}" method="POST" id="updatePermissionForm">
                    @csrf
                    <input type="hidden" id="PermissionID" name="id"/>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name='name' required class="form-control" id="PermissionName">
                    </div>
                    <input type="hidden" name='guard_name' required class="form-control" id="PermissionGuardName">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('permission_edit')   
                <button type="submit" class="btn btn-primary update_permission">Update</button>
                @endcan
            </div>
            </form>
        </div>
    </div>
</div>