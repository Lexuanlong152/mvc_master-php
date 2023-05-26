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
    <div class="search">
      <form action="./Search" method="GET" name="" class="search-box shadow">
            <input type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Search" />
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
      </form>
    </div>

    <div class="container-xxl course-main mt-3">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-dsa-tab" data-bs-toggle="tab"  data-bs-target="#nav-dsa" type="button" role="tab" aria-controls="nav-dsa" aria-selected="true">DSA</button>
              <button class="nav-link" id="nav-web-tab" data-bs-toggle="tab" data-bs-target="#nav-web" type="button" role="tab" aria-controls="nav-web" aria-selected="false">Web</button>
              <button class="nav-link" id="nav-game-tab" data-bs-toggle="tab" data-bs-target="#nav-game" type="button" role="tab" aria-controls="nav-tab" aria-selected="false">Game</button>
              <button class="nav-link" id="nav-ml-tab" data-bs-toggle="tab" data-bs-target="#nav-ml" type="button" role="tab" aria-controls="nav-tab" aria-selected="false">Machine Learning</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-dsa" role="tabpanel" aria-labelledby="nav-dsa-tab">
                <h3 class = "tab-title">Data Structure and Algorithm</h3>
                <div class="row product-list">
                    <?php
                        $result = $data["dsaCourse"];
                        include "./mvc/core/displayCourseList.php";
                    ?>
                </div>
                <div class="more-button">
                    <button type="button" class="btn btn-outline-primary" onclick="location.href='./Search?category=DSA'" >More...</button>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-web" role="tabpanel" aria-labelledby="nav-web-tab">
                <h3 class = "tab-title">Web Development</h3>
                <div class="row product-list">
                    <?php
                        $result = $data["webCourse"];
                        include "./mvc/core/displayCourseList.php";
                    ?>
                </div>
                <div class="more-button">
                    <button type="button" class="btn btn-outline-primary" onclick="location.href='./Search?category=Web'">More...</button>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-game" role="tabpanel" aria-labelledby="nav-game-tab">
                <h3 class = "tab-title">Game Development</h3>
                <div class="row product-list">
                    <?php
                        $result = $data["gameCourse"];
                        include "./mvc/core/displayCourseList.php";
                    ?>
                </div>
                <div class="more-button">
                    <button type="button" class="btn btn-outline-primary" onclick="location.href='./Search?category=Game'">More...</button>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-ml" role="tabpanel" aria-labelledby="nav-ml-tab">
                <h3 class = "tab-title">Machine Learning</h3>
                <div class="row product-list">
                    <?php
                       $result = $data["mlCourse"];
                       include "./mvc/core/displayCourseList.php";
                    ?>
                </div>
                <div class="more-button">
                    <button type="button" class="btn btn-outline-primary" onclick="location.href='./Search?category=MachineLearning'">More...</button>
                </div>
            </div>

        </div>
    </div>
    </section>
  </main><!-- End #main -->