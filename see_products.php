<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
    <?php
    $id = $_GET["id"];
    include "config.php";
    $query = "SELECT * FROM `post` WHERE `post_id` = '{$id}'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        while($rows = mysqli_fetch_assoc($result)){

    ?>

<h2 style="text-align:center">Product Card</h2>

<div class="card">

  <img src="./admin/upload/<?php echo $rows["post_img"]; ?>" alt="Denim Jeans" style="width:100%">
  <h1><?php echo $rows["title"]; ?></h1>
  <p class="price">$19.99</p>
  <p><?php echo $rows["description"] ?></p>
  <p><button>Add to Cart</button></p>
<?php } } ?>
</div>
</body>
</html>
