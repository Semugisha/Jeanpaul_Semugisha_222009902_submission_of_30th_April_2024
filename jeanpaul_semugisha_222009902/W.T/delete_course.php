<?php
include('database_connection.php');

// Check if student_id is set
if(isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM course WHERE course_id=?");
    $stmt->bind_param("i", $course_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>";
        echo "<a href='course.php'>OK</a>"; // Link to wherever you want to redirect after deletion
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} elseif(isset($_GET['course_id'])) {
    // This block is to handle the case where student_id is passed through a link
    $course_id = $_GET['course_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM course WHERE course_id=?");
    $stmt->bind_param("i", $course_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>";
        echo "<a href='course_id.php'>OK</a>"; // Link to wherever you want to redirect after deletion
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Display a form to input the student_id with JavaScript confirmation
    ?>
    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
    </script>
    <form method="post" action="" onsubmit="return confirmDelete()">
        Enter course_id to Delete: <input type="text" name="course_id">
        <input type="submit" value="Delete">
    </form>
    <?php
}

$connection->close();
?>
