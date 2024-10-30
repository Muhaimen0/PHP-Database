<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $section = isset($_POST['section']) ? $_POST['section'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $student_no = isset($_POST['student_no']) ? $_POST['student_no'] : '';

    $sql = "INSERT INTO students (first_name, last_name, section, email, student_no)
            VALUES ('$first_name', '$last_name', '$section', '$email', '$student_no')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
