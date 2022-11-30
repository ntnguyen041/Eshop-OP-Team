@extends('layouts.app')
@section('content')
 
<!------ Include the above in your HEAD tag ---------->
 
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
	</article>
	 <!-- filter-group .// -->
	 <!-- filter-group .// -->
	  <!-- filter-group .// -->
 

	</aside> <!-- col.// -->
	<main class="col-md-10">


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
</header><!-- sect-heading -->


<article class="card card-product-list" id="getproduct"></article> <!-- card-product .// -->


<nav class="mb-4" aria-label="Page navigation sample">
	<button id="backproduct"class="btn btn-primary" type="button"> Back</button>
	<button id="nextproduct"class="btn btn-primary" type="button"> Next</button>
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


<script src="{{asset('user/assets/js/product/index.js')}}"></script>
 
</body>
@endsection