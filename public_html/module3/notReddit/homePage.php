<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notReddit</title>
</head>
<body>
    <div class = headerBar>
        <h3> Welcome to notReddit: a place to not be on Reddit!</h3>
    </div>
<?php
require 'database.php';

$stmt = $mysqli->prepare("select heading, link, username from posts");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($heading, $link, $username);

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars($heading),
        htmlspecialchars($link), 
        htmlspecialchars($username)
	);
}
echo "</ul>\n";

$stmt->close();
?>
    
</body>
</html>