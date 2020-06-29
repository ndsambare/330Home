
<?php
require 'database.php';

$identification = $_GET["id"];
echo $identification;


$stmt = $mysqli->prepare("select id, heading, link, username, time from posts where id=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('d', $identification);

$stmt->execute();

$stmt->bind_result($id, $heading, $link, $username, $time);

echo "<h3>\n";
while($stmt->fetch()){
	printf("\t<h3> %s \n %s \n %s \n This post was posted by %s \n at %u </h3>\n",
        htmlspecialchars($id),
        htmlspecialchars($heading),
        htmlspecialchars($link), 
        htmlspecialchars($username),
        htmlspecialchars($time)
	);
}
echo "</h3>\n";


$stmt->close();

?>