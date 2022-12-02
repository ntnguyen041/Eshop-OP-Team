@extends('layouts.app')

@section('content')




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<main class="col-md-9">
<div class="card">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody id="cartItem">
<!-- cartitem -->
</tbody>
</table>

<div class="card-body border-top">
	<a id="deleteAll" class="btn btn-primary float-md-right"> Remove all </a>
	<a href="/shop" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
</div>	
</div> <!-- card.// -->

<div class="alert alert-success mt-3">
	<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
</div>

	</main> <!-- col.// -->
	<aside class="col-md-3">
		<div class="card mb-3">
			<div class="card-body">
			<form onsubmit="return false">
			@csrf
				<div class="form-group">
					<label>Information Delivery</label>
					<div class="input-group">
						<input id="address" type="text" class="form-control" name="ShoppingAddress" placeholder="ShoppingAddress">
					</div>
					<div class="input-group">
						<input id="phone" type="text" class="form-control" name="ShoppingPhone" placeholder="ShoppingPhone">
					</div>	
					<span id="errcreate"></span>					
						<span class="input-group-append"> 
							<button id="odernow" type="submit" class="btn btn-primary">Oder now</button>
						</span>
				</div>
			</form>
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Total price:</dt>
					  <dd id="total" class="text-right">VND</dd>
					</dl>
					<hr>
					<p class="text-center mb-3">
						<img src="user/assets/images/misc/payments.png" height="26">
					</p>
					
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name border-top padding-y">
<div class="container">
<h6>Payment and refund policy</h6>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->


<!-- ========================= FOOTER ========================= -->
 
<!-- ========================= FOOTER END // ========================= -->
<script src="{{asset('user/assets/js/cart/order.js')}}"></script>
<script src="{{asset('user/assets/js/cart/showcart.js')}}"></script>
<script src="{{asset('user/assets/js/userDT/index.js')}}"></script>


@endsection
