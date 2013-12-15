<html>
<head>
<Title>Registration Form</Title>
<style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>
<h1>Login here!</h1>
<a href="main_login.php">
   <input type="button" value="Login Page" />
</a>
<h3> Register!</h3>
<p>Fill in your name, email address and password then click <strong>Submit</strong> to register.</p>
<form method="post" action="index.php" enctype="multipart/form-data" >
      Name  <input type="text" name="name" id="name"/></br>
      Email <input type="text" name="email" id="email"/></br>
      Password <input type="password" name="password" id="password"/></br>
      <input type="submit" name="submit" value="Submit" />
</form>
<?php
// DB connection info
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

if(!empty($_POST['name'] && !empty($_POST['email']) && !empty($_POST['password'])) {
try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date("Y-m-d");
    // Insert data
    $sql_insert = "INSERT INTO signup_tbl (name, email, password, date) 
                   VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $email);
    $stmt->bindValue(3, $password);
    $stmt->bindValue(4, $date);
    $stmt->execute();
}
catch(Exception $e) {
    die(var_dump($e));
}
echo "<h3>Your're registered!</h3>";
}/*
$sql_select = "SELECT * FROM signup_tbl";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {
    echo "<h2>People who are registered:</h2>";
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Email</th>";
	echo "<th>Password</th>";
    echo "<th>Date</th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['name']."</td>";
        echo "<td>".$registrant['email']."</td>";
		echo "<td>".$registrant['password']."</td>";
        echo "<td>".$registrant['date']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}
*/
?>
</body>
</html>
