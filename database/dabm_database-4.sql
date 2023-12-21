-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 20, 2023 at 03:17 PM
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
('01', 'Nhiều tác giả'),
('11', 'Jay Forman'),
('12', 'Ronald Conway'),
('13', 'Ramona Gonczol-Davies'),
('14', 'Bruce McMillan'),
('15', 'Ralf Niemczyk'),
('16', 'Nigel Pollock'),
('17', 'Jane Walmsley'),
('18', 'Deborah Rudacille'),
('19', 'Caroline Leavitt'),
('20', 'Dave McGovern'),
('21', 'Helen Brooks'),
('22', 'Arnold A. Griese'),
('23', 'Gary Rosberg'),
('24', 'Gregory E Pence'),
('25', 'Sherri Mandell'),
('26', 'Jan McKee'),
('27', 'Scott Atkinson'),
('28', 'Laurence J Peter'),
('29', 'Joanna Harris'),
('30', 'R. John Brockmann'),
('31', 'Donald D. Cheatham'),
('32', 'Bernard Hagene'),
('33', 'Leontyne Price'),
('34', 'William R. Forstchen'),
('35', 'John Dyson'),
('36', 'Steve Stewart'),
('37', 'Will Friedwald'),
('38', 'Curtis Hutson'),
('39', 'Sally Greengross'),
('40', 'Clarence Norris'),
('41', 'MÃ¡ximo Pradera'),
('42', 'MIRIAM WEINSTEIN'),
('43', 'Barbara Mujica'),
('44', 'Brian Castro'),
('45', 'Trevor Wye'),
('46', 'Dale Van Every'),
('47', 'Joseph Mitchell'),
('48', 'Randy Richmond'),
('49', 'Joseph Gelineau'),
('50', 'Duerrenmatt'),
('51', 'Todd Litman'),
('52', 'Tom Philbin'),
('53', 'Jonathan A. Michaels'),
('54', 'Ann McAllister'),
('55', 'Jean Betschart-Roemer'),
('56', 'Jacqueline DeJohn'),
('57', 'Fiona'),
('58', 'George Hardinge'),
('59', 'Jennifer B. Jones'),
('60', 'Richard Kindsvatter'),
('61', 'PHYLLIS GREENE'),
('62', 'Kerry Madden'),
('63', 'Ruth K. Westheimer'),
('64', 'Richard M. Ebeling'),
('65', 'Charles Merrill Smith'),
('66', 'Jennifer Knapp'),
('67', 'Charles Frances Hunter'),
('68', 'Emily Rodda'),
('69', 'Jacqueline Williams'),
('70', 'J. Edward Evans'),
('71', 'Clemens Birnbaum'),
('72', 'BARBARA MUJICA'),
('73', 'Judith Lennox'),
('74', 'Collard'),
('75', 'Kerry Mark Joels'),
('76', 'John S. Dunne'),
('77', 'D. Whitelock'),
('78', 'Helaine G. Helmreich'),
('79', 'Sarah Mlynowski'),
('80', 'Alfred Werner'),
('81', 'E. B White'),
('82', 'K. J. Eddey'),
('83', 'Michael Massey'),
('84', 'Mat Schulz'),
('85', 'Georges  Ifrah'),
('86', "Elaine O'Reilly"),
('87', 'Rowan Williams'),
('88', 'Robert Wuthnow'),
('89', 'Georges Bordonove'),
('90', 'Roger G. Kennedy'),
('91', 'Robert Mawson'),
('92', 'Charles Chesnutt'),
('93', 'Rosetta  James'),
('94', 'Donald Goldsmith'),
('95', 'George Herbert Mead'),
('96', 'Janice Larouche'),
('97', 'Jacqueline Harrod'),
('98', 'Gï¿½?Â©rard Delteil'),
('99', 'Kay Sheppard');

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
('100', '02'),
('101', '03'),
('102', '02'),
('103', '04'),
('104', '03'),
('105', '04'),
('106', '03'),
('107', '03'),
('108', '03'),
('109', '01'),
('11', '01'),
('110', '03'),
('12', '01'),
('13', '02'),
('14', '03'),
('15', '04'),
('16', '01'),
('17', '02'),
('18', '02'),
('19', '02'),
('2', '01'),
('20', '04'),
('21', '04'),
('22', '02'),
('23', '03'),
('24', '04'),
('25', '02'),
('26', '03'),
('27', '03'),
('28', '04'),
('29', '01'),
('3', '01'),
('30', '01'),
('31', '04'),
('32', '04'),
('33', '02'),
('34', '01'),
('35', '04'),
('36', '02'),
('37', '02'),
('38', '04'),
('39', '03'),
('4', '01'),
('40', '02'),
('41', '03'),
('42', '02'),
('43', '03'),
('44', '02'),
('45', '01'),
('46', '02'),
('47', '04'),
('48', '04'),
('49', '01'),
('5', '04'),
('50', '04'),
('51', '03'),
('52', '02'),
('53', '03'),
('54', '04'),
('55', '04'),
('56', '04'),
('57', '04'),
('58', '03'),
('59', '02'),
('6', '03'),
('60', '03'),
('61', '03'),
('62', '01'),
('63', '03'),
('64', '04'),
('65', '04'),
('66', '04'),
('67', '04'),
('68', '03'),
('69', '03'),
('7', '01'),
('70', '02'),
('71', '03'),
('72', '01'),
('73', '03'),
('74', '01'),
('75', '02'),
('76', '04'),
('77', '01'),
('78', '03'),
('79', '04'),
('8', '03'),
('80', '02'),
('81', '03'),
('82', '02'),
('83', '04'),
('84', '01'),
('85', '01'),
('86', '01'),
('87', '04'),
('88', '02'),
('89', '04'),
('9', '02'),
('90', '04'),
('91', '01'),
('92', '04'),
('93', '01'),
('94', '03'),
('95', '01'),
('96', '04'),
('97', '03'),
('98', '03'),
('99', '02');

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
  `deleted_tag` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `publisher_ID` varchar(45) NOT NULL,
  `img_path` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_ID`, `book_name`, `publication_year`, `release_date`, `page_count`, `purchase_price`, `sale_price`, `remaining_quantity`, `display_status`, `deleted_tag`, `description`, `publisher_ID`, `img_path`) VALUES
('1', 'Tiếng Việt 1 (Tập 1)', '2020', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, 0, NULL, '001', 'img/Books_Images/tiengviet1_tap1.jpg'),
('10', 'Shin - Cậu Bé Bút Chì', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, 0, NULL, '001', 'img/Books_Images/shin.jpeg'),
('100', 'Daybreakers Louis Lamour Collection', '1981', '1981-01-01', 266, 268000, 271000, 264, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '100', 'http://images.amazon.com/images/P/0553062042.01.LZZZZZZZ.jpg'),
('101', 'The Catcher in the Rye', '1991', '1991-01-01', 285, 367000, 370000, 295, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '101', 'http://images.amazon.com/images/P/0316769487.01.LZZZZZZZ.jpg'),
('102', 'El Senor De Los Anillos: LA Comunidad Del Ani', '2001', '2001-01-01', 437, 168000, 171000, 249, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '102', 'http://images.amazon.com/images/P/8445071408.01.LZZZZZZZ.jpg'),
('103', 'El Senor De Los Anillos: Las DOS Torres (Lord', '2001', '2001-01-01', 293, 245000, 248000, 297, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '103', 'http://images.amazon.com/images/P/8445071769.01.LZZZZZZZ.jpg'),
('104', 'El Senor De Los Anillos: El Retorno Del Rey (', '2001', '2001-01-01', 346, 470000, 473000, 230, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '104', 'http://images.amazon.com/images/P/8445071777.01.LZZZZZZZ.jpg'),
('105', 'Midnight in the Garden of Good and Evil: A Sa', '1994', '1994-01-01', 192, 214000, 217000, 107, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '105', 'http://images.amazon.com/images/P/0679429220.01.LZZZZZZZ.jpg'),
('106', "Pretend You Don't See Her", '1998', '1998-01-01', 211, 151000, 154000, 271, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '106', 'http://images.amazon.com/images/P/0671867156.01.LZZZZZZZ.jpg'),
('107', 'Fast Women', '2001', '2001-01-01', 395, 18000, 21000, 101, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '107', 'http://images.amazon.com/images/P/0312252617.01.LZZZZZZZ.jpg'),
('108', 'Female Intelligence', '2001', '2001-01-01', 219, 71000, 74000, 184, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '108', 'http://images.amazon.com/images/P/0312261594.01.LZZZZZZZ.jpg'),
('109', "Pasquale's Nose: Idle Days in an Italian Town", '2002', '2002-01-01', 304, 478000, 481000, 141, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '109', 'http://images.amazon.com/images/P/0316748641.01.LZZZZZZZ.jpg'),
('11', 'Classical Mythology', '2002', '2002-01-01', 94, 248000, 251000, 208, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '011', 'http://images.amazon.com/images/P/0195153448.01.LZZZZZZZ.jpg'),
('110', 'The Gospel of Judas: A Novel', '2002', '2002-01-01', 427, 149000, 152000, 139, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '110', 'http://images.amazon.com/images/P/0316973742.01.LZZZZZZZ.jpg'),
('12', 'Clara Callan', '2001', '2001-01-01', 474, 307000, 310000, 267, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '012', 'http://images.amazon.com/images/P/0002005018.01.LZZZZZZZ.jpg'),
('13', 'Decision in Normandy', '1991', '1991-01-01', 382, 473000, 476000, 231, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '013', 'http://images.amazon.com/images/P/0060973129.01.LZZZZZZZ.jpg'),
('14', 'Flu: The Story of the Great Influenza Pandemi', '1999', '1999-01-01', 324, 341000, 344000, 187, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '014', 'http://images.amazon.com/images/P/0374157065.01.LZZZZZZZ.jpg'),
('15', 'The Mummies of Urumchi', '1999', '1999-01-01', 380, 498000, 501000, 280, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '015', 'http://images.amazon.com/images/P/0393045218.01.LZZZZZZZ.jpg'),
('16', "The Kitchen God's Wife", '1991', '1991-01-01', 147, 367000, 370000, 203, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '016', 'http://images.amazon.com/images/P/0399135782.01.LZZZZZZZ.jpg'),
('17', "What If?: The World's Foremost Military Histo", '2000', '2000-01-01', 281, 479000, 482000, 146, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '017', 'http://images.amazon.com/images/P/0425176428.01.LZZZZZZZ.jpg'),
('18', 'PLEADING GUILTY', '1993', '1993-01-01', 184, 419000, 422000, 277, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '018', 'http://images.amazon.com/images/P/0671870432.01.LZZZZZZZ.jpg'),
('19', 'Under the Black Flag: The Romance and the Rea', '1996', '1996-01-01', 418, 218000, 221000, 265, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '019', 'http://images.amazon.com/images/P/0679425608.01.LZZZZZZZ.jpg'),
('2', 'Tiếng Việt 1 (Tập 2)', '2020', '2020-01-01', 190, 30000, 41000, 100, 0x556e617661696c61626c65, 0, NULL, '001', 'img/Books_Images/tiengviet1_tap2.jpg'),
('20', "Where You'll Find Me: And Other Stories", '2002', '2002-01-01', 152, 299000, 302000, 236, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '020', 'http://images.amazon.com/images/P/074322678X.01.LZZZZZZZ.jpg'),
('21', 'Nights Below Station Street', '1988', '1988-01-01', 243, 21000, 24000, 174, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '021', 'http://images.amazon.com/images/P/0771074670.01.LZZZZZZZ.jpg'),
('22', "Hitler\'s Secret Bankers: The Myth of Swiss Ne", '2000', '2000-01-01', 279, 352000, 355000, 230, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '022', 'http://images.amazon.com/images/P/080652121X.01.LZZZZZZZ.jpg'),
('23', 'The Middle Stories', '2004', '2004-01-01', 288, 181000, 184000, 292, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '023', 'http://images.amazon.com/images/P/0887841740.01.LZZZZZZZ.jpg'),
('24', 'Jane Doe', '1999', '1999-01-01', 146, 14000, 17000, 187, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '024', 'http://images.amazon.com/images/P/1552041778.01.LZZZZZZZ.jpg'),
('25', "A Second Chicken Soup for the Woman's Soul (C", '1998', '1998-01-01', 107, 21000, 24000, 272, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '025', 'http://images.amazon.com/images/P/1558746218.01.LZZZZZZZ.jpg'),
('26', 'The Witchfinder (Amos Walker Mystery Series)', '1998', '1998-01-01', 312, 336000, 339000, 189, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '026', 'http://images.amazon.com/images/P/1567407781.01.LZZZZZZZ.jpg'),
('27', 'More Cunning Than Man: A Social History of Ra', '1999', '1999-01-01', 434, 135000, 138000, 285, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '027', 'http://images.amazon.com/images/P/1575663937.01.LZZZZZZZ.jpg'),
('28', 'Goodbye to the Buttermilk Sky', '1994', '1994-01-01', 489, 254000, 257000, 222, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '028', 'http://images.amazon.com/images/P/1881320189.01.LZZZZZZZ.jpg'),
('29', 'The Testament', '1999', '1999-01-01', 346, 437000, 440000, 287, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '029', 'http://images.amazon.com/images/P/0440234743.01.LZZZZZZZ.jpg'),
('3', 'Lược Sử Thời Gian', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, 0, NULL, '001', 'img/Books_Images/LuocSuThoiGian.jpeg'),
('30', 'Beloved (Plume Contemporary Fiction)', '1994', '1994-01-01', 314, 203000, 206000, 266, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '030', 'http://images.amazon.com/images/P/0452264464.01.LZZZZZZZ.jpg'),
('31', 'Our Dumb Century: The Onion Presents 100 Year', '1999', '1999-01-01', 384, 117000, 120000, 203, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '031', 'http://images.amazon.com/images/P/0609804618.01.LZZZZZZZ.jpg'),
('32', 'New Vegetarian: Bold and Beautiful Recipes fo', '2001', '2001-01-01', 182, 318000, 321000, 204, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '032', 'http://images.amazon.com/images/P/1841721522.01.LZZZZZZZ.jpg'),
('33', "If I'd Known Then What I Know Now: Why Not Le", '2003', '2003-01-01', 312, 50000, 53000, 112, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '033', 'http://images.amazon.com/images/P/1879384493.01.LZZZZZZZ.jpg'),
('34', 'Mary-Kate &amp, Ashley Switching Goals (Mary-', '2000', '2000-01-01', 242, 285000, 288000, 145, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '034', 'http://images.amazon.com/images/P/0061076031.01.LZZZZZZZ.jpg'),
('35', "Tell Me This Isn't Happening", '1999', '1999-01-01', 108, 154000, 157000, 202, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '035', 'http://images.amazon.com/images/P/0439095026.01.LZZZZZZZ.jpg'),
('36', 'Flood : Mississippi 1927', '1998', '1998-01-01', 354, 459000, 462000, 276, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '036', 'http://images.amazon.com/images/P/0689821166.01.LZZZZZZZ.jpg'),
('37', 'Wild Animus', '2004', '2004-01-01', 310, 400000, 403000, 173, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '037', 'http://images.amazon.com/images/P/0971880107.01.LZZZZZZZ.jpg'),
('38', 'Airframe', '1997', '1997-01-01', 114, 234000, 237000, 182, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '038', 'http://images.amazon.com/images/P/0345402871.01.LZZZZZZZ.jpg'),
('39', 'Timeline', '2000', '2000-01-01', 259, 39000, 42000, 245, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '039', 'http://images.amazon.com/images/P/0345417623.01.LZZZZZZZ.jpg'),
('4', 'Đất Rừng Phương Nam', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, 0, NULL, '001', 'img/Books_Images/Dat_Rung_Phuong_Nam.jpeg'),
('40', 'OUT OF THE SILENT PLANET', '1996', '1996-01-01', 325, 443000, 446000, 208, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '040', 'http://images.amazon.com/images/P/0684823802.01.LZZZZZZZ.jpg'),
('41', 'Prague : A Novel', '2003', '2003-01-01', 157, 167000, 170000, 246, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '041', 'http://images.amazon.com/images/P/0375759778.01.LZZZZZZZ.jpg'),
('42', 'Chocolate Jesus', '1998', '1998-01-01', 449, 491000, 494000, 232, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '042', 'http://images.amazon.com/images/P/0425163091.01.LZZZZZZZ.jpg'),
('43', 'Wie Barney es sieht.', '2002', '2002-01-01', 330, 144000, 147000, 223, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '043', 'http://images.amazon.com/images/P/3404921038.01.LZZZZZZZ.jpg'),
('44', 'Der Fluch der Kaiserin. Ein Richter- Di- Roma', '2001', '2001-01-01', 485, 194000, 197000, 224, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '044', 'http://images.amazon.com/images/P/3442353866.01.LZZZZZZZ.jpg'),
('45', 'Sturmzeit. Roman.', '1991', '1991-01-01', 177, 361000, 364000, 107, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '045', 'http://images.amazon.com/images/P/3442410665.01.LZZZZZZZ.jpg'),
('46', 'Tage der Unschuld.', '2000', '2000-01-01', 417, 137000, 140000, 272, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '046', 'http://images.amazon.com/images/P/3442446937.01.LZZZZZZZ.jpg'),
('47', 'Lying Awake', '2000', '2000-01-01', 373, 191000, 194000, 156, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '047', 'http://images.amazon.com/images/P/0375406328.01.LZZZZZZZ.jpg'),
('48', 'To Kill a Mockingbird', '1988', '1988-01-01', 140, 288000, 291000, 128, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '048', 'http://images.amazon.com/images/P/0446310786.01.LZZZZZZZ.jpg'),
('49', 'Seabiscuit: An American Legend', '2002', '2002-01-01', 355, 143000, 146000, 190, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '049', 'http://images.amazon.com/images/P/0449005615.01.LZZZZZZZ.jpg'),
('5', 'Doraemon', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x417661696c61626c65, 0, NULL, '001', 'img/Books_Images/Doraemon.jpeg'),
('50', 'Pigs in Heaven', '1993', '1993-01-01', 119, 199000, 202000, 274, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '050', 'http://images.amazon.com/images/P/0060168013.01.LZZZZZZZ.jpg'),
('51', "Miss Zukas and the Raven's Dance", '1996', '1996-01-01', 492, 448000, 451000, 131, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '051', 'http://images.amazon.com/images/P/038078243X.01.LZZZZZZZ.jpg'),
('52', 'Pride and Prejudice', '1983', '1983-01-01', 256, 298000, 301000, 285, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '052', 'http://images.amazon.com/images/P/055321215X.01.LZZZZZZZ.jpg'),
('53', 'The Therapeutic Touch: How to Use Your Hands ', '1979', '1979-01-01', 112, 323000, 326000, 256, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '053', 'http://images.amazon.com/images/P/067176537X.01.LZZZZZZZ.jpg'),
('54', 'Downtown', '1995', '1995-01-01', 325, 385000, 388000, 288, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '054', 'http://images.amazon.com/images/P/0061099686.01.LZZZZZZZ.jpg'),
('55', 'Icebound', '2000', '2000-01-01', 314, 44000, 47000, 128, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '055', 'http://images.amazon.com/images/P/0553582909.01.LZZZZZZZ.jpg'),
('56', "I'll Be Seeing You", '1994', '1994-01-01', 327, 52000, 55000, 181, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '056', 'http://images.amazon.com/images/P/0671888587.01.LZZZZZZZ.jpg'),
('57', 'From the Corner of His Eye', '2001', '2001-01-01', 433, 358000, 361000, 252, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '057', 'http://images.amazon.com/images/P/0553582747.01.LZZZZZZZ.jpg'),
('58', 'Isle of Dogs', '2002', '2002-01-01', 436, 166000, 169000, 273, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '058', 'http://images.amazon.com/images/P/0425182908.01.LZZZZZZZ.jpg'),
('59', 'Purity in Death', '2002', '2002-01-01', 211, 57000, 60000, 250, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '059', 'http://images.amazon.com/images/P/042518630X.01.LZZZZZZZ.jpg'),
('6', 'Giải tích 2', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, 0, NULL, '001', 'img/Books_Images/GiaiTich2.jpeg'),
('60', 'This Year It Will Be Different: And Other Sto', '1997', '1997-01-01', 413, 88000, 91000, 103, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '060', 'http://images.amazon.com/images/P/0440223571.01.LZZZZZZZ.jpg'),
('61', 'Proxies', '1999', '1999-01-01', 206, 239000, 242000, 256, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '061', 'http://images.amazon.com/images/P/0812523873.01.LZZZZZZZ.jpg'),
('62', "Left Behind: A Novel of the Earth's Last Days", '2000', '2000-01-01', 226, 293000, 296000, 159, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '062', 'http://images.amazon.com/images/P/0842342702.01.LZZZZZZZ.jpg'),
('63', 'The Street Lawyer', '1999', '1999-01-01', 101, 439000, 442000, 124, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '063', 'http://images.amazon.com/images/P/0440225701.01.LZZZZZZZ.jpg'),
('64', 'Love, Medicine and Miracles', '1988', '1988-01-01', 115, 299000, 302000, 122, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '064', 'http://images.amazon.com/images/P/0060914068.01.LZZZZZZZ.jpg'),
('65', "All the King's Men", '1982', '1982-01-01', 269, 361000, 364000, 266, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '065', 'http://images.amazon.com/images/P/0156047624.01.LZZZZZZZ.jpg'),
('66', 'Pacific Northwest', '1985', '1985-01-01', 365, 213000, 216000, 254, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '066', 'http://images.amazon.com/images/P/0245542957.01.LZZZZZZZ.jpg'),
('67', 'A Soldier of the Great War', '1992', '1992-01-01', 424, 322000, 325000, 146, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '067', 'http://images.amazon.com/images/P/0380715899.01.LZZZZZZZ.jpg'),
('68', 'Getting Well Again', '1992', '1992-01-01', 401, 361000, 364000, 263, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '068', 'http://images.amazon.com/images/P/0553280333.01.LZZZZZZZ.jpg'),
('69', 'Northwest Wines and Wineries', '1993', '1993-01-01', 323, 52000, 55000, 143, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '069', 'http://images.amazon.com/images/P/0961769947.01.LZZZZZZZ.jpg'),
('7', 'Giết Con Chim Nhại', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, 0, NULL, '001', 'img/Books_Images/GietConChimNhai.png'),
('70', 'An Atmosphere of Eternity: Stories of India', '2002', '2002-01-01', 198, 25000, 28000, 160, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '070', 'http://images.amazon.com/images/P/0964778319.01.LZZZZZZZ.jpg'),
('71', 'LONESOME DOVE', '1986', '1986-01-01', 309, 43000, 46000, 254, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '071', 'http://images.amazon.com/images/P/0671623249.01.LZZZZZZZ.jpg'),
('72', 'Shabanu: Daughter of the Wind (Border Trilogy', '1991', '1991-01-01', 381, 427000, 430000, 109, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '072', 'http://images.amazon.com/images/P/0679810307.01.LZZZZZZZ.jpg'),
('73', 'Haveli (Laurel Leaf Books)', '1995', '1995-01-01', 301, 374000, 377000, 159, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '073', 'http://images.amazon.com/images/P/0679865691.01.LZZZZZZZ.jpg'),
('74', 'Lieux dits', '2002', '2002-01-01', 109, 406000, 409000, 284, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '074', 'http://images.amazon.com/images/P/2070423204.01.LZZZZZZZ.jpg'),
('75', 'The Dragons of Eden: Speculations on the Evol', '1978', '1978-01-01', 379, 185000, 188000, 120, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '075', 'http://images.amazon.com/images/P/0345260317.01.LZZZZZZZ.jpg'),
('76', 'The yawning heights', '1980', '1980-01-01', 377, 382000, 385000, 173, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '076', 'http://images.amazon.com/images/P/0394743741.01.LZZZZZZZ.jpg'),
('77', 'Breathing Lessons', '1994', '1994-01-01', 197, 184000, 187000, 211, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '077', 'http://images.amazon.com/images/P/042511774X.01.LZZZZZZZ.jpg'),
('78', 'The Joy Luck Club', '1994', '1994-01-01', 390, 447000, 450000, 107, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '078', 'http://images.amazon.com/images/P/0804106304.01.LZZZZZZZ.jpg'),
('79', 'Heart of Darkness (Wordsworth Collection)', '1998', '1998-01-01', 102, 36000, 39000, 260, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '079', 'http://images.amazon.com/images/P/1853262404.01.LZZZZZZZ.jpg'),
('8', 'Mắt Biếc', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, 0, NULL, '001', 'img/Books_Images/MatBiec.jpeg'),
('80', 'The Angel Is Near', '2000', '2000-01-01', 230, 431000, 434000, 211, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '080', 'http://images.amazon.com/images/P/0312970242.01.LZZZZZZZ.jpg'),
('81', "Tess of the D'Urbervilles (Wordsworth Classic", '1997', '1997-01-01', 408, 365000, 368000, 150, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '081', 'http://images.amazon.com/images/P/1853260053.01.LZZZZZZZ.jpg'),
('82', 'The Adventures of Drew and Ellie: The Magical', '2003', '2003-01-01', 198, 95000, 98000, 297, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '082', 'http://images.amazon.com/images/P/1414035004.01.LZZZZZZZ.jpg'),
('83', 'The Accidental Virgin', '2003', '2003-01-01', 328, 365000, 368000, 219, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '083', 'http://images.amazon.com/images/P/0060938412.01.LZZZZZZZ.jpg'),
('84', 'The Tao of Pooh', '1983', '1983-01-01', 125, 82000, 85000, 132, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '084', 'http://images.amazon.com/images/P/0140067477.01.LZZZZZZZ.jpg'),
('85', 'Seabiscuit', '2003', '2003-01-01', 336, 393000, 396000, 298, 0x417661696c61626c65, 0, 'This is a dummy description for testing purposes', '085', 'http://images.amazon.com/images/P/0345465083.01.LZZZZZZZ.jpg'),
('86', 'The Prince', '1952', '1952-01-01', 253, 66000, 69000, 113, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '086', 'http://images.amazon.com/images/P/0451625889.01.LZZZZZZZ.jpg'),
('87', "Life's Little Instruction Book (Life's Little", '1991', '1991-01-01', 262, 185000, 188000, 104, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '087', 'http://images.amazon.com/images/P/1558531025.01.LZZZZZZZ.jpg'),
('88', 'Starship Troopers', '1987', '1987-01-01', 429, 478000, 481000, 167, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '088', 'http://images.amazon.com/images/P/0441783589.01.LZZZZZZZ.jpg'),
('89', 'The Ruby in the Smoke (Sally Lockhart Trilogy', '1988', '1988-01-01', 422, 39000, 42000, 136, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '089', 'http://images.amazon.com/images/P/0394895894.01.LZZZZZZZ.jpg'),
('9', 'Thám Tử Lừng Danh Conan', '2017', '2020-01-01', 189, 30000, 41000, 125, 0x556e617661696c61626c65, 0, NULL, '001', 'img/Books_Images/conan.jpeg'),
('90', 'Black Beauty (Illustrated Classics)', '1995', '1995-01-01', 484, 103000, 106000, 165, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '090', 'http://images.amazon.com/images/P/1569871213.01.LZZZZZZZ.jpg'),
('91', "Anil's Ghost", '2000', '2000-01-01', 296, 335000, 338000, 158, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '091', 'http://images.amazon.com/images/P/0375410538.01.LZZZZZZZ.jpg'),
('92', 'Prescription for Terror', '1999', '1999-01-01', 339, 53000, 56000, 177, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '092', 'http://images.amazon.com/images/P/0966986105.01.LZZZZZZZ.jpg'),
('93', 'Modern Manners: An Etiquette Book for Rude Pe', '1990', '1990-01-01', 311, 476000, 479000, 223, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '093', 'http://images.amazon.com/images/P/087113375X.01.LZZZZZZZ.jpg'),
('94', 'Turning Thirty', '2000', '2000-01-01', 123, 493000, 496000, 207, 0x556e617661696c61626c65, 0, 'This is a dummy description for testing purposes', '094', 'http://images.amazon.com/images/P/0340767936.01.LZZZZZZZ.jpg'),
('95', 'Decipher', '2002', '2002-01-01', 112, 337000, 340000, 283, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '095', 'http://images.amazon.com/images/P/0743403843.01.LZZZZZZZ.jpg'),
('96', 'My First Cousin Once Removed: Money, Madness,', '1999', '1999-01-01', 323, 458000, 461000, 195, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '096', 'http://images.amazon.com/images/P/0060930365.01.LZZZZZZZ.jpg'),
('97', 'Standing Firm: A Vice-Presidential Memoir', '1994', '1994-01-01', 99, 159000, 162000, 250, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '097', 'http://images.amazon.com/images/P/0060177586.01.LZZZZZZZ.jpg'),
('98', 'Team Bush : Leadership Lessons from the Bush ', '2003', '2003-01-01', 447, 473000, 476000, 249, 0x417661696c61626c65, 1, 'This is a dummy description for testing purposes', '098', 'http://images.amazon.com/images/P/0071416331.01.LZZZZZZZ.jpg'),
('99', 'The Right Man : The Surprise Presidency of Ge', '2003', '2003-01-01', 227, 234000, 237000, 152, 0x556e617661696c61626c65, 1, 'This is a dummy description for testing purposes', '099', 'http://images.amazon.com/images/P/0375509038.01.LZZZZZZZ.jpg');

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

INSERT INTO `employee` (`ID`, `start_date`, `employee_status`) VALUES
('20010101', '2010-09-10', 0x46756c6c2d74696d65),
('20020202', '0000-00-00', 0x46756c6c2d74696d65),
('20030303', '0000-00-00', 0x46756c6c2d74696d65),
('20040404', '2010-12-02', 0x46756c6c2d74696d65),
('20050505', '0000-00-00', 0x46756c6c2d74696d65),
('20060606', '0000-00-00', 0x46756c6c2d74696d65),
('20070707', '0000-00-00', 0x46756c6c2d74696d65),
('20080808', '0000-00-00', 0x46756c6c2d74696d65),
('20090909', '0000-00-00', 0x46756c6c2d74696d65);

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

INSERT INTO `order` (`order_ID`, `order_date`, `order_info`) VALUES
('ONL1', '2023-04-07', 'Online, Đã duyệt, Không'),
('ONL10', '2023-07-08', 'Online, Đã duyệt, Không'),
('ONL100', '2023-06-27', 'Online, Đã duyệt, Không'),
('ONL11', '2023-05-09', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL12', '2023-02-08', 'Online, Đã duyệt, Không'),
('ONL13', '2023-06-23', 'Online, Đang chờ duyệt, Không'),
('ONL14', '2023-09-30', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL15', '2023-11-02', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL16', '2023-02-22', 'Online, Đang chờ duyệt, Không'),
('ONL17', '2023-08-09', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL18', '2023-01-24', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL19', '2023-11-26', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL2', '2023-10-04', 'Online, Đã duyệt, Không'),
('ONL20', '2023-08-16', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL21', '2023-12-30', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL22', '2023-03-24', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL23', '2023-08-30', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL24', '2023-09-28', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL25', '2023-12-07', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL26', '2023-08-29', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL27', '2023-02-17', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL28', '2023-05-18', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL29', '2023-09-10', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL3', '2023-11-10', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL30', '2023-06-05', 'Online, Đang chờ duyệt, Không'),
('ONL31', '2023-03-15', 'Online, Đã duyệt, Không'),
('ONL32', '2023-02-09', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL33', '2023-09-21', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL34', '2023-12-27', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL35', '2023-08-01', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL36', '2023-03-21', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL37', '2023-07-01', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL38', '2023-04-13', 'Online, Đang chờ duyệt, Không'),
('ONL39', '2023-08-26', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL4', '2023-11-04', 'Online, Đã duyệt, Không'),
('ONL40', '2023-01-22', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL41', '2023-12-04', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL42', '2023-08-29', 'Online, Đã duyệt, Không'),
('ONL43', '2023-12-17', 'Online, Đang chờ duyệt, Không'),
('ONL44', '2023-08-24', 'Online, Đã duyệt, Không'),
('ONL45', '2023-02-19', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL46', '2023-03-22', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL47', '2023-09-12', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL48', '2023-09-09', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL49', '2023-06-11', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL5', '2023-11-18', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL50', '2023-09-17', 'Online, Đã duyệt, Không'),
('ONL51', '2023-04-06', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL52', '2023-11-30', 'Online, Đang chờ duyệt, Không'),
('ONL53', '2023-10-13', 'Online, Đã duyệt, Không'),
('ONL54', '2023-04-21', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL55', '2023-06-23', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL56', '2023-12-19', 'Online, Đã duyệt, Không'),
('ONL57', '2023-07-19', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL58', '2023-04-07', 'Online, Đã duyệt, Không'),
('ONL59', '2023-07-10', 'Online, Đã duyệt, Không'),
('ONL6', '2023-11-05', 'Online, Đã duyệt, Không'),
('ONL60', '2023-04-25', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL61', '2023-02-25', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL62', '2023-08-25', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL63', '2023-07-15', 'Online, Đã duyệt, Không'),
('ONL64', '2023-06-18', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL65', '2023-12-05', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL66', '2023-06-12', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL67', '2023-06-21', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL68', '2023-08-22', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL69', '2023-10-15', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL7', '2023-02-04', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL70', '2023-09-08', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL71', '2023-10-08', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL72', '2023-05-13', 'Online, Đã duyệt, Không'),
('ONL73', '2023-11-10', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL74', '2023-08-22', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL75', '2023-03-25', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL76', '2023-09-08', 'Online, Đang chờ duyệt, Không'),
('ONL77', '2023-02-19', 'Online, Đang chờ duyệt, Không'),
('ONL78', '2023-06-02', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL79', '2023-08-03', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL8', '2023-04-17', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL80', '2023-05-05', 'Online, Đang chờ duyệt, Không'),
('ONL81', '2023-06-03', 'Online, Đang chờ duyệt, Không'),
('ONL82', '2023-09-21', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL83', '2023-12-21', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL84', '2023-02-15', 'Online, Đang chờ duyệt, Không'),
('ONL85', '2023-06-25', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL86', '2023-04-20', 'Online, Đang chờ duyệt, Không'),
('ONL87', '2023-12-25', 'Online, Đã duyệt, Gọi trước 30p'),
('ONL88', '2023-08-10', 'Online, Đang chờ duyệt, Không'),
('ONL89', '2023-10-04', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL9', '2023-07-28', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL90', '2023-09-12', 'Online, Đang chờ duyệt, Mua nợ 690k'),
('ONL91', '2023-04-15', 'Online, Đang chờ duyệt, Không'),
('ONL92', '2023-05-07', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL93', '2023-04-22', 'Online, Đang chờ duyệt, Không'),
('ONL94', '2023-11-27', 'Online, Đang chờ duyệt, Không'),
('ONL95', '2023-10-04', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL96', '2023-06-20', 'Online, Đang chờ duyệt, Gọi trước 30p'),
('ONL97', '2023-05-20', 'Online, Đã duyệt, Không'),
('ONL98', '2023-05-12', 'Online, Đã duyệt, Mua nợ 690k'),
('ONL99', '2023-09-20', 'Online, Đã duyệt, Không'),
('PCH1', '2023-10-30', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH10', '2023-06-25', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH100', '2023-11-09', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH11', '2023-12-15', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH12', '2023-10-19', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH13', '2023-02-03', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH14', '2023-08-22', 'Đơn nhập hàng, , Không'),
('PCH15', '2023-01-27', 'Đơn nhập hàng, , Không'),
('PCH16', '2023-03-07', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH17', '2023-09-11', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH18', '2023-04-05', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH19', '2023-10-26', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH2', '2023-12-30', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH20', '2023-03-05', 'Đơn nhập hàng, , Không'),
('PCH21', '2023-03-17', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH22', '2023-03-30', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH23', '2023-01-08', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH24', '2023-01-27', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH25', '2023-03-15', 'Đơn nhập hàng, , Không'),
('PCH26', '2023-03-29', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH27', '2023-05-07', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH28', '2023-08-22', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH29', '2023-02-09', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH3', '2023-09-17', 'Đơn nhập hàng, , Không'),
('PCH30', '2023-06-08', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH31', '2023-10-15', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH32', '2023-10-27', 'Đơn nhập hàng, , Không'),
('PCH33', '2023-02-03', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH34', '2023-02-20', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH35', '2023-09-27', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH36', '2023-03-01', 'Đơn nhập hàng, , Không'),
('PCH37', '2023-07-03', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH38', '2023-03-08', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH39', '2023-01-22', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH4', '2023-06-23', 'Đơn nhập hàng, , Không'),
('PCH40', '2023-11-13', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH41', '2023-10-05', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH42', '2023-01-18', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH43', '2023-01-14', 'Đơn nhập hàng, , Không'),
('PCH44', '2023-02-09', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH45', '2023-01-01', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH46', '2023-08-20', 'Đơn nhập hàng, , Không'),
('PCH47', '2023-04-24', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH48', '2023-07-08', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH49', '2023-05-11', 'Đơn nhập hàng, , Không'),
('PCH5', '2023-05-12', 'Đơn nhập hàng, , Không'),
('PCH50', '2023-02-03', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH51', '2023-09-11', 'Đơn nhập hàng, , Không'),
('PCH52', '2023-04-04', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH53', '2023-07-15', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH54', '2023-06-19', 'Đơn nhập hàng, , Không'),
('PCH55', '2023-10-30', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH56', '2023-09-01', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH57', '2023-10-15', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH58', '2023-07-14', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH59', '2023-10-23', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH6', '2023-09-29', 'Đơn nhập hàng, , Không'),
('PCH60', '2023-07-13', 'Đơn nhập hàng, , Không'),
('PCH61', '2023-02-19', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH62', '2023-09-05', 'Đơn nhập hàng, , Không'),
('PCH63', '2023-09-16', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH64', '2023-10-11', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH65', '2023-09-16', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH66', '2023-02-28', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH67', '2023-07-30', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH68', '2023-07-13', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH69', '2023-06-27', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH7', '2023-11-24', 'Đơn nhập hàng, , Không'),
('PCH70', '2023-02-11', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH71', '2023-08-26', 'Đơn nhập hàng, , Không'),
('PCH72', '2023-09-16', 'Đơn nhập hàng, , Không'),
('PCH73', '2023-04-20', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH74', '2023-02-11', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH75', '2023-08-16', 'Đơn nhập hàng, , Không'),
('PCH76', '2023-02-07', 'Đơn nhập hàng, , Không'),
('PCH77', '2023-02-06', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH78', '2023-02-19', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH79', '2023-10-24', 'Đơn nhập hàng, , Không'),
('PCH8', '2023-03-17', 'Đơn nhập hàng, , Không'),
('PCH80', '2023-07-02', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH81', '2023-09-17', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH82', '2023-05-11', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH83', '2023-03-09', 'Đơn nhập hàng, , Không'),
('PCH84', '2023-12-23', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH85', '2023-01-07', 'Đơn nhập hàng, , Không'),
('PCH86', '2023-04-06', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH87', '2023-09-14', 'Đơn nhập hàng, , Không'),
('PCH88', '2023-02-18', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH89', '2023-03-10', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH9', '2023-02-07', 'Đơn nhập hàng, , Mua nợ 690k'),
('PCH90', '2023-08-20', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH91', '2023-06-30', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH92', '2023-07-05', 'Đơn nhập hàng, , Không'),
('PCH93', '2023-01-18', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH94', '2023-05-28', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH95', '2023-06-12', 'Đơn nhập hàng, , Không'),
('PCH96', '2023-09-06', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH97', '2023-01-19', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH98', '2023-07-15', 'Đơn nhập hàng, , Gọi trước 30p'),
('PCH99', '2023-11-03', 'Đơn nhập hàng, , Gọi trước 30p'),
('STO1', '2023-06-30', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO10', '2023-01-10', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO100', '2023-06-12', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO11', '2023-08-25', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO12', '2023-04-16', 'Mua tại store, Đã duyệt, Không'),
('STO13', '2023-04-16', 'Mua tại store, Đã duyệt, Không'),
('STO14', '2023-08-13', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO15', '2023-03-15', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO16', '2023-10-23', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO17', '2023-10-17', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO18', '2023-11-25', 'Mua tại store, Đã duyệt, Không'),
('STO19', '2023-03-24', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO2', '2023-01-03', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO20', '2023-10-02', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO21', '2023-04-14', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO22', '2023-04-01', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO23', '2023-04-03', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO24', '2023-07-18', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO25', '2023-12-19', 'Mua tại store, Đã duyệt, Không'),
('STO26', '2023-12-05', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO27', '2023-04-13', 'Mua tại store, Đã duyệt, Không'),
('STO28', '2023-04-11', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO29', '2023-03-07', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO3', '2023-08-28', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO30', '2023-07-08', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO31', '2023-02-19', 'Mua tại store, Đã duyệt, Không'),
('STO32', '2023-06-04', 'Mua tại store, Đã duyệt, Không'),
('STO33', '2023-09-05', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO34', '2023-07-25', 'Mua tại store, Đã duyệt, Không'),
('STO35', '2023-12-28', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO36', '2023-11-25', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO37', '2023-08-13', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO38', '2023-05-07', 'Mua tại store, Đã duyệt, Không'),
('STO39', '2023-04-05', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO4', '2023-02-21', 'Mua tại store, Đã duyệt, Không'),
('STO40', '2023-03-26', 'Mua tại store, Đã duyệt, Không'),
('STO41', '2023-04-28', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO42', '2023-04-18', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO43', '2023-10-13', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO44', '2023-10-23', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO45', '2023-01-11', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO46', '2023-10-20', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO47', '2023-06-04', 'Mua tại store, Đã duyệt, Không'),
('STO48', '2023-02-08', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO49', '2023-12-26', 'Mua tại store, Đã duyệt, Không'),
('STO5', '2023-05-06', 'Mua tại store, Đã duyệt, Không'),
('STO50', '2023-04-28', 'Mua tại store, Đã duyệt, Không'),
('STO51', '2023-08-29', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO52', '2023-05-17', 'Mua tại store, Đã duyệt, Không'),
('STO53', '2023-02-08', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO54', '2023-04-22', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO55', '2023-04-07', 'Mua tại store, Đã duyệt, Không'),
('STO56', '2023-10-07', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO57', '2023-09-16', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO58', '2023-08-17', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO59', '2023-11-14', 'Mua tại store, Đã duyệt, Không'),
('STO6', '2023-12-20', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO60', '2023-01-18', 'Mua tại store, Đã duyệt, Không'),
('STO61', '2023-03-11', 'Mua tại store, Đã duyệt, Không'),
('STO62', '2023-03-09', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO63', '2023-04-02', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO64', '2023-01-28', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO65', '2023-03-29', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO66', '2023-02-25', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO67', '2023-11-16', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO68', '2023-05-15', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO69', '2023-01-03', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO7', '2023-05-30', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO70', '2023-07-01', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO71', '2023-03-20', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO72', '2023-02-25', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO73', '2023-07-02', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO74', '2023-05-24', 'Mua tại store, Đã duyệt, Không'),
('STO75', '2023-07-03', 'Mua tại store, Đã duyệt, Không'),
('STO76', '2023-08-23', 'Mua tại store, Đã duyệt, Không'),
('STO77', '2023-03-05', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO78', '2023-04-20', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO79', '2023-12-17', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO8', '2023-04-16', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO80', '2023-01-20', 'Mua tại store, Đã duyệt, Không'),
('STO81', '2023-11-18', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO82', '2023-09-24', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO83', '2023-12-08', 'Mua tại store, Đã duyệt, Không'),
('STO84', '2023-12-08', 'Mua tại store, Đã duyệt, Không'),
('STO85', '2023-08-08', 'Mua tại store, Đã duyệt, Không'),
('STO86', '2023-01-26', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO87', '2023-04-09', 'Mua tại store, Đã duyệt, Không'),
('STO88', '2023-05-07', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO89', '2023-08-01', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO9', '2023-08-08', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO90', '2023-10-21', 'Mua tại store, Đã duyệt, Không'),
('STO91', '2023-02-21', 'Mua tại store, Đã duyệt, Không'),
('STO92', '2023-06-24', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO93', '2023-11-12', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO94', '2023-04-18', 'Mua tại store, Đã duyệt, Không'),
('STO95', '2023-09-06', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO96', '2023-01-02', 'Mua tại store, Đã duyệt, Gọi trước 30p'),
('STO97', '2023-09-04', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO98', '2023-10-09', 'Mua tại store, Đã duyệt, Mua nợ 690k'),
('STO99', '2023-10-24', 'Mua tại store, Đã duyệt, Không');

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
('001', 'NXB Giáo dục Việt Nam'),
('002', 'HarperPerennial'),
('003', 'Farrar Straus Giroux'),
('004', 'W. W. Norton &amp, Company'),
('005', 'Putnam Pub Group'),
('006', 'Berkley Publishing Group'),
('007', 'Audioworks'),
('008', 'Random House'),
('009', 'Scribner'),
('010', 'Emblem Editions'),
('011', 'Citadel Press'),
('012', 'House of Anansi Press'),
('013', 'Mira Books'),
('014', 'Health Communications'),
('015', 'Brilliance Audio - Trade'),
('016', 'Kensington Publishing Corp.'),
('017', 'River City Pub'),
('018', 'Dell'),
('019', 'Plume'),
('020', 'Three Rivers Press'),
('021', 'Ryland Peters &amp, Small Ltd'),
('022', 'Cypress House'),
('023', 'HarperEntertainment'),
('024', 'Scholastic'),
('025', 'Aladdin'),
('026', 'Too Far'),
('027', 'Ballantine Books'),
('028', 'Ballantine Books'),
('029', 'Scribner'),
('030', 'Random House Trade Paperbacks'),
('031', 'Berkley Publishing Group'),
('032', 'L�?¼bbe'),
('033', 'Goldmann'),
('034', 'Goldmann'),
('035', 'Goldmann'),
('036', 'Alfred A. Knopf'),
('037', 'Little Brown &amp, Company'),
('038', 'Ballantine Books'),
('039', 'Harpercollins'),
('040', 'Avon'),
('041', 'Bantam'),
('042', 'Fireside'),
('043', 'HarperTorch'),
('044', 'Bantam Books'),
('045', 'Pocket'),
('046', 'Bantam Books'),
('047', 'Berkley Publishing Group'),
('048', 'Berkley Publishing Group'),
('049', 'Dell'),
('050', 'Tor Books'),
('051', 'Tyndale House Publishers'),
('052', 'Dell'),
('053', 'HarperCollins Publishers'),
('054', 'Harvest Books'),
('055', 'Chambers Harrap Publishers Ltd'),
('056', 'Avon Books'),
('057', 'Bantam'),
('058', 'Speed Graphics'),
('059', 'Sunflower Press'),
('060', 'Pocket'),
('061', 'Laurel Leaf'),
('062', 'Laurel Leaf'),
('063', 'Gallimard'),
('064', 'Ballantine Books'),
('065', 'Random House'),
('066', 'Berkley Publishing Group'),
('067', 'Prentice Hall (K-12)'),
('068', 'NTC/Contemporary Publishing Company'),
('069', "St. Martin's Press"),
('070', 'NTC/Contemporary Publishing Company'),
('071', '1stBooks Library'),
('072', 'Avon Trade'),
('073', 'Penguin Books'),
('074', 'Ballantine Books'),
('075', 'Signet Book'),
('076', 'Thomas Nelson'),
('077', 'Ace Books'),
('078', 'Laurel Leaf'),
('079', 'Landoll'),
('080', 'Knopf'),
('081', 'Andrew Scott Publishers'),
('082', 'Atlantic Monthly Press'),
('083', 'Hodder &amp, Stoughton General Division'),
('084', 'Simon &amp, Schuster (Trade Division)'),
('085', 'Perennial'),
('086', 'Harpercollins'),
('087', 'McGraw-Hill'),
('088', 'Random House'),
('089', 'Bantam Doubleday Dell'),
('090', 'Little, Brown'),
('091', 'Minotauro'),
('092', 'Minotauro'),
('093', 'Distribooks'),
('094', 'Random House'),
('095', 'Pocket'),
('096', "St. Martin's Press"),
('097', "St. Martin's Press"),
('098', 'Back Bay Books'),
('099', 'Back Bay Books'),
('100', 'Doubleday Books'),
('101', 'Warner Books'),
('102', 'Signet Book'),
('103', 'Bantam'),
('104', 'Fireside'),
('105', 'Vintage'),
('106', 'Fireside'),
('107', 'Hyperion'),
('108', 'Tusquets'),
('109', 'Star Trek'),
('110', 'Pocket'),
('111', 'Dell');

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

INSERT INTO `purchase_include` (`purchase_ID`, `book_ID`, `purchase_quantity`) VALUES
('PCH100', '41', 189),
('PCH11', '106', 66),
('PCH11', '92', 122),
('PCH11', '95', 112),
('PCH13', '35', 156),
('PCH14', '102', 143),
('PCH14', '110', 180),
('PCH14', '14', 155),
('PCH14', '37', 140),
('PCH15', '25', 185),
('PCH16', '59', 193),
('PCH17', '60', 62),
('PCH18', '53', 71),
('PCH19', '18', 160),
('PCH20', '107', 137),
('PCH21', '97', 176),
('PCH22', '75', 164),
('PCH23', '101', 140),
('PCH23', '73', 171),
('PCH25', '54', 112),
('PCH26', '106', 191),
('PCH26', '28', 147),
('PCH28', '66', 120),
('PCH28', '88', 182),
('PCH28', '98', 182),
('PCH29', '28', 135),
('PCH31', '56', 180),
('PCH32', '3', 129),
('PCH33', '95', 56),
('PCH35', '77', 101),
('PCH37', '59', 162),
('PCH37', '6', 83),
('PCH39', '41', 171),
('PCH39', '78', 139),
('PCH4', '2', 193),
('PCH4', '62', 197),
('PCH41', '55', 77),
('PCH42', '12', 102),
('PCH44', '103', 180),
('PCH45', '59', 60),
('PCH47', '92', 165),
('PCH48', '106', 140),
('PCH5', '12', 107),
('PCH5', '70', 148),
('PCH5', '95', 110),
('PCH50', '101', 101),
('PCH50', '72', 58),
('PCH52', '106', 97),
('PCH52', '107', 82),
('PCH52', '17', 110),
('PCH52', '31', 96),
('PCH53', '26', 149),
('PCH54', '101', 99),
('PCH54', '67', 151),
('PCH55', '62', 154),
('PCH55', '71', 154),
('PCH56', '104', 79),
('PCH57', '14', 127),
('PCH57', '16', 185),
('PCH57', '20', 171),
('PCH58', '43', 148),
('PCH59', '13', 94),
('PCH59', '20', 51),
('PCH63', '104', 128),
('PCH64', '103', 94),
('PCH64', '41', 65),
('PCH64', '6', 152),
('PCH65', '63', 181),
('PCH65', '76', 156),
('PCH66', '6', 154),
('PCH66', '89', 112),
('PCH66', '99', 114),
('PCH67', '44', 93),
('PCH68', '59', 142),
('PCH68', '87', 146),
('PCH69', '3', 139),
('PCH7', '109', 90),
('PCH7', '3', 127),
('PCH7', '36', 90),
('PCH7', '7', 169),
('PCH70', '25', 114),
('PCH70', '98', 105),
('PCH71', '108', 98),
('PCH71', '33', 193),
('PCH76', '100', 182),
('PCH77', '36', 130),
('PCH81', '44', 78),
('PCH81', '52', 141),
('PCH81', '84', 74),
('PCH82', '28', 63),
('PCH87', '79', 109),
('PCH89', '25', 137),
('PCH89', '49', 185),
('PCH9', '107', 160),
('PCH91', '63', 97),
('PCH92', '41', 60),
('PCH93', '51', 189),
('PCH95', '59', 71),
('PCH96', '41', 162),
('PCH99', '38', 52);

--
-- Triggers `purchase_include`
--
DELIMITER $$
CREATE TRIGGER `update_remaining_quantity_purchase` AFTER INSERT ON `purchase_include` FOR EACH ROW BEGIN
    DECLARE remaining_qty INT;

    -- Get the current remaining_quantity for the corresponding book_ID
    SELECT remaining_quantity INTO remaining_qty
    FROM book
    WHERE book_ID = NEW.book_ID;

    -- Update the remaining_quantity in the book table
    UPDATE book
    SET remaining_quantity = remaining_qty + NEW.purchase_quantity
    WHERE book_ID = NEW.book_ID;
END
$$
DELIMITER ;

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

INSERT INTO `purchase_order` (`purchase_ID`, `employee_ID`) VALUES
('PCH1', ''),
('PCH10', ''),
('PCH100', ''),
('PCH11', ''),
('PCH12', ''),
('PCH13', ''),
('PCH14', ''),
('PCH15', ''),
('PCH16', ''),
('PCH17', ''),
('PCH18', ''),
('PCH19', ''),
('PCH2', ''),
('PCH20', ''),
('PCH21', ''),
('PCH22', ''),
('PCH23', ''),
('PCH24', ''),
('PCH25', ''),
('PCH26', ''),
('PCH27', ''),
('PCH28', ''),
('PCH29', ''),
('PCH3', ''),
('PCH30', ''),
('PCH31', ''),
('PCH32', ''),
('PCH33', ''),
('PCH34', ''),
('PCH35', ''),
('PCH36', ''),
('PCH37', ''),
('PCH38', ''),
('PCH39', ''),
('PCH4', ''),
('PCH40', ''),
('PCH41', ''),
('PCH42', ''),
('PCH43', ''),
('PCH44', ''),
('PCH45', ''),
('PCH46', ''),
('PCH47', ''),
('PCH48', ''),
('PCH49', ''),
('PCH5', ''),
('PCH50', ''),
('PCH51', ''),
('PCH52', ''),
('PCH53', ''),
('PCH54', ''),
('PCH55', ''),
('PCH56', ''),
('PCH57', ''),
('PCH58', ''),
('PCH59', ''),
('PCH6', ''),
('PCH60', ''),
('PCH61', ''),
('PCH62', ''),
('PCH63', ''),
('PCH64', ''),
('PCH65', ''),
('PCH66', ''),
('PCH67', ''),
('PCH68', ''),
('PCH69', ''),
('PCH7', ''),
('PCH70', ''),
('PCH71', ''),
('PCH72', ''),
('PCH73', ''),
('PCH74', ''),
('PCH75', ''),
('PCH76', ''),
('PCH77', ''),
('PCH78', ''),
('PCH79', ''),
('PCH8', ''),
('PCH80', ''),
('PCH81', ''),
('PCH82', ''),
('PCH83', ''),
('PCH84', ''),
('PCH85', ''),
('PCH86', ''),
('PCH87', ''),
('PCH88', ''),
('PCH89', ''),
('PCH9', ''),
('PCH90', ''),
('PCH91', ''),
('PCH92', ''),
('PCH93', ''),
('PCH94', ''),
('PCH95', ''),
('PCH96', ''),
('PCH97', ''),
('PCH98', ''),
('PCH99', '');

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

INSERT INTO `sale_include` (`sale_ID`, `book_ID`, `sale_quantity`) VALUES
('ONL13', '60', 56),
('ONL13', '99', 73),
('ONL17', '97', 68),
('ONL18', '44', 104),
('ONL19', '66', 168),
('ONL2', '30', 138),
('ONL23', '42', 198),
('ONL24', '14', 71),
('ONL24', '90', 135),
('ONL3', '106', 80),
('ONL31', '15', 152),
('ONL33', '39', 165),
('ONL34', '56', 86),
('ONL36', '21', 158),
('ONL4', '61', 185),
('ONL41', '52', 193),
('ONL42', '97', 127),
('ONL43', '56', 133),
('ONL45', '103', 102),
('ONL49', '92', 166),
('ONL50', '5', 126),
('ONL51', '92', 76),
('ONL59', '109', 157),
('ONL6', '90', 148),
('ONL63', '106', 84),
('ONL64', '6', 129),
('ONL65', '95', 175),
('ONL66', '8', 74),
('ONL68', '25', 57),
('ONL69', '20', 193),
('ONL73', '63', 54),
('ONL74', '19', 119),
('ONL74', '4', 52),
('ONL78', '72', 187),
('ONL82', '76', 108),
('ONL83', '76', 92),
('ONL9', '8', 97),
('ONL9', '89', 141),
('ONL91', '39', 74),
('ONL91', '45', 72),
('ONL93', '62', 177),
('ONL95', '87', 82),
('ONL99', '102', 51),
('STO1', '99', 105),
('STO100', '97', 89),
('STO11', '31', 197),
('STO11', '89', 95),
('STO12', '2', 71),
('STO14', '107', 117),
('STO21', '101', 125),
('STO21', '2', 142),
('STO23', '79', 107),
('STO27', '93', 178),
('STO31', '109', 146),
('STO33', '68', 128),
('STO34', '48', 117),
('STO37', '104', 183),
('STO39', '35', 192),
('STO4', '109', 170),
('STO42', '4', 156),
('STO43', '99', 176),
('STO44', '92', 200),
('STO45', '58', 80),
('STO48', '59', 180),
('STO49', '51', 133),
('STO49', '52', 86),
('STO51', '60', 81),
('STO52', '60', 177),
('STO54', '65', 58),
('STO54', '71', 64),
('STO55', '11', 98),
('STO56', '29', 154),
('STO56', '65', 190),
('STO63', '106', 122),
('STO64', '48', 66),
('STO65', '21', 193),
('STO68', '104', 66),
('STO72', '14', 136),
('STO73', '65', 81),
('STO73', '73', 77),
('STO78', '14', 184),
('STO78', '15', 85),
('STO79', '34', 137),
('STO79', '72', 195),
('STO8', '16', 62),
('STO81', '78', 78),
('STO83', '71', 80),
('STO83', '88', 114),
('STO83', '94', 63),
('STO84', '21', 143),
('STO85', '53', 139),
('STO86', '85', 145),
('STO87', '76', 127),
('STO87', '96', 142),
('STO9', '69', 167),
('STO9', '71', 123),
('STO92', '94', 158),
('STO93', '47', 83),
('STO98', '75', 54);

--
-- Triggers `sale_include`
--
DELIMITER $$
CREATE TRIGGER `update_remaining_quantity` AFTER INSERT ON `sale_include` FOR EACH ROW BEGIN
    DECLARE remaining_qty INT;

    -- Get the current remaining_quantity for the corresponding book_ID
    SELECT remaining_quantity INTO remaining_qty
    FROM book
    WHERE book_ID = NEW.book_ID;

    -- Update the remaining_quantity in the book table
    UPDATE book
    SET remaining_quantity = remaining_qty - NEW.sale_quantity
    WHERE book_ID = NEW.book_ID;
END
$$
DELIMITER ;

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

INSERT INTO `sale_order` (`sale_ID`, `delivery_date`, `delivery_address`, `payment_status`, `member_ID`, `employee_ID`) VALUES
('ONL100', '2023-09-21', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20010101'),
('ONL11', '2023-02-04', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20020202'),
('ONL13', '2023-05-24', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20030303'),
('ONL14', '2023-10-27', 'Dĩ An, Bình Dương', 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20030303'),
('ONL16', '2023-07-07', 'Dĩ An, Bình Dương', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20030303'),
('ONL18', '2023-10-28', 'KTX Khu A', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20040404'),
('ONL2', '2023-09-26', 'Moscow', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20060606'),
('ONL21', '2023-06-27', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20020202'),
('ONL22', '2023-01-27', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20010101'),
('ONL26', '2023-09-26', '268 Lý Thường Kiệt', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20050505'),
('ONL27', '2023-01-17', 'Dĩ An, Bình Dương', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20020202'),
('ONL29', '2023-11-23', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20010101'),
('ONL30', '2023-06-18', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20010101'),
('ONL31', '2023-04-25', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20010101'),
('ONL33', '2023-12-25', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20040404'),
('ONL34', '2023-10-27', 'Dĩ An, Bình Dương', 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20080808'),
('ONL35', '2023-04-09', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20030303'),
('ONL36', '2023-07-28', '268 Lý Thường Kiệt', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20030303'),
('ONL37', '2023-02-01', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20020202'),
('ONL39', '2023-09-18', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20060606'),
('ONL42', '2023-09-22', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20070707'),
('ONL43', '2023-10-11', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20050505'),
('ONL44', '2023-12-04', 'Moscow', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20080808'),
('ONL46', '2023-03-01', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20020202'),
('ONL49', '2023-08-28', '268 Lý Thường Kiệt', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20020202'),
('ONL50', '2023-11-02', 'Dĩ An, Bình Dương', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20020202'),
('ONL51', '2023-06-10', 'Moscow', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20040404'),
('ONL52', '2023-09-19', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20020202'),
('ONL55', '2023-05-16', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20070707'),
('ONL59', '2023-03-25', 'KTX Khu A', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20080808'),
('ONL61', '2023-05-17', 'Thiên đình', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20050505'),
('ONL69', '2023-01-14', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20010101'),
('ONL8', '2023-07-02', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20030303'),
('ONL81', '2023-09-05', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20040404'),
('ONL89', '2023-06-20', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20030303'),
('ONL92', '2023-02-18', 'Nhà trắng', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20050505'),
('ONL93', '2023-06-05', 'Paris', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('ONL94', '2023-06-28', '268 Lý Thường Kiệt', 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20040404'),
('ONL95', '2023-12-11', 'Moscow', 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20040404'),
('ONL96', '2023-12-05', 'KTX Khu A', 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20060606'),
('ONL99', '2023-08-26', '268 Lý Thường Kiệt', 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20040404'),
('STO10', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20080808'),
('STO100', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20050505'),
('STO14', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20060606'),
('STO15', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20020202'),
('STO16', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20050505'),
('STO17', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20060606'),
('STO20', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20060606'),
('STO24', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO25', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20070707'),
('STO26', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20020202'),
('STO3', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO30', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO34', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20050505'),
('STO35', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20060606'),
('STO37', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20050505'),
('STO38', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20030303'),
('STO39', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20040404'),
('STO4', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20060606'),
('STO40', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO48', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO5', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20030303'),
('STO53', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20020202'),
('STO55', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20020202'),
('STO56', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20060606'),
('STO57', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20080808'),
('STO58', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20010101'),
('STO60', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO61', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO63', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20030303'),
('STO69', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20020202'),
('STO7', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20050505'),
('STO70', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20050505'),
('STO72', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10030303', '20030303'),
('STO74', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20010101'),
('STO75', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20040404'),
('STO77', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20060606'),
('STO79', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20020202'),
('STO8', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20060606'),
('STO82', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20020202'),
('STO85', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10050505', '20080808'),
('STO89', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10010101', '20070707'),
('STO90', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10040404', '20080808'),
('STO93', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20070707'),
('STO95', NULL, NULL, 0xc490c3a3207468616e6820746fc3a16e, '10020202', '20010101');

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
-- Dumping data for table `written_by`
--

INSERT INTO `written_by` (`book_ID`, `author_ID`) VALUES
('0', '92'),
('1', '96'),
('10', '56'),
('100', '23'),
('101', '53'),
('102', '5'),
('103', '74'),
('104', '38'),
('105', '50'),
('106', '18'),
('107', '13'),
('108', '26'),
('109', '69'),
('11', '87'),
('110', '56'),
('111', '36'),
('12', '98'),
('13', '83'),
('14', '90'),
('15', '21'),
('16', '50'),
('17', '63'),
('18', '58'),
('19', '52'),
('2', '71'),
('20', '78'),
('21', '45'),
('22', '64'),
('23', '89'),
('24', '76'),
('25', '18'),
('26', '83'),
('27', '2'),
('28', '63'),
('29', '98'),
('3', '50'),
('30', '90'),
('31', '89'),
('32', '4'),
('33', '58'),
('34', '36'),
('35', '88'),
('36', '98'),
('37', '32'),
('38', '14'),
('39', '77'),
('4', '97'),
('40', '3'),
('41', '14'),
('42', '65'),
('43', '96'),
('44', '23'),
('45', '5'),
('46', '1'),
('47', '22'),
('48', '74'),
('49', '58'),
('5', '47'),
('50', '36'),
('51', '30'),
('52', '46'),
('53', '5'),
('54', '86'),
('55', '59'),
('56', '31'),
('57', '7'),
('58', '41'),
('59', '30'),
('6', '32'),
('60', '11'),
('61', '69'),
('62', '95'),
('63', '33'),
('64', '98'),
('65', '71'),
('66', '38'),
('67', '60'),
('68', '26'),
('69', '60'),
('7', '58'),
('70', '23'),
('71', '21'),
('72', '88'),
('73', '16'),
('74', '89'),
('75', '55'),
('76', '80'),
('77', '97'),
('78', '92'),
('79', '98'),
('8', '77'),
('80', '37'),
('81', '15'),
('82', '12'),
('83', '10'),
('84', '8'),
('85', '55'),
('86', '16'),
('87', '86'),
('88', '8'),
('89', '99'),
('9', '93'),
('90', '56'),
('91', '11'),
('92', '62'),
('93', '51'),
('94', '7'),
('95', '3'),
('96', '90'),
('97', '84'),
('98', '68'),
('99', '94');

--
-- Indexes for dumped tables
--
SET foreign_key_checks=0;
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
  ADD CONSTRAINT `FK_20` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`),
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`purchase_ID`) REFERENCES `order` (`order_ID`);

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
