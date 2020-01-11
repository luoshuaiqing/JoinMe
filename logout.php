<?php

session_start();
session_destroy();
header("Location: job_search.php");
?>