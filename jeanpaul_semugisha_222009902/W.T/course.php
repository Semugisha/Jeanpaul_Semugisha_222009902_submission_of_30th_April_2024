<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Course Page</title>
  <style>
    /* CSS styles */
  </style>
</head>
<body style="background-image: url('./Images/ST.png');background-repeat: no-repeat;background-size:cover;">
  <!-- Header section -->
  <header>
    <h1>COURSE PAGE</h1>
  </header>

  <!-- Search form -->
  <form class="d-flex" role="search" action="search.php">
      <!-- Search input -->
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <!-- Search button -->
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  
  <!-- Navigation menu -->
  <ul style="list-style-type: none; padding: 0;">
    <!-- Logo -->
    <li style="display: inline; margin-right: 10px;">
      <img src="./Images/logo.jpg" width="90" height="60" alt="Logo">
    </li>
    <!-- Navigation links -->
    <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./About.html">ABOUT </a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./CONTACT.html">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./course.php">COURSE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./student.php">STUDENT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./lecture.php">LECTURE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./examination.php">EXAMINATION</a></li>
    <!-- Dropdown menu -->
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:gray; background-color:black; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>

  <!-- Main content section -->
  <section>
    <!-- Course Form -->
    <h1>Course Form</h1>
    <!-- Form for adding new course -->
    <form method="post">
        <label for="course_id">course_id:</label>
        <input type="number" id="course_id" name="course_id"><br><br>

        <label for="course_name">course_name:</label>
        <input type="text" id="course_name" name="course_name" required><br><br>

        <label for="instructor">instructor:</label>
        <input type="text" id="instructor" name="instructor" required><br><br>

        <label for="description_text">description_text:</label>
        <input type="text" id="description_text" name="description_text" required><br><br>

        <label for="credit"> credit:</label>
        <input type="number" id="credit" name="credit" required><br><br>

        <input type="submit" name="add" value="Insert">
    </form>

    <!-- PHP code for inserting data into the database -->
    <?php
    // PHP code
    ?>

    <!-- PHP code for displaying course data in a table -->
    <?php
    // PHP code
    ?>
  </section>

  <!-- Footer section -->
  <footer>
    <center> 
      <b><h2>UR CBE BIT &copy 2024 Designed by: @Jeanpaul Semugisha</h2></b>
    </center>
  </footer>
</body>
</html>  
