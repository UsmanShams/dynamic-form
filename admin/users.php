<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <?php
              
              include "config.php";
              $query = "SELECT * FROM `user`";
              $result = mysqli_query($conn,$query);

              if(mysqli_num_rows($result)){

              
              
              ?>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>Last Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php 
                      
                      while($rows = mysqli_fetch_assoc($result)){
                      
                      ?>

                      
                          <tr>
                              <td class='id'><?php echo $rows["user_id"]; ?></td>
                              <td><?php echo $rows["first_name"]; ?></td>
                              <td><?php echo $rows["last_name"]; ?></td>
                              <td><?php echo $rows["username"]; ?></td>
                              <td>
                              <?php

                               if( $rows["role"]==1){
                                echo "Admin";
                               }
                               else{
                                echo "Normal";
                               }
                               ; 

                               ?>
                               </td>
                              <td class='edit'><a href='edit.php?id=<?php echo $rows["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete.php?id=<?php echo $rows["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        
                      </tbody>

                      <?php } ?>
                  </table>
              <?php } ?>
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
