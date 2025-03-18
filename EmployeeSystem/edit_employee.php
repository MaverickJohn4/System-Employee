<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch employee data for editing
    $sql = "SELECT * FROM employee WHERE id = $id";
    $result = $conn->query($sql);
    $employee = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];

        // Update employee record
        $sql = "UPDATE employee SET first_name = '$first_name', last_name = '$last_name', department = '$department', salary = '$salary' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php'); // Redirect to employee list
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="edit_employee.php?id=<?php echo $employee['id']; ?>" method="POST">
        <label for="first_name">First Name:</label><br>
        <input type="text" name="first_name" value="<?php echo $employee['first_name']; ?>" required><br><br>

        <label for="last_name">Last Name:</label><br>
        <input type="text" name="last_name" value="<?php echo $employee['last_name']; ?>" required><br><br>

        <label for="department">Department:</label><br>
        <input type="text" name="department" value="<?php echo $employee['department']; ?>" required><br><br>

        <label for="salary">Salary:</label><br>
        <input type="number" name="salary" value="<?php echo $employee['salary']; ?>" required><br><br>

        <input type="submit" value="Update Employee">
    </form>
    <a href="index.php">Back to Employee List</a>
</body>
</html>

<?php $conn->close(); ?>
