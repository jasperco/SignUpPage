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

// username and password sent from form 
$email=$_POST['email']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$password = stripslashes($password);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $registration_tbl WHERE email='$email' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("email");
session_register("password"); 
header("location:login_success.php");
}
else {
echo "Wrong Email or Password";
}
?>
