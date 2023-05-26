<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.html">Trang chủ</a></li>
            <li>Thông tin khóa học</li>
          </ol>
        </div>

      </div>
    </section>
    <section class="pt-0">
        <!------------------ TODO ------------------>
        <!------------- Write code here! ------------->
        <div class="top-content container-fluid mt-5">
        <div class="row container">
            <!-- menu dọc -->
            <div class="col-md-1">

            </div>
            <!-- content -->
            <div class="col-md-8">
            <div class="okela">
                  <h1 class="text-dark"><?php echo htmlspecialchars($data['course']['name']) ?> </h1>
                  <div class="text-white"><?php echo htmlspecialchars($data['course']['content']) ?></div>
                  <!-- nội dung sẽ được học -->
                  <h3 class="mt-4 multi-column text-warning">Bạn sẽ học được gì?</h3>
                  <div class="row mt-3 text-white">
                    <?php foreach(explode(';',$data['introcourse']['output_course']) as $ing) { ?>
                        <div class="col-md-6">
                            <i class="fas fa-check" style="color: red;"></i> <?php echo htmlspecialchars($ing) ?>
                        </div>                  
                    <?php } ?>
                  </div>
            </div>
                

                <!-- nội dung bài học -->
                <div class="content">
                    <div class="mt-2">
                        <section class="content">
                            <h3>Nội dung khóa học</h3>
                            <div>
                                <div class="training_time">
                                    <span><span> <?php echo htmlspecialchars($data['introcourse']['part']) ?></span> phần</span>
                                    <span>.</span>
                                    <span><span> <?php echo htmlspecialchars($data['introcourse']['num_lessons']) ?></span> bài học</span>
                                    <span class="card-right" data-toggle="collapse" data-target=".multicollapse" aria-expanded="false" aria-controls="collapse1 collapse2">
                                        <strong> Mở rộng tất cả</strong>
                                    </span>
                                </div>
                            </div>
                        </section>

                    </div>
                    
                    <div class="card mt-1">
                      <?php foreach(explode(';',$data['introcourse']['list_part']) as $part) {
                          $split_part = explode(".",$part);
                          $index_part = $split_part[0];
                          echo '
                          <div class="card-header" id="heading'.$index_part.'" data-toggle="collapse" data-target="#collapse'.$index_part.'" aria-expanded="false" aria-controls="collapse'.$index_part.'">
                            <i class="fa " aria-hidden="true"></i>
                            <span>'.$part.'</span>
                          </div>
                          ';
                          echo '<div id="collapse'.$index_part.'" class="collapse multicollapse" aria-labelledby="heading'.$index_part.'">';
                          foreach(explode(';',$data['introcourse']['list_lessons']) as $lesson) {
                              $split_lesson = explode(".",$lesson);
                              $index_part_of_lesson = $split_lesson[0];
                              if($index_part_of_lesson == $index_part){
                                echo '
                                
                                  <div class="card-body">
                                      <i class="fas fa-play-circle"></i>
                                      <span>'.$lesson.'</span>
                                  </div>
                                
                                ';                             
                              }
                          }
                          echo '</div>';
                      }
                      ?>    
                        
                        
                    </div>     
                    
                    
                </div>

                <!-- yêu cầu -->
                <div class="require">
                    <h3>Yêu cầu</h3>
                    <ul class="list-unstyled">
                      <?php foreach(explode(';',$data['introcourse']['course_require']) as $ing) { ?>
                        <li>
                              <i class="fas fa-check" style="color: red;"></i> <?php echo htmlspecialchars($ing) ?>
                        </li>               
                      <?php } ?>                       
                    </ul>
                </div>
                

                    <!-- Rating -->

    <div class="">
      <h3 class="">Đánh giá</h3>
  
      <?php
      if($data['username'] == ""){
        echo '<div class="alert alert-warning" role="alert">
                <a href="#" class="alert-link">Đăng nhập</a> để thực hiện chức năng này.
              </div>
              <div class="stars d-none">';
      }
      else {
        echo '<div class="alert alert-warning d-none" role="alert">
                <a href="#" class="alert-link">Đăng nhập</a> để thực hiện chức năng này.
            </div>
            <div class="stars">';
  
        
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
          $link = "https";
        else
          $link = "http";
  
        $link .= "://";
        $link .= $_SERVER['HTTP_HOST'];
        $link .= $_SERVER['REQUEST_URI'];
      }
      ?>
  
      <?php  
        if ($data['rating'] != false && $data['rating']->num_rows > 0){
          $rating_row = mysqli_fetch_assoc($data['rating']);
          $current = $rating_row['rating'];
        }
        else{
          $current = 0;
        }
       ?>
            <form action="./Detail/rating" method="POST"> 
                <input class = "d-none" type="radio" name="star" value="0" <?php if($current == 0) echo "checked";?>/>
                <input class="star star-5" id="star-5" type="radio" name="star" value="5" <?php if($current == 5) echo "checked";?>/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" value="4" <?php if($current == 4) echo "checked";?>/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" value="3" <?php if($current == 3) echo "checked";?>/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" value="2" <?php if($current == 2) echo "checked";?>/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" value="1" <?php if($current == 1) echo "checked";?>/>
                <label class="star star-1" for="star-1"></label>
                <input type="hidden" name="user-id" value="<?php echo $data['userid'];?>" />
                <input type="hidden" name="course-id" value="<?php echo $_GET['id'];?>" />
                <input type="hidden" name="course-link" value="<?php echo $link;?>" />
                <input class="btn btn-primary mb-3" type="submit" value="Submit">
                <input class="btn btn-secondary mb-3" type="reset" value="Reset">
            </form>
        <?php
                  if ($data['rating'] != false && $data['rating']->num_rows > 0){
                    
                    echo '<div class="alert alert-success" role="alert">
                            Bạn đã đánh giá '.$current.' sao cho bài học này
                          </div>
                        ';
                  }
                  else{
                    echo '<div class="alert alert-secondary" role="alert">
                      Bạn chưa đánh giá cho bài học này
                      </div>
                    ';
                  }
  
            ?>
            </div>
            <!-- End rating -->
            <!-- Bình luận -->
            <div class="">
              <h3>Bình luận</h3>
              <div class="row mt-5">
                  <div class="col-md-12">
                      <textarea class="w-100" name="comment" id="mainComment" cols="100" rows="3" placeholder="Thêm bình luận"></textarea>
                      <button class="btn btn-primary float-end mt-2" id="addCmt" onclick="isReply=false;">Thêm</button>
                  </div>
              </div>
              <div class="row bg-white mt-2 rounded">
                      <div class="system col-md-12">
                          <h4 class="fw-bold d-none" id="numComment"><?php echo $data['numComments'] ?> Comments</h4>
                          <div class="userComment">

                          </div>
                      </div>
              </div>
              <div class="row replyRow" style="display:none;">
                  <div class="col-md-12">
                      <textarea class="form-control" name="" id="replyComment" cols="30" rows="2"></textarea><br/>
                      <button class="btn btn-danger float-end" onclick="$('.replyRow').hide();">Huỷ</button>
                      <button class="btn btn-primary float-end" id="addReply" onclick="isReply=true;">Phản hồi</button>
                  </div>
              </div>
            </div>
            <!-- End comment -->
            </div>
            <!-- card giá sản phẩm -->
          </div>
          <div class="col-md-3 d-none d-md-block">
              <div class="card " style="width: 18rem;">
                  <img class="card-img-top" src="<?php echo htmlspecialchars($data['course']['img'])?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title"><span> <?php echo htmlspecialchars($data['course']['name']) ?></span></h5>
                      <p class="card-text">
                          <div class=" rating d-flex">
                            <div class="rating-star">
                                <span>★★★★★</span>
                                <!-- width:'.($row['rating']*20).'%; -->
                                    <div class="rating-fill" style="width:<?php echo $data['course']['rating']*20 ?>%">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                              <div class="rating-num"><?php echo $data['course']['rating'] ?></div>
                          </div>
                          <div class="num-users d-flex align-items-center mt-2">
                                <i class="fas fa-users "></i>
                                <div ><?php echo $data['course']['num_users'] ?></div>
                          </div>
                          <div class=" d-flex align-items-center mt-2" ><span><i class="fas fa-chalkboard"></i><span> Tổng số </span>  <strong><span> <?php echo " ".$data['introcourse']['num_lessons']." " ?></span></strong> <span> bài học</span></span></div>
                          <div class=" d-flex align-items-center mt-2">Học mọi lúc mọi nơi</div>
                      </p>
                      <a href="<?php if($data['username']=="") echo 'Login';
                          else if($data['bought']==false){
                            echo "Pay?id=".$data['courseid'];
                          }
                          else echo  "#";
                        ?>"
                         class="btn btn-block btn-primary">
                         <?php 
                            if($data['bought']==false){
                              echo "$".$data['course']['price'];
                            }   
                            else echo "Học ngay!";
                         ?>
                         </a>
                  </div>
              </div>
          </div>
    </div>


    </div>    
    </section>
</main>