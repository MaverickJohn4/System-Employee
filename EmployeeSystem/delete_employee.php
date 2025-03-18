<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete employee record
    $sql = "DELETE FROM employee WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect to employee list
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
