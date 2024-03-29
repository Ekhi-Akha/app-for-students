<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A register page">
    <link rel="icon" type="image/svg+xml" href="/app-for-students/book.svg" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="custom.css">

</head>


<?php
// ignore if session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["username"])) {
    header("Location: /app-for-students/home");
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
                <a href="#" class="secondary outline sun" role="button" style="border: none;"
                    data-theme-switcher="light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">

                    </svg>
                </a>
            </li>
            <li>
                <a href="#" class="secondary outline moon" role="button" style="border: none;"
                    data-theme-switcher="dark">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>

    <main class="container">
        <article class="grid my-grid">
            <div>
                <hgroup>
                    <h1>Register</h1>
                    <h2>Enter your credentials and join us.</h2>
                </hgroup>
                <?php
                if (isset($_POST["submit"])) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $passwordConfirmation = $_POST["password-confirm"];
                    $educational_level = $_POST["educational-level"];


                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    $errors = array();

                    if (empty($username) || empty($email) || empty($password) || empty($passwordConfirmation) || $educational_level === 'nothing') {
                        array_push($errors, "All fields are required");
                    }

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                    }

                    if (strlen($password) < 8) {
                        array_push($errors, "Password must be at least 8 characters long");
                    }

                    if ($password !== $passwordConfirmation) {
                        array_push($errors, "Password does not match");
                    }

                    require_once "database.php";
                    $sql = "SELECT * FROM student WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        array_push($errors, "Email already exists!");
                    }

                    // check if username already exists
                    $sql = "SELECT * FROM student WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        array_push($errors, "Username already exists!");
                    }

                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<p class='error'>$error</p>";
                        }
                    } else {
                        $sql = "INSERT INTO student (username, email, password, educational_level) VALUES ('$username', '$email', '$passwordHash', '$educational_level')";
                        mysqli_query($conn, $sql);
                        // get the id of the last inserted row
                        $id = mysqli_insert_id($conn);
                        $_SESSION["email"] = $email;
                        $_SESSION["username"] = $username;
                        $_SESSION["student_id"] = $id;
                        header("Location: /app-for-students/home");
                        exit();
                    }
                }
                ?>


                <form method="post" id="form">

                    <div class="grid">
                        <input type="text" id="username" name="username" placeholder="Username" aria-label="username"
                            autocomplete="username" required>
                        <input type="text" id="email" name="email" placeholder="Email" aria-label="Email"
                            autocomplete="email" required>
                    </div>

                    <input type="password" id="password" name="password" placeholder="Password" aria-label="Password"
                        autocomplete="new-password" required>

                    <input type="password" id="passwordConfirmation" name="password-confirm"
                        placeholder="Password confirmation" aria-label="Password" autocomplete="new-password" required>

                    <select id="educational-level" name="educational-level">
                        <option value="nothing" selected>Select your educational level…</option>
                        <option value="l1">Licence 1</option>
                        <option value="l2">Licence 2</option>
                        <option value="l3">Licence 3</option>
                    </select>

                    <fieldset>
                        <label for="remember">
                            <input type="checkbox" role="switch" id="remember" name="remember">
                            Remember me
                        </label>
                    </fieldset>
                    <input type="submit" class="contrast" name="submit" value="Register">
                </form>
                <a href="/app-for-students/login">Already have an account? Login</a>
            </div>
            <div></div>
        </article>
    </main>

    <footer class="container-fluid">
        <small>Built by <a href="https://github.com/Ekhi-Akha/" target="_blank" class="secondary">Ekhi Akha</a> •
            CopyRight © 2023 Ekhi
            Akha, Inc. All rights reserved.</small>
    </footer>

    <script src="../js/minimal-theme-switcher.js"></script>
    <script src="validation.js"></script>

</body>

</html>