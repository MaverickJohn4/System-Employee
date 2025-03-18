<?php
include('connection.php');

// Database connection error message
$connectionMessage = "";

// Check if there is any connection error and display the error message
if ($conn->connect_error) {
    $connectionMessage = "Connection failed: " . $conn->connect_error;
}

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
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            width: 500px;
            background-color: #f9f9f9;
        }

        h1 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            color: #721c24;
        }
    </style>
</head>
<body>
    <!-- Display error message if there's a connection issue -->
    <?php if ($connectionMessage): ?>
        <div class="message">
            <p><?php echo $connectionMessage; ?></p>
        </div>
    <?php endif; ?>

    <div class="container">
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
    </div>
</body>
</html>

<?php $conn->close(); ?>
