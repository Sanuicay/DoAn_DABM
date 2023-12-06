<?php
include 'connection.php';
$con = mysqli_connect("localhost:3307","root","","doan");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
//get the id of the product
$product_id = $_GET['id'];
//sanitize the id before using in the query
$product_id = mysqli_real_escape_string($con, $product_id);

//when click on the confirm button -> insert data into order table
if (isset($_POST['confirm'])) {
    $order_ID = $_POST['order_ID'];
    $order_date = date("Y-m-d");
    $payment = $_POST['payment'];
    $order_status = $_POST['order_status'];
    $note = $_POST['note'];
    //check if the order_ID exsist in the order table
    $query = "SELECT order_ID
            FROM `order`
            WHERE order_ID = '$order_ID';";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Đặt hàng thất bại! Vui lòng thử lại.');</script>";
        echo "<script>window.location.href='customer_create_order.php?id=$product_id';</script>";
    }
    else {
        // order_info = $payment + $order_status + $note
        $sql = "INSERT INTO `order` (order_ID, order_date, order_info)
                VALUES ('$order_ID', '$order_date', '$payment, $order_status, $note');";
        $result = mysqli_query($con, $sql);
        if ($result) {
            //set order_ID flag to true
            $order_ID_flag = true;
        } else {
            echo "<script>alert('Đặt hàng thất bại! Vui lòng thử lại.');</script>";
            echo "<script>window.location.href='customer_create_order.php?id=$product_id';</script>";
        }
    }
    //check if the order_ID_flag is true
    if ($order_ID_flag) {
        $user_ID = $_SESSION['user_id'];
        //insert data into sale_order table include sale_ID, delivery_date, delivery_address, payment_status, member_ID, employee_ID = 20010101
        $delivery_address = $_POST['address'];
        $payment_status = $_POST['payment_status'];
        $query = "INSERT INTO sale_order (sale_ID, delivery_date, delivery_address, payment_status, member_ID, employee_ID)
                VALUES ('$order_ID', '$order_date', '$delivery_address', '$payment_status', '$user_ID', 20010101);";
        $result = mysqli_query($con, $query);
        if ($result) {
            // set sale_ID flag to true
            $sale_ID_flag = true;
        } else {
            echo "<script>alert('Đặt hàng thất bại! Vui lòng thử lại.');</script>";
            echo "<script>window.location.href='customer_create_order.php?id=$product_id';</script>";
        }
    }

    //check if the sale_ID_flag is true
    if ($sale_ID_flag) {
        //insert data into sale_include table include sale_ID, book_ID, sale_quantity
        $user_ID = $_SESSION['user_id'];
        $sql = "SELECT book_ID, cart_quantity
                FROM cart_include
                WHERE ID = $user_ID AND book_ID = $product_id;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $book_ID = $row['book_ID'];
            $sale_quantity = $row['cart_quantity'];
            $query = "INSERT INTO sale_include (sale_ID, book_ID, sale_quantity)
                    VALUES ('$order_ID', '$book_ID', '$sale_quantity');";
            $result = mysqli_query($con, $query);
            if ($result) {
                // if payment = shipCOD
                if ($payment == 'shipCOD') {
                    //delete data from cart_include table
                    $sql = "DELETE FROM cart_include
                            WHERE ID = $user_ID AND book_ID = $product_id;";
                    $result = mysqli_query($con, $sql);
                    echo "<script>alert('Đặt hàng thành công!');</script>";
                    echo "<script>window.location.href='cart.php';</script>";
                } else {
                    // redirect to payment.php?id=$order_ID
                    echo "<script>window.location.href='payment.php?id=$order_ID';</script>";
                }
            } else {
                echo "<script>alert('Đặt hàng thất bại! Vui lòng thử lại.');</script>";
                echo "<script>window.location.href='customer_create_order.php?id=$product_id';</script>";
            }
        }
    }
}

    
//when click on the cancel button -> redirect to cart.php
if (isset($_POST['cancel'])) {
    header('Location: cart.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/customer_create_order.css">
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
        <p class="box-text">Chi tiết đơn hàng</p>
        <div>
            <a href="user_copy.php">Cá nhân</a>
            <a href="#">> Lịch sử giao dịch</a>
            <a>> Chi tiết hóa đơn </a>
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
            <a href="#"><img class="side-box-last-button" src="img/purchase_history_button.png" alt="Button3"></a>
        </div>
        
        <div class="banner">
            <div class="order-title">Thông tin hóa đơn</div>
            <form method="POST">
                <div class="order-info">
                    <table>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <?php
                                $sql = "SELECT MAX(CAST(SUBSTRING(order_ID, 4) AS UNSIGNED)) AS max_order_ID
                                        FROM `order`;";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $order_ID = 'ONL' . ($row['max_order_ID'] + 1);
                                echo "<td><input type='text' name='order_ID' id='order_ID' value='$order_ID' readonly></td>";
                            ?>
                            <td></td>
                            <th>Phương thức thanh toán</th>
                            <td><select name="payment" id="payment">
                                <option value="shipCOD">Thanh toán khi nhận hàng</option>
                                <option value="online">Thanh toán online</option>
                            </select></td>
                        </tr>
                        <tr>
                            <th>Trạng thái đơn hàng</th>
                            <td><input type="text" name="order_status" id="order_status" value="Đang chờ duyệt" readonly></td>
                            <td></td>
                            <th>Tình trạng thanh toán</th>
                            <td><input type="text" name="payment_status" id="payment_status" value="Chưa thanh toán" readonly></td>
                        </tr>
                    </table>
                </div>
                <div class="title">
                    <table>
                        <tr>
                            <th><div class="left-title">Khách hàng</div></th>
                            <th>Tổng hóa đơn</th>
                        </tr>
                    </table>
                </div>
                <div class="customer-info">
                    <table>
                        <?php
                            $user_ID = $_SESSION['user_id'];
                            $sql = "SELECT sur_name, last_name, phone_num
                            FROM user
                            WHERE ID = $user_ID" ;
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<th>Khách hàng</th>";
                                echo "<td>" . $row['sur_name'] . " " . $row['last_name'] . "</td>";
                                echo "<th></th>";
                            }
                        ?>
                        <?php
                            $user_ID = $_SESSION['user_id'];
                            $sql = "SELECT book_name, sale_price, cart_quantity
                            FROM book, cart_include
                            WHERE book.book_ID = cart_include.book_ID AND cart_include.book_ID = $product_id AND cart_include.ID = $user_ID" ;
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subtotal = $row['sale_price'] * $row['cart_quantity'];
                                    echo "<th>Tổng</th>";
                                    echo "<td>" . $subtotal . " VND</td>";
                                    echo "</tr>";
                                }
                            } else {
                                //redirect to cart.php
                                echo "<script>window.location.href='cart.php';</script>";
                            }
                        ?>
                        <?php
                            echo "<tr>";
                            echo "<th>Địa chỉ</th>";
                        ?>
                        <?php
                            // <select name="address" id="address">
                            echo "<td><select name='address' id='address'>";
                            $user_ID = $_SESSION['user_id'];
                            $sql = "SELECT address
                                    FROM delivery_address
                                    WHERE ID = $user_ID" ;
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['address']}'>{$row['address']}</option>";
                            }
                            echo "</select><br>"
                        ?>
                        <?php
                            $user_ID = $_SESSION['user_id'];
                            $sql = "SELECT sur_name, last_name, phone_num
                            FROM user
                            WHERE ID = $user_ID" ;
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Số điện thoại</th>";
                                echo "<td>" . $row['phone_num'] . "</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th>Ghi chú</th>";
                                echo "<td><input type='text' name='note' id='note'></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class="title">
                    <table>
                        <tr>
                            <th><div class="left-title">Sản phẩm</div></th>
                        </tr>
                    </table>
                </div>
                <?php
                    $user_ID = $_SESSION['user_id'];
                    $sql = "SELECT book_name, sale_price, cart_quantity
                    FROM book, cart_include
                    WHERE book.book_ID = cart_include.book_ID AND cart_include.book_ID = $product_id AND cart_include.ID = $user_ID" ;
                    $result = mysqli_query($con, $sql);
                ?>
                <div class="product">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng phụ</th>
                        </tr>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $subtotal = $row['sale_price'] * $row['cart_quantity'];
                                echo "<tr>";
                                echo "<td>" . $row['book_name'] . "</td>";
                                echo "<td>" . $row['sale_price'] . " VND</td>";
                                echo "<td>" . $row['cart_quantity'] . "</td>";
                                echo "<td>" . $subtotal . " VND</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class="button-container">
                    <input type="submit" name="confirm" value="Đặt hàng">
                    <input type="submit" name="cancel" value="Hủy đơn hàng">
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