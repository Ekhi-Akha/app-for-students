<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

$body = file_get_contents('php://input');

$data = json_decode($body, true);

$sql = "DELETE FROM app_for_students.question WHERE id = " . $data['id'] . ";";

$conn->query($sql);

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();

?>