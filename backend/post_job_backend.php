<?php


var_dump($_POST);



// connecting to the database
require "config/config.php";
// Create instance of mysqli class
$mysqli = new mysqli(HOST, USER, PASSWORD, DB);

if( $mysqli->connect_errno  ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf-8');

$added_job_info_arr = array();
$get_added_job_info = function($field) {
	global $added_job_info_arr;
	if( isset($_POST[$field]) && !empty($_POST[$field]) ) {
		$added_job_info_arr[$field] = $_POST[$field];
	}
	else {
		$added_job_info_arr[$field] = NULL;
	}
};

$fields = ["job_title", "job_department", "city", "state", "country", "job_description", "company_description", "application_website"];
array_map($get_added_job_info, $fields);


$sql = "INSERT INTO Jobs (employer_id, job_title, job_department, city, state, country, job_description, company_description, application_website)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

session_start();
// get employer_id
$employer_id = $_SESSION["user_id"];


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("issssssss", $employer_id, $added_job_info_arr["job_title"], $added_job_info_arr["job_department"], $added_job_info_arr["city"], $added_job_info_arr["state"], $added_job_info_arr["country"], $added_job_info_arr["job_description"], $added_job_info_arr["company_description"], $added_job_info_arr["application_website"]);

$executed = $stmt->execute();

if(!$executed) {
	$error =  $mysqli->error;
	echo $error;
	echo "here";
}
if($stmt->affected_rows != 1) {
	$error = "Something is wrong with the data.";
	echo $error;
	echo "here2";
}

echo "<hr>";
$id = $mysqli->insert_id;
foreach ($_POST["responsibilities"] as $responsibility) {
	$sql = "INSERT INTO Job_responsibilities (job_id, responsibility)
	VALUES (?, ?);";
	
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("is", $id, $responsibility);
	$executed = $stmt->execute();

	if(!$executed) {
		$error =  $mysqli->error;
		echo $error;
		echo "here";
	}
	if($stmt->affected_rows != 1) {
		$error = "Something is wrong with the data.";
		echo $error;
		echo "here2";
	}
}

foreach ($_POST["requirements"] as $requirement) {
	$sql = "INSERT INTO Job_requirements (job_id, requirement)
	VALUES (?, ?);";

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("is", $id, $requirement);
	$executed = $stmt->execute();

	if(!$executed) {
		$error =  $mysqli->error;
		echo $error;
		echo "here";
	}
	if($stmt->affected_rows != 1) {
		$error = "Something is wrong with the data.";
		echo $error;
		echo "here2";
	}
}




// getting the company name
$sql = "SELECT * FROM Jobs 
		Join Employers
			ON Employers.user_id = Jobs.employer_id
	  	WHERE Jobs.id = {$id};";

$results = $mysqli->query($sql);
if( !$results) {
	echo $mysqli->error;
	exit();
}

if($results->num_rows == 0) {
	echo "wrong!\n";
	exit();
}

$row = $results->fetch_assoc();
$company_name = $row["company_name"];


require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
	'instance_locator' => 'v1:us1:f69aea8d-1d7a-4db6-928f-521475793860',
	'key' => 'b2a7e763-f1c9-4bf5-8502-3bcb3cb2fa53:OKmJmHAHgEERnQwv6pvhm+ms/0hRs9XfPlfFwrvw08Y='
]);


// create a room with the job id!
$chatkit->createRoom([
	'id' => strval($id),
	'creator_id' => strval($employer_id),
	'name' => "{$added_job_info_arr['job_title']}({$company_name})",
	'private' => false,
	'custom_data' => ['creater_employer_id' => strval($employer_id), 'company_name' => strval($company_name)]
]);



header("Location: ../chatroom.php");


$stmt->close();

$mysqli->close();




