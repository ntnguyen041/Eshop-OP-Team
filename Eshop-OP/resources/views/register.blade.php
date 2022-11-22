@extends('layouts.app')

@section('content')
<body>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Sign up</h4></header>
		<form onsubmit="return false">
				<div class="form-group">
					<label>Username</label>
					<input type="name" class="form-control" placeholder="tên đăng nhập">
					<small class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" placeholder="mật khẩu">
					<small class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div> <!-- form-group end.// -->
				  <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>City</label>
					  <input type="text" class="form-control">
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>Country</label>
					  <select id="inputState" class="form-control">
					    <option> Choose...</option>
					      <option>Uzbekistan</option>
					      <option>Russia</option>
					      <option selected="">United States</option>
					      <option>India</option>
					      <option>Afganistan</option>
					  </select>
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Create password</label>
					    <input class="form-control" type="password">
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<label>Repeat password</label>
					    <input class="form-control" type="password">
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
			    </div> <!-- form-group// -->          
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
 
</body>
@endsection