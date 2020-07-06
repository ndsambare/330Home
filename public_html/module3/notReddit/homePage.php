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

 

    </div>
<?php
require 'database.php';

session_start(); 
$_SESSION['username'] = "basic_bitch101";
?>

       <div class="page">
        <?php echo empty($_SESSION['status']) ? null : $_SESSION['status'] ?>
        <div class="page__header">
            <div class="page__title">notReddit Posts</div>
            <?php if (!empty($_SESSION['username'])) { ?>
                <form class="form" action="addpost.php">
                    <button class="button">Submit a Post</button>
                </form>
            <?php } ?>
        </div>
       
<?php
$stmt = $mysqli->prepare("select id, heading, link, username, time from posts");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($id, $heading, $link, $username, $time);

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<a href='post.php?id=%u'>%s was posted by %s at the time %u</a>\n",
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
    
</body>
</html>