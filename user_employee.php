<?php
include("connection.php");
//if change1 button is pressed, update the user info (ignore the blank input)
if (isset($_POST['change1']))
{
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $info = $_POST['info'];
    if ($ho != "")
    {
        $query = "UPDATE user
                  SET sur_name = '$ho'
                  WHERE ID = $id;";
        $result = mysqli_query($con,$query);
    }
    if ($ten != "")
    {
        $query = "UPDATE user
                  SET last_name = '$ten'
                  WHERE ID = $id;";
        $result = mysqli_query($con,$query);
    }
    if ($email != "")
    {
        $query = "UPDATE user
                  SET email = '$email'
                  WHERE ID = $id;";
        $result = mysqli_query($con,$query);
    }
    if ($phone != "")
    {
        $query = "UPDATE user
                  SET phone_num = '$phone'
                  WHERE ID = $id;";
        $result = mysqli_query($con,$query);
    }
    if ($info != "")
    {
        $query = "UPDATE user
                  SET user_info = '$info'
                  WHERE ID = $id;";
        $result = mysqli_query($con,$query);
    }
    header("Refresh:0");
}

if (isset($_POST['change2']))
{
    $old_password = $_POST['old-password'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];
    //check blank input
    if ($old_password == "" || $new_password == "" || $confirm_password == "")
    {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
    }
    else
    {
        if ($old_password != $row['password'])
        {
            echo "<script>alert('Mật khẩu cũ không đúng!');</script>";
        }
        else
        {
            if ($new_password == $old_password)
            {
                echo "<script>alert('Mật khẩu mới không được trùng với mật khẩu cũ!');</script>";
            }
            else
            {
                if ($new_password != $confirm_password)
                {
                    echo "<script>alert('Mật khẩu mới không trùng khớp!');</script>";
                }
                else
                {
                    $query = "UPDATE user
                              SET password = '$new_password'
                              WHERE ID = $id;";
                    $result = mysqli_query($con,$query);
                    echo "<script>alert('Đổi mật khẩu thành công!');</script>";
                }
            }
        }
    }
    header("Refresh:0");
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

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Thông tin cá nhân</p>
        <div>
            <a href="user_employee.php">Cá nhân</a>
            <a href="user_employee.php">> Thông tin cá nhân</a>
        </div>
    </div>

    <div class="content">
    <div class="side-box">
            <a href="user_employee.php"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p> -->
            <!-- <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p> -->
            <?php
                echo "<p style='font-family: Times New Roman, Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F'>$row[sur_name] $row[last_name]</p>";
                echo "<p style='font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F'>ID: $id</p>";
                if ($id == 00000001)
                {
                    echo '<script>alert("You are not authorized to view this content.");</script>';
                    echo '<script>window.location.href = "login_success.php";</script>';
                    exit;
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
                        echo '<script>window.location.href = "login_success.php";</script>';
                        exit;
                        echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Customer</p>";
                    }
                }
            ?>
            <a href="user_employee.php"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="list_of_book.php" ><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.php"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="book_statistic.php"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="body-container">
            <div class="profile">
                <h2>Hồ Sơ Của Tôi</h2>
                <form method="POST" onsubmit="return confirmSubmit()" >
                    <div class="name">
                        <div>
                            <?php
                                echo "<label for='ho'>Họ:</label>";
                                echo "<input type='text' value='$row[sur_name]' id='ho' name='ho'>";
                            ?>
                        </div>
                        <div>
                            <?php
                                echo "<label for='ten'>Tên:</label>";
                                echo "<input type='text' value='$row[last_name]' id='ten' name='ten'>";
                            ?>
                        </div>
                    </div>
                    <br>
                    <?php
                        echo "<label for='email'>Email:</label>";
                        echo "<input type='email' value='$row[email]' id='email' name='email'><br>";
                        echo "<label for='phone'>Số Điện Thoại:</label>";
                        echo "<input type='tel' value='$row[phone_num]' id='phone' name='phone' pattern='0[0-9]{9,10}' title='Enter a valid phone number starting with 0 and followed by 9 to 10 digits' required><br>";
                        echo "<label for='info'>Thông tin thêm:</label>";
                        echo "<input type='info' value='$row[user_info]' id='info' name='info'><br>";
                        echo "<input type='submit' name='change1' value='Thay Đổi'>;"
                    ?>
                    <script>
                        function confirmSubmit() {
                            // Display a confirmation dialog
                            var confirmAction = confirm("Are you sure you want to update your information?");

                            if (!confirmAction) {
                                // Reset the form values to the original values
                                document.getElementById('ho').value = '<?php echo $row['sur_name']; ?>';
                                document.getElementById('ten').value = '<?php echo $row['last_name']; ?>';
                                document.getElementById('email').value = '<?php echo $row['email']; ?>';
                                document.getElementById('phone').value = '<?php echo $row['phone_num']; ?>';
                                document.getElementById('info').value = '<?php echo $row['user_info']; ?>';
                            }

                            // Return true if the user clicks OK, false otherwise
                            return confirmAction;
                        }
                    </script>
                            <!-- <label for="ho">Họ:</label>
                            <input type="text" id="ho" name="ho">
                        </div>
                        <div>
                            <label for="ten">Tên:</label>
                            <input type="text" id="ten" name="ten">
                        </div>
                    </div>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"><br>
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" id="phone" name="phone"><br>
                    <label for="info">Thông tin thêm:</label>
                    <input type="info" id="info" name="info"><br> -->
                </form>
            </div>
            <div class="account-info" method="POST">
                <h2>Thông Tin Tài Khoản</h2><br>
                <form>
                    <div class="form-group">
                        <?php
                            echo "<label for='username'>Tên Đăng Nhập:</label>";
                            echo "<b>$row[username]</b>";
                        ?>
                        <!-- <label for="username">Tên Đăng Nhập:</label>
                        <b>username</b> -->
                    </div>
                    <div class="form-group">
                        <?php
                            echo "<label for='ID'>ID:</label>";
                            echo "<b>$id</b>";
                        ?>
                        <!-- <label for="ID">ID:</label>
                        <b>ID</b> -->
                    </div>
                </form>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray"><br>
                <form method="POST">
                    <div class="form-group">
                        <label for="old-password">Mật Khẩu Cũ:</label><br>
                        <input type="password" id="old-password" name="old-password"><br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="new-password">Mật Khẩu Mới:</label><br>
                        <input type="password" id="new-password" name="new-password"><br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận Mật Khẩu Mới:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password"><br>
                    </div>                  
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