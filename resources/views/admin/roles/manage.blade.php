@extends('admin.layout.app')
@extends('admin.roles.modal')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Roles 
                        @can('role_add')
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddRoleModal">Add Role</button>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    @can('role_edit')    
                                    <a href="javascript:;" class="btn btn-primary" onclick="editRole( {{ $role->id }} )">Edit</a>
                                    @endcan

                                    @can('role_delete')
                                    <a href="{{ route('deleterole',$role->id ) }}" class="btn btn-warning">Delete</a>
                                    @endcan
                                    @can('role_has_permission')
                                    <a href="{{ route('rolepermissions',$role->id ) }}" class="btn btn-success">Permissions</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function editRole(id) {

        $.ajax({
            type: "GET",
            url: "{{ url('editrole') }}/" + id,
            success: function(response) {
                $("#RoleID").val(response['id']);
                $("#RoleName").val(response['name']);
                $("#RoleGuardName").val(response['guard_name']);
                $("#UpdateRole").modal('show');
            },
        });
    }
</script>
@endpush
@endsection