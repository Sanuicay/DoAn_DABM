<?php
include("connection.php");

if (isset($_POST['confirm'])) {
    $tensach = $_POST['tensach'];
    $nhaxuatbanID = $_POST['nhaxuatbanID'];
    $masach = $_POST['masach'];
    $sotrang = $_POST['sotrang'];
    $ngayphathanh = $_POST['ngayphathanh'];
    $tentacgiaID = $_POST['tentacgiaID'];
    $namxuatban = $_POST['namxuatban'];
    $theloaiID = $_POST['theloaiID'];
    $soluong = $_POST['soluong'];
    $giatien = $_POST['giatien'];
    $gianhap = $_POST['gianhap'];
    $bookstatus = $_POST['bookstatus'];
    $bookdes = $_POST['info'];


    // Handle file upload
    $img_path = ''; // Initialize the variable
    if (isset($_FILES['img_file']) && $_FILES['img_file']['error'] == 0) {
        $target_dir = "img/Books_Images/"; // Specify the directory where you want to store uploaded images
        $target_file = $target_dir . basename($_FILES['img_file']['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['img_file']['tmp_name'], $target_file)) {
            // File upload was successful, save the file path to the img_path variable
            $img_path = $target_file;
            echo "<script>alert('File uploaded successfully!')</script>";
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }

    // Check null and numeric validations
    if (
        $tensach == "" || $nhaxuatbanID == "" || $masach == "" || $sotrang == "" || $ngayphathanh == "" ||
        $tentacgiaID == "" || $namxuatban == "" || $theloaiID == "" || $soluong == "" || $giatien == "" ||
        $gianhap == "" || $bookstatus == "" || !is_numeric($sotrang) || !is_numeric($soluong) ||
        !is_numeric($giatien) || !is_numeric($gianhap) || $sotrang < 0 || $soluong < 0 || $giatien < 0 || $gianhap < 0
    ) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin và thông tin hợp lệ!')</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $query1 = "INSERT INTO `book` (`book_ID`, `book_name`, `publisher_ID`, `publication_year`, `release_date`, `page_count`, `sale_price`, `remaining_quantity`, `purchase_price`, `display_status`, `img_path`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CONVERT(?, BINARY), ?, ?)";
        $query2 = "INSERT INTO `written_by` VALUES (?, ?)";
        $query3 = "INSERT INTO `belongs_to` VALUES (?, ?)";

        // Use prepared statements to insert data into the database
        $stmt1 = mysqli_prepare($con, $query1);
        $stmt2 = mysqli_prepare($con, $query2);
        $stmt3 = mysqli_prepare($con, $query3);

        if ($stmt1 && $stmt2 && $stmt3) {
            // Bind parameters to the placeholders
            mysqli_stmt_bind_param($stmt1, "sssssiidisss", $masach, $tensach, $nhaxuatbanID, $namxuatban, $ngayphathanh, $sotrang, $giatien, $soluong, $gianhap, $bookstatus, $img_path, $bookdes);
            mysqli_stmt_bind_param($stmt2, "ss", $masach, $tentacgiaID);
            mysqli_stmt_bind_param($stmt3, "ss", $masach, $theloaiID);

            // Execute the statements
            $result1 = mysqli_stmt_execute($stmt1);
            $result2 = mysqli_stmt_execute($stmt2);
            $result3 = mysqli_stmt_execute($stmt3);

            // Check if the queries were successful
            if ($result1 && $result2 && $result3) {
                echo "<script>alert('Book added successfully!')</script>";
                header('location:list_of_book.php');
            } else {
                echo "<script>alert('Error adding book to the database.')</script>";
            }

            // Close the statements
            mysqli_stmt_close($stmt1);
            mysqli_stmt_close($stmt2);
            mysqli_stmt_close($stmt3);
        } else {
            echo "<script>alert('Error preparing statements.')</script>";
        }
    }
} else if (isset($_POST['cancel'])) {
    header('location:list_of_book.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/add_new_book.css">
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
        <p class="box-text">Nhập hàng mới</p>
        <div>
            <a href="user_employee.php">Cá nhân</a>
            <a href="list_of_book.php">> Quản lý sách</a>
            <a href="#">> Nhập hàng mới</a>
        </div>
    </div>

    <div class="content">
        <div class="side-box">
            <img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar">
            <br>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p> -->
            <?php
            echo "<p style='font-family: Times New Roman, Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F'>{$row['sur_name']} {$row['last_name']}</p>";
            echo "<p style='font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F'>ID: {$user['ID']}</p>";
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
        <div class="body-container">
            <div class="profile">
                <h2 style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">THÔNG TIN SÁCH</h2>
                <form method="POST"  enctype="multipart/form-data" onsubmit="return confirmSubmit()">
                    <div class="name">
                        <div>
                            <!-- tensach -->
                            <label for='tensach'>Tên sách</label><br>
                            <input type='text' id='tensach' name='tensach'><br>

                            <!-- nhaxuatbanID -->
                            
                            <label for='nhaxuatban'>Mã nhà xuất bản</label><br>
                            <select id='nhaxuatbanID' name='nhaxuatbanID'>
                            <?php
                            $query = "SELECT publisher_ID, publisher_name
                                      FROM publisher;";
                            $result = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='{$row['publisher_ID']}'>{$row['publisher_ID']} ({$row['publisher_name']})</option>";
                            }
                            echo "</select><br>";
                            ?>

                            <!-- masach -->                   
                            <?php
                                echo "<label for='masach'>Mã sách:</label>";
                                $sql = "SELECT MAX(CAST(book_ID AS UNSIGNED)) AS max_order_ID
                                FROM `book`;";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $bookID = ($row['max_order_ID'] + 1);
                        echo "<input type='text' id='masach' name='masach' value='$bookID' readonly><br>";
                            ?>



                            <!-- sotrang -->
                            <label for='sotrang'>Số trang</label><br>
                            <input type='number' id='sotrang' name='sotrang' min='0'><br>

                            <!-- ngayphathanh -->
                            <label for='ngayphathanh'>Ngày phát hành</label><br>
                            <input type='date' id='ngayphathanh' name='ngayphathanh'><br>

                            <!-- trangthaihienthi -->
                            <label for='bookstatus'>Trạng thái hiển thị</label><br>
                            <select id='bookstatus' name='bookstatus'>
                                <!--<option value='Available' <?php echo ($row_book['display_status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                <option value='Unavailable' <?php echo ($row_book['display_status'] == 'Unavailable') ? 'selected' : ''; ?>>Unavailable</option>-->
                                <option value='Available'>Available</option>
                                <option value='Unavailable'>Unavailable</option>
                            </select><br>
                            </div>
                        <div>
                            <!-- tentacgiaID -->
                            <label for='tentacgia'>Mã tác giả</label><br>
                            <select id='tentacgiaID' name='tentacgiaID'>
                            <?php
                            $query = "SELECT author_ID, author_name
                                      FROM author;";
                            $result = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='{$row['author_ID']}'>{$row['author_ID']} ({$row['author_name']})</option>";
                            }
                            echo "</select><br>";
                            ?>
                            
                            <!-- namxuatban -->
                            <label for='namxuatban'>Năm xuất bản</label><br>
                            <select id='namxuatban' name='namxuatban'>
                                <?php
                                $year = date("Y"); // get the current year
                                for ($i = $year; $i >= 1900; $i--) { // replace 1900 with the earliest year you want
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select><br>

                            <!-- theloaiID -->
                            <label for='theloai'>Mã thể loại</label><br>
                            <select id='theloaiID' name='theloaiID'>
                            <?php
                            $query = "SELECT genre_ID, genre_name
                                      FROM genre;";
                            $result = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='{$row['genre_ID']}'>{$row['genre_ID']} ({$row['genre_name']})</option>";
                            }
                            echo "</select><br>";
                            ?>

                            <!-- soluong -->
                            <label for='soluong'>Số lượng</label><br>
                            <input type='number' id='soluong' name='soluong' min='0' value='0' readonly><br>

                            <!-- giatien -->
                            <label for='giatien'>Giá tiền</label><br>
                            <input type='number' id='giatien' name='giatien' min='0'><br>

                            <!-- gianhap -->
                            <label for="gianhap">Giá nhập</label><br>
                            <input type="number" id="gianhap" name="gianhap" min='0'>
                        </div>
                    </div>
                    <style>
                        .button-container input[name="cancel"] {
                            margin-top: 20px;
                            width: 300px;
                            height: 40px;
                            color: #000;
                            font-weight: bold;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            border-radius: 20px;
                            cursor: pointer;
                            background-color: #F8C2B1;
                        }
                        .button-container input[name="cancel"]:hover {
                            background-color: #F5A99A;
                        }
                    </style>
                    <div class="description">
                        <label for="info">Mô tả thêm</label><br>
                        <input type="text" id="info" name="info">
                    </div>
                    <div class="button-container">
                        <input type="submit" name="confirm" value="XÁC NHẬN">
                        <input type="button" name="cancel" value="HỦY" onclick="confirmCancel()">
                    </div>
                    <script>
                    function confirmSubmit() {
                        // Display a confirmation dialog
                        var confirmAction = confirm("Are you sure you want to add new book?");
                        
                        // Return true if the user clicks OK, false otherwise
                        return confirmAction;
                    }
                    function confirmCancel() {
                        // Display a confirmation dialog for cancel
                        var confirmAction = confirm("Are you sure you want to cancel?");
                        
                        // If the user clicks OK, navigate to the cancel page
                        if (confirmAction) {
                            window.location.href = 'add_new_book.php';
                        }
                    }
                    </script>
            </div>
            <style>
                #uploaded_image {
                    max-width: 140%;
                    max-height: 350%;
                }
                .image{
                    padding: 50px;
                    align-items: center;
                    margin-top: 200px;
                    display: flex;
                    flex-direction: column;
                }
            </style>
            <div class="image">
            <label for="img_file" style="display: flex; align-items: center; justify-content: center; background-color: #FFECD5; border-radius: 20px; width: 200px; height: 50px; margin-bottom:20px; color: #B88E2F; border: 1px solid #B88E2F;">Thêm ảnh minh họa</label>
                <input type="file" name="img_file" id="img_file" onchange="previewImage(this)">
                <!-- Image preview container -->
                <div class="image-preview-container" style="display: flex;">
                    <img src="<?php echo $img_path; ?>" alt="Book Image" id="uploaded_image">
                </div>
                <div id="error_message" style="color: red;"></div>
            </div>

            <script>
                var imgPath = "<?php echo isset($img_path) ? $img_path : ''; ?>";
                document.getElementById('uploaded_image').src = imgPath;
            </script>
            </form>
        </div>
        <script>
            function previewImage(input) {
                var uploadedImage = document.getElementById('uploaded_image');
                var errorMessage = document.getElementById('error_message');
                var reader = new FileReader();
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                var maxFileSize = 5000000; // 5 MB

                reader.onload = function (e) {
                    uploadedImage.src = e.target.result;
                    errorMessage.innerHTML = ''; // Clear any previous error messages
                };

                if (input.files && input.files[0]) {
                    var fileSize = input.files[0].size;

                    if (!allowedExtensions.exec(input.value)) {
                        errorMessage.innerHTML = 'Invalid file type. Please upload an image with extensions .jpg, .jpeg, .png, or .gif.';
                        uploadedImage.src = ''; // Clear the image preview
                    } else if (fileSize > maxFileSize) {
                        errorMessage.innerHTML = 'File size exceeds the limit (5 MB). Please choose a smaller file.';
                        uploadedImage.src = ''; // Clear the image preview
                    } else {
                        reader.readAsDataURL(input.files[0]);
                    }
                }
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