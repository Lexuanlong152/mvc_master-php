<?php
    if($result != false && $result->num_rows > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            if($i >= 4) break;
            else $i++;
            echo '
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                    <div class="card shadow mb-5 bg-white rounded product">
                        <img src="'.$row['img'].'" class="card-img-top" alt="">
                        <div class="card-body">
                            <a href="Detail?id='.$row['id'].'" class="stretched-link product-link">
                                <h5 class="card-title">'.$row['name'].'</h5>
                            </a>
                            <a href="Search?author='.$row['author'].'" class="author">'.$row['author'].'</a>
                            <div class=" rating d-flex">
                                <div class="rating-star">
                                    <span>★★★★★</span>
                                    <div class="rating-fill" style="width:'.($row['rating']*20).'%;">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                                <div class="rating-num">'.$row['rating'].'</div>
                            </div>
                            <div class="num-users d-flex align-items-center mt-2">
                                <i class="fas fa-users "></i>
                                <div >'.$row['num_users'].'</div>
                            </div>
                            <div class="price mt-2">$'.$row['price'].'</div>
                            ';
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
            echo'
                        </div>
                        <div class="more-info">
                            <h6 class="more-info-title">'.$row['name'].'</h6>
                            <div class="product-intro">'.$row['content'].'</div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>