<main id="main">

<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2></h2>
        <ol>
          <li><a href="index.html">Trang chủ</a></li>
          <li>Khóa học của bạn</li>
        </ol>
      </div>

    </div>
  </section>
  <section class="phat-section">
      <!------------------ TODO ------------------>
      <!------------- Write code here! ------------->

    <form class="search" action="" method="GET" name="">
      <div class="search-box shadow">
          <input type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Search" />
          <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
          </button>
      </div>

      <div class="search-select">
        <select class="form-select shadow" aria-label="Default select example" name="category">
          <option selected value="">---Category---</option>
          <option value="DSA">Data Structure & Algorithm</option>
          <option value="web">Web Development</option>
          <option value="Game">Game Development</option>
          <option value="MachineLearning">Machine Learning</option>
        </select>

        <select class="form-select shadow" aria-label="Default select example" name="author">
          <option selected value="">---Author---</option>
          <option value="Phat">Phat</option>
          <option value="Phi">Phi</option>
          <option value="Long">Long</option>
          <option value="Chinh">Chinh</option>
        </select>

        <select class="form-select shadow" aria-label="Default select example" name="rating">
          <option selected value="">---Rating---</option>
          <option value="4"><span>★★★★  </span>(&#8805;4)</option>
          <option value="3"><span>★★★  </span>(&#8805;3)</option>
          <option value="2"><span>★★  </span>(&#8805;2)</option>
          <option value="1"><span>★  </span>(&#8805;1)</option>
        </select>

        <div class="card-group-item">
            <div class="row">
              <div class="form-group col-6">
                <label for="">Min price</label>
                <input type="number" class="form-control shadow" name="min-price" min="0" value="<?php echo isset($_GET['min-price']) ? $_GET['min-price'] : ''; ?>"  placeholder="$0.00">
              </div>
              <div class="form-group col-6">
                  <label for="">Max price</label>
                  <input type="number" class="form-control shadow" name="max-price" min="0" value="<?php echo isset($_GET['max-price']) ? $_GET['max-price'] : ''; ?>" placeholder="$1000.00">
              </div>
            </div>
        </div>
      </div>

    </form>

  <div class="container-xxl course-main">
            <?php
            //set page
              if($data["result"] != false && $data["result"]->num_rows > 0){
                $result_count = $data["result"]->num_rows;
              }
              else{
                $result_count = 0;
              }
              $num_pages = ceil ($result_count / 10);  

              if (!isset ($_GET['searchPage']) ) {  
                $searchPage = 1;  
              } else {  
                $searchPage = $_GET['searchPage'];  
              }

              echo '<div class="w-100 text-end"><i><b>'.number_format($result_count).'</b> results found</i></div>';
              echo '<hr />';

              $result_index = 0;
              $first_index = ($searchPage-1) * 10;
              $last_index = $first_index + 9;

              if ($result_count > 0){
                while ($row = mysqli_fetch_assoc($data["result"])){
                  if($result_index>= $first_index && $result_index <= $last_index){
                    echo '
                      <div class="row p-2 bg-white border rounded shadow search-result">
  
                        <div class="col-md-3 mt-1 d-flex align-items-center">
                          <img class="img-fluid img-responsive rounded product-image" src="'.$row['img'].'">
                        </div>
        
                        <div class="col-md-6 mt-1">
                          <a href="Detail?id='.$row['id'].'" class="stretched-link product-link"><h5 class="card-title"> '.$row['name'].'</h5></a>
                          <a href="Search?author='.$row['author'].'" class="author">'.$row['author'].'</a>
                          <br>
                          <a href="Search?category='.$row['category'].'" class="category">'.$row['category'].'</a>
                          <div class="product-intro">'.$row['content'].'</div>
                        </div>
        
                        <div class="col-md-3 mt-1 search-result-left">
                            <div class=" rating d-flex">
                              <div class="rating-star">
                                <span>★★★★★</span>
                                <div class="rating-fill" style="width:'.($row['rating']*20).'%;">
                                    <span>★★★★★</span>
                                </div>
                              </div>
                              <div class="rating-num">'.$row['rating'].'</div>
                            </div>
                            <div class="num-users d-flex align-items-center mt-3">
                              <i class="fas fa-users "></i>
                              <div>'.$row['num_users'].'</div>
                            </div>
                            <div class="price mt-3">$'.$row['price'].'</div>';
                    if($data['username'] == ""){
                        echo '<span class = "like" onclick="letLogin()" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                    }
                    else {
                        if ($data['likedCourse']!=false && $data['likedCourse'][$row['id']]== 1){
                            echo '<span class = "like liked" id = "'.$data['userid'].'like'.$row['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="fa fa-heart fa-2x" aria-hidden="true" ></i> </span>';
                        }
                        else {
                            echo '<span class = "like" id = "'.$data['userid'].'like'.$row['id'].'" onclick="clickLikeButton(event)" id = "heart"><i class="far fa-heart fa-heart-o fa-2x" aria-hidden="true" ></i> </span>';
                        }
                        
                    }
                    echo '
                        </div>
                      </div>
                    ';
                  }

                $result_index ++;
                } 
              }
              else
                echo 'There were no results for your search. Try searching for something else.';

               
              if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                $link = "https";
              else
                $link = "http";

              $link .= "://";
              $link .= $_SERVER['HTTP_HOST'];
              $link .= $_SERVER['REQUEST_URI'];

              if (isset ($_GET['searchPage']) ) {
                $num_str = $searchPage."";
                $link = substr($link, 0, strlen($link)-6-strlen($num_str));
              }

              echo '
                <div class="search-pagination">
                  <nav aria-label="...">
                      <ul class="pagination">';

              if($searchPage>=2){
                echo '
                  <li class="page-item">
                    <a class="page-link" href="'.$link.'&searchPage='.($searchPage-1).'" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>';
              }
              else{
                echo '
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>';
              }

              $pagLink = "";    
              for ($i=1; $i<=$num_pages; $i++) {   
                if ($i == $searchPage) {   
                    $pagLink .= "
                                <li class='page-item active'>
                                  <span class='page-link'>
                                    $i<span class='sr-only'>(current)</span>
                                  </span>
                                </li>
                                ";
                }               
                else  {   
                    $pagLink .="<li class='page-item'><a class='page-link' href='$link&searchPage=$i'>$i</a></li>";  
                }   
              }
              echo $pagLink;   

              if($searchPage < $num_pages){
                echo '
                      <li class="page-item">
                        <a class="page-link" href="'.$link.'&searchPage='.($searchPage+1).'" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                      ';
              }
              else{
                echo '
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                  ';
              }

              echo '</ul>
                  </nav>
                </div>'; 
            ?>

  </div>
  </section>
</main><!-- End #main -->