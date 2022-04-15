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
            <h6 class="mb-0 text-uppercase">Add Product</h6>
            <a href="{{ route('products') }}" class="btn btn-primary float-end" style="margin-top: -28px;">Back to Listing</a>
            <hr>
            <form class="row g-3" action="{{ route('postproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-6">
                    <label class="form-label">Price</label>
                    <input name="price" type="number" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Category</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <!-- <input type="text" > -->
                    <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-6">
                </div>

                <div class="col-2">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection