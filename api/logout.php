<?php
// log the user out and redirect to the login page
session_start();
session_destroy();
header("Location: /app-for-students/login");
exit();

?>