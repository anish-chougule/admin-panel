<?php

// SQL Database Credentials 
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "test";
$TABLE = "inventory";

$cols = array("ID","SKU","TSI","VENDOR","BRAND","SHIPPING_TEMPLATE","TEMPLATE_CODE","INSTOCK_LEADTIME","NOSTOCK_LEADTIME","QUANTITY","OBSOLETE","IS_UPDATED");

try{
    // Establishing connection
    $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);

    //echo("Connected to the Database Succesfully!");
    
}
catch(Exception $e){
    // Check connection
    echo "<script type=\"text/javascript\">
    alert(\"Connection with the database failed. Check connection.php \");
    window.location = \"index.php\"
    </script>";
    
}