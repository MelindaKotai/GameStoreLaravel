@extends('layouts.app')
@section('title', 'Cos')
@section('content')


<div class="container mt-5 mb-5 pt-4 pl-3 pr-3 pb-3 text-center" style="min-height: 50vh;background-color: white;border-radius: 20px;">
	@if(session('success'))

	<div class='alert alert-success'> {{ session('success') }} </div>

	@endif
	<table id="cart" class="table table-hover table-condensed">
		 <thead>
			 <tr>
			 <th style="width:50%">Produs</th>
			 <th style="width:10%">Pret</th>
			 <th style="width:8%">Cantitate</th>

			 <th style="width:22%" class="text-center">Subtotal</th>
			 <th style="width:10%"></th>
			 </tr>
		 </thead>
		 <tbody>
			 <?php $total = 0 ?>
			 @if(session('cart'))
			 @foreach(session('cart') as $id => $details)
			 <?php $total += $details['price'] * $details['quantity'] ?>
			 <tr>
			 <td data-th="Product">
			 <div class="row">
			 <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}"
			width="100" height="100" class="img-responsive"/></div>
			 <div class="col-sm-9">
			 <h4 class="nomargin">{{ $details['name'] }}</h4>
			 </div>
			 </div>
			 </td>
			 <td data-th="Price">{{ $details['price'] }} Lei</td>
			 <td data-th="Quantity">
			 	<form action="/update-cart" method="post">
			 		@csrf
			 <input type="number" value="{{ $details['quantity'] }}" class="form-control
			quantity" name="quantity" />
			 </td>
			 <td data-th="Subtotal" class="text-center">{{ $details['price'] *
			$details['quantity'] }} Lei</td>
			 <td class="actions" data-th="">
			 	<input type="hidden" name="id" value="{{ $id }}" >
			 <button class="btn btn-info btn-sm update-cart" type="submit" data-id="{{ $id }}"><i
			class="fa fa-refresh"></i></button>
			</form>
			<form action="/remove-from-cart" method="post">
				@csrf

				<input type="hidden" name="id" value="{{ $id }}">
			 <button type="submit" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
			class="fa fa-trash-o"></i></button>

			</form>
			 </td>
			 </tr>
			 @endforeach
			 @endif
		 </tbody>
		 <tfoot>
			 <tr class="visible-xs">
			 <td class="text-center"><strong>Total {{ $total }}</strong></td>
			 </tr>
			 <tr>

			 <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
			Continuare Cumparaturi</a></td>
			 <td colspan="2" class="hidden-xs"></td>
			 <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
			 </tr>
		 </tfoot>
	 </table>





</div>


@endsection