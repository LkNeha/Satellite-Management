<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $sql = "select * from `v_credentials` where VUNAME='$username' and VPASSWD='$passwd'";
  $result=mysqli_query($connection,$sql);
  if($result){
      $count="update `visitor`  set num =(num + 1)  where VUNAME='$username'";
      $query2 = mysqli_query($connection,$count);
      $num=mysqli_num_rows($result);
      if($num>0){
         echo '<script type="text/javascript">alert("logged in successfully")</script>';
         session_start();
         $_SESSION['VUNAME']=$username;
         header('location:mainpage.php');
      }
  else{
     echo '<script type="text/javascript">alert("Invalid credentials. Have you signed Up?")</script>';
  }
 }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="icon" href="images/nwicon.png" type="image/png">

   </head>
   <body>
   <div class="login-form">
         <div class="text">
            LOGIN
         </div>
         <form  action="login.php"  method="post" >
            <div class="field">
               <div class="fas fa-envelope"></div>
               <input type="text" name="username" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="field">
               <div class="fas fa-lock"></div>
               <input type="password" name="passwd" placeholder="Password" autocomplete="off" required>
            </div>
            <br>
            <button name="login" class="loginbtn">LOGIN</button>
            <div class="link">
               Not a member?
               <a href="signup.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html> 







