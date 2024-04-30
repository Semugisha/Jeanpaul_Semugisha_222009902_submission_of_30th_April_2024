<?php
include('database_connection.php');

if(isset($_REQUEST['course_id'])) {
    $course_id = $_REQUEST['course_id'];
    
    $stmt = $connection->prepare("SELECT * FROM course WHERE course_id=?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $course_name = $row['course_name'];
        $instructor = $row['instructor'];
        $description_text = $row['description_text'];
        $credit = $row['credit'];
    } else {
        echo "course not found.";
    }
}
?>

<html>
<body>
    <form method="POST" onsubmit="return confirmUpdate()">
        <label for="course_name">course_name:</label>
        <input type="text" name="course_name" value="<?php echo isset($course_name) ? $course_name : ''; ?>">
        <br><br>

        <label for="instructor">instructor:</label>
        <input type="date" name="instructor" value="<?php echo isset($instructor) ? $instructor : ''; ?>">
        <br><br>

        <label for="description_text">description_text:</label>
        <input type="text" name="description_text" value="<?php echo isset($description_text) ? $description_text : ''; ?>">
        <br><br>

        <label for="credit">credit:</label>
        <input type="text" name="credit" value="<?php echo isset($credit) ? $credit : ''; ?>">
        <br><br>


        <input type="submit" name="up" value="Update">
    </form>

    <script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update this examination?");
    }
    </script>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $course_name = $_POST['course_name'];
    $instructor = $_POST['instructor'];
    $description_text = $_POST['description_text'];
    $course_id = $_REQUEST['course_id'];
    
    // Update the course in the database
    $stmt = $connection->prepare("UPDATE course SET course_name=?, instructor=?, description_text=? WHERE course_id=?");
    $stmt->bind_param("sssi", $course_name, $instructor, $description_text, $course_id);
    $stmt->execute();
    
    // Redirect to course.php
    header('Location: course.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
