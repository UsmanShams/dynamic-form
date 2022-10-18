<?php

$id = $_POST["id"];
$title = $_POST["products_title"];
$des = $_POST["productsdesc"];
$category = $_POST["category"];
$date = date("d-m-y");
session_start();
$author =  $_SESSION["user_id"];
$name = $_FILES["fileToUpload"]["name"];

include "config.php";
$query = "UPDATE `post` SET `title`='{$title}',`description`='{$des}',`category`='{$category}',`post_date`='{$date}',`author`='{$author}',`post_img`='{$name}' WHERE `post_id`='{$id}'";
mysqli_query($conn,$query);
header("location:http://localhost:82/usman/dynamic-form/admin/products.php");

?>