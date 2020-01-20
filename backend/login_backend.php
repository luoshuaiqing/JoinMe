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
$username = $_POST["username"];
$password = $_POST["password"];
$password = hash("sha256", $password);

$mysqli->set_charset('utf-8');


// do checking before creating the user
$sql = "SELECT * FROM Users WHERE username = '{$username}' and password = '{$password}';";

$results = $mysqli->query($sql);
if( !$results) {
	echo $mysqli->error;
	exit();
}

if($results->num_rows == 0) {
	echo "wrong!\n";
	echo $password;
	exit();
}

$row = $results->fetch_assoc();

echo "success";

session_start();
$_SESSION["user_id"] = $row["id"];


// setting isEmployer property in session here
$sql = "SELECT * FROM Users
		JOIN Employees
			ON Employees.user_id = Users.id
		WHERE username = '{$username}' and password = '{$password}';";

$results = $mysqli->query($sql);
if( !$results) {
	echo $mysqli->error;
	exit();
}

if($results->num_rows == 0) {
	$_SESSION["isEmployer"] = true;
}
else {
	$_SESSION["isEmployer"] = false;	
}