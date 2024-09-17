<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
	<link rel="stylesheet" href="/home/student/Desktop/PROJECT/css/style.css" />
	<title>Register</title>
	<style>
		body {
			background-image: url("background.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-color: #000;
			color: #fff;
		}
	</style>
</head>

<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$dbpassword = "";
	$dbname = "WEBTECH";

	// Create a new connection
	$conn = new mysqli($servername, $username, $dbpassword, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$name = $_POST['user'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$insertQuery = "INSERT INTO Register (NAME, EMAIL, PASSWORD, GENDER, PHONE) VALUES (?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($insertQuery);
		$stmt->bind_param("sssss", $name, $email, $pwd, $gender, $phone);

		if ($stmt->execute()) {
			echo "<h2>YOUR DETAILS</h2>";
		} else {
			echo "Error: " . $stmt->error;
		}
		$stmt->close();
	}

	// Fetch and display data in a table
	$fetchQuery = "SELECT * FROM Register";
	$result = $conn->query($fetchQuery);

	if ($result->num_rows > 0) {
		echo "<table border='1'>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>GENDER</th>
                    <th>PHONE</th>
                </tr>";

		while ($row = $result->fetch_assoc()) {
			echo "<tr>
			        <td>" . $row['NAME'] . "</td>
			        <td>" . $row['EMAIL'] . "</td>
			        <td>" . $row['GENDER'] . "</td>
			        <td>" . $row['PHONE'] . "</td>
			    </tr>";
		}

		echo "</table>";
	} else {
		echo "No records found.";
	}

	$conn->close(); // Close the connection
	?>
	<button><a href="home.html">GO TO HOME</a></button>
</body>

</html>

