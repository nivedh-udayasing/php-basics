<?php
// // assiging empty variable
// $first_name = '';
// $last_name = '';
// $mobile_number = '';
// $email_id = '';
// $branch = '';
// $hostel = '';
// $subject = '';
// $address = '';

//
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
        $errors['first_name'] = 'first name field is required.';
    }

    if (empty($last_name)) {
        $errors['last_name'] = 'last name field is required.';
    }
    if (empty($mobile)) {
        $errors['mobile'] = 'mobile field is required.';
    }
    if (empty($email)) {
        $errors['email'] = 'email field is required.';
    }
    if (empty($branch)) {
        $errors['branch'] = 'branch field is required.';
    }
    if (empty($hostel)) {
        $errors['hostel'] = 'hostel field is required.';
    }
    if (empty($address)) {
        $errors['address'] = 'address field is required.';
    }

    if (count($errors) > 0) {
        header('Location: student.php?' . http_build_query($errors));
        exit();
    }
}

// if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['mobile']) || empty($_POST['branch']) || empty($_POST['hostel']) || empty($_POST['address'])) {
//     header("Location: student.php?first_name_err=true&last_name_err=true&mobile_err=true&email_err=true&branch_err=true&hostel_err=true&address_err=true");
//     exit;
// }

// prevent hacking or sql injection

function sanitizeField($field)
{
    $field = htmlspecialchars($field);
    $field = trim($field);
    $field = stripslashes($field);
    return $field;
}
// Connect to the database
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
