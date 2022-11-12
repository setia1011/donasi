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

	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign Up</h3>
				<form action="<?php echo site_url('Login/addUser'); ?>" method="POST" class="login-form">
		      		<div class="form-group">
		      			<label>User Name</label>
		      			<input type="text" class="form-control rounded-left" name="nama" placeholder="User Name" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Email</label>
		      			<input type="email" class="form-control rounded-left" name="email" placeholder="Email" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Gender</label>
		      			<select class="form-control rounded-left" name="jk">
						  <option selected>Gender</option>
						  <option value="Laki-Laki">Laki-Laki</option>
						  <option value="Perempuan">Perempuan</option>
						</select>
		      		</div>
		      		<div class="form-group">
		      			<label>Birth Date</label>
		      			<input type="date" class="form-control rounded-left" name="tgl_lahir" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Phone Number</label>
		      			<input type="text" class="form-control rounded-left" placeholder="Phone Number" name="no_telpon" required>
		      		</div>
		      	
		            <div class="form-group">
		            	<label>Password</label>
		      			<input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Daftar</button>
		            </div>
	          	</form>
	        </div>
				</div>
			</div>
		</div>
	</section>


	<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
        
    });
</script>
	
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="<?php echo base_url('assetsLogin/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assetsLogin/js/popper.js'); ?>"></script>
<script src="<?php echo base_url('assetsLogin/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assetsLogin/js/main.js'); ?>"></script>

</body>
</html>