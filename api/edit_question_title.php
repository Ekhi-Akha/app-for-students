<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

$body = file_get_contents('php://input');

$data = json_decode($body, true);

$stmt = $conn->prepare("UPDATE app_for_students.question SET title = ? WHERE id = ?");
$stmt->bind_param("si", $data['question_title'], $data['id']);
$stmt->execute();

$new_stmt = $conn->prepare("SELECT * FROM app_for_students.question WHERE id = ?");
$new_stmt->bind_param("i", $data['id']);
$new_stmt->execute();
$question = $new_stmt->get_result()->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($question);

?>