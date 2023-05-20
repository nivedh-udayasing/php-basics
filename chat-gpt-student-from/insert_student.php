<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "mydatabase");

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

// Redirect back to index.php
header("Location: index.php");
exit();
