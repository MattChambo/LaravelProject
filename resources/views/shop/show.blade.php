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

<form action="" method="post">
	<select name="size">
		<option value="sm">Small</option>
	</select>
	<input type="number" name="quantity" min="0" max="10">
	<button type="submit">Add to cart</button>
</form>

@endsection

@section('scripts')

@endsection