<main id="main">

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2></h2>
      <ol>
        <li><a href="index.html">Trang chủ</a></li>
        <li>Đặt lại mật khẩu</li>
      </ol>
    </div>

  </div>
</section>
  <div class="container pb-1 mb-2 mt-5">
    <div class="row justify-content-center contain">
        <?php
        if(!$data['check'])
         echo  '<div class="col-lg-5 col-md-7">
                <form class="card mt-4" method="post" action="'.BASEPATH.'Resetpass/setPass/'.$data['token'].'/'.$data['email'].'">
                    <input type="hidden" name="email" value="'.  $data['email'] .'">
                    <input type="hidden" name="token" value="'. $data['token'] .'">
                    <div class="card-body pb-0">
                        <div class="form-group last mb-4">
                            <input type="password" class="form-control password" id="password1" name="password1" placeholder="Mật khẩu mới">
                            <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword1"></i>
                            <small class="text-danger ms-2">'.$data['error1'].'</small>
                        </div>
                        <div class="form-group last mb-1">
                            <input type="password" class="form-control password" id="password2" name="password2" placeholder="Nhập lại mật khẩu">
                            <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword2"></i>
                            <small class="text-danger ms-2">'. $data['error2'].'</small>
                        </div>
                    </div>
                    <div class="text-warning fw-bold text-warning text-center">'.$data['expired'].'</div>
                  <div class="card-footer ps-3 d-flex justify-content-center"> <button class="btn btn-success w-25" type="submit" name="submit">Xác nhận</button> </div>
              </form>

            </div>';
            else{
            echo ' <div class="justify-content-center container card my-5 w-50 h-100">
                <div class="card-body ">
                <div class="w-100 h-50 text-center"><h1 class="text-center"></h1></div>
                <div class="text-center">
                  <i class="bi bi-check-circle text-success display-3"></i>
                </div>
                <div class="text-center fw-bold fs-4 my-3">Bạn đã thay đổi mật khẩu thành công!</div>
                </div>
              <div class="card-footer text-center"> <a href="'.BASEPATH.'Login" class="btn btn-success">Trở về</a> </div>
                </div> ';
            }
      ?>
    </div>
</div>
<section>

</section>

</main><!-- End #main -->