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
            <a href="index.html">Trang chủ</a>
            <a href="features_product_nologin.php">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user.html"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
        </div>
    </div>

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Quản lý trang chủ</p>
        <div>
            <a href="#">Cá nhân</a>
            <a href="#">> Quản lý sách</a>
            <a href="#">> Quản lý trang chủ</a>
        </div>
    </div>

    <div class="content">
        <div class="side-box">
            <a href="#"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p>
            <a href="user.html"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="#"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.html"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="book_statistic.html"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
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

            $sql_test_show = mysqli_query($mysqli, "SELECT A.book_ID, A.book_name, A.display_status, C.genre_name
                FROM `book` as A, `belongs_to` as B, `genre` as C
                WHERE A.book_ID = B.book_ID AND B.genre_ID = C.genre_ID AND A.display_status = 'Available'
                    AND (A.book_name LIKE '%$search_query%' OR C.genre_name LIKE '%$search_query%')
                GROUP BY C.genre_name, A.book_ID, A.book_name, A.display_status");

            $sql_test_hide = mysqli_query($mysqli, "SELECT A.book_ID, A.book_name, A.display_status, C.genre_name
                FROM `book` as A, `belongs_to` as B, `genre` as C
                WHERE A.book_ID = B.book_ID AND B.genre_ID = C.genre_ID AND A.display_status = 'Unavailable'
                    AND (A.book_name LIKE '%$search_query%' OR C.genre_name LIKE '%$search_query%')
                GROUP BY C.genre_name, A.book_ID, A.book_name, A.display_status");


            ?>

            <div class="shown-book">
                <p style="font-family: Arial, sans-serif; font-size: 20px; color: #B88E2F;">Sách được hiển thị</p>
                <table class="book-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Thể loại</th>
                            <th>Trạng thái</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody id="shown-book-table-body" onclick="SelectToHideBook()">
                        <!-- Table content will be dynamically populated here -->
                    <?php
                        while($item = mysqli_fetch_array($sql_test_show)) {
                            $tmp = $item['book_ID'];
                    ?>
                        <tr data-book-id="<?php echo $item['book_ID']; ?>" data-display-status="<?php echo $item['display_status']; ?>">
                            <!-- Example -->
                            <th><?php echo $count++ ?></th>
                            <th><?php echo $item['book_ID'] ?></th>
                            <th><?php echo $item['book_name'] ?></th>
                            <th><?php echo $item['genre_name'] ?></th>
                            <th><?php echo $item['display_status'] ?></th>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            
            <div class="unshown-book">
                <br>
                <p style="font-family: Arial, sans-serif; font-size: 20px; color: #B88E2F;">Sách đã ẩn</p>
                <table class="book-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Thể loại</th>
                            <th>Trạng thái</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody id="unshown-book-table-body" onclick="SelectToShowBook()">
                        <!-- Table content will be dynamically populated here -->
                    <?php
                        while($itemm = mysqli_fetch_array($sql_test_hide)) {
                            $tmp = $itemm['book_ID'];
                    ?>
                        <tr data-book-id="<?php echo $itemm['book_ID']; ?>" data-display-status="<?php echo $itemm['display_status']; ?>">
                            <!-- Example -->
                            <th><?php echo $countt++ ?></th>
                            <th><?php echo $itemm['book_ID'] ?></th>
                            <th><?php echo $itemm['book_name'] ?></th>
                            <th><?php echo $itemm['genre_name'] ?></th>
                            <th><?php echo $itemm['display_status'] ?></th>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            

            <script>
                document.getElementById('search_book').addEventListener('keyup', function(event) {
                    if (event.key === 'Enter') {
                        searchBooks();
                    }
                });

                function searchBooks() {
                    var searchQuery = document.getElementById('search_book').value;

                    // You can use AJAX to dynamically update the table content based on the search query
                    // For simplicity, let's assume you reload the page with the search query as a parameter
                    window.location.href = 'manage_homepage.php?search=' + encodeURIComponent(searchQuery);
                }
            </script>

            <!-- Add this function in your script tag or external JS file -->
            <script>
                function SelectToHideBook() {
                    var selectedRow = document.querySelector('#shown-book-table-body tr.selected');
                    if (selectedRow) {
                        var choice = prompt("Choose an action:\n1. View detail\n2. Hide the book");

                        if (choice === '1') {
                            var bookId = selectedRow.dataset.bookId;
                            window.location.href = 'update_book.php?id=' + bookId;
                        } else if (choice === '2') {
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
                        } else {
                            alert("Invalid choice. Please choose 1 or 2.");
                        }
                    } else {
                        alert("Please select a book to perform an action.");
                    }
                }
                function SelectToShowBook() {
                    var selectedRow = document.querySelector('#unshown-book-table-body tr.selected');

                    if (selectedRow) {
                        var choice = prompt("Choose an action:\n1. View detail\n2. Show the book");

                        if (choice === '1') {
                            var bookId = selectedRow.dataset.bookId;
                            window.location.href = 'update_book.php?id=' + bookId;
                        } else if (choice === '2') {
                            // Hide the book
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
                        } else {
                            alert("Invalid choice. Please choose 1 or 2.");
                        }
                    } else {
                        alert("Please select a book to perform an action.");
                    }
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


            <div class="promotion">
                <p style="font-family: Arial, sans-serif; font-size: 20px; color: #B88E2F;">Quảng cáo</p>
                <input type="file" id="image-upload" accept="image/*">
                <button class="upload-button" onclick="uploadImage()">Hiển thị hình</button>
                <div id="uploaded-image-container"></div>
            </div>
            
            <script>
                function uploadImage() {
                    var input = document.getElementById('image-upload');
                    var container = document.getElementById('uploaded-image-container');
            
                    var file = input.files[0];
            
                    if (file) {
                        var reader = new FileReader();
            
                        reader.onload = function (e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            container.innerHTML = ''; // Clear previous content
                            container.appendChild(img);
                        };
            
                        reader.readAsDataURL(file);
                    }
                }
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