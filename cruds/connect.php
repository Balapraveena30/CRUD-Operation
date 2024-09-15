<?php

$con=new mysqli('localhost','root','','crud');

if($con){
    //echo "connection successfull";
}else{
    die(mysqli_error($con));
}
?>