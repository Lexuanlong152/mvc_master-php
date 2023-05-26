<?php 
$result=$data['user'];
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-dark text-capitalize ps-3">Chỉnh sửa thông tin người dùng</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="container-lg row d-flex justify-content-start" id="addCourse">
                      <form action="<?php echo BASEPATH;?>Dashboard/updateUser?id=<?php echo $data['id'] ?>" method="post" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelp" placeholder="Nhập vào tên đăng nhập" value="<?php echo $data['id'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="hidden" class="form-control" name="img" id="img" aria-describedby="emailHelp" placeholder="Nhập vào tên khóa học" value="<?php echo $result['image'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tên đăng nhập:</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Nhập vào tên đăng nhập" value="<?php echo $result['username'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Nhập vào email" value="<?php echo $result['email'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tên đầy đủ:</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" aria-describedby="emailHelp" placeholder="Nhập vào tên đầy đủ" value="<?php echo $result['fullname'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Số điện thoại:</label>
                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" aria-describedby="emailHelp" placeholder="Nhập vào số điện thoại"  value="<?php echo $result['phonenumber'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Ngày sinh:</label>
                            <input type="text" class="form-control" name="birthday" id="birthday" aria-describedby="emailHelp" placeholder="Nhập vào ngày sinh" value="<?php echo $result['birthday'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Địa chỉ:</label>
                            <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp" placeholder="Nhập vào địa chỉ" value="<?php echo $result['address'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Facebook:</label>
                            <input type="text" class="form-control" name="facebook" id="facebook" aria-describedby="emailHelp" placeholder="Nhập vào facebook" value="<?php echo $result['facebook'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Trình độ:</label>
                            <input type="text" class="form-control" name="grade" id="grade" aria-describedby="emailHelp" placeholder="Nhập vào trình độ học vấn" value="<?php echo $result['grade'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group ">
                          <label for="">Hình ảnh</label>
                          <div class="avatar-large avatar-xl-large">
                          <img src="<?php echo BASEPATH."public/assets/img/upload/". $result['image'] ?>" alt=""  id="profileDisplay" class="avatar-img-large img-fluid w-30">
                        </div>
                        <label for="profileImage"></label>
                        <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" class="form-control d-none">
                        </div>
                      <div class="form-group">
                        <i class="bi bi-plus-circle fs-2" onclick="triggerClick()" style="cursor: pointer"></i>
                      </div>
                      <div class="form-group">
                        <button name="image" type="submit" class="btn btn-success saveAvatar">Hoàn thành</button>
                      </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
