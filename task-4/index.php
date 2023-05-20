<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login page</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon" />
</head>

<body>
  <header>
    <nav>
      <div class="logo-container">
        <a href="/index.html"><img src="images/logo.svg" alt="logo image" /></a>
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
      <div class="container__one">
        <a class="heading" href="#">STUDENTS</a>
        <a class="add__student" href="admission.php">Add Students</a>
      </div>
      <div class="student__table">
        <table>
          <thead>
            <tr>
              <th>R No.</th>
              <th>FULL NAME</th>
              <th>BRANCH</th>
              <th>MOBILE</th>
              <th>EMAIL</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Nivedh VU</td>
              <td>computer science</td>
              <td>7589256282</td>
              <td>nivedh@gmail.com</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dilin AM</td>
              <td>mechanical engineering</td>
              <td>9592456282</td>
              <td>dilin@gmail.com</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Dheeraj CS</td>
              <td>civil engineering</td>
              <td>9562256282</td>
              <td>dheeraj@gmail.com</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Shyamnanth</td>
              <td>civil engineering</td>
              <td>7589256892</td>
              <td>shyam@gmail.com</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Jeswin jose</td>
              <td>mechanical engineering</td>
              <td>6858256282</td>
              <td>jeswin@gmail.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>