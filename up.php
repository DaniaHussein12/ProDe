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
   <div class="container-fluid">
  <main>

    <div class="pagetitle">
      <h1>Add Article</h1>
    </div><!-- End Page Title -->

      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form method="post" asp-controller="home" >
                <?php
                session_start();
                if($_SESSION['id']!=null)
                {
                 $con=mysqli_connect('localhost','root','','dania');
                 $q="SELECT * FROM `newstable` WHERE nid=".$_GET['eid'];
                 $res=mysqli_query($con,$q);
                 while($row=mysqli_fetch_array($res))
                 {

                
                ?>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="<?php echo $row['ntitle'] ?>">
                  </div>
                </div>

                 <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Cate</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="cate" >
                      <option selected><?php echo $row['ncate'] ?></option>
                      <option value="Sports">Sports</option>
                      <option value="Politics">Politics</option>
                      <option value="Arts">Arts</option>
                      <option value="Trading">Trading</option>
                      <option value="Science">Science</option>
                    </select>
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">about the Article</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="body" ><?php echo $row['nbody'] ?></textarea>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" value="<?php echo $row['ndate'] ?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-sm-10">
                                        <button type="submit" name="up" class="btn btn-primary" asp-action="doins" >Update</button>
                                        
                  </div>
                </div>

              </form><!-- End General Form Elements -->
              <?php
                 }
              ?>

            </div>
          </div>

        </div>
        <?php
        
        
          if(isset($_POST['up']))
                  {
                    $title=$_POST['title'];
                    $cate=$_POST['cate'];
                    $body=$_POST['body'];
                    $date=$_POST['date'];
                    
                $con=mysqli_connect('localhost','root','','dania');
                  $q="UPDATE `newstable` SET `ntitle`='$title',`ncate`='$cate',`nbody`='$body',`ndate`='$date' WHERE `nid`=".$_GET['eid'];
                  if(mysqli_query($con,$q))
                  {
                    echo "<script>alert('the article is updated'); location.assign('addNews.php');</script>";
                   
                  }
                }
              }
              else
                {
                  echo "<script>alert('tyou can not enter without login'); location.assign('login.php');</script>";
                }
                  
                  

        
       


        ?>

 
  

  </main><!-- End #main -->
  </div>
    <script>
        function confirmAdd() {
            return confirm("Are you sure you want to add it ?");
        }
        function confirmL() {
            return confirm("Are you sure you want to leave ?");
        }
    </script>





    
    <a href="logout.php"><h1>LogOut</h1></a>


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