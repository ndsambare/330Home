<?php
require 'database.php';

$stmt = $mysqli->prepare("select id, username, comment, posts_id from comments");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($id, $username, $comment, $posts_id);

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars($id),
        htmlspecialchars($username),
        htmlspecialchars($comment),
		htmlspecialchars($posts_id)
	);
}
echo "</ul>\n";

$stmt->close();


 ?>