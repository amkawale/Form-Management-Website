-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 08:22 PM
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
-- Database: `interns`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_css_property_master`
--

CREATE TABLE `fm_css_property_master` (
  `id` int(100) DEFAULT NULL,
  `property_id` varchar(100) DEFAULT NULL,
  `value_choices` varchar(100) DEFAULT NULL,
  `property_name` varchar(100) DEFAULT NULL,
  `restricted_obj_type_oids` varchar(100) DEFAULT NULL,
  `css_rule` varchar(100) DEFAULT NULL,
  `css_example` varchar(100) DEFAULT NULL,
  `creation_time` varchar(20) DEFAULT NULL,
  `last_modification_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fm_css_property_master`
--

INSERT INTO `fm_css_property_master` (`id`, `property_id`, `value_choices`, `property_name`, `restricted_obj_type_oids`, `css_rule`, `css_example`, `creation_time`, `last_modification_time`) VALUES
(1, 'background-color', NULL, 'Background Color', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(2, 'color', NULL, 'Text Color', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(3, 'font-size', NULL, 'Font Size', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(4, 'font-family', 'Times; New; RomanArial ;sans-serif Helvetica; cambria; \'Myriad Pro\';Tahoma; \'Source Sans Pro\';\'Micro', 'Font Family', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-02-14 19:16:09.090'),
(5, 'margin-left', '10px ;20px ;30px; 40p; 50px', 'Margin Left', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-02-14 21:04:46.440'),
(6, 'margin-right', '245px;250px', 'Margin Right', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-02-22 18:45:41.403'),
(7, 'margin-top', NULL, 'Margin Top', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(8, 'margin-bottom', NULL, 'Margin Bottom', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(9, 'padding-left', '0px1px2px3px4px5px6px7px8px9px10px 20px30px40px 50px', 'Padding Left', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(10, 'padding-right', '0px1px2px3px4px5px6px7px8px9px10px 20px30px40px 50px', 'Padding Right', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(11, 'padding-top', '0px1px2px3px4px5px6px7px8px9px10px 20px30px40px 50px', 'Padding Top', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(12, 'padding-bottom', '0px1px2px3px4px5px6px7px8px9px10px 20px30px40px 50px', 'Padding Bottom', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(13, 'border-top', '1px solid 2px solid 3px solid 4px solid 5px solid 6px solid 7px solid None', 'Border Top', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(14, 'border-bottom', '1px solid 2px solid 3px solid 4px solid 5px solid 6px solid 7px solid None', 'Border Bottom', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(15, 'border-left', '1px solid 2px solid 3px solid 4px solid 5px solid 6px solid 7px solid None', 'Border Left', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(16, 'border-right', '1px solid 2px solid 3px solid 4px solid 5px solid 6px solid 7px solid None', 'Border Right', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(17, 'border-color', NULL, 'Border Color', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(18, 'margin', '10px; 20px ;30px ;40px; 50px;', 'Margin Shorthand', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-05-09 17:19:21.263'),
(19, 'padding', '0px1px2px3px4px5px6px7px8px9px10px 20px30px40px 50px', 'Padding Shorthand', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(20, 'border', NULL, 'Border Shorthand', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(21, 'box-shadow', '0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);', 'Shadow', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-02-16 17:23:00.730'),
(22, 'font-weight', 'normal bold bolder lighter', 'Font Bold Style', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(23, 'text-decoration', 'underline overline line-through', 'Text Decoration', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(24, 'text-decoration-color', NULL, 'Text Decoration Color', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(25, 'text-decoration', 'solid wavy dotted dashed double', 'Text Decoration Style', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(26, 'text-decoration-thickness', NULL, 'Text Decoration Thickness', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(27, 'height', NULL, 'Height', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(28, 'width', NULL, 'Width', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(29, 'overflow-x', NULL, 'Overflow X', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(30, 'overflow-y', NULL, 'Overflow Y', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(31, 'text-align', 'left;center;right', 'Text Align', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-02-14 21:18:02.477'),
(32, 'z-index', NULL, 'Layer Position', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(33, 'background', NULL, 'Custom Background', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(34, 'border-radius', NULL, 'Border Radius', NULL, NULL, NULL, '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(35, 'float', NULL, 'Float', NULL, NULL, 'Left, Right', '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(36, 'resize', NULL, 'Textarea Resize', NULL, NULL, 'none', '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903'),
(37, 'gap', NULL, 'Gap', NULL, NULL, '10px, 5rem, 10', '2024-01-04 15:03:21.', '2024-01-04 15:03:21.903');

-- --------------------------------------------------------

--
-- Table structure for table `fm_object_transaction`
--

CREATE TABLE `fm_object_transaction` (
  `oid` int(11) NOT NULL,
  `object_type_id` varchar(100) NOT NULL,
  `object_id` varchar(50) NOT NULL,
  `theme_id` varchar(100) NOT NULL,
  `object_value` varchar(100) NOT NULL,
  `project_type_id` varchar(100) NOT NULL,
  `object_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` int(11) NOT NULL,
  `last_modification_user` int(11) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_object_transaction`
--

INSERT INTO `fm_object_transaction` (`oid`, `object_type_id`, `object_id`, `theme_id`, `object_value`, `project_type_id`, `object_name`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'label', 'lbl_object', 'theme2', 'git', '', 'student', 0, 0, 0, '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fm_object_type_master`
--

CREATE TABLE `fm_object_type_master` (
  `ID` int(2) DEFAULT NULL,
  `object_id` varchar(100) DEFAULT NULL,
  `object_type` varchar(100) DEFAULT NULL,
  `object_description` varchar(100) DEFAULT NULL,
  `object_Id_prefix` varchar(100) DEFAULT NULL,
  `Creation Time` varchar(23) DEFAULT NULL,
  `Last Modification Time` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fm_object_type_master`
--

INSERT INTO `fm_object_type_master` (`ID`, `object_id`, `object_type`, `object_description`, `object_Id_prefix`, `Creation Time`, `Last Modification Time`) VALUES
(1, 'label', 'label', 'Label', 'lbl_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(2, 'textbox', 'textbox', 'Text Box', 'txt_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(3, 'textarea', 'textarea', 'Text Area', 'txtar_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(4, 'dropdown', 'dropdown', 'Dropdown Menu', 'drp_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(5, 'button', 'button', 'Button', 'btn_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(6, 'section', 'section', 'Section', 'sec_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(7, 'tab', 'tab', 'Tab', 'tab_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(8, 'hidden', 'hidden', 'Hidden Input', 'hid_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(9, 'readonly_textbox', 'readonly_textbox', 'Readonly Texbox', 'ro_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(10, 'panel', 'panel', 'Panel', 'pnl_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(11, 'date', 'date', 'Date Picker', 'date_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(12, 'radio', 'radio', 'Radio Button', 'rad_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(13, 'checkbox', 'checkbox', 'Check Box', 'chk_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(14, 'paragraph', 'paragraph', 'Paragraph', 'par_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(15, 'file', 'file', 'Attachment', 'file_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(16, 'password', 'password', 'Password', 'pwd_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(17, 'color', 'color', 'Color Picker', 'clr_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(18, 'panel_header', 'panel_header', 'Panel Header', 'pnl_head_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(19, 'section_header', 'section_header', 'Section Header', 'sec_head_', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(20, 'session', 'session', 'Session', 'session', '2024-01-04 15:06:01.343', '2024-01-04 15:06:01.343'),
(21, 'form_header', 'form_header', 'Form Heaader', 'form_head_', '2024-04-17 17:52:39.860', '2024-04-17 17:52:39.860'),
(22, 'logo', 'logo', 'logo', 'logo_', '2024-05-24 23:06:32.200', '2024-05-24 23:07:14.720');

-- --------------------------------------------------------

--
-- Table structure for table `fm_panel_master`
--

CREATE TABLE `fm_panel_master` (
  `oid` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `panel_id` varchar(10) NOT NULL,
  `panel_name` varchar(10) NOT NULL,
  `row_count` int(11) NOT NULL,
  `column_count` int(11) NOT NULL,
  `sort_oid` int(11) NOT NULL,
  `theme_id` varchar(10) NOT NULL,
  `panel_subtitle` varchar(10) NOT NULL,
  `panel_subtitle2` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` int(11) NOT NULL,
  `last_modification_user` int(11) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_panel_master`
--

INSERT INTO `fm_panel_master` (`oid`, `tab_id`, `form_id`, `panel_id`, `panel_name`, `row_count`, `column_count`, `sort_oid`, `theme_id`, `panel_subtitle`, `panel_subtitle2`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(2, 3, 2, 'PNL002', 'wwwww', 1, 1, 0, 'theme1', '', '0', 0, 0, 0, '00:00:09', '00:00:09'),
(3, 5, 2, 'PNL003', 'PANEL', 1, 1, 0, 'theme1', '', '0', 0, 0, 0, '00:00:09', '00:00:09'),
(4, 6, 2, 'PNL005', 'panel 1', 1, 2, 0, 'theme1', 'panel sub', '0', 0, 0, 0, '00:00:09', '00:00:09'),
(5, 4, 2, 'PNL006', 'ww', 1, 1, 0, 'theme1', '', '0', 0, 0, 0, '00:00:09', '00:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `fm_project_master`
--

CREATE TABLE `fm_project_master` (
  `oid` int(10) NOT NULL,
  `project_group_id` varchar(100) NOT NULL,
  `project_type_id` varchar(100) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `number_of_tabs` int(11) NOT NULL,
  `form_id` varchar(100) NOT NULL,
  `theme_id` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` varchar(10) NOT NULL,
  `last_modification_user` varchar(10) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_project_master`
--

INSERT INTO `fm_project_master` (`oid`, `project_group_id`, `project_type_id`, `project_name`, `number_of_tabs`, `form_id`, `theme_id`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'PG0001', 'PT0001', 'Customer M', 1, 'PRJ008', 'theme1', 0, '0', '90', '11:40:00', '17:19:00'),
(2, 'PG0001', 'PT0003', 'Vendor Mas', 1, 'PRJ005', '', 0, '0', '0', '11:40:00', '11:40:00'),
(3, 'PG0007', 'PT0012', 'SP', 1, 'PRJ004', '', 0, '0', '0', '11:40:00', '11:40:00'),
(4, 'PG0007', 'PT0012', 'SP Product', 4, 'PRJ013', '', 1, '0', '0', '11:40:00', '11:40:00'),
(5, 'SM001', 'SM001', 'Plant Mast', 1, 'PRJ014', '', 0, '0', '0', '11:40:00', '11:40:00'),
(8, '', '', 'git client', 5, '', '', 0, '', '', '00:00:00', '00:00:00'),
(9, '', '', 'Customer shivu', 5, '', '', 1, '', '', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fm_section_master`
--

CREATE TABLE `fm_section_master` (
  `oid` int(11) NOT NULL,
  `section_id` varchar(10) NOT NULL,
  `section_name` varchar(10) NOT NULL,
  `panel_id` varchar(10) NOT NULL,
  `theme_id` varchar(10) NOT NULL,
  `row_index` int(11) NOT NULL,
  `column_index` int(11) NOT NULL,
  `row_count` int(11) NOT NULL,
  `column_count` int(11) NOT NULL,
  `sort_oid` int(10) NOT NULL,
  `section_subtitle` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` int(11) NOT NULL,
  `last_modification_user` int(11) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_section_master`
--

INSERT INTO `fm_section_master` (`oid`, `section_id`, `section_name`, `panel_id`, `theme_id`, `row_index`, `column_index`, `row_count`, `column_count`, `sort_oid`, `section_subtitle`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'SEC001', 'section', '1', 'theme1', 1, 1, 2, 2, 0, '0', 0, 0, 0, '00:00:09', '00:00:09'),
(2, 'SEC002', 'section 2', '2', 'theme1', 1, 1, 3, 3, 0, '0', 0, 0, 0, '00:00:09', '00:00:09'),
(3, 'SEC003', 'SECTION 1', '4', 'theme1', 1, 1, 3, 3, 0, '0', 0, 0, 0, '00:00:09', '00:00:09'),
(4, 'SEC004', 'SECTION 2', '4', 'theme1', 1, 1, 3, 2, 0, '0', 0, 0, 0, '00:00:09', '00:00:09'),
(5, 'SEC005', 'sec 1', '5', 'theme2', 1, 1, 2, 4, 0, 'sec sub', 0, 0, 0, '00:00:09', '00:00:09'),
(6, 'SEC006', 'ssss', '6', 'theme1', 1, 1, 2, 2, 0, '0', 0, 0, 0, '00:00:09', '00:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `fm_section_object_mapping`
--

CREATE TABLE `fm_section_object_mapping` (
  `oid` int(11) NOT NULL,
  `form_id` varchar(10) NOT NULL,
  `tab_id` varchar(10) NOT NULL,
  `section_id` varchar(10) NOT NULL,
  `row_index` int(11) NOT NULL,
  `column_index` int(11) NOT NULL,
  `object_transaction_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` int(11) NOT NULL,
  `last_modification_user` varchar(10) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_section_object_mapping`
--

INSERT INTO `fm_section_object_mapping` (`oid`, `form_id`, `tab_id`, `section_id`, `row_index`, `column_index`, `object_transaction_id`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'PRJ008', 'TAB015', 'SEC010', 1, 1, 'lbl_sales_business_group', 0, 0, '00.00.0', '00:00:09', '00:00:09'),
(2, 'PRJ008', 'TAB015', 'SEC010', 2, 1, 'lbl_sales_customer_grp_typ', 0, 0, '00.00.0', '00:00:09', '00:00:09'),
(3, 'PRJ008', 'TAB015', 'SEC010', 3, 1, 'lbl_sales_number_outlets', 0, 0, '00.00.0', '00:00:09', '00:00:09'),
(4, 'PRJ008', 'TAB016', 'SEC015', 1, 1, 'lbl_Entity_Name', 0, 0, '00.00.0', '00:00:09', '00:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `fm_tab_master`
--

CREATE TABLE `fm_tab_master` (
  `oid` int(11) NOT NULL,
  `form_id` varchar(10) NOT NULL,
  `tab_name` varchar(10) NOT NULL,
  `theme_id` varchar(10) NOT NULL,
  `tab_id` varchar(10) NOT NULL,
  `sort_oid` int(11) NOT NULL,
  `default_action` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` varchar(10) NOT NULL,
  `last_modification_user` varchar(10) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_tab_master`
--

INSERT INTO `fm_tab_master` (`oid`, `form_id`, `tab_name`, `theme_id`, `tab_id`, `sort_oid`, `default_action`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'PRJ014', 'Plant Mast', 'theme9', 'TAB045', 10, '0', 0, '0', '0', '06:06:00', '06:06:00'),
(2, 'PRJ013', 'Tab 44', 'theme1', 'TAB044', 0, '0', 0, '0', '0', '06:06:00', '06:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `fm_theme_master`
--

CREATE TABLE `fm_theme_master` (
  `oid` int(10) NOT NULL,
  `theme_id` varchar(50) NOT NULL,
  `theme_type` varchar(50) NOT NULL,
  `theme_name` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  `creation_user` int(10) NOT NULL,
  `last_modification_user` int(10) NOT NULL,
  `creation_time` float NOT NULL,
  `last_modification_time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_theme_master`
--

INSERT INTO `fm_theme_master` (`oid`, `theme_id`, `theme_type`, `theme_name`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'theme1', 'theme1', 'Main theme', 0, 0, 0, 9.32, 9.32),
(2, 'theme2', 'theme2', 'Custom 1', 0, 0, 0, 9.32, 9.32),
(3, 'theme3', 'theme3', 'Custom 2', 0, 0, 0, 9.32, 9.32),
(4, 'theme4', 'theme4', 'Left Alignment', 0, 0, 0, 9.32, 9.32),
(6, 'theme5', 'theme5', 'MDM', 0, 0, 0, 9.32, 9.32),
(7, 'theme6', 'theme6', 'MDM Employee Details', 0, 0, 0, 9.32, 9.32),
(8, 'theme9', 'theme9', 'Plane Theme', 0, 0, 0, 9.32, 9.32),
(9, 'theme8', 'theme8', 'Default 1', 0, 0, 0, 9.32, 9.32),
(10, 'theme10', 'theme10', 'Default 2', 0, 0, 0, 9.32, 9.32);

-- --------------------------------------------------------

--
-- Table structure for table `fm_theme_transaction`
--

CREATE TABLE `fm_theme_transaction` (
  `oid` int(10) NOT NULL,
  `theme_id` varchar(100) NOT NULL,
  `object_type_id` varchar(100) NOT NULL,
  `css_property` varchar(100) NOT NULL,
  `css_property_value` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `creation_user` int(11) NOT NULL,
  `last_modification_user` int(11) NOT NULL,
  `creation_time` time NOT NULL,
  `last_modification_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fm_theme_transaction`
--

INSERT INTO `fm_theme_transaction` (`oid`, `theme_id`, `object_type_id`, `css_property`, `css_property_value`, `status`, `creation_user`, `last_modification_user`, `creation_time`, `last_modification_time`) VALUES
(1, 'theme2', 'paragraph', 'font-size', '14px', 0, 0, 0, '00:00:09', '00:00:09'),
(2, 'theme2', 'textbox', 'border-col', '#000000', 0, 0, 0, '00:00:09', '00:00:09'),
(3, 'theme2', 'section', 'box-shadow', 'rgba0, 0, ', 0, 0, 0, '00:00:09', '00:00:09'),
(4, 'theme2', 'dropdown', 'border-rig', 'None', 0, 0, 0, '00:00:09', '00:00:09'),
(5, 'theme2', 'dropdown', 'border', 'none', 0, 0, 0, '00:00:09', '00:00:09'),
(6, 'theme2', 'dropdown', 'box-shadow', 'rgba17, 17', 0, 0, 0, '00:00:09', '00:00:09'),
(7, 'theme2', 'textbox', 'color', '#292424', 0, 0, 0, '00:00:09', '00:00:09'),
(8, 'theme2', 'panel', 'font-famil', 'sans-serif', 0, 0, 0, '00:00:09', '00:00:09'),
(9, 'theme2', 'section', 'text-align', 'center', 0, 0, 0, '00:00:09', '00:00:09'),
(11, 'theme1', 'label', 'padding-to', 'sfda', 0, 0, 0, '00:00:00', '00:00:00'),
(12, 'theme1', 'label', 'border-bot', 'aasd', 0, 0, 0, '00:00:00', '00:00:00'),
(13, 'theme1', 'textbox', 'border-rig', 'fasdf', 0, 0, 0, '00:00:00', '00:00:00'),
(14, 'theme1', 'dropdown', 'padding-to', 'fas', 0, 0, 0, '00:00:00', '00:00:00'),
(15, 'theme1', 'section', 'padding-bo', 'fas', 0, 0, 0, '00:00:00', '00:00:00'),
(16, 'theme2', 'label', 'background', 'afdasdhrth', 0, 0, 0, '00:00:00', '00:00:00'),
(17, 'theme2', 'textarea', 'border-top', 'asdfa', 0, 0, 0, '00:00:00', '00:00:00'),
(18, 'theme2', 'label', 'border-col', 'safd', 0, 0, 0, '00:00:00', '00:00:00'),
(19, 'theme2', 'label', 'margin', 'asfd', 0, 0, 0, '00:00:00', '00:00:00'),
(20, 'theme2', 'paragraph', 'border-bot', 'sfa', 0, 0, 0, '00:00:00', '00:00:00'),
(21, 'theme2', 'password', 'padding-bo', 'safd', 0, 0, 0, '00:00:00', '00:00:00'),
(22, 'theme2', 'logo', 'padding-le', 'fassdf', 0, 0, 0, '00:00:00', '00:00:00'),
(23, 'theme3', 'label', 'margin-top', 'fsadf', 0, 0, 0, '00:00:00', '00:00:00'),
(24, 'theme3', 'textbox', 'padding-to', 'fasd', 0, 0, 0, '00:00:00', '00:00:00'),
(25, 'theme3', 'password', 'border-bot', 'fasdf', 0, 0, 0, '00:00:00', '00:00:00'),
(26, 'theme3', 'logo', 'background', 'fasdffasdf', 0, 0, 0, '00:00:00', '00:00:00'),
(33, 'theme2', 'label', 'border-lef', 'sfda', 0, 0, 0, '00:00:00', '00:00:00'),
(36, 'theme1', 'label', 'border-lef', 'aasd', 0, 0, 0, '00:00:00', '00:00:00'),
(37, 'theme1', 'logo', 'border-top', 'fasdfzxvcx', 0, 0, 0, '00:00:00', '00:00:00'),
(38, 'theme1', 'textbox', 'border-bot', 'dsfgsdsg', 0, 0, 0, '00:00:00', '00:00:00'),
(39, 'theme1', 'textarea', 'border-lef', 'sdfa', 0, 0, 0, '00:00:00', '00:00:00'),
(40, 'theme1', 'label', 'border-top', 'sfd', 0, 0, 0, '00:00:00', '00:00:00'),
(41, 'theme2', 'label', 'border-bot', '411', 0, 0, 0, '00:00:00', '00:00:00'),
(42, 'theme1', 'label', 'padding-bo', 'asas', 0, 0, 0, '00:00:00', '00:00:00'),
(43, 'theme1', 'label', 'border-color', 'sdfa', 0, 0, 0, '00:00:00', '00:00:00'),
(44, 'theme1', 'dropdown', 'padding-bottom', 'fasfa', 0, 0, 0, '00:00:00', '00:00:00'),
(45, 'theme3', 'label', 'border-left', 'asfs', 0, 0, 0, '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `formdata`
--

CREATE TABLE `formdata` (
  `id` int(11) NOT NULL,
  `project_group` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `num_tabs` int(11) NOT NULL,
  `toggle_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formdata`
--

INSERT INTO `formdata` (`id`, `project_group`, `project_type`, `form_name`, `num_tabs`, `toggle_status`) VALUES
(1, 'SEC001', 'PRJ008', 'Employee', 4, 5),
(4, 'SEC001', 'PRJ008', 'Student', 4, 2),
(5, 'SEC001', 'PRJ008', 'Feedback Form', 4, 5),
(6, 'SEC003', 'PRJ008', 'Interns Form', 4, 5),
(7, 'SEC001', 'PRJ008', 'Employee', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(11) NOT NULL,
  `object_name` varchar(255) NOT NULL,
  `object_id` varchar(255) NOT NULL,
  `object_value` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `object_name`, `object_id`, `object_value`, `theme`) VALUES
(3, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_ship_deliver_to', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(4, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_ship_deliver_to', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(5, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_sold_to_order_by', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(6, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_number_outlets', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(7, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_customer_channel', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(8, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_business_group', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(12, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_business_group', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(13, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_invoice_bill_to', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(14, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_customer_grp_typ', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(15, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_business_group', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(16, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_business_group', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1'),
(17, ' Undefined variable $object_name in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>346</b><br />', 'lbl_sales_business_group', '<br /><b>Warning</b>:  Undefined variable $object_value in <b>C:\\xampp\\htdocs\\intern\\objectTransaction.php</b> on line <b>348</b><br />', 'theme1');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `style_name` varchar(255) NOT NULL,
  `css_property` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `style_name`, `css_property`, `value`) VALUES
(3, 'textbox', 'border-col', '14px'),
(4, 'textbox', 'border-col', '14px'),
(5, 'dropdown', 'border', '5'),
(6, 'paragraph', 'font-size', '1'),
(7, 'paragraph', 'font-size', '#000000'),
(8, 'section', 'box-shadow', 'none'),
(14, 'background-color', 'background-color', '11'),
(15, 'background-color', 'background-color', '11'),
(16, 'background-color', 'background-color', '11'),
(17, 'background-color', 'background-color', '11'),
(18, 'color', 'color', '11'),
(19, 'color', 'color', '11'),
(20, 'background-color', 'background-color', '11'),
(21, 'padding-left', 'padding-left', '100'),
(22, 'margin-right', 'margin-right', '120'),
(23, 'font-family', 'font-family', '11'),
(24, 'background-color', 'background-color', '11'),
(25, 'color', 'color', '15'),
(26, 'margin-right', 'margin-right', '41'),
(27, 'background-color', 'background-color', '11'),
(28, 'color', 'color', '100'),
(29, 'padding-right', 'padding-right', 'dfas'),
(30, '', '', ''),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` bigint(50) NOT NULL,
  `DOB` date NOT NULL,
  `Password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Firstname`, `Lastname`, `Email`, `Mobile`, `DOB`, `Password`) VALUES
(1, 'Shivagouda', 'Patil', 'shivagoudapatil15@gmail.com', 8151014688, '2000-12-15', 123),
(2, 'shivu', 'patil', 'shiv@gmail.com', 1234567890, '2000-02-15', 123),
(3, 'sam', 'shetty', 'shetty@gmail.com', 5986656666, '2000-02-15', 123),
(4, 'raju', 'kokane', 'raju@gmail.com', 1234567890, '2000-10-10', 123),
(5, 'Shivagouda', 'Patil', 'shivaji@gmail.com', 8151014688, '2000-02-10', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fm_object_transaction`
--
ALTER TABLE `fm_object_transaction`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_panel_master`
--
ALTER TABLE `fm_panel_master`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_project_master`
--
ALTER TABLE `fm_project_master`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_section_master`
--
ALTER TABLE `fm_section_master`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_section_object_mapping`
--
ALTER TABLE `fm_section_object_mapping`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_tab_master`
--
ALTER TABLE `fm_tab_master`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_theme_master`
--
ALTER TABLE `fm_theme_master`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `fm_theme_transaction`
--
ALTER TABLE `fm_theme_transaction`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `formdata`
--
ALTER TABLE `formdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fm_object_transaction`
--
ALTER TABLE `fm_object_transaction`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fm_panel_master`
--
ALTER TABLE `fm_panel_master`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fm_project_master`
--
ALTER TABLE `fm_project_master`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fm_section_master`
--
ALTER TABLE `fm_section_master`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fm_section_object_mapping`
--
ALTER TABLE `fm_section_object_mapping`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fm_tab_master`
--
ALTER TABLE `fm_tab_master`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fm_theme_master`
--
ALTER TABLE `fm_theme_master`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fm_theme_transaction`
--
ALTER TABLE `fm_theme_transaction`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `formdata`
--
ALTER TABLE `formdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
