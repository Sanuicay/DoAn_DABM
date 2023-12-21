<?php
// Connect to your database
// Connect to your database
include_once('connection.php');
include_once('database_scripts/func_total_price_sale.php');


  // Get the orderId value from the URL parameter
  $orderId = $_GET["orderId"];

  // Prepare and execute the SQL query
  $sql = "SELECT order_ID,E.sur_name,E.last_name,M.sur_name as sur,M.last_name as last_n, order_date, M.phone_num as phone, M.email as email, delivery_address, book_name, sale_quantity, sale_price, payment_status, img_path, order_info
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
            <a href="user_employee.php"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 4"></a>
        </div>
    </div>

    <div class="box">
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Quản lý đơn hàng</p>
        <div>
            <a href="user_employee.php">Cá nhân</a>
            <a href="employee_order.php">> Quản lý đơn hàng</a>
        </div>
    </div>

    <!-- content -->
    <div class="content">
    <div class="side-box">
            <a href="user_employee.php"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p> -->
            <?php
            echo "<p style='font-family: Times New Roman, Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F'>{$row['sur_name']} {$row['last_name']}</p>";
            echo "<p style='font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F'>ID: {$user['ID']}</p>";
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
                    echo '<script>alert("You are not authorized to view this content.");</script>';
                    echo '<script>window.location.href = "user_member.php";</script>';
                    exit;
                    echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Customer</p>";
                }
            }
            ?>
            <a href="user_employee.php"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="list_of_book.php"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.php"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="book_statistic.php"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
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
                        <span class="label">Tình trạng thanh toán:</span> <?php echo $item['payment_status'] ?>
                    </div>
                    <div>
                        <span class="label" id = "status">Trạng thái đơn hàng:</span>  <?php $info_parts = explode(', ', $item['order_info']); $status = isset($info_parts[1]) ? $info_parts[1] : ''; echo $status;?>
                    </div>
                    <div>
                        <span class="label">Ghi chú:</span>  <?php $note = isset($info_parts[2]) ? $info_parts[2] : ''; echo $note  ?>
                    </div>
                </div>
                <div class="total">
                    <span class="label" id="tmp" style="display: none;"><?php echo $item['order_info'] ?></span>  
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
             <style>
    /* Style for the check div */
    #check {
      display: none;
      text-align: center; /* Center the buttons */
      margin-top: 10px; /* Add margin for spacing (adjust as needed) */
    }

    /* Style for the Confirm button */
    #check input[name="confirm"] {
      padding: 10px; /* Adjust padding as needed */
      margin: 5px; /* Add margin for spacing between buttons (adjust as needed) */
      background-color: #4CAF50; /* Green background color */
      color: #fff; /* White text color */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    /* Hover effect for the Confirm button */
    #check input[name="confirm"]:hover {
      background-color: #45a049; /* Darker green color on hover */
    }

    /* Style for the Cancel button */
    #check input[name="cancel"] {
      padding: 10px; /* Adjust padding as needed */
      margin: 5px; /* Add margin for spacing between buttons (adjust as needed) */
      background-color: #FF0000; /* Red background color */
      color: #fff; /* White text color */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    /* Hover effect for the Cancel button */
    #check input[name="cancel"]:hover {
      background-color: #a03a3a; /* Darker red color on hover */
    }
  </style>
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
                        <td><img src=<?php echo $item['img_path'] ?> alt='Product Image'></td>
                        <td><?php echo $item['book_name'] ?></td>
                        <td><?php echo $item['sale_price'] ?></td>
                        <td><?php echo $item['sale_quantity'] ?></td>
                        <td><?php echo  $item['sale_price'] * $item['sale_quantity']; $small_sum+=$item['sale_price'] * $item['sale_quantity']?></td>
                        <!-- Product information will be added here -->
                    </tbody>
                    <?php } ?>  
                </table>

                
            <div id ="check" style="display: none;">
                <input type="button" name="confirm" value="Xác nhận" onclick="confirmAction()">
                <input type="button" name="cancel" value="Từ chối" onclick="confirmCancel()">
            </div>
                        

            <script>
                // Lấy giá trị orderId từ tham số truyền vào URL
                const urlParams = new URLSearchParams(window.location.search);
                const orderId = urlParams.get('orderId');
                var statusValue = document.getElementById('tmp').innerText;
                // Thêm các thông tin khác tương ứng với orderId
                // // Ví dụ: Hiển thị nút để quay lại trang trước
                // document.write('<button onclick="goBack()">Go Back</button>');
                if (statusValue.includes('Đang chờ duyệt')) {
                // Display the check div if the condition is true
                document.getElementById('check').style.display = 'block';
                } else {
                // Keep the check div hidden if the condition is false
                document.write('<button onclick="goBack()">Go Back</button>');
                document.getElementById('check').style.display = 'none';
                }
                // Hàm để quay lại trang trước
                function goBack() {
                    window.history.back();
                }
                function confirmAction() {
                    // Implement your confirmation logic or perform the delete action here
                    
                    var order_info_array = statusValue.split(',');

                    // Update the second element (index 1) to "Đã duyệt"
                    order_info_array[1] = " Đã duyệt ";

                    // Join the array back into a string using ','
                    var status = order_info_array.join(',');
                    var confirmed = confirm("Are you sure you want to confirm order with ID: " + orderId);
                    if (confirmed) {
                        fetch('./database_scripts/confirm_sale_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({orderID: orderId, status: status})
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log('A');
                            console.log(data.success);
                            if(data.success) {
                                window.location.href = 'details.php?orderId=' + orderId;
                            }
                        })
                        .catch(error => {
                            console.log('B');
                            console.log(error);
                        })
                        
                    }
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
