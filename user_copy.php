<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","doan");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$id = $_GET['id'];
$query = "SELECT sur_name, last_name, phone_num, email, username, password, user_info
          FROM user
          WHERE ID = $id;";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/cover-box.css">
</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="header-left-section">
            <a href="index.html"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="index.html">Trang chủ</a>
            <a href="#">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user.html"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
        </div>
    </div>

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Thông tin cá nhân</p>
        <div>
            <a href="user.html">Cá nhân</a>
            <a href="user.html">> Thông tin cá nhân</a>
        </div>
    </div>

    <div class="content">
    <div class="side-box">
            <a href="#"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p> -->
            <?php
                echo "<p style='font-family: Times New Roman, Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F'>$row[sur_name] $row[last_name]</p>";
                echo "<p style='font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F'>ID: $id</p>";
            ?>
            <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p>
            <a href="#"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="list_of_book2.html"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.html"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="#"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="body-container">
            <div class="profile">
                <h2>Hồ Sơ Của Tôi</h2>
                <form>
                    <div class="name">
                        <div>
                            <?php
                                echo "<label for='ho'>Họ:</label>";
                                echo "<input type='text' placeholder='$row[sur_name]' id='ho' name='ho'>";
                            ?>
                        </div>
                        <div>
                            <?php
                                echo "<label for='ten'>Tên:</label>";
                                echo "<input type='text' placeholder='$row[last_name]' id='ten' name='ten'>";
                            ?>
                        </div>
                    </div>
                    <br>
                    <?php
                        echo "<label for='email'>Email:</label>";
                        echo "<input type='email' placeholder='$row[email]' id='email' name='email'><br>";
                        echo "<label for='phone'>Số Điện Thoại:</label>";
                        echo "<input type='tel' placeholder='$row[phone_num]' id='phone' name='phone'><br>";
                        echo "<label for='info'>Thông tin thêm:</label>";
                        echo "<input type='info' placeholder='$row[user_info]' id='info' name='info'><br>";
                    ?>
                            <!-- <label for="ho">Họ:</label>
                            <input type="text" id="ho" name="ho">
                        </div>
                        <div>
                            <label for="ten">Tên:</label>
                            <input type="text" id="ten" name="ten">
                        </div>
                    </div>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"><br>
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" id="phone" name="phone"><br>
                    <label for="info">Thông tin thêm:</label>
                    <input type="info" id="info" name="info"><br> -->
                </form>
            </div>
            <div class="account-info">
                <h2>Thông Tin Tài Khoản</h2><br>
                <form>
                    <div class="form-group">
                        <?php
                            echo "<label for='username'>Tên Đăng Nhập:</label>";
                            echo "<b>$row[username]</b>";
                        ?>
                        <!-- <label for="username">Tên Đăng Nhập:</label>
                        <b>username</b> -->
                    </div>
                    <div class="form-group">
                        <?php
                            echo "<label for='ID'>ID:</label>";
                            echo "<b>$id</b>";
                        ?>
                        <!-- <label for="ID">ID:</label>
                        <b>ID</b> -->
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray"><br>
                <form>
                    <div class="form-group">
                        <label for="old-password">Mật Khẩu Cũ:</label><br>
                        <input type="password" id="old-password" name="old-password"><br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="new-password">Mật Khẩu Mới:</label><br>
                        <input type="password" id="new-password" name="new-password"><br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận Mật Khẩu Mới:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password"><br>
                    </div>                  
                    <input type="submit" value="Thay Đổi">
                </form>
            </div>

            <script>
                // Check if there's a saved value when the page loads
                document.getElementById('ho').value = localStorage.getItem('ho') || '';
                document.getElementById('ten').value = localStorage.getItem('ten') || '';
                document.getElementById('email').value = localStorage.getItem('email') || '';
                document.getElementById('phone').value = localStorage.getItem('phone') || '';
                document.getElementById('info').value = localStorage.getItem('info') || '';
                
                // Save the value whenever it changes
                document.getElementById('ho').addEventListener('input', function() {
                    localStorage.setItem('ho', this.value);
                });
                document.getElementById('ten').addEventListener('input', function() {
                    localStorage.setItem('ten', this.value);
                });
                document.getElementById('email').addEventListener('input', function() {
                    localStorage.setItem('email', this.value);
                });
                document.getElementById('phone').addEventListener('input', function() {
                    localStorage.setItem('phone', this.value);
                });
                document.getElementById('info').addEventListener('input', function() {
                    localStorage.setItem('info', this.value);
                });
            </script>
        </div>
    </div>
    <!-- content goes here -->

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