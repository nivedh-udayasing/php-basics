<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>One school</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="image/logo.png" alt="Logo" width="40" height="30" class="d-inline-block align-text-top" />
                ONE SCHOOL
            </a>
            <a class="navbar-brand" href="#">
                <img class="rounded-circle" src="image/profile.jpg" alt="profile" width="45" height="45" />
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="container_height row">
            <div class="sidebar_border col-2">
                <ul class="list-unstyled">
                    <li class="my-3 mx-4">Student</li>
                    <li class="my-3 mx-4">Staff</li>
                    <li class="my-3 mx-4">Exams</li>
                </ul>
            </div>
            <div class="col-10">
                <div class="row my-3">
                    <div class="col-10">
                        <p>STUDENTS</p>
                    </div>
                    <div class="icon col-2">
                        <a href="index.php" class="btn btn-success">ADD STUDENTS</a>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Hostel</th>
                        <th>Additional Subjects</th>
                        <th>Address</th>
                        <th class="text-center" colspan="2">Actions</th>
                    </tr>
                    <?php

                    // make a connection to the database
                    $conn = mysqli_connect("localhost", "root", "", "school");

                    // assign the table into a variable
                    $sql = "SELECT * FROM student";

                    // table data stored in the result variable
                    $result = $conn->query($sql);

                    // loop the table data and print data in html table
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['branch']; ?></td>
                                <td><?php echo $row['hostel']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><button type="button" class="btn btn-primary "><a style="color:white;" href=" edit.php?id=<?php echo $row['id']; ?>">Edit</a></button></td>
                                <td><button type="button" class="btn btn-danger "><a style="color:white;" href="delete.php?id=<?php echo $row['id']; ?>">delete</a></button></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="12">
                                No result
                            </td>
                        </tr>
                    <?php
                    }

                    // Close the database connection

                    mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>