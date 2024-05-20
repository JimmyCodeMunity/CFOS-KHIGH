<?php
@include('connect.php');
session_start();
$username = $_SESSION['username'];
$useremail = $_SESSION['email'];

$getuser = "SELECT * FROM users WHERE email = '$useremail'";
$got = mysqli_query($conn, $getuser);

$row = mysqli_fetch_array($got);

if (isset($_POST['adduser'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = md5($_POST['password']);
  $address = $_POST['address'];
  $idnumber = $_POST['idnumber'];

  $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    $error[] = 'User already exists';
  } else {
    $insert = "INSERT INTO users (username,email,phone,password,address,idnumber) VALUES ('$username', '$email','$phone', '$password','$address','$idnumber')";
    $inserted = mysqli_query($conn, $insert);

    if ($inserted) {
      header('location:users.php');
      // $success[] = 'User created successfully';
    } else {
      $error[] = 'Something went wrong';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CFOS|Add User </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
  @include('header.php');
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  @include('sidebar.php');
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add user</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Actions</li>
          <li class="breadcrumb-item active">adduser</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">


        <div class="col-lg-6">

        <div class="card mt-5 px-3 py-4">
      <div class="d-flex flex-row justify-content-around">
        <div class="mpesa"><span>Mpesa </span></div>
        <div><span>Paypal</span></div>
        <div><span>Card</span></div>
      </div>
      <div class="media mt-4 pl-2">
        <img src="./images/1200px-M-PESA_LOGO-01.svg.png" class="mr-3" height="75" />
        <div class="media-body">
          <h6 class="mt-1">Enter Amount & Number</h6>
        </div>
      </div>
      <div class="media mt-3 pl-2">
        <!--bs5 input-->

        <form class="row g-3" action="./stk_initiate.php" method="POST">

          <div class="col-12">
            <label for="inputAddress" class="form-label">Amount</label>
            <input required type="text" class="form-control" name="amount" placeholder="Enter Amount">
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Phone Number</label>
            <input type="text" class="form-control" value="<?php echo $row['phone']?>" name="phone" placeholder="Enter Phone Number">
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-success" name="submit" value="submit">Donate</button>
          </div>
        </form>
        <!--bs5 input-->
      </div>
    </div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>