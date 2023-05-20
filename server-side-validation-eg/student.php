<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1>Student Registration Form</h1>
    <form class="" action="submit.php" method="post">
        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" />
        <?php
        if (isset($_GET['name_error'])) {
            echo "<p style='color:red;'>This field is mandatory</p>";
        }
        ?>
        <br />

        <label class="form-label" for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" />
        <?php
        if (isset($_GET['email_error'])) {
            echo "<p style='color:red;'>This field is mandatory</p>";
        }
        ?>
        <br />

        <label class="form-label" for="mobile">Mobile:</label>
        <input class="form-control" type="text" id="mobile" name="mobile" />
        <?php
        if (isset($_GET['mobile_error'])) {
            echo "<p style='color:red;'>This field is mandatory</p>";
        }
        ?>
        <br />

        <input class="btn btn-danger" type="reset" value="Reset" />
        <input class="btn btn-success" type="submit" value="Submit" />
    </form>
</body>

</html>