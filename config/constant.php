<?php 

    session_start();
    define('HOMEURL','http://localhost/order-food/');
    define('LOCALHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBNAME', 'food-order');
    
    $conn = mysqli_connect(LOCALHOST,DBUSER,DBPASS) or die('failed');
    $db_select = mysqli_select_db($conn,DBNAME) or die('failed');
    
?>