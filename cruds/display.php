<?php

include 'connect.php';

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
  <script>
    function validateForm() {
      var name = document.forms["myForm"]["name"].value;
      var email = document.forms["myForm"]["email"].value;
      var mobile = document.forms["myForm"]["mobile"].value;
      var password = document.forms["myForm"]["password"].value;

      if (name == "" || email == "" || mobile == "" || password == "") {
        alert("All fields must be filled out");
        return false;
      }
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        alert("Invalid email format");
        return false;
      }
      var mobilePattern = /^[0-9]{10}$/;
      if (!mobilePattern.test(mobile)) {
        alert("Invalid mobile number. It should be a 10-digit number.");
        return false;
      }
      return true;
    }
  </script>
</head>

<body>
    <div class="container">
        <button class="btn btn-warning my-5"><a href="form.php" class="text-dark">Add user</a></button>   
    </div>
    <div class="container">
        <div class="col-8 m-auto mt-5"> 
        <table class="table table-bordered css-serial">
           <thead class="text-center bg-success text-dark">
            <tr>
              <th scope="col">SI no</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Password</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
     <tbody>
   </div> 
</div>

  <?php 

$sql="select * from `cruds`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];
        echo'<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$mobile.'</td>
      <td>'.$password.'</td>
      <td> 
          <button class="btn btn-primary" ><a href="update.php?updateid='.$id.'" class="text-white">update</a></button>
          <button class="btn btn-danger" ><a href="delete.php?deleteid='.$id.'" class="text-white">Delete</a></button>
      </td>
    </tr>';
    }
}
?>

</tbody>
</table>
</div>

</body>
</html>