<?php
@include('config/dbconn.php');
@include('components/navbar.php');
error_reporting(1);

if (isset($_POST['registeruser'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = md5($_POST['password']);

  $select = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    $error[] = 'User already exists';
  } else {
    $insert = "INSERT INTO admin (username,email,phone,password) VALUES ('$username', '$email','$phone', '$password')";
    $inserted = mysqli_query($conn, $insert);

    if ($inserted) {
      header('location:login.php');
    } else {
      $error[] = 'Something went wrong';
    }
  }
}
?>

<?php
@include('./components/navbar.php');
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Easiest Way to Add Input Masks to Your Forms</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<script>
  $(document).ready(function() {
    $('#birth-date').mask('00/00/0000');
    $('#phone-number').mask('0000-0000');
  })
</script>

<body>
  <div class="registration-form">
    <form action="" method="post">
      <?php
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        };
      };
      ?>
      <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
      </div>
      <div class="form-group">
        <input type="text" name="username" class="form-control item" id="username" placeholder="Username">
      </div>

      <div class="form-group">
        <input name="email" type="text" class="form-control item" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <input name="password" type="password" class="form-control item" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input name="phone" type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
      </div>

      <div class="form-group">
        <button type="submit" name="registeruser" class="btn btn-block create-account">Create Account</button>
      </div>
    </form>
    <div class="social-media">
      
      <div class="social-icons">
        <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
        <a href="#"><i class="icon-social-google" title="Google"></i></a>
        <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
<style>
  body {
    background-color: #dee9ff;
  }

  .registration-form {
    padding: 50px 0;
    margin-top: 5%;
  }

  .registration-form form {
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  }

  .registration-form .form-icon {
    text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
  }

  .registration-form .item {
    border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
  }

  .registration-form .create-account {
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
  }

  .registration-form .social-media {
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  }

  .registration-form .social-icons {
    margin-top: 30px;
    margin-bottom: 16px;
  }

  .registration-form .social-icons a {
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
  }

  .registration-form .social-icons a:hover {
    text-decoration: none;
    opacity: 0.6;
  }

  @media (max-width: 576px) {
    .registration-form form {
      padding: 50px 20px;
    }

    .registration-form .form-icon {
      width: 70px;
      height: 70px;
      font-size: 30px;
      line-height: 70px;
    }
  }
</style>

</html>