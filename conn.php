<?php
class Database {
    function insert() {
        $dbhost = 'localhost:3306';
        $conn = mysql_connect($dbhost, 'root', 'root');
        if (! $conn) {
            die('Could not connect: ' . mysql_error());
        }
        else {
            echo "connected";
        }
    }   
}
?>
