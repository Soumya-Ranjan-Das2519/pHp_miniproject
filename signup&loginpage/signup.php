<?php
$succes=0;
$user=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db.php';
    $username=$_POST['username'];
    $password=$_POST["password"];


    // $sql="insert into `resistration`(username,password) values('$username','$password')";
    // $result=mysqli_query($conn,$sql);
    // if($result){
    //     echo "<br>"."data inserted successful";
    // }else{
    //     die(mysqli_error($conn));
    // }

// }
    $sql="select * from `resistration` where username='$username'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);//count the number of rows in the database
        if($num>0){
            // echo "<br>"."user already exist";
            $user=1;
        }else{ $sql="insert into `resistration`(username,password) values('$username','$password')";
        $result=mysqli_query($conn,$sql);
        if($result){
           $succes=1;
        } else{
            die(mysqli_error($conn));
        }

        }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
if($user){
  echo "
    <div class='alert alert-danger alert-dismissible fade show mt-5' role='alert'>
        <strong>Oh no, sorry!</strong> User already exists!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
?>
<?php
if($succes ){
  echo "
  <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Sign up successful.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header text-center bg-primary text-white">
            <h4>SignUp</h4>
          </div>
          <div class="card-body">
            <form action="signup.php" method="post">
              <!-- Username Field -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="username">
              </div>
              <!-- Password Field -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
              </div>
              <!-- Checkbox -->
<div class="form-check mb-3">
  <input type="checkbox" class="form-check-input" id="rememberMe">
  <label class="form-check-label" for="rememberMe">Remember me</label>
</div>     

              <!-- Submit Button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
              <!--login button-->
              <div class="mt-2 d-flex justify-content-center align-items-center"><p>Don't have an Account! <a href="login.php" class="btn btn-transparent text-primary">Login</a></p></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>

</html>