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
    <link rel="stylesheet" href="css/add_new_book.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/cover-box.css">
    <link rel="stylesheet" href="css/logo.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/book_statistic.css">
    <link rel="stylesheet" href="css/manage_homepage.css">

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
        <p class="box-text">Quản lý trang chủ</p>
        <div>
            <a href="user_employee.php">Cá nhân</a>
            <a href="#">> Quản lý sách</a>
            <a href="book_statistic.php">> Quản lý trang chủ</a>
            
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

        <div class="content-box">
            <br>
            <img class="logo_DABM" src="img/logo_DABM.png" alt="Logo">
            <br>
            <br>
            <div class="search-input-box">
                <label for="search_book">Tìm kiếm sách:</label>
                <input type="text" id="search_book" name="search_book" placeholder="Tìm kiếm sách">
                <!-- Thêm icon filter-->
            </div>

            <?php
            $count = 1;
            $countt = 1;

            $search_query = isset($_GET['search']) ? $_GET['search'] : '';
            $escaped_search_query = mysqli_real_escape_string($mysqli, $search_query); // Escape the search query to prevent SQL injection
           // Split the search query into individual words
            $search_words = explode(' ', $escaped_search_query);

            // Create an array to store conditions for each word
            $conditions = [];

            foreach ($search_words as $word) {
                // Add conditions for each word (case-insensitive search)
                $conditions[] = "(LOWER(A.book_name) LIKE LOWER('%$word%') OR LOWER(C.genre_name) LIKE LOWER('%$word%') OR A.book_ID LIKE '%$word%')";
            }

            // Combine conditions using AND
            $conditions_query = implode(' AND ', $conditions);

            $sql_test_show = mysqli_query($mysqli, "SELECT A.book_ID, A.book_name, A.display_status, C.genre_name
                FROM `book` as A, `belongs_to` as B, `genre` as C
                WHERE A.book_ID = B.book_ID AND B.genre_ID = C.genre_ID AND A.display_status = 'Available' AND A.deleted_tag = 0
                    AND $conditions_query
                GROUP BY C.genre_name, A.book_ID, A.book_name, A.display_status");

            $sql_test_hide = mysqli_query($mysqli, "SELECT A.book_ID, A.book_name, A.display_status, C.genre_name
                FROM `book` as A, `belongs_to` as B, `genre` as C
                WHERE A.book_ID = B.book_ID AND B.genre_ID = C.genre_ID AND A.display_status = 'Unavailable' AND A.deleted_tag = 0
                    AND $conditions_query
                GROUP BY C.genre_name, A.book_ID, A.book_name, A.display_status");
            ?>

            <style>
                .book-table-container {
                    max-height: 200px;
                    overflow-y: auto;
                }

                .book-table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .book-table th, .book-table td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }

                .book-table thead {
                    position: sticky;
                    top: 0;
                }

                .book-table th{
                    background-color: #FFECD5;
                }
            </style>
            <div class="shown-book">
                <p style="font-family: Arial, sans-serif; font-size: 20px; color: #B88E2F;">Sách được hiển thị</p>
                <div class="book-table-container">
                    <table class="book-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã sách</th>
                                <th>Tên sách</th>
                                <th>Thể loại</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody id="shown-book-table-body" >
                            <!-- Table content will be dynamically populated here -->
                        <?php
                            while($item = mysqli_fetch_array($sql_test_show)) {
                                $tmp = $item['book_ID'];
                        ?>
                            <tr data-book-id="<?php echo $item['book_ID']; ?>" data-display-status="<?php echo $item['display_status']; ?>">
                                <!-- Example -->
                                <th onclick="ViewDetail1()"><?php echo $count++ ?></th>
                                <th onclick="ViewDetail1()"><?php echo $item['book_ID'] ?></th>
                                <th onclick="ViewDetail1()"><?php echo $item['book_name'] ?></th>
                                <th onclick="ViewDetail1()"><?php echo $item['genre_name'] ?></th>
                                <th onclick="ViewDetail1()"><?php echo $item['display_status'] ?></th>
                                <th style="color: red;" onclick="SelectToHideBook()">Ẩn sách</th>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="unshown-book">
                <br>
                <p style="font-family: Arial, sans-serif; font-size: 20px; color: #B88E2F;">Sách đã ẩn</p>
                <div class="book-table-container">
                    <table class="book-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã sách</th>
                                <th>Tên sách</th>
                                <th>Thể loại</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody id="unshown-book-table-body">
                            <!-- Table content will be dynamically populated here -->
                        <?php
                            while($itemm = mysqli_fetch_array($sql_test_hide)) {
                                $tmp = $itemm['book_ID'];
                        ?>
                            <tr data-book-id="<?php echo $itemm['book_ID']; ?>" data-display-status="<?php echo $itemm['display_status']; ?>">
                                <!-- Example -->
                                <th onclick="ViewDetail2()"><?php echo $countt++ ?></th>
                                <th onclick="ViewDetail2()"><?php echo $itemm['book_ID'] ?></th>
                                <th onclick="ViewDetail2()"><?php echo $itemm['book_name'] ?></th>
                                <th onclick="ViewDetail2()"><?php echo $itemm['genre_name'] ?></th>
                                <th onclick="ViewDetail2()"><?php echo $itemm['display_status'] ?></th>
                                <th style="color:mediumaquamarine;" onclick="SelectToShowBook()">Hiển thị sách</th>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            

            <script>
                document.getElementById('search_book').addEventListener('keyup', function(event) {
                    if (event.key === 'Enter') {
                        searchBooks();
                    }
                });

                function searchBooks() {
                    var searchQuery = document.getElementById('search_book').value.toLowerCase();
                    window.location.href = 'manage_homepage.php?search=' + encodeURIComponent(searchQuery);
                }
            </script>

            <!-- Add this function in your script tag or external JS file -->
            <script>
                function ViewDetail1() {
                    var selectedRow = document.querySelector('#shown-book-table-body tr.selected');
                    if (selectedRow) {
                        var bookId = selectedRow.dataset.bookId;
                        window.location.href = 'update_book.php?id=' + bookId;
                    }
                }

                function ViewDetail2() {
                    var selectedRow = document.querySelector('#unshown-book-table-body tr.selected');
                    if (selectedRow) {
                        var bookId = selectedRow.dataset.bookId;
                        window.location.href = 'update_book.php?id=' + bookId;
                    }
                }
                function SelectToHideBook() {
                    var selectedRow = document.querySelector('#shown-book-table-body tr.selected');
                    if (selectedRow) {
                        var confirmAction = confirm("Are you sure you want to hide the book?");
                        if (confirmAction) {
                            // Hide the book
                            var bookId = selectedRow.dataset.bookId;
                            var data = { bookId: bookId, status: 'Unavailable' };

                            // Create XHR object
                            var xhr = new XMLHttpRequest();

                            // Configure it: POST-request for the given URL
                            xhr.open("POST", "./database_scripts/update_status_book.php", true);

                            // Set up the request headers
                            xhr.setRequestHeader("Content-Type", "application/json");

                            // Set up a callback function to handle the response
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4) { // Request is complete
                                    if (xhr.status === 200) { // Successful response
                                        // Handle success (e.g., update the UI)
                                        selectedRow.remove();
                                        alert("Book is now hidden!");
                                    } else {
                                        alert("Error hiding the book!");
                                    }
                                }
                            };

                            // Send the request with the bookId and status as POST parameters
                            xhr.send(JSON.stringify(data));
                        }
                    } /*else {
                        alert("Please select a book to perform an action.");
                    }*/
                }
                function SelectToShowBook() {
                    var selectedRow = document.querySelector('#unshown-book-table-body tr.selected');

                    if (selectedRow) {
                        var confirmAction = confirm("Are you sure you want to show the book?");
                        if (confirmAction) {
                            // Show the book
                            var bookId = selectedRow.dataset.bookId;
                            var data = { bookId: bookId, status: 'Available' };

                            // Create XHR object
                            var xhr = new XMLHttpRequest();

                            // Configure it: POST-request for the given URL
                            xhr.open("POST", "./database_scripts/update_status_book.php", true);

                            // Set up the request headers
                            xhr.setRequestHeader("Content-Type", "application/json");
                            
                            // Set up a callback function to handle the response
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4) { // Request is complete
                                    if (xhr.status === 200) { // Successful response
                                        // Handle success (e.g., update the UI)
                                        selectedRow.remove();
                                        alert("Book is now available!");
                                    } else {
                                        alert("Error making the book available!");
                                    }
                                }
                            };

                            // Send the request with the bookId and status as POST parameters
                            xhr.send(JSON.stringify(data));
                        }
                    } /*else {
                        alert("Please select a book to perform an action.");
                    }*/
                }

                // Add click event handlers to rows
                document.querySelectorAll('#shown-book-table-body tr').forEach(function(row) {
                    row.addEventListener('click', function() {
                        this.classList.toggle('selected');
                    });
                });

                document.querySelectorAll('#unshown-book-table-body tr').forEach(function(row) {
                    row.addEventListener('click', function() {
                        this.classList.toggle('selected');
                    });
                });
            </script>


            
            
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
</html>