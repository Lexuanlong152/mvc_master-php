<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Thông tin khóa học</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center ">IMG</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Author</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Price</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="table">
                        <!-- render cac dong ra, đây là 1 dòng -->
                        <tr>
                        <?php foreach ($data['course'] as $course):?>
                        <tr id="<?php echo "rowC".$course['id'];?>">
                        <td scope="row" class="text-sm id_cell fw-bold text-dark text-center" id="<?php echo $course['id'];?>">
                          <img src="<?php echo BASEPATH.$course['img'];?>" alt="" class="img-fluid"></td>
                        <td class="mb-0 text-sm fw-bold text-dark" id='<?php echo "username" . $course['id'];?>'>
                          <?php 
                            if(strlen($course['name'])>50){
                              $string = $course['name'];
                              $token = strtok($string, " ");
                              for($i=0;$i<13;$i++)
                                {
                                echo "$token". " ";
                                $token = strtok(" ");
                                }
                                echo " ...";
                            }
                            else{
                              echo $course['name'];
                            }
                            ?>
                        </td>
                        <td class="align-middle text-sm text-center fw-bold text-dark" id='<?php echo "birthday" . $course['id'];?>'>
                            <?php echo $course['author'];?>
                        </td>
                        <td class="align-middle text-sm text-center fw-bold text-dark" id='<?php echo "phonenumber" . $course['id'];?>'>
                            <?php echo $course['category'];?>
                        </td>
                        <td class="align-middle text-sm text-center fw-bold text-dark" id='<?php echo "address" . $course['id'];?>'>
                            <?php echo $course['price'];?>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-danger text-white font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="deleteCourse(<?php echo $course['id']; ?>)">
                                Xóa
                            </button>
                            <a href="<?php echo BASEPATH."Dashboard/updateCourse?id=".$course['id'];?>" class="btn btn-info text-white font-weight-bold text-xs">Chi tiết</a>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                        </tr>
                  </tbody>
                </table>
                <div class="container">
                    <button class="btn btn-warning mt-2" onclick="addCourseBtn()">Thêm khóa học</button>
                </div>
                <div class="d-none container-lg row d-flex justify-content-start" id="addCourse">
                      <form action="<?php echo BASEPATH;?>Dashboard/course" method="post" enctype="multipart/form-data"> 
                        <div class="form-group mb-3">
                            <label for="name">Tên khóa học:</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Nhập vào tên khóa học" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tác giả:</label>
                            <input type="text" class="form-control" name="author" id="author" aria-describedby="emailHelp" placeholder="Nhập vào tác giả khóa học" value="">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                          <label for="category">Phân loại</label>
                          <select name="category" id="category" class="form-select" aria-label="Default select example">
                            <option selected value="DSA">DSA</option>
                            <option value="Game">Game</option>
                            <option value="Web">Web</option>
                            <option value="Machine Learning">Machine Learning</option>
                          </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Mô tả khóa học:</label>
                            <textarea type="text" class="form-control" name="content" id="content" aria-describedby="emailHelp"  value="">
                            </textarea>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Giá:</label>
                            <input type="text" class="form-control" name="price" id="price" aria-describedby="emailHelp" placeholder="Nhập vào giá khóa học" value="">
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
