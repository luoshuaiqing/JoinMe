<?php 
session_start();
if(!isset($_SESSION["isEmployer"]) || $_SESSION["isEmployer"] == false) {
	header("Location: job_search.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Post Job</title>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/favicon.ico"/>

	<!-- post_job.css -->
	<link rel="stylesheet" type="text/css" href="css/post_job.css">

	<!-- animsition.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css">
	<!-- animsition.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>

	<!-- loading font -->
	<?php require 'components/fonts.php'; ?>

	<!-- font css -->
	<link rel="stylesheet" href="css/fonts.css"/>

	<!-- nav.css -->
	<link rel="stylesheet" href="css/nav.css"/>

	<!-- Google Sign In -->
	<meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="267432921945-ds3qoo88cccnte2ced2dt0gqjog005ni.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>

</head>
<body class='animsition'>

	<div class="collapse" id="navbarToggleExternalContent">
		<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
			<?php if(!isset($_SESSION["user_id"])): ?>
				<li class="nav-item " >
					<a class="nav-link text-muted animsition-link " href="index.php">Home</a>
				</li>
			<?php endif;?>
			<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="job_search.php">Search</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="chatroom.php">Chat</a>
			</li>
			<?php
			if(isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true) {
				echo '<li class="nav-item ">
				<a class="nav-link animsition-link " href="post_job.php">Post Job</a>
				</li>';
			}
			if(isset($_SESSION["user_id"])){
				echo '<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="logout.php">Sign out</a>
				</li>';
			}
			?>
			
		</ul>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" >
		<div class="collapse navbar-collapse w-100 order-1 order-lg-0" id="navbarNav">
			<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
				<?php if(!isset($_SESSION["user_id"])): ?>
					<li class="nav-item ">
						<a class="nav-link animsition-link " href="index.php" style="margin-left: 5%;">Home</a>
					</li>
				<?php endif;?>
				<li class="nav-item"> 
					<a class="nav-link animsition-link " href="job_search.php">Search</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link animsition-link " href="chatroom.php">Chat</a>
				</li>
				<?php 
				if(isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true) {
					echo '<li class="nav-item active">
					<a class="nav-link animsition-link " href="post_job.php">Post Job</a>
					</li>';
				}
				if(isset($_SESSION["user_id"])){

					echo '<li class="nav-item ">
					<a class="nav-link animsition-link " href="logout.php" style="position: absolute;right: 0;">Sign out</a>
					</li>';
				}
				?>
			</ul>
		</div>
		<div class="d-flex w-100 order-0">
			<div class="w-100">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<a class="navbar-brand text-center w-100 font-Monoton animsition-link " href="index.php" style="font-size: 40px; letter-spacing: 3px;">JoinMe&nbsp;&nbsp;&nbsp; <img src="assets/JoinMe.png" class="navbar-brand text-center"  class="d-inline-block align-top" alt="" width="45" height="45"></a>
			<span class="w-100"></span>
		</div>
		<span class="w-100"></span>
	</nav>

	<div class="container-fluid outermost">
		<div class="container">
			<form method="POST" action="backend/post_job_backend.php">
				<h1 style="text-align: center;  font-family: 'Baskervville', serif;">Tell Me About Your Job</h1>
				<div class="form-row ">
					<div class="col-6 form-group">
						<label for="job_title">Job Title</label>
						<input type="text" class="form-control form-control-lg" name="job_title" id="job_title" required>
					</div>
					<div class="col-6 form-group">
						<label for="job_department">Job Department</label>
						<input type="text" class="form-control form-control-lg" name="job_department" id="job_department"  required>
					</div>
				</div>
				<div class='form-row'>
					<div class="col-4 form-group">
						<label for="city">City</label>
						<input type="text" class="form-control form-control-lg" name="city" id="city"  required>
					</div>
					<div class="col-4 form-group">
						<label for="state">State</label>
						<input type="text" class="form-control form-control-lg" name="state" id="state"  required>
					</div>
					<div class="col-4 form-group ">
						<label for="country">Country</label>
						<input type="text" class="form-control form-control-lg"  name="country" id="country" required>
					</div>
				</div>
				<div class='form-row'>
					<div class="col-12 form-group ">
						<label for="job_description">Job Description</label>
						<textarea class="form-control form-control-lg" id="job_description"  name="job_description" rows="3" aria-describedby="job_description_word_limit" required></textarea>
						<small id="job_description_word_limit" class="form-text text-muted">
							You can not have more than 200 words in job description.
						</small>
					</div>
				</div>
				<div class="form-row" id="responsibilities_div">
					<div class="col-12" style="margin-bottom: 8px;">What are the major responsibilities of the candidates <button class="btn btn-primary add" onclick="add_responsibility()">Add</button></div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">1.</span>
						</div>
						<input type="text" class="form-control form-control-lg"  name="responsibilities[]" >
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">2.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="responsibilities[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">3.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="responsibilities[]">
					</div>
				</div>
				<div class="form-row" id="requirements_div">
					<div class="col-12" style="margin-bottom: 8px;">What skills/characteristics do you require from the candidates <button class="btn btn-primary add" onclick="add_requirement()">Add</button></div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">1.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="requirements[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">2.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="requirements[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">3.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="requirements[]">
					</div>
				</div>
				<div class='form-row'>
					<div class="col-12 form-group ">
						<label for="company_description">Company Description</label>
						<textarea class="form-control form-control-lg" id="company_description" rows="3" aria-describedby="company_description_word_limit" required  name="company_description"></textarea>
						<small id="company_description_word_limit" class="form-text text-muted">
							You can not have more than 200 words in company description.
						</small>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 form-group">
						<label for="job_apply_url">Application Website</label>
						<input type="text" class="form-control form-control-lg"  name="application_website" required>
					</div>
				</div>
				<div id="post_div"><button class="btn btn-lg btn-primary" id="post_button" type="submit">Post Now!</button></div>


			</form>
		</div>
	</div>



	<!-- js for bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<!-- js for bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		'use strict';
		$(document).ready(function() {
			$(".animsition").animsition({
				inClass: 'fade-in-down',
				outClass: 'fade-out-down',
				inDuration: 1500,
				outDuration: 800,
				linkElement: '.animsition-link',
				// e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
				loading: true,
				loadingParentElement: 'body', //animsition wrapper element
				loadingClass: 'animsition-loading',
				loadingInner: '', // e.g '<img src="loading.svg" />'
				timeout: false,
				timeoutCountdown: 5000,
				onLoadEvent: true,
				browser: [ 'animation-duration', '-webkit-animation-duration'],
				// "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
				// The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
				overlay : false,
				overlayClass : 'animsition-overlay-slide',
				overlayParentElement : 'body',
				transition: function(url){ window.location.href = url; }
			});
		});


		$(document).ready(function() {
			$("textarea").on('keyup', function() {
				var words = this.value.match(/\S+/g).length;

				if (words > 200) {
					alert("You Exceeded Word Limit of 200!");
				}
			});
		}); 


		let add_responsibility = () => {
			let num = $("#responsibilities_div").children().length;
			$("#responsibilities_div").append('<div class="col-4 form-group input-group input-group-lg"><div class="input-group-prepend"> <span class="input-group-text">' + num + '</span> </div> <input type="text" class="form-control form-control-lg" name="responsibilities[]"></div>');
		};

		let add_requirement = () => {
			let num = $("#requirements_div").children().length;
			$("#requirements_div").append('<div class="col-4 form-group input-group input-group-lg"><div class="input-group-prepend"> <span class="input-group-text">' + num + '</span> </div> <input type="text" class="form-control form-control-lg" name="requirements[]"></div>');	
		}



	</script>
</body>
</html>


<!-- https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=789ux00u0yxc0p&redirect_uri=https://www.ifun.tv/&scope=r_liteprofile%20r_emailaddress%20w_member_social -->