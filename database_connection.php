<?php
session_start();
// used to connect to the database
$host = "localhost";
$db_name = "letsconnect";
$username = "root";
$password = "";
 
try {
    $DB_con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    //$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
include_once 'class.user.php';
$user = new USER($DB_con);

?>