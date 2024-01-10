<?php

// this code for (funtion page incluid && Object Created )
include_once("function.php");
$obj = new newApp();

// this code for (User Info or any Data Add ) in Database
if (isset($_POST['add_info'])) {
  $msg = $obj->add_data($_POST);
}

// This code for Display User Information
$stok_data = $obj->display_user_info();

// this code for (Deleted) Usr Data In Database
if(isset($_GET['status'])){
  if($_GET['status']='delet'){
    $id = $_GET['id'];
    $delete_msg = $obj-> delete_data($id);
  }
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

  <title>Home Page</title>
</head>

<body>




  <div class="container shadow  my-5 bg-body rounded">
    <h2 class="text-danger">From For Student </h2>
    <form action=" " method="post" enctype="multipart/form-data">
      <?php if (isset($delete_msg)) {
        echo $delete_msg;
      }  ?>
      <label for="name" class="form-label">Enter Name: </label>
      <input type="text" class="form-control" name="name">

      <label for="number" class="form-label">Number</label>
      <input type="number" class="form-control" name="phone">

      <label for="email" class="form-label">Email </label>
      <input type="email" class="form-control" name="email">

      <label class="form-check-label">Please Enter Img </label>
      <input type="file" class="form-control" name="img">

      <button type="submit" class=" btn-warning form-control my-3" name="add_info">Add Information </button>
    </form>
  </div>



  <div class="container container shadow my-5 bg-body rounded">
    <h4 class="text-center text-danger">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Number</th>
            <th scope="col">Email</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($data_display = mysqli_fetch_assoc($stok_data)) { ?>
            <tr>
              <th scope="row"> <?php echo $data_display['id']; ?> </th>
              <td><?php echo $data_display['name']; ?> </td>
              <td><?php echo $data_display['roll']; ?></td>
              <td><?php echo $data_display['email']; ?></td>

              <td>
                <img class="card-img-top" src="upload/<?php echo $data_display['img']; ?> " alt="Card image" style="height: 50px; width :100%">
              </td>
              <td>
                <a href="edit.php?status=edit&&id=<?php echo $data_display['id']; ?>" class="btn btn-warning">Edite</a>
                <a href="?status=delet&&id=<?php echo $data_display['id']; ?> " class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php }  ?>
        </tbody>

      </table>
  </div>



































  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>