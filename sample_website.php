<?php
$servername = "localhost";
$username = "sample_user";
$password = "{{ sample_user_password }}"; // You need to replace this with your actual password
$dbname = "students_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table students created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert sample data
$sql = "INSERT INTO students (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com'),
       ('Jane', 'Doe', 'jane@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "Sample data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>

