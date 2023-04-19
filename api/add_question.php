<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

$body = file_get_contents('php://input');

$data = json_decode($body, true);
$stmt = $conn->prepare("INSERT INTO app_for_students.question (question, student_id) VALUES (?, 1)");
$stmt->bind_param("s", $data['question']);
$stmt->execute();

$insertId = $stmt->insert_id;

$new_stmt = $conn->prepare("SELECT * FROM app_for_students.question WHERE id = ?");
$new_stmt->bind_param("i", $insertId);
$new_stmt->execute();
$question = $new_stmt->get_result()->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($question);
?>