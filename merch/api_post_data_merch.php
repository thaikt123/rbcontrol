
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
$sql = "INSERT INTO merchdataup (url_png, price, product_type, color, brand, title, bullet1, bullet2, description, is_men, is_women, is_youth, is_Upload, tag, root_asin, acc_merch_id,user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
$stmt->bind_param('sssssssssssssssss',$data['url_image'],$data['price'],$data['productype'],$data['color'],$data['brandname'],$data['title'],$data['key_1'],$data['key_2'],$data['description'],$data['is_men'],$data['is_women'],$data['is_youth'],$data['is_Upload'],$data['tag'],$data['root_asin'],$data['acc_merch_id'],$data['user']);


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