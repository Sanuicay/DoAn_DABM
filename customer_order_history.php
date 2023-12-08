<?php
include 'connection.php';
$con = mysqli_connect("localhost:3307","root","","doan");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// when click on the purchase button
if (isset($_POST['purchase'])) {
    $order_ID = $_POST['order_ID'];
    // check if the order is paid or not
    $query = "  SELECT *
                FROM sale_order
                WHERE sale_ID = '$order_ID' AND payment_status = 'Đã thanh toán';";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('Đơn hàng đã được thanh toán trước đó!');</script>";
    } else {
        // redirect to the payment page
        header("Location: payment.php?id=$order_ID");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/customer_order_history.css">
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
        <p class="box-text">Lịch sử giao dịch</p>
        <div>
            <a href="user_copy.php">Cá nhân</a>
            <a href="customer_order_history.php">> Lịch sử giao dịch</a>
        </div>
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
            <a href="customer_order_history.php"><img class="side-box-last-button" src="img/purchase_history_button.png" alt="Button3"></a>
        </div>
        
        <div class="banner">
            <form method="POST">
                <div class="order-info">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Mã hóa đơn</th>
                            <th>Thành tiền</th>
                            <th>Trạng thái</th>
                            <th>Tinh trạng thanh toán</th>
                            <th>Hành động</th>
                        </tr>
                        <?php
                            $user_ID = $_SESSION['user_id'];
                            $query = "  SELECT 
                                            o.order_ID, 
                                            o.order_date, 
                                            o.order_info, 
                                            b.book_name, 
                                            b.sale_price, 
                                            so.payment_status,
                                            si.sale_quantity
                                        FROM 
                                            `order` AS o
                                        JOIN 
                                            sale_order AS so ON o.order_ID = so.sale_ID
                                        JOIN 
                                            sale_include AS si ON so.sale_ID = si.sale_ID
                                        JOIN 
                                            book AS b ON si.book_ID = b.book_ID
                                        WHERE 
                                            so.member_ID = $user_ID AND
                                            o.order_ID LIKE 'ONL%'
                                        ORDER BY 
                                            o.order_date DESC,
                                            o.order_ID ASC;";
                            $result = mysqli_query($con, $query);
                            $count = mysqli_num_rows($result);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $order_info_parts = explode(',', $row['order_info']);
                                $info = trim($order_info_parts[1]); 
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td style='text-align: left;'>" . $row['book_name'] . "</td>";
                                echo "<td>" . $row['sale_quantity'] . "</td>";
                                echo "<td>" . $row['order_date'] . "</td>";
                                echo "<td>" . $row['order_ID'] . "</td>";
                                echo "<td>" . $row['sale_price'] * $row['sale_quantity'] . " VND</td>";
                                echo "<td>" . $info . "</td>";
                                echo "<td>" . $row['payment_status'] . "</td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='order_ID' value='" . $row['order_ID'] . "'>";
                                echo "<td> <input type='submit' name='purchase' value='Thanh toán'> </td>";
                                echo "</form>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                    </table>
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