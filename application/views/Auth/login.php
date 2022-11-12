<!DOCTYPE html>
<html lang="en">
<head>
	<title>Donasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="<?php echo base_url('assetslogin/images/icons/favicon.ico'); ?>"/> -->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css'); ?>"> -->

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url('assetsLogin/css/style.css'); ?>">

	<style>
		h1{
			font-family: 'Playfair Display', serif;
		}
	</style>

</head>
<body>
	
	<!-- <div class="body"></div>
	<div class="grad"></div>
	<h1 class="ml-3 mt-3" style="text-align:center; position: absolute; color:rgba(0, 0, 0, 0.158);">Login Masyarakat</h1>
	<div class="header">
		<div>X-<span>Stunting</span></div>
	</div>
	<br>
	<div class="login">
	
    <form action="<?php echo site_url('Login/postLogin3')?>" method="POST">
            <?= $this->session->tempdata('err'); ?>
            <?= $this->session->flashdata('message'); ?>
			<input type="text" placeholder="NIK" name="nik" required><br>
			<input type="password" placeholder="password" name="password" required><br>
			<button type="submit" class="btn btn-secondary btn-block mt-2" style="width:250px">Masuk</button>
			<div class="dropdown mt-2">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"  style="width:250px; text-align:center;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Pilih Role
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?php echo site_url('Login')?>">Login Petugas Puskesmas</a>
					<a class="dropdown-item" href="<?php echo site_url('Login/loginKader')?>">Login Kader Posyandu</a>
					<a class="dropdown-item" href="<?php echo site_url('Login/loginUser')?>">Login Masyarakat</a>
				</div>
			</div>
		</form>
			
	</div> -->

	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Login</h3>
		      	<?= $this->session->tempdata('message'); ?>
		      	<?= $this->session->tempdata('err'); ?>
				<form action="<?php echo site_url('Login/postLogin'); ?>" method="POST" class="login-form">
		      		<div class="form-group">
		      			<input type="email" class="form-control rounded-left" name="email" placeholder="Email" required>
		      		</div>
		            <div class="form-group d-flex">
		              <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
		            </div>
		           <!--  <div class="form-group d-md-flex">
		            	<div class="w-50">
	            			<label class="checkbox-wrap checkbox-primary">Remember Me
							  <input type="checkbox" checked>
							  <span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50 text-md-right">
							<a href="#">Forgot Password</a>
						</div>
		            </div> -->
					<a href="<?= site_url('Login/register') ?>" style="width: 100%; text-align:center">Don't have an account ?</a>	
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Masuk</button>
		            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>
	
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="<?php echo base_url('assetsLogin/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assetsLogin/js/popper.js'); ?>"></script>
<script src="<?php echo base_url('assetsLogin/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assetsLogin/js/main.js'); ?>"></script>

</body>
</html>