<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

$body = file_get_contents('php://input');

$data = json_decode($body, true);
$stmt = $conn->prepare("INSERT INTO app_for_students.question (title, question, student_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $data['title'], $data['question'], $_SESSION['student_id']);
$stmt->execute();

$insertId = $stmt->insert_id;

$new_stmt = $conn->prepare("SELECT * FROM app_for_students.question WHERE id = ?");
$new_stmt->bind_param("i", $insertId);
$new_stmt->execute();
$question = $new_stmt->get_result()->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($question);
?>