@extends('master')

@section('title', '')
@section('description', '')

@section('styles')

@endsection

@section('content')
<h1>This is our Shopping Cart for {{\Auth::user()->name}}</h1>

	@if(count($Cart) > 0)
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:50%">Product</th>
					<th style="width:10%">Price</th>
					<th style="width:10%">Quantity</th>
					<th style="width:20%">Subtotal</th>
					<th style="width:10%"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($Cart as $CartRow)
					<tr>
						<td><a href="/Shop/{{$CartRow->product_id}}">{{ $CartRow->product->title }}</a> - Size {{ $CartRow->size}}</td>
						<td>{{ $CartRow->product->price}}</td>
						<td>{{ $CartRow->quantity }}</td>
						<td>{{ $CartRow->subtotal }}</td>
						<td><a href="/Cart/Remove/{{$CartRow->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					
					<td><strong>Grandtotal</strong></td>
					<td><strong>{{ $Grandtotal }}</strong></td>
					<td></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td><a href="/Shop" class="btn btn-warning">Continue Shoping</a></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a href="/Checkout/{{ \Auth::user()->id }}" class="btn btn-success">Checkout</a></td>
				</tr>
			</tfoot>


		</table>
	@else
		<p>Your shopping cart is empty!</p>

	@endif

@endsection

@section('scripts')

@endsection