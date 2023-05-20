<?php
// Validate form data
if (empty($_POST['name'])) {
    header("Location: student.php?name_error=true");
    exit;
}

if (empty($_POST['email'])) {
    header("Location: student.php?email_error=true");
    exit;
}

if (empty($_POST['mobile'])) {
    header("Location: student.php?mobile_error=true");
    exit;
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the form data into the database
$sql = "INSERT INTO students (name, email, mobile) VALUES ('$name', '$email', '$mobile')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the form with success message
header("Location: student.php?success=true");
exit;
