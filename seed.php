<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Connected successfully<br></h1>";

$users = [
  [
    'username' => 'John',
    'email' => 'john@abc.com',
    'password' => 'password',
    'educational_level' => 'L1',
    'remember' => 0,
    'level' => 'Novice',
    'points' => 0
  ],
  [
    'username' => 'Jane',
    'email' => 'jane@abc.com',
    'password' => 'password',
    'educational_level' => 'L2',
    'remember' => 0,
    'level' => 'Contributor',
    'points' => 50
  ],
  [
    'username' => 'Jack',
    'email' => 'abc@bcd.fr',
    'password' => 'password',
    'educational_level' => 'L1',
    'remember' => 0,
    'level' => 'Expert',
    'points' => 80
  ]
];

$questions = [
  [
<<<<<<< HEAD
=======
    'title' => 'A question about France',
>>>>>>> 742f0fac3f8bf048481c65d6f1cabb0a019d097f
    'question' => 'What is the capital of France?',
    'student_id' => 1,
  ],
  [
<<<<<<< HEAD
    'question' => 'What is the capital of Germany?',
    'student_id' => 1,
  ],
  [
    'question' => 'What is the capital of Italy?',
    'student_id' => 1,
=======
    'title' => 'A question about Germany',
    'question' => 'What is the capital of Germany?',
    'student_id' => 2,
  ],
  [
    'title' => 'A question about Italy',
    'question' => 'What is the capital of Italy?',
    'student_id' => 3,
>>>>>>> 742f0fac3f8bf048481c65d6f1cabb0a019d097f
  ]
];

$answers = [
  [
    'answer' => 'Paris',
    'question_id' => 1,
    'student_id' => 1,
  ],
  [
    'answer' => 'Berlin',
    'question_id' => 2,
    'student_id' => 1,
  ],
  [
    'answer' => 'Rome',
    'question_id' => 3,
<<<<<<< HEAD
    'student_id' => 1,
=======
    'student_id' => 2,
  ],
  [
    'answer' => 'Paris I think',
    'question_id' => 1,
    'student_id' => 2,
>>>>>>> 742f0fac3f8bf048481c65d6f1cabb0a019d097f
  ]
];

foreach ($users as $user) {
<<<<<<< HEAD
  // $sql = "INSERT INTO app_for_students.student (username, email, password, educational_level, remember) VALUES ('{$user['username']}', '{$user['email']}', '{$user['password']}', '{$user['educational_level']}', '{$user['remember']}')";
=======
>>>>>>> 742f0fac3f8bf048481c65d6f1cabb0a019d097f
  $sql = "INSERT INTO app_for_students.student (username, email, password, educational_level, remember, level, points) VALUES ('{$user['username']}', '{$user['email']}', '{$user['password']}', '{$user['educational_level']}', '{$user['remember']}', '{$user['level']}', '{$user['points']}')";
  if ($conn->query($sql) === TRUE) {
    echo "<h1>New user record created successfully<br></h1>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

foreach ($questions as $question) {
<<<<<<< HEAD
  $sql = "INSERT INTO app_for_students.question (question, student_id) VALUES ('{$question['question']}', '{$question['student_id']}')";
=======
  $sql = "INSERT INTO app_for_students.question (title, question, student_id) VALUES ('{$question['title']}','{$question['question']}', '{$question['student_id']}')";
>>>>>>> 742f0fac3f8bf048481c65d6f1cabb0a019d097f
  if ($conn->query($sql) === TRUE) {
    echo "<h1>New question record created successfully<br></h1>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

foreach ($answers as $answer) {
  $sql = "INSERT INTO app_for_students.answer (answer, question_id, student_id) VALUES ('{$answer['answer']}', '{$answer['question_id']}', '{$answer['student_id']}')";
  if ($conn->query($sql) === TRUE) {
    echo "<h1>New answer record created successfully<br></h1>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>