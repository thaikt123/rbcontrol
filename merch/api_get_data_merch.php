<?php
// Retrieve the condition value from the query parameters
// ['condition'] ==> param transfer from .py source
$acc_merch_id = $_GET['condition'];

// Connect to your database
// Replace 'db_host', 'db_user', 'db_password', and 'db_name' with your database credentials
$mysqli = new mysqli('localhost', 'root', '', 'gadatacontrol');

// Check the database connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Prepare the SQL query with a condition
// Replace 'table_name' with the actual name of your database table and 'condition_column' with the column name to match the condition
$query = "SELECT * FROM merchdataup WHERE acc_merch_id = ? and is_Upload=0";

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind the condition value to the statement
// 's' => number of variant condition
$stmt->bind_param('s', $acc_merch_id);

// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch data from the result set
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>