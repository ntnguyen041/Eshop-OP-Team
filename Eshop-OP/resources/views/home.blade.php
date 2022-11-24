@extends('layouts.app')

@section('content')
<div class="container">
  {{-- <a id="nguyen">click me</a> --}}
<!-- ========================= SECTION MAIN  ========================= -->
<section class="section-main padding-y">
<main class="card">
	<div class="card-body">

<div class="row">
	<aside class="col-lg col-md-3 flex-lg-grow-0">
		<h5>Category</h5>
		<nav class="nav-home-aside">
			<ul class="menu-category" id="Categorylist">
			</ul>
		</nav>
	</aside> <!-- col.// -->
	<div class="col-md-9 col-xl-7 col-lg-7">
<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="user/assets/images/banners/slide1.jpg" alt="First slide"> 
    </div>
    <div class="carousel-item">
      <img src="user/assets/images/banners/slide2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="user/assets/images/banners/slide3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

	</div> <!-- col.// -->
	<div class="col-md d-none d-lg-block flex-grow-1">
		<aside class="special-home-right">
			<h6 class="bg-blue text-center text-white mb-0 p-2">Popular category</h6>
      <section   id="loadroducthome2">
        
      </section>
		</aside>
	</div> <!-- col.// -->
</div> <!-- row.// -->

	</div> <!-- card-body.// -->
</main> <!-- card.// -->

</section>
<!-- ========================= SECTION MAIN END// ========================= -->

<!-- =============== SECTION DEAL =============== -->
<section class="padding-bottom">
 <div class="card card-deal">
     <div class="col-heading content-body">
      <header class="section-heading">
       <h3 class="section-title">Deals and offers</h3>
       <p>Hygiene equipments</p>
     </header><!-- sect-heading -->
     <div class="timer">
       <div> <span class="num">04</span> <small>Days</small></div>
       <div> <span class="num">12</span> <small>Hours</small></div>
       <div> <span class="num">58</span> <small>Min</small></div>
       <div> <span class="num">02</span> <small>Sec</small></div>
     </div>
   </div> <!-- col.// -->
   <div class="row no-gutters items-wrap" id="getproducthome">
      <!-- col.// -->
</div>
</div>

</section>
<article class="my-4">
	<img src="user/assets/images/banners/ad-sm.png" class="w-100">
</article>
</div>  
<script src="user/assets/js/home/index.js"></script>
<script src="user/assets/js/Product/index.js"></script>

<!-- container end.// -->
@endsection

