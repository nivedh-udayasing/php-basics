<?php
// Database connection configuration
$host = 'localhost';
$db = 'school';
$user = 'root';
$password = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $hostel = $_POST['hostel'];
    $subjects = $_POST['subjects'];
    foreach ($subjects as $row) {
        $subject .= $row . ",";
    }
    $branch = $_POST['branch'];
    $address = $_POST['address'];



    $stmt = $pdo->prepare("UPDATE student SET first_name = ?,last_name = ?,mobile = ?, email = ?,hostel = ?,subject = ?,branch = ?,address = ? WHERE id = ?");
    $stmt->execute([$first_name, $last_name, $mobile, $email, $hostel, $subject, $branch, $address, $id]);

    header("Location: main.php"); // Redirect to main.php after updating data
    exit;
}

// Fetch the user record to be edited
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM student WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found");
    }
} else {
    die("Invalid request");
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="index.php">
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
                <div class="row-12 my-3">Student Registration</div>
                <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" class="needs-validation row g-3" method="POST" novalidate>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <!-- First Name -->
                    <div class="col-sm-12 col-md-6">
                        <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input required class="form-control" placeholder="Enter student's frist name" value="<?php echo $user['first_name'] ?>" id="first-name" type="text" name="first_name" />

                    </div>
                    <!-- Last Name -->
                    <div class="col-sm-12 col-md-6">
                        <label for="last-name" class="form-label ">Last Name <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="last_name" id="last-name" value="<?php echo $user['last_name'] ?>" placeholder="Enter Student's Last Name" />




                    </div>
                    <!-- Mobile -->
                    <div class="col-sm-12 col-md-6">
                        <label for="mobile" class="form-label ">Mobile <span class="text-danger">*</span></label>
                        <input required type="tel" class="form-control" name="mobile" id="mobile" value="<?php echo $user['mobile'] ?>" placeholder="Enter Parents's Mobile Number" />


                    </div>
                    <!-- Email -->
                    <div class="col-sm-12 col-md-6">
                        <label for="email" class="form-label ">Email <span class="text-danger">*</span></label>
                        <input required type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'] ?>" placeholder="Enter Parents's Email ID" />

                    </div>
                    <!-- branch -->
                    <div class="col-sm-12 col-md-6">
                        <label for="branch" class="form-label">Branch <span class="text-danger">*<span></label>
                        <select name="branch" id="branch" class="form-select" required>
                            <option value="">select your branch</option>
                            <option value="mechanical" <?php echo $user["branch"] == 'mechanical' ? 'selected' : ''; ?>>Mechanical</option>
                            <option value="civil" <?php echo $user["branch"] == 'civil' ? 'selected' : ''; ?>>civil</option>
                            <option value="aero" <?php echo $user["branch"] == 'aero' ? 'selected' : ''; ?>>Aeronautical</option>
                            <option value="electrical" <?php echo $user["branch"] == 'electrical' ? 'selected' : ''; ?>>Electrical</option>
                        </select>

                    </div>
                    <!--hostel-->
                    <div class="col-sm-12 col-md-6">
                        <label for="hostel" class="form-label d-block">Do you need hostel facility <span class="text-danger">*<span></label>
                        <div class="form-check form-check-inline fix">
                            <input type="radio" class="form-check-input" id="yes" name="hostel" value="yes" <?php echo $user["hostel"] == 'yes' ? 'checked' : ''; ?>>
                            <label for="yes" class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline fix">
                            <input type="radio" class="form-check-input" id="no" name="hostel" value="no" <?php echo $user["hostel"] == 'no' ? 'checked' : ''; ?>>
                            <label for="no" class="form-check-label">NO</label>
                        </div>

                    </div>
                    <!-- additional subjects -->
                    <div class="col-sm-12 col-md-6">
                        <label for="subjects" class="form-label d-block">Additional subjects</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="cybersecurity" name="subjects[]" value="cybersecurity">
                            <label for="cybersecurity" class="form-check-label">Cyber security</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="ai" name="subjects[]" value="Artifical intelegence">
                            <label for="ai" class="form-check-label">Artifical intelegence</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="iot" name="subjects[]" value="IOT">
                            <label for="iot" class="form-check-label">IOT</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="blockchain" name="subjects[]" value="blockchain">
                            <label for="blockchain" class="form-check-label">Block chain</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="robotics" name="subjects[]" value="robotics">
                            <label for="robotics" class="form-check-label">Robotics</label>
                        </div>
                    </div>
                    <!-- address -->
                    <div class="col-sm-12 col-md-6">
                        <label for="address" class="form-label d-block">Address <span class="text-danger">*<span></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required><?php echo $user['address']; ?></textarea>

                    </div>
                    <?php print_r($subjects); ?>
                    <!-- reset button -->
                    <div class="col-sm-12 col-md-6 offset-6 text-end">
                        <button class="btn btn-success btn-sm" type="submit">
                            <i class="bi bi-person-plus-fill"></i>
                            update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>