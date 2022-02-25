<?php 

require_once 'php_action/db_connect.php';

session_start();
if(isset($_SESSION['userId'])){
    header('location: http://localhost/for-clint/dashboard.php');
}
$errors = array();
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
if(empty($username) || empty($password)){
    if($username == ""){
        $errors[] = "enter your username";
    }
    if($password == ""){
        $errors[] = "enter your password";
    }  
  }else{
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = $connect->query($sql);

      if($result->num_rows == 1){
          $password = md5($password);
        //   exist
        $mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $mainResult = $connect->query($mainSql);
        if($mainResult->num_rows == 1){
            $value = $mainResult->fetch_assoc();
            $user_id = $value['user_id'];
            // set session
            $_SESSION['userId'] = $user_id;
            header('location: http://localhost/for-clint/dashboard.php');
        }else{
            $errors[] = "incorrect username/password";
        }
      }else{
          $errors[] = "username dosenot exist";
      }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
   <title>stock management system</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/font/css/all.min.css">
    <link rel="stylesheet" href="assets/font/css/fontawesome.min.css">
    <link rel="stylesheet" href="custom/css/custom.css">
<!-- ad the script file -->
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <!--  jquery ui -->
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.css">
    <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
    <!-- bootstrap javascript -->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<body>
<div class="container">
    <div class="row vertical">
   <div class="col-md-5 col-md-offset-4">
   <div class="panel panel-info">
       <div class="panel-heading">
           <h3 class="panel-title">please sign in </h3>
       </div>
  <div class="panel-body">
      <div class="message">
          <?php
          if($errors){
              foreach ($errors as $key => $value){
                echo '<div class="alert alert-warning role="alert">
               <i class="glyphicon glyphicon-exclamation-sign"></i>
             '.$value.' </div>';
             }
          }
          
          ?> 
      </div>
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="enter your username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i>
                Sign in</button>
            </div>
        </div>
        </form>
  </div>
</div>
    </div><!-- col-md-5 -->
 </div><!-- container -->
</body>
</html>