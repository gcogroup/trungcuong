-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2020 at 10:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trungcuong`
--

-- --------------------------------------------------------

--
-- Table structure for table `catlg`
--

CREATE TABLE IF NOT EXISTS `catlg` (
  `id_catlg` bigint(20) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT 0,
  `thu_tu` bigint(20) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catlg`
--

INSERT INTO `catlg` (`id_catlg`, `name`, `parentid`, `thu_tu`, `active`) VALUES
(3, 'Khách hàng nói về chúng tôi', 0, 2, 1),
(2, 'Slide banner', 0, 1, 1),
(4, 'Video', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catpd`
--

CREATE TABLE IF NOT EXISTS `catpd` (
  `id_catpd` int(5) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT 0,
  `thu_tu` bigint(20) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catpd`
--

INSERT INTO `catpd` (`id_catpd`, `name`, `parentid`, `thu_tu`, `active`) VALUES
(1, 'Máy công cụ', 0, 1, 1),
(2, 'Máy thực phẩm', 0, 2, 1),
(11, 'Máy phay', 1, 1, 1),
(15, 'Máy tiện', 1, 2, 1),
(16, 'Máy ép kim loại', 1, 3, 1),
(17, 'Máy cắt kim loại', 1, 4, 1),
(18, 'Máy chấn', 1, 5, 1),
(19, 'Máy cưa kim loại', 1, 6, 1),
(20, 'Máy xả tôn', 1, 7, 1),
(21, 'Máy nắn cắt', 1, 8, 1),
(22, 'Máy sóc rung', 1, 9, 1),
(23, 'Máy uốn', 1, 10, 1),
(24, 'Máy hàn', 1, 11, 1),
(25, 'Máy dập', 1, 12, 1),
(26, 'Máy khoan', 1, 13, 1),
(27, 'Máy mài', 1, 14, 1),
(28, 'Máy cán răng', 1, 15, 1),
(29, 'Máy đột', 1, 16, 1),
(30, 'Pa lăng xích', 1, 17, 1),
(31, 'Pa lăng cáp', 1, 18, 1),
(32, 'Máy nén khí', 1, 19, 1),
(33, 'Đồ dùng, công cụ', 1, 20, 1),
(34, 'Các loại quạt', 1, 21, 1),
(35, 'Máy khác', 1, 22, 1),
(36, 'Máy thái thịt', 2, 1, 1),
(37, 'Máy xay sinh tố', 2, 2, 1),
(38, 'Máy trộn thực phẩm', 2, 3, 1),
(39, 'Máy xay thịt', 2, 4, 1),
(40, 'Máy cắt thịt', 2, 5, 1),
(41, 'Máy xay giò', 2, 6, 1),
(42, 'Máy khác', 2, 7, 1),
(45, 'Máy phay đứng', 11, 1, 1),
(46, 'Máy phay ngang', 11, 2, 1),
(47, 'Máy tiện cơ', 15, 1, 1),
(48, 'Máy tiện thủy lực', 15, 2, 1),
(49, 'Máy tiện senga', 15, 3, 1),
(50, 'Máy ép thủy lực', 16, 1, 1),
(51, 'Máy ép kim loại cơ', 16, 2, 1),
(52, 'Máy ép nhiệt', 16, 3, 1),
(53, 'Máy cắt thủy lực', 17, 1, 1),
(54, 'Máy cắt góc', 17, 2, 1),
(55, 'Máy cắt 5 chức năng', 17, 3, 1),
(56, 'Máy hàn Mic', 24, 1, 1),
(57, 'Máy hàn Tic', 24, 2, 1),
(58, 'Máy hàn bấm', 24, 3, 1),
(59, 'Máy hàn không dấu', 24, 4, 1),
(60, 'Máy khoan cần', 26, 1, 1),
(61, 'Máy khoan đứng', 26, 2, 1),
(62, 'Máy mài 2 đá', 27, 1, 1),
(63, 'Máy mài lô giáp', 27, 2, 1),
(64, 'Máy mài mặt phẳng', 27, 3, 1),
(65, 'Máy mài dụng cụ', 27, 4, 1),
(66, 'Máy đánh bóng', 27, 5, 1),
(67, 'Máy mài tròn', 27, 6, 1),
(68, 'Máy mài vô tâm', 27, 7, 1),
(69, 'Máy nén khí bình', 32, 1, 1),
(70, 'Máy nén khí cách âm', 32, 2, 1),
(71, 'Máy nén khí trục vít', 32, 3, 1),
(72, 'Mô tơ Nhật bãi', 35, 2, 1),
(73, 'Máy cắt cỏ', 35, 3, 1),
(74, 'Biến áp', 35, 4, 1),
(75, 'Xe nâng', 35, 1, 1),
(80, 'Máy rửa xe', 1, 0, 1),
(81, 'Máy khoan côn', 26, 0, 1),
(82, 'Máy khoan zen', 26, 0, 1),
(83, 'Máy khoan nhiều đầu', 26, 0, 1),
(84, 'Máy cắt tôn', 17, 0, 1),
(85, 'Các loại máy khác', 35, 5, 1),
(86, 'Máy khoan bàn', 26, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `xem` tinyint(4) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL,
  `ngay_dang` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `email`, `phone`, `noi_dung`, `xem`, `type`, `ngay_dang`) VALUES
(7, 'nguyễn văn duy', 'huyentrang87hd@gmail.com', '0963902393', 'undefined', 1, 1, 1556723519),
(8, 'nguyễn văn duy', 'huyentrang87hd@gmail.com', '0963902393', 'undefined', 1, 1, 1556723522),
(9, 'nguyễn văn duy', 'huyentrang87hd@gmail.com', '0963902393', 'undefined', 1, 1, 1556723535),
(10, 'nguyễn nhung', 'nhjm.162@gmail.com', '0943939036', 'undefined', 1, 1, 1556956894),
(11, 'Tung', 'Nguyenvantung061978@gmail.com', '0929837398', 'undefined', 1, 1, 1558665810),
(12, 'Đỗ Minh Thao', 'minhthao@z76.vn', '0818130517', 'undefined', 1, 1, 1562386001),
(13, 'Đỗ Minh Thao', 'minhthao@z76.vn', '0818130517', 'undefined', 1, 1, 1562386004),
(14, 'Đỗ Minh Thao', 'minhthao@z76.vn', '0818130517', 'undefined', 1, 1, 1562386006),
(15, 'ngo thang', 'thangngo@gmail.com', '0937703178', 'undefined', 1, 1, 1564180010),
(16, 'Yến', 'yenlauphan@gmail.com', '0985131148', 'undefined', 1, 1, 1565587010),
(17, 'Bùi Việt Hùng', 'viethung.bn1985@gmail.com', '0977752486', 'undefined', 1, 1, 1566638051),
(21, 'Khoa', 'Vinhthinh.vt@gmail.com', '0974003678', 'Cân máy mài vô tâm ', 0, 1, 1571281831),
(22, 'Hồ Thị Thu Sương', 'Nguyentrongvanviet@gmail.com', '0913959032', 'Cái khoan bàn kỉa bao nhiêu kí  bao nhiêu vậy em à ', 0, 1, 1571293121),
(23, 'Machung', 'hunghuongvietduc@gmail.com', '0975025997; 09134734', 'Tôi có nhu cầu mua máy mài NICCO 500x1000. bạn có thể cho xem ảnh máy và ảnh bên trong tủ điện được không. Xin cám ơn', 0, 1, 1573696145),
(24, 'Machung', 'hunghuongvietduc@gmail.com', '0975025997; 09134734', 'Tôi có nhu cầu mua máy mài NICCO 500x1000. bạn có thể cho xem ảnh máy và ảnh bên trong tủ điện được không. Xin cám ơn', 0, 1, 1573696305),
(25, 'Hoàng Huy Phú', 'phu@halinhiec.com', '0989286387', 'tôi muốn tìm mua máy cắt thép V<br>', 0, 1, 1573804276),
(26, 'Đổ huy cường ', 'Huyvietech@gmail.com', '0914039224', 'Bạn báo giá con máy dạp 16 tấn đã wa sử dụng đang đăng . Giao hàng tại đà nẵng', 0, 1, 1577895616),
(27, 'ngô Minh tâm', 'tamanh.ship@gmail.com', '0933040622', 'chúng tôi cần mua máy đọt chép hình 5 chức năng. cần báo giá và giới thiệu máy bên anh.', 0, 1, 1580543794),
(28, 'Hoàng Văn Hạ', 'hoanghals72@gmail.com', '0358082999', 'Tôi tìm mua 1 chiếc máy tiện mini để chế đồ (có lỗ trục chính khoảng 30mm, trọng lượng khoảng 50kg). Nếu có thì gửi hình qua zalo (số ĐT trên) và kèm theo giá nhé', 0, 1, 1584604494),
(29, 'hùng Nguyễn ', 'Cokhihuyhung2010@gmail.com ', '0904957078', 'Mình có bát côn máy taro kira ko', 0, 1, 1584667006),
(30, 'Ngọ', 'Thuydhhp123@gmail.com', '', 'Chào công ty,Tôi đanng cần tìm mua máy tiêu Howa860', 0, 1, 1586010843),
(31, 'minh', 'ye_jia_ming@yahoo.com', '0933990030', 'may" tien takasa gia nhieu', 0, 1, 1586177487),
(32, 'minh', 'ye_jia_ming@yahoo.com', '0933990030', 'may" tien takasa gia nhieu rut nong', 0, 1, 1586177496),
(33, 'Vũ Long', 'vulong@gmail.com', '0392833413', ' Ngã 3 Diễn Châu, Nghệ An', 0, 1, 1586770623),
(34, 'Phi hien quynh', 'phihienquynh1966@gmail.com', '0376784105', 'Tôi muốn mua máy dập nhỏ nhỏ để dập da bò khuôn bế . Xin được tư vấn . Xin cảm ơn', 0, 1, 1589652481),
(35, 'Hải', 'hai.nv1@stylestone.vn', '0935207789', 'Cho em hỏi bên anh có luynet cho máy tiện đường kính ~ 250 không ạ', 1, 1, 1590042420),
(36, 'Nguyễn Nguyên', 'nguyendpvn1972@gmail.com', '0903218112', 'Cần mua máy ta rô tự động loại nhỏ (M8) và máy đột dập nhỏ (5-10-15 tấn). Xin danh mục và giá', 0, 1, 1599734259),
(37, 'Nguyễn Nguyên', 'nguyendpvn1972@gmail.com', '0903218112', 'Cần mua máy ta rô tự động loại nhỏ (M8) và máy đột dập nhỏ (5-10-15 tấn). Xin danh mục và giá', 0, 1, 1599734261),
(38, 'Nguyễn Nguyên', 'nguyendpvn1972@gmail.com', '0903218112', 'Cần mua máy ta rô tự động loại nhỏ (M8) và máy đột dập nhỏ (5-10-15 tấn). Xin danh mục và giá', 0, 1, 1599734264),
(39, 'Nguyễn thị Tâm ', 'Nguyentamkt0311@gmail. Com', '0975304339', 'Cho mình hỏi giá của máy xay giò loại 10kg, 15kg,20kg với ạ', 0, 1, 1604888317),
(40, 'Dương thế thịnh', 'Thinh1952hp@mail.com', '0378476303', 'Tôi muốn đặt 1may xay gio đk 32 và 1mays siết 32  1 lò nướng thit 3 pa 30kg mẻ xin tư vấn', 0, 1, 1605225394);

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `value` bigint(20) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`value`) VALUES
(123341);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id_country`, `name`, `currency`, `code`) VALUES
(1, 'United States of America', 'USD', 'US'),
(2, 'Canada', 'CAD', 'CA'),
(3, 'Afghanistan', 'AFA', 'AF'),
(4, 'Albania', 'ALL', 'AL'),
(5, 'Algeria', 'DZD', 'DZ'),
(6, 'Andorra', 'EUR', 'AD'),
(7, 'Angola', 'AOA', 'AO'),
(8, 'Anguilla', 'XCD', 'AI'),
(10, 'Antigua and Barbuda', 'XCD', 'AG'),
(11, 'Argentina', 'ARS', 'AR'),
(12, 'Armenia', 'AMD', 'AM'),
(13, 'Aruba', 'AWG', 'AW'),
(14, 'Australia', 'AUD', 'AU'),
(15, 'Austria', 'EUR', 'AT'),
(16, 'Azerbaijan', 'AZM', 'AZ'),
(17, 'Bahamas', 'BSD', 'BS'),
(18, 'Bahrain', 'BHD', 'BH'),
(19, 'Bangladesh', 'BDT', 'BD'),
(20, 'Barbados', 'BBD', 'BB'),
(21, 'Belarus', 'BYR', 'BY'),
(22, 'Belgium', 'EUR', 'BE'),
(23, 'Belize', 'BZD', 'BZ'),
(24, 'Benin', 'XOF', 'BJ'),
(25, 'Bermuda', 'BMD', 'BM'),
(26, 'Bhutan', 'BTN', 'BT'),
(27, 'Bolivia', 'BOB', 'BO'),
(28, 'Bosnia-Herzegovina', 'BAM', 'BA'),
(29, 'Botswana', 'BWP', 'BW'),
(30, 'Brazil', 'BRL', 'BR'),
(31, 'Brunei Darussalam', 'BND', 'BN'),
(32, 'Bulgaria', 'BGL', 'BG'),
(33, 'Burkina Faso', 'XOF', 'BF'),
(34, 'Burundi', 'BIF', 'BI'),
(35, 'Cambodia', 'KHR', 'KH'),
(36, 'Cameroon', 'XAF', 'CM'),
(37, 'Cape Verde', 'CVE', 'CV'),
(38, 'Cayman Islands', 'KYD', 'KY'),
(39, 'Central African Republic', 'XAF', 'CF'),
(40, 'Chad', 'XAF', 'TD'),
(41, 'Chile', 'CHL', 'CL'),
(42, 'China', 'CNY', 'CN'),
(43, 'Colombia', 'COP', 'CO'),
(44, 'Comoros', 'KMF', 'KM'),
(45, 'Costa Rica', 'CRI', 'CR'),
(46, 'Croatia', 'HRK', 'HR'),
(47, 'Cuba', 'CUP', 'CU'),
(48, 'Cyprus', 'CYP', 'CY'),
(49, 'Czech Republic', 'CZK', 'CZ'),
(50, 'Denmark', 'DKK', 'DK'),
(51, 'Djibouti', 'DJF', 'DJ'),
(52, 'Dominica', 'XCD', 'DM'),
(53, 'Dominican Republic', 'DOP', 'DO'),
(54, 'East Timor', 'IDR', 'TP'),
(55, 'Ecuador', 'USD', 'EC'),
(56, 'Egypt', 'EGP', 'EG'),
(57, 'El Salvador', 'SVC', 'SV'),
(58, 'Equatorial Guinea', 'XAF', 'GQ'),
(59, 'Estonia', 'EEK', 'EE'),
(60, 'Ethiopia', 'ETB', 'ET'),
(61, 'Falkland Islands', 'FKP', 'FK'),
(62, 'Faroe Islands', 'DKK', 'FO'),
(63, 'Fiji', 'FJD', 'FJ'),
(64, 'Finland', 'EUR', 'FI'),
(65, 'France', 'EUR', 'FR'),
(66, 'French Guiana', 'EUR', 'GF'),
(67, 'French Polynesia', 'XPF', 'PF'),
(68, 'Gabon', 'XAF', 'GA'),
(69, 'Gambia', 'GMD', 'GM'),
(70, 'Georgia, Republic of', 'GEL', 'GE'),
(71, 'Germany', 'EUR', 'DE'),
(72, 'Ghana', 'GHC', 'GH'),
(73, 'Gibraltar', 'GBP', 'GI'),
(74, 'Greece', 'EUR', 'GR'),
(75, 'Greenland', 'DKK', 'GL'),
(76, 'Grenada', 'XCD', 'GD'),
(77, 'Guadeloupe', 'EUR', 'GP'),
(78, 'Guam', 'USD', 'GU'),
(79, 'Guatemala', 'GTQ', 'GT'),
(80, 'Guinea', 'GNF', 'GN'),
(81, 'Guinea-Bissau', 'XOF', 'GW'),
(82, 'Guyana', 'GYD', 'GY'),
(83, 'Haiti', 'USD', 'HT'),
(84, 'Honduras', 'HNL', 'HN'),
(85, 'Hong Kong', 'HKD', 'HK'),
(86, 'Hungary', 'HUF', 'HU'),
(87, 'Iceland', 'ISK', 'IS'),
(88, 'India', 'INR', 'IN'),
(89, 'Indonesia', 'IDR', 'ID'),
(90, 'Iraq', 'IQD', 'IQ'),
(91, 'Ireland', 'EUR', 'IE'),
(92, 'Israel', 'ILS', 'IL'),
(93, 'Italy', 'EUR', 'IT'),
(94, 'Jamaica', 'JMD', 'JM'),
(95, 'Japan', 'JPY', 'JP'),
(96, 'Jordan', 'JOD', 'JO'),
(97, 'Kazakhstan', 'KZT', 'KZ'),
(98, 'Kenya', 'KES', 'KE'),
(99, 'Kiribati', 'AUD', 'KI'),
(100, 'North Korea', 'KPW', 'KP'),
(101, 'South Korea', 'KRW', 'KR'),
(102, 'Kuwait', 'KWD', 'KW'),
(103, 'Latvia', 'LVL', 'LV'),
(104, 'Lebanon', 'LBP', 'LB'),
(105, 'Lesotho', 'LSL', 'LS'),
(106, 'Liberia', 'LRD', 'LR'),
(107, 'England', 'GBP', 'EN'),
(108, 'Liechtenstein', 'CHF', 'LI'),
(109, 'Lithuania', 'LTL', 'LT'),
(110, 'Luxembourg', 'EUR', 'LU'),
(111, 'Macao', 'MOP', 'MO'),
(112, 'Macedonia, Republic of', 'MKD', 'MK'),
(113, 'Madagascar', 'MGF', 'MG'),
(114, 'Malawi', 'MWK', 'MW'),
(115, 'Malaysia', 'MYR', 'MY'),
(116, 'Maldives', 'MVR', 'MV'),
(117, 'Mali', 'XOF', 'ML'),
(118, 'Malta', 'MTL', 'MT'),
(119, 'Martinique', 'EUR', 'MQ'),
(120, 'Mauritania', 'MRO', 'MR'),
(121, 'Mauritius', 'MUR', 'MU'),
(122, 'Mexico', 'MXN', 'MX'),
(123, 'Moldova', 'MDL', 'MD'),
(124, 'Monaco', 'FRF', 'MC'),
(125, 'Mongolia', 'MNT', 'MN'),
(126, 'Montserrat', 'XCD', 'MS'),
(127, 'Morocco', 'MAD', 'MA'),
(128, 'Mozambique', 'MZM', 'MZ'),
(129, 'Myanmar', 'MMK', 'MM'),
(130, 'Namibia', 'NAD', 'NA'),
(131, 'Nauru', 'AUD', 'NR'),
(132, 'Nepal', 'NPR', 'NP'),
(133, 'Netherlands', 'EUR', 'NL'),
(134, 'Netherlands Antilles', 'ANG', 'AN'),
(135, 'New Caledonia', 'XPF', 'NC'),
(136, 'New Zealand', 'NZD', 'NZ'),
(137, 'Nicaragua', 'NIO', 'NI'),
(138, 'Niger', 'XOF', 'NE'),
(139, 'Nigeria', 'NGN', 'NG'),
(140, 'Niue', 'NZD', 'NU'),
(141, 'Norfolk Island', 'AUD', 'NF'),
(142, 'Northern Ireland', 'GBP', 'NB'),
(143, 'Norway', 'NOK', 'NO'),
(144, 'Oman', 'OMR', 'OM'),
(145, 'Pakistan', 'PKR', 'PK'),
(146, 'Panama', 'PAB', 'PA'),
(147, 'Papua New Guinea', 'PGK', 'PG'),
(148, 'Paraguay', 'PYG', 'PY'),
(149, 'Peru', 'PEN', 'PE'),
(150, 'Philippines', 'PHP', 'PH'),
(151, 'Pitcairn Island', 'NZD', 'PN'),
(152, 'Poland', 'PLN', 'PL'),
(153, 'Portugal', 'EUR', 'PT'),
(154, 'Qatar', 'QAR', 'QA'),
(155, 'Reunion', 'EUR', 'RE'),
(156, 'Romania', 'ROL', 'RO'),
(157, 'Russia', 'RUR', 'RU'),
(158, 'Rwanda', 'RWF', 'RW'),
(159, 'Saint Kitts', 'XCD', 'KN'),
(160, 'Saint Lucia', 'XCD', 'LC'),
(161, 'Saint Vincent and the Grenadines', 'XCD', 'VC'),
(162, 'Western Samoa', 'WST', 'WS'),
(163, 'San Marino', 'EUR', 'SM'),
(164, 'Sao Tome and Principe', 'STD', 'ST'),
(165, 'Saudi Arabia', 'SAR', 'SA'),
(166, 'Senegal', 'XOF', 'SN'),
(167, 'Seychelles', 'SCR', 'SC'),
(168, 'Sierra Leone', 'SLL', 'SL'),
(169, 'Singapore', 'SGD', 'SG'),
(170, 'Slovak Republic', 'SKK', 'SK'),
(171, 'Slovenia', 'SIT', 'SI'),
(172, 'Solomon Islands', 'SBD', 'SB'),
(173, 'Somalia', 'SOS', 'SO'),
(174, 'South Africa', 'ZAR', 'ZA'),
(175, 'Spain', 'EUR', 'ES'),
(176, 'Sri Lanka', 'LKR', 'LK'),
(177, 'Saint Helena', 'SHP', 'SH'),
(178, 'Saint Pierre and Miquelon', 'EUR', 'PM'),
(179, 'Sudan', 'SDD', 'SD'),
(180, 'Suriname', 'SRG', 'SR'),
(181, 'Swaziland', 'SZL', 'SZ'),
(182, 'Sweden', 'SEK', 'SE'),
(183, 'Switzerland', 'CHF', 'CH'),
(184, 'Syrian Arab Republic', 'SYP', 'SY'),
(185, 'Taiwan', 'TWD', 'TW'),
(186, 'Tajikistan', 'TJS', 'TJ'),
(187, 'Tanzania', 'TZS', 'TZ'),
(188, 'Thailand', 'THB', 'TH'),
(189, 'Togo', 'XOF', 'TG'),
(190, 'Tokelau', 'NZD', 'TK'),
(191, 'Tonga', 'TOP', 'TO'),
(192, 'Trinidad and Tobago', 'TTD', 'TT'),
(193, 'Tunisia', 'TND', 'TN'),
(194, 'Turkey', 'TRL', 'TR'),
(195, 'Turkmenistan', 'TMM', 'TM'),
(196, 'Turks and Caicos Islands', 'USD', 'TC'),
(197, 'Tuvalu', 'TVD', 'TV'),
(198, 'Uganda', 'UGX', 'UG'),
(199, 'Ukraine', 'UAH', 'UA'),
(200, 'United Arab Emirates', 'AED', 'AE'),
(201, 'Great Britain and Northern Ireland', 'GBP', 'GB'),
(202, 'Uruguay', 'UYU', 'UY'),
(203, 'Uzbekistan', 'UZS', 'UZ'),
(204, 'Vanuatu', 'VUV', 'VU'),
(205, 'Vatican City', 'ITL', 'VA'),
(206, 'Venezuela', 'VEB', 'VE'),
(207, 'Vietnam', 'VND', 'VN'),
(208, 'British Virgin Islands', 'USD', 'VG'),
(209, 'Wallis and Futuna Islands', 'XPF', 'WF'),
(210, 'Yemen', 'YER', 'YE'),
(211, 'Zambia', 'ZMK', 'ZM'),
(212, 'Zimbabwe', 'ZWD', 'ZW'),
(213, 'Iran', 'IRR', 'IR');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id_info` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gioi_thieu` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `link_video` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `name`, `gioi_thieu`, `noi_dung`, `link_video`) VALUES
(4, 'CÔNG TY TNHH THƯƠNG MẠI, SX VÀ DỊCH VỤ MINH PHONG - TRUNG CƯƠNG', 'Đến với Minh Phong ngoài khả năng cung cấp các thiết bị máy móc: sản phẩm máy công cụ và các loại máy thực phẩm, chúng tôi còn nhận thu mua các loại sản phẩm điện máy, điện lạnh công nghiệp, điện dân dụng. Với phương châm “Sự thành công của khách hàng là sự nghiệp của chúng tôi“, chúng tôi tin tưởng rằng quý khách sẽ hài lòng khi đến với Minh Phong Co., Ltd', '<p align="left">\r\n	<span style="font-weight: bold;">T&ecirc;n viết tắt:</span> <span style="font-weight: bold;">MINH PHONG Co., Ltd </span></p>\r\n<font size="3"><span style="font-weight: bold;">Ng&agrave;nh nghề kinh doanh :</span></font><br />\r\n<br />\r\n<b>- <font size="3">Kinh doanh c&aacute;c sản phẩm m&aacute;y c&ocirc;ng cụ, thiết bị Nhật Bản:</font></b> M&aacute;y tiện cơ, m&aacute;y tiện thủy lực, m&aacute;y tiện senga, m&aacute;y cưa cắt thủy lực, m&aacute;y chấn thủy lực, m&aacute;y phay, m&aacute;y cưa v&ograve;ng, m&aacute;y &eacute;p thủy lực, m&aacute;y m&agrave;i mặt phẳng, m&aacute;y m&agrave;i l&ocirc; gi&aacute;p, m&aacute;y m&agrave;i 2 đ&aacute;, m&aacute;y n&eacute;n kh&iacute;, m&aacute;y đột&nbsp; dập, m&aacute;y khoan, m&aacute;y khoan zen, m&aacute;y zen ,m&aacute;y khoan nhiều đầu, m&aacute;y khoan đứng, m&aacute;y khoan cần, m&aacute;y cắt đĩa, m&aacute;y s&oacute;c rung, m&aacute;y cắt t&ocirc;n, m&aacute;y xả t&ocirc;n, pa lăng x&iacute;ch, pa lăng c&aacute;p, tời c&aacute;p b&ograve;, m&aacute;y h&agrave;n tic, m&aacute;y h&agrave;n mic, m&aacute;y h&agrave;n que, quạt ống, quạt s&ecirc;n, quạt &aacute;p, m&aacute;y bơm rửa xe, ...<br />\r\n<br />\r\n<b>- <font size="3">Sản xuất v&agrave; kinh doanh c&aacute;c loại m&aacute;y thực phẩm</font></b>: M&aacute;y xay thịt, m&aacute;y xay gi&ograve;, m&aacute;y xay giềng sả, m&aacute;y th&aacute;i củ quả, m&aacute;y trộn thực phẩm, m&aacute;y th&aacute;i thịt, m&aacute;y cắt thịt đ&ocirc;ng lạnh, ....<br />\r\n<br />\r\n<div>\r\n	Đến với Minh Phong ngo&agrave;i khả năng cung cấp c&aacute;c thiết bị m&aacute;y m&oacute;c, ch&uacute;ng t&ocirc;i c&ograve;n nhận thu mua c&aacute;c loại sản phẩm điện m&aacute;y, điện lạnh c&ocirc;ng nghiệp, điện d&acirc;n dụng. Với phương ch&acirc;m &ldquo;Sự th&agrave;nh c&ocirc;ng của kh&aacute;ch h&agrave;ng l&agrave; sự nghiệp của ch&uacute;ng t&ocirc;i&ldquo;, ch&uacute;ng t&ocirc;i tin tưởng rằng qu&yacute; kh&aacute;ch sẽ h&agrave;i l&ograve;ng khi đến với Minh Phong Co., Ltd</div>\r\n<div>\r\n	<br />\r\n	<font size="3"><b>Số điện thoại b&aacute;n h&agrave;ng:</b></font></div>\r\n<br />\r\n<div>\r\n	- M&aacute;y c&ocirc;ng cụ: 0913 56 3382 - 0988 41 7780</div>\r\n<br />\r\n<div>\r\n	- M&aacute;y chế biến thực phẩm : 0912 815 862 - 039 4477 894<br />\r\n	<br />\r\n	<img alt="" src="/upload/editor/images/2019/1.JPG" style="width: 1000px; height: 562px;" /><br />\r\n	<br />\r\n	<img alt="" src="/upload/editor/images/2019/2.JPG" style="width: 1000px; height: 562px;" /><br />\r\n	<br />\r\n	<img alt="" src="/upload/editor/images/2019/3.JPG" style="width: 1000px; height: 562px;" /></div>\r\n', '<iframe width="560" height="426" src="https://www.youtube.com/embed/iVFLmjECptQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` bigint(20) unsigned NOT NULL,
  `id_catlg` bigint(20) unsigned NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_video` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dang` bigint(20) unsigned NOT NULL DEFAULT 0,
  `thu_tu` int(5) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `id_catlg`, `name`, `image`, `link`, `link_video`, `gioi_thieu`, `ngay_dang`, `thu_tu`, `active`) VALUES
(15, 2, '1', 'logo_1553935086.JPG', '', '', '', 1553935086, 2, 1),
(16, 2, '2', 'logo_1553935101.JPG', '', '', '', 1553935101, 1, 1),
(17, 2, '3', 'logo_1553935133.JPG', '', '', '', 1553935126, 3, 1),
(18, 3, 'A. Cường', 'logo_1554111755.jpg', '', '', 'Rất hài lòng về các sản phẩm của trungcuong.', 1554111486, 0, 1),
(19, 3, 'A. Huy', 'logo_1554111992.png', '', '', 'Sản phẩm rất tốt, nhân viên tư vấn nhiệt tình.', 1554111921, 0, 1),
(20, 4, 'Máy chấn tôn thủy lực', 'logo_1554174906.JPG', '', 'https://www.youtube.com/watch?v=FSTlm4QQ9kc', '', 1554174894, 0, 1),
(21, 4, 'Xe nâng', 'logo_1554176214.png', '', 'https://www.youtube.com/watch?v=RNcN8wfBIrE', '', 1554175021, 0, 1),
(29, 4, 'Máy mài mũi khoan', 'logo_1558949518.jpg', '', 'https://www.youtube.com/watch?v=VLl7-NJwuCI', '', 1558949518, 0, 1),
(30, 4, 'Máy thái rau củ băng truyền', 'logo_1561520641.JPG', '', 'https://www.youtube.com/watch?v=OwITSfWCLOY', '', 1561520641, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id_module` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gia_tri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thu_tu` bigint(20) unsigned NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `name`, `gia_tri`, `thu_tu`, `active`) VALUES
(1, 'Quản lý giới thiệu chung', 'info.php', 0, 1),
(5, 'Quản lý module', 'module.php', 0, 1),
(8, 'Quản lý sản phẩm', 'catpd.php', 0, 1),
(9, 'Cấu hình hệ thống', 'settings.php', 0, 1),
(11, 'Quản lý database', 'dbadmin.php', 0, 1),
(27, 'Quản lý Link - Logo - Banner', 'catlg.php', 0, 1),
(39, 'Quản lý liên hệ', 'contact.php', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` bigint(20) unsigned NOT NULL,
  `idroot` int(5) NOT NULL DEFAULT 0,
  `parentid` int(5) NOT NULL DEFAULT 0,
  `id_catpd` bigint(20) unsigned NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dang` bigint(20) unsigned NOT NULL DEFAULT 0,
  `thu_tu` bigint(20) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `small_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `normal_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `id_user` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `selected` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1291 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `idroot`, `parentid`, `id_catpd`, `name`, `image`, `noi_dung`, `ngay_dang`, `thu_tu`, `active`, `small_image`, `normal_image`, `image1`, `image2`, `image3`, `image4`, `hot`, `id_user`, `selected`) VALUES
(31, 2, 39, 39, 'Máy xay 1,5 ', 'product_1206636171.jpg', '<strong>M&aacute;y xay 1,5kw</strong><br />\r\n<br />\r\nC&ocirc;ng suất: 1,5kw<br />\r\nĐiện &aacute;p: 220v<br />\r\nNăng suất: 2-3kg/mẻ<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại xưởng c&ocirc;ng ty<br />\r\nT&aacute;c dụng: Xay thịt, xay mọc, giềng, xả, ớt.....<br />\r\nM&aacute;y thiết kế c&oacute; đổ, nồi nắp k&iacute;nh bằng inox n&ecirc;n rất dễ d&agrave;ng sử dụng v&agrave; vệ sinh<br />\r\nBảo h&agrave;nh: Bảo h&agrave;nh m&ocirc; tơ 05 th&aacute;ng', 1206636171, 0, 1, 'thumb_product_1206636171.jpeg', 'normal_product_1206636171.jpeg', '', '', '', '', 0, 1, ''),
(34, 2, 42, 42, 'Máy đánh trứng, quấy bột', 'product_1207240852.jpg', 'C&ocirc;ng suất<strong>:</strong> 750w<br />\r\nXuất xứ: Đ&agrave;i Loan, Nhật Bản<br />\r\nC&ocirc;ng dụng: Đ&aacute;nh bột, đ&aacute;nh trứng d&ugrave;ng cho c&aacute;c nh&agrave; h&agrave;ng, cửa h&agrave;ng .....<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ<br />\r\n', 1207240852, 0, 1, 'thumb_product_1207240852.jpeg', 'normal_product_1207240852.jpeg', '', '', '', '', 0, 1, ''),
(28, 2, 39, 39, 'Máy xay thịt, xay cá P48', 'product_1206635349.jpg', '', 1206635349, 0, 1, 'thumb_product_1206635349.jpeg', '', '', '', '', '', 0, 1, ''),
(29, 2, 39, 39, 'Máy xay thịt P32', 'product_1206635427.jpg', '<strong>C&ocirc;ng suất:</strong> 100kg/1giờ<br />\r\n<strong>Điện &aacute;p:</strong> 220v - 380v<br />\r\n<strong>T&aacute;c dụng:</strong> xay thịt, xay mỡ hạt lựu', 1206635427, 0, 1, 'thumb_product_1206635427.jpeg', '', '', '', '', '', 0, 1, ''),
(7, 2, 42, 42, 'Máy lạng bì', 'product_1205933772.jpg', '<p>\r\n	<strong>C&ocirc;ng suất:</strong> L&ocirc; 14, l&ocirc; 20<br />\r\n	<strong>Điện &aacute;p:</strong> 220v<br />\r\n	<strong>T&aacute;c dụng:</strong> lạng mỏng b&igrave; lợn</p>\r\n', 1205851894, 0, 1, 'thumb_product_1205933772.jpg', 'normal_product_1205933772.jpg', '', '', '', '', 0, 1, ''),
(8, 2, 38, 38, 'Máy khuấy', 'product_1205933756.jpg', '<p>\r\n	<strong>C&ocirc;ng suất:</strong> 750kw, 1kw, 1.5 kw,2.2 kw,3.7 kw, 5.5 kw<br />\r\n	<strong>Điện &aacute;p v&agrave;o:</strong> 220v - 380v<br />\r\n	<strong>T&aacute;c dụng:</strong> Đ&aacute;nh, nh&agrave;o, trộn, khuấy c&aacute;c loại thực phẩm</p>\r\n', 1205851897, 0, 1, 'thumb_product_1205933756.jpg', 'normal_product_1205933756.jpg', '', '', '', '', 0, 1, ''),
(1161, 1, 33, 33, 'Mâm cặp 3 chấu mới', 'product_1555917881.JPG', 'Xuất xứ: NHật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555917881, 0, 1, 'thumb_product_1555917881.jpeg', 'normal_product_1555917881.jpeg', 'product1_1555917881.JPG', 'product2_1555917881.JPG', '', '', 0, 3, ''),
(46, 2, 42, 42, 'Máy xay cà phê ', 'product_1216808566.jpg', '<p>\r\n	<strong>C&ocirc;ng suất: </strong>0.75; 1.5<br />\r\n	<strong>Điện &aacute;p: </strong>220v; 380v<br />\r\n	<strong>Xuất xứ: </strong>Tiệp Khắc</p>\r\n', 1216808566, 1, 1, 'thumb_product_1216808566.jpeg', '', '', '', '', '', 0, 3, ''),
(57, 2, 36, 36, 'Máy thái thịt Đài Loan', 'product_1571219576.JPG', '<span style="font-size:16px;"><strong>M&aacute;y th&aacute;i thịt Đ&agrave;i Loan</strong></span>\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;">Điện &aacute;p: 220v</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">C&ocirc;ng suất: 750w</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Độ d&agrave;y l&aacute;t cắt: 2.5mm- 3.5mm- 5mm- cố định kh&ocirc;ng thay đổi</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Năng s&uacute;&acirc;t: 150-200kg/h</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Trọng lượng: 51kg</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">K&iacute;ch thước : 380x 335x 585<font color="#333333" face="arial, helvetica, sans-serif">mm</font></span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Chất liệu: inox, th&eacute;p</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Bảo h&agrave;nh: 06 th&aacute;ng</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Xuất xứ: Đ&agrave;i Loan</span></li>\r\n</ul>\r\n<br />\r\n<br />\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: rgb(68, 68, 68); font-family: Arial; font-size: 14px;">\r\n	<span style="font-size:14px;"><em style="box-sizing: border-box;">M&aacute;y th&aacute;i c&oacute; lưỡi dao cố định, kh&ocirc;ng điều chỉnh được độ d&agrave;y mỏng, c&oacute; 3 k&iacute;ch thước 2.5 -3.5- 5.0mm, th&aacute;i được c&aacute;c l&aacute;t thịt đều mỏng như &yacute;</em></span></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: rgb(68, 68, 68); font-family: Arial; font-size: 14px;">\r\n	<span style="font-size:14px;"><span style="box-sizing: border-box;">+ Loại lưỡi 2.5mm: Thường d&ugrave;ng cắt thịt b&ograve;<i>,</i>&nbsp;lợn với l&aacute;t thịt mỏng để x&agrave;o nấu, nh&uacute;ng phở, nh&uacute;ng mẻ..</span></span></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: rgb(68, 68, 68); font-family: Arial; font-size: 14px;">\r\n	<span style="font-size:14px;"><span style="box-sizing: border-box;">+ Loại lưỡi&nbsp; 3.5mm: Th&aacute;i cắt thịt nướng, b&uacute;n chả, m&oacute;n lẩu, l&agrave;m gi&ograve; thủ&hellip;</span></span></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: rgb(68, 68, 68); font-family: Arial; font-size: 14px;">\r\n	<span style="font-size:14px;"><span style="box-sizing: border-box;">+ Loại lưỡi 5.0mm: Th&aacute;i thịt nướng, b&uacute;n chả, th&aacute;i thịt, th&aacute;i mỡ&nbsp; l&agrave;m gi&ograve; chả, thịt l&agrave;m Bit tết&hellip;</span></span></p>\r\n<div>\r\n	&nbsp;</div>\r\n', 1217415260, 0, 1, 'thumb_product_1571219576.jpeg', 'normal_product_1571219576.jpeg', 'product1_1571219578.JPG', 'product2_1571219578.JPG', 'product3_1571219578.JPG', 'product4_1571219578.JPG', 0, 3, ''),
(59, 2, 39, 39, 'Máy xay thịt giảm tốc', 'product_1217415364.jpg', '<span style="font-size:16px;"><strong>Cối xay thịt giảm tốc&nbsp;</strong></span><br />\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;">C&ocirc;ng suất 0,4kw</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Điện &aacute;p : 220v</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Vật liệu l&agrave;m: Th&eacute;p</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Xuất xứ: Gia c&ocirc;ng sản xuất tại xưởng c&ocirc;ng ty</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Bảo h&agrave;nh: bảo h&agrave;nh m&ocirc; tơ 03 th&aacute;ng</span></li>\r\n</ul>\r\n', 1217415364, 0, 1, 'thumb_product_1217415364.jpeg', '', 'product1_1567915086.JPG', 'product2_1567915086.JPG', 'product3_1567915086.JPG', '', 0, 3, ''),
(62, 2, 39, 39, 'Cối xay thị gióng mô tơ', 'product_1217415470.jpg', 'C&ocirc;ng suất: 0,75kw- 1,1kw- 1,5kw- 2,2kw- 3,0kw- 100% d&acirc;y đồng<br />\r\nK&iacute;ch cỡ cối: p6- p12- p22- p32<br />\r\nĐiện &aacute;p: 220v<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại c&ocirc;ng ty<br />\r\nC&ocirc;ng dụng: xay thịt, xay mỡ, xay đầu c&aacute;.......<br />\r\nBảo h&agrave;nh: bảo h&agrave;nh m&ocirc; tơ 05 th&aacute;ng, bảo h&agrave;nh cối 01 th&aacute;ng', 1217415470, 0, 1, 'thumb_product_1217415470.jpeg', '', '', '', '', '', 0, 3, ''),
(71, 2, 42, 42, 'Máy ép cốt dừa', 'product_1226629918.jpg', 'M&aacute;y &eacute;p cốt dừa bằng tay c&oacute; thiết kế nhỏ gọn, tương đối nhẹ, dễ d&agrave;ng di chuyển.<br />\r\nM&aacute;y c&oacute; thể vắt được 1-2kg dừa nạo, dễ d&agrave;ng vệ sinh sau khi sử dụng', 1226629919, 0, 1, 'thumb_product_1226629918.jpeg', 'normal_product_1226629918.jpeg', '', '', '', '', 0, 3, ''),
(582, 1, 30, 30, 'Ba lăng', 'product_1464227636.jpg', '', 1464145993, 0, 1, 'thumb_product_1464227636.jpeg', 'normal_product_1464227636.jpeg', '', '', '', '', 1, 3, ''),
(270, 1, 18, 18, 'Máy chấn MAZAK 100T', 'product_1445503245.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445503195, 0, 1, 'thumb_product_1445503245.jpeg', 'normal_product_1445503245.jpeg', 'product1_1573632760.jpg', 'product2_1573632760.jpg', 'product3_1573632760.jpg', '', 1, 3, ''),
(271, 1, 18, 18, 'Máy chấn tôn KOMATSU', 'product_1445503266.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445503267, 0, 1, 'thumb_product_1445503266.jpeg', 'normal_product_1445503266.jpeg', '', '', '', '', 0, 3, ''),
(95, 2, 39, 39, 'Máy xay thịt P22 thùng', 'product_1567913893.JPG', '<strong><span style="font-size:16px;">M&aacute;y xay thịt p22 th&ugrave;ng</span></strong><br />\r\n<br />\r\n<ul>\r\n	<li>\r\n		<span style="font-size:14px;">C&ocirc;ng suất: 2,2kw- điện cơ An Ph&aacute;t</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Điện &aacute;p : 220v</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">K&iacute;ch thước: 555 x 325 x 750mm</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Năng suất tối thiểu: 150 -&gt; 200kg/h</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Chất liệu: Khung bằng th&eacute;p, cối bằng gang, vỏ bọc bằng inox</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Xuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại xưởng</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Bảo h&agrave;nh: Bảo h&agrave;nh m&ocirc; tơ 06 th&aacute;ng</span></li>\r\n	<li>\r\n		<span style="font-size:14px;">Gi&aacute; b&aacute;n: Li&ecirc;n hệ</span></li>\r\n</ul>\r\n', 1293781063, 0, 1, 'thumb_product_1567913893.jpeg', 'normal_product_1567913893.jpeg', 'product1_1567913894.JPG', 'product2_1567913894.JPG', 'product3_1567913894.JPG', 'product4_1567913894.JPG', 1, 3, ''),
(105, 1, 30, 30, 'Ba lăng xích', 'product_1293788960.JPG', '', 1293788961, 0, 1, 'thumb_product_1293788960.jpeg', 'normal_product_1293788960.jpeg', '', '', '', '', 1, 3, ''),
(110, 1, 34, 34, 'Quạt gió', 'product_1382317830.JPG', '', 1382251720, 0, 1, 'thumb_product_1382317830.jpeg', 'normal_product_1382317830.jpeg', '', '', '', '', 0, 3, ''),
(584, 1, 24, 56, 'Máy hàn mic', 'product_1464146025.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464146026, 0, 1, 'thumb_product_1464146025.jpeg', 'normal_product_1464146025.jpeg', '', '', '', '', 0, 3, ''),
(128, 2, 39, 39, 'Máy xay thịt Đài Loan', 'product_1555819285.jpg', 'Điện &aacute;p: 220v<br />\r\nC&ocirc;ng suất: 3/4HP ~ 550w<br />\r\nNăng suất: 50kg/h<br />\r\nPhụ kiện đi k&egrave;m: 4 bộ dao+ lưới<br />\r\nChất liệu: Gang+ inox<br />\r\nTrọng lượng: 25kg<br />\r\nXuất xứ: Đ&agrave;i Loan<br />\r\n<br />\r\nM&aacute;y xay thịt Đ&agrave;i Loan to&agrave;n bộ th&acirc;n vỏ đều được l&agrave;m bằng hợp kim nh&ocirc;m n&ecirc;n rất s&aacute;ng, kh&ocirc;ng bị gỉ, độ bền cao, đảm bảo vệ sinh an to&agrave;n thực phẩm<br />\r\nTrục xoắn đ&ugrave;n thực phẩm được l&agrave;m bằng inox đ&uacute;c nguy&ecirc;n khối n&ecirc;n rất chắc chắn v&agrave; cứng c&aacute;p.<br />\r\nM&aacute;y c&oacute; 4 bộ dao s&agrave;ng với k&iacute;ch thước c&aacute;c lỗ s&agrave;ng to nhỏ kh&aacute;c v&igrave; vậy người sử dụng chỉ việc lựa chọn bộ dao s&agrave;ng c&oacute; lỗ ph&ugrave; hợp để lắp v&agrave;o m&aacute;y, sau đ&oacute; xoay c&ocirc;ng tắc để m&aacute;y hoạt động v&agrave; cho thịt v&agrave;o để xay, c&aacute;c c&ocirc;ng đoạn rất đơn giản. Đặc biệt m&aacute;y xay thịt Đ&agrave;i Loan phần c&ocirc;ng tắc c&oacute; thể xoay 2 chiều tr&aacute;i phải, nếu trong qu&aacute; tr&igrave;nh xay thịt bị kẹt c&oacute; thể xoay c&ocirc;ng tắc tr&aacute;i để đ&ugrave;n ngược trở ra.<br />\r\nM&aacute;y c&oacute; thể th&aacute;o lắp c&aacute;c bộ phận rất dễ d&agrave;ng, v&igrave; vậy sau khi sử dụng xong bạn c&oacute; thể th&aacute;o c&aacute;c bộ phận của m&aacute;y để vệ sinh m&aacute;y.<br />\r\nNgo&agrave;i ra m&aacute;y c&ograve;n c&oacute; phễu đ&ugrave;n x&uacute;c x&iacute;ch hoặc lap xưởng<br />\r\n<p font-size:="" helvetica="" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, ">\r\n	&nbsp;</p>\r\n', 1392775563, 0, 1, 'thumb_product_1555819285.jpeg', 'normal_product_1555819285.jpeg', 'product1_1556954903.jpg', 'product2_1556954903.jpg', 'product3_1556954903.jpg', 'product4_1556954903.jpg', 0, 3, ''),
(135, 1, 15, 49, 'Máy tiện bán nguyệt senga', 'product_1393567151.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393567152, 0, 1, 'thumb_product_1393567151.jpeg', 'normal_product_1393567151.jpeg', '', '', '', '', 0, 3, ''),
(136, 1, 34, 34, 'Quạt sên', 'product_1393567652.JPG', '', 1393567653, 0, 1, 'thumb_product_1393567652.jpeg', 'normal_product_1393567652.jpeg', '', '', '', '', 0, 3, ''),
(138, 1, 34, 34, 'Quạt gió', 'product_1393567748.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393567749, 0, 1, 'thumb_product_1393567748.jpeg', 'normal_product_1393567748.jpeg', '', '', '', '', 0, 3, ''),
(140, 2, 38, 38, 'Máy trộn thực phẩm', 'product_1393567846.JPG', '', 1393567847, 0, 1, 'thumb_product_1393567846.jpeg', 'normal_product_1393567846.jpeg', '', '', '', '', 0, 3, ''),
(161, 2, 42, 42, 'Máy vắt có sấy', 'product_1393572935.JPG', 'Xuấ xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393572936, 0, 1, 'thumb_product_1393572935.jpeg', 'normal_product_1393572935.jpeg', '', '', '', '', 0, 3, ''),
(164, 2, 42, 42, 'Máy chà vỏ khoai', 'product_1393573469.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393573470, 0, 1, 'thumb_product_1393573469.jpeg', 'normal_product_1393573469.jpeg', '', '', '', '', 0, 3, ''),
(165, 2, 38, 38, 'Máy trộn đứng', 'product_1393573519.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nC&ocirc;ng suất: 750w<br />\r\nC&ocirc;ng dụng: đ&aacute;nh trứng, trộn bột<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393573519, 0, 1, 'thumb_product_1393573519.jpeg', 'normal_product_1393573519.jpeg', '', '', '', '', 0, 3, ''),
(167, 2, 39, 39, 'Cối xay thịt gióng thùng', 'product_1393573639.JPG', 'C&ocirc;ng suất: 2,2kw- 3kw - điện cơ An ph&aacute;t<br />\r\nĐiện &aacute;p: 220V<br />\r\nChất liệu: inox, gang<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất<br />\r\nBảo h&agrave;nh m&ocirc; tơ 06 th&aacute;ng theo điều kiện nh&agrave; sản xuất<br />\r\nC&ocirc;ng dụng: xay thịt, xay mỡ<br />\r\n<br />\r\n', 1393573640, 0, 1, 'thumb_product_1393573639.jpeg', 'normal_product_1393573639.jpeg', 'product1_1560159982.jpg', 'product2_1560159982.jpg', '', '', 0, 3, ''),
(170, 2, 38, 38, 'Máy trộn', 'product_1393575536.JPG', '', 1393575537, 0, 1, 'thumb_product_1393575536.jpeg', 'normal_product_1393575536.jpeg', '', '', '', '', 0, 3, ''),
(173, 2, 39, 39, 'Cối xay thịt các loại', 'product_1393575728.JPG', 'C&aacute;c loại cối th&ocirc;ng dụng hiện nay l&agrave; cối p6, p12, p22, p32<br />\r\nCối được gi&oacute;ng chắc chắn, bền đẹp, dễ d&agrave;ng th&aacute;o lắp vệ sinh v&agrave; sẵn đồ thay thế.<br />\r\n', 1393575728, 0, 1, 'thumb_product_1393575728.jpeg', 'normal_product_1393575728.jpeg', '', '', '', '', 0, 3, ''),
(174, 2, 42, 42, 'Máy ép ốc', 'product_1393575838.JPG', '', 1393575839, 0, 1, 'thumb_product_1393575838.jpeg', 'normal_product_1393575838.jpeg', '', '', '', '', 0, 3, ''),
(177, 2, 42, 42, 'Máy nạo dừa', 'product_1393576040.JPG', '', 1393576041, 0, 1, 'thumb_product_1393576040.jpeg', 'normal_product_1393576040.jpeg', '', '', '', '', 0, 3, ''),
(180, 1, 33, 33, 'Lưỡi phay 100 x 13', 'product_1393576335.JPG', '', 1393576336, 0, 1, 'thumb_product_1393576335.jpeg', 'normal_product_1393576335.jpeg', '', '', '', '', 0, 3, ''),
(181, 1, 33, 33, 'Lưỡi phay 100 x 18', 'product_1393576488.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393576489, 0, 1, 'thumb_product_1393576488.jpeg', 'normal_product_1393576488.jpeg', '', '', '', '', 0, 3, ''),
(182, 1, 33, 33, 'Lưỡi phay', 'product_1393576540.JPG', '', 1393576541, 0, 1, 'thumb_product_1393576540.jpeg', 'normal_product_1393576540.jpeg', '', '', '', '', 0, 3, ''),
(183, 1, 33, 33, 'Lưỡi phay 100 x 4.5', 'product_1393578984.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393578985, 0, 1, 'thumb_product_1393578984.jpeg', 'normal_product_1393578984.jpeg', '', '', '', '', 0, 3, ''),
(184, 1, 33, 33, 'Lưỡi phay 100 x 4.0', 'product_1393579036.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393579036, 0, 1, 'thumb_product_1393579036.jpeg', 'normal_product_1393579036.jpeg', '', '', '', '', 0, 3, ''),
(185, 1, 33, 33, 'Lưỡi phay 125', 'product_1393579086.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393579088, 0, 1, 'thumb_product_1393579086.jpeg', 'normal_product_1393579086.jpeg', '', '', '', '', 0, 3, ''),
(186, 1, 33, 33, 'Lưỡi phay 75 x 18', 'product_1393579126.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393579127, 0, 1, 'thumb_product_1393579126.jpeg', 'normal_product_1393579126.jpeg', '', '', '', '', 0, 3, ''),
(187, 1, 33, 33, 'Lưỡi phay 30 x 1.2', 'product_1393579176.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393579177, 0, 1, 'thumb_product_1393579176.jpeg', 'normal_product_1393579176.jpeg', '', '', '', '', 0, 3, ''),
(188, 1, 35, 72, 'Mô tơ giảm tốc hàng Nhật bãi', 'product_1393579226.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1393579227, 0, 1, 'thumb_product_1393579226.jpeg', 'normal_product_1393579226.jpeg', '', '', '', '', 0, 3, ''),
(196, 1, 26, 26, 'Máy khoan', 'product_1415198661.JPG', '', 1415198662, 0, 1, 'thumb_product_1415198661.jpeg', 'normal_product_1415198661.jpeg', '', '', '', '', 1, 4, ''),
(208, 2, 38, 38, 'Máy trộn thực phẩm', 'product_1415200650.JPG', '', 1415200651, 0, 1, 'thumb_product_1415200650.jpeg', 'normal_product_1415200650.jpeg', '', '', '', '', 1, 4, ''),
(210, 1, 18, 18, 'Máy chấn AMADA RG80', 'product_1427959705.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1427959706, 0, 1, 'thumb_product_1427959705.jpeg', 'normal_product_1427959705.jpeg', '', '', '', '', 1, 4, ''),
(218, 1, 11, 45, 'Máy phay KASUGA', 'product_1427960324.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1427960325, 0, 1, 'thumb_product_1427960324.jpeg', 'normal_product_1427960324.jpeg', '', '', '', '', 1, 4, ''),
(244, 1, 25, 25, 'Máy đột dập DOBBY', 'product_1432095742.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1432095743, 0, 1, 'thumb_product_1432095742.jpeg', 'normal_product_1432095742.jpeg', '', '', '', '', 1, 4, ''),
(245, 2, 38, 38, 'Máy trộn', 'product_1432095759.JPG', '', 1432095760, 0, 1, 'thumb_product_1432095759.jpeg', 'normal_product_1432095759.jpeg', '', '', '', '', 1, 4, ''),
(296, 1, 11, 45, 'Máy phay đứng ESK', 'product_1445503912.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445503912, 0, 1, 'thumb_product_1445503912.jpeg', 'normal_product_1445503912.jpeg', '', '', '', '', 0, 3, ''),
(299, 1, 11, 46, 'Máy phay ngang SEIKI', 'product_1445503973.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445503974, 0, 1, 'thumb_product_1445503973.jpeg', 'normal_product_1445503973.jpeg', '', '', '', '', 0, 3, ''),
(301, 1, 35, 85, 'Máy sọc NAKABO', 'product_1445504010.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504010, 0, 1, 'thumb_product_1445504010.jpeg', 'normal_product_1445504010.jpeg', '', '', '', '', 0, 3, ''),
(305, 2, 42, 42, 'Máy vắt lồng ngang công suất lớn', 'product_1445504074.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504075, 0, 1, 'thumb_product_1445504074.jpeg', 'normal_product_1445504074.jpeg', '', '', '', '', 0, 3, ''),
(306, 2, 42, 42, 'Máy vắt', 'product_1445504089.JPG', '', 1445504089, 0, 1, 'thumb_product_1445504089.jpeg', 'normal_product_1445504089.jpeg', '', '', '', '', 0, 3, ''),
(307, 2, 42, 42, 'Máy vắt+ Máy xóc rung', 'product_1445504102.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504102, 0, 1, 'thumb_product_1445504102.jpeg', 'normal_product_1445504102.jpeg', '', '', '', '', 0, 3, ''),
(308, 1, 22, 22, 'Máy sóc rung', 'product_1445504114.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504114, 0, 1, 'thumb_product_1445504114.jpeg', 'normal_product_1445504114.jpeg', '', '', '', '', 0, 3, ''),
(309, 1, 17, 55, 'Máy cắt đột liên hợp', 'product_1445504520.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504520, 0, 1, 'thumb_product_1445504520.jpeg', 'normal_product_1445504520.jpeg', '', '', '', '', 0, 3, ''),
(312, 1, 17, 53, 'Máy cắt U I V thủy lực', 'product_1445504573.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504573, 0, 1, 'thumb_product_1445504573.jpeg', 'normal_product_1445504573.jpeg', '', '', '', '', 0, 3, ''),
(314, 1, 17, 17, 'Máy cưa đĩa HITACHI', 'product_1445504605.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504605, 0, 1, 'thumb_product_1445504605.jpeg', 'normal_product_1445504605.jpeg', '', '', '', '', 0, 3, ''),
(315, 1, 19, 19, 'Máy cưa vòng AMADA HA 250', 'product_1445504622.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504623, 7, 1, 'thumb_product_1445504622.jpeg', 'normal_product_1445504622.jpeg', '', '', '', '', 0, 3, ''),
(320, 1, 32, 71, 'Máy nén khí trục vít HITACHI 37 KW', 'product_1445504713.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504714, 0, 1, 'thumb_product_1445504713.jpeg', 'normal_product_1445504713.jpeg', '', '', '', '', 0, 3, ''),
(321, 1, 32, 71, 'Máy nén khí trục vít MITSUI SEKI 55KW', 'product_1445504726.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504727, 0, 1, 'thumb_product_1445504726.jpeg', 'normal_product_1445504726.jpeg', '', '', '', '', 0, 3, ''),
(326, 1, 34, 34, 'Quạt sên', 'product_1445504790.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1445504791, 0, 1, 'thumb_product_1445504790.jpeg', 'normal_product_1445504790.jpeg', '', '', '', '', 0, 3, ''),
(341, 1, 24, 59, 'Máy hàn bấm không dấu 7KVA', 'product_1447247478.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1447247478, 0, 1, 'thumb_product_1447247478.jpeg', 'normal_product_1447247478.jpeg', '', '', '', '', 0, 3, ''),
(356, 1, 35, 85, 'Máy rửa lưỡi cưa', 'product_1447247722.JPG', '', 1447247723, 0, 1, 'thumb_product_1447247722.jpeg', 'normal_product_1447247722.jpeg', '', '', '', '', 0, 3, ''),
(366, 1, 15, 48, 'Máy tiện thủy lực', 'product_1447247896.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1447247897, 0, 1, 'thumb_product_1447247896.jpeg', 'normal_product_1447247896.jpeg', '', '', '', '', 0, 3, ''),
(369, 1, 15, 48, 'Máy tiện thủy lực 2 đầu', 'product_1447247932.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1447247933, 0, 1, 'thumb_product_1447247932.jpeg', 'normal_product_1447247932.jpeg', '', '', '', '', 0, 3, ''),
(374, 2, 38, 38, 'Máy trộn có cánh vét', 'product_1447248014.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1447248014, 0, 1, 'thumb_product_1447248014.jpeg', 'normal_product_1447248014.jpeg', '', '', '', '', 0, 3, ''),
(376, 2, 42, 42, 'Máy vắt', 'product_1447248026.JPG', '', 1447248026, 0, 1, 'thumb_product_1447248026.jpeg', 'normal_product_1447248026.jpeg', '', '', '', '', 0, 3, ''),
(849, 1, 25, 25, 'Máy dập', 'product_1507186124.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185056, 0, 1, 'thumb_product_1507186124.jpeg', 'normal_product_1507186124.jpeg', '', '', '', '', 1, 3, ''),
(850, 1, 19, 19, 'Máy cưa AMADA', 'product_1507185072.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185072, 2, 1, 'thumb_product_1507185072.jpeg', 'normal_product_1507185072.jpeg', '', '', '', '', 1, 3, ''),
(851, 1, 17, 55, 'Máy cắt đột liên hợp', 'product_1507185143.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185144, 0, 1, 'thumb_product_1507185143.jpeg', 'normal_product_1507185143.jpeg', '', '', '', '', 1, 3, ''),
(847, 1, 26, 82, 'Máy khoan ren phay xoay đầu', 'product_1507185012.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185013, 0, 1, 'thumb_product_1507185012.jpeg', 'normal_product_1507185012.jpeg', '', '', '', '', 1, 3, ''),
(848, 1, 27, 66, 'Máy đánh bóng có hút bụi 0,4kw', 'product_1507185036.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185036, 0, 1, 'thumb_product_1507185036.jpeg', 'normal_product_1507185036.jpeg', '', '', '', '', 1, 3, ''),
(389, 1, 26, 26, 'Máy khoan phay ', 'product_1450665266.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1450665266, 0, 1, 'thumb_product_1450665266.jpeg', 'normal_product_1450665266.jpeg', '', '', '', '', 0, 3, ''),
(394, 1, 35, 85, 'Máy phun sơn', 'product_1450665331.JPG', '', 1450665331, 0, 1, 'thumb_product_1450665331.jpeg', 'normal_product_1450665331.jpeg', '', '', '', '', 0, 3, ''),
(405, 1, 17, 53, 'Máy cắt đĩa thủy lực tự động', 'product_1451825861.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451825862, 0, 1, 'thumb_product_1451825861.jpeg', 'normal_product_1451825861.jpeg', '', '', '', '', 0, 3, ''),
(854, 1, 26, 60, 'Khoan cần TOA', 'product_1570083786.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185477, 0, 1, 'thumb_product_1570083786.jpeg', 'normal_product_1570083786.jpeg', 'product1_1570083787.jpg', 'product2_1570083787.jpg', 'product3_1570083787.jpg', '', 1, 3, ''),
(855, 1, 29, 29, 'Máy đột li hợp', 'product_1507185501.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185501, 0, 1, 'thumb_product_1507185501.jpeg', 'normal_product_1507185501.jpeg', '', '', '', '', 1, 3, ''),
(408, 1, 17, 84, 'Máy cắt tôn 2.5x6.5', 'product_1451825933.5x2.5.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451825933, 0, 1, 'thumb_product_1451825933.5x2.5.jpeg', 'normal_product_1451825933.5x2.5.jpeg', '', '', '', '', 0, 3, ''),
(852, 1, 17, 17, 'Máy cắt đĩa', 'product_1507185161.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507185162, 0, 1, 'thumb_product_1507185161.jpeg', 'normal_product_1507185161.jpeg', '', '', '', '', 1, 3, ''),
(412, 1, 35, 85, 'Máy đóng kiện ', 'product_1451826024.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451826024, 0, 1, 'thumb_product_1451826024.jpeg', 'normal_product_1451826024.jpeg', '', '', '', '', 0, 3, ''),
(418, 1, 35, 85, 'Máy đục lỗ', 'product_1451826132.JPG', '', 1451826132, 0, 1, 'thumb_product_1451826132.jpeg', 'normal_product_1451826132.jpeg', '', '', '', '', 0, 3, ''),
(422, 1, 16, 50, 'Máy ép thủy lực', 'product_1451826205.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451826205, 0, 1, 'thumb_product_1451826205.jpeg', 'normal_product_1451826205.jpeg', '', '', '', '', 0, 3, ''),
(856, 1, 16, 52, 'Máy ép JAM có bàn xoay', 'product_1507187864.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507187865, 0, 1, 'thumb_product_1507187864.jpeg', 'normal_product_1507187864.jpeg', '', '', '', '', 1, 3, ''),
(438, 1, 15, 48, 'Máy tiện cam', 'product_1451826438.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451826439, 0, 1, 'thumb_product_1451826438.jpeg', 'normal_product_1451826438.jpeg', 'product1_1560068610.jpg', '', '', '', 0, 3, ''),
(440, 1, 15, 48, 'Máy tiện rút thủy lực', 'product_1451826463.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451826464, 0, 1, 'thumb_product_1451826463.jpeg', 'normal_product_1451826463.jpeg', '', '', '', '', 0, 3, ''),
(857, 1, 16, 50, 'Máy ép thủy lực 60 ~80 tấn', 'product_1507188031.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507188034, 0, 1, 'thumb_product_1507188031.jpeg', 'normal_product_1507188031.jpeg', '', '', '', '', 1, 3, ''),
(448, 2, 42, 42, 'Máy vắt có sấy', 'product_1451826566.JPG', '', 1451826566, 0, 1, 'thumb_product_1451826566.jpeg', 'normal_product_1451826566.jpeg', '', '', '', '', 0, 3, ''),
(449, 2, 42, 42, 'Máy vắt Nhật', 'product_1451826580.JPG', '', 1451826581, 0, 1, 'thumb_product_1451826580.jpeg', 'normal_product_1451826580.jpeg', '', '', '', '', 0, 3, ''),
(451, 1, 26, 82, 'Máy zen nhiều đầu tự động', 'product_1451826600.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1451826600, 0, 1, 'thumb_product_1451826600.jpeg', 'normal_product_1451826600.jpeg', '', '', '', '', 0, 3, ''),
(456, 1, 24, 58, 'Máy hàn bấm 1 chiều DC', 'product_1453706955.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1453706957, 0, 1, 'thumb_product_1453706955.jpeg', 'normal_product_1453706955.jpeg', '', '', '', '', 0, 3, ''),
(458, 1, 24, 56, 'Máy hàn Mic 350A SA', 'product_1453707013.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1453707015, 0, 1, 'thumb_product_1453707013.jpeg', 'normal_product_1453707013.jpeg', '', '', '', '', 0, 3, ''),
(805, 2, 36, 36, 'Máy thái thịt tự động Nhật bãi', 'product_1499332195.JPG', 'M&aacute;y c&oacute; xuất xứ từ Nhật Bản<br />\r\nĐiện &aacute;p : 110v<br />\r\nM&aacute;y c&oacute; kết cấu nhỏ gọn v&agrave; gi&aacute; th&agrave;nh hợp l&yacute;. Được sử dụng trong việc th&aacute;i thịt ch&iacute;n v&agrave; thịt đ&ocirc;ng lạnh.<br />\r\nM&aacute;y rất dễ vận h&agrave;nh v&agrave; vệ sinh<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499332195, 0, 1, 'thumb_product_1499332195.jpeg', 'normal_product_1499332195.jpeg', '', '', '', '', 1, 3, ''),
(482, 1, 35, 85, 'Máy bơm dầu 1', 'product_1456474557.jpg', '', 1456474558, 0, 1, 'thumb_product_1456474557.jpeg', 'normal_product_1456474557.jpeg', '', '', '', '', 0, 3, ''),
(488, 1, 25, 25, 'Máy dập 30T SHINOHARA', 'product_1456474756.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456474758, 0, 1, 'thumb_product_1456474756.jpeg', 'normal_product_1456474756.jpeg', '', '', '', '', 0, 3, ''),
(492, 1, 24, 56, 'Máy hàn mic 750A', 'product_1456474900.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456474901, 0, 1, 'thumb_product_1456474900.jpeg', 'normal_product_1456474900.jpeg', '', '', '', '', 0, 3, ''),
(493, 1, 24, 56, 'Máy hàn mic 800A', 'product_1456474924.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456474926, 0, 1, 'thumb_product_1456474924.jpeg', 'normal_product_1456474924.jpeg', '', '', '', '', 0, 3, ''),
(495, 1, 27, 62, 'Máy mài 2 đá', 'product_1456474964.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456474965, 0, 1, 'thumb_product_1456474964.jpeg', 'normal_product_1456474964.jpeg', '', '', '', '', 0, 3, ''),
(497, 1, 32, 69, 'Máy nén khí TOSHIBA', 'product_1456475011.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475012, 0, 1, 'thumb_product_1456475011.jpeg', 'normal_product_1456475011.jpeg', '', '', '', '', 0, 3, ''),
(506, 1, 15, 47, 'Máy tiện HOWA SANGYO', 'product_1456475225.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475226, 0, 1, 'thumb_product_1456475225.jpeg', 'normal_product_1456475225.jpeg', '', '', '', '', 0, 3, ''),
(507, 1, 15, 47, 'Máy tiện MAZAK  860', 'product_1456475243.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475244, 0, 1, 'thumb_product_1456475243.jpeg', 'normal_product_1456475243.jpeg', '', '', '', '', 0, 3, ''),
(510, 2, 38, 38, 'Máy trộn Đài Loan lồng ngang nhỡ', 'product_1456475300.jpg', '', 1456475301, 0, 1, 'thumb_product_1456475300.jpeg', 'normal_product_1456475300.jpeg', '', '', '', '', 0, 3, ''),
(515, 1, 34, 34, 'Quạt Ống Nhật ', 'product_1456475413.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475414, 0, 1, 'thumb_product_1456475413.jpeg', 'normal_product_1456475413.jpeg', '', '', '', '', 0, 3, ''),
(518, 1, 34, 34, 'Quạt sên', 'product_1456475478.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475479, 0, 1, 'thumb_product_1456475478.jpeg', 'normal_product_1456475478.jpeg', '', '', '', '', 0, 3, ''),
(520, 1, 15, 47, 'Tiện Washino', 'product_1456475556.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475557, 0, 1, 'thumb_product_1456475556.jpeg', 'normal_product_1456475556.jpeg', '', '', '', '', 0, 3, ''),
(806, 2, 42, 42, 'Máy cưa xương', 'product_1499332216.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499332216, 0, 1, 'thumb_product_1499332216.jpeg', 'normal_product_1499332216.jpeg', '', '', '', '', 1, 3, ''),
(522, 2, 42, 42, 'Tủ sấy nướng bánh', 'product_1456475592.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nC&ocirc;ng dụng: sấy hoa quả, sấy nướng c&aacute;c loại b&aacute;nh,.....<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1456475594, 0, 1, 'thumb_product_1456475592.jpeg', 'normal_product_1456475592.jpeg', '', '', '', '', 0, 3, ''),
(523, 2, 42, 42, 'Tủ sấy', 'product_1456475621.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nC&ocirc;ng dụng: Sấy hoa quả, sấy b&aacute;nh, sấy thực phẩm.....<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ<br />\r\n', 1456475623, 0, 1, 'thumb_product_1456475621.jpeg', 'normal_product_1456475621.jpeg', '', '', '', '', 0, 3, ''),
(524, 1, 35, 74, 'Biến áp đổi nguồn 380V-3F 200v', 'product_1460771503.jpg', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460771504, 0, 1, 'thumb_product_1460771503.jpeg', 'normal_product_1460771503.jpeg', '', '', '', '', 1, 3, ''),
(526, 1, 26, 60, 'Khoan cần TOA', 'product_1460774883.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460774884, 0, 1, 'thumb_product_1460774883.jpeg', 'normal_product_1460774883.jpeg', '', '', '', '', 1, 3, ''),
(531, 1, 24, 56, 'Máy hàn Mic NewK350 Pana Auto', 'product_1460774993.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460774994, 0, 1, 'thumb_product_1460774993.jpeg', 'normal_product_1460774993.jpeg', '', '', '', '', 1, 3, ''),
(532, 1, 32, 69, 'Máy nén khí 0,75kw MEJI', 'product_1460775013.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460775014, 0, 1, 'thumb_product_1460775013.jpeg', 'normal_product_1460775013.jpeg', '', '', '', '', 1, 3, ''),
(533, 1, 32, 69, 'Máy nén khí Hitachi 2,2kw', 'product_1460775037.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460775037, 0, 1, 'thumb_product_1460775037.jpeg', 'normal_product_1460775037.jpeg', '', '', '', '', 1, 3, ''),
(536, 1, 11, 45, 'Máy phay đứng DECKEL', 'product_1460775078.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460775079, 0, 1, 'thumb_product_1460775078.jpeg', 'normal_product_1460775078.jpeg', '', '', '', '', 1, 3, ''),
(542, 1, 34, 34, 'Quạt nhiệt ', 'product_1460775185.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460775186, 0, 1, 'thumb_product_1460775185.jpeg', 'normal_product_1460775185.jpeg', '', '', '', '', 1, 3, ''),
(543, 1, 34, 34, 'Quạt nhiệt', 'product_1460775199.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460775199, 0, 1, 'thumb_product_1460775199.jpeg', 'normal_product_1460775199.jpeg', '', '', '', '', 0, 3, ''),
(546, 1, 31, 31, 'Tời cáp bò 5T Hitachi', 'product_1460775252.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1460775252, 0, 1, 'thumb_product_1460775252.jpeg', 'normal_product_1460775252.jpeg', '', '', '', '', 1, 3, ''),
(549, 1, 17, 55, 'Máy cắt đột 5 chức năng SHARP', 'product_1464082701.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464082702, 0, 1, 'thumb_product_1464082701.jpeg', 'normal_product_1464082701.jpeg', '', '', '', '', 1, 3, ''),
(558, 1, 25, 25, 'Máy dập 2 cầu', 'product_1464082872.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464082873, 0, 1, 'thumb_product_1464082872.jpeg', 'normal_product_1464082872.jpeg', '', '', '', '', 1, 3, ''),
(559, 1, 25, 25, 'Máy dậpn2 cầu 10 tấn', 'product_1464082892.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464082893, 0, 1, 'thumb_product_1464082892.jpeg', 'normal_product_1464082892.jpeg', '', '', '', '', 1, 3, ''),
(844, 1, 32, 69, 'Máy nén khí Banzai 2,2kw', 'product_1507186180.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507184957, 0, 1, 'thumb_product_1507186180.jpeg', 'normal_product_1507186180.jpeg', '', '', '', '', 1, 3, ''),
(845, 1, 27, 65, 'Máy mài lưỡi bào', 'product_1507184974.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507184974, 0, 1, 'thumb_product_1507184974.jpeg', 'normal_product_1507184974.jpeg', '', '', '', '', 1, 3, ''),
(562, 1, 25, 25, 'MÁy dập 2 cầu ', 'product_1464082946.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464082947, 0, 1, 'thumb_product_1464082946.jpeg', 'normal_product_1464082946.jpeg', '', '', '', '', 1, 3, ''),
(846, 1, 27, 62, 'Máy mài 2 đá 590w có hút bụi', 'product_1507184996.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507184997, 0, 1, 'thumb_product_1507184996.jpeg', 'normal_product_1507184996.jpeg', '', '', '', '', 1, 3, ''),
(843, 2, 38, 38, 'Máy trộn Nhật bãi', 'product_1507185669.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1507184839, 0, 1, 'thumb_product_1507185669.jpeg', 'normal_product_1507185669.jpeg', 'product1_1555916215.JPG', '', '', '', 1, 3, ''),
(567, 1, 32, 69, 'Máy nén khí 3,7kw TOSHIBA', 'product_1464083051.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464083052, 0, 1, 'thumb_product_1464083051.jpeg', 'normal_product_1464083051.jpeg', '', '', '', '', 1, 3, ''),
(568, 1, 32, 69, 'Máy nén khí HITACHI', 'product_1464083069.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464083070, 0, 1, 'thumb_product_1464083069.jpeg', 'normal_product_1464083069.jpeg', '', '', '', '', 1, 3, ''),
(999, 1, 27, 62, 'Máy mài 2 đá YODOGAWA', 'product_1532073125.JPG', '', 1532073126, 0, 1, 'thumb_product_1532073125.jpeg', 'normal_product_1532073125.jpeg', '', '', '', '', 1, 3, ''),
(570, 1, 15, 47, 'Máy tiện HOWA STRONG CT860', 'product_1464083109.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464083110, 0, 1, 'thumb_product_1464083109.jpeg', 'normal_product_1464083109.jpeg', '', '', '', '', 1, 3, ''),
(571, 1, 15, 47, 'Máy tiện ISOBE', 'product_1464083125.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464083126, 0, 1, 'thumb_product_1464083125.jpeg', 'normal_product_1464083125.jpeg', '', '', '', '', 1, 3, ''),
(574, 1, 31, 31, 'Tời cáp bò ', 'product_1464083161.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464083162, 0, 1, 'thumb_product_1464083161.jpeg', 'normal_product_1464083161.jpeg', '', '', '', '', 0, 3, ''),
(580, 1, 16, 50, 'Máy ép 50 tấn', 'product_1464083510.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464083511, 0, 1, 'thumb_product_1464083510.jpeg', 'normal_product_1464083510.jpeg', '', '', '', '', 1, 3, ''),
(590, 2, 38, 38, 'Máy đánh trứng trộn bột to', 'product_1464146141.jpg', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ<br />\r\nD&ugrave;ng để đ&aacute;nh trứng, trộn bột l&agrave;m b&aacute;nh trong c&aacute;c nh&agrave; h&agrave;ng, cửa h&agrave;ng.....', 1464146142, 0, 1, 'thumb_product_1464146141.jpeg', 'normal_product_1464146141.jpeg', 'product1_1555916391.jpg', '', '', '', 0, 3, ''),
(594, 2, 41, 41, 'Máy xay giò Việt- Hung ', 'product_1556955574.jpg', 'C&ocirc;ng suất: 2,2kw; 3kw; 4,5kw; 5,5kw- Điện cơ Việt Nam -Hungari<br />\r\nĐiện &aacute;p: 220v, 380v<br />\r\nC&ocirc;ng suất: 5kg- 7g- 10kg/ mẻ<br />\r\nChất liệu: Inox<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại xưởng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464146173, 0, 1, 'thumb_product_1556955574.jpeg', 'normal_product_1556955574.jpeg', 'product1_1556955036.jpg', 'product2_1556955036.jpg', '', '', 0, 3, ''),
(595, 2, 41, 41, 'Máy xay giò An Phát', 'product_1556956124.jpg', 'C&ocirc;ng suất: 2,2kw- Điện cơ Anh Ph&aacute;t<br />\r\nĐiện &aacute;p: 220v<br />\r\nNăng suất: 2-3kg/ mẻ<br />\r\nChất liệu: th&eacute;p, inox<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại xưởng<br />\r\nC&ocirc;ng dụng: Xay gi&ograve;, chả....<br />\r\nGi&aacute; b&aacute;n : Li&ecirc;n hệ', 1464146189, 0, 1, 'thumb_product_1556956124.jpeg', 'normal_product_1556956124.jpeg', 'product1_1556956016.jpg', 'product2_1556956125.jpg', 'product3_1556956125.jpg', '', 0, 3, ''),
(596, 1, 26, 26, 'Máy khoan', 'product_1464149495.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464149496, 0, 1, 'thumb_product_1464149495.jpeg', 'normal_product_1464149495.jpeg', '', '', '', '', 0, 3, ''),
(597, 1, 25, 25, 'Máy dập', 'product_1464149999.jpg', '', 1464150000, 0, 1, 'thumb_product_1464149999.jpeg', 'normal_product_1464149999.jpeg', '', '', '', '', 0, 3, ''),
(598, 1, 35, 85, 'Xe thương binh', 'product_1464150022.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1464150023, 0, 1, 'thumb_product_1464150022.jpeg', 'normal_product_1464150022.jpeg', '', '', '', '', 0, 3, ''),
(601, 1, 35, 72, 'Động cơ 1,1kw ', 'product_1465272687.JPG', 'Xuất xứ: Nhật Bản<br />\r\nC&ocirc;ng suất : 1,1 kw<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465272688, 0, 1, 'thumb_product_1465272687.jpeg', 'normal_product_1465272687.jpeg', 'product1_1555725502.JPG', '', '', '', 0, 3, ''),
(604, 1, 34, 34, 'Quạt sên áp 1,5kw', 'product_1465272843.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465272844, 0, 1, 'thumb_product_1465272843.jpeg', 'normal_product_1465272843.jpeg', '', '', '', '', 1, 3, ''),
(606, 1, 15, 47, 'Máy tiện YAMAZAKI CT650 ', 'product_1465272905.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465272906, 0, 1, 'thumb_product_1465272905.jpeg', 'normal_product_1465272905.jpeg', '', '', '', '', 0, 3, ''),
(607, 1, 15, 47, 'Máy tiện YAMAZAKI CT650 ', 'product_1465272924.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465272925, 0, 1, 'thumb_product_1465272924.jpeg', 'normal_product_1465272924.jpeg', '', '', '', '', 1, 3, ''),
(608, 1, 15, 47, 'Máy tiện TUDA 620', 'product_1465272950.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465272951, 0, 1, 'thumb_product_1465272950.jpeg', 'normal_product_1465272950.jpeg', '', '', '', '', 1, 3, ''),
(610, 1, 15, 47, 'Máy tiện MAZAK CT880', 'product_1465272994.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465272994, 0, 1, 'thumb_product_1465272994.jpeg', 'normal_product_1465272994.jpeg', '', '', '', '', 0, 3, ''),
(612, 1, 35, 85, 'Máy tiện khỏa mặt', 'product_1465273043.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465273044, 0, 1, 'thumb_product_1465273043.jpeg', 'normal_product_1465273043.jpeg', '', '', '', '', 1, 3, ''),
(614, 1, 15, 47, 'Máy tiện HOWA CT650', 'product_1465273085.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465273086, 0, 1, 'thumb_product_1465273085.jpeg', 'normal_product_1465273085.jpeg', '', '', '', '', 1, 3, ''),
(624, 1, 16, 51, 'Máy ép JAM', 'product_1465273733.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465273734, 0, 1, 'thumb_product_1465273733.jpeg', 'normal_product_1465273733.jpeg', '', '', '', '', 1, 3, ''),
(628, 1, 18, 18, 'Máy chấn KOMATSU', 'product_1465273851.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465273852, 0, 1, 'thumb_product_1465273851.jpeg', 'normal_product_1465273851.jpeg', '', '', '', '', 0, 3, ''),
(633, 1, 26, 81, 'Khoan MIKUNI ', 'product_1465292499.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465292500, 0, 1, 'thumb_product_1465292499.jpeg', 'normal_product_1465292499.jpeg', '', '', '', '', 0, 3, ''),
(638, 1, 26, 86, 'Khoan KIRA ', 'product_1465292664.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465292665, 0, 1, 'thumb_product_1465292664.jpeg', 'normal_product_1465292664.jpeg', '', '', '', '', 1, 3, ''),
(644, 1, 34, 34, 'Quạt', 'product_1465637676.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1465637677, 0, 1, 'thumb_product_1465637676.jpeg', 'normal_product_1465637676.jpeg', '', '', '', '', 0, 3, '');
INSERT INTO `product` (`id_product`, `idroot`, `parentid`, `id_catpd`, `name`, `image`, `noi_dung`, `ngay_dang`, `thu_tu`, `active`, `small_image`, `normal_image`, `image1`, `image2`, `image3`, `image4`, `hot`, `id_user`, `selected`) VALUES
(645, 1, 30, 30, 'Pa lăng xích 1T KITO', 'product_1468290126.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1468290127, 0, 1, 'thumb_product_1468290126.jpeg', 'normal_product_1468290126.jpeg', '', '', '', '', 1, 3, ''),
(655, 1, 26, 60, 'Khoan cần YODOGAWA', 'product_1468290326.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1468290327, 0, 1, 'thumb_product_1468290326.jpeg', 'normal_product_1468290326.jpeg', '', '', '', '', 1, 3, ''),
(660, 1, 19, 19, 'Máy cưa AMADA CM400', 'product_1468290618.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1468290619, 6, 1, 'thumb_product_1468290618.jpeg', 'normal_product_1468290618.jpeg', '', '', '', '', 1, 3, ''),
(662, 1, 24, 56, 'Máy hàn que', 'product_1468290665.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1468290666, 0, 1, 'thumb_product_1468290665.jpeg', 'normal_product_1468290665.jpeg', '', '', '', '', 1, 3, ''),
(666, 2, 36, 36, 'Máy thái thịt', 'product_1468290809.JPG', '', 1468290810, 0, 1, 'thumb_product_1468290809.jpeg', 'normal_product_1468290809.jpeg', '', '', '', '', 1, 3, ''),
(667, 1, 15, 47, 'Máy tiện MAZAK', 'product_1468291278.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1468291279, 0, 1, 'thumb_product_1468291278.jpeg', 'normal_product_1468291278.jpeg', '', '', '', '', 1, 3, ''),
(670, 1, 31, 31, 'Tời cáp treo 5T Hitachi ', 'product_1468291341.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1468291341, 0, 1, 'thumb_product_1468291341.jpeg', 'normal_product_1468291341.jpeg', '', '', '', '', 1, 3, ''),
(673, 1, 26, 61, 'Khoan đứng KIRA p13', 'product_1476349697.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349698, 0, 1, 'thumb_product_1476349697.jpeg', 'normal_product_1476349697.jpeg', '', '', '', '', 0, 3, ''),
(676, 1, 17, 53, 'Máy cắt đĩa tự động ', 'product_1476349780.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349781, 0, 1, 'thumb_product_1476349780.jpeg', 'normal_product_1476349780.jpeg', '', '', '', '', 0, 3, ''),
(679, 1, 17, 53, 'Máy cắt sắt tự động', 'product_1476349855.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349856, 0, 1, 'thumb_product_1476349855.jpeg', 'normal_product_1476349855.jpeg', '', '', '', '', 1, 3, ''),
(680, 1, 17, 84, 'Máy cắt tôn AAA 1,2m (2)', 'product_1476349877.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349879, 0, 1, 'thumb_product_1476349877.jpeg', 'normal_product_1476349877.jpeg', '', '', '', '', 1, 3, ''),
(682, 1, 17, 84, 'Máy cắt tôn MMM 2,4m ', 'product_1476349933.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349934, 0, 1, 'thumb_product_1476349933.jpeg', 'normal_product_1476349933.jpeg', '', '', '', '', 0, 3, ''),
(684, 1, 16, 51, 'Máy ép bi', 'product_1476349977.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349978, 0, 1, 'thumb_product_1476349977.jpeg', 'normal_product_1476349977.jpeg', '', '', '', '', 0, 3, ''),
(685, 1, 24, 58, 'Máy hàn bấm OKIGIN (2)', 'product_1476349998.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476349999, 0, 1, 'thumb_product_1476349998.jpeg', 'normal_product_1476349998.jpeg', '', '', '', '', 1, 3, ''),
(688, 1, 27, 64, 'Máy mài mặt phẳng KURODA bàn từ 300x600', 'product_1476350099.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476350100, 0, 1, 'thumb_product_1476350099.jpeg', 'normal_product_1476350099.jpeg', '', '', '', '', 0, 3, ''),
(689, 1, 27, 64, 'Máy mài mặt phẳng NICCO 500x1000 ', 'product_1476350129.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476350130, 0, 1, 'thumb_product_1476350129.jpeg', 'normal_product_1476350129.jpeg', '', '', '', '', 1, 3, ''),
(695, 1, 15, 47, 'Máy tiện TAKISAWA CT 860', 'product_1476350345.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476350345, 0, 1, 'thumb_product_1476350345.jpeg', 'normal_product_1476350345.jpeg', '', '', '', '', 0, 3, ''),
(699, 1, 15, 47, 'Máy tiện YAMAZAKI', 'product_1476520591.JPG', '&nbsp;Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476520592, 0, 1, 'thumb_product_1476520591.jpeg', 'normal_product_1476520591.jpeg', '', '', '', '', 1, 3, ''),
(700, 1, 15, 15, 'Máy tiện cam DAIWA', 'product_1476520607.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476520608, 0, 1, 'thumb_product_1476520607.jpeg', 'normal_product_1476520607.jpeg', '', '', '', '', 1, 3, ''),
(703, 1, 27, 67, 'Máy mài tròn', 'product_1476520818.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1476520820, 0, 1, 'thumb_product_1476520818.jpeg', 'normal_product_1476520818.jpeg', '', '', '', '', 1, 3, ''),
(715, 1, 33, 33, 'Ê tô thủy lực', 'product_1481965695.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481965696, 0, 1, 'thumb_product_1481965695.jpeg', 'normal_product_1481965695.jpeg', '', '', '', '', 1, 3, ''),
(717, 1, 33, 33, 'Ê tô', 'product_1481965732.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481965733, 0, 1, 'thumb_product_1481965732.jpeg', 'normal_product_1481965732.jpeg', '', '', '', '', 1, 3, ''),
(718, 1, 26, 61, 'Khoan đứng', 'product_1481965762.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481965762, 0, 1, 'thumb_product_1481965762.jpeg', 'normal_product_1481965762.jpeg', '', '', '', '', 1, 3, ''),
(720, 1, 17, 55, 'Máy cắt đột 3 chức năng AMADA', 'product_1481965868.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481965869, 0, 1, 'thumb_product_1481965868.jpeg', 'normal_product_1481965868.jpeg', '', '', '', '', 1, 3, ''),
(721, 1, 17, 55, 'Máy cắt đột 5 chức năng', 'product_1481965930.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481965931, 0, 1, 'thumb_product_1481965930.jpeg', 'normal_product_1481965930.jpeg', '', '', '', '', 1, 3, ''),
(722, 1, 17, 17, 'Máy cắt đột 30T AMADA', 'product_1481965959.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481965959, 0, 1, 'thumb_product_1481965959.jpeg', 'normal_product_1481965959.jpeg', '', '', '', '', 1, 3, ''),
(724, 1, 17, 84, 'Máy cắt tôn AAA', 'product_1481966022.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481966022, 0, 1, 'thumb_product_1481966022.jpeg', 'normal_product_1481966022.jpeg', '', '', '', '', 1, 3, ''),
(726, 1, 19, 19, 'Máy cưa AMADA H400', 'product_1481966080.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481966081, 5, 1, 'thumb_product_1481966080.jpeg', 'normal_product_1481966080.jpeg', '', '', '', '', 1, 3, ''),
(729, 1, 35, 85, 'Máy đánh sàn CIMEX', 'product_1481966199.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481966200, 0, 1, 'thumb_product_1481966199.jpeg', 'normal_product_1481966199.jpeg', '', '', '', '', 0, 3, ''),
(732, 1, 26, 26, 'Máy khoan', 'product_1481966353.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481966353, 0, 1, 'thumb_product_1481966353.jpeg', 'normal_product_1481966353.jpeg', '', '', '', '', 0, 3, ''),
(733, 1, 27, 62, 'Máy mài 2 đá', 'product_1481966415.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481966415, 0, 1, 'thumb_product_1481966415.jpeg', 'normal_product_1481966415.jpeg', '', '', '', '', 0, 3, ''),
(736, 1, 26, 82, 'Máy zen côn li hợp Kira', 'product_1481966502.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481966503, 0, 1, 'thumb_product_1481966502.jpeg', 'normal_product_1481966502.jpeg', '', '', '', '', 0, 3, ''),
(739, 1, 26, 82, 'Máy ren ĐL côn li hợp', 'product_1481967237.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481967238, 0, 1, 'thumb_product_1481967237.jpeg', 'normal_product_1481967237.jpeg', '', '', '', '', 1, 3, ''),
(740, 1, 35, 85, 'Máy vắt', 'product_1481967264.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1481967264, 0, 1, 'thumb_product_1481967264.jpeg', 'normal_product_1481967264.jpeg', '', '', '', '', 0, 3, ''),
(746, 1, 32, 70, 'Máy nén khí cách âm Toshiba 11kw', 'product_1482219225.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482219226, 0, 1, 'thumb_product_1482219225.jpeg', 'normal_product_1482219225.jpeg', '', '', '', '', 1, 3, ''),
(747, 1, 27, 64, 'Máy mài mặt phẳng OKUMOTO 200x500', 'product_1482219258.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nB&agrave;n từ 200mm x 500mm<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482219266, 0, 1, 'thumb_product_1482219258.jpeg', 'normal_product_1482219258.jpeg', '', '', '', '', 1, 3, ''),
(748, 1, 26, 83, 'Máy khoan nhiều mũi FUji Seiki', 'product_1482219289.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482219290, 0, 1, 'thumb_product_1482219289.jpeg', 'normal_product_1482219289.jpeg', '', '', '', '', 1, 3, ''),
(824, 1, 15, 47, 'Máy tiện mini', 'product_1499394544.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499394544, 0, 1, 'thumb_product_1499394544.jpeg', 'normal_product_1499394544.jpeg', '', '', '', '', 1, 3, ''),
(754, 1, 32, 70, 'Máy  nén khí cách âm 7,5kw Toshiba', 'product_1482219752.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482219753, 0, 1, 'thumb_product_1482219752.jpeg', 'normal_product_1482219752.jpeg', '', '', '', '', 1, 3, ''),
(756, 2, 42, 42, 'Máy băm salat Nhât', 'product_1482219829.JPG', '<font color="#000000" face="Roboto, -apple-system, BlinkMacSystemFont, Helvetica Neue, Helvetica, sans-serif"><span style="font-size: 14px;">Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ</span></font>', 1482219830, 0, 1, 'thumb_product_1482219829.jpeg', 'normal_product_1482219829.jpeg', '', '', '', '', 1, 3, ''),
(757, 2, 38, 38, 'Máy trộn lồng ngang to', 'product_1482221825.JPG', '', 1482221826, 0, 1, 'thumb_product_1482221825.jpeg', 'normal_product_1482221825.jpeg', '', '', '', '', 1, 3, ''),
(758, 1, 15, 47, 'Máy tiện MORISEIKI', 'product_1482221874.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482221874, 0, 1, 'thumb_product_1482221874.jpeg', 'normal_product_1482221874.jpeg', '', '', '', '', 1, 3, ''),
(760, 1, 27, 64, 'Máy mài mặt phẳng OKAMOTO 400x800', 'product_1482221913.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nB&agrave;n từ: 400mm x 800mm<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482221914, 0, 1, 'thumb_product_1482221913.jpeg', 'normal_product_1482221913.jpeg', '', '', '', '', 1, 3, ''),
(761, 1, 35, 85, 'Máy khỏa mặt khoan tâm', 'product_1482221933.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482221934, 0, 1, 'thumb_product_1482221933.jpeg', 'normal_product_1482221933.jpeg', '', '', '', '', 0, 3, ''),
(762, 1, 16, 51, 'Máy ép MATEX', 'product_1482222123.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482222123, 0, 1, 'thumb_product_1482222123.jpeg', 'normal_product_1482222123.jpeg', '', '', '', '', 1, 3, ''),
(767, 2, 39, 39, 'Cối xay thịt p49', 'product_1482222638.JPG', 'C&ocirc;ng suất: động cơ giảm tốc 7,5kw<br />\r\nĐiện &aacute;p : 380v<br />\r\nChất liệu: Cối bằng gang; ch&acirc;n cối,bản m&atilde; cối bằng inox hoặc th&eacute;p t&ugrave;y theo y&ecirc;u cầu người sử dụng<br />\r\nXuất xứ: Gia c&ocirc;ng sản xuất tại xưởng<br />\r\nC&ocirc;ng dụng: xay thịt, mỡ b&ograve;, mỡ lợn...<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1482222638, 0, 1, 'thumb_product_1482222638.jpeg', 'normal_product_1482222638.jpeg', '', '', '', '', 1, 3, ''),
(771, 1, 35, 85, 'Máy làm đinh vít ', 'product_1488783242.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488783243, 0, 1, 'thumb_product_1488783242.jpeg', 'normal_product_1488783242.jpeg', 'product1_1555578436.JPG', '', '', '', 1, 3, ''),
(776, 1, 35, 35, 'Máy khỏa mặt khoan tâm', 'product_1488783811.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488783811, 0, 1, 'thumb_product_1488783811.jpeg', 'normal_product_1488783811.jpeg', '', '', '', '', 1, 3, ''),
(777, 1, 27, 63, 'Máy  mài lô giáp YODOGAWA', 'product_1488783831.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488783831, 0, 1, 'thumb_product_1488783831.jpeg', 'normal_product_1488783831.jpeg', '', '', '', '', 1, 3, ''),
(778, 1, 19, 19, 'Máy cưa AMADA tự động cấp phôi HA400', 'product_1488783855.jpg', '&nbsp;Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488783855, 4, 1, 'thumb_product_1488783855.jpeg', 'normal_product_1488783855.jpeg', '', '', '', '', 1, 3, ''),
(780, 1, 34, 34, 'Quạt sên áp', 'product_1488875977.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488875977, 0, 1, 'thumb_product_1488875977.jpeg', 'normal_product_1488875977.jpeg', '', '', '', '', 1, 3, ''),
(781, 2, 36, 36, 'Máy thái thịt tự động', 'product_1488876235.jpg', '', 1488876235, 0, 1, 'thumb_product_1488876235.jpeg', 'normal_product_1488876235.jpeg', '', '', '', '', 1, 3, ''),
(782, 1, 32, 69, 'Máy nén khí Hitachi', 'product_1488876270.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488876270, 0, 1, 'thumb_product_1488876270.jpeg', 'normal_product_1488876270.jpeg', '', '', '', '', 1, 3, ''),
(783, 1, 32, 70, 'Máy nén khí có sấy Hitachi', 'product_1488876303.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488876303, 0, 1, 'thumb_product_1488876303.jpeg', 'normal_product_1488876303.jpeg', '', '', '', '', 1, 3, ''),
(784, 1, 27, 64, 'Máy mài mặt phẳng NASAGE', 'product_1488876322.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488876322, 0, 1, 'thumb_product_1488876322.jpeg', 'normal_product_1488876322.jpeg', '', '', '', '', 1, 3, ''),
(791, 1, 30, 30, 'Chân chạy tời ', 'product_1488956417.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488956417, 0, 1, 'thumb_product_1488956417.jpeg', 'normal_product_1488956417.jpeg', '', '', '', '', 1, 3, ''),
(793, 1, 35, 74, 'Biến áp đổi nguồn 3F 200', 'product_1488956489.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1488956490, 0, 1, 'thumb_product_1488956489.jpeg', 'normal_product_1488956489.jpeg', '', '', '', '', 1, 3, ''),
(794, 1, 31, 31, 'Tời cáp bò', 'product_1491815268.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1491815047, 0, 1, 'thumb_product_1491815268.jpeg', 'normal_product_1491815268.jpeg', '', '', '', '', 1, 3, ''),
(797, 1, 15, 47, 'Máy tiện mini', 'product_1491815124.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1491815124, 0, 1, 'thumb_product_1491815124.jpeg', 'normal_product_1491815124.jpeg', '', '', '', '', 1, 3, ''),
(798, 1, 26, 82, 'Máy zen Hitap', 'product_1491815142.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1491815142, 0, 1, 'thumb_product_1491815142.jpeg', 'normal_product_1491815142.jpeg', '', '', '', '', 1, 3, ''),
(799, 1, 26, 61, 'Máy khoan đứng', 'product_1491815165.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1491815165, 0, 1, 'thumb_product_1491815165.jpeg', 'normal_product_1491815165.jpeg', '', '', '', '', 1, 3, ''),
(801, 2, 42, 42, 'Máy ép mía', 'product_1491815554.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nChất liệu: inox to&agrave;n bộ<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1491815555, 0, 1, 'thumb_product_1491815554.jpeg', 'normal_product_1491815554.jpeg', '', '', '', '', 1, 3, ''),
(807, 1, 25, 25, 'Dập tay', 'product_1499392366.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392366, 0, 1, 'thumb_product_1499392366.jpeg', 'normal_product_1499392366.jpeg', '', '', '', '', 1, 3, ''),
(808, 1, 26, 86, 'Máy khoan bàn', 'product_1499392381.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392381, 0, 1, 'thumb_product_1499392381.jpeg', 'normal_product_1499392381.jpeg', '', '', '', '', 0, 3, ''),
(809, 1, 20, 20, 'Máy xả tôn to', 'product_1499392444.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392445, 0, 1, 'thumb_product_1499392444.jpeg', 'normal_product_1499392444.jpeg', '', '', '', '', 1, 3, ''),
(810, 1, 35, 85, 'Máy sóc rung', 'product_1499392463.JPG', '&nbsp; Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392464, 0, 1, 'thumb_product_1499392463.jpeg', 'normal_product_1499392463.jpeg', '', '', '', '', 1, 3, ''),
(811, 1, 34, 34, 'Quạt ống đỏ', 'product_1499392484.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392484, 0, 1, 'thumb_product_1499392484.jpeg', 'normal_product_1499392484.jpeg', '', '', '', '', 0, 3, ''),
(813, 1, 29, 29, 'Máy cắt đột 5 chức năng có chép hình', 'product_1499392562.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392562, 0, 1, 'thumb_product_1499392562.jpeg', 'normal_product_1499392562.jpeg', '', '', '', '', 1, 3, ''),
(814, 1, 33, 33, 'Mâm cặp', 'product_1499392579.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392579, 0, 1, 'thumb_product_1499392579.jpeg', 'normal_product_1499392579.jpeg', '', '', '', '', 1, 3, ''),
(816, 1, 11, 11, 'Máy phay Nigata 3UM', 'product_1499392624.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392625, 0, 1, 'thumb_product_1499392624.jpeg', 'normal_product_1499392624.jpeg', '', '', '', '', 1, 3, ''),
(818, 1, 29, 29, 'Máy đột mini', 'product_1499392772.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392772, 0, 1, 'thumb_product_1499392772.jpeg', 'normal_product_1499392772.jpeg', '', '', '', '', 1, 3, ''),
(819, 1, 29, 29, 'Máy đột mini', 'product_1499392796.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392796, 0, 1, 'thumb_product_1499392796.jpeg', 'normal_product_1499392796.jpeg', '', '', '', '', 1, 3, ''),
(820, 1, 32, 69, 'Máy nén khí', 'product_1499392817.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392818, 0, 1, 'thumb_product_1499392817.jpeg', 'normal_product_1499392817.jpeg', '', '', '', '', 1, 3, ''),
(821, 1, 16, 16, 'Máy ép', 'product_1499392847.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392847, 0, 1, 'thumb_product_1499392847.jpeg', 'normal_product_1499392847.jpeg', '', '', '', '', 1, 3, ''),
(822, 1, 16, 50, 'Máy ép 100T NIGSEI', 'product_1499392913.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392913, 0, 1, 'thumb_product_1499392913.jpeg', 'normal_product_1499392913.jpeg', '', '', '', '', 1, 3, ''),
(823, 1, 29, 29, 'Máy đột dập', 'product_1499392929.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1499392929, 0, 1, 'thumb_product_1499392929.jpeg', 'normal_product_1499392929.jpeg', '', '', '', '', 1, 3, ''),
(825, 2, 41, 41, 'Máy  xay giò xay thịt ', 'product_1499394654.JPG', 'M&aacute;y xay gi&ograve; xay thịt được gia c&ocirc;ng tại xưởng của c&ocirc;ng ty, đảm bảo về chất lượng v&agrave; thời gian bảo h&agrave;nh<br />\r\nM&aacute;y dễ d&agrave;ng sử dụng v&agrave; vệ sinh<br />\r\n<br />\r\n', 1499394655, 0, 1, 'thumb_product_1499394654.jpeg', 'normal_product_1499394654.jpeg', '', '', '', '', 1, 3, ''),
(828, 2, 39, 39, 'Cối xay thịt ', 'product_1499394716.JPG', '', 1499394716, 0, 1, 'thumb_product_1499394716.jpeg', 'normal_product_1499394716.jpeg', '', '', '', '', 0, 3, ''),
(829, 2, 39, 39, 'Máy xay 550', 'product_1499394736.JPG', '<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;M&aacute;y xay 550</strong><br />\r\n<br />\r\nC&ocirc;ng suất: 370w- m&ocirc; tơ&nbsp; Nhật b&atilde;i<br />\r\nĐiện &aacute;p: 220v<br />\r\nNăng suất: 200-330g/mẻ<br />\r\nThời gian xay: 2-3 ph&uacute;t/ mẻ<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại xưởng<br />\r\nPhụ kiện: dao xay, dao đ&aacute;nh ruốc<br />\r\nC&ocirc;ng dụng: xay thịt, xay mọc, xay gừng, xả....<br />\r\nBảo h&agrave;nh: 03 th&aacute;ng<br />\r\n', 1499394737, 0, 1, 'thumb_product_1499394736.jpeg', 'normal_product_1499394736.jpeg', 'product1_1555919800.JPG', 'product2_1555919801.JPG', 'product3_1555919801.JPG', '', 1, 3, ''),
(830, 2, 42, 42, 'Máy thái bì quay tay', 'product_1499394908.JPG', '<span font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 600; color: rgb(97, 97, 97); font-family: " word-spacing:="">M&aacute;y th&aacute;i b&igrave; quay tay</span><br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<span font-size:="" open="" style="color: rgb(97, 97, 97); font-family: " word-spacing:="">Xuất xứ: Việt Nam</span><br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<span font-size:="" open="" style="color: rgb(97, 97, 97); font-family: " word-spacing:="">Năng suất: 30-40kg/h</span><br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<span font-size:="" open="" style="color: rgb(97, 97, 97); font-family: " word-spacing:="">Dao cắt: 2 quả l&ocirc; bằng th&eacute;p</span><br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<span font-size:="" open="" style="color: rgb(97, 97, 97); font-family: " word-spacing:="">Độ d&agrave;y cắt sợi: 1mm</span><br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<span font-size:="" open="" style="color: rgb(97, 97, 97); font-family: " word-spacing:="">Khung m&aacute;y: Sắt</span><br font-size:="" open="" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(97, 97, 97); font-family: " word-spacing:="" />\r\n<span font-size:="" open="" style="color: rgb(97, 97, 97); font-family: " word-spacing:="">C&ocirc;ng dụng: th&aacute;i b&igrave; lợn th&agrave;nh sợi nhỏ đều như sợi b&uacute;n miến để l&agrave;m th&agrave;nh m&oacute;n nem th&iacute;nh<br />\r\nM&aacute;y rất bền, dễ d&agrave;ng vệ sinh sau khi sử dụng, ph&ugrave; hợp d&ugrave;ng cho gia đ&igrave;nh v&agrave; c&aacute;c cửa h&agrave;ng kinh doanh nhỏ</span>', 1499394909, 0, 1, 'thumb_product_1499394908.jpeg', 'normal_product_1499394908.jpeg', '', '', '', '', 0, 3, ''),
(831, 2, 42, 42, 'Máy thái bì điện lô 18', 'product_1499394929.JPG', 'Xuất xứ: Việt nam<br />\r\nCh&acirc;t lượng: H&agrave;ng mới 100%<br />\r\nD&ugrave;ng để th&aacute;i b&igrave; lợn th&agrave;nh c&aacute;c sợi nhỏ đều như sợi miến l&agrave;m m&oacute;n nem th&iacute;nh<br />\r\n', 1499394929, 0, 1, 'thumb_product_1499394929.jpeg', 'normal_product_1499394929.jpeg', '', '', '', '', 1, 3, ''),
(834, 2, 42, 42, 'Máy thái củ quả to chỉnh được dao', 'product_1499395005.JPG', '', 1499395005, 0, 1, 'thumb_product_1499395005.jpeg', 'normal_product_1499395005.jpeg', '', '', '', '', 1, 3, ''),
(835, 2, 38, 38, 'Máy đảo trộn thực phẩm Nhật', 'product_1505096934.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1505096935, 0, 1, 'thumb_product_1505096934.jpeg', 'normal_product_1505096934.jpeg', '', '', '', '', 1, 3, ''),
(836, 1, 19, 19, 'Máy cưa tự động AMADA HA250', 'product_1505096971.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1505096971, 3, 1, 'thumb_product_1505096971.jpeg', 'normal_product_1505096971.jpeg', '', '', '', '', 1, 3, ''),
(859, 1, 30, 30, 'Pa lăng 2,5 tấn KITO', 'product_1509158278.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1509158278, 0, 1, 'thumb_product_1509158278.jpeg', 'normal_product_1509158278.jpeg', '', '', '', '', 1, 3, ''),
(861, 1, 35, 85, 'Xe thương binh', 'product_1510735957.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1510735958, 0, 1, 'thumb_product_1510735957.jpeg', 'normal_product_1510735957.jpeg', '', '', '', '', 1, 3, ''),
(885, 1, 35, 85, 'Máy rung từ trường', 'product_1513070303.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513070305, 0, 1, 'thumb_product_1513070303.jpeg', 'normal_product_1513070303.jpeg', '', '', '', '', 1, 3, ''),
(864, 1, 30, 30, 'Pa lăng xích 1 tấn đủ bộ', 'product_1510736097.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1510736098, 0, 1, 'thumb_product_1510736097.jpeg', 'normal_product_1510736097.jpeg', '', '', '', '', 1, 3, ''),
(865, 2, 38, 38, 'Máy trộn đứng loại nhỏ', 'product_1510736117.JPG', '', 1510736118, 0, 1, 'thumb_product_1510736117.jpeg', 'normal_product_1510736117.jpeg', 'product1_1555915943.JPG', '', '', '', 1, 3, ''),
(866, 1, 32, 70, 'Máy nén khí cách âm có sấy 3,7kw', 'product_1510736168.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1510736168, 0, 1, 'thumb_product_1510736168.jpeg', 'normal_product_1510736168.jpeg', '', '', '', '', 1, 3, ''),
(870, 1, 29, 29, 'Máy đột li hợp hơi AMADA 45 tấn', 'product_1510736252.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1510736253, 0, 1, 'thumb_product_1510736252.jpeg', 'normal_product_1510736252.jpeg', '', '', '', '', 1, 3, ''),
(876, 1, 80, 80, 'Máy bơm rửa xe', 'product_1510736637.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1510736495, 4, 1, 'thumb_product_1510736637.jpeg', 'normal_product_1510736637.jpeg', '', '', '', '', 1, 3, ''),
(873, 1, 28, 28, 'Máy chuốt răng TAIYA', 'product_1510736292.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1510736292, 0, 1, 'thumb_product_1510736292.jpeg', 'normal_product_1510736292.jpeg', '', '', '', '', 1, 3, ''),
(878, 1, 33, 33, 'Ê  tô', 'product_1511513727.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1511513657, 0, 1, 'thumb_product_1511513727.jpeg', 'normal_product_1511513727.jpeg', '', '', '', '', 1, 3, ''),
(879, 1, 34, 34, 'Quạt ống vuông', 'product_1513069161.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513069162, 0, 1, 'thumb_product_1513069161.jpeg', 'normal_product_1513069161.jpeg', '', '', '', '', 0, 3, ''),
(881, 1, 25, 25, 'Dập 1 cầu 12 tấn', 'product_1513069192.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513069192, 0, 1, 'thumb_product_1513069192.jpeg', 'normal_product_1513069192.jpeg', '', '', '', '', 1, 3, ''),
(884, 1, 26, 60, 'Khoan cần SEIWA', 'product_1513069224.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513069225, 0, 1, 'thumb_product_1513069224.jpeg', 'normal_product_1513069224.jpeg', '', '', '', '', 1, 3, ''),
(888, 1, 26, 60, 'Khoan cần Toa', 'product_1513568315_2.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513568316, 0, 1, 'thumb_product_1513568315_2.jpeg', 'normal_product_1513568315_2.jpeg', '', '', '', '', 1, 3, ''),
(889, 1, 25, 25, 'Máy dập 100 Tấn', 'product_1513568348.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513568349, 0, 1, 'thumb_product_1513568348.jpeg', 'normal_product_1513568348.jpeg', '', '', '', '', 1, 3, ''),
(892, 2, 40, 40, 'Máy phá thịt đông lạnh  tự động Nhật ', 'product_1513568398.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513568398, 0, 1, 'thumb_product_1513568398.jpeg', 'normal_product_1513568398.jpeg', '', '', '', '', 1, 3, ''),
(895, 2, 40, 40, 'Máy phá thịt đông lạnh Nhật to', 'product_1513568423.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1513568424, 0, 1, 'thumb_product_1513568423.jpeg', 'normal_product_1513568423.jpeg', '', '', '', '', 1, 3, ''),
(896, 1, 15, 47, 'Máy tiện TAKISAWA', 'product_1516073552.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516073200, 0, 1, 'thumb_product_1516073552.jpeg', 'normal_product_1516073552.jpeg', '', '', '', '', 1, 3, ''),
(901, 1, 35, 75, 'Xe nâng tay 500kg', 'product_1516256576.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256577, 0, 1, 'thumb_product_1516256576.jpeg', 'normal_product_1516256576.jpeg', '', '', '', '', 1, 3, ''),
(902, 1, 31, 31, 'Tời cáp 2,8 tấn', 'product_1516256594.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256595, 0, 1, 'thumb_product_1516256594.jpeg', 'normal_product_1516256594.jpeg', '', '', '', '', 1, 3, ''),
(903, 1, 34, 34, 'Quạt sên áp', 'product_1516256618.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256618, 0, 1, 'thumb_product_1516256618.jpeg', 'normal_product_1516256618.jpeg', '', '', '', '', 1, 3, ''),
(904, 1, 30, 30, 'Pa lăng xích Kito 1.5 tấn', 'product_1516256658.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256659, 0, 1, 'thumb_product_1516256658.jpeg', 'normal_product_1516256658.jpeg', '', '', '', '', 1, 3, ''),
(905, 1, 31, 31, 'Pa lăng cáp 240kg', 'product_1516256728.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256728, 0, 1, 'thumb_product_1516256728.jpeg', 'normal_product_1516256728.jpeg', '', '', '', '', 1, 3, ''),
(907, 1, 20, 20, 'Máy xả tôn to 4 Tấn', 'product_1516256745.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256746, 0, 1, 'thumb_product_1516256745.jpeg', 'normal_product_1516256745.jpeg', '', '', '', '', 1, 3, ''),
(909, 1, 27, 68, 'Máy mài vô tâm', 'product_1516259040.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256868, 0, 1, 'thumb_product_1516259040.jpeg', 'normal_product_1516259040.jpeg', '', '', '', '', 1, 3, ''),
(910, 1, 17, 53, 'Máy dập Jam', 'product_1516258988.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516256946, 0, 1, 'thumb_product_1516258988.jpeg', 'normal_product_1516258988.jpeg', '', '', '', '', 1, 3, ''),
(911, 1, 17, 53, 'Máy cắt đĩa thủy lực tự động', 'product_1516258946.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516257026, 0, 1, 'thumb_product_1516258946.jpeg', 'normal_product_1516258946.jpeg', '', '', '', '', 1, 3, ''),
(912, 1, 26, 83, 'Khoan nhiều đầu', 'product_1516257047.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516257048, 0, 1, 'thumb_product_1516257047.jpeg', 'normal_product_1516257047.jpeg', '', '', '', '', 1, 3, ''),
(913, 1, 26, 61, 'Khoan đứng KIWA', 'product_1516257174.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1516257175, 0, 1, 'thumb_product_1516257174.jpeg', 'normal_product_1516257174.jpeg', '', '', '', '', 1, 3, ''),
(914, 2, 42, 42, 'Máy cưa xương', 'product_1516258867.jpg', '', 1516257228, 0, 1, 'thumb_product_1516258867.jpeg', 'normal_product_1516258867.jpeg', '', '', '', '', 1, 3, ''),
(917, 1, 35, 85, 'Bồn nước inox to', 'product_1517452460.jpg', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1517452329, 0, 1, 'thumb_product_1517452460.jpeg', 'normal_product_1517452460.jpeg', '', '', '', '', 1, 3, ''),
(919, 1, 30, 30, 'Pa lăng xích đẹp', 'product_1519527843.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519527844, 0, 1, 'thumb_product_1519527843.jpeg', 'normal_product_1519527843.jpeg', '', '', '', '', 1, 3, ''),
(920, 1, 15, 47, 'Máy tiện lục giác', 'product_1519527875.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519527876, 0, 1, 'thumb_product_1519527875.jpeg', 'normal_product_1519527875.jpeg', '', '', '', '', 1, 3, ''),
(928, 1, 29, 29, 'Máy ép đột AMADA 35 T', 'product_1519528169.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519528169, 0, 1, 'thumb_product_1519528169.jpeg', 'normal_product_1519528169.jpeg', '', '', '', '', 1, 3, ''),
(929, 1, 25, 25, 'MÁy dập MATEX 8 tấn', 'product_1519528198.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519528199, 0, 1, 'thumb_product_1519528198.jpeg', 'normal_product_1519528198.jpeg', '', '', '', '', 1, 3, ''),
(930, 1, 17, 84, 'Máy cắt tôn AAA 6,5ly x 1270', 'product_1519528439.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519528439, 0, 1, 'thumb_product_1519528439.jpeg', 'normal_product_1519528439.jpeg', '', '', '', '', 1, 3, ''),
(934, 1, 35, 85, 'Máy bắn cát (2)', 'product_1519528541.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519528542, 0, 1, 'thumb_product_1519528541.jpeg', 'normal_product_1519528541.jpeg', '', '', '', '', 1, 3, ''),
(936, 1, 29, 29, 'Đột điện mini (2)', 'product_1519528614.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1519528615, 0, 1, 'thumb_product_1519528614.jpeg', 'normal_product_1519528614.jpeg', '', '', '', '', 1, 3, ''),
(937, 1, 26, 60, 'Khoan cần OGAWA', 'product_1570076808.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1522642378, 0, 1, 'thumb_product_1570076808.jpeg', 'normal_product_1570076808.jpeg', 'product1_1570076810.jpg', 'product2_1570076810.jpg', 'product3_1570076810.jpg', '', 1, 3, ''),
(938, 1, 17, 84, 'Máy cắt tôn AMADA 3,5 x 1200', 'product_1522642394.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1522642395, 0, 1, 'thumb_product_1522642394.jpeg', 'normal_product_1522642394.jpeg', '', '', '', '', 1, 3, ''),
(939, 1, 25, 25, 'Máy dập 12 Tấn', 'product_1522642412.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1522642413, 0, 1, 'thumb_product_1522642412.jpeg', 'normal_product_1522642412.jpeg', '', '', '', '', 1, 3, ''),
(940, 1, 27, 67, 'Máy mài tròn MINAKUCHI CT 1,5m', 'product_1522642433.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1522642434, 0, 1, 'thumb_product_1522642433.jpeg', 'normal_product_1522642433.jpeg', '', '', '', '', 1, 3, ''),
(943, 1, 20, 20, 'Xả tôn AIDA to', 'product_1525838586.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838586, 0, 1, 'thumb_product_1525838586.jpeg', 'normal_product_1525838586.jpeg', '', '', '', '', 1, 3, ''),
(944, 1, 34, 34, 'Quạt tròn đen p1,2m', 'product_1525838610.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838610, 0, 1, 'thumb_product_1525838610.jpeg', 'normal_product_1525838610.jpeg', '', '', '', '', 1, 3, ''),
(946, 2, 38, 38, 'Máy trộn đứng loại to', 'product_1525838659.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838659, 0, 1, 'thumb_product_1525838659.jpeg', 'normal_product_1525838659.jpeg', '', '', '', '', 1, 3, ''),
(948, 1, 15, 49, 'Máy tiện senga (2)', 'product_1525838703.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838703, 0, 1, 'thumb_product_1525838703.jpeg', 'normal_product_1525838703.jpeg', '', '', '', '', 1, 3, ''),
(949, 1, 32, 69, 'Máy nén khí bình TOSCON 7,5kw', 'product_1525838722.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838723, 0, 1, 'thumb_product_1525838722.jpeg', 'normal_product_1525838722.jpeg', '', '', '', '', 1, 3, ''),
(950, 1, 21, 21, 'Máy nắn xả tôn AIDA', 'product_1525838739.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838739, 0, 1, 'thumb_product_1525838739.jpeg', 'normal_product_1525838739.jpeg', '', '', '', '', 1, 3, ''),
(951, 1, 27, 67, 'Máy mài OKKUMA', 'product_1525838758.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838758, 0, 1, 'thumb_product_1525838758.jpeg', 'normal_product_1525838758.jpeg', '', '', '', '', 1, 3, ''),
(952, 1, 27, 65, 'Máy mài mũi khoan', 'product_1525838779.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838779, 0, 1, 'thumb_product_1525838779.jpeg', 'normal_product_1525838779.jpeg', '', '', '', '', 1, 3, ''),
(953, 1, 27, 65, 'Máy mài dụng cụ', 'product_1525838796.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838796, 0, 1, 'thumb_product_1525838796.jpeg', 'normal_product_1525838796.jpeg', '', '', '', '', 1, 3, ''),
(954, 1, 27, 62, 'Máy mài 2 đá mới 170w', 'product_1525838816.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng mới<br />\r\nC&ocirc;ng suất: 170w<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525838816, 0, 1, 'thumb_product_1525838816.jpeg', 'normal_product_1525838816.jpeg', '', '', '', '', 1, 3, ''),
(955, 1, 27, 62, 'Máy mài 2 đá 270w mới', 'product_1525839018.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng mới<br />\r\nC&ocirc;ng suất: 270w<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525839018, 0, 1, 'thumb_product_1525839018.jpeg', 'normal_product_1525839018.jpeg', '', '', '', '', 1, 3, ''),
(957, 1, 16, 50, 'Máy ép thủy lực 10 tấn HUYN DAE', 'product_1525839050.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525839050, 0, 1, 'thumb_product_1525839050.jpeg', 'normal_product_1525839050.jpeg', '', '', '', '', 1, 3, ''),
(958, 1, 18, 18, 'Máy chấn tôn AMADA 50 tấn 1,2m x 5ly', 'product_1525839066.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525839066, 0, 1, 'thumb_product_1525839066.jpeg', 'normal_product_1525839066.jpeg', '', '', '', '', 1, 3, ''),
(960, 1, 17, 53, 'Máy cắt đĩa tự động', 'product_1525839109.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525839109, 0, 1, 'thumb_product_1525839109.jpeg', 'normal_product_1525839109.jpeg', '', '', '', '', 1, 3, ''),
(961, 1, 26, 81, 'Khoan KIRA  côn số 2', 'product_1525839125.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525839126, 0, 1, 'thumb_product_1525839125.jpeg', 'normal_product_1525839125.jpeg', '', '', '', '', 1, 3, ''),
(963, 1, 26, 60, 'Khoan cần TOA KIKAI', 'product_1525839407.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1525839407, 0, 1, 'thumb_product_1525839407.jpeg', 'normal_product_1525839407.jpeg', '', '', '', '', 1, 3, ''),
(964, 1, 25, 25, 'Đột dập 1 cầu 22 tấn', 'product_1528612312.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612313, 0, 1, 'thumb_product_1528612312.jpeg', 'normal_product_1528612312.jpeg', '', '', '', '', 1, 3, ''),
(965, 1, 35, 85, 'Xe thương binh', 'product_1528612331.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612331, 0, 1, 'thumb_product_1528612331.jpeg', 'normal_product_1528612331.jpeg', '', '', '', '', 1, 3, ''),
(970, 1, 15, 47, 'Máy tiện WASHINO CT550', 'product_1528612410.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612411, 0, 1, 'thumb_product_1528612410.jpeg', 'normal_product_1528612410.jpeg', '', '', '', '', 1, 3, ''),
(971, 1, 15, 49, 'Máy tiện rút', 'product_1528612428.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612429, 0, 1, 'thumb_product_1528612428.jpeg', 'normal_product_1528612428.jpeg', '', '', '', '', 1, 3, ''),
(972, 1, 22, 22, 'Máy sóc rung 1,2m', 'product_1528612448.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612448, 0, 1, 'thumb_product_1528612448.jpeg', 'normal_product_1528612448.jpeg', '', '', '', '', 1, 3, ''),
(973, 1, 27, 68, 'Máy mài vô tâm NISSEI', 'product_1528612465.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612465, 0, 1, 'thumb_product_1528612465.jpeg', 'normal_product_1528612465.jpeg', '', '', '', '', 1, 3, ''),
(974, 1, 18, 18, 'Máy chấn tôn 25 tấn TOYOKOKI', 'product_1528612490.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612490, 0, 1, 'thumb_product_1528612490.jpeg', 'normal_product_1528612490.jpeg', '', '', '', '', 1, 3, ''),
(975, 1, 18, 18, 'Máy chấn AMADA 60 Tấn', 'product_1528612509.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612509, 0, 1, 'thumb_product_1528612509.jpeg', 'normal_product_1528612509.jpeg', '', '', '', '', 1, 3, ''),
(978, 1, 26, 26, 'Khoan p13 ASHINA', 'product_1528612547.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612548, 0, 1, 'thumb_product_1528612547.jpeg', 'normal_product_1528612547.jpeg', '', '', '', '', 1, 3, ''),
(979, 1, 26, 83, 'Khoan nhiều đầu', 'product_1528612565.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612566, 0, 1, 'thumb_product_1528612565.jpeg', 'normal_product_1528612565.jpeg', '', '', '', '', 1, 3, ''),
(980, 1, 26, 61, 'Khoan đứng KIRA', 'product_1528612586.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1528612586, 0, 1, 'thumb_product_1528612586.jpeg', 'normal_product_1528612586.jpeg', '', '', '', '', 1, 3, ''),
(981, 1, 35, 75, 'Bàn nâng thủy lưc', 'product_1532055491.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532055492, 0, 1, 'thumb_product_1532055491.jpeg', 'normal_product_1532055491.jpeg', '', '', '', '', 1, 3, ''),
(982, 1, 29, 29, 'Đột AMADA 25 tấn ', 'product_1532055509.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532055510, 0, 1, 'thumb_product_1532055509.jpeg', 'normal_product_1532055509.jpeg', '', '', '', '', 1, 3, ''),
(983, 1, 25, 25, 'Đột dập 1 cầu 7 tấn NOGUCHI', 'product_1532055525.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532055525, 0, 1, 'thumb_product_1532055525.jpeg', 'normal_product_1532055525.jpeg', '', '', '', '', 1, 3, ''),
(984, 1, 25, 25, 'Đột dập 1 cầu 7 tấn', 'product_1532055542.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532055542, 0, 1, 'thumb_product_1532055542.jpeg', 'normal_product_1532055542.jpeg', '', '', '', '', 1, 3, ''),
(985, 1, 25, 25, 'Đột dập 1 cầu 15 tấn', 'product_1532055564.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532055565, 0, 1, 'thumb_product_1532055564.jpeg', 'normal_product_1532055564.jpeg', '', '', '', '', 1, 3, '');
INSERT INTO `product` (`id_product`, `idroot`, `parentid`, `id_catpd`, `name`, `image`, `noi_dung`, `ngay_dang`, `thu_tu`, `active`, `small_image`, `normal_image`, `image1`, `image2`, `image3`, `image4`, `hot`, `id_user`, `selected`) VALUES
(987, 1, 25, 25, 'Đột dập 1 cầu 30 tấn', 'product_1532056048.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056049, 0, 1, 'thumb_product_1532056048.jpeg', 'normal_product_1532056048.jpeg', '', '', '', '', 1, 3, ''),
(988, 1, 25, 25, 'Đột dập mới về', 'product_1532056115.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056115, 0, 1, 'thumb_product_1532056115.jpeg', 'normal_product_1532056115.jpeg', '', '', '', '', 1, 3, ''),
(990, 1, 26, 83, 'Máy khoan 2 đầu ', 'product_1532056199.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056199, 0, 1, 'thumb_product_1532056199.jpeg', 'normal_product_1532056199.jpeg', '', '', '', '', 1, 3, ''),
(992, 1, 32, 70, 'Máy nén khí cách âm 7,5kw', 'product_1532056252.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056252, 0, 1, 'thumb_product_1532056252.jpeg', 'normal_product_1532056252.jpeg', '', '', '', '', 1, 3, ''),
(993, 1, 15, 49, 'Máy tiện senga', 'product_1532056272.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056272, 0, 1, 'thumb_product_1532056272.jpeg', 'normal_product_1532056272.jpeg', '', '', '', '', 1, 3, ''),
(994, 1, 15, 49, 'Máy tiện senga', 'product_1532056294.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056294, 0, 1, 'thumb_product_1532056294.jpeg', 'normal_product_1532056294.jpeg', '', '', '', '', 1, 3, ''),
(995, 1, 15, 47, 'Máy tiện TAKISAWA CT860', 'product_1532056314.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056314, 0, 1, 'thumb_product_1532056314.jpeg', 'normal_product_1532056314.jpeg', '', '', '', '', 1, 3, ''),
(996, 1, 30, 30, 'pa lăng xích', 'product_1532056339.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1532056339, 0, 1, 'thumb_product_1532056339.jpeg', 'normal_product_1532056339.jpeg', '', '', '', '', 1, 3, ''),
(1002, 1, 17, 17, 'Máy cắt đĩa', 'product_1533691502.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1533691505, 0, 1, 'thumb_product_1533691502.jpeg', 'normal_product_1533691502.jpeg', '', '', '', '', 1, 3, ''),
(1008, 1, 25, 25, 'Dập 1 cầu 15 tấn', 'product_1535598236.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598236, 0, 1, 'thumb_product_1535598236.jpeg', 'normal_product_1535598236.jpeg', '', '', '', '', 1, 3, ''),
(1009, 1, 25, 25, 'Dập 1 cầu 25 tấn', 'product_1535598251.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598251, 0, 1, 'thumb_product_1535598251.jpeg', 'normal_product_1535598251.jpeg', '', '', '', '', 1, 3, ''),
(1010, 1, 25, 25, 'Dập mini 1 tấn ', 'product_1535598265.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598266, 0, 1, 'thumb_product_1535598265.jpeg', 'normal_product_1535598265.jpeg', '', '', '', '', 1, 3, ''),
(1012, 1, 26, 26, 'Khoan bàn YOSHIDA', 'product_1535598307.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598307, 0, 1, 'thumb_product_1535598307.jpeg', 'normal_product_1535598307.jpeg', '', '', '', '', 1, 3, ''),
(1014, 1, 26, 83, 'Khoan nhiều đầu', 'product_1535598343.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598344, 0, 1, 'thumb_product_1535598343.jpeg', 'normal_product_1535598343.jpeg', '', '', '', '', 1, 3, ''),
(1015, 1, 26, 26, 'Khoan p13 Ashina', 'product_1535598362.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598362, 0, 1, 'thumb_product_1535598362.jpeg', 'normal_product_1535598362.jpeg', '', '', '', '', 1, 3, ''),
(1016, 1, 26, 82, 'Khoan zen KIRA KTV1 p10', 'product_1535598378.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598378, 0, 1, 'thumb_product_1535598378.jpeg', 'normal_product_1535598378.jpeg', '', '', '', '', 1, 3, ''),
(1017, 1, 26, 82, 'Khoan zen KIRA KTV2 chùm 2 mũi', 'product_1535598398.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598398, 0, 1, 'thumb_product_1535598398.jpeg', 'normal_product_1535598398.jpeg', '', '', '', '', 1, 3, ''),
(1018, 1, 80, 80, 'Máy bơm rửa xe thùng', 'product_1535598419.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598419, 3, 1, 'thumb_product_1535598419.jpeg', 'normal_product_1535598419.jpeg', '', '', '', '', 1, 3, ''),
(1019, 1, 27, 66, 'Máy đánh bóng ', 'product_1535599972.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598438, 0, 1, 'thumb_product_1535599972.jpeg', 'normal_product_1535599972.jpeg', '', '', '', '', 1, 3, ''),
(1020, 1, 24, 58, 'Máy hàn bấm 10KVA', 'product_1535598462.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598462, 0, 1, 'thumb_product_1535598462.jpeg', 'normal_product_1535598462.jpeg', '', '', '', '', 1, 3, ''),
(1021, 1, 24, 56, 'Máy hàn que ', 'product_1535598568.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598569, 0, 1, 'thumb_product_1535598568.jpeg', 'normal_product_1535598568.jpeg', '', '', '', '', 1, 3, ''),
(1022, 1, 27, 63, 'Máy mài lô giáp có lọc hút bụi', 'product_1535598603.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598604, 0, 1, 'thumb_product_1535598603.jpeg', 'normal_product_1535598603.jpeg', '', '', '', '', 1, 3, ''),
(1023, 1, 27, 65, 'Máy mài lưỡi dao', 'product_1535598641.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598642, 0, 1, 'thumb_product_1535598641.jpeg', 'normal_product_1535598641.jpeg', '', '', '', '', 1, 3, ''),
(1025, 2, 42, 42, 'Máy thái củ quả  đầu nhôm', 'product_1535598682.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598683, 0, 1, 'thumb_product_1535598682.jpeg', 'normal_product_1535598682.jpeg', '', '', '', '', 1, 3, ''),
(1028, 1, 31, 31, 'Tời cáp', 'product_1535598740.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598740, 0, 1, 'thumb_product_1535598740.jpeg', 'normal_product_1535598740.jpeg', '', '', '', '', 1, 3, ''),
(1029, 1, 35, 85, 'Tủ lọc khí', 'product_1535598765.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598766, 0, 1, 'thumb_product_1535598765.jpeg', 'normal_product_1535598765.jpeg', '', '', '', '', 1, 3, ''),
(1030, 1, 35, 75, 'Xe nâng 500kg chạy ắc quy', 'product_1535598781.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598781, 0, 1, 'thumb_product_1535598781.jpeg', 'normal_product_1535598781.jpeg', '', '', '', '', 1, 3, ''),
(1031, 1, 35, 75, 'Xe nâng tay thủy lực', 'product_1535598798.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535598799, 0, 1, 'thumb_product_1535598798.jpeg', 'normal_product_1535598798.jpeg', '', '', '', '', 1, 3, ''),
(1033, 2, 39, 39, 'Cối p32 inox gióng mô tơ Việt Hung 2,2kw', 'product_1535685801.jpg', '<strong>Cối xay p32 inox 2,2kw</strong><br />\r\n<br />\r\nC&ocirc;ng suất: 2,2kw điện cơ Việt Nam- Hungari<br />\r\nĐiện &aacute;p: 220v<br />\r\nVật liệu : inox<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất tại xưởng c&ocirc;ng ty<br />\r\nBảo h&agrave;nh: Bảo h&agrave;nh m&ocirc; tơ 06 th&aacute;ng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1535685709, 0, 1, 'thumb_product_1535685801.jpeg', 'normal_product_1535685801.jpeg', '', '', '', '', 0, 3, ''),
(1035, 1, 27, 62, 'Máy mài 2 đá Hitachi', 'product_1539671858.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1539671858, 0, 1, 'thumb_product_1539671858.jpeg', 'normal_product_1539671858.jpeg', 'product1_1556185167.jpg', '', '', '', 1, 3, ''),
(1036, 1, 27, 66, 'Máy mài + đánh bóng', 'product_1539673364.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1539673364, 0, 1, 'thumb_product_1539673364.jpeg', 'normal_product_1539673364.jpeg', '', '', '', '', 1, 3, ''),
(1038, 1, 33, 33, 'Ê tô thủy lực', 'product_1539673416.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1539673416, 0, 1, 'thumb_product_1539673416.jpeg', 'normal_product_1539673416.jpeg', '', '', '', '', 1, 3, ''),
(1040, 1, 30, 30, 'Chân chạy 1 tấn ', 'product_1542338830.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1542338833, 0, 1, 'thumb_product_1542338830.jpeg', 'normal_product_1542338830.jpeg', '', '', '', '', 1, 3, ''),
(1047, 1, 16, 51, 'Máy ép Jam 5 tấn', 'product_1542358434.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1542358434, 0, 1, 'thumb_product_1542358434.jpeg', 'normal_product_1542358434.jpeg', '', '', '', '', 1, 3, ''),
(1051, 1, 35, 85, 'Máy tán HI SPin', 'product_1542361456.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1542361456, 0, 1, 'thumb_product_1542361456.jpeg', 'normal_product_1542361456.jpeg', '', '', '', '', 1, 3, ''),
(1053, 2, 42, 42, 'Máy vắt to', 'product_1542361553.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1542361554, 0, 1, 'thumb_product_1542361553.jpeg', 'normal_product_1542361553.jpeg', '', '', '', '', 1, 3, ''),
(1055, 1, 26, 83, 'Máy zen nhiều mũi TOYOSK', 'product_1542361763.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1542361764, 0, 1, 'thumb_product_1542361763.jpeg', 'normal_product_1542361763.jpeg', '', '', '', '', 1, 3, ''),
(1057, 0, 1, 30, 'Pa lăng xích', 'product_1542436519.JPG', '', 1542436519, 0, 1, 'thumb_product_1542436519.jpeg', 'normal_product_1542436519.jpeg', '', '', '', '', 0, 3, ''),
(1058, 1, 35, 75, 'Xe nâng 1,5 tấn Mitsu', 'product_1542436823.JPG', '', 1542436823, 0, 1, 'thumb_product_1542436823.jpeg', 'normal_product_1542436823.jpeg', '', '', '', '', 1, 3, ''),
(1061, 1, 26, 83, 'Máy zen nhiều mũi TOYOSK', 'product_1542437005.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1542437006, 0, 1, 'thumb_product_1542437005.jpeg', 'normal_product_1542437005.jpeg', '', '', '', '', 1, 3, ''),
(1062, 1, 15, 47, 'Máy tiện mâm 1000mm tâm 1250mm', 'product_1543822974.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1543822975, 0, 1, 'thumb_product_1543822974.jpeg', 'normal_product_1543822974.jpeg', '', '', '', '', 1, 3, ''),
(1063, 1, 26, 82, 'Zen bát côn ', 'product_1546048955.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546048956, 0, 1, 'thumb_product_1546048955.jpeg', 'normal_product_1546048955.jpeg', '', '', '', '', 1, 3, ''),
(1064, 1, 35, 85, 'Bình hơi 1m3', 'product_1546049214.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546048987, 0, 1, 'thumb_product_1546049214.jpeg', 'normal_product_1546049214.jpeg', '', '', '', '', 1, 3, ''),
(1065, 1, 35, 85, 'Bình hơi 0,59 m3', 'product_1546049202.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546049002, 0, 1, 'thumb_product_1546049202.jpeg', 'normal_product_1546049202.jpeg', '', '', '', '', 1, 3, ''),
(1066, 1, 29, 29, 'Đột Jam 5 tấn có bàn gá xoay', 'product_1546049184.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546049041, 0, 1, 'thumb_product_1546049184.jpeg', 'normal_product_1546049184.jpeg', 'product1_1555922081.JPG', 'product2_1555922081.JPG', 'product3_1555922081.JPG', '', 1, 3, ''),
(1067, 1, 35, 75, 'Xe nâng tay 350kg', 'product_1546049342.JPG', '', 1546049342, 0, 1, 'thumb_product_1546049342.jpeg', 'normal_product_1546049342.jpeg', '', '', '', '', 1, 3, ''),
(1071, 1, 35, 75, 'xe nâng sạc điện TOYOTA 700kg', 'product_1546049412.JPG', '', 1546049412, 0, 1, 'thumb_product_1546049412.jpeg', 'normal_product_1546049412.jpeg', '', '', '', '', 1, 3, ''),
(1072, 1, 35, 75, 'Xe nâng chạy điện 500g', 'product_1546049447.JPG', '', 1546049447, 0, 1, 'thumb_product_1546049447.jpeg', 'normal_product_1546049447.jpeg', '', '', '', '', 1, 3, ''),
(1073, 1, 35, 75, 'Xe nâng chạy ắc quy 1 Tấn', 'product_1546049467.JPG', '', 1546049467, 0, 1, 'thumb_product_1546049467.jpeg', 'normal_product_1546049467.jpeg', '', '', '', '', 1, 3, ''),
(1075, 1, 26, 82, 'Taro tự động Kira KT2', 'product_1546049519.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546049519, 0, 1, 'thumb_product_1546049519.jpeg', 'normal_product_1546049519.jpeg', '', '', '', '', 1, 3, ''),
(1077, 0, 1, 30, 'Pa lăng xích', 'product_1546049571.JPG', '', 1546049571, 0, 1, 'thumb_product_1546049571.jpeg', 'normal_product_1546049571.jpeg', '', '', '', '', 1, 3, ''),
(1078, 2, 37, 37, 'Máy xay sinh tố Nhật bãi 400w', 'product_1546049614.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nC&ocirc;ng suất: 400w<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ<br />\r\n', 1546049615, 0, 1, 'thumb_product_1546049614.jpeg', 'normal_product_1546049614.jpeg', 'product1_1555916053.JPG', '', '', '', 1, 3, ''),
(1079, 2, 38, 38, 'Máy trộn ruột gà inox', 'product_1546049646.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546049646, 0, 1, 'thumb_product_1546049646.jpeg', 'normal_product_1546049646.jpeg', 'product1_1555915538.JPG', '', '', '', 1, 3, ''),
(1080, 2, 38, 38, 'Máy trộn lồng ngang to', 'product_1546049718.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng; H&agrave;ng đ&atilde; qua sử dụng<br />\r\nChất liệu:&nbsp; Inox<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546049719, 0, 1, 'thumb_product_1546049718.jpeg', 'normal_product_1546049718.jpeg', '', '', '', '', 1, 3, ''),
(1081, 2, 38, 38, 'Máy trộn lồng ngang 400w ', 'product_1546050488.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nC&ocirc;ng suất: 400w<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546050488, 0, 1, 'thumb_product_1546050488.jpeg', 'normal_product_1546050488.jpeg', 'product1_1555915626.JPG', '', '', '', 1, 3, ''),
(1082, 1, 15, 48, 'Máy tiện thủy lực', 'product_1546050596.JPG', '&nbsp;Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546050596, 0, 1, 'thumb_product_1546050596.jpeg', 'normal_product_1546050596.jpeg', 'product1_1555924945.JPG', 'product2_1555924945.JPG', 'product3_1555924945.JPG', '', 1, 3, ''),
(1083, 1, 15, 48, 'Máy tiện lục giác ', 'product_1546063870.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546063870, 0, 1, 'thumb_product_1546063870.jpeg', 'normal_product_1546063870.jpeg', 'product1_1556003609.JPG', 'product2_1556003610.JPG', 'product3_1556003610.JPG', '', 1, 3, ''),
(1084, 1, 35, 85, 'Máy khỏa mặt khoan tâm', 'product_1546063932.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546063933, 0, 1, 'thumb_product_1546063932.jpeg', 'normal_product_1546063932.jpeg', '', '', '', '', 1, 3, ''),
(1085, 1, 18, 18, 'Máy chấn tôn 1,2m x 2,5ly AMADA', 'product_1546064687.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546064688, 0, 1, 'thumb_product_1546064687.jpeg', 'normal_product_1546064687.jpeg', 'product1_1556003855.JPG', 'product2_1556003855.JPG', 'product3_1556003903.JPG', '', 1, 3, ''),
(1086, 1, 33, 33, 'Mang ranh p13', 'product_1546064755.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1546064755, 0, 1, 'thumb_product_1546064755.jpeg', 'normal_product_1546064755.jpeg', '', '', '', '', 1, 3, ''),
(1137, 1, 11, 45, 'Máy phay đứng KASUGA có tủ XY', 'product_1555128385.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n : Li&ecirc;n hệ', 1555126386, 0, 1, 'thumb_product_1555128385.jpeg', '', 'product1_1555128385.JPG', 'product2_1555128385.JPG', '', '', 0, 3, ''),
(1141, 1, 20, 20, 'Máy xả tôn DAIEI', 'product_1555139355.jpg', 'Xuất xứ : Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555139355, 0, 1, 'thumb_product_1555139355.jpeg', '', 'product1_1555139355.jpg', 'product2_1555139355.jpg', '', '', 0, 3, ''),
(1142, 1, 35, 75, 'Xe nâng chạy ắc quy', 'product_1555139514.jpg', 'Xe n&acirc;ng chạy bằng ắc quy n&acirc;ng tối đa 1 tấn<br />\r\nXuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555139514, 0, 1, 'thumb_product_1555139514.jpeg', 'normal_product_1555139514.jpeg', 'product1_1555139514.jpg', 'product2_1555139677.jpg', '', '', 0, 3, ''),
(1140, 1, 35, 75, 'Xe nâng tay 200kg', 'product_1555137863.JPG', 'Xe n&acirc;ng bằng tay 200kg xuất xứ từ Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555137864, 0, 1, 'thumb_product_1555137863.jpeg', 'normal_product_1555137863.jpeg', 'product1_1555137864.JPG', 'product2_1555137864.JPG', '', '', 0, 3, ''),
(1145, 1, 31, 31, 'Tời cáp 2,8 tấn', 'product_1555312493.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555312493, 0, 1, 'thumb_product_1555312493.jpeg', 'normal_product_1555312493.jpeg', 'product1_1555312493.JPG', 'product2_1555312493.JPG', '', '', 0, 3, ''),
(1144, 1, 25, 25, 'Máy dập 1 cầu mini 3 tấn', 'product_1555312278.JPG', 'Đột dập 1 cầu 3 tấn c&ocirc;ng suất 200W<br />\r\nXuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555312135, 0, 1, 'thumb_product_1555312278.jpeg', 'normal_product_1555312278.jpeg', 'product1_1555312135.JPG', 'product2_1555312135.JPG', '', '', 0, 3, ''),
(1146, 1, 20, 20, 'Máy xả tôn', 'product_1555312647.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555312648, 0, 1, 'thumb_product_1555312647.jpeg', 'normal_product_1555312647.jpeg', 'product1_1555312647.JPG', 'product2_1555312648.JPG', 'product3_1555312648.JPG', '', 0, 3, ''),
(1147, 1, 15, 47, 'Máy tiện WASHINO LEO', 'product_1555320950.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555320952, 0, 1, 'thumb_product_1555320950.jpeg', 'normal_product_1555320950.jpeg', 'product1_1555320952.JPG', 'product2_1555320952.JPG', '', '', 0, 3, ''),
(1150, 1, 11, 45, 'Máy phay đứng MAKINO', 'product_1555321194.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555321195, 0, 1, 'thumb_product_1555321194.jpeg', 'normal_product_1555321194.jpeg', 'product1_1555321194.JPG', 'product2_1555321194.JPG', '', '', 0, 3, ''),
(1149, 1, 27, 65, 'Máy mài dụng cụ', 'product_1555321058.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555321059, 0, 1, 'thumb_product_1555321058.jpeg', 'normal_product_1555321058.jpeg', 'product1_1555321059.JPG', 'product2_1555321059.JPG', 'product3_1555321059.JPG', '', 0, 3, ''),
(1151, 1, 17, 53, 'Máy cắt đĩa cấp phôi tự động', 'product_1555321573.JPG', 'M&aacute;y cắt đĩa c&oacute; cấp ph&ocirc;i tự động<br />\r\nXuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555321573, 0, 1, 'thumb_product_1555321573.jpeg', 'normal_product_1555321573.jpeg', 'product1_1555321573.JPG', 'product2_1555321573.JPG', 'product3_1555321573.JPG', '', 0, 3, ''),
(1152, 1, 28, 28, 'Máy cán răng', 'product_1555379149.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555379150, 0, 1, 'thumb_product_1555379149.jpeg', 'normal_product_1555379149.jpeg', 'product1_1555379149.JPG', '', '', '', 0, 3, ''),
(1153, 1, 80, 80, 'Máy rửa xe nước nóng', 'product_1555379405.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua&nbsp; sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555379406, 2, 1, 'thumb_product_1555379405.jpeg', 'normal_product_1555379405.jpeg', 'product1_1555379405.JPG', 'product2_1555379405.JPG', 'product3_1555379405.JPG', '', 0, 3, ''),
(1154, 1, 26, 81, 'Khoan KIRA  côn số 2', 'product_1555384751.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555384753, 0, 1, 'thumb_product_1555384751.jpeg', 'normal_product_1555384751.jpeg', 'product1_1555384752.JPG', 'product2_1555384753.JPG', '', '', 0, 3, ''),
(1162, 1, 33, 33, 'Ê tô', 'product_1555917963.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555917963, 0, 1, 'thumb_product_1555917963.jpeg', 'normal_product_1555917963.jpeg', '', '', '', '', 0, 3, ''),
(1163, 2, 39, 39, 'Máy xay 750', 'product_1555920855.JPG', '&nbsp; &nbsp; &nbsp; <strong>&nbsp; &nbsp; &nbsp; &nbsp;M&aacute;y xay 750</strong><br />\r\n<br />\r\nC&ocirc;ng suất: 750w- m&ocirc; tơ Nhật b&atilde;i<br />\r\nĐiện &aacute;p: 220V<br />\r\nNăng suất: 500- 1000g/ mẻ<br />\r\nThời gian xay: 2-3 ph&uacute;t/ mẻ<br />\r\nChất liệu: ionx, gang<br />\r\nXuất xứ: H&agrave;ng gia c&ocirc;ng sản xuất&nbsp;<br />\r\nBảo h&agrave;nh: bảo h&agrave;nh m&ocirc; tơ 03 th&aacute;ng<br />\r\nC&ocirc;ng dụng: xay thịt, xay mọc, xay giềng, xả, ớt....<br />\r\nNgo&agrave;i ra m&aacute;y c&ograve;n đ&aacute;nh được ruốc khi lắp dao đ&aacute;nh ruốc', 1555919852, 0, 1, 'thumb_product_1555920855.jpeg', 'normal_product_1555920855.jpeg', 'product1_1555921674.JPG', 'product2_1555921676.JPG', 'product3_1555921676.JPG', '', 0, 3, ''),
(1164, 2, 39, 39, 'Máy xay p22 Nhật bãi', 'product_1555921886.JPG', 'Xuất xứ: Nhật B&atilde;i<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nChất liệu: Gang<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1555921510, 0, 1, 'thumb_product_1555921886.jpeg', 'normal_product_1555921886.jpeg', 'product1_1555921635.JPG', 'product2_1555921635.JPG', 'product3_1555921635.JPG', '', 0, 3, ''),
(1165, 1, 33, 33, 'Mang ranh', 'product_1556001995.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556001997, 0, 1, 'thumb_product_1556001995.jpeg', 'normal_product_1556001995.jpeg', '', '', '', '', 0, 3, ''),
(1166, 1, 27, 63, 'Máy mài lô giáp đôi', 'product_1556002112.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nC&ocirc;ng suất: 1,04kw<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556002114, 0, 1, 'thumb_product_1556002112.jpeg', 'normal_product_1556002112.jpeg', 'product1_1556002114.JPG', 'product2_1556002114.JPG', '', '', 0, 3, ''),
(1167, 1, 35, 73, 'Máy cắt cỏ', 'product_1556002990.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556002991, 0, 1, 'thumb_product_1556002990.jpeg', 'normal_product_1556002990.jpeg', '', '', '', '', 0, 3, ''),
(1168, 1, 26, 81, 'Máy khoan Kira côn số 2', 'product_1556003404.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556003058, 0, 1, 'thumb_product_1556003404.jpeg', 'normal_product_1556003404.jpeg', 'product1_1556003444.JPG', 'product2_1556003444.JPG', '', '', 0, 3, ''),
(1169, 1, 26, 86, 'Máy khoan Kira p13', 'product_1556003175.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556003176, 0, 1, 'thumb_product_1556003175.jpeg', 'normal_product_1556003175.jpeg', '', '', '', '', 0, 3, ''),
(1171, 1, 26, 82, 'Máy zen tự động nhiều mũi TOYOSK', 'product_1556181711.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556181713, 0, 1, 'thumb_product_1556181711.jpeg', 'normal_product_1556181711.jpeg', 'product1_1556181712.JPG', '', '', '', 0, 3, ''),
(1172, 1, 15, 49, 'Máy tiện senga', 'product_1556181855.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556181857, 0, 1, 'thumb_product_1556181855.jpeg', 'normal_product_1556181855.jpeg', 'product1_1556181857.JPG', 'product2_1556181857.JPG', 'product3_1556181857.JPG', '', 0, 3, ''),
(1173, 1, 11, 45, 'Máy phay mini có bệ', 'product_1556182030.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556182032, 0, 1, 'thumb_product_1556182030.jpeg', 'normal_product_1556182030.jpeg', 'product1_1556182031.JPG', 'product2_1556182031.JPG', 'product3_1556182031.JPG', '', 0, 3, ''),
(1174, 1, 35, 73, 'Máy cắt cỏ', 'product_1556182347.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556182347, 0, 1, 'thumb_product_1556182347.jpeg', 'normal_product_1556182347.jpeg', 'product1_1556182347.JPG', '', '', '', 0, 3, ''),
(1175, 1, 26, 83, 'Máy khoan nhiều đầu HOKOKU', 'product_1556183409.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556183409, 0, 1, 'thumb_product_1556183409.jpeg', 'normal_product_1556183409.jpeg', 'product1_1556183409.JPG', 'product2_1556183409.JPG', 'product3_1556183409.JPG', '', 0, 3, ''),
(1176, 1, 33, 33, 'Mang ranh p13', 'product_1556183923.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556183923, 0, 1, 'thumb_product_1556183923.jpeg', 'normal_product_1556183923.jpeg', 'product1_1556183923.jpg', '', '', '', 0, 3, ''),
(1177, 2, 38, 38, 'Máy trộn 2 lòng Nhật to', 'product_1556184926.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556184927, 0, 1, 'thumb_product_1556184926.jpeg', 'normal_product_1556184926.jpeg', 'product1_1556184927.jpg', 'product2_1556184927.jpg', 'product3_1556184927.jpg', '', 0, 3, ''),
(1178, 1, 17, 55, 'Máy cắt đột 5 chức năng có chép hình SHARP', 'product_1556265333.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556265333, 0, 1, 'thumb_product_1556265333.jpeg', 'normal_product_1556265333.jpeg', 'product1_1556265333.jpg', 'product2_1556265333.jpg', 'product3_1556265333.jpg', 'product4_1556265333.jpg', 0, 3, ''),
(1179, 1, 26, 82, 'Máy zen côn li hợp', 'product_1556270339.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556270339, 0, 1, 'thumb_product_1556270339.jpeg', 'normal_product_1556270339.jpeg', 'product1_1556270339.JPG', '', '', '', 0, 3, ''),
(1181, 1, 15, 47, 'Máy tiện mâm 1000mm tâm 1250mm', 'product_1556956294.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1556956294, 0, 1, 'thumb_product_1556956294.jpeg', 'normal_product_1556956294.jpeg', 'product1_1556956294.jpg', 'product2_1556956294.jpg', 'product3_1556956294.jpg', 'product4_1556956294.jpg', 0, 3, ''),
(1182, 1, 35, 75, 'Xe nâng điện 1000kg', 'product_1557730771.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1557730772, 0, 1, 'thumb_product_1557730771.jpeg', 'normal_product_1557730771.jpeg', 'product1_1557730772.jpg', 'product2_1557730772.jpg', 'product3_1557730772.jpg', 'product4_1557730772.jpg', 0, 3, ''),
(1183, 1, 35, 75, 'Xe nâng tay 200kg', 'product_1557730967.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1557730968, 0, 1, 'thumb_product_1557730967.jpeg', 'normal_product_1557730967.jpeg', 'product1_1557730968.jpg', 'product2_1557730968.jpg', 'product3_1557730968.jpg', '', 0, 3, ''),
(1184, 1, 11, 45, 'Máy phay đứng OKUMA & HOWA', 'product_1558146190.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1558146192, 0, 1, 'thumb_product_1558146190.jpeg', 'normal_product_1558146190.jpeg', 'product1_1558146191.JPG', 'product2_1558146192.JPG', 'product3_1558146192.JPG', '', 0, 3, ''),
(1185, 1, 35, 74, 'Biến áp 20 KVA', 'product_1558146344.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1558146348, 0, 1, 'thumb_product_1558146344.jpeg', 'normal_product_1558146344.jpeg', 'product1_1558146347.JPG', 'product2_1558146347.JPG', 'product3_1558146348.JPG', '', 1, 3, ''),
(1188, 1, 35, 74, 'Biến áp xanh 6kva', 'product_1558147843.JPG', 'Xuất xư: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1558147844, 0, 1, 'thumb_product_1558147843.jpeg', 'normal_product_1558147843.jpeg', 'product1_1558147844.JPG', 'product2_1558147844.JPG', 'product3_1558147844.JPG', '', 0, 3, ''),
(1187, 1, 35, 74, 'Biến áp xanh 3kva', 'product_1558146511.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1558146512, 0, 1, 'thumb_product_1558146511.jpeg', 'normal_product_1558146511.jpeg', 'product1_1558146512.JPG', 'product2_1558146512.JPG', '', '', 1, 3, ''),
(1204, 1, 35, 85, 'Máy hút bụi', 'product_1573273501.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1559891950, 0, 1, 'thumb_product_1573273501.jpeg', '', 'product1_1573273450.JPG', '', '', '', 0, 3, ''),
(1205, 1, 25, 25, 'Máy dập mini có bệ', 'product_1559892150.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1559892033, 0, 1, 'thumb_product_1559892150.jpeg', 'normal_product_1559892150.jpeg', 'product1_1559892032.JPG', 'product2_1559892033.JPG', 'product3_1559892033.JPG', '', 1, 3, ''),
(1199, 1, 34, 34, 'Quạt ống xanh', 'product_1558320457.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1558320458, 0, 1, 'thumb_product_1558320457.jpeg', 'normal_product_1558320457.jpeg', 'product1_1558320458.jpg', 'product2_1558320458.jpg', '', '', 1, 3, ''),
(1206, 1, 29, 29, 'Đột Jam 3 tấn có bàn gá xoay', 'product_1559892346.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1559892347, 0, 1, 'thumb_product_1559892346.jpeg', 'normal_product_1559892346.jpeg', 'product1_1559892347.JPG', 'product2_1559892347.JPG', 'product3_1559892347.JPG', 'product4_1559892347.JPG', 1, 3, ''),
(1203, 1, 35, 85, 'Máy phay gỗ', 'product_1559890517.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1559890518, 0, 1, 'thumb_product_1559890517.jpeg', 'normal_product_1559890517.jpeg', 'product1_1559890518.JPG', 'product2_1559890518.JPG', 'product3_1559890518.JPG', '', 0, 3, ''),
(1207, 1, 20, 20, 'Máy xả tôn FUTABA', 'product_1560045338.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1560045339, 0, 1, 'thumb_product_1560045338.jpeg', 'normal_product_1560045338.jpeg', 'product1_1560045339.JPG', 'product2_1560045339.JPG', 'product3_1560045339.JPG', '', 1, 3, ''),
(1208, 1, 35, 85, 'Máy uốn ống', 'product_1560045630.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1560045631, 0, 1, 'thumb_product_1560045630.jpeg', 'normal_product_1560045630.jpeg', 'product1_1560045631.JPG', 'product2_1560045631.JPG', '', '', 1, 3, ''),
(1209, 1, 19, 19, 'Máy cưa 600A chia góc', 'product_1560046804.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1560046805, 1, 1, 'thumb_product_1560046804.jpeg', 'normal_product_1560046804.jpeg', 'product1_1560046898.jpg', 'product2_1560046898.jpg', 'product3_1560046898.jpg', '', 1, 3, ''),
(1210, 1, 16, 50, 'Máy ép 200 tấn', 'product_1560047535.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1560047536, 0, 1, 'thumb_product_1560047535.jpeg', 'normal_product_1560047535.jpeg', 'product1_1560047536.JPG', 'product2_1560047536.JPG', 'product3_1560047536.JPG', '', 1, 3, ''),
(1211, 1, 33, 33, 'Mâm cặp 6 chấu 230mm', 'product_1560047705.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1560047705, 0, 1, 'thumb_product_1560047705.jpeg', 'normal_product_1560047705.jpeg', 'product1_1560047705.JPG', 'product2_1560047705.JPG', '', '', 1, 3, ''),
(1212, 1, 35, 75, 'Xe nâng 200kg', 'product_1561455368.jpg', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1561455368, 0, 1, 'thumb_product_1561455368.jpeg', 'normal_product_1561455368.jpeg', 'product1_1561455368.jpg', 'product2_1561455368.jpg', 'product3_1561455368.jpg', '', 0, 3, ''),
(1213, 2, 42, 42, 'Máy thái củ quả Nhật', 'product_1565858315.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1565858317, 0, 1, 'thumb_product_1565858315.jpeg', 'normal_product_1565858315.jpeg', 'product1_1565858317.JPG', 'product2_1565858317.JPG', '', '', 0, 3, ''),
(1215, 1, 31, 31, 'Tời cáp bò 2,8 tấn Hitachi', 'product_1565858446.8 táº¥n.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1565858446, 0, 1, 'thumb_product_1565858446.8 táº¥n.jpeg', 'normal_product_1565858446.8 táº¥n.jpeg', 'product1_1565858446.8 táº¥n.jpg', 'product2_1565858446.8 táº¥n.jpg', 'product3_1565858446.8 táº¥n (2).jpg', 'product4_1565858446.8 táº¥n (2).jpg', 1, 3, ''),
(1216, 1, 25, 25, 'Đột tay', 'product_1565858754.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1565858754, 0, 1, 'thumb_product_1565858754.jpeg', 'normal_product_1565858754.jpeg', 'product1_1565858754.jpg', 'product2_1565858754.JPG', 'product3_1565858754.jpg', '', 0, 3, ''),
(1217, 1, 15, 49, 'Máy tiện senga', 'product_1565859129.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1565859129, 0, 1, 'thumb_product_1565859129.jpeg', 'normal_product_1565859129.jpeg', 'product1_1565859129.JPG', 'product2_1565859129.JPG', '', '', 1, 3, ''),
(1218, 1, 27, 63, 'Máy mài lô giáp có đánh bóng bề mặt', 'product_1565859641.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1565859528, 0, 1, 'thumb_product_1565859641.jpeg', 'normal_product_1565859641.jpeg', 'product1_1565859641.JPG', 'product2_1565859641.JPG', 'product3_1565859641.JPG', '', 0, 3, ''),
(1219, 1, 25, 25, 'Dập li hợp hơi 35 tấn NAKAHARA', 'product_1565860665.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng', 1565860665, 0, 1, 'thumb_product_1565860665.jpeg', 'normal_product_1565860665.jpeg', 'product1_1565860665.jpg', 'product2_1565860665.jpg', 'product3_1565860665.jpg', '', 0, 3, ''),
(1220, 1, 26, 82, 'Zen bát côn Kira p6', 'product_1565862388.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1565862389, 0, 1, 'thumb_product_1565862388.jpeg', 'normal_product_1565862388.jpeg', 'product1_1565862389.JPG', 'product2_1565862389.JPG', '', '', 0, 3, ''),
(1221, 1, 33, 33, 'Ê tô', 'product_1567665665.jpg', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1567665665, 0, 1, 'thumb_product_1567665665.jpeg', 'normal_product_1567665665.jpeg', 'product1_1567665665.jpg', 'product2_1567665665.jpg', 'product3_1567665665.jpg', '', 1, 3, ''),
(1222, 1, 35, 85, 'Bơm nước', 'product_1567665890.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1567665891, 0, 1, 'thumb_product_1567665890.jpeg', 'normal_product_1567665890.jpeg', 'product1_1567665890.JPG', 'product2_1567665890.JPG', '', '', 1, 3, ''),
(1223, 1, 34, 34, 'Quạt ống', 'product_1567909472.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1567909472, 0, 1, 'thumb_product_1567909472.jpeg', 'normal_product_1567909472.jpeg', 'product1_1567909472.jpg', 'product2_1567909472.jpg', '', '', 0, 3, ''),
(1224, 1, 33, 33, 'Bộ chày cối đột AMADA', 'product_1567910843.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1567910843, 0, 1, 'thumb_product_1567910843.jpeg', 'normal_product_1567910843.jpeg', 'product1_1567910843.JPG', 'product2_1567910843.JPG', '', '', 0, 3, ''),
(1225, 1, 17, 55, 'Máy cắt đột 5 chức năng có chép hình TAKEDA', 'product_1569381243.jpg', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1569381243, 0, 1, 'thumb_product_1569381243.jpeg', 'normal_product_1569381243.jpeg', 'product1_1569381243.jpg', 'product2_1569381243.jpg', 'product3_1569381243.jpg', '', 0, 3, ''),
(1226, 1, 35, 74, 'Biến áp đổi nguồn 3F 200 25A- 15A', 'product_1571024724.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ<br />\r\n', 1571024724, 0, 1, 'thumb_product_1571024724.jpeg', 'normal_product_1571024724.jpeg', '', '', '', '', 0, 3, ''),
(1227, 1, 17, 53, 'Máy cắt đĩa tự động', 'product_1571025977.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571025978, 0, 1, 'thumb_product_1571025977.jpeg', 'normal_product_1571025977.jpeg', 'product1_1571025977.JPG', 'product2_1571025977.JPG', 'product3_1571025978.JPG', 'product4_1571025978.JPG', 1, 3, ''),
(1228, 1, 17, 53, 'Máy cắt đĩa tự động', 'product_1571026125.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571026127, 0, 1, 'thumb_product_1571026125.jpeg', 'normal_product_1571026125.jpeg', 'product1_1571026126.JPG', 'product2_1571026127.JPG', 'product3_1571026127.JPG', '', 1, 3, ''),
(1229, 1, 25, 25, 'Dập 2 cầu 30 tấn Shinohara', 'product_1571026531.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571026532, 0, 1, 'thumb_product_1571026531.jpeg', 'normal_product_1571026531.jpeg', 'product1_1571026531.JPG', 'product2_1571026531.JPG', '', '', 0, 3, ''),
(1230, 1, 25, 25, 'Máy dập Hidaka 12 tấn li hợp', 'product_1571036092.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571036094, 0, 1, 'thumb_product_1571036092.jpeg', 'normal_product_1571036092.jpeg', 'product1_1571036093.JPG', 'product2_1571036093.JPG', 'product3_1571036093.JPG', 'product4_1571036094.JPG', 1, 3, ''),
(1231, 1, 25, 25, 'Dập 25 tấn 2 cầu', 'product_1571041919.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571041920, 0, 1, 'thumb_product_1571041919.jpeg', 'normal_product_1571041919.jpeg', 'product1_1571041920.JPG', 'product2_1571041920.JPG', '', '', 1, 3, ''),
(1232, 1, 29, 29, 'Đột thủy lực 3 chức năng', 'product_1571042129.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571042131, 0, 1, 'thumb_product_1571042129.jpeg', 'normal_product_1571042129.jpeg', 'product1_1571042130.JPG', 'product2_1571042130.JPG', 'product3_1571042130.JPG', '', 1, 3, ''),
(1233, 1, 29, 29, 'Đột thủy lực 35 tấn KOMATSU', 'product_1571042402.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571042404, 0, 1, 'thumb_product_1571042402.jpeg', 'normal_product_1571042402.jpeg', 'product1_1571042403.JPG', 'product2_1571042403.JPG', 'product3_1571042403.JPG', 'product4_1571042404.JPG', 1, 3, ''),
(1234, 1, 26, 81, 'Khoan côn 2 Ashina', 'product_1571042548.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571042549, 0, 1, 'thumb_product_1571042548.jpeg', 'normal_product_1571042548.jpeg', '', '', '', '', 1, 3, ''),
(1235, 1, 35, 85, 'Máy cán răng NISSIE', 'product_1571042940.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571042941, 0, 1, 'thumb_product_1571042940.jpeg', 'normal_product_1571042940.jpeg', 'product1_1571042941.JPG', 'product2_1571042941.JPG', '', '', 1, 3, ''),
(1236, 1, 17, 55, 'Máy cắt đột 5 chức năng có chép hình', 'product_1571043089.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571043091, 0, 1, 'thumb_product_1571043089.jpeg', 'normal_product_1571043089.jpeg', 'product1_1571043091.JPG', 'product2_1571043091.JPG', 'product3_1571043091.JPG', 'product4_1571043091.JPG', 1, 3, ''),
(1237, 1, 17, 54, 'Máy cắt góc AMADA', 'product_1571043317.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571043319, 0, 1, 'thumb_product_1571043317.jpeg', 'normal_product_1571043317.jpeg', 'product1_1571043319.JPG', 'product2_1571043319.JPG', 'product3_1571043319.JPG', '', 1, 3, ''),
(1238, 1, 27, 66, 'Máy đánh bóng', 'product_1571043605.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571043606, 0, 1, 'thumb_product_1571043605.jpeg', 'normal_product_1571043605.jpeg', 'product1_1571043605.JPG', 'product2_1571043606.JPG', '', '', 1, 3, ''),
(1239, 1, 27, 62, 'Máy mài 2 đá', 'product_1571043719.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571043721, 0, 1, 'thumb_product_1571043719.jpeg', 'normal_product_1571043719.jpeg', 'product1_1571043720.JPG', 'product2_1571043720.JPG', '', '', 1, 3, ''),
(1240, 1, 32, 69, 'MÁy nén khí 2,2kw Hitachi', 'product_1571043823.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571043823, 0, 1, 'thumb_product_1571043823.jpeg', 'normal_product_1571043823.jpeg', '', '', '', '', 1, 3, ''),
(1241, 1, 15, 49, 'Máy tiện senga đầu xoay', 'product_1571044663.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571044665, 0, 1, 'thumb_product_1571044663.jpeg', 'normal_product_1571044663.jpeg', 'product1_1571044665.JPG', 'product2_1571044665.JPG', 'product3_1571044665.JPG', 'product4_1571044665.JPG', 1, 3, ''),
(1242, 1, 20, 20, 'Máy sả tôn', 'product_1571045616.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571045617, 0, 1, 'thumb_product_1571045616.jpeg', 'normal_product_1571045616.jpeg', 'product1_1571045616.JPG', 'product2_1571045617.JPG', 'product3_1571045617.JPG', '', 1, 3, ''),
(1243, 1, 35, 85, 'Thang nhôm kéo', 'product_1571045668.JPG', '', 1571045668, 0, 1, 'thumb_product_1571045668.jpeg', 'normal_product_1571045668.jpeg', '', '', '', '', 1, 3, ''),
(1244, 1, 15, 49, 'Máy tiện senga', 'product_1571045787.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571045787, 0, 1, 'thumb_product_1571045787.jpeg', 'normal_product_1571045787.jpeg', '', '', '', '', 1, 3, ''),
(1245, 1, 31, 31, 'Tời mặt đất 500kg', 'product_1571045945.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571045947, 0, 1, 'thumb_product_1571045945.jpeg', 'normal_product_1571045945.jpeg', 'product1_1571045947.JPG', 'product2_1571045947.JPG', 'product3_1571045947.JPG', '', 1, 3, ''),
(1246, 1, 35, 75, 'Xe nâng 2 tấn TCM', 'product_1571046046.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571046047, 0, 1, 'thumb_product_1571046046.jpeg', 'normal_product_1571046046.jpeg', 'product1_1571046047.JPG', 'product2_1571046047.JPG', '', '', 1, 3, ''),
(1247, 1, 35, 75, 'Xe nâng 2,5 tấn UNI', 'product_1571046161.5 táº¥n uni cariers.JPG', 'Xuất xứ: NHật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571046163, 0, 1, 'thumb_product_1571046161.5 táº¥n uni cariers.jpeg', 'normal_product_1571046161.5 táº¥n uni cariers.jpeg', 'product1_1571046163.5 táº¥n uni cariers.JPG', 'product2_1571046163.JPG', 'product3_1571046163.5t  Uni Carriers.JPG', 'product4_1571046163.5t  Uni Carriers.JPG', 1, 3, ''),
(1248, 1, 26, 82, 'Zen Kira KTV1', 'product_1571046237.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571046238, 0, 1, 'thumb_product_1571046237.jpeg', 'normal_product_1571046237.jpeg', 'product1_1571046237.JPG', 'product2_1571046238.JPG', '', '', 1, 3, ''),
(1249, 1, 35, 85, 'Bơm đầu inox', 'product_1571046835.JPG', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571046836, 0, 1, 'thumb_product_1571046835.jpeg', 'normal_product_1571046835.jpeg', 'product1_1571046835.JPG', 'product2_1571046836.JPG', '', '', 0, 3, ''),
(1279, 1, 25, 25, 'Đột dập li hợp 45 tấn', 'product_1574576878.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574576878, 0, 1, 'thumb_product_1574576878.jpeg', 'normal_product_1574576878.jpeg', 'product1_1574576878.jpg', 'product2_1574576878.jpg', 'product3_1574576878.jpg', '', 0, 3, ''),
(1251, 1, 26, 26, 'Zen+ khoan', 'product_1571282285.JPG', '', 1571282286, 0, 1, 'thumb_product_1571282285.jpeg', 'normal_product_1571282285.jpeg', '', '', '', '', 0, 3, ''),
(1252, 1, 34, 34, 'Quạt hút', 'product_1571293500.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571293500, 0, 1, 'thumb_product_1571293500.jpeg', 'normal_product_1571293500.jpeg', 'product1_1571293500.jpg', 'product2_1571293500.jpg', 'product3_1571293500.jpg', '', 0, 3, ''),
(1253, 1, 33, 33, 'Đầu kẹp', 'product_1571294022.jpg', 'Xuất xứ: Nhật Bản<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1571293967, 0, 1, 'thumb_product_1571294022.jpeg', 'normal_product_1571294022.jpeg', 'product1_1571293967.jpg', 'product2_1571293967.jpg', 'product3_1571293967.jpg', '', 0, 3, ''),
(1254, 1, 24, 58, 'Máy hàn bấm', 'product_1572164840.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1572164840, 0, 1, 'thumb_product_1572164840.jpeg', 'normal_product_1572164840.jpeg', '', '', '', '', 0, 3, '');
INSERT INTO `product` (`id_product`, `idroot`, `parentid`, `id_catpd`, `name`, `image`, `noi_dung`, `ngay_dang`, `thu_tu`, `active`, `small_image`, `normal_image`, `image1`, `image2`, `image3`, `image4`, `hot`, `id_user`, `selected`) VALUES
(1255, 1, 24, 58, 'Máy hàn bấm', 'product_1572164909.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1572164909, 0, 1, 'thumb_product_1572164909.jpeg', 'normal_product_1572164909.jpeg', '', '', '', '', 0, 3, ''),
(1256, 1, 24, 58, 'Máy hàn bấm', 'product_1572164972.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1572164972, 0, 1, 'thumb_product_1572164972.jpeg', 'normal_product_1572164972.jpeg', '', '', '', '', 0, 3, ''),
(1257, 1, 11, 45, 'Máy phay', 'product_1572168625.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1572165322, 0, 1, 'thumb_product_1572168625.jpeg', 'normal_product_1572168625.jpeg', 'product1_1572168625.jpg', '', '', '', 0, 3, ''),
(1258, 1, 11, 45, 'Máy phay Nigata 2UMC', 'product_1572168749.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1572168749, 0, 1, 'thumb_product_1572168749.jpeg', 'normal_product_1572168749.jpeg', '', '', '', '', 0, 3, ''),
(1259, 1, 34, 34, 'Quạt thông gió', 'product_1573023715.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573023715, 0, 1, 'thumb_product_1573023715.jpeg', 'normal_product_1573023715.jpeg', 'product1_1573023715.jpg', 'product2_1573023715.jpg', '', '', 0, 3, ''),
(1260, 1, 25, 25, 'Đột dập', 'product_1573023875.jpg', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573023875, 0, 1, 'thumb_product_1573023875.jpeg', 'normal_product_1573023875.jpeg', '', '', '', '', 0, 3, ''),
(1262, 1, 29, 29, 'Đột 35 tấn PUX', 'product_1573024775.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573024776, 0, 1, 'thumb_product_1573024775.jpeg', 'normal_product_1573024775.jpeg', '', '', '', '', 0, 3, ''),
(1263, 1, 31, 31, 'Tời cáp 1 tấn/ 10 tấn', 'product_1573024853.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573024853, 0, 1, 'thumb_product_1573024853.jpeg', 'normal_product_1573024853.jpeg', '', '', '', '', 1, 3, ''),
(1264, 1, 31, 31, 'Tời cáp bò 5 tấn', 'product_1573025204.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573025204, 0, 1, 'thumb_product_1573025204.jpeg', 'normal_product_1573025204.jpeg', 'product1_1573025204.jpg', 'product2_1573025204.jpg', '', '', 0, 3, ''),
(1265, 1, 31, 31, 'Tời cáp bò', 'product_1573025997.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573025997, 0, 1, 'thumb_product_1573025997.jpeg', 'normal_product_1573025997.jpeg', 'product1_1573025997.jpg', 'product2_1573025997.jpg', '', '', 0, 3, ''),
(1266, 2, 38, 38, 'MÁy trộn đảo', 'product_1573267159.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573267160, 0, 1, 'thumb_product_1573267159.jpeg', 'normal_product_1573267159.jpeg', '', '', '', '', 0, 3, ''),
(1267, 1, 11, 45, 'Máy phay HASEGAWA', 'product_1573269199.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573269200, 0, 1, 'thumb_product_1573269199.jpeg', 'normal_product_1573269199.jpeg', 'product1_1573269200.JPG', 'product2_1573269200.JPG', 'product3_1573269200.JPG', '', 0, 3, ''),
(1268, 1, 33, 33, 'Ê tô phay cơ', 'product_1573269935.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573269937, 0, 1, 'thumb_product_1573269935.jpeg', 'normal_product_1573269935.jpeg', 'product1_1573269937.JPG', 'product2_1573269937.JPG', 'product3_1573269937.JPG', '', 0, 3, ''),
(1269, 1, 27, 62, 'Máy mài 2 đá 1020w có hút lọc bụi', 'product_1573270400.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573270403, 0, 1, 'thumb_product_1573270400.jpeg', 'normal_product_1573270400.jpeg', 'product1_1573270402.JPG', 'product2_1573270402.JPG', '', '', 0, 3, ''),
(1271, 1, 26, 82, 'Máy zen côn li hợp ', 'product_1573629339.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1573629275, 0, 1, 'thumb_product_1573629339.jpeg', 'normal_product_1573629339.jpeg', 'product1_1573629339.jpg', '', '', '', 0, 3, ''),
(1272, 2, 36, 36, 'Máy thái thịt bò', 'product_1573631983.jpg', '<strong>M&Aacute;Y TH&Aacute;I THỊT B&Ograve;</strong><br />\r\n<br />\r\nĐiện &aacute;p: 220V<br />\r\nC&ocirc;ng suất: 0,75kw<br />\r\nNăng suất: 50-60kg/h<br />\r\nĐộ d&agrave;y l&aacute;t cắt: 1,8mm<br />\r\nChất liệu: inox<br />\r\n<br />\r\nM&aacute;y chuy&ecirc;n d&ugrave;ng để th&aacute;i thịt, đặc biệt l&agrave; thịt b&ograve; bởi kh&ocirc;ng những th&aacute;i thịt nhanh m&agrave; những l&aacute;t thịt c&ograve;n mỏng d&iacute;nh đều nhau như 1, thịt b&ograve; kh&ocirc;ng bị d&iacute;nh v&agrave;o dao như c&aacute;c loại m&aacute;y th&aacute;i th&ocirc;ng thường kh&aacute;c.<br />\r\nM&aacute;y th&aacute;i thịt b&ograve; l&agrave; lựa chọn ho&agrave;n hảo cho c&aacute;c cơ sở chế biến thịt b&ograve;, tiết kiệm đến 90% thời gian so với th&aacute;i tay, cắt giảm nhiều nh&acirc;n c&ocirc;ng. Hơn nữa, c&aacute;c l&aacute;t thịt th&aacute;i ra đều mỏng mịn, đẹp mắt, chuy&ecirc;n nghiệp m&agrave; kh&ocirc;ng bị n&aacute;t vụn.<br />\r\n', 1573631983, 0, 1, 'thumb_product_1573631983.jpeg', 'normal_product_1573631983.jpeg', 'product1_1573631983.jpg', 'product2_1573631983.png', 'product3_1573631983.jpg', '', 0, 3, ''),
(1273, 2, 42, 42, 'Máy sấy băng chuyền', 'product_1574565340.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574565342, 0, 1, 'thumb_product_1574565340.jpeg', 'normal_product_1574565340.jpeg', 'product1_1574565342.JPG', 'product2_1574565342.JPG', 'product3_1574565342.JPG', '', 0, 3, ''),
(1274, 1, 35, 75, 'Cẩu 150kg', 'product_1574565531.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574565532, 0, 1, 'thumb_product_1574565531.jpeg', 'normal_product_1574565531.jpeg', 'product1_1574565532.JPG', 'product2_1574565532.JPG', 'product3_1574565532.JPG', '', 1, 3, ''),
(1275, 1, 26, 26, 'Máy khoan', 'product_1574565662.JPG', 'Xuất xứ: NHật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574565663, 0, 1, 'thumb_product_1574565662.jpeg', 'normal_product_1574565662.jpeg', 'product1_1574565663.JPG', 'product2_1574565663.JPG', '', '', 0, 3, ''),
(1276, 1, 15, 15, 'Máy tiện', 'product_1574565726.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574565681, 0, 1, 'thumb_product_1574565726.jpeg', 'normal_product_1574565726.jpeg', 'product1_1574565727.JPG', 'product2_1574565727.JPG', '', '', 0, 3, ''),
(1277, 1, 26, 83, 'Máy khoan nhiều mũi TOYOSK', 'product_1574565992.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574565992, 0, 1, 'thumb_product_1574565992.jpeg', 'normal_product_1574565992.jpeg', 'product1_1574565992.JPG', 'product2_1574565992.JPG', 'product3_1574565992.JPG', '', 1, 3, ''),
(1278, 1, 26, 83, 'Khoan nhiều đầu TOYOSK', 'product_1574566075.JPG', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1574566076, 0, 1, 'thumb_product_1574566075.jpeg', 'normal_product_1574566075.jpeg', 'product1_1574566076.JPG', '', '', '', 1, 3, ''),
(1280, 1, 26, 60, 'Khoan cần Kira côn 3', 'product_1576809358.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1576809358, 0, 1, 'thumb_product_1576809358.jpeg', 'normal_product_1576809358.jpeg', 'product1_1576809358.jpg', 'product2_1576809358.jpg', 'product3_1576809358.jpg', 'product4_1576809358.jpg', 0, 3, ''),
(1281, 1, 35, 85, 'Bơm đầu inox 400w 1 pha', 'product_1576810259.jpg', 'Xuất xứ: Nhật Bản<br />\r\nChất lượng: H&agrave;ng đ&atilde; qua sử dụng<br />\r\nGi&aacute; b&aacute;n: Li&ecirc;n hệ', 1576810259, 0, 1, 'thumb_product_1576810259.jpeg', 'normal_product_1576810259.jpeg', 'product1_1576810259.jpg', 'product2_1576810259.jpg', 'product3_1576810259.jpg', '', 0, 3, ''),
(1285, 1, 80, 80, 'Máy bơm rửa xe nhật 15kw', 'product_1591785228.jpg', '', 1591767476, 1, 1, 'thumb_product_1591785228.jpeg', 'normal_product_1591785228.jpeg', '', '', '', '', 0, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `setting_value` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_name`, `setting_value`) VALUES
('site_name', 'Máy công cụ, máy tiện Nhật, Máy ép Nhật, máy cắt Nhật, máy xay giò, máy trộn thực phẩm - CÔNG TY TNHH THƯƠNG MẠI, SX VÀ DỊCH VỤ MINH PHONG - TRUNG CƯƠNG'),
('dir_path', ''),
('site_email', 'trungcuong1996@yahoo.com.vn'),
('use_smtp', '0'),
('smtp_host', ''),
('smtp_username', ''),
('smtp_password', ''),
('template_dir', 'default'),
('language_dir', 'english'),
('date_format', 'd/m/Y'),
('time_format', 'H:i'),
('convert_tool', 'gd'),
('convert_tool_path', ''),
('gz_compress', '1'),
('gz_compress_level', ''),
('upload_mode', '2'),
('allowed_mediatypes', 'jpg,gif,png,aif,au,avi,mid,mov,mp3,mpg,swf,wav,ra,rm,zip,pdf'),
('max_thumb_width', '400'),
('max_thumb_height', '300'),
('max_image_height', '1024'),
('max_media_size', '20000'),
('upload_notify', '0'),
('upload_emails', ''),
('auto_thumbnail', '1'),
('auto_thumbnail_dimension', '300'),
('auto_thumbnail_resize_type', '1'),
('auto_thumbnail_quality', '100'),
('id_country', '207'),
('paging_range', '5'),
('watermark_text', ''),
('upload_media_path', 'upload/medias/'),
('upload_image_path', 'upload/images/'),
('session_timeout', '15'),
('max_image_width', '500'),
('time_offset', '0'),
('http_host', 'trungcuong.com'),
('document_root', '/var/www/html/trungcuong'),
('site_keywords', 'Máy cưa Nhật, máy chấn sắt Nhật, máy phay, máy đột dập, máy thái thịt, máy thái rau củ quả, máy xay sinh tố, máy xay cháo, máy xay giềng xả, máy xay ruốc.'),
('site_description', 'Chuyên bán các Dòng máy cơ khí, dòng máy chế biến thực phẩm, Công ty TNHH Thương mại và dịch vụ Minh Phong'),
('hotline', '0913 563 382'),
('mobile_maycongcu', '0913 56 3382 - 0988 41 7780'),
('mobile_maythucpham', '0912 815 862 - 039 4477 894'),
('tel', '0988 417 780'),
('address', 'Số 232 Đường Ngọc Hồi, Huyện Thanh Trì, T.P Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE IF NOT EXISTS `useronline` (
  `id` int(10) NOT NULL,
  `ip` varchar(15) NOT NULL DEFAULT '',
  `timestamp` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=123435 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useronline`
--

INSERT INTO `useronline` (`id`, `ip`, `timestamp`) VALUES
(123431, '127.0.0.1', '1554179251'),
(123428, '127.0.0.1', '1554179214'),
(123429, '127.0.0.1', '1554179216'),
(123430, '127.0.0.1', '1554179216'),
(123427, '127.0.0.1', '1554179168'),
(123432, '127.0.0.1', '1554179277'),
(123433, '127.0.0.1', '1554179401'),
(123434, '127.0.0.1', '1554179402');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lastvisit` bigint(20) unsigned NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `super` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `password`, `email`, `telephone`, `lastvisit`, `active`, `super`) VALUES
(1, 'DCC', 'admin', '86cde618232e52081012f1ff8d8ed648', 'workandrelax@gmail.com', '123456789', 1608691908, 1, 1),
(3, 'Minh Phong', 'trungcuong', '51b2cae4213bdd7ef4bb4ab2e710e4fa', 'info@trungcuong.com', '024.36471227', 1597975589, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_module`
--

CREATE TABLE IF NOT EXISTS `user_module` (
  `id_user_module` bigint(20) unsigned NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL DEFAULT 0,
  `id_module` bigint(20) unsigned NOT NULL DEFAULT 0
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_module`
--

INSERT INTO `user_module` (`id_user_module`, `id_user`, `id_module`) VALUES
(1, 2, 38),
(2, 2, 37),
(3, 2, 35),
(4, 2, 34),
(5, 2, 33),
(6, 2, 32),
(7, 2, 30),
(8, 2, 27),
(9, 2, 26),
(10, 2, 11),
(11, 2, 9),
(12, 2, 8),
(13, 2, 5),
(14, 2, 1),
(15, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catlg`
--
ALTER TABLE `catlg`
  ADD PRIMARY KEY (`id_catlg`);

--
-- Indexes for table `catpd`
--
ALTER TABLE `catpd`
  ADD PRIMARY KEY (`id_catpd`),
  ADD KEY `inx_activ` (`active`,`parentid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`),
  ADD UNIQUE KEY `countryID` (`id_country`),
  ADD KEY `countryID_2` (`id_country`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `idroot` (`idroot`,`parentid`,`id_catpd`),
  ADD KEY `active_hot` (`active`,`hot`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_name`);

--
-- Indexes for table `useronline`
--
ALTER TABLE `useronline`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `user_module`
--
ALTER TABLE `user_module`
  ADD PRIMARY KEY (`id_user_module`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catlg`
--
ALTER TABLE `catlg`
  MODIFY `id_catlg` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `catpd`
--
ALTER TABLE `catpd`
  MODIFY `id_catpd` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1291;
--
-- AUTO_INCREMENT for table `useronline`
--
ALTER TABLE `useronline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123435;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_module`
--
ALTER TABLE `user_module`
  MODIFY `id_user_module` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
