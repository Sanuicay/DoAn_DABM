<?php

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
            <a href="homepage_nologin.html"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="homepage_nologin.html">Trang chủ</a>
            <a href="features_product_nologin.php">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="#"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
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
        <div class="search-box">
            <div class="row">
            <input type="text" id="input-box" placeholder="Nhập tên sách cần tìm" autocomplete="off">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="result-box">
            </div>
        </div>
        <script src="js/homepage.js"></script>

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
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>

                    <a href="#">Xem thêm</a>
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
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>

                    <a href="#">Xem thêm</a>
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
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="description">
                            <img src="img/pic1.png" alt="picture 1">
                            <h2>Sách giáo khoa Tiếng Việt</h2>
                            <h3>NXB Giáo Dục</h3>
                            <h4>69.000đ</h4>
                        </div>
                    </div>

                    <a href="#">Xem thêm</a>
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
                            <li><a href="#">Trang chủ</a></li>
                            <br>
                            <li><a href="#">Cửa hàng</a></li>
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
                            <li><a href="#">Thanh toán</a></li>
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