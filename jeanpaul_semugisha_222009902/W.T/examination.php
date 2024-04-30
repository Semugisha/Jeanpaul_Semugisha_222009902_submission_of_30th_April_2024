<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>examination Page</title>
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

<body style="background-image: url('./Images/examination.jpg');background-repeat: no-repeat;background-size:cover;">

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
<h1>examination  Form</h1>

    <form method="post">
        <label for="examination_id">examination_id:</label>
        <input type="number" id="examination_id" name="examination_id"><br><br>

        <label for="examination_name">examination_name:</label>
        <input type="text" id="examination_name" name="examination_name" required><br><br>

        <label for="examination_date">examination_date:</label>
        <input type="date" id="examination_date" name="examination_date" required><br><br>

        <label for="subject">subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>


        <input type="submit" name="add" value="Insert">
    </form>

    <?php
    include('database_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO examination (examination_id, examination_name, examination_date, subject) VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("isss", $examination_id, $examination_name, $examination_date, $subject);

        // Set parameters from POST data with validation (optional)
        $examination_id = intval($_POST['examination_id']); // Ensure integer for examination_id
        $examination_name = htmlspecialchars($_POST['examination_name']); // Prevent XSS
        $examination_date = htmlspecialchars($_POST['examination_date']); // Prevent XSS
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_EMAIL); // Validate subject 

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
// SQL query to fetch data from examination table
$sql = "SELECT * FROM examination";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of lecture</title>
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
    <center><h2>Table of examination</h2></center>
    <table border="5">
        <tr>
            <th>examination_id</th>
            <th>examination_name</th>
            <th>examination_date</th>
            <th>subject</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');


        // Prepare SQL query to retrieve all examination
        $sql = "SELECT * FROM examination";
        $result = $connection->query($sql);

        // Check if there are any examination
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $examination_id = $row['examination_id']; // Fetch the examination_id
                echo "<tr>
                    <td>" . $row['examination_id'] . "</td>
                    <td>" . $row['examination_name'] . "</td>
                    <td>" . $row['examination_date'] . "</td>
                    <td>" . $row['subject'] . "</td>
                    <td><a style='padding:4px' href='delete_examination.php?examination_id=$examination_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_examination.php?examination_id=$examination_id'>Update</a></td> 
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