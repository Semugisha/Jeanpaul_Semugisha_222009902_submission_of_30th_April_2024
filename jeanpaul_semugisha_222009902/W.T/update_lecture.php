<?php
include('database_connection.php');

if(isset($_REQUEST['lecture_id'])) {
    $lecture_id = $_REQUEST['lecture_id'];
    
    $stmt = $connection->prepare("SELECT * FROM lecture WHERE lecture_id=?");
    $stmt->bind_param("i", $lecture_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Y = $row['first_name'];
        $Z = $row['last_name'];
        $W = $row['specialization'];
        $N = $row['email'];
    } else {
        echo "lecture not found.";
    }
}
?>

<html>
<body>
    <form id="updateForm" method="POST">
        <label for="first_name">first_name:</label>
        <input type="text" name="first_name" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="last_name">last_name:</label>
        <input type="text" name="last_name" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="specialization">specialization:</label>
        <input type="text" name="specialization" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <input type="hidden" name="lecture_id" value="<?php echo isset($_REQUEST['lecture_id']) ? $_REQUEST['lecture_id'] : ''; ?>">

        <input type="submit" name="up" value="Update" onclick="return validateForm();">
    </form>

    <script>
        function validateForm() {
            var firstName = document.forms["updateForm"]["first_name"].value;
            var lastName = document.forms["updateForm"]["last_name"].value;
            var specialization = document.forms["updateForm"]["specialization"].value;
            var email = document.forms["updateForm"]["email"].value;

            if (firstName == "" || lastName == "" || specialization == "" || email == "") {
                alert("All fields must be filled out");
                return false;
            }
        }
    </script>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $lecture_id = $_POST['lecture_id'];
    
    // Update the lecture_id in the database
    $stmt = $connection->prepare("UPDATE lecture SET first_name=?, last_name=?, specialization=?, email=? WHERE lecture_id=?");
    $stmt->bind_param("ssssi", $first_name, $last_name, $specialization, $email, $lecture_id);
    $stmt->execute();
    
    // Redirect to lecture.php
    header('Location: lecture.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
