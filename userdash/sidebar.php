<?php
@include('connect.php');
session_start();
?>
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->



    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Actions</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

        
        <li>
          <a href="deposit.php">
            <i class="bi bi-circle"></i><span>Deposit Money</span>
          </a>
        </li>
        <li>
          <a href="requestloan.php">
            <i class="bi bi-circle"></i><span>Get Loan</span>
          </a>
        </li>
        <!-- <li>
          <a href="sendsms.php">
            <i class="bi bi-circle"></i><span>SMS SEND</span>
          </a>
        </li> -->

      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>View</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="users.php">
            <i class="bi bi-circle"></i><span>Members</span>
          </a>
        </li>
        <li>
          <a href="transactions.php">
            <i class="bi bi-circle"></i><span>Transactions</span>
          </a>
        </li>
        <li>
          <a href="applications.php">
            <i class="bi bi-circle"></i><span>Loan Applications</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->



    <!-- End Icons Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="profile.php">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->



  </ul>

</aside>