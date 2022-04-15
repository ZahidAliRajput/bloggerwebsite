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
                        User {{ $user->name }} has permissions
                        <a href="javascript:;" class="btn btn-primary float-end checkAll" onclick="check()">Check all</a>
                        <!-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddRoleModal">Add Role</button> -->
                    </h4>
                </div>
                <form  action="{{ route('userhaspermissionupdate') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach($permissions as $permission)
                            @php $checked = ""; @endphp    
                                    @foreach($userPermissions as $userPermission)
                                        @if($permission->id == $userPermission->id)
                                            @php 
                                                $checked = "checked";
                                            @endphp
                                        @endif
                                    @endforeach
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>
                                    <input type="checkbox" name="UserPermissionIDs[]" value="{{ $permission->id }}" {{ $checked }}>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @can('user_has_permission')
                <button type="submit" class="btn btn-primary float-end">Save</button>  
                @endcan
            </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function check(){  
       var ele=document.getElementsByName('UserPermissionIDs[]');  
       for(var i=0; i<ele.length; i++){  
           if(ele[i].type=='checkbox')  
               ele[i].checked=true;  
       }  
   }
</script>
@endpush
@endsection