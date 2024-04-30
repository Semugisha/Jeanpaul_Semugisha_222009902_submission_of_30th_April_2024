<?php
include('database_connection.php');

// Check if examination_id is set via POST or GET
if(isset($_POST['examination_id'])) {
    $examination_id = $_POST['examination_id'];
} elseif(isset($_GET['examination_id'])) {
    $examination_id = $_GET['examination_id'];
} else {
    // Display error message if examination_id is not set
    echo "Error: examination_id is not set."; 
    exit(); // Stop execution
}

// Function to confirm deletion using JavaScript
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}

// Prepare and execute the DELETE statement
$stmt = $connection->prepare("DELETE FROM examination WHERE examination_id=?");
$stmt->bind_param("i", $examination_id);

if ($stmt->execute()) {
    echo "Record deleted successfully.<br><br>";
    echo "<a href='examination.php'>OK</a>"; // Link to wherever you want to redirect after deletion
} else {
    echo "Error deleting data: " . $stmt->error;
}

$stmt->close();
$connection->close();
?>
<script>
// JavaScript function to confirm deletion before submitting the form
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}
</script>

<form method="post" action="" onsubmit="return confirmDelete()">
    Enter examination_id to Delete: <input type="text" name="examination_id">
    <input type="submit" value="Delete">
</form>
