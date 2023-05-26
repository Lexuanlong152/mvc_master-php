
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>CODE CAMP</title>
<meta content="" name="description">
<meta content="" name="keywords">
<!-- Icon bootstrap -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<!-- Favicons -->
<link href= "<?php echo BASEPATH;?>public/assets/img/favicon1.png" rel="icon">
<link href="<?php echo BASEPATH;?>public/assets/img/favicon1.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href= "<?php echo BASEPATH;?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo BASEPATH;?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?php echo BASEPATH;?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="<?php echo BASEPATH;?>public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="http://localhost/tuts/php-mvc-master/public/assets/fonts/icomoon/style.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"> 
<!-- Template Main CSS File -->
<link rel="stylesheet" href="<?php echo BASEPATH;?>public/assets/fonts/icomoon/style.css">
<link href="<?php echo BASEPATH;?>public/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top <?php echo $data['isHome']? "":"header-inner-pages"; ?>">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="<?php echo BASEPATH;?>Home">CODE CAMP</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="Home">Trang Chủ</a></li>
          <li><a class="nav-link scrollto" href="Home#about">Về Chúng Tôi</a></li>
          <li><a class="nav-link scrollto" href="Home#contact">Liên Hệ</a></li>
          <li><a href="Course"><span>Khóa Học</span></a></li>
          <?php
          if($data['username']!=""){
            echo '
                <li><i class="bi bi-bell scrollto user"></i></li>
                <li class="dropdown">
                    <a href=" '.BASEPATH.'Info" ><i class="bi bi-person-circle scrollto user "></i></a>
                    <ul>
                        <li><a href="'.BASEPATH.'UpdateInfo">Thay đổi thông tin</a></li>
                    </ul>
                </li>
                <li>
                    <a href="'.BASEPATH.'Logout">
                        <i class="bi bi-box-arrow-right scrollto user">
                        </i>
                    </a>
                </li>
                </ul>';
          }
          else{
            echo '
            <li><a class="getstarted scrollto" href="'.BASEPATH.'Login">Đăng Nhập</a></li>
            <li><a class="getstarted scrollto" href="'.BASEPATH.'Signup">Đăng Ký</a></li>
            ';
          }
    ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<?php require_once "./mvc/views/pages/".$data['Page'].".php";?>


<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
<div class="container">
<div class="row">
<?php
    require_once "./mvc/core/DB.php";
    $db=new DB();
    $sql = "SELECT * FROM contact WHERE id=1";
    $res=mysqli_query($db->conn,$sql);
    $result=mysqli_fetch_assoc($res);
?>
  <div class="col-lg-3 col-md-6 footer-contact">
    <h3>Code Camp</h3>
    <p>
      <!-- Số 128, hẻm 8 <br>
      Đông Hòa, Dĩ An<br>
      Bình Dương <br><br> -->
      <?php echo $result['address'] ?><br>
      <strong>Số điện thoại: </strong><?php echo $result['phonenumber'] ?><br>
      <strong>Email: </strong> <?php echo $result['email'] ?><br>
    </p>
  </div>

  <div class="col-lg-2 col-md-6 footer-links">
    <h4>Links</h4>
    <ul>
      <li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASEPATH;?>Home">Trang chủ</a></li>
      <li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASEPATH;?>Home#about">Về chúng tôi</a></li>
      <li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASEPATH;?>Home#contact">Liên hệ</a></li>
      <li><i class="bx bx-chevron-right"></i> <a href="<?php echo BASEPATH;?>Course">Khóa học</a></li>
    </ul>
  </div>

  <div class="col-lg-4 col-md-6 footer-newsletter">
    <h4>Tham gia cùng với chúng tôi</h4>
    <p>Để lại địa chỉ email của bạn.</p>
    <form action="" method="post">
      <input type="email" name="email"><input type="submit" value="Nộp">
    </form>
  </div>

</div>
</div>
</div>

<div class="container">

<div class="copyright-wrap d-md-flex py-4">
<div class="me-md-auto text-center text-md-start">
  <div class="copyright">
    &copy; Copyright <strong><span>Code Camp</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by <a href="<?php echo BASEPATH;?>Home">Code Camp</a>
  </div>
</div>
<div class="social-links text-center text-md-right pt-3 pt-md-0">
  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
</div>
</div>

</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo BASEPATH;?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASEPATH;?>public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo BASEPATH;?>public/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo BASEPATH;?>public/assets/vendor/purecounter/purecounter.js"></script>
<script src="<?php echo BASEPATH;?>public/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Template Main JS File -->
<script src="<?php echo BASEPATH;?>public/assets/js/main.js"></script>

</body>

</html>