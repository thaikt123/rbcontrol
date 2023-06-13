

<?php
	// Make a request to update Upload Status of Data 
	// Every make a upload Done to Merch By Amazon	


	// Retrieve the POST data
	$data = $_POST;

	// Connect to your database
	$mysqli = new mysqli('localhost', 'root', '', 'gadatacontrol');

	// Check the database connection
	if ($mysqli->connect_error) {
	    die("Failed to connect to MySQL: " . $mysqli->connect_error);
	}

	$sql = "UPDATE merchdataup SET is_Upload=? where root_asin=?";

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
	$stmt->bind_param('ss',$data['is_upload'],$data['asin']);


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

