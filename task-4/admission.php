<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admission</title>
  <link rel="stylesheet" href="css/admission.css" />
  <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon" />
</head>

<body>
  <?php
  // Get the form data
  $first_name = $_POST['first_name'];
  // $email = $_POST['email'];
  // $course = $_POST['course'];

  // Connect to the MySQL database
  $conn = mysqli_connect("localhost", "root", "", "one_school");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert the form data into the database
  $sql = "INSERT INTO student (first_name) VALUES ('$first_name')";
  mysqli_query($conn, $sql);
  // if (!empty($first_name)) {
  //   header("Location: index.php");
  //   exit();
  // }

  // Close the database connection
  mysqli_close($conn);
  ?>
  <header>
    <nav>
      <div class="logo-container">
        <a href="index.php"><img src="images/logo.svg" alt="logo" /></a>
        <h2>One School</h2>
      </div>
      <img class="profile__image" src="images/man.png" alt="progilepic" />
    </nav>
  </header>
  <main>
    <div class="sidebar">
      <ul class="list">
        <li class="list__item flex">
          <img src="images/student.png" alt="student-icon" />
          <a href="#">STUDENTS</a>
        </li>
        <li class="list__item flex">
          <img src="images/staff.png" alt="staff-icon" />
          <a href="#">STAFF</a>
        </li>
        <li class="list__item flex">
          <img src="images/exam.png" alt="exam-icon" />
          <a href="#">EXAMS</a>
        </li>
      </ul>
    </div>
    <div class="main-container">
      <div class="heading">
        <a href="#">STUDENT REGISTRATION</a>
      </div>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-area">
        <div class="section_one">
          <div class="form-group">
            <label for="first-name">First Name <span>*</span> :</label>
            <input id="first-name" name="first_name" type="text" placeholder="Enter your first name" autofocus />
          </div>
          <div class="form-group">
            <label for="last-name">Last Name <span>*</span> :</label>
            <input id="last-name" name="last_name" type="text" placeholder="Enter your last name" />
          </div>
        </div>
        <div class="section_two">
          <div class="form-group">
            <label for="">Mobile <span>*</span> :</label>
            <input type="tel" placeholder="Enter your mobile number" />
          </div>
          <div class="form-group">
            <label for="">Email <span>*</span> :</label>
            <input type="email" placeholder="Enter your email" />
          </div>
        </div>
        <div class="section_three">
          <div class="form-group">
            <label for="">Branch <span>*</span> :</label>
            <input type="text" list="branches" placeholder="Select branches you like" />
            <datalist id="branches">
              <option>Computer science engineering</option>
              <option>Mechanical engineering</option>
              <option>Civil engineering</option>
            </datalist>
          </div>
          <div class="form-group">
            <label for="">Do You Need Hostel Facility :</label>
            <div class="radio">
              <div>
                <input type="radio" name="hostel" id="yes" />
                <label class="radio__label" for="yes">Yes</label>
              </div>
              <div>
                <input type="radio" name="hostel" id="no" />
                <label class="radio__label" for="no">No</label>
              </div>
            </div>
          </div>
        </div>
        <div class="section_four">
          <div class="form-group">
            <div><label for="">Choose Additional Subjects :</label></div>
            <div class="check">
              <div>
                <input id="cybersecurity" type="checkbox" />
                <label for="cybersecurity">Cyber Security</label>
              </div>
              <div>
                <input id="ai" type="checkbox" />
                <label for="ai">Artificial Intelligence</label>
              </div>
              <div>
                <input id="bc" type="checkbox" />
                <label for="bc">Block Chain</label>
              </div>
              <div>
                <input id="iot" type="checkbox" />
                <label for="iot">IoT</label>
              </div>
              <div>
                <input id="robotics" type="checkbox" />
                <label for="robotics">Robotics</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Permanenet Address <span>*</span> :</label>
          <textarea cols="30" rows="7" placeholder="Enter your full address"></textarea>
        </div>
        <div class="button">
          <button type="reset">Clear</button>
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>