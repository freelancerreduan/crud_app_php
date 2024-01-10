<?php
include_once("function.php");
$obj = new newApp();

  // this code for Edit (User Info show Edit.php) Page 
  if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id =$_GET['id'];
        $returnData = $obj->display_user_upadate($id);
    }
  }

  // this code for (Old Data UPDATED) in database
  if(isset($_POST['updated_info'])){
    $msg = $obj ->info_updated($_POST);
  }






?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edite Data</title>
  </head>
  <body>
    



<div class="container shadow  my-5 bg-body rounded">
  <h2 class="text-danger">From For Student </h2>
  <form action=" "  method="post" enctype="multipart/form-data">
    <!-- <?php if(isset($msg)){ echo $msg; }  ?> -->
    <label for="name" class="form-label">Enter Name: </label>
    <input type="text" class="form-control" name="uname"  value="<?php echo $returnData['name']; ?>">
  
    <label for="number" class="form-label"> Number</label>
    <input type="number"  class="form-control" name="uroll" value="<?php echo $returnData['roll']; ?>">
  
    <label for="email" class="form-label">Email </label>
    <input type="email"  class="form-control" name="uemail" value="<?php echo $returnData['email']; ?>">
  
    <label class="form-check-label">Please Enter Img </label>
    <input type="file"  class="form-control"  name="up_img">
    <img src="upload/<?php echo $returnData['img']; ?>" alt="" class="img-fluid mt-3" style="width: 30%;height: 150px;">
    
    <input type="hidden" value=" <?php echo $returnData['id']; ?>" name="idno">
    <button type="submit" class=" btn-warning form-control my-3" name="updated_info">Update Information </button>
  </form>
</div>






































    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>