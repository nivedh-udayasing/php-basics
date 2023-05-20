<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
</head>

<body>
  <h1>Student Registration</h1>
  <a href="student.php">Add Student</a>

  <?php
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "mydatabase");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve data from the database
  $sql = "SELECT * FROM students";
  $result = mysqli_query($conn, $sql);

  // Display the data as a table
  if (mysqli_num_rows($result) > 0) {
    echo "<h2>Student List</h2>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Mobile</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["mobile"] . "</td></tr>";
    }
    echo "</table>";
  }

  // Close the database connection
  mysqli_close($conn);
  ?>
</body>

</html>