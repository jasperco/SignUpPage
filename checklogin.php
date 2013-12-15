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
$myemail=$_POST['myemail']; 
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
/*
$mymyemail = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myemail = mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);
*/
$sql = "SELECT * FROM signup_tbl WHERE email='$myemail' and password='$mypassword'";
$result = $conn->query($sql);
$result2 = $result->fetchAll();
$count = count($result2);
/*
echo $myemail;
echo $mypassword;
echo $count;
*/
//$count=mysql_num_rows($result);


// If result matched $username and $password, table row must be 1 row
if($count==1){

// Register $myemail, $mypassword and redirect to file "login_success.php"
echo "Login Successful!";
session_register("myemail");
session_register("mypassword"); 
header("location: login_success.php");
}
else {
echo "Wrong Email or Password";
}
?>
