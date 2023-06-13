<?php

// Retrieve the POST data
$data = $_POST;



// Connect to your database
$mysqli = new mysqli('localhost', 'root', '', 'gadatacontrol');

// Check the database connection
if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// EDIT ADD/REMOVE VARIABLE: 
// STEP1: VARIABLE IN SQL
// STEP2: ,?
$sql = "INSERT INTO accmerch (acc_merch_id, user, alias, tier, alive_status) VALUES (?, ?, ?, ?, ?)";

// Prepare and execute the SQL query to insert data
// Replace 'table_name' with the actual name of your database table
$stmt = $mysqli->prepare($sql);

// Bind the input data to the prepared statement
// 'sssss' => this param is the number of field, 5 's' <=> 5 field
// 6 's' ===> must be edit to 'ssssss'
//.............
//.............
// STEP3: 's'
// STEP4: VARIABLE IN $stmt ['variable']
$stmt->bind_param('sssss',$data['url_image'],$data['price'],$data['productype'],$data['color'],$data['brandname']);


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