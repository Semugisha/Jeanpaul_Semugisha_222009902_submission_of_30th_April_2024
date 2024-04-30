<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>student Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;<!DOCTYPE html>

      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>
  
<header>
   

</head>

<body style="background-image: url('./Images/ST.png');background-repeat: no-repeat;background-size:cover;">

  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/logo.jpg" width="90" height="60" alt="Logo">
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a>
    <li style="display: inline; margin-right: 10px;"><a href="./About.html">ABOUT </a>
      <li style="display: inline; margin-right: 10px;"><a href="./CONTACT.html">CONTACT</a>
        <li style="display: inline; margin-right: 10px;"><a href="./course.php">COURSE</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./student.php">STUDENT</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./lecture.php">LECTURE</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./examination.php">EXAMINATION</a>
  </li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>
<h1>student  Form</h1>

    <form method="post">
        <label for="student_id">student_id:</label>
        <input type="number" id="student_id" name="student_id"><br><br>

        <label for="first_name">first_name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">last_name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="email"> email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="age"> age:</label>
        <input type="number" id="age" name="age" required><br><br>


        <input type="submit" name="add" value="Insert">
    </form>

    <?php
    include('database_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO student (student_id, first_name, last_name, email, age) VALUES ( ?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $student_id, $first_name, $last_name, $email, $age);

        // Set parameters from POST data with validation (optional)
        $student_id = intval($_POST['student_id']); // Ensure integer for student_id
        $first_name = htmlspecialchars($_POST['first_name']); // Prevent XSS
        $last_name = htmlspecialchars($_POST['last_name']); // Prevent XSS
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Validate email
        $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT); // Sanitize age 

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

<?php
include('database_connection.php');
// SQL query to fetch data from student table
$sql = "SELECT * FROM student";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of student</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of student</h2></center>
    <table border="5">
        <tr>
            <th>student_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>age</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');


        // Prepare SQL query to retrieve all student
        $sql = "SELECT * FROM student";
        $result = $connection->query($sql);

        // Check if there are any student
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $student_id = $row['student_id']; // Fetch the student_id
                echo "<tr>
                    <td>" . $row['student_id'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['age'] . "</td>
                    <td><a style='padding:4px' href='delete_student.php?lstudent_id=$student_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_student.php?student_id=$student_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy 2024 Designed by: @Jeanpaul Semugisha</h2></b>
  </center>
</footer>
</body>
</html>