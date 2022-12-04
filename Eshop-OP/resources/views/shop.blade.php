@extends('layouts.app')
@section('content')
 
<body> 
<!-- sect-heading -->
<section class="section-content padding-y">
	<div class="container">
	<div class="row justify-content-md-center">
		<aside class="col-md-2">
			<article class="filter-group">
				<h6 class="title"><a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_1">Category</a></h6>
					<div class="filter-content collapse show" id="collapse_1" >
						<div class="inner">
							<ul class="list-menu" id="Categorylist"></ul>
						</div> <!-- inner.// -->
					</div>
			</article> 
			<article class="filter-group">
				<h6 class="title">
					<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_2"> Brands </a>
				</h6>
				<div class="filter-content collapse show" id="collapse_2">
					<div class="inner" id="getbrand"> 
					</div> <!-- inner.// -->
					<button class="btn btn-primary" id="getidbrand" type="button">Áp dụng</button>
				</div>
			</article>
					
		</aside><!-- filter-group  .// -->
	
	 <!-- col.// -->

		<main class="col-md-9">
			<header class="mb-3">
				<div class="form-inline">
					<strong class="mr-md-auto" >Sản phẩm được tim thấy<span id="countitem">0</span></strong>
					<form class="search-header" onsubmit="return false">
						<div class="input-group w-100">
							<input type="text" id="searchSting" class="form-control" name="name" placeholder="Search">
							<div class="input-group-append">
							  <button id="searchbutton"class="btn btn-primary" type="submit">
								<i class="fa fa-search"></i> Search
							  </button>
							</div>
						</div>
					</form>
				</div>
		</header>
			<article class="card">
				<div class="card-body">
					<div class="row" id="getproduct"></div> 
				</div>
			</article>
 
		</main> <!-- col.// -->
	</div>
 
	</div> <!-- container .//  -->
	</section>

<script src="{{asset('user/assets/js/product/index.js')}}"></script>
<script src="{{asset('user/assets/js/cart/showcart.js')}}"></script>
 
</body>
@endsection