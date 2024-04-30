<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lecture Page</title>
  <style>
    /* CSS styles */
    /* Define your styles here */
  </style>
</head>

<body style="background-image: url('./Images/LECTA.jpg');background-repeat: no-repeat;background-size:cover;">

<header>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
      <img src="./Images/logo.jpg" width="90" height="60" alt="Logo">
    </li>
    <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./About.html">ABOUT </a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./CONTACT.html">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./course.php">COURSE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./student.php">STUDENT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./lecture.php">LECTURE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./examination.php">EXAMINATION</a></li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
    <br><br>
  </ul>
</header>

<section>
  <!-- Lecture Form -->
  <h1>Lecture Form</h1>

  <form id="lectureForm" method="post">
    <label for="lecture_id">lecture_id:</label>
    <input type="number" id="lecture_id" name="lecture_id"><br><br>

    <label for="first_name">first_name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">last_name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="specialization">specialization:</label>
    <input type="text" id="specialization" name="specialization" required><br><br>

    <label for="email"> email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" name="add" value="Insert" onclick="return confirmInsertion();">
  </form>

  <!-- JavaScript code for form submission confirmation -->
  <script>
    function confirmInsertion() {
      return confirm("Are you sure you want to insert this record?");
    }
  </script>

  <!-- PHP code for form submission and displaying records -->
  <?php
  // PHP code for form submission and displaying records
  include('database_connection.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Prepare and bind parameters with appropriate data types
      $stmt = $connection->prepare("INSERT INTO lecture (lecture_id, first_name, last_name, specialization, email) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("issss", $lecture_id, $first_name, $last_name, $specialization, $email);

      // Set parameters from POST data with validation (optional)
      $lecture_id = intval($_POST['lecture_id']); // Ensure integer for lecture_id
      $first_name = htmlspecialchars($_POST['first_name']); // Prevent XSS
      $last_name = htmlspecialchars($_POST['last_name']); // Prevent XSS
      $specialization = filter_var($_POST['specialization'], FILTER_SANITIZE_EMAIL); // Validate specialization
      $email = filter_var($_POST['email'], FILTER_SANITIZE_NUMBER_INT); // Sanitize email 

      // Execute prepared statement with error handling
      if ($stmt->execute()) {
          echo "New record has been added successfully!";
      } else {
          echo "Error: " . $stmt->error;
      }

      $stmt->close();
  }

  $connection->close();
  ?>

  <!-- Table to display lecture records -->
  <h2>Table of Lecture</h2>
  <table border="1">
    <tr>
      <th>lecture_id</th>
      <th>first_name</th>
      <th>last_name</th>
      <th>specialization</th>
      <th>email</th>
      <th>Delete</th>
      <th>Update</th>
    </tr>
    <?php
    include('database_connection.php');

    // SQL query to fetch data from lecture table
    $sql = "SELECT * FROM lecture";
    $result = $connection->query($sql);

    // Check if there are any lecture records
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            $lecture_id = $row['lecture_id']; // Fetch the lecture_id
            echo "<tr>
                    <td>" . $row['lecture_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['specialization'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td><a style='padding:4px' href='delete_lecture.php?lecture_id=$lecture_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_lecture.php?lecture_id=$lecture_id'>Update</a></td> 
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }
    // Close the database connection
    $connection->close();
    ?>
  </table>
</section>

<footer>
  <!-- Footer content -->
  <!-- Include your footer content here -->
</footer>

</body>
</html>
