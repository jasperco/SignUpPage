<?php

$host = "tcp:r9n40cwt90.database.windows.net,1433";
$user = "jasperco@r9n40cwt90";
$pwd = "Lisanna15!";
$db = "jasperjA3q9lHuLk";
// Connect to database.
mysql_connect("$host", "$user", "$pwd")or die("cannot connect"); 
mysql_select_db("$db")or die("cannot select DB");

// username and password sent from form 
$myemail=$_POST['myemail']; 
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$mymyemail = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myemail = mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM signup_tbl WHERE email='$myemail' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if($count==1){

// Register $myemail, $mypassword and redirect to file "login_success.php"
session_register("myemail");
session_register("mypassword"); 
header("location:login_success.php");
}
else {
echo "Wrong Email or Password";
}
?>
