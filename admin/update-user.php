<?php
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$user = $_POST["user"];
$password = $_POST["password"];
$role = $_POST["role"];

include "config.php";
$query = "UPDATE `user` SET `first_name`='{$fname}',`last_name`='{$lname}',`username`='{$user}',`role`='{$role}' WHERE `user_id`='{$id}'";
mysqli_query($conn,$query);
header("location:http://localhost:82/kstore/admin/users.php")

?>