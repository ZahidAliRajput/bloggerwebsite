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
                        Product Data
                        <a href="{{ route('addproduct') }}" type="button" class="btn btn-primary float-end">Add Product</a>
                        </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                            @foreach($products as $product)
                                <td><img src="/uploads/category/{{ $product->image }}" alt="Product image is here" width="100"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>                              
                                <td>{{$product->Category()->first()->name}}</td>                              
                                <td>{{$product->description}}</td>
                                <td>
                                    <a href="{{ route('editproduct', $product->id ) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteproduct', $product->id ) }}" class="btn btn-danger">Delete</a>
                                </td>
                            @endforeach

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection