<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h1>Connected successfully<br></h1>";

$sql = "CREATE DATABASE IF NOT EXISTS app_for_students";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Database created successfully<br></h1>";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS app_for_students.student (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    educational_level VARCHAR(30) NOT NULL,
    remember BOOLEAN NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table student created successfully<br></h1>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS app_for_students.answer (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question_id INT(6) UNSIGNED NOT NULL,
    student_id INT(6) UNSIGNED NOT NULL,
    answer VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES student(id)
    )";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table answer created successfully<br></h1>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS app_for_students.question (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id INT(6) UNSIGNED NOT NULL,
    answer_id INT(6) UNSIGNED NULL,
    question VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES student(id),
    FOREIGN KEY (answer_id) REFERENCES answer(id)
    )";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table question created successfully<br></h1>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "ALTER TABLE app_for_students.answer ADD FOREIGN KEY (question_id) REFERENCES question(id)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Foreign key added successfully<br></h1>";
} else {
    echo "Error adding foreign key: " . $conn->error;
}

// create rewards table
$sql = "CREATE TABLE IF NOT EXISTS app_for_students.level (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    level VARCHAR(30) NOT NULL,
    points INT(6) UNSIGNED NOT NULL check points between 0 and 100,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Table level created successfully<br></h1>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>