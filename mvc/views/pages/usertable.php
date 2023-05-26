<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Thông tin người dùng</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center ">IMAGE</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Birthday</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Phonenumber</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="table">
                    <?php foreach ($data['users'] as $user):?>
                        <tr id="<?php echo "row".$user['id'];?>">
                          <td scope="row" class="text-sm id_cell fw-bold text-dark text-center" id="<?php echo $user['id'];?>">
                            <img  src="<?php echo BASEPATH."public/assets/img/upload/".$user['image'];?>" alt="user" class="img-fluid img-user-table rounded">
                          </td>
                          <td class="mb-0 text-sm fw-bold text-dark" id='<?php echo "username" . $user['id'];?>'><?php echo $user['username'];?></td>
                          
                          <td class="align-middle text-sm text-center fw-bold text-dark" id='<?php echo "address" . $user['id'];?>'>
                              <?php echo $user['email'];?>
                          </td>
                        <td class="align-middle text-sm text-center fw-bold text-dark" id='<?php echo "birthday" . $user['id'];?>'>
                            <?php echo $user['birthday'];?>
                        </td>
                        <td class="align-middle text-sm text-center fw-bold text-dark" id='<?php echo "phonenumber" . $user['id'];?>'>
                            <?php echo $user['phonenumber'];?>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-danger text-white font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="deleteCar(<?php echo $user['id']; ?>)">
                                Xóa
                            </button>
                            <a href="<?php echo BASEPATH."Dashboard/updateUser?id=".$user['id'];?>" class="btn btn-info text-white font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Chi tiết
                            </a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="container">
                      <button class="btn btn-warning mt-3 ms-2" onclick="toggleAdduser()">Thêm</button>
                </div>  
                <div class="d-none container-lg row d-flex justify-content-star" id="addUserDashboard">
                <form action="<?php echo BASEPATH;?>Dashboard/users" method="post" enctype="multipart/form-data"> 
                        <div class="form-group mb-3">
                            <label for="name">Tên đăng nhập:</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Nhập vào tên đăng nhập" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Mật khẩu:</label>
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Nhập vào mật khẩu" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Nhập vào email" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Ngày sinh:</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" aria-describedby="emailHelp" placeholder="Nhập vào ngày sinh" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Số điện thoại:</label>
                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" aria-describedby="emailHelp" placeholder="Nhập vào số điện thoại" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group ">
                          <label for="">Hình ảnh</label>
                          <div class="avatar-large avatar-xl-large">
                          <img src="" alt=""  id="profileDisplay" class="avatar-img-large img-fluid w-30">
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
