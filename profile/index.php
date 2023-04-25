<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style.css">
	<link rel="icon" type="image/svg+xml" href="/app-for-students/book.svg" />
	<title>Profile Page</title>
	<style>
		.profile {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		.profile-img {
			width: 100px;
			height: 100px;
			border-radius: 50%;
			margin-right: 20px;
		}

		.profile-name {
			font-size: 24px;
			font-weight: bold;
		}
	</style>
</head>

<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (!isset($_SESSION["username"])) {
	header("Location: /app-for-students/login");
	exit();
}
?>

<body>
	<nav class="container">
		<ul>
			<li><a href="/app-for-students" class="contrast"><strong>Edu.ISI</strong></a></li>
		</ul>
		<ul>
			<li>
				<a href="#" class="secondary outline sun" role="button" style="border: none;" data-theme-switcher="light">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
						<path fill-rule="evenodd"
							d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
							clip-rule="evenodd"></path>
					</svg>
				</a>
			</li>
			<li>
				<a href="#" class="secondary outline moon" role="button" style="border: none;" data-theme-switcher="dark">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
						<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
					</svg>
				</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="profile">
			<img class="profile-img" src="speaker-3.jpg" alt="Profile Picture">
			<div class="profile-info">
				<?php
				$servername = "localhost";
				$username = "root";
				$password = "";

				$conn = new mysqli($servername, $username, $password);

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$id = $_GET["id"];
				$sql = "SELECT * FROM app_for_students.student WHERE id = $id";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo "<h1 class='profile-name'>" . $row["username"] . "</h1>";
				?>
				<p class="section"> <em><b>L2CS</b> student at the higher institute of computer science </em></p>
			</div>
		</div>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		$conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$student_id = $_GET["id"];

		$sql = "SELECT * FROM app_for_students.question WHERE student_id = '" . $student_id . "'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<article class='question'>";
				echo "<div class='question-header'>";
				echo "<h2>" . $row["title"] . "</h2>";
				echo "<h3>Subject: <a href='#'>" . "Mathematics" . "</a></h3>";
				$sql = "SELECT * FROM app_for_students.student WHERE id = " . $row["student_id"];
				$student = $conn->query($sql);
				$student = $student->fetch_assoc();

				echo "<p class='details'> <small><em>Asked by <b>" . $student["username"] . "</b> on " . $row["created_at"] . "</em></small> </p>";
				echo "</div>";
				echo "<div class='question-body'>";
				echo "<p class='question-content'>" . $row["question"] . "</p>";
				echo "</div>";
				echo "<div class='answers'>";
				echo "<h4>Answers</h4>";

				$sql = "SELECT * FROM app_for_students.answer WHERE question_id = " . $row["id"];
				$answers = $conn->query($sql);

				if ($answers->num_rows > 0) {
					while ($answer = $answers->fetch_assoc()) {
						echo "<div class='answer'>";
						echo "<p class='answer-content'>" . $answer["answer"] . "</p>";
						echo "</div>";
					}
				} else {
					echo "<p class='answer-content'>No answers yet</p>";
				}

				echo "</div>";
				echo "</article>";
			}
		} else {
			echo "<p class='section'>No questions yet</p>";
		}

		?>

		<script src="../js/minimal-theme-switcher.js"></script>
</body>

</html>