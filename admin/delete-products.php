<?php

$id = $_GET["id"];

include "config.php";
$query = "DELETE FROM `post` WHERE `post_id`='{$id}'";
mysqli_query($conn,$query);
header("location:http://localhost:82/usman/dynamic-form/admin/products.php");
?>