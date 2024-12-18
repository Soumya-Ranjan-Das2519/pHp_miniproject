<?php
$host="localhost:3307";
$username="root";
$password="";
$database="signupform";
$conn=new mysqli($host,$username,$password,$database);
if(!$conn){
    //echo "Connection successful";
 die("Connection failed".$conn->mysqli_error());

}
 
?>