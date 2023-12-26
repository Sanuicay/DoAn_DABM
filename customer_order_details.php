<?php
include 'connection.php';
// $con = mysqli_connect("localhost:3307","root","","doan");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
//get the id of the product
$product_id = $_GET['id'];
//sanitize the id before using in the query
$product_id = mysqli_real_escape_string($con, $product_id);

//check the user have this order or not
$user_ID = $_SESSION['user_id'];
$query = "SELECT *
        FROM `sale_order`
        WHERE sale_ID = '$product_id' AND member_ID = '$user_ID';";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Bạn không có quyền truy cập vào đơn hàng này!');</script>";
    echo "<script>window.location.href = 'customer_order_history.php';</script>";
}

//when click on the confirm button -> insert data into order table
if (isset($_POST['confirm'])) {
    $order_ID = $_POST['order_ID'];
    // check if the order is paid or not
    $query = "  SELECT *
                FROM sale_order
                WHERE sale_ID = '$order_ID' AND payment_status = 'Đã thanh toán';";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('Đơn hàng đã được thanh toán trước đó!');</script>";
        echo "<script>window.location.href = 'customer_order_history.php';</script>";
    } else {
        // redirect to the payment page
        header("Location: payment.php?id=$order_ID");
        exit();
    }
}

//when click on the cancel button -> delete the order from sale_include table then sale_order table then order table then add the quantity back to the book table
if (isset($_POST['cancel'])) {
    $order_ID = $_POST['order_ID'];
    // check if the order is paid or not
    $query = "  SELECT *
                FROM sale_order
                WHERE sale_ID = '$order_ID' AND payment_status = 'Đã thanh toán';";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('Đơn hàng đã được thanh toán! Không thể hủy.');</script>";
        echo "<script>window.location.href = 'customer_order_history.php';</script>";
    } else {
        // get the book_ID and sale_quantity from sale_include table
        $query = "  SELECT book_ID, sale_quantity
                    FROM sale_include
                    WHERE sale_ID = '$order_ID';";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $book_ID = $row['book_ID'];
        $sale_quantity = $row['sale_quantity'];
        // add the remaining_quantity back to the book table
        $query = "  UPDATE book
                    SET remaining_quantity = remaining_quantity + '$sale_quantity'
                    WHERE book_ID = '$book_ID';";
        $result = mysqli_query($con, $query);

        // delete the order from sale_include table
        $query = "  DELETE FROM sale_include
        WHERE sale_ID = '$order_ID';";
        $result = mysqli_query($con, $query);
        // delete the order from sale_order table
        $query = "  DELETE FROM sale_order
                WHERE sale_ID = '$order_ID';";
        $result = mysqli_query($con, $query);
        // delete the order from order table
        $query = "  DELETE FROM `order`
                WHERE order_ID = '$order_ID';";
        $result = mysqli_query($con, $query);
        if ($result) {
        echo "<script>alert('Đơn hàng đã được hủy!');</script>";
        echo "<script>window.location.href = 'customer_order_history.php';</script>";
        } else {
        echo "<script>alert('Đơn hàng chưa được hủy!');</script>";
        echo "<script>window.location.href = 'customer_order_history.php';</script>";
        }

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
            <a href="features_product_login.php">Cửa hàng</a>
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
            <a href="customer_order_history.php">> Lịch sử giao dịch</a>
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
            <a href="customer_order_history.php"><img class="side-box-last-button" src="img/purchase_history_button.png" alt="Button3"></a>
        </div>
        
        <div class="banner">
            <div class="order-title">Thông tin hóa đơn</div>
            <form method="POST">
                <div class="order-info">
                    <table>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <?php
                                echo "<td><input type='text' name='order_ID' id='order_ID' value='$product_id' readonly></td>";
                            ?>
                            <td></td>
                            <th>Phương thức thanh toán</th>
                            <?php
                                $query = "SELECT order_info
                                        FROM `order`
                                        WHERE order_ID = '$product_id';";
                                $result = mysqli_query($con,$query);
                                $row = mysqli_fetch_assoc($result);
                                $order_info = $row['order_info'];
                                $payment = explode(',', $order_info)[0];
                                echo "<td><input type='text' name='payment' id='payment' value='$payment' readonly></td>";
                            ?>
                        </tr>
                        <tr>
                            <th>Trạng thái đơn hàng</th>
                            <td><input type="text" name="order_status" id="order_status" value="Đang chờ duyệt" readonly></td>
                            <td></td>
                            <th>Tình trạng thanh toán</th>
                            <?php
                                $query = "SELECT payment_status
                                        FROM sale_order
                                        WHERE sale_ID = '$product_id';";
                                $result = mysqli_query($con,$query);
                                $row = mysqli_fetch_assoc($result);
                                $payment_status = $row['payment_status'];
                                echo "<td><input type='text' name='payment_status' id='payment_status' value='$payment_status' readonly></td>";
                            ?>
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
                            $sql = "SELECT book_name, sale_price, sale_quantity
                            FROM book, sale_include
                            WHERE book.book_ID = sale_include.book_ID AND sale_include.sale_ID ='$product_id'" ;
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subtotal = $row['sale_price'] * $row['sale_quantity'];
                                    echo "<th>Tổng</th>";
                                    echo "<td>" . $subtotal . " VND</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        <?php
                            echo "<tr>";
                            echo "<th>Địa chỉ</th>";
                        ?>
                        <?php
                            // get the address from the sale_order table
                            $query = "SELECT delivery_address
                                    FROM sale_order
                                    WHERE sale_ID = '$product_id';";
                            $result = mysqli_query($con,$query);
                            $row = mysqli_fetch_assoc($result);
                            $delivery_address = $row['delivery_address'];
                            echo "<td>" . $delivery_address . "</td>";
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
                            }
                        ?>
                        <?php
                            // get the order_info from the order table
                            $query = "SELECT order_info
                                    FROM `order`
                                    WHERE order_ID = '$product_id';";
                            $result = mysqli_query($con,$query);
                            $row = mysqli_fetch_assoc($result);
                            $order_info = $row['order_info'];
                            $note = explode(',', $order_info)[2];
                            echo "<tr>";
                            echo "<th>Ghi chú</th>";
                            echo "<td><input type='text' name='note' id='note' value='$note' readonly></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "</tr>";
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
                <div class="product">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng phụ</th>
                        </tr>
                        <?php
                            $user_ID = $_SESSION['user_id'];
                            $sql = "SELECT book_name, sale_price, sale_quantity
                            FROM book, sale_include
                            WHERE book.book_ID = sale_include.book_ID AND sale_include.sale_ID ='$product_id'" ;
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subtotal = $row['sale_price'] * $row['sale_quantity'];
                                    echo "<tr>";
                                    echo "<td>" . $row['book_name'] . "</td>";
                                    echo "<td>" . $row['sale_price'] . " VND</td>";
                                    echo "<td>" . $row['sale_quantity'] . "</td>";
                                    echo "<td>" . $subtotal . " VND</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                </div>
                <div class="button-container">
                    <input type="submit" name="confirm" value="Thanh toán">
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