<?php

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
	//echo "DB Coneection established";
	$sql = "select distinct name, city from Hospitals where id not in (select distinct hospital_id from Doctors)";
	//echo 'sq', $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//echo $result->num_rows, " Rows fetched <br />";
//		while($row = $result->fetch_assoc()) {
//		       echo $row["name"], " ", $row['city'], '<br />';
		echo "<table border='1'>";
		echo "<tr><th>Hospital Name</th>";
		echo "<th>City</th></tr>";

		while($row = $result->fetch_assoc()) {
			echo "<tr><td>";
			echo $row["name"];
			echo "</td>";
			echo "<td>";
			echo $row["city"];
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "<p>No hospitals found</p>";
	}
	exit;

?>

