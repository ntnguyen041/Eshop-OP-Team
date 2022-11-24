@extends('layouts.app')

@section('content')
<body>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Account <span id="user"></span></h4></header>
		<form >
			<div class="form-group">
				<label>Fullname</label>
				<input id="fullname" type="name" class="form-control" placeholder="">
			</div>
				<div class="form-group">
					<label>Email</label>
					<input id="email" type="email" class="form-control" placeholder="" >
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input id="phone" type="number" class="form-control" placeholder="" >
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Address</label>
					<input id="address" type="text" class="form-control" placeholder="">
				</div>  
			    <div class="form-group">
					<span id="errcreate"></span>
			        <a id="update" type="submit" class="btn btn-primary btn-block"> Update  </a>
			    </div> <!-- form-group// -->          
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->
</section>
 
</body>
<script src="user/assets/js/userDT/index.js"></script>
</script>
@endsection