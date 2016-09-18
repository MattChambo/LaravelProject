@extends('master')

@section('title', 'Single Product')
@section('description', 'This is a single product')

@section('styles')

@endsection

@section('content')
<div class="col-xs-12">
	<p><a class="btn btn-danger" href="Delete-product/{{$product->id}}">Delete Product</a></p>
</div>


<div class="col-md-6 col-xs-12">
	<img class="img-responsive" src="/images/Products/{{$product->image}}">
</div>
<div class="col-md-6 col-xs-12">
	<h1>{{$product->title}}</h1>
	<h2>${{$product->price}}</h2>
	<p>{{$product->description}}</p>
</div>
@endsection

@section('scripts')

@endsection