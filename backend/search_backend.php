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

// Get the search term usinh $_GET
$searchTerm = $_GET["term"];


$sql = "SELECT Jobs.id as id, Employers.company_name as company_name, Jobs.job_title as job_title, Jobs.job_department as job_department, Jobs.city as city, Jobs.state as state, Jobs.country as country, job_description, company_description, application_website, Employers.image_url as image_url FROM Jobs 
		LEFT JOIN Employers 
			ON Jobs.employer_id = Employers.user_id
		WHERE Jobs.job_title LIKE '%{$searchTerm}%' OR Jobs.job_department LIKE '%{$searchTerm}%' OR Jobs.city LIKE '%{$searchTerm}%' OR Jobs.state LIKE '%{$searchTerm}%' OR Jobs.country LIKE '%{$searchTerm}%' OR Jobs.job_description LIKE '%{$searchTerm}%' OR Employers.company_name LIKE '%{$searchTerm}%';";


$results = $mysqli->query($sql);
if ( !$results ) {
	echo $mysqli->error;
	exit();
}


$results_array = [];
while($row = $results->fetch_assoc()) {

	$job_id = $row["id"];
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
}

echo json_encode($results_array);

$mysqli->close();