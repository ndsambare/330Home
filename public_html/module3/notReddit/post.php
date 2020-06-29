
<?php
require 'database.php';

$identification = $_GET["id"];
echo $identification;


$stmt = $mysqli->prepare("select id, heading, link, username, time from posts where id = ? ");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('d', $identification);

$stmt->execute();

$stmt->bind_result($id, $heading, $link, $username, $time);

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<h3 %s \n %s \n %s </h3>\n",
        htmlspecialchars($id),
        htmlspecialchars($heading),
        htmlspecialchars($link), 
        htmlspecialchars($username),
        htmlspecialchars($time)
	);
}
echo "</ul>\n";


$stmt->close();

?>