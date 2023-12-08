<?php
// Connect to your database
include_once('connection.php');
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
    <link rel="stylesheet" href="css/logo.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/search.css">
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
                    echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Customer</p>";
                }
            }
            ?>
            <a href="#"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="#"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.php"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="#"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="content-box">
            <img class = "logo" src="img/logo_DABM.png", alt="Logo">
            <br>
            <div class="center"><h1>Thông tin đơn hàng</h1></div>
            <div class="order-info-container">
                <div class="order-info">
                    <div>
                        <span class="label">Mã đơn hàng:</span> 
                        <input type="text" id="s.orderid" name="s.orderid" placeholder="Nhập mã đơn hàng">
                    </div>
                    <div>
                        <span class="label">Thời gian:</span> 
                        <input type="date" id="s.orderdate" name="s.orderdate" placeholder="Nhập ngày tạo đơn">
                    </div>
                    <div>
                        <span class="label">Ghi chú:</span>
                        <input type="text" id="s.ordernote" name="s.ordernote" placeholder="Ghi chú nếu có">
                    </div>
                </div>
                <div class="total" id="totalPayment">
                    <span class="label">Tổng tiền thanh toán:</span> 0 VNĐ
                </div>
            </div>
            <div>
                <div id="customerForm">
                <h2>Thông tin khách hàng</h2>
                <button id="addCustomerBtn" class = "format-button" onclick="showForm()">Thêm khách hàng mới</button>
                <div id="formContainer" style="display: none;">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" placeholder="Nhập tên">
        
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại">
        
                    <label for="email">Email:</label>
                    <input type="text" id="email" placeholder="Nhập email">
        
                    <button class = "format-button" onclick="addCustomer()">Thêm khách hàng</button>
                    </div>
                </div>
                <div id="customerInfo">
                    <div id="customerDetails"></div>
                </div>
            </div>
            
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
                    <tbody id="productBody">
                        <!-- Product information will be added here -->
                    </tbody>
                </table>
            
                <br>
                <button id="addProductBtn" onclick="showProductForm()">Thêm sản phẩm</button>

                    
            
            <div id="productForm">
                <label for="productName">Tên/Mã sản phẩm:</label>
                <input type="text" id="productName" placeholder="Nhập tên/mã sản phẩm">
                
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" placeholder="Nhập số lượng">
                <div id="message"></div>
                <button id="submitProductBtn" onclick="addProduct()">Thêm sản phẩm</button>
                <button id="delProductBtn" onclick="cancelAddProduct()">Hủy bỏ</button>
            </div>
            <br>
            <div class = "bounding">
                <button id="confirmOrderBtn" onclick="confirmOrderTest()">Xác nhận và in đơn hàng</button>
                <button id="cancelOrderBtn" onclick="cancelOrder()">Hủy đơn hàng</button>
            </div>
           
            <script>
                var customerData = {};
                var productJson = {};
                var userId = <?php echo json_encode($user['ID']); ?>;
                 function showForm() {
                    var formContainer = document.getElementById("formContainer");
                    formContainer.style.display = "block";
                    document.getElementById("addCustomerBtn").style.display = "none";
                }

                function addCustomer() {
                    var name = document.getElementById("name").value;
                    var phone = document.getElementById("phone").value;
                    var email = document.getElementById("email").value;

                    
                    console.log(phone);
                    fetch('http://localhost:8012/DoAn_DABM/database_scripts/fetch_user_data.php',{
                        method: 'POST',
                        headers: {  // <-- Corrected property name
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({phoneNum: phone})
                    })
                    .then(response => {
                        if (!response.ok){
                            throw new Error('Http error!');
                        }

                        return response.json();
                    })
                    .then (data=>{
                        const userData = data.userData;
                        console.log(userData);
                        customerData = {
                            id: userData.ID,
                            surName: userData.sur_name,
                            lastName: userData.last_name,
                            phone: phone,
                            email: userData.email
                        };
                        var customerDetails = document.getElementById("customerDetails");
                        customerDetails.innerHTML = `
                            <div id="customerDetails" class="some-custom-class">
                                <strong>Tên:</strong> ${userData.sur_name} ${userData.last_name}<br>
                                <strong>Số điện thoại:</strong> ${phone}<br>
                                <strong>Email:</strong> ${userData.email}
                            </div>
                        `;
                    })
                    .catch(error => {
                        console.log(error);
                    })

                    // Clear the form fields
                    document.getElementById("name").value = "";
                    document.getElementById("phone").value = "";
                    document.getElementById("email").value = "";

                    // Hide the form after adding a customer
                    var formContainer = document.getElementById("formContainer");
                    formContainer.style.display = "none";
                }
                function showProductForm() {
                    document.getElementById("productForm").style.display = "block";
                    document.getElementById("addProductBtn").style.display = "none";
                    document.getElementById("delProductBtn").style.display = "inline-block";
                }
                function updateTotal() {
                    var tableBody = document.getElementById("productBody");
                    var rows = tableBody.getElementsByTagName("tr");
                    var totalPayment = 0;

                    for (var i = 0; i < rows.length; i++) {
                        var cells = rows[i].getElementsByTagName("td");
                        console.log("Cells:", cells);
                        var sumText = cells[4].innerText;
                        console.log("Sum: ",sumText);
                        var sum = parseInt(sumText.replace(" VNĐ", "").trim());
                        totalPayment+=sum;
                    }
                    // Update the total payment element with the new value
                    var totalPaymentElement = document.getElementById("totalPayment");
                    totalPaymentElement.innerHTML = "<span class='label'>Tổng tiền thanh toán:</span> " + totalPayment + " VNĐ";
                }
                function addProduct() {
                    var productName = document.getElementById("productName").value;
                    var quantity = document.getElementById("quantity").value;
                    var messageElement = document.getElementById("message");
                   
                    messageElement.innerHTML = "";
                    if (productName === null || productName === undefined || productName.trim() === "") {
                    // Product name is null, undefined, or an empty string
                        if(productName === null|| productName === undefined || productName.trim() === "" ) {
                            messageElement.innerHTML = "Sản phẩm đang trống";
                        }
                        return;
                        // You can alter the message or take other actions here
                    }

                    if (quantity === null || quantity === undefined || quantity.trim() === "") {
                        // Quantity is null, undefined, or not a number

                        messageElement.innerHTML = "Số lượng đang trống";
                        return;
                        // You can alter the message or take other actions here
                    }

                    // Add additional conditions and messages as needed

                    if (messageElement.innerHTML === "") {
                        // If no error messages were set, proceed with adding the product
                        var tableBody = document.getElementById("productBody");
                        var row = tableBody.insertRow();
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        
                        //Call API to get data of the book
                        fetch('http://localhost:8012/DoAn_DABM/database_scripts/add_new_product.php',{
                        method: 'POST',
                        headers: {  // <-- Corrected property name
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({bookID: productName})
                        })
                        .then(response => {
                            if (!response.ok){
                                throw new Error('Http error!');
                            }

                            return response.json();
                        })
                        .then (data=>{
                            const bookData = data.bookData;
                            console.log(bookData);
                            cell1.innerHTML = "<img src='" + bookData.img_path + "' alt='Product Image'>";
                            cell2.innerHTML = bookData.book_name;
                            cell3.innerHTML = bookData.sale_price + " VNĐ"; // Replace with actual price
                            cell4.innerHTML = quantity;
                            cell5.innerHTML = bookData.sale_price*quantity + " VNĐ"; // Replace with actual calculation
                            updateTotal();
                            productJson[productName] = {
                                id: productName,
                                name: bookData.book_name,
                                quantity: quantity
                        };
                        })
                        .catch(error => {
                            console.log(error);
                        })
                        

                        // Add an event listener to the newly added row
                        row.addEventListener("click", function () {
                            confirmAction(this);
                        });

                        // Clear the form fields
                        document.getElementById("productName").value = "";
                        document.getElementById("quantity").value = "";
                        // Hide the form after adding a product
                        var productForm = document.getElementById("productForm");
                        productForm.style.display = "none";
                        document.getElementById("addProductBtn").style.display = "block";
                        // updateTotal();
                        console.log("productJson:", productJson);
                    }
                }
                function cancelAddProduct() {
                    document.getElementById("productForm").style.display = "none";
                    document.getElementById("addProductBtn").style.display = "inline-block";
                    document.getElementById("delProductBtn").style.display = "none";
                }
                function confirmAction(row) {
                    var productName = row.cells[1].textContent;
                    var quantity = row.cells[3].textContent;

                    var confirmation = confirm("Bạn muốn chỉnh sửa số lượng hay xóa sản phẩm?\n\n" +
                                            "Tên sản phẩm: " + productName + "\n" +
                                            "Số lượng: " + quantity);

                    if (confirmation) {
                        // Perform the desired action (edit or delete) here
                        // For now, let's just show an alert
                        alert("Đã chọn: Chỉnh sửa số lượng hoặc xóa sản phẩm");
                    }
                }

                function confirmOrderTest() {
                    // Assuming customerData is defined somewhere in your code
                    var customer = customerData.id;
                    console.log(customer);

                    var tableBody = document.getElementById("productBody");
                    var rows = tableBody.getElementsByTagName("tr");

                    var orderid = document.getElementById("s.orderid").value;
                    var orderdate = document.getElementById("s.orderdate").value;
                    var ordernote = document.getElementById("s.ordernote").value;

                    // Display a confirmation dialog
                    var isConfirmed = window.confirm("Are you sure you want to confirm the order?");

                    // Check the result of the confirmation dialog
                    if (isConfirmed) {
                        fetch('./database_scripts/create_order.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                customerInfo: customer,
                                product: productJson,
                                orderID: orderid,
                                orderDate: orderdate,
                                orderNote: ordernote,
                                employeeID: userId,
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Http error!');
                            }
                            return response.json(); // Convert response to JSON
                        })
                        .then(data => {
                            if(data.success) {
                                alert("Order confirmed successfully!");
                                window.location.href = "./employee_order.php"; // Replace with your actual page URL
                            } else {
                                alert("Error confirming order: " + data.message);
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        });
                    } else {
                        // If the user clicks "Cancel," do nothing (stay on the same page)
                        // You can add more logic here if needed
                    }
                }


                function confirmOrder() {
                    // Retrieve order information
                    var orderID = document.getElementById("s.orderid").value;
                    var orderDate = document.getElementById("s.orderdate").value;
                    var orderNote = document.getElementById("s.ordernote").value;
                    var customerName = document.getElementById("name").value;

                    // Prepare data to be sent to the server
                    var data = {
                        orderID: orderID,
                        orderDate: orderDate,
                        orderNote: orderNote,
                        customerName: customerName
                        // Add other order-related data here
                    };

                    // Send data to the server using AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "./database_scripts/add_order_sales.php", true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                alert("Order confirmed!");
                            } else {
                                alert("Error: " + xhr.status);
                                console.error(xhr.responseText);
                            }
                        }
                    };

                    xhr.send(JSON.stringify(data));
                }

                function cancelOrder() {
                    var isConfirmed = window.confirm("Are you sure you want to cancel the order?");
                    // Check the result of the confirmation dialog
                    if (isConfirmed) {
                        // If the user clicks "OK," redirect to another page
                        window.location.href = "./employee_order.php"; // Replace with your actual page URL
                    } else {
                        // If the user clicks "Cancel," do nothing (stay on the same page)
                        // You can add more logic here if needed
                    }
                }
            </script>
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