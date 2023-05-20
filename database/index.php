<?php

// make a connection to the connection.php

require 'connection.php';

//

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $hostel = $_POST['hostel'];
    $add_subjects = $_POST['add_subjects'];
    $subject = "";
    foreach ($add_subjects as $row) {
        $subject .= $row . ",";
    }
    $address = $_POST['address'];

    $sql = "INSERT INTO student VALUES ('','$first_name','$last_name','$mobile','$email','$branch','$hostel','$subject','$address')";
    mysqli_query($conn, $sql);
    echo
    "
    <script> alert('Data inserted successfully'); </script>
    ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container my-5">
        <div class="row-12 my-3 h3">Student Registration</div>
        <form action="" class="needs-validation row g-3" method="POST" autocomplete="off" novalidate>
            <!-- First Name -->
            <div class="col-sm-12 col-md-6">
                <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                <input class="form-control <?php if (!empty($first_name_err)) {
                                                echo 'is-invalid';
                                            } ?>" id="first-name" required type=" text" name="first_name" placeholder="Enter Student's First Name" />
                <div class=" invalid-feedback"><?php if (!empty($first_name_err)) {
                                                    echo $first_name_err;
                                                } else {
                                                    echo "First name is required";
                                                } ?>
                </div>
            </div>
            <!-- Last Name -->
            <div class="col-sm-12 col-md-6">
                <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                <input required type="text" class="form-control <?php if (!empty($last_name_err)) {
                                                                    echo 'is-invalid';
                                                                } ?>" name="last_name" id="last-name" placeholder="Enter Student's Last Name" />
                <div class="invalid-feedback"><?php if (!empty($last_name_err)) {
                                                    echo $last_name_err;
                                                } else {
                                                    echo "Last name is required";
                                                } ?></div>
            </div>
            <!-- Mobile -->
            <div class="col-sm-12 col-md-6">
                <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                <input required type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter Parents's Mobile Number" />
                <div class="invalid-feedback">mobile number is required!</div>
            </div>
            <!-- Email -->
            <div class="col-sm-12 col-md-6">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input required type="email" class="form-control" name="email" id="email" placeholder="Enter Parents's Email ID" />
                <div class="invalid-feedback">email id is required!</div>
            </div>
            <!-- Branch -->
            <div class="col-sm-12 col-md-6">
                <label class="form-label" for="branch-id">Branch <span class="text-danger">*</span></label>
                <select id="branch-id" name="branch" class="form-select" required>
                    <option value="" selected hidden>Select Branches you like</option>
                    <option value="computer">Computer Science Engineering</option>
                    <option value="mechanical">Mechanical Engineering</option>
                    <option value="civil">Civil Engineering</option>
                </select>
                <div class="invalid-feedback">branch is required!</div>
            </div>
            <!-- Hostel Radio buttons-->
            <div class="col-sm-12 col-md-6">
                <label class="form-label d-block">Needs Hostel Facility <span class="text-danger">*</span></label>
                <div class="form-check form-check-inline fix-position">
                    <input class="form-check-input" type="radio" value="yes" name="hostel" id="yes" required />
                    <label class="form-check-label" for="yes">YES</label>
                </div>
                <div class="form-check form-check-inline fix-position">
                    <input required class="form-check-input" value="no" type="radio" name="hostel" id="no" />
                    <label class="form-check-label" for="no">NO</label>
                    <div class="invalid-feedback not-selected">not selected!</div>
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
                <textarea required class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Enter your address"></textarea>
                <div class="invalid-feedback">address is required!</div>
            </div>
            <!-- reset button -->
            <div class="col-sm-12 col-md-6 offset-6 text-end">
                <button class="btn btn-secondary btn-sm" type="reset">
                    <i class="bi bi-reply"></i>
                    Reset
                </button>
                <button class="btn btn-success btn-sm" name="submit" type="submit">
                    <i class="bi bi-person-plus-fill"></i>
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>