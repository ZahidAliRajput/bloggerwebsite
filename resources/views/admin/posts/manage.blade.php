@extends('admin.layout.app')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Posts 
                        <a href="{{ route('addpost') }}" type="button" class="btn btn-primary float-end">Add Post</a>
                        </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                 @role('Admin')       
                                <th>Post by</th>
                                @endrole
                                <!-- <th>Description</th>  -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            
                            @foreach($posts as $post)
                            <tr>
                                <td><img src="/uploads/category/{{ $post->image }}" alt="Post image is here" width="100"></td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->Category()->first()->name}}</td>
                                @role('Admin')
                                <td>{{$post->User()->first()->name}}</td>
                                @endrole
                                <!-- <td>{{$post->description}}</td> -->
                                <td>
                                    <a href="{{ route('editpost', $post->id ) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletepost', $post->id ) }}" class="btn btn-danger">Delete</a>
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

@endsection



