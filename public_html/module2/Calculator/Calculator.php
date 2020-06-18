<?php

$numOne = $_GET["num1"];
$numTwo = $_GET["num2"];
$operand = $_GET["oppy"];

if ($operand == "addition") {
    if (is_numeric($numOne) == 0|| is_numeric($numTwo) ==0) {
        print("Not a number.");
    } else {
$result = $numOne + $numTwo;
print("The answer is (drumrolllllll please...):");
printf("<p>%.2f</p>", htmlentities($result));
}
    }

if ($operand == "subtraction") {
    if (is_numeric($numOne) == 0|| is_numeric($numTwo) ==0) {
        print("Not a number. Come on bro.");
    }
    else {
  $result = $numOne - $numTwo;
  print("The answer is (drumrolllllll please...):");
printf("<p>%.2f</p>", htmlentities($result));
    }
    }
  

if ($operand == "multiplication") {
    if (is_numeric($numOne) == 0|| is_numeric($numTwo) ==0) {
        print("Not a number bro.");
    }
    else {
$result = $numOne * $numTwo;
print("The answer is (drumrolllllll please...):");
printf("<p>%.2f</p>", htmlentities($result));
    }
    
}
 if ($operand == "division") {
     if (is_numeric($numOne) == 0|| is_numeric($numTwo) ==0) {
        print("Not a number.");
    }
    else {
    if ($numTwo == 0) {
        print("Not a number.");
    }
    else {
        $result = $numOne/$numTwo;
        print("The answer is (drumrolllllll please...):");
        printf("<p>%.2f</p>", htmlentities($result));
    }
    }
}

?>
<style>
    p{
        margin-left: 20%; 
        margin-top: 20%; 
        font-size: 2.3em; 
        color: blue; 
        
    }
</style>
