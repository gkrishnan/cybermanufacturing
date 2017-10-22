<?php
define('HOST_STUNNEL', '127.0.0.1');    // Secure connection, slower performance
                                        // All data is encrypted
                                        // Use '127.0.0.1' and not 'localhost'
 
define('DB_HOST', '127.0.0.1');         // Choose HOST_DIRECT or HOST_STUNNEL, depending on your application's requirements
 
define('DB_USER', 'root');    // MySQL account username
define('DB_PASS', 'root');    // MySQL account password
define('DB_NAME', 'cyberman');     // Name of database
 
// Connect to the database
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
if(!$db) {
  // Handle error
  echo "<p>Unable to connect to database</p>";
}else{

}
?>