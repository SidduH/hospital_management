<?php
//"select distinct id from Hospitals where id not in (select distinct hospital_id from Doctors);"

	//echo "This will be returned", $_GET["city"];
	$city = $_GET['city'];
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
	//	echo "DB Coneection established";
	
	if ($city){
		$sql = "SELECT H.NAME as hname, D.NAME as dname, H.city as city FROM Hospitals H INNER JOIN Doctors D ON H.ID = D.HOSPITAL_ID WHERE H.CITY='$city'";
	}
	else {
		$sql = "SELECT distinct NAME as hname, city FROM Hospitals";
//"SELECT distinct H.NAME as hname, D.NAME as dname, H.city as city FROM Hospitals H INNER JOIN Doctors D ON H.ID = D.HOSPITAL_ID"	
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//echo $result->num_rows, " Rows fetched <br />";
		while($row = $result->fetch_assoc()) {
		       echo $row["hname"], " ", $row['dname'], " ", $row['city'], '<br />';
		}
	}
	else {
		echo "No hospitals found";
	}
	exit;
?>

