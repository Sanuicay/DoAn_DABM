<?php
    include_once('connection.php');
    include_once('database_scripts/func_total_price_sale.php');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-1.12.4.min.js">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/jquery-ui.js">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/cover-box.css">
    <link rel="stylesheet" href="css/table.css">    
    <link rel="stylesheet" href="css/logo.css">
    <link rel="stylesheet" href="css/checkbox.css">
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <style>
        #filterOptions {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid;
            background-color: #FFECD5;
            color: #B88E2F;
            cursor: pointer;
        }

        #filterOptions:hover {
            background-color: #B88E2F;
            color: white;
        }

        .filter-box {
            position: fixed;
            top: 100%;
            left: 0;
            background-color: #FFECD5;
            border: 1px solid #B88E2F;
            border-radius: 4px;
            display: none; /* Hide the filter box by default */
        }

        .filter-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .filter-box ul li {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #B88E2F;
        }

        .filter-box ul li:last-child {
            border-bottom: none;
        }
        .search-container {
    background-color: #FFECD5;
    padding: 10px;
    display: flex;
    align-items: center;
    width: 35%;
    border-radius: 100px;
    margin-bottom: 10px;
}
    </style>
    <!-- header -->
    <div class="header">
        <div class="header-left-section">
            <a href="index.html"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="./login_success.php">Trang chủ</a>
            <a href="./features_product_login.php">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user_employee.php"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
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
            <img class = "logo" src="img/logo_DABM.png", alt="Logo">
            <br>
            <div class = "main-container">
                <div class="search-container">
                        <img class="side-box-image" src="img/icon_search_emp.png" alt="Icon"/>
                        <input type="text" class="search-input" placeholder="Tìm đơn hàng" id = "searchInput">     
                        <select id="filterOptions">
                                <option value="option1">ID</option>
                                <option value="option2">Ngày gần nhất</option>
                                <option value="option3">Ngày xa nhất</option>
                                <option value="option4">Giá tiền tăng dần</option>
                                <option value="option5">Giá tiền giảm dần</option>
                        </select>  
                </div>

                <div class ="button-container">
                    <button class="create-order-button" onclick="handleCreateOrder('buy')">Tạo đơn nhập hàng</button>
                </div>                 
            </div>   
            <a href="employee_order.php">Quản lý đơn bán hàng</a> 
            <h2>Danh sách hóa đơn</h2>
            <div class="table-container" id="saleOrderTable">                
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn</th>
                            <th>Thời gian</th>
                            <th>Nhân viên</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody id="contentSale"></tbody>
                </table>
            </div>   
            <script>
                 document.getElementById('filterOptions').addEventListener('change', function () {
                    // Get the selected filter option
                    var selectedOption = this.value;

                    // Call a function to apply the filter based on the selected option
                    applyFilter(selectedOption);
                });
                
                function applyFilter(selectedOption) {
                    // Get the table body
                    const searchInput = document.getElementById('searchInput');
                    searchInput.value = "";  // Set the value to an empty string
                    var tbody = document.querySelector('#saleOrderTable tbody');
                    // Get all rows in the table
                    var rows = tbody.querySelectorAll('tr');

                    // Convert the NodeList to an array for easier manipulation
                    var rowsArray = Array.from(rows);

                    // Implement your filtering logic based on the selected option
                    switch (selectedOption) {
                    case 'option1':
                        loadData();
                        console.log("Option 1");
                        break;
                    case 'option2':
                        handleDateInc();
                        console.log("Option 2");
                        break;
                    case 'option3':
                        handleDateDec()
                        console.log("Option 3");
                        break;
                    case 'option4':
                        handleSumInc()
                        console.log("Option 4");
                        break;
                    case 'option5':
                        handleSumDec()
                        console.log("Option 5");
                        break;
                    // Add cases for other options as needed
                    }

                    // Clear the existing table rows
                    tbody.innerHTML = '';

                    // Append the sorted rows back to the table
                    rowsArray.forEach(row => {
                    tbody.appendChild(row);
                    });
                }
                function handleSumInc() {
                    fetch('./database_scripts/fetch_purchase_order_4.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updatePurchaseOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                function handleDateDec() {
                    fetch('./database_scripts/fetch_purchase_order_3.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updatePurchaseOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                function handleDateInc() {
                    fetch('./database_scripts/fetch_purchase_order_2.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updatePurchaseOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                function handleSumDec() {
                    fetch('./database_scripts/fetch_purchase_order_5.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updatePurchaseOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                loadData();
                console.log('Script is running!');
                const searchInput = document.getElementById('searchInput');
                console.log('searchInput:', searchInput);

                // Add an event listener if searchInput is not null
                if (searchInput) {
                    searchInput.addEventListener('input', applySearch);
                } else {
                    console.error('searchInput not found.');
                }
                function applySearch() {
                    const searchTerm = searchInput.value.trim().toLowerCase();
                    const filterOption = filterOptions.value;
                    const rows = document.querySelectorAll('.table-container table tbody tr');

                    rows.forEach((row) => {
                        const dataCellValue = row.cells[3].textContent.trim().toLowerCase();

                        const shouldDisplay =
                            (filterOption !== 'option6' && dataCellValue.includes(searchTerm)) ||
                            (filterOption === 'option6' && dataCellValue === 'đang chờ duyệt');

                        row.style.display = shouldDisplay ? 'table-row' : 'none';
                    });
                }
                function handleCreateOrder(orderType) {
                    if (orderType === 'sell') {
                        // Logic for creating a sell order
                        window.location.href = 'employee_create_order.php';
                    } else if (orderType === 'buy') {
                        // Logic for creating a buy order
                        window.location.href = 'employee_order_import.php';
                    }
                }
                function loadData() {
                    fetch('./database_scripts/fetch_purchase_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updatePurchaseOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
                function updatePurchaseOrderContent(data) {
                    // Get the existing table body
                    const tbody = document.querySelector('.table-container table tbody');

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Insert new rows based on the provided data
                    data.forEach((order, index) => {
                        const row = document.createElement('tr');
                        row.addEventListener('click', function () {
                            redirectToDetailsPage(order.order_ID);
                        });

                        const values = [
                            index + 1,
                            order.order_ID,
                            order.order_date,
                            order.sur_name+" "+ order.last_name,
                            order.total_price,
                        ];

                        values.forEach((value) => {
                            const td = document.createElement('td');
                            td.textContent = value;
                            row.appendChild(td);
                        });

                        tbody.appendChild(row);
                    });
                }

                function handleCheckboxChange(checkbox) {
                    // Get the content sections
                    var saleOrderContent = document.getElementById("saleOrderContent");
                    var purchaseOrderContent = document.getElementById("purchaseOrderContent");

                    if (checkbox.id === "sale_order") {
                        // If sale_order checkbox is checked, show sale_order content
                        saleOrderContent.style.display = checkbox.checked ? "block" : "none";
                        fetch('./database_scripts/fetch_sale_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updateSaleOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                    } else if (checkbox.id === "purchase_order") {
                        // If purchase_order checkbox is checked, show purchase_order content
                        purchaseOrderContent.style.display = checkbox.checked ? "block" : "none";
                        fetch('./database_scripts/fetch_purchase_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then (data=>{
                            console.log(data.userData);
                            updatePurchaseOrderContent(data.userData);
                        })
                        .catch(error => {
                            console.log(error);
                        })
                    }

                    // Check both checkboxes and show both content sections if both are checked
                    if (document.getElementById("sale_order").checked && document.getElementById("purchase_order").checked) {
                        saleOrderContent.style.display = "block";
                        purchaseOrderContent.style.display = "block";
                    }
                }

            </script>
            <!-- Add these content sections -->
            

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

            <script>
                function redirectToDetailsPage(orderId) {
                    // Thực hiện chuyển hướng đến trang chi tiết với orderId là tham số
                    window.location.href = 'details_purchase.php?orderId=' + orderId;
                }
                function redirectToDetailsPagePurchase(orderId) {
                    // Thực hiện chuyển hướng đến trang chi tiết với orderId là tham số
                    window.location.href = 'details_purchase.php?orderId=' + orderId;
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