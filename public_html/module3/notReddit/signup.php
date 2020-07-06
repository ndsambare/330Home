<?php
session_start();
require "database.php";

$username =  $_POST["username"];
$passwordInput = $_POST["password"];

$passwordSecret = password_hash($passwordInput, PASSWORD_DEFAULT);

$stmt = $mysqli->prepare("insert into users (username, password) values (?,?)");
if (!$stmt) {
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}

$stmt->bind_param('ss', $username, $passwordSH);
$stmt->execute();
$stmt->close();

header('Location: homePage.php');
exit;