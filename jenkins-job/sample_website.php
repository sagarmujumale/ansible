<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 50%;
            margin: auto;
        }
        input[type=text], input[type=email], input[type=submit] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Welcome to our Sample Website</h1>

<form action="" method="post">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Submit">
</form>

<?php
// Database connection details
$servername = "server2.sagar.com"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL root username
$password = "root"; // Change this to your MySQL root password
$dbname = "students_db";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO students (firstname, lastname, email) VALUES (?, ?, ?)");

        // Bind parameters
        $stmt->bindParam(1, $_POST['firstname']);
        $stmt->bindParam(2, $_POST['lastname']);
        $stmt->bindParam(3, $_POST['email']);

        // Execute the statement
        $stmt->execute();

        echo "<p>Record inserted successfully!</p>";

        // Close statement
        $stmt = null;
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

</body>
</html>

