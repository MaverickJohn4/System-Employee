<?php
include('connection.php');

// Fetch all employee records
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>

    <style>
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
            font-weight: bold;
        }

        a:hover {
            background-color: #45a049;
        }


        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #555;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

    
        .edit-link {
            color: #007bff; 
            text-decoration: none;
            font-weight: bold;
        }

        .edit-link:hover {
            color: #0056b3;  
        }

       
        .delete-link {
            color: #e74c3c;  
            text-decoration: none;
            font-weight: bold;
        }

        .delete-link:hover {
            color: #c0392b;  


        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            table {
                width: 100%;
                font-size: 0.9rem;
            }

            th, td {
                padding: 8px;
            }

            a {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Employee List</h1>
    <a href="add_employee.php">Add New Employee</a>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td>
                <a href="edit_employee.php?id=<?php echo $row['id']; ?>" class="edit-link">Edit</a> |
                <a href="delete_employee.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

<?php $conn->close(); ?>
