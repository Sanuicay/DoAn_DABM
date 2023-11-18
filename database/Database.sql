-- ************************************** `author`

CREATE TABLE `author`
(
 `author_ID`   varchar(45) NOT NULL ,
 `author_name` varchar(45) NOT NULL ,

PRIMARY KEY (`author_ID`)
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
 `address` mediumtext NOT NULL ,
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

-- ************************************** `genre`

CREATE TABLE `genre`
(
 `genre_ID`   varchar(45) NOT NULL ,
 `genre_name` varchar(45) NOT NULL ,

PRIMARY KEY (`genre_ID`)
);

-- ************************************** `member`

CREATE TABLE `member`
(
 `ID` varchar(45) NOT NULL ,

PRIMARY KEY (`ID`),
KEY `FK_1` (`ID`),
CONSTRAINT `FK_2` FOREIGN KEY `FK_1` (`ID`) REFERENCES `user` (`ID`)
);

-- ************************************** `order`

CREATE TABLE `order`
(
 `order_ID`   varchar(45) NOT NULL ,
 `order_date` date NULL ,
 `order_info` longtext NULL ,

PRIMARY KEY (`order_ID`)
);

-- ************************************** `publisher`

CREATE TABLE `publisher`
(
 `publisher_ID`   varchar(45) NOT NULL ,
 `publisher_name` varchar(45) NOT NULL ,

PRIMARY KEY (`publisher_ID`)
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

-- ************************************** `purchase_order`

CREATE TABLE `purchase_order`
(
 `purchase_ID` varchar(45) NOT NULL ,

PRIMARY KEY (`purchase_ID`),
KEY `FK_1` (`purchase_ID`),
CONSTRAINT `FK_5` FOREIGN KEY `FK_1` (`purchase_ID`) REFERENCES `order` (`order_ID`)
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
