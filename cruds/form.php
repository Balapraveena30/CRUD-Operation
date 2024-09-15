<?php 
include 'connect.php';
if(isset($_POST['submit'])){
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $mobile = trim($_POST['mobile']);
  $password = trim($_POST['password']);

  // Server-side validation
  if(empty($name) || empty($email) || empty($mobile) || empty($password)){
    die("All fields are required.");
  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Invalid email format.");
  }
  if(!preg_match('/^[0-9]{10}$/', $mobile)){
    die("Invalid mobile number. It should be a 10-digit number.");
  }

  // Sanitize input data
  $name = mysqli_real_escape_string($con, $name);
  $email = mysqli_real_escape_string($con, $email);
  $mobile = mysqli_real_escape_string($con, $mobile);
  $password = mysqli_real_escape_string($con, $password);

  $sql="INSERT INTO `cruds` (name,email,mobile,password) VALUES('$name','$email','$mobile','$password')";
  $result=mysqli_query($con,$sql);
  if($result){
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
                   <input type="text" class="form-control fw-bold" placeholder="Enter your name" name="name">
                 </div>

                 <div class="form-group mt-3">
                   <label>Email</label>
                   <input type="email" class="form-control fw-bold" placeholder="Enter your email" name="email">
                 </div>

                 <div class="form-group mt-3">
                   <label>Mobile</label>
                   <input type="text" class="form-control fw-bold" placeholder="Enter your mobile number" name="mobile">
                 </div>

                 <div class="form-group mt-3">
                   <label>Password</label>
                   <input type="text" class="form-control fw-bold" placeholder="Enter your password" name="password">
                 </div>
                 <div class="form group text-center">
                   <button type="submit" class="btn btn-success mt-3" name="submit">Submit</button>
                 </div> 
                </form>
           </div>
       </div>
   </div> 
    
  </body>
</html>