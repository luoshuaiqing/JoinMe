<?php

session_start();
if(!isset($_SESSION["user_id"])) {
	echo '<script language="javascript">';
	echo 'alert("You should first sign in to see the chatroom!");';
	echo 'window.location.href="index.php";';
	echo '</script>';
	
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JoinMe Home Page</title>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/favicon.ico"/>

	<!-- chatroom.css -->
	<link rel="stylesheet" href="css/chatroom.css"/>

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

	<!-- for chatting -->
	<!-- ChatKit.js -->
	<script src="https://unpkg.com/@pusher/chatkit-client@1/dist/web/chatkit.js"></script>

</head>
<body class='animsition'>
	<div class="collapse" id="navbarToggleExternalContent">
		<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
			<?php if(!isset($_SESSION["user_id"])): ?>
				<li class="nav-item " >
					<a class="animsition-link nav-link text-muted" href="index.php">Home</a>
				</li>
			<?php endif;?>
			<li class="nav-item ">
				<a class="animsition-link nav-link text-muted" href="job_search.php">Search</a>
			</li>
			<li class="nav-item ">
				<a class="animsition-link nav-link" href="chatroom.php">Chat</a>
			</li>
			<?php
			if(isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true) {
				echo '<li class="nav-item ">
				<a class="animsition-link nav-link text-muted" href="post_job.php">Post Job</a>
				</li>';
			}
			if(isset($_SESSION["user_id"])){
				echo '<li class="nav-item ">
				<a class="animsition-link nav-link text-muted" href="logout.php">Sign out</a>
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
						<a class="animsition-link nav-link" href="index.php" style="margin-left: 5%;">Home</a>
					</li>
				<?php endif;?>
				<li class="nav-item">
					<a class="animsition-link nav-link" href="job_search.php">Search</a>
				</li>
				<li class="nav-item active">
					<a class="animsition-link nav-link" href="chatroom.php">Chat</a>
				</li>
				<?php if(isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true):?>
					<li class="nav-item">
						<a class="animsition-link nav-link" href="post_job.php">Post Job</a>
					</li>
				<?php endif; ?>
				<?php
				if(isset($_SESSION["user_id"])){
					echo '<li class="nav-item ">
					<a class="animsition-link nav-link" href="logout.php" style="position: absolute;right: 0;">Sign out</a>
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
		<div class="margin"></div>
		<div class="container chatbox">
			<div class="row h-100" >
				<div class="col-3 left_col right_border" id="to_append">
					<!-- <div class="left-chat " tabindex="-1">
						<div class="m-auto">
							<img class="logo" src="assets/company_images/amazon.png"><span >&nbsp;Placeholder</span>
						</div>
					</div> -->
					
					
				</div>
				<div class="col-9 right_col h-100">
					<div class="row h-75 messages" id="messages_box_to_append">
						<!-- <div class="_border w-100 message">
							<img class="logo" src="assets/company_images/amazon.png"><span>This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1This is text 1</span>
						</div> -->


					</div>

					<div class="row text_div"><textarea class="rounded-0 font-Cantarell" rows="10"></textarea><button class="send_message btn btn-success btn-lg" id="send_button">Send Message</button></div>
					
				</div>


			</div>
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
				inClass: 'fade-in-left',
				outClass: 'fade-out-left',
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

		let clicked_room_id = null;


		

		const tokenProvider = new Chatkit.TokenProvider({
			url: "https://us1.pusherplatform.io/services/chatkit_token_provider/v1/f69aea8d-1d7a-4db6-928f-521475793860/token"
		});

		const chatManager = new Chatkit.ChatManager({
			instanceLocator: "v1:us1:f69aea8d-1d7a-4db6-928f-521475793860",
			userId: "<?php echo $_SESSION["user_id"] ?>",
			tokenProvider: tokenProvider
		});

		let USER = null;
		let prev_e = null;


		

		
		chatManager
		.connect()
		.then(currentUser => {
			USER = currentUser;

			
			// if I come from job_search, then I want to join that room!
			<?php if(isset($_GET["change_room_job_id"]) && !empty($_GET["change_room_job_id"])) : ?>
			let room_id = <?php echo $_GET["change_room_job_id"]; ?>;
				// room_id is the room that the user wants to join
				console.log("room id: " + room_id);

				// join the room!
				currentUser.joinRoom({ roomId: room_id.toString() })
				.then(room => {
					console.log("successfully joined the room!");
					let cnt = 0;
					// no matter if currentUser is employee or employer, we always need to always connect and update the interface
					for(var i = 0; i < currentUser.rooms.length; i++) {
						let room_id = currentUser.rooms[i].id;

						// subscribe to the room's message
						currentUser.subscribeToRoomMultipart({
							roomId: room_id,
							hooks: {
								onMessage: message => {
									let msg = message.parts[0].payload.content;
									let sender_room_id = message.room.id;
									// if the sender_room_id is the same as the div that the user clicked on, then show it to the screen
									if(clicked_room_id == sender_room_id){
										create_msg_box(msg, message.sender.name, message.sender.avatarURL);
									}
									else {
										console.log("==== New Message Not To Show =====");
										console.log("clicked_room_id: " + clicked_room_id);
										console.log("sender_room_id: " + sender_room_id)
										console.log(msg);
										console.log("xxxxxxxxxxxxxxxxxxxxx");
									}

								}
							}
						}).then(e => {
							console.log(e);
							
							let company_name = e.customData.company_name;
							let company_image_url = e.users[0].avatarURL;
							// create the left column
							create_room_box(company_name, room_id, company_image_url);
							if(cnt == currentUser.rooms.length - 1) {
								clicked_room_id = currentUser.rooms[currentUser.rooms.length - 1].id;
								show_all_msg(clicked_room_id);
								document.getElementById(clicked_room_id).style.backgroundColor = "#9e9e9e73";
								prev_e = document.getElementById(clicked_room_id);
							}
							cnt += 1;
						});
						
					}
				})
				.catch(err => {
					alert("error joining the room!");
				})

			<?php else :?>
			let cnt = 0;
			// no matter if currentUser is employee or employer, we always need to always connect and update the interface
			for(var i = 0; i < currentUser.rooms.length; i++) {
				let room_id = currentUser.rooms[i].id;

				// subscribe to the room's message
				currentUser.subscribeToRoomMultipart({
					roomId: room_id,
					hooks: {
						onMessage: message => {
							let msg = message.parts[0].payload.content;
							let sender_room_id = message.room.id;
							// if the sender_room_id is the same as the div that the user clicked on, then show it to the screen
							if(clicked_room_id == sender_room_id){
								create_msg_box(msg, message.sender.name, message.sender.avatarURL);
							}
							else {
								console.log("==== New Message Not To Show =====");
								console.log("clicked_room_id: " + clicked_room_id);
								console.log("sender_room_id: " + sender_room_id)
								console.log(msg);
								console.log("xxxxxxxxxxxxxxxxxxxxx");
							}

						}
					}
				}).then(e => {
					console.log(e);
					
					let company_name = e.customData.company_name;
					let company_image_url = e.users[0].avatarURL;
					// create the left column
					create_room_box(company_name, room_id, company_image_url);
					if(cnt == currentUser.rooms.length - 1) {
						clicked_room_id = currentUser.rooms[currentUser.rooms.length - 1].id;
						show_all_msg(clicked_room_id);
						prev_e = document.getElementById(clicked_room_id);
					}
					cnt += 1;
				});
				
			}
			<?php endif;?>
			
		});

		
		
		function show_all_msg(room_id) {
			// always first clear all the msgs on the right, then fetch all the msgs from roomId
			$("#messages_box_to_append").empty();
			USER.fetchMultipartMessages({
				roomId: room_id.toString(),
				direction: 'older'
			})
			.then(messages => {
				for(var i = 0; i < messages.length; i++) {
					let msg = messages[i].parts[0].payload.content;
					create_msg_box(msg, messages[i].sender.name, messages[i].sender.avatarURL);
				}
			})
			.catch(err => {
				console.log(`Error fetching messages: ${err}`)
			})
		}

		function create_room_box(company_name, room_id, image_url) {
			// alert(company_name);
			$("#to_append").append('<div class="left-chat " tabindex="-1" onclick="focused(this)" id="' + room_id + '"><div class="m-auto"><img class="logo" src="' + image_url + '"><span class="text-capitalize">&nbsp;' + company_name + '</span></div></div>');
		}
		

		function create_msg_box(msg, senderName, image_url) {
			// create the message box
			$("#messages_box_to_append").append('<div class="_border w-100 message"><img class="logo" src="' + image_url + '"><span class="font-Baskervville"><span class="text-capitalize senderName">' + senderName + ':&nbsp;</span>' + msg + '</span></div>')
		}
		function focused(e) {
			prev_e.style.backgroundColor = "white";
			
			prev_e = e;
			e.style.backgroundColor = "#9e9e9e73";
			if(clicked_room_id == e.id){
				return;
			}

			clicked_room_id = e.id;

			show_all_msg(clicked_room_id);

		}

		$("#send_button").click(() => {
			if(USER.rooms.length == 0){
				return;
			}
			USER.sendSimpleMessage({
				roomId: clicked_room_id.toString(),
				text: $("textarea").val()
			})
			.then(messageId => {
				console.log("success");
				$("textarea").val("");
			})
			.catch(err => {
				alert("error when sending message!")
			})
		});

		

	</script>


</body>
</html>