<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

$stmt = $conn->prepare("SELECT * FROM app_for_students.student");
$stmt->execute();
$students = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($students);

?>