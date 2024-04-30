
<?php
// Include database connection
include('database_connection.php');

// Check if student_id is set in the request
if(isset($_REQUEST['student_id'])) {
    // Get student_id from the request
    $student_id = $_REQUEST['student_id'];
    
    // Prepare and execute SQL query to select student data by student_id
    $stmt = $connection->prepare("SELECT * FROM student WHERE student_id=?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if student data is found
    if($result->num_rows > 0) {
        // Fetch student data
        $row = $result->fetch_assoc();
        // Store student information
        $student_id = $row['student_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $age = $row['age'];

        // HTML form to update student information
        ?>
        <html>
        <head>
            <script>
                // JavaScript function to confirm update
                function confirmUpdate() {
                    return confirm('Are you sure you want to update this record?');
                }
            </script>
        </head>
        <body>
            <!-- Update student form -->
            <form method="POST">
                <label for="first_name">First Name:</label>
                <!-- Display first_name from database -->
                <input type="text" name="first_name" value="<?php echo isset($first_name) ? htmlspecialchars($first_name) : ''; ?>">
                <br><br>
                <label for="last_name">Last Name:</label>
                <!-- Display last_name from database -->
                <input type="text" name="last_name" value="<?php echo isset($last_name) ? htmlspecialchars($last_name) : ''; ?>">
                <br><br> 

                <label for="email">Email:</label>
                <!-- Display email from database -->
                <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                <br><br>

                <label for="age">Age:</label>
                <!-- Display age from database -->
                <input type="number" name="age" value="<?php echo isset($age) ? $age : ''; ?>">
                <br><br>

                <!-- Hidden input field to store student_id -->
                <input type="hidden" name="student_id" value="<?php echo isset($student_id) ? $student_id : ''; ?>">
                <!-- Submit button to update student -->
                <input type="submit" name="up" value="Update" onclick="return confirmUpdate();">
            </form>
        </body>
        </html>

        <?php
        // Check if update button is clicked
        if(isset($_POST['up'])) {
            // Retrieve updated values from form
            $age = $_POST['age'];
            $email = $_POST['email'];
            $last_name = $_POST['last_name'];
            $first_name = $_POST['first_name'];
            $student_id = $_POST['student_id']; 
            
            // Update the student in the database
            $stmt = $connection->prepare("UPDATE student SET age=?, email=?, last_name=?, first_name=? WHERE student_id=?");
            $stmt->bind_param("isssi", $age, $email, $last_name, $first_name, $student_id);
            
            if($stmt->execute()) {
                // Redirect to student.php after successful update
                header('Location: student.php');
                exit; // Stop further execution
            } else {
                echo "Error updating student: " . $connection->error;
            }
        }
    } else {
        echo "Student not found.";
        exit; // Stop further execution
    }
} else {
    echo "Invalid request. Student is not set.";
    exit; // Stop further execution
}
?>
