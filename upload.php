<?php
foreach ($_GET as $key => $value) {
  print($key);print(":");print($value);
}
error_reporting(E_ALL);
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
define('HOST_STUNNEL', '127.0.0.1');    // Secure connection, slower performance
                                        // All data is encrypted
                                        // Use '127.0.0.1' and not 'localhost'
 
define('DB_HOST', '127.0.0.1');         // Choose HOST_DIRECT or HOST_STUNNEL, depending on your application's requirements
 
define('DB_USER', 'root');    // MySQL account username
define('DB_PASS', 'root');    // MySQL account password
define('DB_NAME', 'cyberman');     // Name of database
 

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
  // echo "File is valid, and was successfully uploaded.\n";
	// header("Location: http://localhost:8888/boot.html?loaded=1",true,301);
	// exit;
	// Connect to the database
	// $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Some error occurred during connection " . mysqli_error($con));  
 
  		// $qu = "INSERT INTO images (id, name, path) VALUES (NULL," . $uploadfile.", uploads/".$uploadfile.")");

	$query = "INSERT INTO cyberman.images(id, name, path) VALUES(NULL,'".$uploadfile."','uploads/".$uploadfile."')";
	
	$result = mysqli_query($con, $query);

     // mysql_real_escape_string($uploadfile),
     // mysql_real_escape_string($uploadfile));

		// Check result
		// This shows the actual query sent to MySQL, and the error. Useful for debugging.
		if (!$result) {
    		$message  = 'Invalid query: ' . mysql_error() . "\n";
    		$message .= 'Whole query: ' . $query;
    		echo($message . "before die");
    		die($message);
		}

  	$array = array();
  	$priceval = array();
  	echo 'Before calcuqeyr';
  	$calcquery = "SELECT * from cyberman.images;";
  	$resultcalc = mysqli_query($con, $calcquery);
  	while($row = mysqli_fetch_array($resultcalc)) {
  		// 3 * (int)$row['geometry'] +	23 * (int)$row['material'] + 218 * (int)$row['volume']+316 * (int)$row['time'];
  		$dotprod = 3 * $row['geometry'] +	23 * $row['material'] + 218 * $row['volume']+316 * $row['time'];
  		$denom = (3*3 + 23*23 + 218*218 + 316*316)^0.5 * ($row['geometry']*$row['geometry'] + $row['material']*$row['material'] + $row['volume']*$row['volume'] + $row['time']*$row['time'])^0.5;
  		// $denom = number_format($denom,2);
  		
  		$finalval = $dotprod/$denom;
		// $finalval = number_format($finalval,2);
		echo "finalval";
    echo($finalval);
  		array_push($array,$finalval);
  		array_push($priceval,$row['price']);
  	}

  	print_r($array);
  	echo("Tracking");

} else {
   echo "Upload Failed";
	// header("Location: http://localhost:8888/boot.html?loaded=0",true,301);
// exit;
}

echo "</p>";
echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);
var_dump($_FILES);
var_dump($_POST);
print "</pre>";
mysqli_close($con);

?> 
