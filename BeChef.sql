-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2021 at 09:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CookPortal`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `commentID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `addDate` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`commentID`, `recipeID`, `userID`, `addDate`, `content`) VALUES
(1, 2, 5, '2020-11-21 14:06:35', 'emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequun'),
(2, 2, 8, '2020-11-21 14:06:36', 'emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequun'),
(3, 5, 10, '2020-11-21 14:06:34', 'eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur'),
(4, 5, 8, '2020-11-21 14:06:35', 'dantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicab'),
(5, 5, 12, '2020-11-21 14:06:32', 'dantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicab'),
(6, 5, 13, '2020-11-21 14:06:38', 'dantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicab'),
(7, 7, 12, '2020-11-21 14:08:38', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(8, 7, 13, '2020-11-21 14:08:37', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(9, 7, 16, '2020-11-21 14:08:34', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(10, 9, 16, '2020-11-21 14:08:37', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(11, 13, 16, '2020-11-21 14:08:37', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(12, 13, 9, '2020-11-21 14:08:38', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(13, 3, 13, '2020-11-21 14:08:36', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(14, 3, 16, '2020-11-21 14:08:37', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(15, 10, 15, '2020-11-21 14:08:38', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(16, 10, 5, '2020-11-21 14:08:37', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(17, 10, 6, '2020-11-21 14:08:39', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(18, 10, 9, '2020-11-21 14:08:36', 'autem vel eum iure reprehenderit qui in ea voluptate'),
(19, 6, 11, '2020-11-23 22:35:43', 'Amazing!'),
(22, 8, 11, '2020-11-23 22:46:28', 'Really nice'),
(23, 13, 19, '2020-11-25 00:07:01', 'Smart comment'),
(24, 13, 11, '2020-11-26 18:26:53', 'Easy, tasty and cheap!!'),
(25, 3, 11, '2020-11-29 21:50:27', 'Completely new taste. I\'m highly recommending!'),
(26, 18, 21, '2020-12-07 21:46:00', 'Delicious!'),
(27, 9, 11, '2021-01-03 16:27:59', 'Genius!'),
(28, 14, 11, '2021-01-03 16:29:02', 'It\'s great!'),
(29, 17, 11, '2021-01-03 16:33:28', 'Something really new!');

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `likeID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`likeID`, `recipeID`, `userID`) VALUES
(1, 2, 5),
(2, 2, 8),
(3, 2, 13),
(4, 2, 16),
(5, 5, 10),
(6, 5, 8),
(8, 5, 13),
(9, 5, 16),
(10, 7, 5),
(11, 7, 9),
(12, 7, 8),
(13, 7, 12),
(14, 7, 13),
(15, 7, 16),
(16, 9, 10),
(17, 9, 11),
(18, 9, 12),
(19, 9, 16),
(20, 13, 16),
(21, 13, 6),
(22, 13, 9),
(23, 3, 13),
(24, 3, 16),
(25, 10, 15),
(26, 10, 5),
(27, 10, 6),
(28, 10, 9),
(38, 6, 11),
(39, 8, 11),
(40, 2, 11),
(43, 13, 11),
(44, 7, 21),
(45, 10, 21),
(49, 17, 11),
(52, 14, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Recipes`
--

CREATE TABLE `Recipes` (
  `recipeID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `addDate` datetime NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `preparation` text NOT NULL,
  `preparationTime` decimal(6,0) NOT NULL,
  `averageCost` float(5,2) NOT NULL,
  `country` varchar(50) NOT NULL,
  `vegetarian` tinyint(1) NOT NULL,
  `difficultyLevel` decimal(1,0) NOT NULL,
  `peopleNumber` decimal(2,0) NOT NULL,
  `kcalPerPerson` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Recipes`
--

INSERT INTO `Recipes` (`recipeID`, `authorID`, `addDate`, `imagePath`, `title`, `description`, `ingredients`, `preparation`, `preparationTime`, `averageCost`, `country`, `vegetarian`, `difficultyLevel`, `peopleNumber`, `kcalPerPerson`) VALUES
(2, 11, '2020-11-17 14:19:16', 'sample.jpg', 'Broccoli Casserole with Rice', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolore', ';sed quia consequuntur magni dolore;sit voluptatem accusantium', ';et quasi architecto beatae vitae dicta sunt ;totam rem aperiam, eaque ipsa quae ab illo;et quasi architecto beatae vitae dicta sunt;sed quia consequuntur magni dolore', '4', 1.50, 'India', 1, '3', '3', '2500'),
(3, 11, '2020-11-20 17:01:09', '52802bd171dcc1ab76ea95b8913070fa384bf3e7.jpeg', 'Classic Pecan Pie', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.', ';Et harum quidem rerum facilis est et expedita distinctio;Id est laborum et dolorum fuga', ';Itaque earum rerum hic tenetur a sapiente delectus;Et harum quidem rerum facilis est et expedita distinctio;Id est laborum et dolorum fuga', '60', 15.00, 'Brasil', 1, '2', '2', '2100'),
(5, 11, '2020-11-20 17:15:11', '825c1e8aa954f872c10a53dd6c2d1f3950967021.jpeg', 'Chicken Ratatouille', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', ';nl illum qui dolorem eum fugiat quo voluptas nulla pariatur;vel illum qui dolorem eum fugiat quo voluptas nulla pariatur;nisi ut aliquid ex ea commodi consequatur', ';ut enim ad minima veniam;quis nostrum;id est laborum et dolorum fuga', '75', 45.00, 'France', 0, '1', '5', '2400'),
(6, 11, '2020-11-20 17:19:40', '0a987e17b344545508b0df859b26ad3c76deb712.jpeg', 'Casserole per palona', 'Officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', ';perferendis doloribus asperiores repellat;nam libero tempore, cum soluta nobis est;nisi ut aliquid ex ea commodi consequatur;ebitis aut rerum necessitatibus saepe eveniet ut', ';sint occaecati cupiditate non provident;voluptatum deleniti atque corrupti quos dolores; eos et accusamus et iusto odio dignissimos ducimus qui ;sitatibus saepe eveniet ut et voluptates repudiandae sint et ;laboriosam, nisi ut aliquid ex ', '30', 12.00, 'Italy', 1, '4', '3', '1500'),
(7, 11, '2020-11-20 17:21:37', '890cb6eff6e22157cc3eb5d64c7efc3a9f9079fc.jpeg', 'Perfect Thanksgiving Turkey Breast', 'Officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', ';perferendis doloribus asperiores repellat;ndis doloribus asperiores repellat;Officiis debitis aut rerum nece', ';sint occaecati cupiditate non provident;earum rerum hic tenetur a sapiente;dis voluptatibus maio;dae sint et molestiae non recusandae. Itaque earum ', '90', 27.00, 'Hungary', 0, '3', '4', '2900'),
(8, 15, '2020-11-20 17:24:49', '091c6bd6e64c19180bb8426654d2dec653a11cf3.jpeg', 'Magy\'s eggs', 'Officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', ';perferendis doloribus asperiores repellat;m rerum hic tenetur a sapiente delectus, ut aut ', ';sint occaecati cupiditate non provident;oluptatibus maiores alia;t ut et voluptates repu', '115', 8.00, 'England', 1, '1', '1', '1400'),
(9, 15, '2020-11-20 18:09:54', 'd35155916ce4bfe69b94c17941d70be2780784e2.jpeg', 'Alla beef', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam ', ';omnis dolor repellendus. Temporibus autem quibusdam ', ';omnis dolor repellendus. Temporibus autem quibusdam ;omnis dolor repellendus. Temporibus autem quibusdam ;omnis dolor repellendus. Temporibus autem quibusdam ;omnis dolor repellendus. Temporibus autem quibusdam ', '65', 17.00, 'India', 0, '5', '2', '2300'),
(10, 16, '2020-11-20 18:13:29', 'bd70740fa38a7c815735579dc4787960041f2269.jpeg', 'Salad with salad and chicken', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', ';ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c', ';ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c;ima veniam, quis nostrum exercitationem ullam c', '40', 7.00, 'Bali', 1, '2', '1', '1100'),
(13, 11, '2020-11-20 23:11:07', '734891414f0eb0ea4d4e52fa6f5eb4634ab3bdf1.jpeg', 'Best vegan meal', 'Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima venia', ';eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ', ';eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ;eos et accusamus et iusto odio dignissimos ducimus ', '25', 10.00, 'Malesia', 1, '2', '1', '1400'),
(14, 19, '2020-11-25 00:09:35', '89fc676d03415cd8b1a042b3dcd3b8dba38a5f45.jpeg', 'Family meal recipe', 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', ';reprehenderit in voluptate velit esse;reprehenderit in voluptate velit esse;reprehenderit in voluptate velit esse;quis nostrud exercitation ullamco laboris n;quis nostrud exercitation ullamco laboris n', ';quis nostrud exercitation ullamco laboris n;quis nostrud exercitation ullamco laboris n;quis nostrud exercitation ullamco laboris n;quis nostrud exercitation ullamco laboris n', '40', 14.00, 'Poland', 0, '2', '4', '2200'),
(17, 11, '2020-11-29 22:08:27', '3fbc2409157915759101803c5e208ac2d0575d58.jpeg', 'Eggs is everything what you need!', 'Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolor', ';ate velit esse cillum dolor', ';ate velit esse cillum dolor', '35', 12.00, 'Bolivia', 0, '1', '2', '1900'),
(18, 11, '2020-12-07 21:26:46', '64aaedae9a161d57fec2f9ca94eac9b5448dd267.jpeg', 'Pork, eggs and chips', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ';Ut enim ad minim veniam, quis nostrud;Ut enim ad minim veniam, quis nostrud;Ut enim ad minim veniam, quis nostrud;Ut enim ad minim veniam, quis nostrud', ';Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', '20', 40.00, 'USA', 0, '4', '4', '2800'),
(19, 21, '2020-12-07 21:44:53', '8a8c4e838cb8973faf8c9ee5d6d2f53607482c3b.jpeg', 'Chicken for every diet', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', ';Consequatur aut perferendis doloribus asperiores repellat;Consequatur aut perferendis doloribus asperiores repellat;Consequatur aut perferendis doloribus asperiores repellat', ';Nobis est eligendi optio cumque nihil impedit quo;Nobis est eligendi optio cumque nihil impedit quo;Nobis est eligendi optio cumque nihil impedit quo;Nobis est eligendi optio cumque nihil impedit quo;Nobis est eligendi optio cumque nihil impedit quo', '70', 25.00, 'Bolivia', 0, '3', '4', '3100');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `roleID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`roleID`, `name`) VALUES
(1, 'admin'),
(2, 'experienced'),
(3, 'newbie');

-- --------------------------------------------------------

--
-- Table structure for table `Saves`
--

CREATE TABLE `Saves` (
  `savedID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Saves`
--

INSERT INTO `Saves` (`savedID`, `recipeID`, `userID`) VALUES
(23, 2, 8),
(24, 2, 13),
(25, 2, 16),
(26, 5, 10),
(27, 5, 8),
(28, 5, 12),
(29, 2, 5),
(30, 2, 8),
(31, 2, 13),
(32, 2, 16),
(33, 5, 10),
(34, 5, 8),
(35, 5, 11),
(36, 5, 13),
(37, 7, 5),
(38, 7, 9),
(39, 7, 8),
(45, 7, 11),
(48, 6, 11),
(49, 9, 19),
(50, 10, 11),
(60, 13, 11),
(61, 3, 11),
(62, 2, 21),
(63, 8, 21),
(64, 18, 21);

-- --------------------------------------------------------

--
-- Table structure for table `Tags`
--

CREATE TABLE `Tags` (
  `tagID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tags`
--

INSERT INTO `Tags` (`tagID`, `recipeID`, `name`) VALUES
(5, 13, 'vegan'),
(6, 13, 'cheap'),
(7, 13, 'tasty'),
(8, 13, 'vegetables'),
(9, 2, 'meal'),
(10, 2, 'family'),
(11, 2, 'fast'),
(12, 2, 'minutes'),
(13, 2, 'exclusive'),
(14, 2, 'healthy'),
(15, 2, 'newbie'),
(16, 2, 'tasty'),
(17, 2, 'tbh'),
(18, 2, 'whatsmore'),
(19, 3, 'meal'),
(20, 3, 'family'),
(21, 3, 'fast'),
(22, 3, 'minutes'),
(23, 3, 'exclusive'),
(24, 3, 'healthy'),
(25, 5, 'meal'),
(26, 5, 'family'),
(27, 5, 'fast'),
(28, 5, 'minutes'),
(29, 5, 'exclusive'),
(30, 5, 'healthy'),
(31, 5, 'newbie'),
(32, 5, 'tasty'),
(33, 5, 'tbh'),
(34, 5, 'whatsmore'),
(35, 6, 'fast'),
(36, 6, 'minutes'),
(37, 6, 'exclusive'),
(38, 6, 'healthy'),
(39, 6, 'newbie'),
(40, 6, 'tasty'),
(41, 6, 'tbh'),
(42, 6, 'whatsmore'),
(43, 7, 'meal'),
(44, 7, 'family'),
(45, 7, 'fast'),
(46, 7, 'minutes'),
(47, 7, 'exclusive'),
(48, 7, 'healthy'),
(49, 7, 'newbie'),
(50, 7, 'tasty'),
(51, 7, 'tbh'),
(52, 7, 'whatsmore'),
(53, 8, 'meal'),
(54, 8, 'family'),
(55, 8, 'fast'),
(56, 8, 'minutes'),
(57, 9, 'exclusive'),
(58, 2, 'meal'),
(59, 2, 'family'),
(60, 2, 'fast'),
(61, 2, 'minutes'),
(62, 2, 'exclusive'),
(63, 2, 'healthy'),
(64, 2, 'newbie'),
(65, 2, 'tasty'),
(66, 2, 'tbh'),
(67, 2, 'whatsmore'),
(68, 3, 'meal'),
(69, 3, 'family'),
(70, 3, 'fast'),
(71, 3, 'minutes'),
(72, 3, 'exclusive'),
(73, 3, 'healthy'),
(74, 5, 'meal'),
(75, 5, 'family'),
(76, 5, 'fast'),
(77, 5, 'minutes'),
(78, 5, 'exclusive'),
(79, 5, 'healthy'),
(80, 5, 'newbie'),
(81, 5, 'tasty'),
(82, 5, 'tbh'),
(83, 5, 'whatsmore'),
(84, 6, 'meal'),
(85, 6, 'family'),
(86, 6, 'fast'),
(87, 6, 'minutes'),
(88, 6, 'exclusive'),
(89, 6, 'healthy'),
(90, 6, 'newbie'),
(91, 6, 'tasty'),
(92, 6, 'tbh'),
(93, 6, 'whatsmore'),
(94, 7, 'meal'),
(95, 7, 'family'),
(96, 7, 'fast'),
(97, 7, 'minutes'),
(98, 7, 'exclusive'),
(99, 7, 'healthy'),
(100, 7, 'newbie'),
(101, 7, 'tasty'),
(102, 7, 'tbh'),
(103, 7, 'whatsmore'),
(104, 8, 'meal'),
(105, 8, 'family'),
(106, 8, 'fast'),
(107, 8, 'minutes'),
(108, 9, 'exclusive'),
(109, 9, 'healthy'),
(110, 9, 'newbie'),
(111, 9, 'tasty'),
(112, 9, 'tbh'),
(113, 10, 'whatsmore'),
(114, 10, 'exclusive'),
(115, 10, 'healthy'),
(116, 10, 'newbie'),
(117, 10, 'tasty'),
(118, 10, 'tbh'),
(119, 14, 'poland'),
(120, 14, 'meal'),
(121, 14, 'family'),
(122, 14, 'easy'),
(123, 14, 'lemon'),
(124, 14, 'meat'),
(125, 14, 'chicken'),
(126, 17, 'eggs'),
(127, 17, 'bacon'),
(128, 17, 'honey'),
(129, 17, 'fast'),
(130, 18, 'pork'),
(131, 18, 'eggs'),
(132, 18, 'chips'),
(133, 18, 'luxury'),
(134, 19, 'chicken'),
(135, 19, 'meat'),
(136, 19, 'luxury'),
(137, 19, 'diet'),
(138, 19, 'southernamerica');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `joinDate`, `fullname`, `email`, `username`, `password`, `roleID`) VALUES
(5, '2020-11-08 13:12:13', 'John Cena', 'invisible91@wp.pl', 'invisible91', '$2y$10$h8wUPO0zTv43g/O7yqt7I.ClaG9xOFzMpkiFE4GTPSP1wMLd9I/sq', 1),
(6, '2020-11-08 13:16:39', 'Zenon Martyniuk', 'MartiniDisco@wp.pl', 'MartiniDisco', '$2y$10$WBK/Bk2a/Cqe0hOxNz6ChupcoXJHgUW0onc8WOsBb5gQVj8filTrq', 2),
(8, '2020-11-08 21:49:12', 'Johny Dan', 'danny601@gmail.com', 'danny601', '$2y$10$pd2mIZNM8JDqXKuzipbH1uYm5RR2R9LKq8NDsOlY2cGKX37xDHYoe', 3),
(9, '2020-11-08 22:27:00', 'Mike Star', 'mikee55@o2.com', 'mikee55', '$2y$10$GGQiCEyy2wtVCLQ3IWqF/ug28jRkmcePkwEMQfAyvNT0EcNEzi1a6', 3),
(10, '2020-11-09 01:53:32', 'Johny Depp', 'depp12@o2.pl', 'depp12', '$2y$10$gUfjlFRn4r10MsnRoNhPguEDb.kGrZ36tLEAXihFe1dc.7mV/O1DW', 3),
(11, '2020-11-13 23:40:15', 'Liam Neeson', 'nsLI@gmail.com', 'neesonLi', '$2y$10$AMW.U2UUIAGh/s5VmZoJuO6NOQkxUrzzRbgLBkraPTv8mT4go8sr2', 3),
(12, '2020-11-14 12:32:40', 'Ricky Morty', 'rickiticki22@wp.pl', 'rickiticki22', '$2y$10$M9MNPSyISVl4S6V5b4LflumdyO3su.Vi0rRowdFLzoIb6mSXoOfIm', 3),
(13, '2020-11-17 10:29:13', 'Kiki Niguri', 'nigurixx@o2.pl', 'nigurixx', '$2y$10$NMwvYOh6pBqsL//2s0yEE.Nul0nqEMf/HZpzSNMWonxD9hI0oE/7C', 3),
(14, '2020-11-17 14:20:21', 'Jane Proll', 'proll531@gmail.com', 'proll531', '$2y$10$.etvMI9A5VV0diYv0sJ5pefSRGyIfEoTxocGgvnp0uDmfa23wqAN2', 3),
(15, '2020-11-20 17:23:21', 'Chris Gregor', 'chriss90@gmail.com', 'chriss90', '$2y$10$i4.WXMpM11eXB15febKABuprToud/oFkmGHCOmvGksFN3ViKmgAKK', 3),
(16, '2020-11-20 18:10:37', 'Monte Drink', 'monte22@o2.pl', 'monte22', '$2y$10$XudGElmq/Ek9xiAbIE8gT.tRaa50Fu1qOUBIX4onvUp4C4hbv6jvS', 3),
(17, '2020-11-25 00:03:20', 'Berry Blue', 'berry90@gmail.com', 'berry90', '$2y$10$TrEbkbzugaKfgOyrRjb6POBRPpy.t9qHO.D7KkmXRS.8cfrSvOXxW', 3),
(18, '2020-11-25 00:05:01', 'Goratz Schinger', 'goratz82@gmail.com', 'goratz82', '$2y$10$IUufn6su8t9kY4opvPdot.A6mSscU8V4jtfzioob3Ltxt9bnC7ziG', 3),
(19, '2020-11-25 00:06:21', 'Milly Jones', 'milly22@gmail.com', 'milly22', '$2y$10$XRECa705cf8if6A2jm6U4OGZGPTVJHLmeAC2qRgPmMqeOnMqs2dS2', 3),
(20, '2020-11-29 21:42:03', 'Hinji Rokun', 'kilk@wp.pl', 'kilkBabe', '$2y$10$7u15sy7eAiEdY2Qo724xNuL2E9YUJNHYye3mhY7MpO6qkAGv/8VRe', 3),
(21, '2020-12-07 21:42:58', 'Mijon Chyun', 'mijon13@gmail.com', 'mijon13', '$2y$10$6CecZnkiybC3uYyRbzfUlutw.jDdhZI4O93Dt2/J/juppyyS3fR2y', 3),
(23, '2020-12-20 16:02:30', 'Karakan Mbappe', 'kilk_9@wp.pl', 'mbappe21', '$2y$10$ECEZk5lDtckjJqNcmlbc1OYa/Rx1nMQLGmEORHIZp/qlDzRmZcNZ6', 3),
(24, '2020-12-20 16:04:04', 'Mark Walt', 'mark209@wp.pl', 'mark209', '$2y$10$sBg7vSWSJL.hMLy35PpDJeU9ClpCUwAs5X.6F4PTGHIU3CIbtD5LC', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Recipes`
--
ALTER TABLE `Recipes`
  ADD PRIMARY KEY (`recipeID`),
  ADD KEY `authorID` (`authorID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `Saves`
--
ALTER TABLE `Saves`
  ADD PRIMARY KEY (`savedID`),
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Tags`
--
ALTER TABLE `Tags`
  ADD PRIMARY KEY (`tagID`),
  ADD KEY `recipeID` (`recipeID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `Recipes`
--
ALTER TABLE `Recipes`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Saves`
--
ALTER TABLE `Saves`
  MODIFY `savedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `Tags`
--
ALTER TABLE `Tags`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `recipeID` FOREIGN KEY (`recipeID`) REFERENCES `Recipes` (`recipeID`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`recipeID`) REFERENCES `Recipes` (`recipeID`),
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Recipes`
--
ALTER TABLE `Recipes`
  ADD CONSTRAINT `authorID` FOREIGN KEY (`authorID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Saves`
--
ALTER TABLE `Saves`
  ADD CONSTRAINT `Saves_ibfk_1` FOREIGN KEY (`recipeID`) REFERENCES `Recipes` (`recipeID`),
  ADD CONSTRAINT `Saves_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Tags`
--
ALTER TABLE `Tags`
  ADD CONSTRAINT `Tags_ibfk_1` FOREIGN KEY (`recipeID`) REFERENCES `Recipes` (`recipeID`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `roleID` FOREIGN KEY (`roleID`) REFERENCES `Roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
