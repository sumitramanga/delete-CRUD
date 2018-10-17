<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CRUD - Delete</title>
</head>
<body>
	<h1>CRUD - Delete</h1>
	<?php
		// Define whcih server using. define database name
		$dsn = "mysql:dbname=yoobee_library";

		// give useranme and password
		$username = $username;
		$password= $pw;

		try {
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connection Successful!";
		} catch (PDOException $e){
			echo "Connection failed:" . $e->getMessage();
		}

		// $sql = "SELECT * FROM students";
		// $sql = "INSERT INTO students (stud_id, stud_name, class_code) VALUES (1048, 'Kajol', '18wdwu02')";


		// To delete

		// define what row will be deleted
		$id="1234";

		// Write the sql query in the $sql variable
		$sql = "delete from students where stud_id=:id";

		echo "<ul>";
		try {
			// using a function which is already created inside the $conn
			// $rows = $conn->query($sql);

			// For when deleting a row of data
			$st = $conn-> prepare($sql);
 			$st -> bindValue(":id", "$id", PDO:: PARAM_INT);
			$st->execute();

			// Showing in the DOM
			foreach($rows as $row) {
				echo "<li>" . $row["stud_id"] . " " . $row["stud_name"] . "</li>";
			}
		} catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
		}
		echo "</ul>";

		// connection is closed to database for security reasons
		$conn = null;


		// Terminal stuff
		// drop table tableName; = deleting the table
		// select * from tableName; = shows table and what it contains
		// show tables = shows a list of tables on the database

		// delete form tableName where field = value;


 	?>
</body>
</html>
