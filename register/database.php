<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "app_for_students";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>