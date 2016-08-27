<?php
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
	// Query string to get the hospitals having no association with doctors
	$sql = "select distinct name, city from Hospitals where id not in (select distinct hospital_id from Doctors)";
	$result = $conn->query($sql);  // Execute the query
	if ($result->num_rows > 0) {  // Check if the result returned rows
		// Create table structure and add the rows data to it
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
// End of php script
?>

