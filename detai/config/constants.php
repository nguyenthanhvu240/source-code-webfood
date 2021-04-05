
<?php
    //Start Session
    session_start();

    //Create constants to store non repeating values 
    define('SITEURL','http://localhost:8080/webfood/detai/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');
    //define('DB_TABLE','tbl_admin')

    $conn = mysqli_connect('localhost','root','') or die(mysqli_error());//Database Connection
    $db_select = mysqli_select_db($conn,'food-order') or die(mysqli_error());//selecting databse    
?>