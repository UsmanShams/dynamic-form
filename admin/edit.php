<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<?php



    $id = $_GET["id"];
    include "config.php";
    $query = "SELECT * FROM `user` WHERE `user_id`='{$id}'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)){






 



?>

<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Edit User</h1>
            </div>
          

    

            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                while($rows = mysqli_fetch_assoc($result)){
                    
                
                ?>
         
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="hidden" name="id" class="form-control" placeholder="First Name" value="<?php echo $rows["user_id"] ?>">
                        <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $rows["first_name"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name"  value="<?php echo $rows["last_name"] ?>">
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username"  value="<?php echo $rows["username"] ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"  value="<?php echo $rows["password"] ?>">
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role"  value="<?php echo $rows["role"] ?>">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                <?php } ?>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
    <?php } ?>
    <?php

if(isset($_POST["save"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $user = $_POST["user"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    
    include "config.php";
    $query1 = "SELECT * FROM `user` WHERE `username`='{$user}'";
    $result = mysqli_query($conn,$query1);
    
    if(mysqli_num_rows($result)>0){
        
        echo "username already exist";
        
    }
    else{
        $query = "UPDATE `user` SET `first_name`='{$fname}',`last_name`='{$lname}',`username`='{$user}',`role`='{$role}' WHERE `user_id`='{$id}'";
        mysqli_query($conn,$query);
        header("location:http://localhost:82/kstore/admin/users.php");
    }
    
}
    


   




?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>