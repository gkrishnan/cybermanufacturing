<?php
error_reporting(E_ALL);
define('HOST_STUNNEL', '127.0.0.1');    // Secure connection, slower performance
                                        // All data is encrypted
                                        // Use '127.0.0.1' and not 'localhost'
 
define('DB_HOST', '127.0.0.1');         // Choose HOST_DIRECT or HOST_STUNNEL, depending on your application's requirements
 
define('DB_USER', 'root');    // MySQL account username
define('DB_PASS', 'root');    // MySQL account password
define('DB_NAME', 'cyberman');     // Name of database

  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Some error occurred during connection " . mysqli_error($con));  
 
      // $qu = "INSERT INTO images (id, name, path) VALUES (NULL," . $uploadfile.", uploads/".$uploadfile.")");

  $query = "select id from cyberman.images";
  $result = mysqli_query($con, $query);
  // print $result;
  $arr = array();
  while($id = mysqli_fetch_array($result)){
  	print($id[0]);
  	print("\n");
  	array_push($arr,$id[0]);
  }
  print_r($arr);
  print(array_rand($arr));
for($i=0;$i<20;$i++){
	$q = "insert into cyberman.jobs(userid,imageid,price,printerid) VALUES(".rand(1,1000).",".$arr[array_rand($arr,1)].",".rand(986,1450).",2)";
	$r = mysqli_query($con, $q);
	$a = "insert into cyberman.jobs(userid,imageid,price,printerid) VALUES(".rand(1,1000).",".$arr[array_rand($arr,1)].",".rand(373,598).",3)";
	$r = mysqli_query($con, $a);
	$b = "insert into cyberman.jobs(userid,imageid,price,printerid) VALUES(".rand(1,1000).",".$arr[array_rand($arr,1)].",".rand(3113,3645).",4)";
	$r = mysqli_query($con, $b);
	$c = "insert into cyberman.jobs(userid,imageid,price,printerid) VALUES(".rand(1,1000).",".$arr[array_rand($arr,1)].",".rand(1988,2456).",5)";
	$r = mysqli_query($con, $c);
}
mysqli_close($con);

?>