<?php $result= $data['course'];

?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-dark text-capitalize ps-3">Chỉnh sửa khóa học</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="container-lg row d-flex justify-content-start" id="addCourse">
                      <form action="<?php echo BASEPATH;?>Dashboard/updateCourse?id=<?php echo $data['id'] ?>" method="post" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelp" placeholder="Nhập vào tên khóa học" value="<?php echo $data['id'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="hidden" class="form-control" name="img" id="img" aria-describedby="emailHelp" placeholder="Nhập vào tên khóa học" value="<?php echo $result['img'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tên khóa học:</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Nhập vào tên khóa học" value="<?php echo $result['name'] ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tác giả:</label>
                            <input type="text" class="form-control" name="author" id="author" aria-describedby="emailHelp" placeholder="Nhập vào tác giả khóa học" value="<?php echo $result['author'] ?>">
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
                            <textarea type="text" class="form-control" name="content" id="content" aria-describedby="emailHelp"  value=""><?php echo $result['content'] ?></textarea>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Giá:</label>
                            <input type="text" class="form-control" name="price" id="price" aria-describedby="emailHelp" placeholder="Nhập vào giá khóa học" value="<?php echo $result['price']."$" ?>">
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group ">
                          <label for="">Hình ảnh</label>
                          <div class="avatar-large avatar-xl-large">
                          <img src="<?php echo BASEPATH. $result['img'] ?>" alt=""  id="profileDisplay" class="avatar-img-large img-fluid">
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
