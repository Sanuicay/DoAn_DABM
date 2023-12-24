-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 01, 2023 at 03:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dabm_database`
--

DROP DATABASE IF EXISTS dabm_database;
CREATE DATABASE dabm_database;
USE dabm_database;

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `total_price_sale` (`id_order` VARCHAR(45)) RETURNS MEDIUMINT(9)  BEGIN
    DECLARE total MEDIUMINT;
    SET total = 0;

    SELECT SUM(si.sale_quantity * b.sale_price) INTO total
    FROM sale_include si
    JOIN book b ON si.book_ID = b.book_ID
    WHERE si.sale_ID = id_order;

    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_ID` varchar(45) NOT NULL,
  `author_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_ID`, `author_name`) VALUES
('01', 'Nhiều tác giả');

-- SQL script for inserting authors

INSERT INTO author (author_ID, author_name) VALUES ('11', 'Jay Forman');
INSERT INTO author (author_ID, author_name) VALUES ('12', 'Ronald Conway');
INSERT INTO author (author_ID, author_name) VALUES ('13', 'Ramona Gonczol-Davies');
INSERT INTO author (author_ID, author_name) VALUES ('14', 'Bruce McMillan');
INSERT INTO author (author_ID, author_name) VALUES ('15', 'Ralf Niemczyk');
INSERT INTO author (author_ID, author_name) VALUES ('16', 'Nigel Pollock');
INSERT INTO author (author_ID, author_name) VALUES ('17', 'Jane Walmsley');
INSERT INTO author (author_ID, author_name) VALUES ('18', 'Deborah Rudacille');
INSERT INTO author (author_ID, author_name) VALUES ('19', 'Caroline Leavitt');
INSERT INTO author (author_ID, author_name) VALUES ('20', 'Dave McGovern');
INSERT INTO author (author_ID, author_name) VALUES ('21', 'Helen Brooks');
INSERT INTO author (author_ID, author_name) VALUES ('22', 'Arnold A. Griese');
INSERT INTO author (author_ID, author_name) VALUES ('23', 'Gary Rosberg');
INSERT INTO author (author_ID, author_name) VALUES ('24', 'Gregory E Pence');
INSERT INTO author (author_ID, author_name) VALUES ('25', 'Sherri Mandell');
INSERT INTO author (author_ID, author_name) VALUES ('26', 'Jan McKee');
INSERT INTO author (author_ID, author_name) VALUES ('27', 'Scott Atkinson');
INSERT INTO author (author_ID, author_name) VALUES ('28', 'Laurence J Peter');
INSERT INTO author (author_ID, author_name) VALUES ('29', 'Joanna Harris');
INSERT INTO author (author_ID, author_name) VALUES ('30', 'R. John Brockmann');
INSERT INTO author (author_ID, author_name) VALUES ('31', 'Donald D. Cheatham');
INSERT INTO author (author_ID, author_name) VALUES ('32', 'Bernard Hagene');
INSERT INTO author (author_ID, author_name) VALUES ('33', 'Leontyne Price');
INSERT INTO author (author_ID, author_name) VALUES ('34', 'William R. Forstchen');
INSERT INTO author (author_ID, author_name) VALUES ('35', 'John Dyson');
INSERT INTO author (author_ID, author_name) VALUES ('36', 'Steve Stewart');
INSERT INTO author (author_ID, author_name) VALUES ('37', 'Will Friedwald');
INSERT INTO author (author_ID, author_name) VALUES ('38', 'Curtis Hutson');
INSERT INTO author (author_ID, author_name) VALUES ('39', 'Sally Greengross');
INSERT INTO author (author_ID, author_name) VALUES ('40', 'Clarence Norris');
INSERT INTO author (author_ID, author_name) VALUES ('41', 'MÃ¡ximo Pradera');
INSERT INTO author (author_ID, author_name) VALUES ('42', 'MIRIAM WEINSTEIN');
INSERT INTO author (author_ID, author_name) VALUES ('43', 'Barbara Mujica');
INSERT INTO author (author_ID, author_name) VALUES ('44', 'Brian Castro');
INSERT INTO author (author_ID, author_name) VALUES ('45', 'Trevor Wye');
INSERT INTO author (author_ID, author_name) VALUES ('46', 'Dale Van Every');
INSERT INTO author (author_ID, author_name) VALUES ('47', 'Joseph Mitchell');
INSERT INTO author (author_ID, author_name) VALUES ('48', 'Randy Richmond');
INSERT INTO author (author_ID, author_name) VALUES ('49', 'Joseph Gelineau');
INSERT INTO author (author_ID, author_name) VALUES ('50', 'Duerrenmatt');
INSERT INTO author (author_ID, author_name) VALUES ('51', 'Todd Litman');
INSERT INTO author (author_ID, author_name) VALUES ('52', 'Tom Philbin');
INSERT INTO author (author_ID, author_name) VALUES ('53', 'Jonathan A. Michaels');
INSERT INTO author (author_ID, author_name) VALUES ('54', 'Ann McAllister');
INSERT INTO author (author_ID, author_name) VALUES ('55', 'Jean Betschart-Roemer');
INSERT INTO author (author_ID, author_name) VALUES ('56', 'Jacqueline DeJohn');
INSERT INTO author (author_ID, author_name) VALUES ('57', 'Fiona');
INSERT INTO author (author_ID, author_name) VALUES ('58', 'George Hardinge');
INSERT INTO author (author_ID, author_name) VALUES ('59', 'Jennifer B. Jones');
INSERT INTO author (author_ID, author_name) VALUES ('60', 'Richard Kindsvatter');
INSERT INTO author (author_ID, author_name) VALUES ('61', 'PHYLLIS GREENE');
INSERT INTO author (author_ID, author_name) VALUES ('62', 'Kerry Madden');
INSERT INTO author (author_ID, author_name) VALUES ('63', 'Ruth K. Westheimer');
INSERT INTO author (author_ID, author_name) VALUES ('64', 'Richard M. Ebeling');
INSERT INTO author (author_ID, author_name) VALUES ('65', 'Charles Merrill Smith');
INSERT INTO author (author_ID, author_name) VALUES ('66', 'Jennifer Knapp');
INSERT INTO author (author_ID, author_name) VALUES ('67', 'Charles Frances Hunter');
INSERT INTO author (author_ID, author_name) VALUES ('68', 'Emily Rodda');
INSERT INTO author (author_ID, author_name) VALUES ('69', 'Jacqueline Williams');
INSERT INTO author (author_ID, author_name) VALUES ('70', 'J. Edward Evans');
INSERT INTO author (author_ID, author_name) VALUES ('71', 'Clemens Birnbaum');
INSERT INTO author (author_ID, author_name) VALUES ('72', 'BARBARA MUJICA');
INSERT INTO author (author_ID, author_name) VALUES ('73', 'Judith Lennox');
INSERT INTO author (author_ID, author_name) VALUES ('74', 'Collard');
INSERT INTO author (author_ID, author_name) VALUES ('75', 'Kerry Mark Joels');
INSERT INTO author (author_ID, author_name) VALUES ('76', 'John S. Dunne');
INSERT INTO author (author_ID, author_name) VALUES ('77', 'D. Whitelock');
INSERT INTO author (author_ID, author_name) VALUES ('78', 'Helaine G. Helmreich');
INSERT INTO author (author_ID, author_name) VALUES ('79', 'Sarah Mlynowski');
INSERT INTO author (author_ID, author_name) VALUES ('80', 'Alfred Werner');
INSERT INTO author (author_ID, author_name) VALUES ('81', 'E. B White');
INSERT INTO author (author_ID, author_name) VALUES ('82', 'K. J. Eddey');
INSERT INTO author (author_ID, author_name) VALUES ('83', 'Michael Massey');
INSERT INTO author (author_ID, author_name) VALUES ('84', 'Mat Schulz');
INSERT INTO author (author_ID, author_name) VALUES ('85', 'Georges  Ifrah');
INSERT INTO author (author_ID, author_name) VALUES ('86', "Elaine O'Reilly");
INSERT INTO author (author_ID, author_name) VALUES ('87', 'Rowan Williams');
INSERT INTO author (author_ID, author_name) VALUES ('88', 'Robert Wuthnow');
INSERT INTO author (author_ID, author_name) VALUES ('89', 'Georges Bordonove');
INSERT INTO author (author_ID, author_name) VALUES ('90', 'Roger G. Kennedy');
INSERT INTO author (author_ID, author_name) VALUES ('91', 'Robert Mawson');
INSERT INTO author (author_ID, author_name) VALUES ('92', 'Charles Chesnutt');
INSERT INTO author (author_ID, author_name) VALUES ('93', 'Rosetta  James');
INSERT INTO author (author_ID, author_name) VALUES ('94', 'Donald Goldsmith');
INSERT INTO author (author_ID, author_name) VALUES ('95', 'George Herbert Mead');
INSERT INTO author (author_ID, author_name) VALUES ('96', 'Janice Larouche');
INSERT INTO author (author_ID, author_name) VALUES ('97', 'Jacqueline Harrod');
INSERT INTO author (author_ID, author_name) VALUES ('98', 'Gï¿½?Â©rard Delteil');
INSERT INTO author (author_ID, author_name) VALUES ('99', 'Kay Sheppard');


-- --------------------------------------------------------

--
-- Table structure for table `belongs_to`
--

CREATE TABLE `belongs_to` (
  `book_ID` varchar(45) NOT NULL,
  `genre_ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `belongs_to`
--

INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES
('1', '01'),
('10', '02'),
('2', '01'),
('3', '01'),
('4', '01'),
('5', '04'),
('6', '03'),
('7', '01'),
('8', '03'),
('9', '02');

-- SQL script for inserting books

INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('11', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('12', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('13', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('14', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('15', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('16', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('17', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('18', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('19', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('20', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('21', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('22', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('23', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('24', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('25', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('26', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('27', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('28', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('29', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('30', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('31', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('32', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('33', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('34', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('35', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('36', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('37', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('38', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('39', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('40', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('41', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('42', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('43', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('44', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('45', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('46', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('47', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('48', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('49', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('50', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('51', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('52', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('53', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('54', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('55', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('56', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('57', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('58', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('59', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('60', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('61', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('62', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('63', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('64', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('65', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('66', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('67', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('68', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('69', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('70', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('71', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('72', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('73', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('74', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('75', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('76', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('77', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('78', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('79', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('80', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('81', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('82', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('83', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('84', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('85', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('86', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('87', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('88', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('89', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('90', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('91', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('92', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('93', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('94', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('95', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('96', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('97', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('98', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('99', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('100', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('101', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('102', '02');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('103', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('104', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('105', '04');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('106', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('107', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('108', '03');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('109', '01');
INSERT INTO `belongs_to` (`book_ID`, `genre_ID`) VALUES ('110', '03');


-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_ID` varchar(45) NOT NULL,
  `book_name` varchar(45) NOT NULL,
  `publication_year` year(4) NOT NULL,
  `release_date` date NOT NULL,
  `page_count` int(11) NOT NULL,
  `purchase_price` mediumint(9) NOT NULL,
  `sale_price` mediumint(9) NOT NULL,
  `remaining_quantity` int(11) NOT NULL,
  `display_status` varbinary(45) NOT NULL,
  `deleted_tag` int NOT NULL DEFAULT 0,
  `description` longtext,
  `publisher_ID` varchar(45) NOT NULL,
  `img_path` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_ID`, `book_name`, `publication_year`, `release_date`, `page_count`, `purchase_price`, `sale_price`, `remaining_quantity`, `display_status`, `publisher_ID`, `img_path`) VALUES
('1', 'Tiếng Việt 1 (Tập 1)', '2020', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, '001', 'img/Books_Images/tiengviet1_tap1.jpg'),
('10', 'Shin - Cậu Bé Bút Chì', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, '001', 'img/Books_Images/shin.jpeg'),
('2', 'Tiếng Việt 1 (Tập 2)', '2020', '2020-01-01', 190, 30000, 41000, 100, 0x556e617661696c61626c65, '001', 'img/Books_Images/tiengviet1_tap2.jpg'),
('3', 'Lược Sử Thời Gian', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, '001', 'img/Books_Images/LuocSuThoiGian.jpeg'),
('4', 'Đất Rừng Phương Nam', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, '001', 'img/Books_Images/Dat_Rung_Phuong_Nam.jpeg'),
('5', 'Doraemon', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, '001', 'img/Books_Images/Doraemon.jpeg'),
('6', 'Giải tích 2', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, '001', 'img/Books_Images/GiaiTich2.jpeg'),
('7', 'Giết Con Chim Nhại', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, '001', 'img/Books_Images/GietConChimNhai.png'),
('8', 'Mắt Biếc', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, '001', 'img/Books_Images/MatBiec.jpeg'),
('9', 'Thám Tử Lừng Danh Conan', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, '001', 'img/Books_Images/conan.jpeg');

-- SQL script for inserting books

INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("11", "Classical Mythology", "2002", "2002-01-01", 94, 248000, 251000, 208, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "011", "http://images.amazon.com/images/P/0195153448.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("12", "Clara Callan", "2001", "2001-01-01", 474, 307000, 310000, 267, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "012", "http://images.amazon.com/images/P/0002005018.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("13", "Decision in Normandy", "1991", "1991-01-01", 382, 473000, 476000, 231, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "013", "http://images.amazon.com/images/P/0060973129.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("14", "Flu: The Story of the Great Influenza Pandemic of 1918 and the Search for the Virus That Caused It", "1999", "1999-01-01", 324, 341000, 344000, 187, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "014", "http://images.amazon.com/images/P/0374157065.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("15", "The Mummies of Urumchi", "1999", "1999-01-01", 380, 498000, 501000, 280, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "015", "http://images.amazon.com/images/P/0393045218.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("16", "The Kitchen God's Wife", "1991", "1991-01-01", 147, 367000, 370000, 203, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "016", "http://images.amazon.com/images/P/0399135782.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("17", "What If?: The World's Foremost Military Historians Imagine What Might Have Been", "2000", "2000-01-01", 281, 479000, 482000, 146, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "017", "http://images.amazon.com/images/P/0425176428.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("18", "PLEADING GUILTY", "1993", "1993-01-01", 184, 419000, 422000, 277, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "018", "http://images.amazon.com/images/P/0671870432.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("19", "Under the Black Flag: The Romance and the Reality of Life Among the Pirates", "1996", "1996-01-01", 418, 218000, 221000, 265, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "019", "http://images.amazon.com/images/P/0679425608.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("20", "Where You'll Find Me: And Other Stories", "2002", "2002-01-01", 152, 299000, 302000, 236, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "020", "http://images.amazon.com/images/P/074322678X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("21", "Nights Below Station Street", "1988", "1988-01-01", 243, 21000, 24000, 174, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "021", "http://images.amazon.com/images/P/0771074670.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("22", "Hitler's Secret Bankers: The Myth of Swiss Neutrality During the Holocaust", "2000", "2000-01-01", 279, 352000, 355000, 230, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "022", "http://images.amazon.com/images/P/080652121X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("23", "The Middle Stories", "2004", "2004-01-01", 288, 181000, 184000, 292, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "023", "http://images.amazon.com/images/P/0887841740.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("24", "Jane Doe", "1999", "1999-01-01", 146, 14000, 17000, 187, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "024", "http://images.amazon.com/images/P/1552041778.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("25", "A Second Chicken Soup for the Woman's Soul (Chicken Soup for the Soul Series)", "1998", "1998-01-01", 107, 21000, 24000, 272, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "025", "http://images.amazon.com/images/P/1558746218.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("26", "The Witchfinder (Amos Walker Mystery Series)", "1998", "1998-01-01", 312, 336000, 339000, 189, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "026", "http://images.amazon.com/images/P/1567407781.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("27", "More Cunning Than Man: A Social History of Rats and Man", "1999", "1999-01-01", 434, 135000, 138000, 285, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "027", "http://images.amazon.com/images/P/1575663937.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("28", "Goodbye to the Buttermilk Sky", "1994", "1994-01-01", 489, 254000, 257000, 222, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "028", "http://images.amazon.com/images/P/1881320189.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("29", "The Testament", "1999", "1999-01-01", 346, 437000, 440000, 287, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "029", "http://images.amazon.com/images/P/0440234743.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("30", "Beloved (Plume Contemporary Fiction)", "1994", "1994-01-01", 314, 203000, 206000, 266, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "030", "http://images.amazon.com/images/P/0452264464.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("31", "Our Dumb Century: The Onion Presents 100 Years of Headlines from America's Finest News Source", "1999", "1999-01-01", 384, 117000, 120000, 203, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "031", "http://images.amazon.com/images/P/0609804618.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("32", "New Vegetarian: Bold and Beautiful Recipes for Every Occasion", "2001", "2001-01-01", 182, 318000, 321000, 204, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "032", "http://images.amazon.com/images/P/1841721522.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("33", "If I'd Known Then What I Know Now: Why Not Learn from the Mistakes of Others? : You Can't Afford to Make Them All Yourself", "2003", "2003-01-01", 312, 50000, 53000, 112, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "033", "http://images.amazon.com/images/P/1879384493.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("34", "Mary-Kate &amp, Ashley Switching Goals (Mary-Kate and Ashley Starring in)", "2000", "2000-01-01", 242, 285000, 288000, 145, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "034", "http://images.amazon.com/images/P/0061076031.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("35", "Tell Me This Isn't Happening", "1999", "1999-01-01", 108, 154000, 157000, 202, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "035", "http://images.amazon.com/images/P/0439095026.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("36", "Flood : Mississippi 1927", "1998", "1998-01-01", 354, 459000, 462000, 276, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "036", "http://images.amazon.com/images/P/0689821166.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("37", "Wild Animus", "2004", "2004-01-01", 310, 400000, 403000, 173, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "037", "http://images.amazon.com/images/P/0971880107.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("38", "Airframe", "1997", "1997-01-01", 114, 234000, 237000, 182, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "038", "http://images.amazon.com/images/P/0345402871.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("39", "Timeline", "2000", "2000-01-01", 259, 39000, 42000, 245, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "039", "http://images.amazon.com/images/P/0345417623.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("40", "OUT OF THE SILENT PLANET", "1996", "1996-01-01", 325, 443000, 446000, 208, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "040", "http://images.amazon.com/images/P/0684823802.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("41", "Prague : A Novel", "2003", "2003-01-01", 157, 167000, 170000, 246, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "041", "http://images.amazon.com/images/P/0375759778.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("42", "Chocolate Jesus", "1998", "1998-01-01", 449, 491000, 494000, 232, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "042", "http://images.amazon.com/images/P/0425163091.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("43", "Wie Barney es sieht.", "2002", "2002-01-01", 330, 144000, 147000, 223, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "043", "http://images.amazon.com/images/P/3404921038.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("44", "Der Fluch der Kaiserin. Ein Richter- Di- Roman.", "2001", "2001-01-01", 485, 194000, 197000, 224, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "044", "http://images.amazon.com/images/P/3442353866.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("45", "Sturmzeit. Roman.", "1991", "1991-01-01", 177, 361000, 364000, 107, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "045", "http://images.amazon.com/images/P/3442410665.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("46", "Tage der Unschuld.", "2000", "2000-01-01", 417, 137000, 140000, 272, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "046", "http://images.amazon.com/images/P/3442446937.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("47", "Lying Awake", "2000", "2000-01-01", 373, 191000, 194000, 156, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "047", "http://images.amazon.com/images/P/0375406328.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("48", "To Kill a Mockingbird", "1988", "1988-01-01", 140, 288000, 291000, 128, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "048", "http://images.amazon.com/images/P/0446310786.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("49", "Seabiscuit: An American Legend", "2002", "2002-01-01", 355, 143000, 146000, 190, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "049", "http://images.amazon.com/images/P/0449005615.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("50", "Pigs in Heaven", "1993", "1993-01-01", 119, 199000, 202000, 274, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "050", "http://images.amazon.com/images/P/0060168013.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("51", "Miss Zukas and the Raven's Dance", "1996", "1996-01-01", 492, 448000, 451000, 131, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "051", "http://images.amazon.com/images/P/038078243X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("52", "Pride and Prejudice", "1983", "1983-01-01", 256, 298000, 301000, 285, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "052", "http://images.amazon.com/images/P/055321215X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("53", "The Therapeutic Touch: How to Use Your Hands to Help or to Heal", "1979", "1979-01-01", 112, 323000, 326000, 256, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "053", "http://images.amazon.com/images/P/067176537X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("54", "Downtown", "1995", "1995-01-01", 325, 385000, 388000, 288, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "054", "http://images.amazon.com/images/P/0061099686.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("55", "Icebound", "2000", "2000-01-01", 314, 44000, 47000, 128, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "055", "http://images.amazon.com/images/P/0553582909.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("56", "I'll Be Seeing You", "1994", "1994-01-01", 327, 52000, 55000, 181, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "056", "http://images.amazon.com/images/P/0671888587.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("57", "From the Corner of His Eye", "2001", "2001-01-01", 433, 358000, 361000, 252, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "057", "http://images.amazon.com/images/P/0553582747.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("58", "Isle of Dogs", "2002", "2002-01-01", 436, 166000, 169000, 273, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "058", "http://images.amazon.com/images/P/0425182908.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("59", "Purity in Death", "2002", "2002-01-01", 211, 57000, 60000, 250, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "059", "http://images.amazon.com/images/P/042518630X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("60", "This Year It Will Be Different: And Other Stories", "1997", "1997-01-01", 413, 88000, 91000, 103, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "060", "http://images.amazon.com/images/P/0440223571.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("61", "Proxies", "1999", "1999-01-01", 206, 239000, 242000, 256, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "061", "http://images.amazon.com/images/P/0812523873.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("62", "Left Behind: A Novel of the Earth's Last Days (Left Behind #1)", "2000", "2000-01-01", 226, 293000, 296000, 159, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "062", "http://images.amazon.com/images/P/0842342702.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("63", "The Street Lawyer", "1999", "1999-01-01", 101, 439000, 442000, 124, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "063", "http://images.amazon.com/images/P/0440225701.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("64", "Love, Medicine and Miracles", "1988", "1988-01-01", 115, 299000, 302000, 122, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "064", "http://images.amazon.com/images/P/0060914068.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("65", "All the King's Men", "1982", "1982-01-01", 269, 361000, 364000, 266, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "065", "http://images.amazon.com/images/P/0156047624.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("66", "Pacific Northwest", "1985", "1985-01-01", 365, 213000, 216000, 254, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "066", "http://images.amazon.com/images/P/0245542957.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("67", "A Soldier of the Great War", "1992", "1992-01-01", 424, 322000, 325000, 146, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "067", "http://images.amazon.com/images/P/0380715899.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("68", "Getting Well Again", "1992", "1992-01-01", 401, 361000, 364000, 263, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "068", "http://images.amazon.com/images/P/0553280333.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("69", "Northwest Wines and Wineries", "1993", "1993-01-01", 323, 52000, 55000, 143, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "069", "http://images.amazon.com/images/P/0961769947.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("70", "An Atmosphere of Eternity: Stories of India", "2002", "2002-01-01", 198, 25000, 28000, 160, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "070", "http://images.amazon.com/images/P/0964778319.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("71", "LONESOME DOVE", "1986", "1986-01-01", 309, 43000, 46000, 254, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "071", "http://images.amazon.com/images/P/0671623249.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("72", "Shabanu: Daughter of the Wind (Border Trilogy)", "1991", "1991-01-01", 381, 427000, 430000, 109, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "072", "http://images.amazon.com/images/P/0679810307.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("73", "Haveli (Laurel Leaf Books)", "1995", "1995-01-01", 301, 374000, 377000, 159, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "073", "http://images.amazon.com/images/P/0679865691.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("74", "Lieux dits", "2002", "2002-01-01", 109, 406000, 409000, 284, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "074", "http://images.amazon.com/images/P/2070423204.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("75", "The Dragons of Eden: Speculations on the Evolution of Human Intelligence", "1978", "1978-01-01", 379, 185000, 188000, 120, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "075", "http://images.amazon.com/images/P/0345260317.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("76", "The yawning heights", "1980", "1980-01-01", 377, 382000, 385000, 173, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "076", "http://images.amazon.com/images/P/0394743741.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("77", "Breathing Lessons", "1994", "1994-01-01", 197, 184000, 187000, 211, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "077", "http://images.amazon.com/images/P/042511774X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("78", "The Joy Luck Club", "1994", "1994-01-01", 390, 447000, 450000, 107, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "078", "http://images.amazon.com/images/P/0804106304.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("79", "Heart of Darkness (Wordsworth Collection)", "1998", "1998-01-01", 102, 36000, 39000, 260, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "079", "http://images.amazon.com/images/P/1853262404.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("80", "The Angel Is Near", "2000", "2000-01-01", 230, 431000, 434000, 211, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "080", "http://images.amazon.com/images/P/0312970242.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("81", "Tess of the D'Urbervilles (Wordsworth Classics)", "1997", "1997-01-01", 408, 365000, 368000, 150, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "081", "http://images.amazon.com/images/P/1853260053.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("82", "The Adventures of Drew and Ellie: The Magical Dress", "2003", "2003-01-01", 198, 95000, 98000, 297, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "082", "http://images.amazon.com/images/P/1414035004.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("83", "The Accidental Virgin", "2003", "2003-01-01", 328, 365000, 368000, 219, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "083", "http://images.amazon.com/images/P/0060938412.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("84", "The Tao of Pooh", "1983", "1983-01-01", 125, 82000, 85000, 132, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "084", "http://images.amazon.com/images/P/0140067477.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("85", "Seabiscuit", "2003", "2003-01-01", 336, 393000, 396000, 298, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "085", "http://images.amazon.com/images/P/0345465083.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("86", "The Prince", "1952", "1952-01-01", 253, 66000, 69000, 113, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "086", "http://images.amazon.com/images/P/0451625889.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("87", "Life's Little Instruction Book (Life's Little Instruction Books (Paperback))", "1991", "1991-01-01", 262, 185000, 188000, 104, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "087", "http://images.amazon.com/images/P/1558531025.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("88", "Starship Troopers", "1987", "1987-01-01", 429, 478000, 481000, 167, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "088", "http://images.amazon.com/images/P/0441783589.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("89", "The Ruby in the Smoke (Sally Lockhart Trilogy, Book 1)", "1988", "1988-01-01", 422, 39000, 42000, 136, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "089", "http://images.amazon.com/images/P/0394895894.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("90", "Black Beauty (Illustrated Classics)", "1995", "1995-01-01", 484, 103000, 106000, 165, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "090", "http://images.amazon.com/images/P/1569871213.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("91", "Anil's Ghost", "2000", "2000-01-01", 296, 335000, 338000, 158, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "091", "http://images.amazon.com/images/P/0375410538.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("92", "Prescription for Terror", "1999", "1999-01-01", 339, 53000, 56000, 177, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "092", "http://images.amazon.com/images/P/0966986105.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("93", "Modern Manners: An Etiquette Book for Rude People", "1990", "1990-01-01", 311, 476000, 479000, 223, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "093", "http://images.amazon.com/images/P/087113375X.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("94", "Turning Thirty", "2000", "2000-01-01", 123, 493000, 496000, 207, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "094", "http://images.amazon.com/images/P/0340767936.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("95", "Decipher", "2002", "2002-01-01", 112, 337000, 340000, 283, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "095", "http://images.amazon.com/images/P/0743403843.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("96", "My First Cousin Once Removed: Money, Madness, and the Family of Robert Lowell", "1999", "1999-01-01", 323, 458000, 461000, 195, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "096", "http://images.amazon.com/images/P/0060930365.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("97", "Standing Firm: A Vice-Presidential Memoir", "1994", "1994-01-01", 99, 159000, 162000, 250, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "097", "http://images.amazon.com/images/P/0060177586.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("98", "Team Bush : Leadership Lessons from the Bush White House", "2003", "2003-01-01", 447, 473000, 476000, 249, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "098", "http://images.amazon.com/images/P/0071416331.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("99", "The Right Man : The Surprise Presidency of George W. Bush", "2003", "2003-01-01", 227, 234000, 237000, 152, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "099", "http://images.amazon.com/images/P/0375509038.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("100", "Daybreakers Louis Lamour Collection", "1981", "1981-01-01", 266, 268000, 271000, 264, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "100", "http://images.amazon.com/images/P/0553062042.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("101", "The Catcher in the Rye", "1991", "1991-01-01", 285, 367000, 370000, 295, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "101", "http://images.amazon.com/images/P/0316769487.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("102", "El Senor De Los Anillos: LA Comunidad Del Anillo (Lord of the Rings (Spanish))", "2001", "2001-01-01", 437, 168000, 171000, 249, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "102", "http://images.amazon.com/images/P/8445071408.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("103", "El Senor De Los Anillos: Las DOS Torres (Lord of the Rings (Paperback))", "2001", "2001-01-01", 293, 245000, 248000, 297, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "103", "http://images.amazon.com/images/P/8445071769.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("104", "El Senor De Los Anillos: El Retorno Del Rey (Tolkien, J. R. R. Lord of the Rings. 3.)", "2001", "2001-01-01", 346, 470000, 473000, 230, 0x417661696c61626c65, 1, "This is a dummy description for testing purposes", "104", "http://images.amazon.com/images/P/8445071777.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("105", "Midnight in the Garden of Good and Evil: A Savannah Story", "1994", "1994-01-01", 192, 214000, 217000, 107, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "105", "http://images.amazon.com/images/P/0679429220.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("106", "Pretend You Don't See Her", "1998", "1998-01-01", 211, 151000, 154000, 271, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "106", "http://images.amazon.com/images/P/0671867156.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("107", "Fast Women", "2001", "2001-01-01", 395, 18000, 21000, 101, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "107", "http://images.amazon.com/images/P/0312252617.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("108", "Female Intelligence", "2001", "2001-01-01", 219, 71000, 74000, 184, 0x556e617661696c61626c65, 1, "This is a dummy description for testing purposes", "108", "http://images.amazon.com/images/P/0312261594.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("109", "Pasquale's Nose: Idle Days in an Italian Town", "2002", "2002-01-01", 304, 478000, 481000, 141, 0x417661696c61626c65, 0, "This is a dummy description for testing purposes", "109", "http://images.amazon.com/images/P/0316748641.01.LZZZZZZZ.jpg" );
INSERT INTO book (book_ID, book_name, publication_year, release_date, page_count, purchase_price, sale_price, remaining_quantity, display_status, deleted_tag, description, publisher_ID, img_path) VALUES ("110", "The Gospel of Judas: A Novel", "2002", "2002-01-01", 427, 149000, 152000, 139, 0x556e617661696c61626c65, 0, "This is a dummy description for testing purposes", "110", "http://images.amazon.com/images/P/0316973742.01.LZZZZZZZ.jpg" );


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_include`
--

CREATE TABLE `cart_include` (
  `ID` varchar(45) NOT NULL,
  `book_ID` varchar(45) NOT NULL,
  `cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `address` varchar(255) NOT NULL,
  `ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` varchar(45) NOT NULL,
  `start_date` date DEFAULT NULL,
  `employee_status` varbinary(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

-- SQL script for inserting employee

INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20010101', '2010-09-10', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20020202', '2010-18-08', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20030303', '2010-24-04', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20040404', '2010-12-02', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20050505', '2010-14-03', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20060606', '2010-20-03', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20070707', '2010-20-03', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20080808', '2010-30-05', 0x46756c6c2d74696d65);
INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES ('20090909', '2010-30-06', 0x46756c6c2d74696d65);


-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_ID` varchar(45) NOT NULL,
  `genre_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_ID`, `genre_name`) VALUES
('01', 'sách giáo khoa - giáo trình'),
('02', 'Truyện cổ tích'),
('03', 'Tiểu thuyết'),
('04', 'Trinh thám');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`) VALUES
('10010101'),
('10030303'),
('10040404'),
('10050505'),
('10060606');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` varchar(45) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_info` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

-- SQL script for inserting order

INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO1", "2023-06-30", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO2", "2023-01-3", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO3", "2023-08-28", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO4", "2023-02-21", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO5", "2023-05-6", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO6", "2023-12-20", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO7", "2023-05-30", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO8", "2023-04-16", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO9", "2023-08-8", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO10", "2023-01-10", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO11", "2023-08-25", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO12", "2023-04-16", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO13", "2023-04-16", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO14", "2023-08-13", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO15", "2023-03-15", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO16", "2023-10-23", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO17", "2023-10-17", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO18", "2023-11-25", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO19", "2023-03-24", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO20", "2023-10-2", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO21", "2023-04-14", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO22", "2023-04-1", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO23", "2023-04-3", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO24", "2023-07-18", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO25", "2023-12-19", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO26", "2023-12-5", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO27", "2023-04-13", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO28", "2023-04-11", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO29", "2023-03-7", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO30", "2023-07-8", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO31", "2023-02-19", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO32", "2023-06-4", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO33", "2023-09-5", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO34", "2023-07-25", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO35", "2023-12-28", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO36", "2023-11-25", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO37", "2023-08-13", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO38", "2023-05-7", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO39", "2023-04-5", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO40", "2023-03-26", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO41", "2023-04-28", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO42", "2023-04-18", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO43", "2023-10-13", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO44", "2023-10-23", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO45", "2023-01-11", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO46", "2023-10-20", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO47", "2023-06-4", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO48", "2023-02-8", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO49", "2023-12-26", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO50", "2023-04-28", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO51", "2023-08-29", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO52", "2023-05-17", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO53", "2023-02-8", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO54", "2023-04-22", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO55", "2023-04-7", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO56", "2023-10-7", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO57", "2023-09-16", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO58", "2023-08-17", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO59", "2023-11-14", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO60", "2023-01-18", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO61", "2023-03-11", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO62", "2023-03-9", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO63", "2023-04-2", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO64", "2023-01-28", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO65", "2023-03-29", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO66", "2023-02-25", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO67", "2023-11-16", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO68", "2023-05-15", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO69", "2023-01-3", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO70", "2023-07-1", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO71", "2023-03-20", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO72", "2023-02-25", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO73", "2023-07-2", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO74", "2023-05-24", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO75", "2023-07-3", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO76", "2023-08-23", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO77", "2023-03-5", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO78", "2023-04-20", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO79", "2023-12-17", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO80", "2023-01-20", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO81", "2023-11-18", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO82", "2023-09-24", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO83", "2023-12-8", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO84", "2023-12-8", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO85", "2023-08-8", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO86", "2023-01-26", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO87", "2023-04-9", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO88", "2023-05-7", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO89", "2023-08-1", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO90", "2023-10-21", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO91", "2023-02-21", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO92", "2023-06-24", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO93", "2023-11-12", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO94", "2023-04-18", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO95", "2023-09-6", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO96", "2023-01-2", "Mua tại store, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO97", "2023-09-4", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO98", "2023-10-9", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO99", "2023-10-24", "Mua tại store, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("STO100", "2023-06-12", "Mua tại store, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL1", "2023-04-7", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL2", "2023-10-4", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL3", "2023-11-10", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL4", "2023-11-4", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL5", "2023-11-18", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL6", "2023-11-5", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL7", "2023-02-4", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL8", "2023-04-17", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL9", "2023-07-28", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL10", "2023-07-8", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL11", "2023-05-9", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL12", "2023-02-8", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL13", "2023-06-23", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL14", "2023-09-30", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL15", "2023-11-2", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL16", "2023-02-22", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL17", "2023-08-9", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL18", "2023-01-24", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL19", "2023-11-26", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL20", "2023-08-16", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL21", "2023-12-30", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL22", "2023-03-24", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL23", "2023-08-30", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL24", "2023-09-28", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL25", "2023-12-7", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL26", "2023-08-29", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL27", "2023-02-17", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL28", "2023-05-18", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL29", "2023-09-10", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL30", "2023-06-5", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL31", "2023-03-15", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL32", "2023-02-9", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL33", "2023-09-21", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL34", "2023-12-27", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL35", "2023-08-1", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL36", "2023-03-21", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL37", "2023-07-1", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL38", "2023-04-13", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL39", "2023-08-26", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL40", "2023-01-22", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL41", "2023-12-4", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL42", "2023-08-29", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL43", "2023-12-17", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL44", "2023-08-24", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL45", "2023-02-19", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL46", "2023-03-22", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL47", "2023-09-12", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL48", "2023-09-9", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL49", "2023-06-11", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL50", "2023-09-17", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL51", "2023-04-6", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL52", "2023-11-30", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL53", "2023-10-13", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL54", "2023-04-21", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL55", "2023-06-23", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL56", "2023-12-19", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL57", "2023-07-19", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL58", "2023-04-7", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL59", "2023-07-10", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL60", "2023-04-25", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL61", "2023-02-25", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL62", "2023-08-25", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL63", "2023-07-15", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL64", "2023-06-18", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL65", "2023-12-5", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL66", "2023-06-12", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL67", "2023-06-21", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL68", "2023-08-22", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL69", "2023-10-15", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL70", "2023-09-8", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL71", "2023-10-8", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL72", "2023-05-13", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL73", "2023-11-10", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL74", "2023-08-22", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL75", "2023-03-25", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL76", "2023-09-8", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL77", "2023-02-19", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL78", "2023-06-2", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL79", "2023-08-3", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL80", "2023-05-5", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL81", "2023-06-3", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL82", "2023-09-21", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL83", "2023-12-21", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL84", "2023-02-15", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL85", "2023-06-25", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL86", "2023-04-20", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL87", "2023-12-25", "Online, Đã duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL88", "2023-08-10", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL89", "2023-10-4", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL90", "2023-09-12", "Online, Đang chờ duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL91", "2023-04-15", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL92", "2023-05-7", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL93", "2023-04-22", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL94", "2023-11-27", "Online, Đang chờ duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL95", "2023-10-4", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL96", "2023-06-20", "Online, Đang chờ duyệt, Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL97", "2023-05-20", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL98", "2023-05-12", "Online, Đã duyệt, Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL99", "2023-09-20", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("ONL100", "2023-06-27", "Online, Đã duyệt, Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH1", "2023-10-30", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH2", "2023-12-30", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH3", "2023-09-17", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH4", "2023-06-23", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH5", "2023-05-12", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH6", "2023-09-29", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH7", "2023-11-24", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH8", "2023-03-17", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH9", "2023-02-7", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH10", "2023-06-25", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH11", "2023-12-15", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH12", "2023-10-19", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH13", "2023-02-3", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH14", "2023-08-22", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH15", "2023-01-27", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH16", "2023-03-7", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH17", "2023-09-11", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH18", "2023-04-5", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH19", "2023-10-26", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH20", "2023-03-5", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH21", "2023-03-17", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH22", "2023-03-30", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH23", "2023-01-8", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH24", "2023-01-27", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH25", "2023-03-15", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH26", "2023-03-29", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH27", "2023-05-7", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH28", "2023-08-22", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH29", "2023-02-9", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH30", "2023-06-8", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH31", "2023-10-15", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH32", "2023-10-27", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH33", "2023-02-3", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH34", "2023-02-20", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH35", "2023-09-27", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH36", "2023-03-1", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH37", "2023-07-3", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH38", "2023-03-8", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH39", "2023-01-22", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH40", "2023-11-13", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH41", "2023-10-5", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH42", "2023-01-18", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH43", "2023-01-14", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH44", "2023-02-9", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH45", "2023-01-1", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH46", "2023-08-20", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH47", "2023-04-24", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH48", "2023-07-8", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH49", "2023-05-11", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH50", "2023-02-3", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH51", "2023-09-11", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH52", "2023-04-4", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH53", "2023-07-15", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH54", "2023-06-19", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH55", "2023-10-30", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH56", "2023-09-1", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH57", "2023-10-15", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH58", "2023-07-14", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH59", "2023-10-23", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH60", "2023-07-13", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH61", "2023-02-19", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH62", "2023-09-5", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH63", "2023-09-16", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH64", "2023-10-11", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH65", "2023-09-16", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH66", "2023-02-28", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH67", "2023-07-30", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH68", "2023-07-13", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH69", "2023-06-27", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH70", "2023-02-11", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH71", "2023-08-26", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH72", "2023-09-16", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH73", "2023-04-20", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH74", "2023-02-11", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH75", "2023-08-16", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH76", "2023-02-7", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH77", "2023-02-6", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH78", "2023-02-19", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH79", "2023-10-24", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH80", "2023-07-2", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH81", "2023-09-17", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH82", "2023-05-11", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH83", "2023-03-9", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH84", "2023-12-23", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH85", "2023-01-7", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH86", "2023-04-6", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH87", "2023-09-14", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH88", "2023-02-18", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH89", "2023-03-10", "Đơn nhập hàng, , Mua nợ 690k");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH90", "2023-08-20", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH91", "2023-06-30", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH92", "2023-07-5", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH93", "2023-01-18", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH94", "2023-05-28", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH95", "2023-06-12", "Đơn nhập hàng, , Không");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH96", "2023-09-6", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH97", "2023-01-19", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH98", "2023-07-15", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH99", "2023-11-3", "Đơn nhập hàng, , Gọi trước 30p");
INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES ("PCH100", "2023-11-9", "Đơn nhập hàng, , Mua nợ 690k");


--
-- Triggers `order`
--
DELIMITER $$
CREATE TRIGGER `trAddOrderSale` AFTER INSERT ON `order` FOR EACH ROW BEGIN
    -- Insert into sale_order
    INSERT INTO sale_order (sale_ID, payment_status, member_ID, employee_ID)
    VALUES (NEW.order_ID, 'Đã thanh toán', '10010101', '20010101');

    -- Insert into sale_include for each book in the order
    INSERT INTO sale_include (sale_ID, book_ID, sale_quantity)
    VALUES
        (NEW.order_ID, '5', 3),
        (NEW.order_ID, '6', 4),
        (NEW.order_ID, '7', 5);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_ID` varchar(45) NOT NULL,
  `publisher_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES
('001', 'NXB Giáo dục Việt Nam');

-- SQL script for inserting publisher
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("002", "HarperPerennial");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("003", "Farrar Straus Giroux");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("004", "W. W. Norton &amp, Company");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("005", "Putnam Pub Group");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("006", "Berkley Publishing Group");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("007", "Audioworks");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("008", "Random House");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("009", "Scribner");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("010", "Emblem Editions");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("011", "Citadel Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("012", "House of Anansi Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("013", "Mira Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("014", "Health Communications");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("015", "Brilliance Audio - Trade");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("016", "Kensington Publishing Corp.");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("017", "River City Pub");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("018", "Dell");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("019", "Plume");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("020", "Three Rivers Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("021", "Ryland Peters &amp, Small Ltd");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("022", "Cypress House");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("023", "HarperEntertainment");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("024", "Scholastic");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("025", "Aladdin");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("026", "Too Far");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("027", "Ballantine Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("028", "Ballantine Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("029", "Scribner");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("030", "Random House Trade Paperbacks");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("031", "Berkley Publishing Group");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("032", "L�?¼bbe");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("033", "Goldmann");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("034", "Goldmann");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("035", "Goldmann");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("036", "Alfred A. Knopf");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("037", "Little Brown &amp, Company");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("038", "Ballantine Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("039", "Harpercollins");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("040", "Avon");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("041", "Bantam");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("042", "Fireside");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("043", "HarperTorch");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("044", "Bantam Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("045", "Pocket");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("046", "Bantam Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("047", "Berkley Publishing Group");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("048", "Berkley Publishing Group");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("049", "Dell");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("050", "Tor Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("051", "Tyndale House Publishers");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("052", "Dell");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("053", "HarperCollins Publishers");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("054", "Harvest Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("055", "Chambers Harrap Publishers Ltd");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("056", "Avon Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("057", "Bantam");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("058", "Speed Graphics");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("059", "Sunflower Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("060", "Pocket");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("061", "Laurel Leaf");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("062", "Laurel Leaf");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("063", "Gallimard");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("064", "Ballantine Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("065", "Random House");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("066", "Berkley Publishing Group");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("067", "Prentice Hall (K-12)");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("068", "NTC/Contemporary Publishing Company");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("069", "St. Martin's Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("070", "NTC/Contemporary Publishing Company");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("071", "1stBooks Library");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("072", "Avon Trade");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("073", "Penguin Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("074", "Ballantine Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("075", "Signet Book");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("076", "Thomas Nelson");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("077", "Ace Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("078", "Laurel Leaf");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("079", "Landoll");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("080", "Knopf");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("081", "Andrew Scott Publishers");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("082", "Atlantic Monthly Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("083", "Hodder &amp, Stoughton General Division");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("084", "Simon &amp, Schuster (Trade Division)");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("085", "Perennial");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("086", "Harpercollins");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("087", "McGraw-Hill");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("088", "Random House");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("089", "Bantam Doubleday Dell");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("090", "Little, Brown");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("091", "Minotauro");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("092", "Minotauro");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("093", "Distribooks");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("094", "Random House");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("095", "Pocket");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("096", "St. Martin's Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("097", "St. Martin's Press");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("098", "Back Bay Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("099", "Back Bay Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("100", "Doubleday Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("101", "Warner Books");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("102", "Signet Book");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("103", "Bantam");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("104", "Fireside");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("105", "Vintage");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("106", "Fireside");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("107", "Hyperion");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("108", "Tusquets");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("109", "Star Trek");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("110", "Pocket");
INSERT INTO `publisher` (`publisher_ID`, `publisher_name`) VALUES ("111", "Dell");


-- --------------------------------------------------------

--
-- Table structure for table `purchase_include`
--

CREATE TABLE `purchase_include` (
  `purchase_ID` varchar(45) NOT NULL,
  `book_ID` varchar(45) NOT NULL,
  `purchase_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_include`
--

-- SQL script for inserting purchase_order

INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH52", "31", 96);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH64", "41", 65);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH29", "28", 135);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH39", "41", 171);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH89", "49", 185);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH71", "108", 98);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH25", "54", 112);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH41", "55", 77);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH52", "17", 110);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH13", "35", 156);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH82", "28", 63);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH95", "59", 71);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH18", "53", 71);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH91", "63", 97);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH45", "59", 60);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH54", "67", 151);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH93", "51", 189);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH19", "18", 160);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH70", "25", 114);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH5", "95", 110);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH76", "100", 182);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH69", "3", 139);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH9", "107", 160);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH50", "101", 101);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH31", "56", 180);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH67", "44", 93);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH68", "87", 146);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH7", "3", 127);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH26", "28", 147);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH81", "84", 74);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH57", "16", 185);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH11", "95", 112);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH52", "107", 82);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH59", "20", 51);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH65", "76", 156);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH63", "104", 128);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH21", "97", 176);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH7", "7", 169);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH81", "44", 78);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH14", "14", 155);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH15", "25", 185);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH39", "78", 139);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH14", "37", 140);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH64", "103", 94);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH48", "106", 140);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH5", "12", 107);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH55", "62", 154);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH65", "63", 181);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH66", "6", 154);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH66", "89", 112);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH5", "70", 148);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH37", "59", 162);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH81", "52", 141);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH17", "60", 62);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH14", "110", 180);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH56", "104", 79);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH55", "71", 154);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH59", "13", 94);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH35", "77", 101);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH50", "72", 58);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH20", "107", 137);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH44", "103", 180);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH4", "2", 193);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH22", "75", 164);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH57", "14", 127);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH66", "99", 114);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH7", "36", 90);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH57", "20", 171);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH64", "6", 152);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH28", "88", 182);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH96", "41", 162);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH68", "59", 142);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH42", "12", 102);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH52", "106", 97);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH28", "98", 182);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH58", "43", 148);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH92", "41", 60);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH23", "73", 171);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH7", "109", 90);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH32", "3", 129);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH26", "106", 191);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH53", "26", 149);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH14", "102", 143);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH89", "25", 137);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH54", "101", 99);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH77", "36", 130);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH16", "59", 193);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH37", "6", 83);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH33", "95", 56);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH71", "33", 193);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH4", "62", 197);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH28", "66", 120);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH99", "38", 52);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH70", "98", 105);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH47", "92", 165);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH11", "92", 122);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH11", "106", 66);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH100", "41", 189);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH87", "79", 109);
INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES ("PCH23", "101", 140);


-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchase_ID` varchar(45) NOT NULL,
  `employee_ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

-- SQL script for inserting purchase_order

INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH1");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH2");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH3");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH4");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH5");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH6");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH7");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH8");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH9");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH10");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH11");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH12");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH13");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH14");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH15");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH16");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH17");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH18");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH19");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH20");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH21");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH22");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH23");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH24");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH25");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH26");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH27");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH28");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH29");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH30");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH31");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH32");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH33");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH34");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH35");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH36");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH37");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH38");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH39");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH40");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH41");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH42");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH43");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH44");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH45");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH46");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH47");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH48");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH49");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH50");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH51");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH52");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH53");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH54");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH55");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH56");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH57");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH58");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH59");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH60");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH61");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH62");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH63");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH64");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH65");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH66");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH67");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH68");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH69");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH70");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH71");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH72");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH73");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH74");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH75");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH76");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH77");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH78");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH79");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH80");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH81");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH82");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH83");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH84");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH85");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH86");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH87");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH88");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH89");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH90");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH91");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH92");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH93");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH94");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH95");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH96");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH97");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH98");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH99");
INSERT INTO `purchase_order` (`purchase_ID`) VALUES ("PCH100");


-- --------------------------------------------------------

--
-- Table structure for table `sale_include`
--

CREATE TABLE `sale_include` (
  `sale_ID` varchar(45) NOT NULL,
  `book_ID` varchar(45) NOT NULL,
  `sale_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_include`
--

-- SQL script for inserting sale_include

INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO98", "75", 54);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL3", "106", 80);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL91", "39", 74);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL13", "60", 56);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL65", "95", 175);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO79", "34", 137);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL78", "72", 187);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL49", "92", 166);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO81", "78", 78);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL91", "45", 72);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO43", "99", 176);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL59", "109", 157);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO11", "89", 95);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO87", "76", 127);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL50", "5", 126);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL34", "56", 86);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO83", "71", 80);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL31", "15", 152);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL43", "56", 133);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL93", "62", 177);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO31", "109", 146);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO93", "47", 83);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO48", "59", 180);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL74", "4", 52);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL17", "97", 68);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO27", "93", 178);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL4", "61", 185);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO9", "71", 123);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO37", "104", 183);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL66", "8", 74);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL23", "42", 198);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO83", "88", 114);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL24", "14", 71);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO23", "79", 107);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO44", "92", 200);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO86", "85", 145);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL33", "39", 165);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO8", "16", 62);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO73", "65", 81);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL74", "19", 119);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO85", "53", 139);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO83", "94", 63);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO65", "21", 193);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO4", "109", 170);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO11", "31", 197);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO9", "69", 167);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO49", "52", 86);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL41", "52", 193);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL6", "90", 148);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO56", "29", 154);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO79", "72", 195);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL73", "63", 54);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO84", "21", 143);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO78", "15", 85);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO55", "11", 98);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL69", "20", 193);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO12", "2", 71);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO34", "48", 117);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO73", "73", 77);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL50", "91", 179);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO14", "107", 117);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL99", "102", 51);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL9", "8", 97);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL18", "44", 104);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL68", "25", 57);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO54", "65", 58);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL51", "92", 76);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO21", "2", 142);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL9", "89", 141);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO54", "71", 64);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL63", "106", 84);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO64", "48", 66);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO92", "94", 158);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO42", "4", 156);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO45", "58", 80);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO72", "14", 136);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL42", "97", 127);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL64", "6", 129);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO49", "51", 133);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL19", "66", 168);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL95", "87", 82);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL24", "90", 135);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO68", "104", 66);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL36", "21", 158);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO63", "106", 122);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO87", "96", 142);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL83", "76", 92);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO51", "60", 81);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO1", "99", 105);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL45", "103", 102);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO52", "60", 177);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL13", "99", 73);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO56", "65", 190);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO33", "68", 128);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO100", "97", 89);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL2", "30", 138);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO21", "101", 125);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO39", "35", 192);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("STO78", "14", 184);
INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES ("ONL82", "76", 108);


-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `sale_ID` varchar(45) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_address` longtext DEFAULT NULL,
  `payment_status` varbinary(45) DEFAULT NULL,
  `member_ID` varchar(45) NOT NULL,
  `employee_ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_order`
--

-- SQL script for inserting sale_order

INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO55", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL22", "2023-01-27", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL94", "2023-06-28", "268 Lý Thường Kiệt", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO85", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL51", "2023-06-10", "Moscow", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO30", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO57", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL26", "2023-09-26", "268 Lý Thường Kiệt", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL8", "2023-07-2", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO93", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL18", "2023-10-28", "KTX Khu A", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL37", "2023-02-1", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO16", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO75", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL92", "2023-02-18", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL95", "2023-12-11", "Moscow", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO8", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO70", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL94", "2023-05-12", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL29", "2023-11-23", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL69", "2023-01-14", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL35", "2023-04-9", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO56", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL50", "2023-05-8", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO90", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO20", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL43", "2023-10-11", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL52", "2023-09-19", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL93", "2023-06-5", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL42", "2023-09-22", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL13", "2023-05-24", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL99", "2023-08-26", "268 Lý Thường Kiệt", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL89", "2023-06-20", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL26", "2023-12-14", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO58", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL39", "2023-09-18", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO63", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO40", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL34", "2023-10-27", "Dĩ An, Bình Dương", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO69", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL55", "2023-05-16", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO7", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO26", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO25", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO89", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL59", "2023-03-25", "KTX Khu A", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO26", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO39", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL2", "2023-09-26", "Moscow", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO90", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL30", "2023-06-18", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL100", "2023-09-21", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL50", "2023-11-2", "Dĩ An, Bình Dương", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO14", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO5", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL49", "2023-08-28", "268 Lý Thường Kiệt", 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL14", "2023-10-27", "Dĩ An, Bình Dương", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL31", "2023-04-25", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL44", "2023-12-4", "Moscow", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO4", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL46", "2023-03-1", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO38", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO48", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO20", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL42", "2023-11-11", "KTX Khu A", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO79", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL96", "2023-12-5", "KTX Khu A", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO72", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO82", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO17", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO24", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO10", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO35", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO57", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO77", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20060606");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO53", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO85", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL8", "2023-01-4", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL61", "2023-05-17", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO34", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL36", "2023-07-28", "268 Lý Thường Kiệt", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO25", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL81", "2023-09-5", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL11", "2023-02-4", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO100", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10040404", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL95", "2023-02-13", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO60", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO74", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO75", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL16", "2023-07-7", "Dĩ An, Bình Dương", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20030303");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO15", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL21", "2023-06-27", "Thiên đình", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO37", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20050505");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL29", "2023-08-24", "Paris", 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20070707");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO95", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20010101");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL27", "2023-01-17", "Dĩ An, Bình Dương", 0xc490c3a3207468616e6820746fc3a16e, "10020202", "20020202");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("ONL33", "2023-12-25", "Nhà trắng", 0xc490c3a3207468616e6820746fc3a16e, "10030303", "20040404");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO3", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO61", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10050505", "20080808");
INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES ("STO4", NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, "10010101", "20060606");


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` varchar(45) NOT NULL,
  `sur_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone_num` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `user_info` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `sur_name`, `last_name`, `phone_num`, `email`, `username`, `password`, `user_info`) VALUES
('10010101', 'Trần Nguyễn Nam', 'Anh', '0765710073', 'sallytran2809@gmail.com', 'na', 'na2809', 'TNNA is a test user'),
('10030303', 'Nguyễn Ngọc Bảo', 'Châu', '0913667729', 'bouchou@gmail.com', 'chou', 'bouchou', 'NNBC is a test user'),
('10040404', 'Đỗ Ngọc', 'Ánh', '0918511314', 'dna3@gmail.com', 'dna', 'dnadna', 'ĐNA is a test user'),
('10050505', 'Linh Ngọc Thùy', 'Ngân', '0938271688', 'bow@gmail.com', 'bowne', 'ngankhung', 'LNTN is a test user'),
('10060606', 'Phan Trần Minh Đạt', 'E', '0900000000', 'datholuon@gmail.com', 'minhdat', 'luonleo', 'PTMĐ is a test user'),
('20010101', 'Nguyen Van', 'A', '0901010101', 'test1@gmail.com', 'test1', 'test1', 'Nguyen Van A is a test user'),
('20030303', 'Nguyen Thi', 'B', '0903030303', 'test2@gmail.com', 'test2', 'test2', 'Nguyen Thi B is a test user'),
('20040404', 'Le Van', 'C', '0904040404', 'test3@gmail.com', 'test3', 'test3', 'Le Van C is a test user'),
('20050505', 'Le Thi', 'D', '0905050505', 'test4@gmail.com', 'test4', 'test4', 'Le Thi D is a test user'),
('20060606', 'Dao Van', 'E', '0906060606', 'test5@gmail.com', 'test5', 'test5', 'Dao Van E is a test user');

-- --------------------------------------------------------

--
-- Table structure for table `written_by`
--

CREATE TABLE `written_by` (
  `book_ID` varchar(45) NOT NULL,
  `author_ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
-- SQL script for inserting written_by

INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("0", "92");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("1", "96");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("2", "71");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("3", "50");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("4", "97");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("5", "47");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("6", "32");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("7", "58");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("8", "77");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("9", "93");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("10", "56");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("11", "87");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("12", "98");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("13", "83");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("14", "90");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("15", "21");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("16", "50");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("17", "63");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("18", "58");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("19", "52");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("20", "78");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("21", "45");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("22", "64");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("23", "89");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("24", "76");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("25", "18");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("26", "83");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("27", "2");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("28", "63");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("29", "98");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("30", "90");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("31", "89");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("32", "4");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("33", "58");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("34", "36");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("35", "88");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("36", "98");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("37", "32");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("38", "14");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("39", "77");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("40", "3");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("41", "14");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("42", "65");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("43", "96");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("44", "23");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("45", "5");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("46", "1");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("47", "22");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("48", "74");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("49", "58");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("50", "36");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("51", "30");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("52", "46");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("53", "5");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("54", "86");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("55", "59");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("56", "31");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("57", "7");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("58", "41");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("59", "30");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("60", "11");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("61", "69");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("62", "95");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("63", "33");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("64", "98");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("65", "71");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("66", "38");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("67", "60");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("68", "26");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("69", "60");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("70", "23");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("71", "21");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("72", "88");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("73", "16");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("74", "89");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("75", "55");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("76", "80");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("77", "97");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("78", "92");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("79", "98");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("80", "37");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("81", "15");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("82", "12");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("83", "10");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("84", "8");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("85", "55");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("86", "16");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("87", "86");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("88", "8");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("89", "99");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("90", "56");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("91", "11");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("92", "62");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("93", "51");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("94", "7");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("95", "3");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("96", "90");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("97", "84");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("98", "68");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("99", "94");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("100", "23");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("101", "53");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("102", "5");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("103", "74");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("104", "38");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("105", "50");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("106", "18");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("107", "13");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("108", "26");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("109", "69");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("110", "56");
INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES ("111", "36");


--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_ID`);

--
-- Indexes for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD PRIMARY KEY (`book_ID`,`genre_ID`),
  ADD KEY `FK_1` (`book_ID`),
  ADD KEY `FK_2` (`genre_ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_ID`),
  ADD KEY `FK_1` (`publisher_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_1` (`ID`);

--
-- Indexes for table `cart_include`
--
ALTER TABLE `cart_include`
  ADD PRIMARY KEY (`ID`,`book_ID`),
  ADD KEY `FK_1` (`ID`),
  ADD KEY `FK_2` (`book_ID`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`address`,`ID`),
  ADD KEY `FK_1` (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_1` (`ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_1` (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_ID`);

--
-- Indexes for table `purchase_include`
--
ALTER TABLE `purchase_include`
  ADD PRIMARY KEY (`purchase_ID`,`book_ID`),
  ADD KEY `FK_1` (`purchase_ID`),
  ADD KEY `FK_2` (`book_ID`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_ID`),
  ADD KEY `FK_1` (`purchase_ID`),
  ADD KEY `FK_2` (`employee_ID`);

--
-- Indexes for table `sale_include`
--
ALTER TABLE `sale_include`
  ADD PRIMARY KEY (`sale_ID`,`book_ID`),
  ADD KEY `FK_1` (`sale_ID`),
  ADD KEY `FK_2` (`book_ID`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`sale_ID`),
  ADD KEY `FK_1` (`sale_ID`),
  ADD KEY `FK_2` (`member_ID`),
  ADD KEY `FK_3` (`employee_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `written_by`
--
ALTER TABLE `written_by`
  ADD PRIMARY KEY (`book_ID`,`author_ID`),
  ADD KEY `FK_1` (`book_ID`),
  ADD KEY `FK_2` (`author_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD CONSTRAINT `FK_15` FOREIGN KEY (`book_ID`) REFERENCES `book` (`book_ID`),
  ADD CONSTRAINT `FK_16` FOREIGN KEY (`genre_ID`) REFERENCES `genre` (`genre_ID`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_19` FOREIGN KEY (`publisher_ID`) REFERENCES `publisher` (`publisher_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`ID`) REFERENCES `member` (`ID`);

--
-- Constraints for table `cart_include`
--
ALTER TABLE `cart_include`
  ADD CONSTRAINT `FK_11` FOREIGN KEY (`ID`) REFERENCES `cart` (`ID`),
  ADD CONSTRAINT `FK_14` FOREIGN KEY (`book_ID`) REFERENCES `book` (`book_ID`);

--
-- Constraints for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`ID`) REFERENCES `member` (`ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `purchase_include`
--
ALTER TABLE `purchase_include`
  ADD CONSTRAINT `FK_12` FOREIGN KEY (`book_ID`) REFERENCES `book` (`book_ID`),
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`purchase_ID`) REFERENCES `purchase_order` (`purchase_ID`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`purchase_ID`) REFERENCES `order` (`order_ID`),
  ADD CONSTRAINT `FK_20` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `sale_include`
--
ALTER TABLE `sale_include`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`sale_ID`) REFERENCES `sale_order` (`sale_ID`),
  ADD CONSTRAINT `FK_13` FOREIGN KEY (`book_ID`) REFERENCES `book` (`book_ID`);

--
-- Constraints for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`sale_ID`) REFERENCES `order` (`order_ID`),
  ADD CONSTRAINT `FK_7` FOREIGN KEY (`member_ID`) REFERENCES `member` (`ID`),
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`);

--
-- Constraints for table `written_by`
--
ALTER TABLE `written_by`
  ADD CONSTRAINT `FK_17` FOREIGN KEY (`book_ID`) REFERENCES `book` (`book_ID`),
  ADD CONSTRAINT `FK_18` FOREIGN KEY (`author_ID`) REFERENCES `author` (`author_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
