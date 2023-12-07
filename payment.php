<?php
include 'connection.php';
$con = mysqli_connect("localhost:3307","root","","doan");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
//get the id of the order from the url
$order_id = $_GET['id'];
//sanitize the id
$order_id = mysqli_real_escape_string($con,$order_id);


//check if the user id is in the sale_order table
$user_id = $_SESSION['user_id'];
$query = "SELECT *
          FROM sale_order
          WHERE sale_ID = '$order_id' AND member_ID = '$user_id';";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 0){
    echo "<script>window.location.href = 'cart.php';</script>";
}

//check if the id is in the order table
$query = "SELECT *
          FROM `order`
          WHERE order_ID = '$order_id';";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 0){
    echo "<script>window.location.href = 'cart.php';</script>";
}

//check payment_status in sale_order table
$query = "SELECT payment_status
          FROM sale_order
          WHERE sale_ID = '$order_id';";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 'Đã thanh toán'){
    echo "<script>window.location.href = 'cart.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/cover-box.css">
</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="header-left-section">
            <a href="login_success.php"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="login_success.php">Trang chủ</a>
            <a href="#">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user_copy.php"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="cart.php"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
            <button class="header-login-button" onclick="redirectToLogout()">
                Đăng xuất
            </button>
            <script>
                function redirectToLogout() {
                // Add code to redirect to the login page
                window.location.href = 'logout.php'; // Replace 'login.html' with the actual URL of your login page
                }
            </script>
        </div>
    </div>

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Thanh toán</p>
    </div>

    <div class="content">
        <div class="side-box">
            <img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar">
            <br>
            <?php
                echo "<p style='font-family: Times New Roman, Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F'>$row[sur_name] $row[last_name]</p>";
                echo "<p style='font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F'>ID: $id</p>";
                if ($id == 00000001)
                {
                    echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Manager</p>";
                }
                else
                {
                    //check if the ID exsist in the employee table
                    $query_ = "SELECT ID
                              FROM employee
                              WHERE ID = $id;";
                    $result_ = mysqli_query($con,$query_);
                    $row_ = mysqli_fetch_assoc($result_);
                    //check number of rows
                    $count = mysqli_num_rows($result_);
                    if ($count == 1)
                    {
                        echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Employee</p>";
                    }
                    else
                    {
                        echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Customer</p>";
                    }
                }
            ?>
            <a href="user_copy.php"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="address.php"><img class="side-box-button" src="img/button_my_address.png" alt="Button2"></a>
            <a href="#"><img class="side-box-last-button" src="img/purchase_history_button.png" alt="Button3"></a>
        </div>
        
        <div class="banner">
            <form method="POST">
                <div class="receipt">
                    <div class="receipt-info">
                        <div class="timer">
                            <!-- make a timer 10 minute count down -->
                            <p>Mã QR hết hạn sau:</p>
                            <div style="display: flex; justify-content: center;">
                                <p id="timer"></p>
                            </div>
                            <script>
                                var countDownDate = new Date().getTime() + 600000;
                                var x = setInterval(function() {
                                    var now = new Date().getTime();
                                    var distance = countDownDate - now;
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("timer").innerHTML = "EXPIRED";
                                        location.reload();
                                    }
                                }, 1000);
                            </script>
                        </div>
                        <div class="info">
                            <p><img src="img/payment_icon_1.png" alt="Service" width="20px" height="20px" style="margin-bottom:5px; margin-right:5px">Dịch vụ</p>
                            <div style="display: flex; justify-content: center;">
                                <p>DABM</p>
                            </div>
                            <p><img src="img/payment_icon_4.png" alt="Money" width="20px" height="20px" style="margin-bottom:5px; margin-right:5px">Số tiền</p>
                            <div style="display: flex; justify-content: center;">
                                <?php
                                    //get the book_ID and quantity from the sale_include table then get the price from the book table and calculate the price
                                    $query = "SELECT book_ID, sale_quantity
                                              FROM sale_include
                                              WHERE sale_ID = '$order_id';";
                                    $result = mysqli_query($con,$query);
                                    $total = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $book_ID = $row['book_ID'];
                                        $quantity = $row['sale_quantity'];
                                        $query_ = "SELECT sale_price
                                                   FROM book
                                                   WHERE book_ID = '$book_ID';";
                                        $result_ = mysqli_query($con,$query_);
                                        $row_ = mysqli_fetch_assoc($result_);
                                        $price = $row_['sale_price'];
                                        $total += $price * $quantity;
                                    }
                                    echo "<p>$total VND</p>";
                                ?>
                            </div>
                            <p><img src="img/payment_icon_2.png" alt="Infor" width="20px" height="20px" style="margin-bottom:5px; margin-right:5px">Thông tin</p>
                            <div style="display: flex; justify-content: center;">
                                <p>Thanh toán cho DABM</p>
                            </div>
                            <p><img src="img/payment_icon_3.png" alt="Money" width="20px" height="20px" style="margin-bottom:5px; margin-right:5px">Mã đơn hàng</p>
                            <div style="display: flex; justify-content: center;">
                                <p><?php echo $order_id; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="image" style="position: relative">
                        <img src="img/momo_logo.png" alt="Momo Logo" width="80px" height="80px" style="position: absolute; top: 15px; right: 15px;">
                        <img src="img/payment_QR.png" alt="QR Code" width="230px" height="230px" style="margin-top: 100px;">
                    </div>
                </div>
            </form>
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