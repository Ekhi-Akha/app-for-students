<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

// fetch answers related to question with id 1
$sql = "SELECT * FROM app_for_students.answer WHERE question_id = 1";
// get array of answers
$answers = mysqli_query($conn, $sql);
// the above is returning an empty object
while ($row = mysqli_fetch_assoc($answers)) {
  echo "row: " . json_encode($row);
}

?>