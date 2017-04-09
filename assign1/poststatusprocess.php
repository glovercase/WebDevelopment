<html>
<head>
<title>Posting Status</title>
</head>
<body>


<?php
	// sql info or use include 'file.inc'
       require_once('../../conf/settings.php');

	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($sql_host,
		$sql_user,
		$sql_pass,
		$sql_db
	);

	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		// Upon successful connection

		// Get data from the form
		$statuscode    = $_POST["statuscode"];
    $status	       = $_POST["status"];
		$share	       = $_POST["share"];




		// Set up the SQL command to add the data into the table
		$query = "insert into $sql_tble"
						."(id, make, model, price)"
					. "values"
						."('$id1','$make','$model', $price)";
echo $query;
		// executes the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
			// display an operation successful message
			echo "<p>Success</p>";
		} // if successful query operation

		// close the database connection
		mysqli_close($conn);
	}  // if successful database connection
?>
</body>
</html>
