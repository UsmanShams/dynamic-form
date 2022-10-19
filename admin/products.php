
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Products</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-products.php">add Products</a>
              </div>
              <?php
              include "config.php";
              $query = "SELECT * FROM `post`
              LEFT JOIN category ON post.category = category.category_id
              LEFT JOIN user ON post.author = user.username
              ORDER BY post_id DESC;
              ";
              $result = mysqli_query($conn,$query);
              if(mysqli_num_rows($result)){

              
              ?>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <?php
                      while($rows = mysqli_fetch_assoc($result)){

                      
                      ?>
                      <tbody>
                          <tr>
                              <td class='id'><?php echo $rows["post_id"] ?></td>
                              <td><?php echo $rows["title"] ?></td>
                              <td><?php echo $rows["category_name"] ?></td>
                              <td><?php echo $rows["description"] ?></td>
                              <td><?php echo $rows["post_date"] ?></td>
                              <td><?php echo $rows["username"] ?></td>
                              <td class='edit'><a href='update-products.php?id=<?php echo $rows["post_id"] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-products.php?id=<?php echo $rows["post_id"] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                      <?php } ?>
                      </tbody>
                  </table>
              <?php  } ?>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
