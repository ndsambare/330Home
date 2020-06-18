<!DOCTYPE html>
<html>
<head>
<title>FileSharing</title>
<link href="login.css" type="text/css" rel="stylesheet" />
</head>
<body>
<form class = "loginForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
	<p>
		<label for="name">Username:</label>
		<input type="text" name="nameOfUser" id="nameOfUser" />
	</p>
	<p>
		<input type="submit" value="Enter username here to log on!" />
	</p>
</form>

<?php

if(isset($_POST["submit"])){
    $user = (string)$_POST["nameOfUser"];
    $fileName = fopen("../../../userContainer/users.txt", "r");
    $containsUser = false; 

while(!feof($fileName)){

$username = trim(fgets($fileName));
if ($username == $user) {
    $containsUser = true; 
    session_start(); 
    @$_SESSION['username'] = $username;
    header('Location: loginSuccessful.php');
    exit;
  } 
}
if (!$containsUser) {
     print("This user does not exist.");
   }
}

fclose($h);
?>

</body>
</html>
