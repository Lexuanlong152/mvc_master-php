<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Thông tin liên hệ</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Địa chỉ</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Số điện thoại</th>
                    </tr>
                  </thead>
                  <tbody id="table">
                        <tr id="rowInfo">
                            <td class="align-middle text-sm text-center fw-bold text-dark">
                                <div class="row container d-flex justify-content-center">
                                  <div class="col-3">
                                    <i class="fs-5 bi bi-pencil-square cursor-pointer" onclick="toggleBar1()"></i>
                                  </div>
                                  <div class="col-9 addressInfo"><?php echo $data['address'] ?></div>
                                </div>
                                <div class="form-group mb-3 w-70 justify-content-center d-flex container d-none">
                                  <input type="text" class="form-control" name="address" id="contact-address" aria-describedby="emailHelp" placeholder="Nhập vào địa chỉ" value="">
                                </div>
                            </td>
                            <td class="align-middle text-sm text-center fw-bold text-dark emailInfo">
                              <?php echo $data['email'] ?>
                            </td>
                            <td class="align-middle text-sm text-center fw-bold text-dark phoneInfo">
                              <?php echo $data['phonenumber'] ?>
                            </td>
                        </tr>
                        <tr id="rowFix" class="d-none">
                            <td class="align-middle text-sm text-center fw-bold text-dark">
                                <div class="row container d-flex justify-content-center">
                                  <div class="col-3">
                                    <i class="fw-bold fs-5 bi bi-check2-square cursor-pointer" onclick="toggleBar2()"></i>
                                  </div>
                                  <div class="col-9">
                                    <textarea class="form-control" id="addressContact" rows="3"><?php echo $data['address'] ?></textarea>
                                  </div>
                                </div>
                            </td>
                            <td class="align-middle text-sm text-center fw-bold text-dark">
                                  <div class="form-group mb-3 w-70 justify-content-center d-flex container">
                                    <input type="text" class="form-control" name="address" id="emailContact" aria-describedby="emailHelp" placeholder="Nhập vào địa chỉ email" value="<?php echo $data['email'] ?>">
                                  </div>
                            </td>
                            <td class="align-middle text-sm text-center fw-bold text-dark">
                                  <div class="form-group mb-3 w-70 justify-content-center d-flex container">
                                    <input type="text" class="form-control" name="address" id="phoneContact" aria-describedby="emailHelp" placeholder="Nhập số điện thoại" value="<?php echo $data['phonenumber'] ?>">
                                  </div>                               
                            </td>
                        </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
