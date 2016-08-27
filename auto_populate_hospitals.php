<?php
	$search_string = $_GET['search_string'];  // Entered search string
	$servername = "localhost";
	$username = "root";
	$password = "s";
	$dbname = "HospitalManagement";  // DataBase name
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// DB Coneection established
	// Query based on the search string
	$sql = "select distinct name from Hospitals where name LIKE '$search_string%'";
	$result = $conn->query($sql);  // Execute the query
	$hospital_names = array();  // Create an array of hospitals
	if ($result->num_rows > 0) {  // Check the number of rows
		while($row = $result->fetch_assoc()) {
			$hospital_names[] = $row["name"];
		}
	}
	echo json_encode($hospital_names);  // Return the array as JSON object
	exit;
// End of script
?>

