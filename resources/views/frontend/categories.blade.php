@extends('frontend.layout.app')
@section('content')

<br><br>
<br><br>
<br><br>
<br><br>
<div class="container">
    <div class="row">
        <div class="offset-lg-3"></div>
        <div class="col-lg-6 text-center">
            <h3>Categories</h3>
            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        @foreach($categories as $category)
        <a href="{{  route('categoryposts', $category->id ) }}" style="text-decoration: none; color:black">    
        <div class="card">
                <div class="card-body">
                {{$category->name}}
                </div>
        </div>
         </a>
            <br>
            @endforeach
        </div>
    </div>
</div>

        <h4></h4>
        

@endsection


