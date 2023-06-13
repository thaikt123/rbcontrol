
<?php

// Retrieve the POST data
$data = $_POST;

echo $data['user'];


// Connect to your database

$mysqli = new mysqli('localhost', 'root', '', 'gadatacontrol');

// Check the database connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Prepare and execute the SQL query to insert data
// Replace 'table_name' with the actual name of your database table
$stmt = $mysqli->prepare("INSERT INTO data (user,thumb_link,vercel_link,descript,niche_tag) VALUES (?,?,?,?,?)");


// Bind the input data to the prepared statement
// 'sssss' => this param is the number of field, 5 's' <=> 5 field
// 6 's' ===> must be edit to 'ssssss'
$stmt->bind_param('sssss',$data['user'], $data['field2'], $data['field3'], $data['field4'], $data['field5']);


// Execute the prepared statement
if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error inserting data: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();
?>