<?php if($data['username']!=""){
  if($data['username']=="admin0704"){
    $link= BASEPATH. "Dashboard/users";
    header("Location: $link");
  }
  else{
    $link=BASEPATH. "Info";
    header("Location: $link");
  }
} ?>
<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.html">Trang chủ</a></li>
            <li>Đăng nhập</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page pt-0" id="short">
        <div class="content mt-0">
          <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 order-xl-2">
              <img src="<?php echo BASEPATH;?>public/assets/img/new.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mt-1">
                  <h3><strong> Đăng nhập</strong></h3>
                  <p class="mb-4">Chào mừng bạn đến với Code Camp! Đăng nhập ngay để tham gia khóa học.</p>
                </div>
                <form action="<?php echo BASEPATH;?>Login/checkLogin" method="post">
                  <div class="form-group first mb-4">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập">
                    <div class="text-danger"><?php echo $data['userError'] ?></div>
                  </div>
                  <div class="form-group last mb-4">
                    <input type="password" class="form-control password" id="password" name="password" placeholder="Mật khẩu">
                    <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword"></i>
                    <div class="text-danger"><?php echo $data['passError'] ?></div>
                  </div>
                  
                  <div class="d-flex mb-3 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                    <span class="ms-auto"><a href="<?php echo BASEPATH;?>Resetpass" class="forgot-pass">Quên mật khẩu</a></span> 
                  </div>
                  <div class="mb-5">
                    <span class="d-inline text-left text-muted">Bạn chưa có tài khoản? </span><span><a class="text-danger text-decoration-none fs-5" href="<?php echo BASEPATH;?>Signup">Đăng ký</a></span>
                  </div>
                  <input type="submit" value="Đăng nhập" name="submit" class="btn text-white w-100 btn-success">
                  <span class="d-block text-left my-4 text-muted"> Hoặc đăng nhập với</span>
                  
                  <div class="social-login">
                    <a href="#" class="facebook">
                      <span class="icon-facebook mr-3"></span> 
                    </a>
                    <a href="#" class="twitter">
                      <span class="icon-github mr-3"></span> 
                    </a>
                    <a href="<?php echo $data['loginURL'] ?>" class="google">
                      <span class="icon-google mr-3"></span> 
                    </a>
                  </div>
                </form>
                </div>
              </div>
              
            </div>
            
          </div>
          </div>
        </div>
    </section>

  </main><!-- End #main -->