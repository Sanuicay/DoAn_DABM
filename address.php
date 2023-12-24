<?php
include 'connection.php';
// $con = mysqli_connect("localhost:3307","root","","doan");
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }
// check if the user is customer or not
$query = "SELECT sur_name, last_name
        FROM member, user
        WHERE member.ID = user.ID AND user.ID = $id;";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
if ($count != 1)
{
    echo "<script>alert('You dont have permission to access this page!')</script>";
    echo "<script>window.location.href='login_success.php'</script>";
}
// When click on update button update the address in that row
if (isset($_POST['update'])) {
    if (empty($_POST['new_address'])) {
        echo "<script>alert('Address field is empty!')</script>";
        echo "<script>window.location.href='address.php'</script>";
    } else {
        $old_address = $_POST['old_address'];
        $new_address = $_POST['new_address'];
        if ($old_address != $new_address) {
            // SQL query to update the address
            $query = "UPDATE delivery_address
                    SET address = '$new_address'
                    WHERE address = '$old_address' AND ID = $id;";

            // Execute the query
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Cập nhật thành công!')</script>";
                echo "<script>window.location.href='address.php'</script>";
            } else {
                echo "<script>alert('Cập nhật thất bại!')</script>";
                echo "<script>window.location.href='address.php'</script>";
            }
        } else {
            echo "<script>alert('Địa chỉ mới trùng với địa chỉ cũ!')</script>";
            echo "<script>window.location.href='address.php'</script>";
        }
    }
}

// When click on delete button
if (isset($_POST['delete'])) {
    if (isset($_POST['delete'])) {
        if (!empty($_POST['address'])) {
            $address = $_POST['address'];

            // SQL query to delete the address
            $query = "DELETE FROM `delivery_address` WHERE address = ? AND ID = $id;";
        
            // Prepare the statement
            $stmt = mysqli_prepare($con, $query);
        
            // Bind the address variable to the prepared statement
            mysqli_stmt_bind_param($stmt, "s", $address);
        
            // Execute the statement
            $result = mysqli_stmt_execute($stmt);
        
            if ($result) {
                echo "<script>alert('Xóa thành công!')</script>";
                echo "<script>window.location.href='address.php'</script>";
            } else {
                echo "<script>alert('Xóa thất bại!')</script>";
                echo "<script>window.location.href='address.php'</script>";
            }
        } else {
            echo "<script>alert('Address field is empty!')</script>";
        }
    }
}

// When click on add address button, pop up a form to add address and add it to the database
if (isset($_POST['add_address'])) {
    $new_address = $_POST['address'];
    if (empty($new_address)) {
        echo "<script>alert('Address field is empty!')</script>";
        echo "<script>window.location.href='address.php'</script>";
    } else {
        // SQL query to add the new address
        $query = "INSERT INTO delivery_address (ID, address)
                VALUES ($id, '$new_address');";

        // Execute the query
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Thêm địa chỉ thành công!')</script>";
            echo "<script>window.location.href='address.php'</script>";
        } else {
            echo "<script>alert('Thêm địa chỉ thất bại!')</script>";
            echo "<script>window.location.href='address.php'</script>";
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
    <link rel="stylesheet" href="css/address.css">
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
            <a href="#">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user_member.php"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
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
        <p class="box-text">Địa chỉ của tôi</p>
        <div>
            <a href="user_member.php">Cá nhân</a>
            <a href="address.php">> Địa chỉ của tôi</a>
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
            <a href="user_member.php"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="address.php"><img class="side-box-button" src="img/button_my_address.png" alt="Button2"></a>
            <a href="customer_order_history.php"><img class="side-box-last-button" src="img/purchase_history_button.png" alt="Button3"></a>
        </div>
        
        <div class="banner">
            <div style="display: flex; justify-content: space-between;">
                <div class="title">Địa chỉ của tôi</div>
                <form method="POST" id="addressForm" style="display: none;">
                    <input type="text" name="address" placeholder="Nhập địa chỉ mới">
                    <input type="submit" name="add_address" value="Thêm địa chỉ">
                    <input type="submit" onclick="document.getElementById('addressForm').style.display = 'none';" value="Hủy">
                </form>
                <div style="display: flex; justify-content: space-between;">
                    <input type="button" onclick="openForm()" name="add address" value="Thêm địa chỉ">
                </div>             
            </div>
            <form method="POST">
            <!-- Your existing PHP code -->
            <?php
                $query = "SELECT address
                        FROM delivery_address, member, user
                        WHERE delivery_address.ID = member.ID AND member.ID = user.ID AND user.ID = $id;";
                $result = mysqli_query($con,$query);
                $i = 0;
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div id='addressDiv{$i}' style='display: flex; justify-content: space-between; align-items: center;'>";
                    echo "<p>{$row['address']}</p>"; // Display the address as text
                    echo "<div>";
                    echo "<button type='button' onclick='openUpdateForm(\"{$row['address']}\", \"addressDiv{$i}\")'>Cập nhật</button>";
                    echo "<button type='button' onclick='openDeleteForm(\"{$row['address']}\", \"addressDiv{$i}\")'>Xóa</button>";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
            ?>
            <form>
        </div>

        <script>
            function openUpdateForm(address, divId) {
                var originalContent = document.getElementById(divId).innerHTML;
                var encodedContent = encodeURIComponent(originalContent);
                var updateForm = "<form method='POST' style='display: flex; justify-content: space-between; align-items: center;'>" +
                                "<p><input type='text' name='new_address' placeholder='Nhập địa chỉ mới' style='border: none; background: none; width: 200px; background-color: #F9F1E7'></p>" +
                                "<div>" +
                                "<input type='hidden' name='old_address' value='" + address + "'>" +
                                "<input type='submit' name='update' value='Cập nhật' style='color: black;'>" +
                                "<input type='submit' onclick='cancelUpdate(\"" + divId + "\", \"" + encodedContent + "\")' value='Hủy' style='margin-right: 20px; color: black;'>" +
                                "</div>" +
                                "</form>";
                document.getElementById(divId).innerHTML = updateForm;
            }

            function cancelUpdate(divId, encodedContent) {
                var originalContent = decodeURIComponent(encodedContent);
                document.getElementById(divId).innerHTML = originalContent;
            }
            
            //open delete form will have a pre-filled address field and can't be edited
            function openDeleteForm(address, divId) {
                var originalContent = document.getElementById(divId).innerHTML;
                var encodedContent = encodeURIComponent(originalContent);
                var deleteForm = "<form method='POST' style='display: flex; justify-content: space-between; align-items: center;'>" +
                                "<p><input type='text' name='address' value='" + address + "' style='border: none; background: none; width: 200px; background-color: #F9F1E7' readonly></p>" +
                                "<div>" +
                                "<input type='submit' name='delete' value='Xóa' style='color: black;'>" +
                                "<input type='submit' onclick='cancelDelete(\"" + divId + "\", \"" + encodedContent + "\")' value='Hủy' style='margin-right: 20px; color: black;'>" +
                                "</div>" +
                                "</form>";
                document.getElementById(divId).innerHTML = deleteForm;
            }

            function cancelDelete(divId, encodedContent) {
                var originalContent = decodeURIComponent(encodedContent);
                document.getElementById(divId).innerHTML = originalContent;
            }
        </script>

        <script>
            function openForm() {
                document.getElementById("addressForm").style.display = "block";
            }
        </script>
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