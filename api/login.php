<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];
  // open a file
  $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");


  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validEmail = "";
    $validPassword = "";
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $conn = new mysqli($servername, $username, $dbPassword);

    $stmt = $conn->prepare("SELECT * FROM app_for_students.student WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      // write to file
      fwrite($myfile, "Email exists");

      $row = $result->fetch_assoc();
      echo password_verify($password, $row['password']);
      echo $row['password'];
      echo "<br>";
      echo $password;
      if (password_verify($password, $row['password'])) {
        fwrite($myfile, "Password is correct");
        $validEmail = $row['email'];
        $validPassword = $row['password'];
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $row['username'];
        header("Location: /app-for-students/home");
      } else {
        fwrite($myfile, "Password is incorrect");
        $error = "Invalid password";
      }
    }

  } else {
    fwrite($myfile, "Email is not valid");
    $error = "Invalid email format";
  }
}

if (isset($error)) {
  echo "<p class='error'>$error</p>";
}

?>