<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>

<body>
    <h1>Add Student</h1>
    <form action="insert_student.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required /><br />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required /><br />

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" /><br />

        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </form>
</body>

</html>