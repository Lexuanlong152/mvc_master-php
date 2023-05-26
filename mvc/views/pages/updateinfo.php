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
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div id="dropZone" class="">
                              <form action="<?php echo BASEPATH;?>UpdateInfo/SayHi" method="post" enctype="multipart/form-data">
                                  <div class="form-group ">
                                    <div class="avatar-large avatar-xl-large">
                                      <img src="<?php echo $data['img'] ?>" alt="user"  id="profileDisplay" class="avatar-img-large img-fluid rounded-circle">
                                    </div>
                                    <label for="profileImage"></label>
                                    <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" class="form-control d-none">
                                  </div>
                                  <div class="form-group">
                                    <i class="bi bi-plus-circle fs-2" onclick="triggerClick()" style="cursor: pointer"></i>
                                  </div>
                                  <div class="form-group">
                                    <button name="image" type="submit" class="btn btn-outline-primary saveAvatar">Lưu hình nền</button>
                                  </div>
                              </form>
                            </div>
                    </div>
                </div>
                <!-- Change info -->
                <div class="col-md-6 border-right d-none update-info">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right text-primary">Cập nhật thông tin</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3"><label class="labels">Tên</label><input type="text"
                                    class="form-control" id="fullname-user" placeholder="Nhập tên của bạn" value="<?php echo $data['fullname'] ?>"></div>
                            <div class="col-md-12 mb-3"><label class="labels">Ngày sinh</label><input type="date"
                                    class="form-control" id="birthday-user" placeholder="Nhập ngày sinh" value="<?php echo $data['birthday'] ?>"></div>
                            <div class="col-md-12 mb-3"><label class="labels">Số điện thoại</label><input type="text"
                                    class="form-control" id="phonenumber-user" placeholder="Nhập số điện thoại" value="<?php echo $data['phonenumber'] ?>">
                                    <div class="checked-phonenumber text-danger"></div>
                            </div>
                            <div class="col-md-12 mb-3"><label class="labels">Địa chỉ</label><input type="text"
                                    class="form-control" id="address-user" placeholder="Nhập địa chỉ" value="<?php echo $data['address'] ?>"></div>
                            <div class="col-md-12 mb-3"><label class="labels">Địa chỉ email</label><input type="email"
                                    class="form-control" id="email-user" placeholder="Nhập email" value="<?php echo $data['email'] ?>"></div>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Facebook</label><input type="text"
                                    class="form-control" id="facebook-user" placeholder="Facebook của bạn" value="<?php echo $data['facebook'] ?>"></div>
                            <div class="col-md-6"><label class="labels">Trình độ học vấn</label><input type="text"
                                    class="form-control" id="grade-user" value="<?php echo $data['grade'] ?>" placeholder="Trình độ học vấn của bạn"></div>
                        </div>
                        <div class="mt-5 text-center"><button id="profile-button" class="btn btn-primary profile-button"
                                type="button">Lưu thông tin</button></div>
                    </div>
                </div>
                <!-- INFO  -->
                <div class="col-md-6 border-right info-user-2">
                    <div class="p-3 py-5">
                        <div class="row d-flex justify-content-between align-item-center mb-3 ">
                            <h4 class="col-md-4 text-primary">Thông tin</h4>
                            <div class="col-md-4 text-end"><i style="cursor:pointer;" class="fs-3  bi bi-pencil-square" onclick="changeInfo()"></i></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                                <span class="text-secondary">Tên: </span><span id="updated-fullname" class="ms-5 fs-5"><?php echo $data['fullname'] ?></span>
                            </div>
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                              <span class="text-secondary">Ngày sinh: </span><span id="updated-birthday" class="ms-5 fs-5"><?php echo $data['birthday'] ?></span>
                            </div>
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                              <span class="text-secondary">Số điện thoại: </span><span id="updated-phonenumber" class="ms-5 fs-5"><?php echo $data['phonenumber'] ?></span>
                            </div>
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                              <span class="text-secondary">Địa chỉ: </span><span id="updated-address" class="ms-5 fs-5"><?php echo $data['address'] ?></span>
                            </div>
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                              <span class="text-secondary">Địa chỉ email: </span><span id="updated-email" class="ms-5 fs-5"><?php echo $data['email'] ?></span>
                            </div>
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                              <span class="text-secondary">Facebook: </span><span id="updated-facebook" class="ms-5 fs-5"><?php echo $data['facebook'] ?></span>
                            </div>
                            <div class="col-md-12 mb-3 d-flex justify-content-between">
                              <span class="text-secondary">Trình độ học vấn: </span><span id="updated-grade" class="ms-5 fs-5"><?php echo $data['grade'] ?></span>
                            </div>
                        </div>
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
                                                <li class="active mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo">Thông tin & liên hệ </a></li>
                                                <li class="mb-2"><a href="<?php echo BASEPATH;?>UpdateInfo/updateUsername" class="text-black">Đổi tên người dùng </a></li>
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
