<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","dabm_database");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

include_once('database_scripts/func_total_price_sale.php');

  // Get the orderId value from the URL parameter
  $orderId = $_GET["orderId"];

  // Prepare and execute the SQL query
  $sql = "SELECT order_ID,E.sur_name,E.last_name,M.sur_name as sur,M.last_name as last_n, order_date, M.phone_num as phone, M.email as email, delivery_address, book_name, sale_quantity, sale_price
  FROM `order`,`sale_order` NATURAL JOIN `sale_include` NATURAL JOIN `book`, `user` as E, `user` as M
  WHERE order_ID = sale_ID AND employee_ID = E.ID AND member_ID=M.ID
  ";

 $stmt = $con->prepare($sql);
//  $stmt->bind_param("ii", $orderId,$stmt['order_ID']);
 $stmt->execute();

 $result = $stmt->get_result();
 $stmt_ = $con->prepare($sql);
//  $stmt->bind_param("ii", $orderId,$stmt['order_ID']);
 $stmt_->execute();
 $tmp = $stmt_->get_result();
 $small_sum = 0;
 $sum = total_price_sales($con, $orderId);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/employee.css">
    <link rel="stylesheet" href="css/logo.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/search.css">
</head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/cover-box.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/logo.css">
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
            <a href="#"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 4"></a>
        </div>
    </div>

    <div class="box">
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Quản lý đơn hàng</p>
        <div>
            <a href="index.html">Cá nhân</a>
            <a href="#">></a>
            <a href="#">Quản lý đơn hàng</a>
        </div>
    </div>

    <!-- content -->
    <div class="content">
        <div class="side-box">
            <a href="#"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p>
            <a href="#"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="#"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.html"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="#"><img class="side-box-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="content-box">
        <?php   


while($item = mysqli_fetch_array($result)) { 

    if ($item['order_ID']!=$orderId) {

        continue;
    } else {

        $sp = $item;
    }
            ?>
            <div class="content-box">
            <img class = "logo" src="img/logo_DABM.png", alt="Logo">
            <br>
            <div class="center"><h1>Thông tin đơn hàng</h1></div>
            <div class="order-info-container">
                <div class="order-info">
                    <div>
                        <span class="label">Mã đơn hàng:</span> <?php echo $item['order_ID'] ?>
                    </div>
                    <div>
                        <span class="label">Tình trạng thanh toán:</span> Đã thanh toán
                    </div>
                    <div>
                        <span class="label">Trạng thái đơn hàng:</span> Đang vận chuyển
                    </div>
                </div>
                <div class="total">
                    <span class="label">Tổng tiền thanh toán:</span> <?php echo $sum ?>
                </div>
            </div>
            </div>
            <div>
                <div id="customerForm">
                <h2>Thông tin khách hàng</h2>
                <div>
                        <span class="label">Tên khách hàng: </span> <?php echo $item['sur'];echo " "; echo $item['last_n'] ?>
                    </div>
                    <div>
                        <span class="label">Số điện thoại:</span> <?php echo $item['phone']?>
                    </div>
                    <div>
                        <span class="label">Email:</span> <?php echo $item['email']?>
                    </div>
                    <div>
                        <span class="label">Địa chỉ giao hàng:</span> <?php echo $item['delivery_address']?>
                    </div>
                </div>
            </div>
            <?php 
            if ($sp) break;
 }
            ?>
            
            <h2>Danh sách sản phẩm</h2>
            <!-- Result display area (optional) -->
                <table id="productTable">
                    <thead>
                        <tr>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <?php   
                    while($item = mysqli_fetch_array($tmp)) { 
                        if ($item['order_ID']!=$orderId) {
            
                            continue;
                        } else {

                        }
                    ?>
                    <tbody id="productBody">
                        <td><?php echo $item['book_name'] ?></td>
                        <td><?php echo $item['book_name'] ?></td>
                        <td><?php echo $item['sale_price'] ?></td>
                        <td><?php echo $item['sale_quantity'] ?></td>
                        <td><?php echo  $item['sale_price'] * $item['sale_quantity']; $small_sum+=$item['sale_price'] * $item['sale_quantity']?></td>
                        <!-- Product information will be added here -->
                    </tbody>
                    <?php } ?>  
                </table>
                <br>
                <div class="total">
                    <span class="label">Tổng tiền thanh toán:</span> <?php echo $sum ?>
                </div> 
                <br>
            <script>
                // Lấy giá trị orderId từ tham số truyền vào URL
                const urlParams = new URLSearchParams(window.location.search);
                const orderId = urlParams.get('orderId');

                // Thêm các thông tin khác tương ứng với orderId
                
                // Ví dụ: Hiển thị nút để quay lại trang trước
                document.write('<button onclick="goBack()">Go Back</button>');

                // Hàm để quay lại trang trước
                function goBack() {
                    window.history.back();
                }
            </script>

        </div>
    </div>
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
