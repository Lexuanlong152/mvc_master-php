<main id="main" class="mb-5">

<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
                <li><a href="index.html">Trang chủ</a></li>
                <li>Đổi Tên Đăng Nhập</li>
            </ol>
        </div>

    </div>
</section>
<section class="pt-0 mb-5 pb-0">
    <!------------------ TODO ------------------>
    <!------------- Write code here! ------------->
    <div class="container">
        <div class="container rounded bg-white">
            <div class="row">
                <!-- Change info -->
                <div class="col-md-9 border-right update-info" id="update-info">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3 text-center">
                            <h4 class="text-primary">Đổi tên đăng nhập</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3 text-secondary fs-5"><label class="labels">Sau khi đổi tên đăng nhập, tên đăng nhập mới sẽ được sử dụng mỗi khi bạn đăng nhập.</label><input type="text"
                                    class="form-control" id="username-update" placeholder="Tên đăng nhập mới" value=""></div>
                            <div class="text-danger check-user-update"></div>
                        </div>
                        <div class="mt-5"><button id="username-update-button" class="btn btn-warning profile-button"
                                type="button">Lưu thay đổi</button></div>
                    </div>
                </div>
                <div class="success-confirm justify-content-center container card my-5 w-50 h-100 d-none" id="success-confirm">
	                <div class="card-body ">
                    <div class="w-100 h-50 text-center"><h1 class="text-center"></h1></div>
                    <div class="text-center">
                      <i class="bi bi-check-circle text-success display-3"></i>
                    </div>
                    <div class="text-center fw-bold fs-4 my-3">Chúc mừng bạn đã thay đổi tên đăng nhập thành công!</div>
	                </div>
                  <div class="card-footer text-center"> <a href="updateUsername.php" class="btn btn-danger">Trở lại</a> </div>
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
                                                <li class="mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo/updateUsername" >Đổi tên người dùng </a></li>
                                                <li class="mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo/updatePass" class="text-black">Đổi mật khẩu</a></li>
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
