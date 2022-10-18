<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Products</h1>
             </div>
             <?php

             $id = $_GET["id"];
             include "config.php";
             $query = "SELECT * FROM `post` WHERE `post_id`='{$id}'";
             $result = mysqli_query($conn,$query);
             if(mysqli_num_rows($result)>0){


             ?>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="product_update.php" method="POST" >
                  <?php
                  while($rows = mysqli_fetch_assoc($result)){

                  
                  ?>
                      <div class="form-group">
                          <label for="products_title">Title</label>
                          <input type="hidden" name="id" class="form-control" autocomplete="off" value="<?php echo $rows["post_id"]; ?>">
                          <input type="text" name="products_title" class="form-control" autocomplete="off" value="<?php echo $rows["title"]; ?>">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <input name="productsdesc" class="form-control" rows="5"  value="<?php echo $rows["description"]; ?>"></input>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="<?php echo $rows["category"]; ?>" disabled> Select Category</option>
                              <?php
                              
                              include "config.php";
                              $query = "SELECT * FROM `category` ";
                              $result = mysqli_query($conn,$query);

                              if(mysqli_num_rows($result)>0){
                                  while($rows = mysqli_fetch_assoc($result)){
                                      echo "<option value='{$rows["category_id"]}'>{$rows["category_name"]}</option>";
                                  }
                              }

                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Product image</label>
                          <input type="file" name="fileToUpload" value="<?php echo $rows["post_img"]; ?>">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                    </form>
                            <?php } ?>
                    <!--/Form -->
                    <?php } ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
