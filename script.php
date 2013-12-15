<?php
$host = "tcp:r9n40cwt90.database.windows.net,1433";
$user = "jasperco@r9n40cwt90";
$pwd = "Lisanna15!";
$db = "jasperjA3q9lHuLk";
// Connect to database.
try {
    $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}
$sql_delete = "DELETE FROM signup_tbl";
$stmt = $conn->query($sql_delete);
?>