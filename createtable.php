<?php
// DB connection info
$host = "tcp:r9n40cwt90.database.windows.net,1433";
$user = "jasperco@r9n40cwt90";
$pwd = "Lisanna15!";
$db = "jasperjA3q9lHuLk";
try{
    $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = "CREATE TABLE registration_tbl(
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    name VARCHAR(30),
    email VARCHAR(30),
    password VARCHAR(30),
    date DATE)";
    $conn->query($sql);
}
catch(Exception $e){
    die(print_r($e));
}
echo "<h3>Table created.</h3>";
?>
