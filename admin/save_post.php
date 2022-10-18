<?php

if(isset($_FILES["fileToUpload"]))
{

    $error = array();

    $name = $_FILES["fileToUpload"]["name"];
    $size = $_FILES["fileToUpload"]["size"];
    $type = $_FILES["fileToUpload"]["type"];
    $temp = $_FILES["fileToUpload"]["tmp"];
    $file_ext = explode(".",$name);
    $file_ext = end($file_ext);
    $file_ext = strtolower($file_ext);
    $extension = array("jpg","jpeg","png");

    if(in_array($file_ext,$extension) === false)
    {
        $error = "file must be in jpg , jpeg or png";
    }
    if($size > 2097152){
        $error = "file must be less then 2 mb";
    }
    if(empty($error)===true){
        move_uploaded_file($temp,"upload/".$name);
    }
    else{
        print_r($error);
        die();
    }


}


$title = $_POST["products_title"];
$des = $_POST["productsdesc"];
$category = $_POST["category"];
$date = date("d-m-y");
session_start();
$author =  $_SESSION["user_id"];

include "config.php";
 $query =  "INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('{$title}','{$des}',{$category},'{$date}','{$author}','{$name}');";
$query .= "UPDATE category set post= post + 1 where category_id = '{$category}';";

mysqli_multi_query($conn,$query);
header("location:http://localhost:82/usman/dynamic-form/admin/products.php")

?>