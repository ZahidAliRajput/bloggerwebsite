@extends('admin.layout.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">

            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <h6 class="mb-0 text-uppercase">Update Post</h6>
            <hr>
            <form class="row g-3" action="{{ route('updatepost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="col-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Category</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        @php $selected = ""; @endphp
                        @if($category->id == $post->category_id)
                        @php $selected = "Selected"; @endphp
                        @endif
                        <option value="{{ $category->id }}" {{ $selected }}> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <!-- <input type="text" > -->
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ $post->description }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-6">
                </div>

                <div class="col-2">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection