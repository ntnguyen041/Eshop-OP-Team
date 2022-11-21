@extends('layouts.app')
@section('content')
<body>


 
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">


<!-- ============================  FILTER TOP  ================================= -->
 
<div class="row">
	<aside class="col-md-2">

	<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_1">Category</a>
		</h6>
		<div class="filter-content collapse show" id="collapse_1" style="">
			<div class="inner">
				<ul class="list-menu" id="Categorylist">
					<li><a href="#">Shorts  </a></li>
				</ul>
			</div> <!-- inner.// -->
		</div>
	</article> <!-- filter-group  .// -->
	<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_2"> Brands </a>
		</h6>
		<div class="filter-content collapse show" id="collapse_2">
			<div class="inner" id="getbrand"> 
			</div> <!-- inner.// -->
		</div>
	</article> <!-- filter-group .// -->
	<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_3"> Price range </a>
		</h6>
		<div class="filter-content collapse show" id="collapse_3">
			<div class="inner">
				<input type="range" class="custom-range" min="0" max="100" name="">
				<div class="form-row">
				<div class="form-group col-md-6">
				  <label>Min</label>
				  <input class="form-control" placeholder="$0" type="number">
				</div>
				<div class="form-group text-right col-md-6">
				  <label>Max</label>
				  <input class="form-control" placeholder="$1,0000" type="number">
				</div>
				</div> <!-- form-row.// -->
				<button class="btn btn-block btn-primary">Apply</button>
			</div> <!-- inner.// -->
		</div>
	</article> <!-- filter-group .// -->
	  <!-- filter-group .// -->
 

	</aside> <!-- col.// -->
	<main class="col-md-10">


<header class="mb-3">
		<div class="form-inline">
			<strong class="mr-md-auto">32 Items found </strong>
			<select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select>
			<div class="btn-group">
				<a href="page-listing-grid.html" class="btn btn-light" data-toggle="tooltip" title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a href="page-listing-large.html" class="btn btn-light active" data-toggle="tooltip" title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div>
		</div>
</header><!-- sect-heading -->


<article class="card card-product-list" id="getproduct">
	{{-- <div class="row no-gutters">
		<aside class="col-md-3">
			<a href="#" class="img-wrap">
				<span class="badge badge-danger"> NEW </span>
				<img src="images/items/1.jpg">
			</a>
		</aside> <!-- col.// -->
		<div class="col-md-6">
			<div class="info-main">
				<a href="#" class="h5 title"> Hot sale unisex New Design Shirt</a>
				<div class="rating-wrap mb-2">
					<ul class="rating-stars">
						<li style="width:100%" class="stars-active"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</li>
						<li>
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</li>
					</ul>
					<div class="label-rating">9/10</div>
				</div> <!-- rating-wrap.// -->
			
				<p class="mb-3">
					<span class="tag"> <i class="fa fa-check"></i> Verified</span> 
					<span class="tag"> 5 Years </span> 
					<span class="tag"> 80 reviews </span>
					<span class="tag"> Russia </span>
				</p>

				<p> Take it as demo specs, ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim  sint occaecat cupidatat non
				proident, sunt in culpa qui laborum.... </p>

			</div> <!-- info-main.// -->
		</div> <!-- col.// -->
		<aside class="col-sm-3">
			<div class="info-aside">
				<div class="price-wrap">
					<span class="h5 price">$25.00-$40.00</span> 
					<small class="text-muted">/per item</small>
				</div> <!-- price-wrap.// -->
				<small class="text-warning">Paid shipping</small>
				
				<p class="text-muted mt-3">Grand textile Co</p>
				<p class="mt-3">
					<a href="#" class="btn btn-outline-primary"> <i class="fa fa-envelope"></i> Contact supplier </a>
					<a href="#" class="btn btn-light"><i class="fa fa-heart"></i> Save </a>
				</p>

				<label class="custom-control mt-3 custom-checkbox">
					  <input type="checkbox" class="custom-control-input">
				  	  <div class="custom-control-label">Add to compare
				  </div>
				</label>

			</div> <!-- info-aside.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// --> --}}
</article> <!-- card-product .// -->


<nav class="mb-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>


 


	</main> <!-- col.// -->

</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION SUBSCRIBE  ========================= -->
 
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->


<!-- ========================= FOOTER ========================= -->
 
<!-- ========================= FOOTER END // ========================= -->


<script src="user/assets/js/product/index.js"></script>
</body>
@endsection