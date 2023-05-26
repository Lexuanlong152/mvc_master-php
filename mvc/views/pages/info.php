<main id="main">

<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2></h2>
      <ol>
        <li><a href="index.html">Trang chủ</a></li>
        <li>Thông tin</li>
      </ol>
    </div>

  </div>
</section>
<section class="pt-0">
        <?php
            if($data['username']==""){
                echo '
                    <div class="container">
                    <h2>Vui lòng đăng nhập.</h2>
                    </div>
                ';
            }
            else{
                echo '        
            <div class="progress-container p-5">
                <div class="container">
                    <h2 class="mb-4 d-md-block">Xin chào <span class="text-warning">'.$data['username'].'</span>. Chào mừng bạn đến với Code Camp!</h2>
                    <!-- first col -->
                    <div class="container-user-progress row">
                        <div class="col-xs-12 col-lg-4 col-12 px-4 pb-4 box-user">
                            <div class="main-info row">
                                <div class="avatar avatar-xl col-4 mt-3">
                                    <img src="'.$data['img'].'" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <div class="content-info col-7 user-name text-light fw-bold mt-4 fs-4">
                                    '.$data['username'].'
                                </div>
                            </div>
                            <div class="user-progress">
                                <div class="row d-flex justify-content-between">
                                    <span class="user-exp col-3 text-warning fs-5 mt-3">0 EXP</span>
                                    <span class="user-level col-2">
                                        <img src="'.BASEPATH.'/public/assets/img/frame-2.svg" alt="" class="img-fluid">
                                    </span>
                                </div>
                                <div class="progress my-3" style="height:10px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%; height:10px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="level-progress d-flex justify-content-between text-light fw-bold">
                                    <span class="current-level">
                                        Level 1
                                    </span>
                                    <span class="current-process">
                                        0/51
                                    </span>
                                    <span class="next-level">
                                        Level 2
                                    </span>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-xs-12 col-md-7 ms-5 d-none d-lg-block">
                            <div class="wrap-detail ms-2">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-4 col-xs-12 col-sm-4 d-none d-lg-block">
                                        <h4 class="fw-bold">Course</h4>
                                        <div class="detail-progress d-flex justify-content-between">
                                            <span class="result text-warning fs-4">0/19</span>
                                            <span class="result-des d-none d-lg-block">0 certificates</span>
                                        </div>
                                        <div class="progress" style="height:10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%; height:10px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-xs-12 col-sm-4 d-none d-lg-block">
                                        <h4 class="fw-bold">Training</h4>
                                        <div class="detail-progress d-flex justify-content-between">
                                            <span class="result text-warning fs-4">0/19</span>
                                            <span class="result-des d-none d-lg-block">0 certificates</span>
                                        </div>
                                        <div class="progress" style="height:10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;height:10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-xs-12 col-sm-4 d-none d-lg-block">
                                        <h4 class="fw-bold">Course</h4>
                                        <div class="detail-progress d-flex justify-content-between">
                                            <span class="result text-warning fs-4">0/19</span>
                                            <span class="result-des d-none d-lg-block">0 certificates</span>
                                        </div>
                                        <div class="progress" style="height:10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;height: 30px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
        ?>
        <!-- Khoa hoc -->
<div class="container-xxl course-main">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-dsa-tab" data-bs-toggle="tab"  data-bs-target="#nav-dsa" type="button" role="tab" aria-controls="nav-dsa" aria-selected="true">Khóa Học Đề Xuất</button>
          <button class="nav-link" id="nav-web-tab" data-bs-toggle="tab" data-bs-target="#nav-web" type="button" role="tab" aria-controls="nav-web" aria-selected="false">Khóa Học Đã Mua</button>
          <button class="nav-link" id="nav-game-tab" data-bs-toggle="tab" data-bs-target="#nav-game" type="button" role="tab" aria-controls="nav-tab" aria-selected="false">Khóa Học Đã Thích</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-dsa" role="tabpanel" aria-labelledby="nav-dsa-tab">
            <h3 class = "tab-title">Khóa Học Đề Xuất</h3>
            <div class="row product-list">
                    <?php foreach ($data['allCourse'] as $course):?>
                        <?php
                        if($data['checked'][$course['id']]==true){
                                echo '
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                                        <div class="card shadow mb-5 bg-white rounded product">
                                            <img src="'.$course['img'].'" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <a href="Detail?id='.$course['id'].'" class="stretched-link product-link">
                                                    <h5 class="card-title">'.$course['name'].'</h5>
                                                </a>
                                                <a href="Search?author='.$course['author'].'" class="author">'.$course['author'].'</a>
                                                <div class=" rating d-flex">
                                                    <div class="rating-star">
                                                        <span>★★★★★</span>
                                                        <div class="rating-fill" style="width:'.($course['rating']*20).'%;">
                                                            <span>★★★★★</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-num">'.$course['rating'].'</div>
                                                </div>
                                                <div class="num-users d-flex align-items-center mt-2">
                                                    <i class="fas fa-users "></i>
                                                    <div >'.$course['num_users'].'</div>
                                                </div>
                                                <div class="price mt-2">$'.$course['price'].'</div>
                                                ';
                                if($data['username'] == ""){
                                    echo '<span class = "like" onclick="letLogin()" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                                }
                                else {
                                    if (false){
                                        echo '<span class = "like liked" id = "'.$data['userid'].'like'.$course['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="fa fa-heart fa-2x" aria-hidden="true" ></i> </span>';
                                    }
                                    else {
                                        echo '<span class = "like" id = "'.$data['userid'].'like'.$course['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                                    }
                                    
                                }
                                echo'
                                            </div>
                                            <div class="more-info">
                                                <h6 class="more-info-title">'.$course['name'].'</h6>
                                                <div class="product-intro">'.$course['content'].'</div>
                                            </div>
                                        </div>
                                    </div>
                                ';  }              
                            ?>
                    <?php endforeach; ?>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-web" role="tabpanel" aria-labelledby="nav-web-tab"><h3 class = "tab-title">Khóa Học Đã Mua</h3>
                        
            <div class="row product-list">
                <?php
                        foreach ($data['boughtCourse'] as $course):?>
                        <?php
                                echo '
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                                        <div class="card shadow mb-5 bg-white rounded product">
                                            <img src="'.$course['img'].'" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <a href="Detail?id='.$course['id'].'" class="stretched-link product-link">
                                                    <h5 class="card-title">'.$course['name'].'</h5>
                                                </a>
                                                <a href="Search?author='.$course['author'].'" class="author">'.$course['author'].'</a>
                                                <div class=" rating d-flex">
                                                    <div class="rating-star">
                                                        <span>★★★★★</span>
                                                        <div class="rating-fill" style="width:'.($course['rating']*20).'%;">
                                                            <span>★★★★★</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-num">'.$course['rating'].'</div>
                                                </div>
                                                <div class="num-users d-flex align-items-center mt-2">
                                                    <i class="fas fa-users "></i>
                                                    <div >'.$course['num_users'].'</div>
                                                </div>
                                                <div class="price mt-2">$'.$course['price'].'</div>
                                                ';
                                if($data['username'] == ""){
                                    echo '<span class = "like" onclick="letLogin()" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                                }
                                else {
                                    if (false){
                                        echo '<span class = "like liked" id = "'.$data['userid'].'like'.$course['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="fa fa-heart fa-2x" aria-hidden="true" ></i> </span>';
                                    }
                                    else {
                                        echo '<span class = "like" id = "'.$data['userid'].'like'.$course['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                                    }
                                    
                                }
                                echo'
                                            </div>
                                            <div class="more-info">
                                                <h6 class="more-info-title">'.$course['name'].'</h6>
                                                <div class="product-intro">'.$course['content'].'</div>
                                            </div>
                                        </div>
                                    </div>
                                ';                 
                            ?>
                        <?php endforeach; ?>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-game" role="tabpanel" aria-labelledby="nav-game-tab"><h3 class = "tab-title">Khóa Học Đã Thích</h3>
            <div class="row product-list">
                <?php foreach ($data['likedCourse'] as $course):?>
                <?php
                                echo '
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                                        <div class="card shadow mb-5 bg-white rounded product">
                                            <img src="'.$course['img'].'" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <a href="Detail?id='.$course['id'].'" class="stretched-link product-link">
                                                    <h5 class="card-title">'.$course['name'].'</h5>
                                                </a>
                                                <a href="Search?author='.$course['author'].'" class="author">'.$course['author'].'</a>
                                                <div class=" rating d-flex">
                                                    <div class="rating-star">
                                                        <span>★★★★★</span>
                                                        <div class="rating-fill" style="width:'.($course['rating']*20).'%;">
                                                            <span>★★★★★</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-num">'.$course['rating'].'</div>
                                                </div>
                                                <div class="num-users d-flex align-items-center mt-2">
                                                    <i class="fas fa-users "></i>
                                                    <div >'.$course['num_users'].'</div>
                                                </div>
                                                <div class="price mt-2">$'.$course['price'].'</div>
                                                ';
                                if($data['username'] == ""){
                                    echo '<span class = "like" onclick="letLogin()" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                                }
                                else {
                                    if (false){
                                        echo '<span class = "like liked" id = "'.$data['userid'].'like'.$course['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="fa fa-heart fa-2x" aria-hidden="true" ></i> </span>';
                                    }
                                    else {
                                        echo '<span class = "like liked" id = "'.$data['userid'].'like'.$course['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="fa fa-heart fa-2x" aria-hidden="true" ></i> </span>';
                                    }
                                    
                                }
                                echo'
                                            </div>
                                            <div class="more-info">
                                                <h6 class="more-info-title">'.$course['name'].'</h6>
                                                <div class="product-intro">'.$course['content'].'</div>
                                            </div>
                                        </div>
                                    </div>
                                ';                 
                            ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
                           

</section>
</main><!-- End #main -->