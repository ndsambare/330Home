<?php
require 'database.php';
session_start(); 
$_SESSION = username;

if (isset($_POST['submit']) && !empty($_SESSION['username'])) {
    $heading = $_POST['postHeading'];
    $link = $_POST['postLink'];
    $commentary = $_POST['postCommentary'];
    $time = time(); 

    $stmt = $mysqli->prepare("insert into posts (username, heading, link, commentary) values (?, ?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ssssi', $_SESSION['username'], $heading, $link, $commentary, $time);

$stmt->execute();

$stmt->close();

header('Location: homePage.php');
exit;
}

?>