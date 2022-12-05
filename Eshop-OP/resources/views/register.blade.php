@extends('layouts.app')

@section('content')
<body>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sign up</h4></header>
		<form >
			<div class="form-group">
				<label>Fullname</label>
				<input id="fullname" type="name" class="form-control" placeholder="" >
			</div>
				<div class="form-group">
					<label>Username</label>
					<input id="user" type="name" class="form-control" placeholder="" value="">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Password</label>
					<input id="Pass" type="password" class="form-control" placeholder="" >
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Repeat password</label>
					<input id="Repeatpass" type="password" class="form-control" placeholder="" >
				</div> <!-- form-group end.// -->
			    <div class="form-group">
					<span id="errcreate"></span>
			        <a id="Register" type="submit" class="btn btn-primary btn-block"> Register  </a>
			    </div> <!-- form-group// -->          
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="/login">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
 
</body>
<script src="{{asset('user/assets/js/register/index.js')}}"></script>
@endsection