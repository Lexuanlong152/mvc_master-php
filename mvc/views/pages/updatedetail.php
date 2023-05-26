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
<section>
    <!------------------ TODO ------------------>
    <!------------- Write code here! ------------->
    <div class="container-xxl">
        <div class="container-xxl rounded bg-white">
            <!-- Change info -->
            <div class=" d-none update-info">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right text-primary">Cập nhật thông tin khóa học</h4>
                    </div>
                    <div class="col-md-12 mb-3"><label class="labels">output_course</label><input type="text"
                            class="form-control" id="fullname-user" placeholder="Nhập output_course" value="<?php echo $data['introcourse']['output_course'] ?>"></div>
                    <div class="col-md-12 mb-3"><label class="labels">part</label><input type="date"
                            class="form-control" id="birthday-user" placeholder="Nhập part" value="<?php echo $data['introcourse']['output_course'] ?>"></div>
                    <div class="col-md-12 mb-3"><label class="labels">num_lessons</label><input type="text"
                            class="form-control" id="phonenumber-user" placeholder="Nhập num_lessons" value="<?php echo $data['introcourse']['output_course'] ?>">
                    </div>
                    <div class="col-md-12 mb-3"><label class="labels">list_part</label><input type="text"
                            class="form-control" id="address-user" placeholder="Nhập địa chỉ" value="<?php echo $data['introcourse']['output_course'] ?>"></div>
                    <div class="col-md-12 mb-3"><label class="labels">list_lessons</label><input type="email"
                            class="form-control" id="email-user" placeholder="Nhập email" value="<?php echo $data['introcourse']['output_course'] ?>"></div>
                    <div class="col-md-12 mb-3"><label class="labels">course_require</label><input type="email"
                            class="form-control" id="email-user" placeholder="Nhập email" value="<?php echo $data['introcourse']['output_course'] ?>"></div>
                    <div class="mt-5 text-center"><button id="profile-button" class="btn btn-primary profile-button"
                            type="button">Lưu thông tin</button></div>
                </div>
            </div>
            <!-- INFO  -->
            <div class=" info-user-2">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End #main -->
