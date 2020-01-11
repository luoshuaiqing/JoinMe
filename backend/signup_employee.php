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

$fields = ["firstName", "lastName", "gender", "country", "city", "perferredWorkingCity", "country_of_citizenship", "target_career", "expectedSalaryFrom", "expectedSalaryTo", "image_url"];
array_map($get_info, $fields);


$sql = "DELETE FROM Employees 
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

$sql = "INSERT INTO Employees (user_id, first_name, last_name, gender, country, city, preferred_working_city, country_of_citizenship, targeted_career, expected_salary_from, expected_salary_to, image_url)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("isssssssssss", $user_id, $arr["firstName"], $arr["lastName"], $arr["gender"], $arr["country"], $arr["city"], $arr["perferredWorkingCity"], $arr["country_of_citizenship"], $arr["target_career"], $arr["expectedSalaryFrom"], $arr["expectedSalaryTo"], $arr["image_url"]);

$executed = $stmt->execute();

if(!$executed) {
	$error =  $mysqli->error;
	echo $error;
	exit();
}
if($stmt->affected_rows != 1) {
	$error = "Something is wrong with the data.";
	echo $error;
	exit();
}



// everything should be good if the program runs to here
echo "success";
$_SESSION["isEmployer"] = false;



// the following is to create a user
require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
	'instance_locator' => 'v1:us1:f69aea8d-1d7a-4db6-928f-521475793860',
	'key' => 'b2a7e763-f1c9-4bf5-8502-3bcb3cb2fa53:OKmJmHAHgEERnQwv6pvhm+ms/0hRs9XfPlfFwrvw08Y='
]);

// the created user's username will be firstname + lastname, and the id will be the user_id in Users table, which is guranteed to be unique
$chatkit->createUser([
	'id' => strval($user_id),
	'name' => "{$_POST['firstName']} {$_POST['lastName']}",
	'avatar_url' => strval($arr["image_url"])//'https://placekitten.com/200/300'
]);
