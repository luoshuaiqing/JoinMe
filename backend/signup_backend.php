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
$sql = "SELECT * FROM Users WHERE username = '{$username}';";

$results = $mysqli->query($sql);
if( !$results) {
	echo $mysqli->error;
	exit();
}

if($results->num_rows != 0) {
	echo "wrong!";
	exit();
}



$sql = "INSERT INTO Users (username, password)
VALUES('{$username}', '{$password}');";

	// Run the query
$results = $mysqli->query($sql);
if( !$results) {
	echo $mysqli->error;
	exit();
}

echo "success";

session_start();
$_SESSION["user_id"] = $mysqli->insert_id;
 




