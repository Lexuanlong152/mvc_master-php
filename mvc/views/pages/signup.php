<?php if($data['username']!=""){
  header('Location: '.BASEPATH.'Info');
} ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.html">Trang chủ</a></li>
            <li>Đăng ký</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-0" id="short">
        <div class="content mt-0">
          <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 order-xl-2">
              <img src="<?php echo BASEPATH ?>/public/assets/img/new.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-4">
                  <h3 class="mt-3"><strong> Đăng Ký Tài Khoản</strong></h3>
                  <p class="mb-4">Chào mừng bạn đến với Code Camp. Hãy tạo một tài khoản để bắt đầu nhé!</p>
                </div>
                <form action="<?php echo BASEPATH;?>Signup/confirm" method="post">
                  <div class="form-group mb-4">
                    <!-- <label for="username">Tên đăng nhập</label> -->
                    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập">
                    <div class="text-danger"><?php echo $data['userError']; ?></div>
                  </div>
                  <div class="form-group mb-4">
                    <!-- <label for="email">Email</label> -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <div class="text-danger"><?php echo $data['emailError']; ?></div>
                  </div>
                  <div class="form-group last mb-4">
                    <!-- <label for="password">Mật khẩu</label> -->
                    <input type="password" class="form-control password" id="password" name="password" placeholder="Mật khẩu">
                    <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword"></i>
                    <div class="text-danger"><?php echo $data['passError']; ?></div>
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption text-info">Tôi đồng ý với chính sách của Code Camp</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                  </div>
    
                  <input type="submit" value="Đăng Ký" class="btn text-white w-100 btn-danger" name="submit">
    
                  <span class="d-block text-left my-4 text-muted"> Sử dụng tài khoản liên kết:</span>
                  
                  <div class="social-login">
                    <a href="#" class="facebook">
                      <span class="icon-facebook mr-3"></span> 
                    </a>
                    <a href="#" class="twitter">
                      <span class="icon-github mr-3"></span> 
                    </a>
                    <a href="#" class="google">
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