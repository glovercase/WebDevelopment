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
    $checkStatusCode = mysql_query("SELECT statuscode from posts where statuscode = '$statuscode'");
    if(!$checkStatusCode){
      die('Query failed to execute');
    }
    if(mysql_num_rows($checkStatusCode) > 0){
      echo "<p>Status Code already exists!</p>";
    }

  if (is_null($statuscode)){
      echo "<p>Please enter a Status Code!</P>";
  }else{
    if(strlen($statuscode) < 5){
      echo "<p>Status code entered is too short</p>";
    }else if(strlen($statuscode) > 5){
      echo "<p>Status code entered is too long</p>";
    }else{
      $splitStatusCode = str_split($statuscode, 1);
      if(!strcasecmp($splitStatusCode[0], 'S')){
        echo "<p>Status code needs to start with S";
      }else {
        if(!is_numeric($splitStatusCode[1])){
          echo "<p>Status code needs for numebers after S";
        }else{

        }
      }
    }


  }


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
