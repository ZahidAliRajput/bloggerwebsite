<!-- {{-- Add Modal --}} -->
<div class="modal fade" id="AddRoleModal" tabindex="-1" aria-labelledby="AddRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddRoleModalLabel">Add Role Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('storerole') }}" method="POST" id="addRoleForm">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name='name' required class="name form-control">
                    </div>
                    <input type="hidden" name='guard_name' required class="guard_name form-control" value="web">
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('role_add')        
                <button type="submit" class="btn btn-primary">Save</button>
                @endcan
            </div>
            </form>
        </div>
    </div>
</div>

<!-- {{-- Update Modal --}} -->
<div class="modal fade" id="UpdateRole" tabindex="-1" aria-labelledby="UpdateRole" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateRoleModalLabel">Update Role Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updaterole') }}" method="POST" id="updateRoleForm">
                    @csrf
                    <input type="hidden" id="RoleID" name="id"/>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name='name' required class="form-control" id="RoleName">
                    </div>
                    <input type="hidden" name='guard_name' required class="form-control" id="RoleGuardName">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('role_edit')   
                <button type="submit" class="btn btn-primary">Update</button>
                @endcan
            </div>
            </form>
        </div>
    </div>
</div>