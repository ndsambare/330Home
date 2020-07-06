<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>


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


<div class = post_addcomment>

   <form action="addcomment.php" method = "post">
        <textarea name="commentText" placeholder="Make your comment!"></textarea>
         <input type="submit" value "comment">
   </form>

</div>


<div class = "comment_section">

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




</div>
        
</body>
</html>