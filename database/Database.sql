CREATE DATABASE IF NOT EXISTS DABM;
USE DABM;

-- ************************************** `user`

CREATE TABLE `user`
(
 `ID`        varchar(45) NOT NULL ,
 `sur_name`  varchar(45) NULL ,
 `last_name` varchar(45) NULL ,
 `phone_num` varchar(45) NULL ,
 `email`     varchar(45) NULL ,
 `username`  varchar(45) NULL ,
 `password`  varchar(45) NULL ,
 `user_info` longtext NULL ,

PRIMARY KEY (`ID`)
);

-- ************************************** `author`

CREATE TABLE `author`
(
 `author_ID`   varchar(45) NOT NULL ,
 `author_name` varchar(45) NOT NULL ,

PRIMARY KEY (`author_ID`)
);

-- ************************************** `publisher`

CREATE TABLE `publisher`
(
 `publisher_ID`   varchar(45) NOT NULL ,
 `publisher_name` varchar(45) NOT NULL ,

PRIMARY KEY (`publisher_ID`)
);

-- ************************************** `genre`

CREATE TABLE `genre`
(
 `genre_ID`   varchar(45) NOT NULL ,
 `genre_name` varchar(45) NOT NULL ,

PRIMARY KEY (`genre_ID`)
);

-- ************************************** `book`

CREATE TABLE `book`
(
 `book_ID`            varchar(45) NOT NULL ,
 `book_name`          varchar(45) NOT NULL ,
 `publication_year`   year NOT NULL ,
 `release_date`       date NOT NULL ,
 `page_count`         int NOT NULL ,
 `purchase_price`     mediumint NOT NULL ,
 `sale_price`         mediumint NOT NULL ,
 `remaining_quantity` int NOT NULL ,
 `display_status`     varbinary(45) NOT NULL ,
 `publisher_ID`       varchar(45) NOT NULL ,

PRIMARY KEY (`book_ID`),
KEY `FK_1` (`publisher_ID`),
CONSTRAINT `FK_19` FOREIGN KEY `FK_1` (`publisher_ID`) REFERENCES `publisher` (`publisher_ID`)
);

ALTER TABLE `book`
ADD img_path varchar(10000) NULL;

-- ************************************** `member`

CREATE TABLE `member`
(
 `ID` varchar(45) NOT NULL ,

PRIMARY KEY (`ID`),
KEY `FK_1` (`ID`),
CONSTRAINT `FK_2` FOREIGN KEY `FK_1` (`ID`) REFERENCES `user` (`ID`)
);

-- ************************************** `belongs_to`

CREATE TABLE `belongs_to`
(
 `book_ID`  varchar(45) NOT NULL ,
 `genre_ID` varchar(45) NOT NULL ,

PRIMARY KEY (`book_ID`, `genre_ID`),
KEY `FK_1` (`book_ID`),
CONSTRAINT `FK_15` FOREIGN KEY `FK_1` (`book_ID`) REFERENCES `book` (`book_ID`),
KEY `FK_2` (`genre_ID`),
CONSTRAINT `FK_16` FOREIGN KEY `FK_2` (`genre_ID`) REFERENCES `genre` (`genre_ID`)
);

-- ************************************** `cart`

CREATE TABLE `cart`
(
 `ID` varchar(45) NOT NULL ,

PRIMARY KEY (`ID`),
KEY `FK_1` (`ID`),
CONSTRAINT `FK_4` FOREIGN KEY `FK_1` (`ID`) REFERENCES `member` (`ID`)
);

-- ************************************** `cart_include`

CREATE TABLE `cart_include`
(
 `ID`            varchar(45) NOT NULL ,
 `book_ID`       varchar(45) NOT NULL ,
 `cart_quantity` int NOT NULL ,

PRIMARY KEY (`ID`, `book_ID`),
KEY `FK_1` (`ID`),
CONSTRAINT `FK_11` FOREIGN KEY `FK_1` (`ID`) REFERENCES `cart` (`ID`),
KEY `FK_2` (`book_ID`),
CONSTRAINT `FK_14` FOREIGN KEY `FK_2` (`book_ID`) REFERENCES `book` (`book_ID`)
);

-- ************************************** `delivery_address`

CREATE TABLE `delivery_address`
(
 `address` varchar(255) NOT NULL ,
 `ID`      varchar(45) NOT NULL ,

PRIMARY KEY (`address`, `ID`),
KEY `FK_1` (`ID`),
CONSTRAINT `FK_3` FOREIGN KEY `FK_1` (`ID`) REFERENCES `member` (`ID`)
);

-- ************************************** `employee`

CREATE TABLE `employee`
(
 `ID`              varchar(45) NOT NULL ,
 `start_date`      date NULL ,
 `employee_status` varbinary(45) NULL ,

PRIMARY KEY (`ID`),
KEY `FK_1` (`ID`),
CONSTRAINT `FK_1` FOREIGN KEY `FK_1` (`ID`) REFERENCES `user` (`ID`)
);

-- ************************************** `order`

CREATE TABLE `order`
(
 `order_ID`   varchar(45) NOT NULL ,
 `order_date` date NULL ,
 `order_info` longtext NULL ,

PRIMARY KEY (`order_ID`)
);

-- ************************************** `purchase_order`

CREATE TABLE `purchase_order`
(
 `purchase_ID` varchar(45) NOT NULL ,

PRIMARY KEY (`purchase_ID`),
KEY `FK_1` (`purchase_ID`),
CONSTRAINT `FK_5` FOREIGN KEY `FK_1` (`purchase_ID`) REFERENCES `order` (`order_ID`)
);

-- ************************************** `purchase_include`

CREATE TABLE `purchase_include`
(
 `purchase_ID`       varchar(45) NOT NULL ,
 `book_ID`           varchar(45) NOT NULL ,
 `purchase_quantity` int NOT NULL ,

PRIMARY KEY (`purchase_ID`, `book_ID`),
KEY `FK_1` (`purchase_ID`),
CONSTRAINT `FK_9` FOREIGN KEY `FK_1` (`purchase_ID`) REFERENCES `purchase_order` (`purchase_ID`),
KEY `FK_2` (`book_ID`),
CONSTRAINT `FK_12` FOREIGN KEY `FK_2` (`book_ID`) REFERENCES `book` (`book_ID`)
);

-- ************************************** `sale_order`

CREATE TABLE `sale_order`
(
 `sale_ID`          varchar(45) NOT NULL ,
 `delivery_date`    date NULL ,
 `delivery_address` longtext NULL ,
 `payment_status`   varbinary(45) NULL ,
 `member_ID`        varchar(45) NOT NULL ,
 `employee_ID`      varchar(45) NOT NULL ,

PRIMARY KEY (`sale_ID`),
KEY `FK_1` (`sale_ID`),
CONSTRAINT `FK_6` FOREIGN KEY `FK_1` (`sale_ID`) REFERENCES `order` (`order_ID`),
KEY `FK_2` (`member_ID`),
CONSTRAINT `FK_7` FOREIGN KEY `FK_2` (`member_ID`) REFERENCES `member` (`ID`),
KEY `FK_3` (`employee_ID`),
CONSTRAINT `FK_8` FOREIGN KEY `FK_3` (`employee_ID`) REFERENCES `employee` (`ID`)
);

-- ************************************** `sale_include`

CREATE TABLE `sale_include`
(
 `sale_ID`       varchar(45) NOT NULL ,
 `book_ID`       varchar(45) NOT NULL ,
 `sale_quantity` int NOT NULL ,

PRIMARY KEY (`sale_ID`, `book_ID`),
KEY `FK_1` (`sale_ID`),
CONSTRAINT `FK_10` FOREIGN KEY `FK_1` (`sale_ID`) REFERENCES `sale_order` (`sale_ID`),
KEY `FK_2` (`book_ID`),
CONSTRAINT `FK_13` FOREIGN KEY `FK_2` (`book_ID`) REFERENCES `book` (`book_ID`)
);


-- ************************************** `written_by`

CREATE TABLE `written_by`
(
 `book_ID`   varchar(45) NOT NULL ,
 `author_ID` varchar(45) NOT NULL ,

PRIMARY KEY (`book_ID`, `author_ID`),
KEY `FK_1` (`book_ID`),
CONSTRAINT `FK_17` FOREIGN KEY `FK_1` (`book_ID`) REFERENCES `book` (`book_ID`),
KEY `FK_2` (`author_ID`),
CONSTRAINT `FK_18` FOREIGN KEY `FK_2` (`author_ID`) REFERENCES `author` (`author_ID`)
);




-- Test database

-- add data to employee
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20010101', '2010-01-01', 'Full-time');
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20020202', '2010-03-03', 'Full-time');
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20030303', '2010-04-04', 'Full-time');
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20040404', '2010-05-05', 'Full-time');
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20050505', '2010-06-06', 'Full-time');

-- add data to user
INSERT INTO `user` (`ID`, `sur_name`, `last_name`, `phone_num`, `email`, `username`, `password`, `user_info`) VALUES ('20010101', 'Nguyen Van', 'A', '0901010101', 'test1@gmail.com', 'test1', 'test1', 'Nguyen Van A is a test user');
INSERT INTO `user` (`ID`, `sur_name`, `last_name`, `phone_num`, `email`, `username`, `password`, `user_info`) VALUES ('20030303', 'Nguyen Thi', 'B', '0903030303', 'test2@gmail.com', 'test2', 'test2', 'Nguyen Thi B is a test user');
INSERT INTO `user` (`ID`, `sur_name`, `last_name`, `phone_num`, `email`, `username`, `password`, `user_info`) VALUES ('20040404', 'Le Van', 'C', '0904040404', 'test3@gmail.com', 'test3', 'test3', 'Le Van C is a test user');
INSERT INTO `user` (`ID`, `sur_name`, `last_name`, `phone_num`, `email`, `username`, `password`, `user_info`) VALUES ('20050505', 'Le Thi', 'D', '0905050505', 'test4@gmail.com', 'test4', 'test4', 'Le Thi D is a test user');
INSERT INTO `user` (`ID`, `sur_name`, `last_name`, `phone_num`, `email`, `username`, `password`, `user_info`) VALUES ('20060606', 'Dao Van', 'E', '0906060606', 'test5@gmail.com', 'test5', 'test5', 'Dao Van E is a test user');

-- select Employee Name (concat from surname and lastname), ID, Start Date, Employee Status
SELECT CONCAT(user.sur_name, ' ', user.last_name) AS 'Employee Name', employee.ID, employee.start_date, employee.employee_status
FROM user, employee
WHERE user.ID = employee.ID;

SELECT book.bookname, author.author_name, publisher.publisher_name, book.publication_year, book.release_date, book.book_ID, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.display_status
FROM book, author, publisher, genre, written_by, belongs_to
WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID;





-- add data to book
INSERT INTO `book` VALUES ('1', 'Tiếng Việt 1 (Tập 1)', '2020', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001');
INSERT INTO `book` VALUES ('2', 'Tiếng Việt 1 (Tập 2)', '2020', '2020-01-01', 190, 30000, 41000, 100, 'Available', '001');

-- add data to publisher
INSERT INTO `publisher` VALUES ('001', 'NXB Giáo dục Việt Nam');


-- add data to genre
INSERT INTO `genre` VALUES ('01', 'sách giáo khoa - giáo trình');

-- add data to author
INSERT INTO `author` VALUES ('01', 'Nhiều tác giả');

-- add data to written_by
INSERT INTO `written_by` VALUES ('1', '01');
INSERT INTO `written_by` VALUES ('2', '01');

-- add data to belongs_to
INSERT INTO `belongs_to` VALUES ('1', '01');
INSERT INTO `belongs_to` VALUES ('2', '01');

-- insert the img_path attribute in the book table
UPDATE book
SET img_path = 'img/pic1.png'
WHERE book_ID = '1';

UPDATE book
SET img_path = 'img/pic4.png'
WHERE book_ID = '2';

-- insert more books into the database
INSERT INTO `book` VALUES ('3', 'Lược Sử Thời Gian', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/LuocSuThoiGian.jpeg');
INSERT INTO `book` VALUES ('4', 'Đất Rừng Phương Nam', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/Dat_Rung_Phuong_Nam.jpeg');
INSERT INTO `book` VALUES ('5', 'Doraemon', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/Doraemon.jpeg');
INSERT INTO `book` VALUES ('6', 'Giải tích 2', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/GiaiTich2.jpeg');
INSERT INTO `book` VALUES ('7', 'Giết Con Chim Nhại', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/GietConChimNhai.png');
INSERT INTO `book` VALUES ('8', 'Mắt Biếc', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/MatBiec.jpeg');
INSERT INTO `book` VALUES ('9', 'Thám Tử Lừng Danh Conan', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/conan.jpeg');
INSERT INTO `book` VALUES ('10', 'Shin - Cậu Bé Bút Chì', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/shin.jpeg');
INSERT INTO `book` VALUES ('11', 'Vũ Trụ Trong Vỏ Hạt Dẻ', '2017', '2020-01-01', 189, 30000, 41000, 125, 'Available', '001', 'img/Books_Images/VuTruTrongVoHatDe.jpeg');


-- insert more data about authors
INSERT INTO written_by VALUES ('3', '01');
INSERT INTO written_by VALUES ('4', '01');
INSERT INTO written_by VALUES ('5', '01');
INSERT INTO written_by VALUES ('6', '01');
INSERT INTO written_by VALUES ('7', '01');
INSERT INTO written_by VALUES ('8', '01');
INSERT INTO written_by VALUES ('9', '01');
INSERT INTO written_by VALUES ('10', '01');
INSERT INTO written_by VALUES ('1', '01');
INSERT INTO written_by VALUES ('2', '01');


-- need to create a graph for sale quantity and purchase quantity for each book and date
SELECT sale_include.sale_quantity, sale_order.delivery_date, book.book_name, genre.genre_name
FROM sale_include, sale_order, book, belongs_to, genre
WHERE sale_include.sale_ID = sale_order.sale_ID AND sale_include.book_ID = book.book_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID;