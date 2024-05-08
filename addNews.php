<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
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
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<main>

<div class="pagetitle">
  <h1>Data Tables</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Datatables</h5>
         

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  <b>Title</b>
                </th>
                <th>category</th>
                <th >Date</th>
                <th>Options</th>
              </tr>
            </thead>
            
            <tbody>
                <?php
                session_start();
                if($_SESSION['id']!=null)
                {
                 
                
                 $con=mysqli_connect('localhost','root','','dania');
                 $q="SELECT * FROM `newstable`";
                 $res=mysqli_query($con,$q);
                 while($row=mysqli_fetch_array($res))
                 {

                ?>
              <tr>
                <td><?php echo $row['ntitle']; ?></td>
                <td><?php echo $row['ncate']; ?></td>
                <td><?php echo $row['ndate']; ?></td>
                <td><a href="show.php?did=<?php echo $row['nid']; ?>">Details</a> <span>|</span><a href="addNews.php?id=<?php echo $row['nid']; ?>">Delete</a> <span>|</span><a href="up.php?eid=<?php echo $row['nid']; ?>">Update</a></td>
              </tr>

              <?php
                 }
                 if(isset($_GET['id']))
                 {
                  $q="DELETE FROM `newstable` WHERE `nid`=".$_GET['id'];
                  if(mysqli_query($con,$q))
                  {
                    echo "<script>alert('the artical has been deleted'); location.assign('addNews.php')</script>";

                  }

                 }
                }
                else
                {
                  echo "<script>alert('you should login'); location.assign('login.php');</script>";
                }

              ?>
                


            </tbody>
           
          </table>
          <!-- End Table with stripped rows -->
          <a href="userP.php">Add Article</a> <span> | </span> <a href="logout.php">LOGOUT</a>

        </div>
      </div>
                
    </div>
  </div>
</section>

</main><!-- End #main -->


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