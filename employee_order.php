<?php
    include_once('database_scripts/connect.php');
    include_once('database_scripts/func_total_price_sale.php');
?>


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
            <a href="#"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="content-box">
            <img class = "logo" src="img/logo_DABM.png", alt="Logo">
            <br>
            <div class = "main-container">
                <div class="search-container">
                    <div class="search-icons">
                        <div class="search-icon">
                            <img class="side-box-image" src="img/icon_search_emp.png" alt="Icon"/>
                        </div>
                        <input type="text" class="search-input" placeholder="Tìm đơn hàng">
                        <div class="filter-icon" onclick="handleFilterClick()">
                            <img class="side-box-image" src="img/icon_filter.png" alt="Icon"/>
                        </div>
                    </div>
                </div> 
                <div class ="button-container">
                    <button class="create-order-button" onclick="handleCreateOrder('sell')">Tạo đơn bán hàng</button>
                    <button class="create-order-button" onclick="handleCreateOrder('buy')">Tạo đơn nhập hàng</button>
                </div>                 
            </div>       
            <div id="filter-box" class="filter-box">
                <ul>
                    <li>Đơn nhập hàng</li>
                    <li>Đơn bán hàng</li>
                    <li>Ngày gần nhất</li>
                    <li>Ngày xa nhất</li>
                    <li>Sắp xếp theo giá tiền tăng dần</li>
                    <li>Sắp xếp theo giá tiền giảm dần</li>
                </ul>
            </div>
            <script>
                function handleFilterClick() {
                    // Add your filter action here
                    var filterBox = document.getElementById("filter-box");
                    var mouseX = event.clientX;
                    var mouseY = event.clientY;

                    filterBox.style.left = mouseX + "px";
                    filterBox.style.top = mouseY + "px";

                    filterBox.style.display = (filterBox.style.display === "block") ? "none" : "block";
                }
                document.addEventListener("click", function(event) {
                    var filterIcon = document.querySelector(".filter-icon");
                    if (event.target === filterIcon) {
                        toggleFilterBox(event);
                    } else {
                        document.getElementById("filter-box").style.display = "none";
                    }
                })
                function handleCreateOrder(orderType) {
                    if (orderType === 'sell') {
                        // Logic for creating a sell order
                        window.location.href = 'employee_create_order.html';
                        alert("Tạo đơn bán hàng!");
                    } else if (orderType === 'buy') {
                        // Logic for creating a buy order
                        alert("Tạo đơn nhập hàng!");
                        window.location.href = 'employee_create_order.html';
                    }
                }
            </script>
            
            <!-- Result display area (optional) -->
            <div id="searchResults"></div>
            <?php
            $count = 1;
            $sql_test = mysqli_query($mysqli, 'SELECT order_ID, E.sur_name, E.last_name, M.sur_name as sur, M.last_name as last_n, order_date, count(*) as count_item, payment_status,
                delivery_address
                FROM `order`,`sale_order` NATURAL JOIN `sale_include` NATURAL JOIN `book`, `user` as E, `user` as M
                WHERE order_ID = sale_ID AND employee_ID = E.ID AND member_ID = M.ID 
                GROUP BY order_ID, E.sur_name, E.last_name, sur, last_n, order_date, payment_status');

            ?>
            <h2>Danh sách hóa đơn</h2>
            <div class="table-container">                
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn</th>
                            <th>Thời gian</th>
                            <th>Khách hàng</th>
                            <th>Nhân viên</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Địa chỉ</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                            while($item = mysqli_fetch_array($sql_test)) {
                                $tmp = $item['order_ID'];
                        ?>
                        <tr onclick="redirectToDetailsPage('<?php echo $item['order_ID'] ?>')">
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $item['order_ID'] ?></td>
                            <td><?php echo $item['order_date'] ?></td>
                            <td><?php echo $item['sur'];echo " "; echo $item['last_n'] ?></td>
                            <td><?php echo $item['sur_name'];echo " "; echo $item['last_name'] ?></td>
                            <td><?php echo total_price_sales($mysqli, $item['order_ID']); ?></td>
                            <td><?php echo $item['payment_status'] ?></td>
                            <td>Shipped</td>
                            <td><?php echo $item['delivery_address'] ?></td></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <script>
                function redirectToDetailsPage(orderId) {
                    // Thực hiện chuyển hướng đến trang chi tiết với orderId là tham số
                    window.location.href = 'details.php?orderId=' + orderId;
                }
                function redirectToCreateOrder() {
                    // Thực hiện chuyển hướng đến trang tạo mới đơn hàng
                    window.location.href = 'create-order.html';
                }
            </script>
            <br>
        <br>
        </div>
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