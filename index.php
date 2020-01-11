<?php

session_start();

if (isset($_SESSION["user_id"])) {
	header("Location: job_search.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>JoinMe Home Page</title>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/favicon.ico" />

	<!-- style.css (generated from scss) -->
	<link rel="stylesheet" href="css/style.css" />

	<!-- animsition.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css">
	<!-- animsition.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>

	<!-- loading font -->
	<?php require 'components/fonts.php'; ?>





</head>

<body class='animsition'>

	<div class="collapse" id="navbarToggleExternalContent">
		<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
			<li class="nav-item ">
				<a class="nav-link animsition-link " href="index.php">Home</a>
			</li>
			<li class="nav-item  ">
				<a class="nav-link text-muted animsition-link " href="job_search.php">Search</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="chatroom.php">Chat</a>
			</li>
		</ul>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse w-100 order-1 order-lg-0" id="navbarNav">
			<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
				<li class="nav-item active">
					<a class="nav-link animsition-link " href="index.php" style="margin-left: 5%;">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link animsition-link " href="job_search.php">Search</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link animsition-link " href="chatroom.php">Chat</a>
				</li>

			</ul>
		</div>
		<div class="d-flex w-100 order-0">
			<div class="w-100">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<a class="navbar-brand text-center w-100 font-Monoton animsition-link " href="index.php" style="font-size: 40px; letter-spacing: 3px;">JoinMe&nbsp;&nbsp;&nbsp; <img src="assets/JoinMe.png" class="navbar-brand text-center" class="d-inline-block align-top" alt="" width="45" height="45"></a>
			<span class="w-100"></span>
		</div>
		<span class="w-100"></span>
	</nav>

	<div class="container-fluid form">
		<div class="bg-video">
			<video class="bg-video__content" autoplay muted loop>
				<source src="assets/video/index_bg_video.mp4" type="video/mp4">
				<source src="assets/video/index_bg_video.webm" type="video/mp4">
				Your browser is not supported!
			</video>
		</div>

		<form class="form--login" action="job_search.php" method="POST" id="login_form" onsubmit="return login_submit();">
			<h3 class="heading align-center w-100 mt-3">
				Account Login
			</h3>
			<div class=""></div>
		</form>

		<form class="form--signup" action="signup.php" method="POST" id="signup_form" style="display: none;" onsubmit="return signup_submit();">

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
				inClass: 'fade-in-right',
				outClass: 'fade-out-right',
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
				browser: ['animation-duration', '-webkit-animation-duration'],
				// "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
				// The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
				overlay: false,
				overlayClass: 'animsition-overlay-slide',
				overlayParentElement: 'body',
				transition: function(url) {
					window.location.href = url;
				}
			});
		});

		let login_showed = true;
		$('.link').click(() => {
			if (login_showed) {
				$("#login_form").css("display", "none");
				$("#signup_form").fadeIn(2000);
			} else {
				$("#signup_form").css("display", "none");
				$("#login_form").fadeIn(2000);
			}
			login_showed = !login_showed;
		});


		function signup_submit() {
			if ($("#password_2").val() != $("#password_3").val()) {
				alert("wrong user input!");
				return false;
			}

			var xhr = new XMLHttpRequest();
			xhr.open('POST', "backend/signup_backend.php", false);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send("username=" + $("#email_2").val() + "&password=" + $("#password_2").val());


			if (xhr.responseText != null && xhr.responseText != "success") {
				console.log(xhr.responseText);
				alert("The email is already signed up.");
				return false;
			}
			return true;

		}

		function login_submit() {
			var xhr = new XMLHttpRequest();
			xhr.open('POST', "backend/login_backend.php", false);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send("username=" + $("#email").val() + "&password=" + $("#password").val());


			if (xhr.responseText != null && xhr.responseText != "success") {
				console.log(xhr.responseText);
				alert("The email is or password is not correct.");
				return false;
			}
			return true;
		}
	</script>
</body>

</html>