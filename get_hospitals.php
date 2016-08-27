<?php
	$city = $_GET['city'];  //Entered city name
	$servername = "localhost";
	$username = "root";
	$password = "s";
	$dbname = "HospitalManagement";  //DataBase name
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// DB Coneection established
	if ($city){  // Check if city name entered
		// Query to fetch the hospitals details for the city
		$sql = "SELECT H.NAME as hospital_name, D.NAME as doctor_name, H.city as city FROM Hospitals H INNER JOIN Doctors D ON H.ID = D.HOSPITAL_ID WHERE H.CITY='$city'";
	}
	else {
		// Query to fetch hospitals name
		$sql = "SELECT distinct NAME as hospital_name, city FROM Hospitals";	
	}
	$result = $conn->query($sql);  // Execute sql query
	if ($result->num_rows > 0) {  // Check for the number of rows
		// Create table structure and add the rows data to it
		echo "<table border='1'>";
		echo "<tr><th>Hospital Name</th>";
		if ($city) {
			echo "<th>Doctor Name</th>";
		}
		echo "<th>City</th></tr>";

		while($row = $result->fetch_assoc()) {
			echo "<tr><td>";
			echo $row["hospital_name"];
			echo "</td>";
			if($row["doctor_name"]){
				echo "<td>";
				echo $row["doctor_name"];
				echo "</td>";
			}
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
// End of the php script
?>

