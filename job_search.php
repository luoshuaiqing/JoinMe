<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Search</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!-- job_search.css -->
	<link rel="stylesheet" href="css/job_search.css">
	
	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/favicon.ico"/>

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

	<!-- job_search.js -->
	<script src="js/job_search.js"></script>


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
				<a class="nav-link animsition-link " href="job_search.php">Search</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="chatroom.php">Chat</a>
			</li>
			<?php
			if(isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true) {
				echo '<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="post_job.php">Post Job</a>
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse w-100 order-1 order-lg-0" id="navbarNav">
			<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
				<?php if(!isset($_SESSION["user_id"])): ?>
					<li class="nav-item ">
						<a class="nav-link animsition-link " href="index.php" style="margin-left: 5%;">Home</a>
					</li>
				<?php endif;?>
				<li class="nav-item active">
					<a class="nav-link animsition-link " href="job_search.php">Search</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link animsition-link " href="chatroom.php">Chat</a>
				</li>
				<?php if(isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true):?>
					<li class="nav-item">
						<a class="nav-link animsition-link " href="post_job.php">Post Job</a>
					</li>
				<?php endif; ?>
				<?php if(isset($_SESSION["user_id"])):?>

					<li class="nav-item ">
						<a class="nav-link animsition-link " href="logout.php" style="position: absolute;right: 0;">Sign out</a>
					</li>

				<?php endif;?>
				
			</ul>
		</div>
		<div class="d-flex w-100 order-0">
			<div class="w-100">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<a class="navbar-brand text-center w-100 font-Monoton animsition-link " href="index.php" style="font-size: 40px; letter-spacing: 3px;">JoinMe&nbsp;&nbsp;&nbsp; <img src="assets/JoinMe.png" class="navbar-brand text-center"  class="d-inline-block align-top" alt="xxx" width="45" height="45"></a>
			<span class="w-100"></span>
		</div>
		<span class="w-100"></span>
	</nav>

	<form >
		<div class="container-fluid search_div">
			<div class="active-cyan-4 mb-4">
				<h1 class="font-Comfortaa">What are you looking for...</h1>
				<input class="form-control" type="text" placeholder="Software Engineer..." id="search_input">
				<button class="btn btn-primary btn-lg" id="search_button" style="margin-top: 15px;">Search!</button>
			</div>
		</div>
	</form>
	<hr style="margin-top:0px;">
	<div class="container-fluid h_90 min_h_1200">
		<div class="row  bottom_part">
			<div class="col-md-4 col-12 left_col" id="left_col">
				<!-- <div class="job_box">
					<span class="job_title font-IBM"><img class="logo" src="assets/company_images/amazon.png">&nbsp;<span class="clickable text_center" onclick="show_detail(this);">Software Engineer</span></span>
					<i class="far fa-star fa-lg fav" onclick="toggle_fav(this);"></i>

					<p class="font-Ubuntu"><i class="far fa-building"></i>&nbsp;<span>Amazon</span><i class="fas fa-map-marker-alt location_icon"></i>&nbsp;<span>San Diego</span>, <span>CA</span></p>

					<p class="description font-Cantarell"><span>The Software Engineer III works in the MINDBODY software development life cycle, including specification, design, implementation and testing of new features and bug fixing. The Software Engineer III is responsible for their ow....</span></p>
				</div> -->

			</div>
			<div class="col-md-8 col-12 right_col">
				<div class="job_detail_box" id="job_detail_box">
					<h3 style="text-align: center;">Please choose a job on the left to show job detail.</h3>
					<!-- <div class="job_title_2">
						<span class="font-IBM"><img alt="xxx" class="logo_2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmxScH-JaDVF6ZNAloBdqD5q2YcJ79-vrS09QU8EA3Xe58Tart">&nbsp;<span class="text_center">Software Engineer</span></span>
					</div>

					<p class="company_and_location"><i class="far fa-building"></i>&nbsp;<span>Apple</span><i class="fas fa-map-marker-alt location_icon_2"></i>&nbsp;<span>Santa Clara</span>, <span>CA</span></p>

					
					<div class="description_2">
						<p class="font-Cantarell margin_bottom_25"><span id="div_1">Job Description</span>
							<br/> <span>Are you passionate about changing the world? We have a critical impact on getting high quality functional products to millions of customers quickly and we are hiring all levels from junior to senior roles. As part of the silicon validation team, you will develop Linux device drivers and user-land tests for exercising and testing the various subsystems in complex SoCs.</span>
						</p>

						<span id="div_2">Here's What You'll Do</span>
						<ul class="font-Cantarell margin_bottom_25">
							<li>You will be developing Linux device drivers and user-land tests for exercising and testing the various subsystems in complex SoCs.</li>
							<li>You will be implementing BSP and doing software bringup on pre and post-silicon platforms</li>
							<li>You will debug and root-cause a variety of hardware and software issues</li>
						</ul>

						<span id="div_3">Here's What We Are Looking For</span>
						<ul class="font-Cantarell margin_bottom_25">
							<li>5+ years of embedded Linux kernel development experience</li>
							<li>Proven knowledge of Linux kernel internals (process scheduler, memory management, concurrency/synchronization, memory allocation, file systems) and networking or storage subsystems architecture</li>
							<li>Extensive device driver development and support (one or more of USB, network, graphics, video, mtd, storage, and power management)</li>
						</ul>

						<p class="font-Cantarell"><span id="div_4">About Us</span>
							<br/> <span>At Apple, new ideas have a way of becoming extraordinary products, services, and customer experiences very quickly. Bring passion and dedication to your job and there's no telling what you could accomplish. Dynamic, smart people and inspiring, innovative technologies are the norm here. The people who work here have reinvented entire industries with all Apple Hardware products. The same passion for innovation that goes into our products also applies to our practices strengthening our commitment to leave the world better than we found it. Join us to help deliver the next groundbreaking Apple product.</span>
						</p>

						<div class="button_div font-Cantarell">
							<a href="https://www.glassdoor.com/Job/jobs.htm?suggestCount=0&suggestChosen=true&clickSource=searchBtn&typed" role="button" class=" animsition-link btn btn-outline-primary btn-lg apply" >Apply Now</a>
							<a role="button" class="btn btn-outline-success btn-lg chat" onclick="start_chat();">Start Chat</a>
						</div>

						
					</div> -->
					
				</div>
			</div>
		</div>
	</div>


	<!-- js for bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<!-- js for bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://kit.fontawesome.com/cff48e921f.js" crossorigin="anonymous"></script>
	<script type="text/javascript">
		'use strict';

		$(document).ready(function() {
			$(".animsition").animsition({
				inClass: 'fade-in-down-sm',
				outClass: 'fade-out-down-sm',
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

		search_helper(false);

		let last_selected_box = null;

		// initialize clicked_job_id to null
		let clicked_job_id = null;




		function show_detail(e) {
			e = e.parentNode.parentNode;

			e.classList.toggle("selected_box");
			if(last_selected_box != null){
				last_selected_box.classList.toggle("selected_box");			
			}
			last_selected_box = e;

			clicked_job_id = e.id.substring(1);

			ajaxGet("backend/search_backend_detail.php?id=" + clicked_job_id, function(results) {
				console.log(results);
				// This function gets run when backend.php returns something
				results = JSON.parse(results);				

				let resultsList = $("#job_detail_box");

				resultsList.empty();				

				results.forEach((result) => {
					let job_title = result.job_title;
					let company_description = result.company_description;
					let city = result.city;
					let company_name = $("#_" + clicked_job_id + " .company_name_class").text();
					let application_website = result.application_website;
					let country = result.country;
					let job_description = result.job_description;
					let state = result.state;
					let job_id = result.id;
					let responsibilities = result.responsibilities;
					let requirements = result.requirements;
					let image_url = $("#" + e.id).find('img').attr('src');

					createJobDetailDiv(resultsList, job_title, company_description, city, company_name, application_website, country, job_description, state, job_id, responsibilities, requirements, image_url);
				});

			});

		}


		let toggle_fav = (e) => {
			e.classList.toggle('fas');
			e.classList.toggle('far');
		};


		document.getElementById("search_button").onclick = function() {
			event.preventDefault();
			search_helper();
		}
		
		let start_chat = () => {
			event.preventDefault();

			<?php if (!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])) : ?>
			alert('You can not start chat without login!');
			return;
			<?php endif; ?>

		window.location.href = "chatroom.php?change_room_job_id=" + clicked_job_id;

	}

	function search_helper(to_clear=true) {
			// Grab what the user typed in
			let searchInput = document.querySelector("#search_input").value.trim();

			// Make a GET request via AJAX, pass in the search term that the user typed in 
			ajaxGet("backend/search_backend.php?term=" + searchInput, function(results) {
				console.log(results);
				// This function gets run when backend.php returns something
				if(results == null || results == "" || results.length == 0) {
					console.log("Nothing is returned back. Either it is because no records match the searchInput or because there is non-UTF8 characters in the record that we want to return.");
					return;
				}
				results = JSON.parse(results);
				

				let resultsList = $("#left_col");

				resultsList.empty();	
				if(to_clear){
					$("#job_detail_box").empty();	
				}			
				
				console.log(results);

				results.forEach((result) => {
					let job_title = result.job_title;
					let company_description = result.company_description;
					let city = result.city;
					let company_name = result.company_name;
					let application_website = result.application_website;
					let country = result.country;
					let job_description = result.job_description;
					let state = result.state;
					let job_id = result.id;
					let image_url = result.image_url;

					
					console.log("image_url: " + image_url);
					
					resultsList.append('<div class="job_box" id="_' + job_id + '"><span class="job_title font-IBM "><img class="logo" alt="xxx" src="' + image_url + '">&nbsp;<span class="clickable text_center text-capitalize" onclick="show_detail(this);">' + job_title + '</span></span><i class="far fa-star fa-lg fav" onclick="toggle_fav(this);"></i><p class="font-Ubuntu"><i class="far fa-building"></i>&nbsp;<span class="text-capitalize company_name_class">' + company_name + '</span><i class="fas fa-map-marker-alt location_icon"></i>&nbsp;<span class="text-capitalize">' + city + '</span>, <span class="text-capitalize">' + state + '</span></p><p class="description font-Cantarell"><span>' + job_description + '</span></p></div>');
				});

			});
		}

		function createJobDetailDiv(resultsList, job_title, company_description, city, company_name, application_website, country, job_description, state, job_id, responsibilities, requirements, image_url) {	
			let str_1 = '<div class="job_title_2"><span class="font-IBM"><img alt="xxx" class="logo_2" src="' + image_url + '">&nbsp;<span class="text_center text-capitalize">' + job_title + '</span></span></div>';

			let str_2 = '<p class="company_and_location "><i class="far fa-building"></i>&nbsp;<span class="text-capitalize">' + company_name + '</span><i class="fas fa-map-marker-alt location_icon_2"></i>&nbsp;<span class="text-capitalize">' + city + '</span>, <span class="text-capitalize">' + state + '</span></p>';
			
			let str_3 = '<div class="description_2"><p class="font-Cantarell margin_bottom_25"><span id="div_1">Job Description</span><br/><span>' + job_description + '</span></p>';

			let str_4 = '<span id="div_2">Here\'s What You\'ll Do</span><ul class="font-Cantarell margin_bottom_25">';

			let str_5 = '';
			responsibilities.forEach((responsibility) => {
				if(responsibility.trim().length > 0){
					str_5 += '<li class="text-capitalize">' + responsibility + '</li>';	
				}
			});
			str_5 += '</ul>';

			let str_6 = '<span id="div_3">Here\'s What We Are Looking For</span><ul class="font-Cantarell margin_bottom_25">';
			let str_7 = '';
			requirements.forEach((requirement) => {
				if(requirement.trim().length > 0){
					str_7 += '<li class="text-capitalize">' + requirement + '</li>';	
				}
				
			});
			str_7 += '</ul>';
			

			let str_8 = '<p class="font-Cantarell"><span id="div_4">About Us</span><br/> <span>' + company_description + '</span></p>';

			let str_9 = '<div class="button_div font-Cantarell"><a href="' + application_website + '" role="button" class="animsition-link  btn btn-outline-primary btn-lg apply" >Apply Now</a><a role="button" class="btn btn-outline-success btn-lg chat" onclick="start_chat();">Start Chat</a></div>';

			let str_10 = '</div>';

			resultsList.append(str_1 + str_2 + str_3 + str_4 + str_5 + str_6 + str_7 + str_8 + str_9 + str_10);

			
		}



	</script>

</body>
</html>