<?php
$login=0;
$invalid=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db.php';
    $username=$_POST['username'];
    $password=$_POST["password"];

    $sql="select * from `resistration` where username='$username' and password='$password'";

    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);//count the number of rows in the database
        if($num>0){
            // echo "<br>"."login successfully";
            // $user=1;
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        }else{
           
            $invalid=1;
        }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
if($invalid){
  echo "
    <div class='alert alert-danger alert-dismissible fade show mt-5' role='alert'>
        <strong>Error!</strong> Invalid Credentials
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
?>
<?php
if($login){
  echo "
  <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Login!</strong> We are successfully logged in.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header text-center bg-primary text-white">
            <h4>login to our website</h4>
          </div>
          <div class="card-body">
            <form action="login.php" method="post">
              <!-- Username Field -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
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
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
              <!--login button-->
              <div class="mt-2 d-flex justify-content-center align-items-center"><p>For new user Signup first! <a href="signup.php" class="btn btn-transparent text-primary">Sign Up</a></p></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</body>

</html>