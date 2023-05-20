<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    // assiging empty variable
    $first_name = '';
    $last_name = '';
    $mobile_number = '';
    $email_id = '';
    $branch = '';
    $hostel = '';
    $subject = '';
    $address = '';
    $errors = $_GET;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = sanitizeField($_POST['first_name']);
        $last_name = sanitizeField($_POST['last_name']);
        $mobile = sanitizeField($_POST['mobile']);
        $email = sanitizeField($_POST['email']);
        $branch = sanitizeField($_POST['branch']);
        $hostel = sanitizeField($_POST['hostel']);
        $address = sanitizeField($_POST['address']);
        $add_subjects = $_POST['add_subjects'];
        $subject = "";
        foreach ($add_subjects as $row) {
            $subject .= $row . ",";
        }
        $errors = [];

        if (empty($first_name)) {
            $errors['first_name'] = 'first name is mandatory.';
        }

        if (empty($last_name)) {
            $errors['last_name'] = 'last name is mandatory.';
        }
        if (empty($mobile)) {
            $errors['mobile'] = 'mobile number is mandatory.';
        }
        if (empty($email)) {
            $errors['email'] = 'email id is mandatory.';
        }
        if (empty($branch)) {
            $errors['branch'] = 'branch is mandatory.';
        }
        if (empty($hostel)) {
            $errors['hostel'] = 'hostel is mandatory.';
        }
        if (empty($address)) {
            $errors['address'] = 'address is mandatory.';
        }

        if (count($errors) > 0) {
            header('Location: student.php?' . http_build_query($errors));
            exit();
        }
        $conn = mysqli_connect("localhost", "root", "", "schools");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the form data into the database
        $sql = "INSERT INTO student (first_name,last_name,mobile,email,branch,hostel,subject,address) VALUES ('$first_name', '$last_name', '$mobile','$email','$branch','$hostel','$subject','$address')";
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
    }
    function sanitizeField($field)
    {
        $field = htmlspecialchars($field);
        $field = trim($field);
        $field = stripslashes($field);
        return $field;
    }

    ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.svg" alt="Logo" width="40" height="30" class="d-inline-block align-text-top" />
                ONE SCHOOL
            </a>
            <a class="navbar-brand" href="#">
                <img src="images/man.png" alt="profile" width="45" height="45" />
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

                <div class="row-12 my-3">Student Registration</div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation row g-3" method="post" novalidate>
                    <!-- First Name -->
                    <div class="col-sm-12 col-md-6">
                        <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input required class="form-control <?php if (!empty($errors['first_name'])) {
                                                                echo 'is-invalid';
                                                            } ?>" id="first-name" type="text" name="first_name" placeholder="Enter Student's First Name" />
                        <div class="invalid-feedback"><?php if (!empty($errors['first_name'])) {
                                                            echo $errors['first_name'];
                                                        } else {
                                                            echo 'First name is required';
                                                        }
                                                        ?></div>
                    </div>
                    <!-- Last Name -->
                    <div class="col-sm-12 col-md-6">
                        <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control <?php if (!empty($errors['last_name'])) {
                                                                            echo 'is-invalid';
                                                                        } ?>" name="last_name" id="last-name" placeholder="Enter Student's Last Name" />
                        <div class="invalid-feedback"><?php if (!empty($errors['last_name'])) {
                                                            echo $errors['last_name'];
                                                        } else {
                                                            echo 'last name is required';
                                                        }
                                                        ?></div>
                        <!-- <?php
                                if (isset($errors['last_name'])) {
                                    echo '<div style="color: red;">' . $errors['last_name'] . '</div>';
                                }
                                ?> -->
                    </div>
                    <!-- Mobile -->
                    <div class="col-sm-12 col-md-6">
                        <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                        <input required type="tel" class="form-control <?php if (!empty($errors['mobile'])) {
                                                                            echo 'is-invalid';
                                                                        } ?>" name="mobile" id="mobile" placeholder="Enter Parents's Mobile Number" />
                        <div class="invalid-feedback"><?php if (!empty($errors['mobile'])) {
                                                            echo $errors['mobile'];
                                                        } else {
                                                            echo 'mobile number is required';
                                                        }
                                                        ?></div>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-12 col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input required type="email" class="form-control <?php if (!empty($errors['email'])) {
                                                                                echo 'is-invalid';
                                                                            } ?>" name="email" id="email" placeholder="Enter Parents's Email ID" />
                        <div class="invalid-feedback"><?php if (!empty($errors['email'])) {
                                                            echo $errors['email'];
                                                        } else {
                                                            echo 'email id is required';
                                                        }
                                                        ?></div>

                    </div>
                    <!-- Branch -->
                    <div class="col-sm-12 col-md-6">
                        <label class="form-label" for="branch-id">Branch <span class="text-danger">*</span></label>
                        <select id="branch-id" name="branch" class="form-select <?php if (!empty($errors['branch'])) {
                                                                                    echo 'is-invalid';
                                                                                } ?>" required>
                            <option value="" selected hidden>Select Branches you like</option>
                            <option value="Computer Science Engineering">Computer Science Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                        </select>
                        <div class="invalid-feedback"><?php if (!empty($errors['branch'])) {
                                                            echo $errors['branch'];
                                                        } else {
                                                            echo 'branch is required';
                                                        }
                                                        ?></div>

                    </div>
                    <!-- Hostel Radio buttons-->
                    <div class="col-sm-12 col-md-6">
                        <label class="form-label d-block">Needs Hostel Facility <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline fix-position">
                            <input class="form-check-input <?php if (!empty($errors['hostel'])) {
                                                                echo 'is-invalid';
                                                            } ?>" type="radio" value="Yes" name="hostel" id="yes" required />
                            <label class="form-check-label" for="yes">YES</label>
                        </div>
                        <div class="form-check form-check-inline fix-position">
                            <input required class="form-check-input <?php if (!empty($errors['hostel'])) {
                                                                        echo 'is-invalid';
                                                                    } ?>" value="No" type="radio" name="hostel" id="no" />
                            <label class="form-check-label" for="no">NO</label>
                            <div class="invalid-feedback not-selected"><?php if (!empty($errors['hostel'])) {
                                                                            echo $errors['hostel'];
                                                                        } else {
                                                                            echo 'hostel is required';
                                                                        }
                                                                        ?></div>
                        </div>
                    </div>
                    <!-- Additional subjects -->
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <label for="extra" class="form-label">Choose Additional Subjects
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Cyber Securiy" name="add_subjects[]" id="cyber-security" />
                            <label class="form-check-label" for="cyber-security">Cyber Security</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Artificial Inteligence" name="add_subjects[]" id="artificial-inteligence" />
                            <label class="form-check-label" for="artificial-inteligence">Artificial Inteligence</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Block Chain" name="add_subjects[]" id="block-chain" />
                            <label class="form-check-label" for="block-chain">Block Chain</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="IOT" name="add_subjects[]" id="iot" />
                            <label class="form-check-label" for="iot">IOT</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Robotics" name="add_subjects[]" id="robotics" />
                            <label class="form-check-label" for="robotics">ROBOTICS</label>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                        </div>
                        <textarea required class="form-control <?php if (!empty($errors['address'])) {
                                                                    echo 'is-invalid';
                                                                } ?>" name="address" id="address" cols="30" rows="5" placeholder="Enter your address"></textarea>
                        <div class="invalid-feedback"><?php if (!empty($errors['address'])) {
                                                            echo $errors['address'];
                                                        } else {
                                                            echo 'address is required';
                                                        }
                                                        ?></div>

                    </div>
                    <!-- reset button -->
                    <div class="col-sm-12 col-md-6 offset-6 text-end">
                        <button class="btn btn-secondary btn-sm" type="reset">
                            <i class="bi bi-reply"></i>
                            Reset
                        </button>
                        <button class="btn btn-success btn-sm" type="submit">
                            <i class="bi bi-person-plus-fill"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>