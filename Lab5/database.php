<?php
function getDatabaseConnection(){
    $host ="us-cdbr-iron-east-05.cleardb.net";
    $username ="bbf7de8df9454c";
    $password ="441ff6f0";
    $dbname ="heroku_6ed4258c62bdf7f";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
    
    
    ?>
