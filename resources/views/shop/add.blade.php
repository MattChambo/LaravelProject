@extends('master')

@section('title', 'Add new product')
@section('description', 'We will be adding a new product')

@section('styles')
<style type="text/css">
	textarea{
		resize:none;
	}
</style>
@endsection

@section('content')

<h1>Add New Product</h1>

<form id="add-product" method="post" enctype="multipart/form-data" action="/submit-product">
	{!! csrf_field() !!}


	<div class="form-group {{ $errors->has('product_title')? 'has-error' :'' }}">
		<label>Product Title</label>
		<input type="text" class="form-control" name="product_title" value="{{ old('product_title') }}">
		{!!$errors->first('product_title','<span class="help-block">:message</span>')  !!}
	</div>

	<div class="form-group {{ $errors->has('product-description')? 'has-error' :'' }}">
		<label>Product Description</label>
		<textarea name="product_description" class="form-control" placeholder="Product description" row="5">{{ old('product_description') }}</textarea>
		{!!$errors->first('product_description','<span class="help-block">:message</span>')  !!}
	</div>
	<div class="form-group {{ $errors->has('product_image')? 'has-error' :'' }}">
		<label>Product image</label>
		<input type="file" class="form-control" name="product_image" value="{{ old('product_image') }}">
		{!!$errors->first('product_image','<span class="help-block">:message</span>')  !!} 
	</div>
	<div class="form-group {{ $errors->has('product_price')? 'has-error' :'' }}">
		<label>Product Price</label>
		<input type="number" class="form-control" name="product_price" value="{{ old('product_price') }}">
		{!!$errors->first('product_price','<span class="help-block">:message</span>')  !!} 
	</div>
	<div class="form-group {{ $errors->has('product_quantity')? 'has-error' :'' }}">
		<label>Product Quantity</label>
		<input type="number" class="form-control" name="product_quantity" value="{{ old('product_quantity') }}">
		{!!$errors->first('product_quantity','<span class="help-block">:message</span>')  !!} 
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add Product</button>
	</div>
</form>

@endsection

@section('scripts')

@endsection