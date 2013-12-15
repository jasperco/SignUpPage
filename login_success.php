<?php
session_start();
if(!session_is_registered(email)){
header("location:main_login.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>
