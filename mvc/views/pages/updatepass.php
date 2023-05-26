<main id="main">

<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
                <li><a href="index.html">Trang chủ</a></li>
                <li>Cập nhật thông tin</li>
            </ol>
        </div>

    </div>
</section>
<section class="pt-0">
    <!------------------ TODO ------------------>
    <!------------- Write code here! ------------->
    <div class="container">
        <div class="container rounded bg-white">
            <div class="row">
                <!-- Change info -->
                <div class="col-md-9 border-right update-info">
                    <div class="d-none success-confirm justify-content-center container card my-5 w-80 h-70 " id="success-confirm">
                        <div class="card-body ">
                        <div class="w-100 h-50 text-center"><h1 class="text-center"></h1></div>
                        <div class="text-center">
                        <i class="bi bi-check-circle text-success display-3"></i>
                        </div>
                        <div class="text-center fw-bold fs-4 my-3">Chúc mừng bạn đã thay đổi mật khẩu thành công!</div>
                        </div>
                    <div class="card-footer text-center"> <a href="updatePass.php" class="btn btn-danger">Trở lại</a> </div>
                    </div>
                    <div class="p-3 py-5 changePass">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right text-primary">Thay đổi mật khẩu</h4>
                        </div>
                        <form class="card mt-4">
    	                <div class="card-body pb-0">
                            <div class="form-group last mb-4">
                                <input type="password" class="form-control password" id="password0" name="password0" placeholder="Mật khẩu cũ">
                                <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword1"></i>
                                <div class="row d-flex">
                                    <div class="col-md-5">
                                        <small class="text-danger" id="checkPass0"></small>
                                    </div>
                                    <div class="col-md-7 text-end">
                                        <small class="text-primary"><a href="forgotPassword.php">Quên mật khẩu?</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group last mb-4">
                                <input type="password" class="form-control password" id="password1" name="password1" placeholder="Mật khẩu mới">
                                <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword1"></i>
                                <small class="text-danger " id="checkPass1"></small>
                            </div>
                            <div class="form-group last mb-1">
                                <input type="password" class="form-control password" id="password2" name="password2" placeholder="Nhập lại mật khẩu">
                                <i class="bi bi-eye-slash float-end togglePassword" id="togglePassword2"></i>
                                <small class="text-danger " id="checkPass2"></small>
                            </div>
    	                </div>
                        <div class="text-warning fw-bold text-warning text-center"></div>
                        <div class="card-footer ps-3 d-flex justify-content-center"> <button class="btn btn-success w-25" id="confirm" type="button">Xác nhận</button> </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 py-5">
                        <main id="layout-main" class="group">
                            <div id="layout-content" class="group">
                                <div id="content" class="group">
                                    <div class="zone zone-content">
                                        <div class="user--profile-left">
                                            <ul class="user--profile--list-function">
                                                <li class="active mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo" class="text-black">Thông tin & liên hệ </a></li>
                                                <li class="mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo/updateUsername" class="text-black">Đổi tên người dùng </a></li>
                                                <li class="mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo/updatePass">Đổi mật khẩu</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End #main -->