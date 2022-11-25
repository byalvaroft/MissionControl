<?php
session_start();
$host = "localhost";
$user = "apolloairways";
$password = "abc123.";
$dbname = "apolloairways_db";

$con = mysqli_connect($host,$user,$password,$dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>