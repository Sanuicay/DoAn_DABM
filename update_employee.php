<?php
include ("connection.php");
//get the ID from the URL
$employeeID = $_GET['id'];
//if change1 button is pressed, update the user info (ignore the blank input)
// $query_employee = "SELECT sur_name, last_name, phone_num, email, username, password, user_info
//                    FROM user
//                    WHERE ID = $employeeID;";
//also select the start_date and employee_status from the employee table
$query_employee = "SELECT user.sur_name, user.last_name, user.phone_num, user.email, user.username, user.password, user.user_info, employee.start_date, employee.employee_status
                   FROM user, employee
                   WHERE user.ID = $employeeID AND employee.ID = $employeeID;";
$result_employee = mysqli_query($con,$query_employee);
$row_employee = mysqli_fetch_assoc($result_employee);

if (isset($_POST['change1']))
{
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $info = $_POST['info'];
    $employee_status = $_POST['status'];
    if ($ho != "")
    {
        $query = "UPDATE user
                  SET sur_name = '$ho'
                  WHERE ID = $employeeID;";
        $result = mysqli_query($con,$query);
    }
    if ($ten != "")
    {
        $query = "UPDATE user
                  SET last_name = '$ten'
                  WHERE ID = $employeeID;";
        $result = mysqli_query($con,$query);
    }
    if ($email != "")
    {
        $query = "UPDATE user
                  SET email = '$email'
                  WHERE ID = $employeeID;";
        $result = mysqli_query($con,$query);
    }
    if ($phone != "")
    {
        $query = "UPDATE user
                  SET phone_num = '$phone'
                  WHERE ID = $employeeID;";
        $result = mysqli_query($con,$query);
    }
    if ($info != "")
    {
        $query = "UPDATE user
                  SET user_info = '$info'
                  WHERE ID = $employeeID;";
        $result = mysqli_query($con,$query);
    }
    if ($employee_status != "")
    {
        $query = "UPDATE employee
                  SET employee_status = '$employee_status'
                  WHERE ID = $employeeID;";
        $result = mysqli_query($con,$query);
    }
    header("Location: update_employee.php?id=$employeeID");
}

//if change2 button is pressed, update the password, we don't need to check if the old password is correct or not
if (isset($_POST['change2']))
{
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];
    //check null
    if ($new_password != "" && $confirm_password != "")
    {
        //check if the new password and confirm password are the same
        if ($new_password == $confirm_password)
        {
            if ($new_password == $row_employee['password'])
            {
                echo "<script>alert('Mật khẩu mới không được trùng với mật khẩu cũ!');</script>";
            }
            else
            {
                $query = "UPDATE user
                          SET password = '$new_password'
                          WHERE ID = $employeeID;";
                $result = mysqli_query($con,$query);

                echo "<script>alert('Thay đổi mật khẩu thành công!');</script>";
                sleep(1);
                echo "<script>window.location.href = 'update_employee.php?id=$employeeID';</script>";
            }
        }
        else
        {
            echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!');</script>";
        }
    }
    else
    {
        echo "<script>alert('Vui lòng nhập mật khẩu mới và xác nhận mật khẩu!');</script>";
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
                <h2>Hồ Sơ Của Tôi</h2>
                <form method="POST">

                    <!-- Họ và Tên -->
                    <div class="name">
                        <div>
                            <?php
                                echo "<label for='ho'>Họ:</label>";
                                echo "<input type='text' value='$row_employee[sur_name]' id='ho' name='ho'>";
                            ?>
                        </div>
                        <div>
                            <?php
                                echo "<label for='ten'>Tên:</label>";
                                echo "<input type='text' value='$row_employee[last_name]' id='ten' name='ten'>";
                            ?>
                        </div>
                    </div>
                    <br>
                    
                    <!-- Email -->
                    <?php
                        echo "<label for='email'>Email:</label>";
                        echo "<input type='email' value='$row_employee[email]' id='email' name='email'><br>";
                    ?>

                    <!-- Số điện thoại -->
                    <?php
                        echo "<label for='phone'>Số Điện Thoại:</label>";
                        echo "<input type='tel' pattern='0[0-9]{9,10}' value='$row_employee[phone_num]' id='phone' name='phone'><br>";
                    ?>

                    <!-- Ngày vào làm -->
                    <?php
                        echo "<label for='start_date'>Ngày vào làm:</label>";
                        echo "<input type='date' value='$row_employee[start_date]' id='start_date' name='start_date' readonly><br>";
                    ?>

                    <!-- Trạng thái -->
                    <?php
                        echo "<label for='status'>Trạng thái:</label>";
                        echo "<select id='status' name='status'>";
                        if ($row_employee['employee_status'] == "Full-time")
                        {
                            echo "<option value='Full-time' selected>Full-time</option>";
                            echo "<option value='Part-time'>Part-time</option>";
                        }
                        else
                        {
                            echo "<option value='Full-time'>Full-time</option>";
                            echo "<option value='Part-time' selected>Part-time</option>";
                        }
                        echo "<input type='submit' name='change1' value='Thay Đổi'>;"
                    ?>

                    <!-- Thông tin thêm -->
                    <?php
                        echo "<label for='info'>Thông tin thêm:</label>";
                        echo "<input type='info' value='$row_employee[user_info]' id='info' name='info'><br>";
                    ?>                 
                </form>
            </div>
            <div class="account-info" method="POST">
                <h2>Thông Tin Tài Khoản</h2><br>
                <form>
                    <!-- Tên đăng nhập -->
                    <div class="form-group">
                        <?php
                            echo "<label for='username'>Tên Đăng Nhập:</label>";
                            echo "<b>$row_employee[username]</b>";
                        ?>
                    </div>

                    <!-- ID -->
                    <div class="form-group">
                        <?php
                            echo "<label for='ID'>ID:</label>";
                            echo "<b>$employeeID</b>";
                        ?>
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray"><br>
                <form method="POST">
                    <!-- Mật khẩu cũ -->
                    <div class="form-group">
                        <label for="old-password">Mật Khẩu Cũ:</label><br>
                        <input type="password" id="old-password" name="old-password" value="<?php echo $row_employee['password']; ?>" readonly>
                        <input type="checkbox" onclick="ShowPassword()">
                    </div>

                    <!-- JavaScript của mật khẩu cũ-->
                    <script>
                    function ShowPassword() {
                        var x = document.getElementById("old-password");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                    </script>

                    <!-- Mật khẩu mới -->
                    <br>
                    <div class="form-group">
                        <label for="new-password">Mật Khẩu Mới:</label><br>
                        <input type="password" id="new-password" name="new-password"><br>
                    </div>
                    <br>

                    <!-- Xác nhận mật khẩu mới -->
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận Mật Khẩu Mới:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password"><br>
                    </div>         
                    
                    <!-- Nút thay đổi -->
                    <input type="submit" name="change2" value="Thay Đổi">
                </form>
            </div>
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