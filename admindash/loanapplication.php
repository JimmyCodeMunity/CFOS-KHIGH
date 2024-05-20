<?php
@include('connect.php');
$select = "SELECT * FROM users";
$result = mysqli_query($conn, $select);


if (isset($_GET['type']) && $_GET['type'] != '') {
  $type = $_GET['type'];
  if ($type == 'status') {
    $operation = $_GET['operation'];
    $id = $_GET['id'];
    if ($operation == 'active') {
      $status = '1';
    } else {
      $status = '0';
    }
    $update_status_sql = "update users set status='$status' where id='$id'";
    mysqli_query($conn, $update_status_sql);
    header('location:users.php');
  }

  if ($type == 'delete') {
    $id = $_GET['id'];
    $delete_sql = "delete from users where id='$id'";
    mysqli_query($conn, $delete_sql);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CFOS |users </title>
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
  ?><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  @include('sidebar.php');
  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Users</h1>
      <a href="adduser.php" class="btn btn-primary">Add new User</a>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">


        <div class="col-lg-6">





          <div class="card">
            <div class="card-body">

              <table class="table table-sm">
                <thead>
                  <tr>

                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">idNumber</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['address'] ?></td>
                      <td><?php echo $row['idnumber'] ?></td>
                      <td>

                        <?php
                        if ($row['status'] == 1) {
                          echo "<a class='badge bg-success' href='?type=status&operation=deactive&id=" . $row['id'] . "'>active</a>&nbsp;";
                        } else {
                          echo "<a class='badge bg-warning' href='?type=status&operation=active&id=" . $row['id'] . "'>InActive</a>&nbsp;";
                        }

                        ?>
                      </td>
                      <td>
                        <?php
                        echo "<a class='badge bg-primary' href='updateuser.php?id=" . $row['id'] . "'>Edit</a>&nbsp;";
                        ?>
                      </td>
                      <td>
                        <?php
                        echo "<a class='badge bg-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>";

                        ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>


                </tbody>
              </table>
              <!-- End small tables -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  @include('footer.php');
  ?>

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