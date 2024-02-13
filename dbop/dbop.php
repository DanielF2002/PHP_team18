<?php
// This page is for performing raw SQL commands.
// THINK REALLY CAREFULLY BEFORE OPEN IT.

include 'db.php';
// Define an SQL query.
$sql = "";

// Execute the SQL query using the database connection
if ($conn->query($sql) === TRUE) {
    // If the query was successful, display a success message
    echo "DONE!";
} else {
    // If there was an error in the query, display an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>