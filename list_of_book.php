<?php
include("connection.php");
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
        <p class="box-text">Xem sách</p>
        <div>
            <a href="user_employee.php">Cá nhân</a>
            <a href="list_of_book.php">> Quản lý sách</a>
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
            <a href="#" onclick="chooseOption();"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.php"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="book_statistic.php"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
            <script>
                function chooseOption() {
                    // Prompt the user to input their choice
                    var userInput = prompt("Choose an option:\n1. List of Books\n2. Manage Homepage");

                    // Convert the user input to a number
                    var userChoice = parseInt(userInput);

                    // Redirect based on user's choice
                    if (!isNaN(userChoice)) {
                        switch (userChoice) {
                            case 1:
                                window.location.href = "list_of_book.php";
                                break;
                            case 2:
                                window.location.href = "manage_homepage.php";
                                break;
                            default:
                                alert("Invalid choice. Please enter 1 or 2.");
                        }
                    } else {
                        alert("Invalid input. Please enter a number.");
                    }
                }
            </script>
        </div>
        <style>
            .button-container1 {
                margin-left: auto;
                margin-left: 180%;
            }
            .button-container1 input[type="button"] {
                background-color: #FFECD5;
                color: #B88E2F;
                padding: 8px 12px; /* Adjust padding as needed */
                border: 1px solid #B88E2F;
                border-radius: 100px;
            }
        </style>
        <div class="content-box">
            <!-- real content goes here -->
            <div class="search-container">
                <div class="search-icon">
                    <img class="side-box-image" src="img/icon_search_emp.png" alt="Icon"/>
                </div>
                <form id="searchForm" method="post">
                    <input type="text" id="search" name="search">
                    <input type="submit" value="Submit">
                </form>
                <div class="button-container1">
                    <a href="manage_homepage.php"><input type="button" value="Quản lý trang chủ"></a>
                </div>
                <div class="button-container">
                    <a href="add_new_book.php"><input type="button" value="Nhập sách mới"></a>
                </div>
            </div>
            <style>
                #bookTable {
                    max-height: 600px;
                    overflow-y: auto;
                    position: relative; /* Set the position property to relative */
                }

                table {
                    width: 100%;
                    
                }

                thead {
                    position: sticky; /* Set the position property to sticky for the table header */
                    top: 0; /* Stick the header to the top */
                }
            </style>
            <div id="bookTable"></div>
            <script>           
            function redirectToDetailsPage(ID) {
                window.location.href = 'update_book.php?id=' + ID;
            }
            // Function to fetch book data
            function fetchbookData(search = '') {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", 'database_scripts/get_book_data.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        document.getElementById('bookTable').innerHTML = this.responseText;
                    }
                }
                xhr.send("search=" + search);
            }
            
            // Fetch all book data when the page loads
            fetchbookData();
            
            // Fetch book data based on search when the form is submitted
            document.getElementById('searchForm').addEventListener('submit', function(e) {
                e.preventDefault();
                var search = document.getElementById('search').value;
                if (search === '') {
                    // If the search term is blank, fetch all book data
                    fetchbookData();
                } else {
                    fetchbookData(search);
                }
            });
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