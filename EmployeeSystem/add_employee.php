<?php

include('connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $department = $conn->real_escape_string($_POST['department']);
    $salary = $_POST['salary']; 


    $sql = "INSERT INTO employee (first_name, last_name, department, salary) 
            VALUES ('$first_name', '$last_name', '$department', '$salary')";


    if ($conn->query($sql) === TRUE) {
        
        header("Location: index.php");
        exit; 
    } else {
     
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

    <style>
       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            display: flex;
            justify-content: center;    
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

  
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

    
        h1 {
            text-align: center;
            color: #333;
        }

        
        .connected-message {
            background-color: #4CAF50; 
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Input Fields */
        label {
            font-size: 1rem;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50; 
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049; 
        }


        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff; 
            text-decoration: none;
        }

        a:hover {
            color: #0056b3; 
        }
    </style>
</head>
<body>

    <!-- Display message if database is connected -->
    <div class="connected-message">
        Connected to Database
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <h1>Add New Employee</h1>

        <!-- Form to add a new employee -->
        <form action="add_employee.php" method="POST">
            <label for="first_name">First Name: </label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name: </label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="department">Department: </label>
            <input type="text" id="department" name="department" required>

            <label for="salary">Salary: </label>
            <input type="number" id="salary" name="salary" required>

            <button type="submit">Add Employee</button>
        </form>

        <a href="index.php">Back to Employee List</a>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
