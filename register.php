<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "eduplus";

// Establish database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $conn->real_escape_string($_POST["full_name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $course = $conn->real_escape_string($_POST["course"]);

    // Validate inputs
    if (!empty($full_name) && !empty($email) && !empty($phone) && !empty($course)) {
        // Insert data into the database
        $sql = "INSERT INTO registrations (full_name, email, phone, course) VALUES ('$full_name', '$email', '$phone', '$course')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
}

// Close the database connection
$conn->close();
?>  
