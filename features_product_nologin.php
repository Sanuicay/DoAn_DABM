<?php

$mysqli = require __DIR__ . "/database.php";

session_start();

if (isset($_SESSION["user_id"])) {
    
    header("Location: features_product_login.php");
}

$sql = "SELECT book_name, img_path, sale_price, publisher_name, display_status, book.book_ID, genre.genre_name
            FROM book, publisher, belongs_to, genre
            WHERE book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND book.deleted_tag = 0";

$book = mysqli_query($mysqli, $sql);

    $sql = "SELECT book_name, img_path, sale_price, publisher_name, display_status, book.book_ID, genre.genre_name
            FROM book, publisher, belongs_to, genre
            WHERE book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND genre.genre_ID = '01' AND book.deleted_tag = 0";

    $book_giaokhoa = mysqli_query($mysqli, $sql);

    $sql = "SELECT book_name, img_path, sale_price, publisher_name, display_status, book.book_ID, genre.genre_name
            FROM book, publisher, belongs_to, genre
            WHERE book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND genre.genre_ID = '02' AND book.deleted_tag = 0";

    $book_cotich = mysqli_query($mysqli, $sql);   

    $sql = "SELECT book_name, img_path, sale_price, publisher_name, display_status, book.book_ID, genre.genre_name
            FROM book, publisher, belongs_to, genre
            WHERE book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND genre.genre_ID = '03' AND book.deleted_tag = 0";

    $book_tieuthuyet = mysqli_query($mysqli, $sql);  
?>


<!-- html section -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
            <title>My website</title>
        <link rel="stylesheet" href="css/style_duong.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/cover-box.css">
        <link rel="stylesheet" href="css/default_homepage.css">
        <script src="https://kit.fontawesome.com/2b6ded1a1f.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <!-- header  -->
        <div class="header">
        <div class="header-left-section">
            <a href="homepage.php"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="homepage.php">Trang chủ</a>
            <a href="features_product_nologin.php">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a onclick="redirectToLoginPage()" href="#"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <button id="toggleBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
        </div>

        <button class="header-login-button" onclick="redirectToLoginPage()">
            Đăng nhập
        </button>
        <script>
            function redirectToLoginPage() {
            // Add code to redirect to the login page
            window.location.href = 'login.php'; // Replace 'login.html' with the actual URL of your login page
            }
        </script>
        </div>


        <!-- search bar -->
        <div id="hiddenElement" class="hidden">
            <div class="search-box">
                <div class="row">
                <input type="text" id="input-box" placeholder="Nhập tên sách cần tìm" autocomplete="off">
                <button onclick="searchButton()"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="result-box">
                </div>
            </div>
            <script src="js/homepage.js"></script>
        </div>

        <!-- features categories -->
        <!-- features categories -->
        <div class="categories">
            <h2 class="features-title">Sản phẩm</h2>

            <div class="small-container">
                <div class="row row-2">
                    <h2>Tuyển tập Best Sellers</h2>
                    <!-- <select>
                        <option>Mặc định</option>
                        <option>Sắp xếp theo giá</option>
                        <option>Sắp xếp theo số lượng mua</option>
                    </select> -->
                </div>

                <div class="row">
                    <?php
                        $count = 1;
                        while($row = mysqli_fetch_assoc($book)){
                            if ($row['display_status'] == "Available") {
                                if ($count <= 4) {
                    ?>
                    <div onclick="selectProduct(<?php echo $row['book_ID'] ?>)" class="item1 col-4">
                        <div class="description">
                            <img src="<?php echo $row["img_path"];?>" alt="">
                            <h2><?php echo $row["book_name"];?></h2>
                            <h3><?php echo $row["publisher_name"];  ?></h3>
                            <h4><?php echo number_format($row["sale_price"], 0, ',', ' '); ?>đ</h4>
                        </div>
                    </div>
                    <?php
                            $count = $count + 1;
                            }
                            else { 
                    ?>
                                <div onclick="selectProduct(<?php echo $row['book_ID'] ?>)" class=" item1 hidden col-4 ">
                                    <div class="description">
                                        <img src="<?php echo $row["img_path"];?>" alt="">
                                        <h2><?php echo $row["book_name"];?></h2>
                                        <h3><?php echo $row["publisher_name"];  ?></h3>
                                        <h4><?php echo number_format($row["sale_price"], 0, ',', ' '); ?>đ</h4>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    
                    <button type="button" id="seeMoreBtn1" name="seeMoreBtn" class="seeMoreBtn">Xem thêm</button>
                </div>

                <div class="row row-2">
                    <h2>Sách Giáo khoa - Tham khảo</h2>
                    <!-- <select>
                        <option>Mặc định</option>
                        <option>Sắp xếp theo giá</option>
                        <option>Sắp xếp theo số lượng mua</option>
                    </select> -->
                </div>
                <div class="row">
                    <?php
                        $count = 1;
                        while($row = mysqli_fetch_assoc($book_giaokhoa)){
                            if ($row['display_status'] == "Available") {
                                if ($count <= 4) {
                    ?>
                    <div onclick="selectProduct(<?php echo $row['book_ID'] ?>)" class="item2 col-4">
                        <div class="description">
                            <img src="<?php echo $row["img_path"];?>" alt="">
                            <h2><?php echo $row["book_name"];?></h2>
                            <h3><?php echo $row["publisher_name"];  ?></h3>
                            <h4><?php echo number_format($row["sale_price"], 0, ',', ' '); ?>đ</h4>
                        </div>
                    </div>
                    <?php
                            $count = $count + 1;
                            }
                            else { 
                    ?>
                                <div onclick="selectProduct(<?php echo $row['book_ID'] ?>)" class=" item2 hidden col-4 ">
                                    <div class="description">
                                        <img src="<?php echo $row["img_path"];?>" alt="">
                                        <h2><?php echo $row["book_name"];?></h2>
                                        <h3><?php echo $row["publisher_name"];  ?></h3>
                                        <h4><?php echo number_format($row["sale_price"], 0, ',', ' '); ?>đ</h4>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    
                    <button type="button" id="seeMoreBtn2" name="seeMoreBtn" class="seeMoreBtn">Xem thêm</button>
                </div>

                <div class="row row-2">
                    <h2>Sách Tiểu thuyết</h2>
                    <!-- <select>
                        <option>Mặc định</option>
                        <option>Sắp xếp theo giá</option>
                        <option>Sắp xếp theo số lượng mua</option>
                    </select> -->
                </div>
                <div class="row">
                    <?php
                        $count = 1;
                        while($row = mysqli_fetch_assoc($book_tieuthuyet)){
                            if ($row['display_status'] == "Available") {
                                if ($count <= 4) {
                    ?>
                    <div onclick="selectProduct(<?php echo $row['book_ID'] ?>)" class="item3 col-4">
                        <div class="description">
                            <img src="<?php echo $row["img_path"];?>" alt="">
                            <h2><?php echo $row["book_name"];?></h2>
                            <h3><?php echo $row["publisher_name"];  ?></h3>
                            <h4><?php echo number_format($row["sale_price"], 0, ',', ' '); ?>đ</h4>
                        </div>
                    </div>
                    <?php
                            $count = $count + 1;
                            }
                            else { 
                    ?>
                                <div onclick="selectProduct(<?php echo $row['book_ID'] ?>)" class=" item3 hidden col-4 ">
                                    <div class="description">
                                        <img src="<?php echo $row["img_path"];?>" alt="">
                                        <h2><?php echo $row["book_name"];?></h2>
                                        <h3><?php echo $row["publisher_name"];  ?></h3>
                                        <h4><?php echo number_format($row["sale_price"], 0, ',', ' '); ?>đ</h4>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    
                    <button type="button" id="seeMoreBtn3" name="seeMoreBtn" class="seeMoreBtn">Xem thêm</button>
                </div>

            </div>

            <!-- <div class="page-button">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>&#8594</span>
            </div> -->
        </div>


        <!-- footer -->
        <div class="footer">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 item">
                            <h3><img class="footer-logo" src="img/logo_DABM_2.png" alt="Logo"></h3>
                            <ul>
                                <br>
                                <li>268 Lý Thường Kiệt, phường 14, quận</li>
                                <li>10, TP Hồ Chí Minh, Việt Nam</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-2 item">
                            <h3>LIÊN KẾT</h3>
                            <ul>
                                <br>
                                <li><a href="login_success.php">Trang chủ</a></li>
                                <br>
                                <li><a href="features_product_login.php">Cửa hàng</a></li>
                                <br>
                                <li><a href="#">Giới thiệu về DABM</a></li>
                                <br>
                                <li><a href="#">Liên hệ</a></li>
                                <br>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-2 item">
                            <h3>VỀ DABM</h3>
                            <ul>
                                <br>
                                <li><a href="#">Điều khoản</a></li>
                                <br>
                                <li><a href="customer_order_history.php">Thanh toán</a></li>
                                <br>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <h3>NHẬN THÔNG BÁO QUA EMAIL</h3>
                            <ul>
                                <br>
                                <div class="p-1 rounded border">
                                    <div class="input-group">
                                        <input type="email" placeholder="Nhập email của bạn" class="form-control border-0 shadow-0">
                                        <div class="input-group-append">
                                            <a class="email_signup_button" href="index.html">ĐĂNG KÝ</a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <p>
                        <div style="display: flex; justify-content: space-between; opacity:1; font-size:13px; margin-bottom:0;">
                        <div style="text-align: left;">2023 DABM. Tất cả các quyền được bảo lưu</div>
                        <div style="text-align: right;">Quốc gia & Khu vực: Việt Nam</div>
                    </div></p>
                </div>
            </footer>
        </div>
    </body>
</html>