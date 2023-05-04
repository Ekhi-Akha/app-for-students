<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

$body = file_get_contents('php://input');

$data = json_decode($body, true);
$stmt = $conn->prepare("INSERT INTO app_for_students.vote (student_id, question_id, vote_value) VALUES (?, ?, -1)");
$stmt->bind_param("ii", $_SESSION['student_id'], $data['question_id']);
$stmt->execute();

$new_stmt = $conn->prepare("SELECT * FROM app_for_students.vote WHERE question_id = ? AND student_id = ?");
$new_stmt->bind_param("ii", $data['question_id'], $_SESSION['student_id']);
$new_stmt->execute();
$vote = $new_stmt->get_result()->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($vote);

?>