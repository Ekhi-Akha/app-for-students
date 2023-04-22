<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validEmail = "";
    $validPassword = "";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);

    $stmt = $conn->prepare("SELECT * FROM app_for_students.student WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        $validEmail = $row['email'];
        $validPassword = $row['password'];
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $row['username'];
        header("Location: /app-for-students/home");
      }
    }


  } else {
    $error = "Invalid email format";
  }
}
?>