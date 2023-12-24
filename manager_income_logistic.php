<?php
    include_once('connection.php');
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
    <link rel="stylesheet" href="css/logo.css">
    <link rel="stylesheet" href="css/book_statistic.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <p class="box-text">Thống kê doanh thu</p>
        <div>
            <a href="manager_logistic.php">Thống kê</a>
            <a href="manager_income_logistic.php">> Thống kê doanh thu</a>
        </div>
    </div>

    <div class="content">
        <div class="side-box">
            <a href="user_employee.php"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
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
                    echo '<script>alert("You are not authorized to view this content.");</script>';
                    echo '<script>window.location.href = "login_success.php";</script>';
                    exit;
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
            <a href="manager_employee.php"><img class="side-box-button" src="img/button_employee_management.png" alt="Button1"></a>
            <a href="manager_logistic.php"><img class="side-box-button" src="img/button_logistics.png" alt="Button1"></a>
            <a href="#"><img class="side-box-last-button"></a>
        </div>

        <!-- content-box -->
        <div class="content-box">
            <br>
            <img class="logo_DABM" src="img/logo_DABM.png" alt="Logo">
            <br>
            <br>
            <style>

            </style>
            <div class="select-box">
                <div class="date-input">
                    <form method="post" action="" id="statisticForm">
                        <label for="from_time">Từ:</label>
                        <input type="date" id="from_time" name="from_time">
                        <label for="to_time">Đến:</label>
                        <input type="date" id="to_time" name="to_time">
                        <label for='theloai'>Mã thể loại:</label>
                        <select id='theloaiID' name='theloaiID'>
                        <option value='Không'>Không</option>
                        <?php
                        $query = "SELECT genre_ID, genre_name
                                    FROM genre;";
                        $result = mysqli_query($con,$query);
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<option value='{$row['genre_ID']}'>{$row['genre_ID']} ({$row['genre_name']})</option>";
                        }
                        ?>
                    </select><br>
                        <button type="submit" name="submit" style="display: flex; align-items: center; justify-content: center; background-color: #FFECD5; border-radius: 20px; width: 200px; height: 40px; color: #B88E2F; border: 1px solid #B88E2F; margin: 0 auto;">Xác nhận thống kê</button>
                    </form>
                </div>
            </div>
            
            <!-- Auto fill the date input -->
            <script>
				window.onload = function() {
					var today = new Date();
					var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
					document.getElementById("from_time").value = '2023-01-01';
					document.getElementById("to_time").value = date;
				};

				function redirectToBookDetailsPage(ID) {
					window.location.href = 'single_product.php?id=' + ID;
				}
			</script>
            <br><br>

            <?php
                include_once('./database_scripts/get_date.php');

                $from_date = isset($_POST['from_time']) ? $_POST['from_time'] : '';
                $to_date = isset($_POST['to_time']) ? $_POST['to_time'] : '';

                $bookStatistics_date = getDateRange($mysqli, $from_date, $to_date);
            ?>

            <a style="font-size:30px; color:#B88E2F; font-weight: bold; text-align: center; display: block; margin: 0 auto;" id="dateRangeText">THỐNG KÊ DOANH THU TỪ NGÀY A ĐẾN B</a>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Set the selected genre value after the page reloads
                    var storedGenre = localStorage.getItem('storedGenre');
                    if (storedGenre) {
                        document.getElementById("theloaiID").value = storedGenre;
                    }

                    document.getElementById("statisticForm").addEventListener("submit", function (event) {
                        var fromTime = document.getElementById("from_time").value;
                        var toTime = document.getElementById("to_time").value;
                        var genre = document.getElementById("theloaiID").value; // Get the current value of "theloaiID"

                        if (fromTime > toTime) {
                            alert("Ngày bắt đầu không thể lớn hơn ngày kết thúc. Vui lòng nhập lại.");
                            event.preventDefault(); // Prevent form submission
                        } else {
                            // Store the selected genre value before the form is submitted
                            localStorage.setItem('storedGenre', genre);
                        }
                    });
                });

                var date_statistic = <?php echo json_encode($bookStatistics_date); ?>;

                // Format date to "dd-mm-yyyy"
                function formatDate(dateString) {
                    var date = new Date(dateString);
                    var day = date.getDate();
                    var month = date.getMonth() + 1; // Months are zero-based
                    var year = date.getFullYear();

                    // Add leading zero if needed
                    day = day < 10 ? '0' + day : day;
                    month = month < 10 ? '0' + month : month;

                    return day + '-' + month + '-' + year;
                }

                // Update the text of the <a> tag with the formatted date range
                var fromTime = formatDate(date_statistic[0]['from_date']);
                var toTime = formatDate(date_statistic[0]['to_date']);
                var genre = localStorage.getItem('storedGenre');
                var dateRangeText = "THỐNG KÊ DOANH THU TỪ NGÀY " + fromTime + " ĐẾN " + toTime + "\nMÃ THỂ LOẠI: " + genre;
                document.getElementById("dateRangeText").innerText = dateRangeText;
            </script>

            <?php

                $from_date = isset($_POST['from_time']) ? $_POST['from_time'] : '';
                $to_date = isset($_POST['to_time']) ? $_POST['to_time'] : '';
                $genre_ID = isset($_POST['theloaiID']) ? $_POST['theloaiID'] : '';

                if ($genre_ID == 'Không')
                {
                    $sqlSales = "CALL GetTotalPurchaseAndSalesInRange('$from_date', '$to_date')";
                }
                else
                {
                    $sqlSales = "CALL GetTotalPurchaseAndSalesInRangeWithGenre('$from_date', '$to_date', '$genre_ID')";
                }
                //echo $sqlSales;
                $totalSalesData = mysqli_query($con, $sqlSales);

                /*if (!$totalSalesData) {
                    echo "Error: " . mysqli_error($con);
                } else {
                    echo "Query executed successfully.";
                }*/
                //var_dump($totalSalesData);

                $totalSales = [];

                if ($totalSalesData) {
                    while ($row = mysqli_fetch_assoc($totalSalesData)) {
                        // Assuming your stored procedure returns 'sales_date' and 'total_sales'
                        $totalSales[] = [
                            'date' => $row['month'],
                            'sales' => $row['total_sales'],
                            'profit' => $row['total_profit'],
                        ];
                    }
                    mysqli_free_result($totalSalesData);
                }
                // Debugging
                //var_dump($from_date, $to_date);
                //var_dump($sqlSales);
                //var_dump($totalSalesData); 
            ?>

            <!-- Add new canvas for the chart -->
            <canvas id="myChart"></canvas>

            <script>
                // Data for the bar chart
                var barChartData = {
                    labels: <?php echo json_encode(array_column($totalSales, 'date')); ?>,
                    datasets: [{
                        label: 'Doanh thu',
                        //borderColor: window.chartColors.red,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        data: <?php echo json_encode(array_column($totalSales, 'sales')); ?>
                    },
                    {
                        label: 'Lợi nhuận',
                        borderColor: 'rgba(54, 162, 235, 1)', 
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        data: <?php echo json_encode(array_column($totalSales, 'profit')); ?>
                    }]
                };

                // Get the canvas element
                var ctx = document.getElementById('myChart').getContext('2d');

                // Create the bar chart
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        scales: {
                            x: [{
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    displayFormats: {
                                        day: 'DD-MM-YYYY'
                                    },
                                },
                                position: 'bottom'
                            }],
                            y: {
                                // other y-axis options
                            }
                        }
                    }
                });
            </script>

            
                <br><br>
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