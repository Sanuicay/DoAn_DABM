<?php
include("connection.php");
//if change1 button is pressed, insert new the user info: ID, username, password, sur_name, last_name, email, phone, info (optional)
//first check null
// if (isset($_POST['create']))
// {
//     //check null for all fields except ID and info
//     if (empty($_POST['username']) || empty($_POST['new-password']) || empty($_POST['confirm-password']) || empty($_POST['ho']) || empty($_POST['ten']) || empty($_POST['email']) || empty($_POST['phone']))
//     {
//         echo "<script>alert('Vui lòng điền đầy đủ thông tin!')</script>";
//     }
//     else 
//     {
//         //get the input  
//         $username = $_POST['username'];
//         $password = $_POST['new-password'];
//         $confirm_password = $_POST['confirm-password'];
//         $ho = $_POST['ho'];
//         $ten = $_POST['ten'];
//         $email = $_POST['email'];
//         $phone = $_POST['phone'];
//         $info = $_POST['info'];

//         //check if the username already exists
//         $query = "SELECT username FROM user";
//         $result = mysqli_query($con,$query);
//         if (mysqli_num_rows($result) > 0)
//         {
//             while ($row = mysqli_fetch_assoc($result))
//             {
//                 if ($row['username'] == $username)
//                 {
//                     echo "<script>alert('Tên đăng nhập đã tồn tại!')</script>";
//                     exit();
//                 }
//             }
//         }

//         //check if the password and confirm password match
//         if ($password != $confirm_password)
//         {
//             echo "<script>alert('Mật khẩu không khớp!')</script>";
//             exit();
//         }

//         //check if the email already exists
//         $query = "SELECT email FROM user";
//         $result = mysqli_query($con,$query);
//         if (mysqli_num_rows($result) > 0)
//         {
//             while ($row = mysqli_fetch_assoc($result))
//             {
//                 if ($row['email'] == $email)
//                 {
//                     echo "<script>alert('Email đã tồn tại!')</script>";
//                     exit();
//                 }
//             }
//         }

//         //insert the new user into the user table
//         $query = "INSERT INTO user (username, password, sur_name, last_name, email, phone, info)
//                   VALUES ('$username', '$password', '$ho', '$ten', '$email', '$phone', '$info');";
//         $result = mysqli_query($con,$query);

//         echo "<script>alert('Tạo tài khoản thành công!')</script>";
//         sleep(1);
//         //redirect to manager_employee.php
//         echo "<script>window.open('manager_employee.php','_self')</script>";

//     }
    

// }

?>
    
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/cover-box.css">
    <link rel="stylesheet" href="css/add_new_employee.css">
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
            <a href="user.html"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
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

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Thông tin cá nhân</p>
        <div>
            <a href="user.html">Cá nhân</a>
            <a href="user.html">> Thông tin cá nhân</a>
        </div>
    </div>

    <div class="content">
    <div class="side-box">
            <a href="#"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p> -->
            <!-- <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p> -->
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
            <a href="#"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="list_of_book.php"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.php"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="#"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="body-container">
            <div class="profile">
                <form id="form1">
                <h2>Hồ Sơ Của Tôi</h2>
                <form>
                    <!-- Name -->
                    <div class="name">
                        <div>
                            <label for="ho">Họ:</label>
                            <input type="text" id="ho" name="ho">
                        </div>
                        <div>
                            <label for="ten">Tên:</label>
                            <input type="text" id="ten" name="ten">
                        </div>
                    </div>
                    <br>
                    <!-- Email -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">

                    <!-- Phone -->
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" pattern="0[0-9]{9,10}" id="phone" name="phone">

                    <!-- Info -->
                    <label for="info">Thông tin thêm:</label>
                    <input type="info" id="info" name="info"> <br>

                    <!-- Start date -->
                    <label for="start_date">Ngày vào làm:</label> <br>
                    <input type="date" id="start_date" name="start_date">

                    <!-- Status -->
                    <label for="status">Trạng thái:</label> <br>
                    <select id="status" name="status">
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                    </select>
                </form>
            </div>
            <div class="account-info" method="POST">
                <h2>Thông Tin Tài Khoản</h2><br>
                <form id="form2">
                    <div class="form-group">
                        <?php
                            echo "<label for='username'>Tên Đăng Nhập:</label>";
                            echo "<input type='text' id='username' name='username'<br>";
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo "<label for='ID'>ID:</label>";
                        // a randomly generated ID that is 8 digits long, starts with 2 and does not match any other ID in the database
                        $query_id = "SELECT ID FROM user";
                        $result_id = mysqli_query($con,$query_id);

                        // Generate a 7-digit random number (to end up with an 8-digit number including the leading 2)
                        $randomNumber = rand(1000000,9999999);
                        $employeeID = "2" . $randomNumber;

                        // Fetch all existing IDs into an array
                        $existing_ids = array();
                        while ($row_id = mysqli_fetch_assoc($result_id)) {
                            $existing_ids[] = $row_id['ID'];
                        }

                        // Generate a new ID until we find one that doesn't exist in the database
                        while (in_array($employeeID, $existing_ids)) {
                            $randomNumber = rand(1000000,9999999);
                            $employeeID = "2" . $randomNumber;
                        }
                        echo "<input type='text' id='emmployeeID' name='employeeID' value='$employeeID' readonly><br>";
                        ?>
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray"><br>
                <form id="form3">
                    <br>
                    <div class="form-group">
                        <label for="new-password">Mật Khẩu:</label><br>
                        <input type="password" id="new-password" name="new-password"><br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận Mật Khẩu:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password"><br>
                    </div>                  

                </form>
                <input type="submit" id="submit" name="create" value="Tạo">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#submit").click(function(e){
                            e.preventDefault();
                            var form1Data = $("#form1").serialize();
                            var form2Data = $("#form2").serialize();
                            var form3Data = $("#form3").serialize();
                            $.ajax({
                                type: "POST",
                                url: "database_scripts/add_new_employee_script.php",
                                data: form1Data + "&" + form2Data + "&" + form3Data,
                                success: function(response) {
                                    alert(response);
                                    window.location.href = 'manager_employee.php';
                                }
                            });
                        });
                    });
                </script>
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