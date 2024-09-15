<?php 
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `cruds` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
  $name=$row['name'];
  $email=$row['email'];
  $mobile=$row['mobile'];
  $password=$row['password'];

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];

  $sql="update  `cruds` set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";
  $result=mysqli_query($con,$sql);
  if($result){
    // echo "Data updated successfully";
    header('location:display.php');
  }else{
    die(mysqli_error($con));
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .colored-form .form-control {
      background-color: #dba2c4; 
      border: none; 
    }
    .bold-border {
      border: 4px solid #000000f4;
      padding: 20px; 
      border-radius: 10px; 
    }
  </style>

    <title>Basic form</title>
  </head>
  <body>
      <div class="container mt-5">
      <div class="row justify-content-center">
            <div class="col-md-6 bold-border p-4">
              <h1 class="text-center text-success mt-4 mb-5">Basic Details</h1> 
               <form class="colored-form " method="post">
             <div class="form-group mt-3">
             <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter your name" name="name" value=<?php echo $name;?>>
            </div>

            <div class="form-group mt-3">
             <label>Email</label>
              <input type="email" class="form-control" placeholder="Enter your email" name="email" value=<?php echo $email;?>>
            </div>

            <div class="form-group mt-3">
             <label>Mobile</label>
              <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" value=<?php echo $mobile;?>>
            </div>

            <div class="form-group mt-3">
             <label>Password</label>
              <input type="text" class="form-control" placeholder="Enter your password" name="password" value=<?php echo $password;?>>
            </div>
            <div class="form group text-center">
             <button type="submit" class="btn btn-primary mt-3" name="submit">Update</button>
             </div>
          </form>
      </div>
    
  </body>
</html>