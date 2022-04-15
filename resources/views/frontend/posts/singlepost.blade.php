@extends('frontend.layout.app')
@section('content')
<br><br><br><br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <img src="/uploads/category/{{ $post->image }}" alt="" width="100%">   
        </div>
        <div class="col-lg-10 pt-5">
        <h2>{{$post->title}}</h2>
		<p>{{$post->description}}</p>
        </div>
        <div class="col-lg-2 pt-5 product_price">
        Posted By {{$post->User()->first()->name}}
        </div>
    </div>
</div>
@endsection
