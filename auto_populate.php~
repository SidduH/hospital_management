<?php
	$search_string = $_GET['search_string'];
	$servername = "localhost";
	$username = "root";
	$password = "s";
	$dbname = "HospitalManagement";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//echo "DB Coneection established", $search_string;

	$sql = "select distinct name from Hospitals where name LIKE '$search_string%'";
	//echo 'sq ', $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$hospital_names = array();		
		//echo $result->num_rows, " Rows fetched <br />";
		while($row = $result->fetch_assoc()) {
		      //echo $row["name"], " ", $row['city'], '<br />';
			$hospital_names[] = $row["name"];
		}
	}
	else {
		echo "No hospitals found";
	}
//	echo var_dump($hospital_names);
	echo json_encode($hospital_names);
	exit;

?>

