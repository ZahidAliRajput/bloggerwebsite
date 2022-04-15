@extends('admin.layout.app')

@extends('admin.permissions.modal')
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
                        Permission Data
                        @can('permission_add')
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddPermissionModal">Add Permission</button>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <!-- <th>Guard</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>
                                     @can('permission_edit')                       
                                    <a href="javascript:;" class="btn btn-primary" onclick="editPermission( {{ $permission->id }} )">Edit</a>
                                    @endcan
                                    @can('permission_delete')
                                    <a href="{{ route('deletepermission',$permission->id ) }}" class="btn btn-warning">Delete</a>
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
    function editPermission(id) {

        $.ajax({
            type: "GET",
            url: "{{ url('editpermission') }}/" + id,
            success: function(response) {
                // console.log(response)
                $("#PermissionID").val(response['id']);
                $("#PermissionName").val(response['name']);
                $("#PermissionGuardName").val(response['guard_name']);
                $("#UpdatePermission").modal('show');
            },
        });
    }
</script>
@endpush
@endsection