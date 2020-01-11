<?php

$host = "www.joinme.us";
$user = "joinmeus_db_user";
$pass = "Lsq987069!";
$db = "joinmeus_joinme_db";

$mysqli = new mysqli($host, $user, $pass, $db);
if ( $mysqli->errno ) {
	echo $mysqli->error;
	exit();
}

$id = $_GET["id"];

$sql = "SELECT * FROM Jobs WHERE Jobs.id = {$id};";

$results = $mysqli->query($sql);
if ( !$results ) {
	echo $mysqli->error;
	exit();
}

$row = $results->fetch_assoc();

$results_array = [];
$job_id = $id;
$sql_2 = "SELECT * FROM Job_responsibilities WHERE job_id = {$job_id};";

$results_2 = $mysqli->query($sql_2);
$responsibilities = [];
if ( !$results_2 ) {
	echo $mysqli->error;
	exit();
}
else {
	while($row_2 = $results_2->fetch_assoc()) {
		array_push($responsibilities, $row_2["responsibility"]);	
	}

	$row["responsibilities"] = $responsibilities;
}

$sql_3 = "SELECT * FROM Job_requirements WHERE job_id = {$job_id};";

$results_3 = $mysqli->query($sql_3);
$requirements = [];
if ( !$results_3 ) {
	echo $mysqli->error;
	exit();
}
else {
	while($row_3 = $results_3->fetch_assoc()) {
		array_push($requirements, $row_3["requirement"]);	
	}

	$row["requirements"] = $requirements;
}




array_push($results_array, $row);


	// Convert this assoc array to JSON string
echo json_encode($results_array);

$mysqli->close();