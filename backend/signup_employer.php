<?php

$external_link = strval($_POST["image_url"]);
if (!@GetImageSize($external_link)) {
	echo  "image does not exist ";
	exit();
}

$host = "www.joinme.us";
$user = "joinmeus_db_user";
$pass = "Lsq987069!";
$db = "joinmeus_joinme_db";

$mysqli = new mysqli($host, $user, $pass, $db);
if ( $mysqli->errno ) {
	echo $mysqli->error;
	echo "here 7";
	exit();
}

$mysqli->set_charset('utf-8');

session_start();
$user_id = $_SESSION["user_id"];

$arr = array();
$get_info = function($field) {
	global $arr;
	if( isset($_POST[$field]) && !empty($_POST[$field]) ) {
		$arr[$field] = $_POST[$field];
	}
	else {
		$arr[$field] = NULL;
	}
};

$fields = ["company_name", "country", "city", "company_type", "company_size", "company_slogan", "company_website", "image_url"];
array_map($get_info, $fields);



$sql = "DELETE FROM Employers 
		WHERE user_id = ?;";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $user_id);
$executed = $stmt->execute();
if(!$executed) {
	$error =  $mysqli->error;
	echo $error;
	echo "here 24125";
	exit();
}

$sql = "INSERT INTO Employers (user_id, company_name, country, city, company_type, company_size, company_slogan, company_website, image_url)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("issssssss", $user_id, $arr["company_name"], $arr["country"], $arr["city"], $arr["company_type"], $arr["company_size"], $arr["company_slogan"], $arr["company_website"], $arr["image_url"]);

$executed = $stmt->execute();

if(!$executed) {
	$error =  $mysqli->error;
	echo $error;
	echo "here 5";
	exit();
}
if($stmt->affected_rows != 1) {
	$error = "Something is wrong with the data.";
	echo $error;
	echo "here 6";
	exit();
}

echo "success";

$_SESSION["isEmployer"] = true;

// the following is to create a user
require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
	'instance_locator' => 'v1:us1:f69aea8d-1d7a-4db6-928f-521475793860',
	'key' => 'b2a7e763-f1c9-4bf5-8502-3bcb3cb2fa53:OKmJmHAHgEERnQwv6pvhm+ms/0hRs9XfPlfFwrvw08Y='
]);

// the created user's username will be company name, and the id will be the user_id in Users table, which is guranteed to be unique
$chatkit->createUser([
	'id' => strval($user_id),
	'name' => strval($arr["company_name"]),
	'avatar_url' => strval($arr["image_url"])
]);
