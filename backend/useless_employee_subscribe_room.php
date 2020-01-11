<?php


require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
	'instance_locator' => 'v1:us1:f69aea8d-1d7a-4db6-928f-521475793860',
	'key' => 'b2a7e763-f1c9-4bf5-8502-3bcb3cb2fa53:OKmJmHAHgEERnQwv6pvhm+ms/0hRs9XfPlfFwrvw08Y='
]);

session_start();

$user_id = $_SESSION["user_id"];
if(!isset($user_id) || empty($user_id)){
	echo("not signed in");
	exit();
}

$job_id = $_GET["job_id"];
$currentUser = $chatkit->getUser([ 'id' => $user_id ]);


