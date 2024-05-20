<?php
@include('connect.php');
session_start();
$username = $_SESSION['username'];
$useremail = $_SESSION['email'];

$getuser = "SELECT * FROM users WHERE email = '$useremail'";
$got = mysqli_query($conn, $getuser);

$row = mysqli_fetch_array($got);





if (isset($_POST['applyloan'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $benphone = $_POST['benphone'];
  $password = md5($_POST['password']);
  $address = $_POST['address'];
  $idnumber = $_POST['idnumber'];
  $vercode = $_POST['verification'];

  $select = "SELECT * FROM loanapplications WHERE email = '$useremail'";
  $result = mysqli_query($conn, $select);



  if (mysqli_num_rows($result) > 0) {
    $newrow = mysqli_fetch_array($result);

    if ($vercode == $newrow['code']) {
      $insert = "UPDATE loanapplications SET username = '$username',phone = '$phone',amount='$amount',address = '$address',idnumber = '$idnumber' WHERE email = '$useremail'";
      $inserted = mysqli_query($conn, $insert);

      if ($inserted) {
        header('location:users.php');
        // $success[] = 'User created successfully';
      } else {
        $error[] = 'Something went wrong';
      }
    } else {
      $error[] = 'incorrect code';
    }

    // if($vercode == $newrow['code']){
    //   $error[] = 'Verified';
    // }else{
    //   $error[] = 'incorrect code';
    // }
  } else {
    $error[] = 'no user found';
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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="initiate.php" method="post">
                <?php
                if (isset($error)) {
                  foreach ($error as $error) {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                  };
                };
                ?>

                <?php
                if (isset($success)) {
                  foreach ($success as $success) {
                    echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                  };
                };
                ?>


                <div class="row">
                  <p class="text-success">get code from beneficiary <?php echo $newrow['code'] ?></p>
                  <div class="col-lg-12">
                    <label for="inputPassword4" class="form-label">Beneficiary email</label>
                    <input required name="email" type="email" class="form-control" id="inputPassword4">
                  </div>

                </div>

                <div class="text-center">
                  <button name="adduser" type="submit" class="btn btn-primary">Submit</button>

                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


        </div>


        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="" method="post">
                <?php
                if (isset($error)) {
                  foreach ($error as $error) {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                  };
                };
                ?>

                <?php
                if (isset($success)) {
                  foreach ($success as $success) {
                    echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                  };
                };
                ?>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Username</label>
                  <input required name="username" value="<?php echo $row['username'] ?>" type="text" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input required name="email" value="<?php echo $row['email'] ?>" type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="inputEmail4" class="form-label">Phone</label>
                    <input required name="phone" value="<?php echo $row['phone'] ?>" type="text" class="form-control" id="inputEmail4">
                  </div>
                  <div class="col-lg-6">
                    <label for="inputEmail4" class="form-label">ID Number</label>
                    <input required name="idnumber" value="<?php echo $row['idnumber'] ?>" type="number" class="form-control" id="inputEmail4">
                  </div>
                </div>
                <div class="row">
                  <p class="text-success">get code from beneficiary</p>
                  <div class="col-lg-6">
                    <label for="inputPassword4" class="form-label">Beneficiary contact</label>
                    <input required name="benphone" type="text" class="form-control" id="inputPassword4">
                  </div>
                  <div class="col-lg-6">
                    <label for="inputPassword4" class="form-label">Accept Code</label>
                    <input required name="verification" type="number" class="form-control" id="inputPassword4">
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Amount</label>
                  <input required name="amount" value="" type="text" class="form-control" id="inputAddress" placeholder="0-50,000">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Address</label>
                  <input required name="address" value="<?php echo $row['address'] ?>" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="text-center">
                  <button name="applyloan" type="submit" class="btn btn-primary">Submit</button>

                </div>
              </form><!-- Vertical Form -->

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