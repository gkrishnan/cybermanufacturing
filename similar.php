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

// if("" == trim($_POST['imageid'])){
//   print("image id has value");
// }else{
//   print("empty image id");
// }
// if("" == trim($_POST['printerid'])){
//   print "printerid  has value";
// }else{
//   print "empty printerid ";
// }

  $imageid = $_POST['imageid'];
  // print("image id");
  // print($imageid);
  $printerid =  $_POST['printerid'];
  // print("printer id");
  // print($printerid);

  // print("select * from cyberman.jobs where imageid=".$imageid." and printerid=".$printerid);
  // echo("select * from cyberman.jobs where imageid=".$imageid." and printerid=".$printerid);
  $query = "select * from cyberman.jobs where imageid=".$imageid." and printerid=".$printerid.";";
  // print($query);
  $result = mysqli_query($con, $query);
  // print_r($result);

  $count = 0;
  $sum = 0;
  while($row = mysqli_fetch_array($result)) { 
        // echo $row['jobid']; 
        // echo $row['userid'];
        // echo $row['imageid'];
        // echo $row['price']; 
        //  echo $row['printerid']; 
    $count = $count + 1;
    $sum = $sum + floatval($row['price']); 
  }
  $value = 1;
  $value = $sum / $count;
  // print("\nValue: \t");
  print($value);
  // while($id = mysqli_fetch_array($result)){
  // 	print_r($id);
  //   print($id);
  // 	print("\n");
  // 	array_push($arr,$id[0]);
  // }
  mysqli_close($con);
  return $value;
?>