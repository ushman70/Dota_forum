-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 10, 2022 at 12:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dota_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_name` varchar(50) NOT NULL,
  `blog_link` longtext NOT NULL,
  `blog_descrip` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_name`, `blog_link`, `blog_descrip`, `date`) VALUES
(1, 'A great bsj blog', 'https://www.youtube.com/watch?v=QhnMmyfqjV0&lc=UgyUJ_k5Rl-1QHunb6B4AaABAg.9WRR444ru3t9WSkIVpNv7R', 'Check out this amazing bsj blog!!!', '2021-12-23 16:25:55'),
(2, 'Team og takes the f;ogn d; fognsdf ;sdfng;isdnfg', 'https://www.youtube.com/watch?v=I81ftVU5BTQ', 'We have found out recently that  og ana got completely whipped by og miracle. He really sucked at mid and is hoping he will play better next time.', '2022-01-01 00:00:00'),
(3, 'The indecency of himr', 'https://www.youtube.com/watch?v=qIRCrZ_ana4', 'okjfsf asdf asg;aidg an;gianas;idfg ansdg n asidngi;nisnadg nasdngnan asindgiign nkasidngi n nasiodnasidngiarengiong iansoidgnasdgn in asing;aisn;an asndignas;idgnasid n iaodgnasignirgnadg sn nsoidgna;sidgn nasidogndgnaignegangoia n;aosifdng;ai na;fgnaaisdfng;aoi na;oifgn  asdflk nasfn nasdnf;asdnf nasdifans; nasdoifansdf aksdfsd', '2022-01-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `topic` varchar(30) NOT NULL,
  `replied_to` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment`, `topic`, `replied_to`, `date`) VALUES
(1, 100, '\r\n\r\nI am trying to set the red flex-item\'s content height to the height of the blue flex-item when the blue flex-item\'s height is greater.\r\n\r\nThe height needs to be set for the scroll bar to work. How do I set the height to be the same as the blue flex-item?\r\n\r\nI want the red flex-item\'s height to be 100% of the page. The nearest I can get to the result I am looking for is by setting the height of the div inside the red flex-item to 100vh.\r\n\r\nWhen the content in the blue flex-item is less than the red flex-item I have the desired result but when the content inside the blue flex-item is greater the problem occurs.\r\n\r\nThe obvious answer seems to be to set the height of the parent class container but it needs to be 100% so the blue flex-item can grow. 50 Year Historic Low Interest Rates As A Result Of Fed’s Stimulus Program\r\nHow to get Interest Rates as low as 2.25% FIXED (2.39% APR). Payoff Your Mortgage Fast!\r\nJerry Weinberg | October 10, 2020\r\n\r\nMillions of homeowners are getting huge savings on their monthly mortgage bill thanks to a series of unprecedented and bold moves by the Federal Reserve.\r\n\r\nWith the ongoing global pandemic, the Fed was forced to slash its fed rate to zero and pump trillions of dollars into the market causing mortgage rates to plummet to low levels. Insanely, unbelievably low rates!\r\n\r\nWe strongly urge any homeowner with a mortgage to visit www.Lendgo.com and get a free mortgage quote today. There are no obligations to check rates and almost all homeowners have been surprised to find out they can refinance their mortgage to astonishingly low rates and reduce their mortgage payment to levels they never thought possible.\r\n\r\nMost homeowners will see huge savings and the process is very simple. If you want to lower your mortgage payments, pay off your mortgage faster or get some extra needed cash out, now is the perfect time to do it.\r\n\r\n    New York Rates are now at 2.25% FIXED (2.39% APR), Get Free Quote Now ».\r\n\r\nHomeowners are in a mad frenzy to get quotes and refinance. With a huge influx of homeowners looking to refinance, many banks have been unable to keep up with deamnd and process quote request. Sadly, many homeowners will be left out, so It’s vital that you act now and get the process started to lock in a low rate now.\r\nHow Do I Find Out If I&#39;m Eligible?\r\n\r\nClick on your state below to get started, which takes less than 2 minutes. You will then have an opportunity to compare the best savings offers available to you.\r\n\r\nWant To Lock In a Low Rate? Here’s How:\r\n\r\nLendgo&#39;s free service helps homeowners easily get quotes from lenders likely to approve their loan and help find them super low rates. In just a few minutes, any borrower could get a side-by-side rate comparison from qualified lenders and find savings. Once you have chosen the lender right for you, that lenders will work with you to easily lock in your rate and claim your savings.\r\n\r\nCalculate your new house payment and see your savings »\r\n\r\nLendgo.com is one of the country&#39;s largest and most respected mortgage websites. They are currently connecting smart homeowners like yourself with competitive mortgage rates. Service is fast, easy, and 100% free with no obligation. It takes less than two minutes - you have nothing to lose! 50 Year Historic Low Interest Rates As A Result Of Fed’s Stimulus Program\r\nHow to get Interest Rates as low as 2.25% FIXED (2.39% APR). Payoff Your Mortgage Fast!\r\nJerry Weinberg | October 10, 2020\r\n\r\nMillions of homeowners are getting huge savings on their monthly mortgage bill thanks to a series of unprecedented and bold moves by the Federal Reserve.\r\n\r\nWith the ongoing global pandemic, the Fed was forced to slash its fed rate to zero and pump trillions of dollars into the market causing mortgage rates to plummet to low levels. Insanely, unbelievably low rates!\r\n\r\nWe strongly urge any homeowner with a mortgage to visit www.Lendgo.com and get a free mortgage quote today. There are no obligations to check rates and almost all homeowners have been surprised to find out they can refinance their mortgage to astonishingly low rates and reduce their mortgage payment to levels they never thought possible.\r\n\r\nMost homeowners will see huge savings and the process is very simple. If you want to lower your mortgage payments, pay off your mortgage faster or get some extra needed cash out, now is the perfect time to do it.\r\n\r\n    New York Rates are now at 2.25% FIXED (2.39% APR), Get Free Quote Now ».\r\n\r\nHomeowners are in a mad frenzy to get quotes and refinance. With a huge influx of homeowners looking to refinance, many banks have been unable to keep up with deamnd and process quote request. Sadly, many homeowners will be left out, so It’s vital that you act now and get the process started to lock in a low rate now.\r\nHow Do I Find Out If I&#39;m Eligible?\r\n\r\nClick on your state below to get started, which takes less than 2 minutes. You will then have an opportunity to compare the best savings offers available to you.\r\n\r\nWant To Lock In a Low Rate? Here’s How:\r\n\r\nLendgo&#39;s free service helps homeowners easily get quotes from lenders likely to approve their loan and help find them super low rates. In just a few minutes, any borrower could get a side-by-side rate comparison from qualified lenders and find savings. Once you have chosen the lender right for you, that lenders will work with you to easily lock in your rate and claim your savings.\r\n\r\nCalculate your new house payment and see your savings »\r\n\r\nLendgo.com is one of the country&#39;s largest and most respected mortgage websites. They are currently connecting smart homeowners like yourself with competitive mortgage rates. Service is fast, easy, and 100% free with no obligation. It takes less than two minutes - you have nothing to lose!', 'qop vs invoker', 'true', '2021-11-19'),
(4, 51, 'This thread is working pretty well', 'qop vs invoker', 'true', '2021-11-24'),
(6, 32, 'Where there is smoke there is fire', 'qop vs invoker', 'true', '2021-11-20'),
(8, 32, 'f**k you you b***h', 'qop vs invoker', 'true', '2021-11-19'),
(13, 32, 'Its working properly and I love it!!afgjna ang;aopgn as;ognas[gasn asdng;oaisgnasdig a[ouishgaiosgasng siound[gaisdhgio nasidgn[auosgnasojdnag.', 'qop vs invoker', 'true', '2021-11-30'),
(18, 32, '<a href=\"https://www.youtube.com/watch?v=zN67zRQjesk\" target=\"_blank\">https://www.youtube.com/watch?v=zN67zRQjesk</a>', 'qop vs invoker', 'true', '2021-11-29'),
(26, 32, 'So what exactly is your problem?? I dont know where you are trying to go with this. This is really dumb and pointless to be honest.', 'qop vs invoker', 'false', '2021-12-01'),
(27, 32, 'Looks like I finally got it working and styled it too!!', 'qop vs invoker', 'true', '2021-12-08'),
(28, 32, 'Hopefully it will work now!', 'qop vs invoker', 'false', '2021-12-08'),
(30, 32, 'Testing another time', 'qop vs invoker', 'false', '2021-12-08'),
(35, 32, 'loet&#39;s go...', 'qop vs invoker', 'false', '2021-12-08'),
(36, 32, 'Into the void we go....', 'qop vs invoker', 'false', '2021-12-08'),
(37, 32, 'go for broke', 'qop vs invoker', 'false', '2021-12-08'),
(38, 32, 'This is the last time I test this....', 'qop vs invoker', 'true', '2021-12-08'),
(40, 107, 'Testing this out right now!!', 'qop vs invoker', 'true', '2021-12-08'),
(41, 108, 'Cleaning up this text', 'qop vs invoker', 'true', '2021-12-08'),
(42, 32, 'What up yall', 'qop vs invoker', 'true', '2021-12-15'),
(44, 32, 'asdfasdgfasdg', 'qop vs invoker', 'false', '2021-12-09'),
(45, 32, 'cool', 'qop vs invoker', 'true', '2022-01-03'),
(46, 32, 'asdfasdgfa dfg eredfgdgerfg egrsdg', 'qop vs invoker', 'false', '2021-12-14'),
(47, 32, 'asdfassdfg g erdfg gherhgrthrndmgk tehasdg', 'qop vs invoker', 'false', '2021-12-21'),
(48, 32, 'asdfasdg,bg,ofbmrmtbm kn brfgprempmb fasdg', 'qop vs invoker', 'true', '2021-12-22'),
(49, 32, 'asdfasdgfapdfgl pdlfgeprgmakeng oaengenlbsaefbsdg', 'qop vs invoker', 'true', '2021-12-22'),
(50, 32, 'asdfasdgfa sdfg sdfgaethm, iuylsdg', 'qop vs invoker', 'false', '2021-12-21'),
(51, 32, 'asdfasdgfas uyip;luyof gnd jndg', 'qop vs invoker', 'true', '2021-12-14'),
(52, 32, 'asdfasdgf hety jet yj5 56ujw567i467 asdg', 'qop vs invoker', 'true', '2021-12-13'),
(53, 32, 'asdfasdgfasdsfhg rj6u hfgdhdg', 'qop vs invoker', 'true', '2021-12-20'),
(54, 32, 'asdfasdgfasdg', 'qop vs invoker', 'false', '2021-12-14'),
(55, 32, 'asdfasdgfasdsdfg wtujh wrhg', 'qop vs invoker', 'false', '2021-12-21'),
(56, 32, 'asdfasdgf sdfge hwsrth sfdghb sasdg', 'qop vs invoker', 'false', '2021-12-07'),
(57, 32, 'asdfa sdfgsthw4rty jsfbsdgfasdg', 'qop vs invoker', 'false', '2021-12-07'),
(58, 32, 'asdfasdgfassadf eh wrxvcnryukdg', 'qop vs invoker', 'false', '2021-12-06'),
(59, 32, 'asdfasdgfasdg', 'qop vs invoker', 'false', '2021-12-20'),
(60, 32, 'asdfasdgfsdf gsdfg sdfgasdg', 'qop vs invoker', 'false', '2021-12-20'),
(88, 32, 'Is this thread working?', 'This_is_a_test', 'true', '2022-01-13'),
(89, 32, 'Stop telling me to get good', 'This_is_a_test', 'false', '2022-01-13'),
(90, 32, 'You&#39;re the one that should get better', 'This_is_a_test', 'false', '2022-01-13'),
(91, 32, 'Testing', 'This_is_a_test', 'false', '2022-01-13'),
(92, 32, 'another test', 'This_is_a_test', 'false', '2022-01-13'),
(93, 32, 'I dont think its working', 'This_is_a_test', 'false', '2022-01-13'),
(94, 32, 'This is still be tested', 'This_is_a_test', 'false', '2022-01-13'),
(95, 32, 'Throwing another test', 'This_is_a_test', 'false', '2022-01-13'),
(96, 32, 'This is the 9th', 'This_is_a_test', 'false', '2022-01-13'),
(97, 32, 'This is the 10th', 'This_is_a_test', 'false', '2022-01-13'),
(98, 32, 'This is the 11th', 'This_is_a_test', 'false', '2022-01-13'),
(99, 32, 'This is the 12th', 'This_is_a_test', 'false', '2022-01-13'),
(100, 32, 'This is the 13th', 'This_is_a_test', 'false', '2022-01-13'),
(101, 32, 'This is the 14th', 'This_is_a_test', 'false', '2022-01-13'),
(104, 32, 'Is this thread working?', 'Running_second_test', 'true', '2022-01-14'),
(107, 32, '4th comment', 'Running_second_test', 'false', '2022-01-14'),
(108, 32, '5th comment', 'Running_second_test', 'false', '2022-01-14'),
(109, 32, '6th comment', 'Running_second_test', 'false', '2022-01-14'),
(110, 32, '7th comment', 'Running_second_test', 'false', '2022-01-14'),
(112, 32, '9th comment', 'Running_second_test', 'false', '2022-01-14'),
(113, 32, '10th comment', 'Running_second_test', 'false', '2022-01-14'),
(114, 32, '11th comment', 'Running_second_test', 'false', '2022-01-14'),
(115, 32, '12th comment', 'Running_second_test', 'false', '2022-01-14'),
(116, 32, '13th comment', 'Running_second_test', 'false', '2022-01-14'),
(117, 32, '14th comment', 'Running_second_test', 'false', '2022-01-14'),
(118, 32, '15th comment', 'Running_second_test', 'false', '2022-01-14'),
(119, 106, '50 Year Historic Low Interest Rates As A Result Of Fed’s Stimulus Program\nHow to get Interest Rates as low as 2.25% FIXED (2.39% APR). Payoff Your Mortgage Fast!\nJerry Weinberg | October 10, 2020\n\nMillions of homeowners are getting huge savings on their monthly mortgage bill thanks to a series of unprecedented and bold moves by the Federal Reserve.\n\nWith the ongoing global pandemic, the Fed was forced to slash its fed rate to zero and pump trillions of dollars into the market causing mortgage rates to plummet to low levels. Insanely, unbelievably low rates!\n\nWe strongly urge any homeowner with a mortgage to visit www.Lendgo.com and get a free mortgage quote today. There are no obligations to check rates and almost all homeowners have been surprised to find out they can refinance their mortgage to astonishingly low rates and reduce their mortgage payment to levels they never thought possible.\n\nMost homeowners will see huge savings and the process is very simple. If you want to lower your mortgage payments, pay off your mortgage faster or get some extra needed cash out, now is the perfect time to do it.\n\n    New York Rates are now at 2.25% FIXED (2.39% APR), Get Free Quote Now ».\n\nHomeowners are in a mad frenzy to get quotes and refinance. With a huge influx of homeowners looking to refinance, many banks have been unable to keep up with deamnd and process quote request. Sadly, many homeowners will be left out, so It’s vital that you act now and get the process started to lock in a low rate now.\nHow Do I Find Out If I&#39;m Eligible?\n\nClick on your state below to get started, which takes less than 2 minutes. You will then have an opportunity to compare the best savings offers available to you.\n\nWant To Lock In a Low Rate? Here’s How:\n\nLendgo&#39;s free service helps homeowners easily get quotes from lenders likely to approve their loan and help find them super low rates. In just a few minutes, any borrower could get a side-by-side rate comparison from qualified lenders and find savings. Once you have chosen the lender right for you, that lenders will work with you to easily lock in your rate and claim your savings.\n\nCalculate your new house payment and see your savings »\n\nLendgo.com is one of the country&#39;s largest and most respected mortgage websites. They are currently connecting smart homeowners like yourself with competitive mortgage rates. Service is fast, easy, and 100% free with no obligation. It takes less than two minutes - you have nothing to lose!', 'qop vs invoker', 'false', '2022-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `topic`, `comment_id`) VALUES
(14, 123, 'qop vs invoker', 1),
(15, 123, 'qop vs invoker', 2),
(16, 5, 'qop vs invoker', 1),
(17, 8, 'qop vs invoker', 1),
(18, 11, 'qop vs invoker', 1),
(19, 25, 'qop vs invoker', 1),
(323, 32, 'qop vs invoker', 0),
(341, 32, 'qop vs invoker', 2),
(342, 32, 'qop vs invoker', 3),
(344, 32, 'qop vs invoker', 5),
(449, 32, 'qop vs invoker', 7),
(452, 32, 'qop vs invoker', 19),
(453, 32, 'qop vs invoker', 20),
(456, 32, 'qop vs invoker', 9),
(459, 107, 'qop vs invoker', 36),
(460, 107, 'qop vs invoker', 38),
(461, 107, 'qop vs invoker', 27),
(462, 107, 'qop vs invoker', 18),
(463, 107, 'qop vs invoker', 8),
(469, 107, 'qop vs invoker', 6),
(483, 32, 'qop vs invoker', 1),
(497, 32, 'qop vs invoker', 27),
(499, 32, 'qop vs invoker', 28),
(501, 32, 'qop vs invoker', 38),
(506, 32, 'qop vs invoker', 4),
(524, 32, 'qop vs invoker', 37),
(526, 32, 'qop vs invoker', 42),
(528, 32, 'qop vs invoker', 40),
(541, 32, 'qop vs invoker', 18),
(542, 32, 'qop vs invoker', 13),
(543, 32, 'qop vs invoker', 35),
(545, 32, 'qop vs invoker', 60),
(548, 32, 'qop vs invoker', 52),
(549, 32, 'qop vs invoker', 6),
(550, 32, 'qop vs invoker', 56),
(551, 32, 'qop vs invoker', 57),
(552, 32, 'Test', 81),
(553, 32, 'This_is_a_test', 89),
(554, 106, 'qop vs invoker', 6),
(555, 106, 'qop vs invoker', 4);

-- --------------------------------------------------------

--
-- Table structure for table `main_section`
--

CREATE TABLE `main_section` (
  `id` int(11) NOT NULL,
  `thread_name` varchar(30) NOT NULL,
  `thread_image` varchar(30) NOT NULL,
  `thread_link` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_section`
--

INSERT INTO `main_section` (`id`, `thread_name`, `thread_image`, `thread_link`, `date`) VALUES
(1, 'Matchups', 'images/khanda-solid.svg', 'matchup.php', '2021-05-13'),
(3, 'News', 'images/rss-solid.svg', 'News.php', '2021-05-13'),
(4, 'Tournament Info', 'images/info-circle-solid.svg', 'Tournamentinfo.php', '2021-05-13'),
(5, 'Artwork', 'images/paint-brush-solid.svg', 'artwork.php', '2021-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `replied_to_userid` int(11) NOT NULL,
  `reply` longtext DEFAULT NULL,
  `general_message` longtext DEFAULT NULL,
  `blocked` varchar(15) NOT NULL,
  `seen` varchar(15) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `replied_to_userid`, `reply`, `general_message`, `blocked`, `seen`, `date`) VALUES
(1, 32, 0, 'Hey man go fuck yourself', '', 'false', 'true', '2022-01-04 17:26:39'),
(2, 32, 0, '', 'We bring to you a special announcement', 'false', 'true', '2021-12-22 17:26:46'),
(3, 32, 0, 'doodoo head', '', 'false', 'true', '2021-11-30 17:26:53'),
(4, 32, 0, '', 'Hello hello', 'false', 'true', '2022-01-04 17:27:05'),
(5, 32, 0, 'will this pop up?', '', 'false', 'true', '2022-01-19 00:00:00'),
(6, 32, 0, 'fack you bro', '', 'false', 'true', '2022-01-20 00:00:00'),
(7, 32, 0, '', 'a test for the wise', 'false', 'true', '2022-01-20 00:00:00'),
(26, 32, 0, '@ashhar kausar sup brother', '', 'false', 'true', '2022-01-28 00:00:00'),
(27, 32, 0, '@ashhar kausar im lovin it', '', 'false', 'true', '2022-01-28 00:00:00'),
(28, 106, 0, 'Sup brothers', '', 'false', 'true', '2022-01-31 00:00:00'),
(29, 32, 0, 'Sup brothers', '', 'false', 'true', '2022-01-31 00:00:00'),
(30, 107, 0, 'Sup brothers', '', 'false', 'false', '2022-01-31 00:00:00'),
(47, 32, 106, 'testing res testing to see what is the appropriate amount for a string testing res testing to see what is the appropriate amount for a string testing res testing to see what is the appropriate amount for a string ', '', 'false', 'true', '2022-02-06 00:00:00'),
(49, 32, 107, 'testing res', '', 'false', 'false', '2022-02-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `view_id` int(11) NOT NULL,
  `topic` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`view_id`, `topic`, `user_id`) VALUES
(1, 'qop vs invoker', 32),
(2, 'qop vs invoker', 106),
(3, 'storm vs puck', 32),
(4, 'juggernaut vs lifestealer', 32),
(5, '$threadname', 32),
(6, 'Test', 32),
(7, 'This_is_a_test', 32),
(8, '\'Running_second_test\'', 32),
(9, '\'Running_second_test\'', 32),
(10, 'Running_second_test', 32),
(11, 'sniper vs ember', 32),
(12, 'qop vs invoker', 107);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply` longtext NOT NULL,
  `topic` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `comment_id`, `reply`, `topic`, `user_id`, `date`) VALUES
(1, 1, 'ok man?? Whats your problem', 'qop vs invoker', 32, '2021-11-20'),
(2, 1, 'ok...? What&#39;s going on here?', 'qop vs invoker', 32, '2021-11-20'),
(8, 2, 'whats going on brother', 'qop vs invoker', 32, '2021-11-21'),
(9, 2, 'hey', 'qop vs invoker', 32, '2021-11-24'),
(14, 1, 'sup dudes', 'qop vs invoker', 100, '2021-11-23'),
(15, 3, 'hehehe', 'qop vs invoker', 32, '2021-11-23'),
(16, 2, 'huehuehue', 'qop vs invoker', 32, '2021-11-26'),
(17, 1, 'broski', 'qop vs invoker', 32, '2021-11-23'),
(18, 3, 'sweetness', 'qop vs invoker', 32, '2021-11-24'),
(19, 1, 'sup brothers', 'qop vs invoker', 32, '2021-11-24'),
(20, 2, 'Hope everyone&#39;s doing well today', 'qop vs invoker', 32, '2021-11-30'),
(21, 3, 'great job!!', 'qop vs invoker', 32, '2021-09-11'),
(22, 3, 'so cool!', 'qop vs invoker', 32, '2021-11-26'),
(23, 4, 'I can see that', 'qop vs invoker', 32, '2021-11-29'),
(24, 4, 'But is it really?', 'qop vs invoker', 32, '2021-11-29'),
(25, 4, 'hey there', 'qop vs invoker', 32, '2021-11-28'),
(26, 6, 'ok buddy', 'qop vs invoker', 32, '2021-11-28'),
(27, 13, 'I love it too man!!', 'qop vs invoker', 32, '2021-11-28'),
(28, 6, 'This is amazing man!', 'qop vs invoker', 32, '2021-11-28'),
(29, 19, 'mmmm...what are you talking about?', 'qop vs invoker', 32, '2021-11-30'),
(30, 9, 'hey buddy boyo', 'qop vs invoker', 32, '2021-11-29'),
(31, 4, 'hey there', 'qop vs invoker', 32, '2021-11-21'),
(32, 4, 'hey brother', 'qop vs invoker', 32, '2021-12-01'),
(33, 4, 'hey man', 'qop vs invoker', 32, '2021-11-27'),
(34, 4, 'test', 'qop vs invoker', 32, '2021-12-01'),
(35, 4, 'hey', 'qop vs invoker', 32, '2021-11-09'),
(36, 4, 'hey', 'qop vs invoker', 32, '2021-12-01'),
(37, 4, 'ANOTHER ONE', 'qop vs invoker', 32, '2021-10-05'),
(38, 4, 'here here', 'qop vs invoker', 32, '2021-12-05'),
(39, 13, 'here here', 'qop vs invoker', 32, '2021-09-07'),
(40, 9, 'testing this one....', 'qop vs invoker', 32, '2021-11-24'),
(41, 19, 'This seems to be working ok so far...', 'qop vs invoker', 32, '2021-11-02'),
(42, 13, 'Learn to take one for the team man...', 'qop vs invoker', 32, '2021-07-06'),
(43, 8, 'https://stackoverflow.com/questions/6204590/how-to-convert-a-link-in-a-textarea-into-a-link-element-using-php', 'qop vs invoker', 32, '2021-11-02'),
(44, 18, 'Hey man go fuck yourself', 'qop vs invoker', 106, '2021-12-08'),
(45, 13, 'You suck bro....', 'qop vs invoker', 107, '2021-12-06'),
(46, 38, 'I&#39;m lovin it!!', 'qop vs invoker', 107, '2021-12-01'),
(47, 18, 'You got issues bro...', 'qop vs invoker', 32, '2021-12-15'),
(52, 1, 'hey', 'qop vs invoker', 32, '2021-12-15'),
(53, 41, 'date is fully functional', 'qop vs invoker', 32, '2021-12-15'),
(54, 41, 'You stupid?', 'qop vs invoker', 32, '2021-12-20'),
(55, 41, 'You must be really stupid', 'qop vs invoker', 32, '2021-12-20'),
(56, 41, 'Lol I dont think he&#39;s dumb enough...', 'qop vs invoker', 32, '2021-12-20'),
(57, 42, 'What up homie...', 'qop vs invoker', 32, '2021-12-20'),
(58, 48, 'cool...', 'qop vs invoker', 32, '2021-12-20'),
(59, 53, 'cool', 'qop vs invoker', 32, '2021-12-20'),
(60, 51, 'dfjgs ngsdnfgg sn;dfgsdfg', 'qop vs invoker', 32, '2021-12-20'),
(61, 41, 'you have issues....', 'qop vs invoker', 32, '2021-12-20'),
(62, 41, 'you have issues....', 'qop vs invoker', 32, '2021-12-20'),
(63, 40, 'weirdo...', 'qop vs invoker', 32, '2021-12-20'),
(64, 52, 'is this really ok...?', 'qop vs invoker', 32, '2021-12-20'),
(65, 49, 'corn', 'qop vs invoker', 32, '2021-12-20'),
(66, 88, 'Yes it is working scrub', 'This_is_a_test', 32, '2022-01-13'),
(67, 88, 'Learn to get good', 'This_is_a_test', 32, '2022-01-13'),
(68, 27, 'Testing the reply system', 'qop vs invoker', 32, '2022-01-23'),
(76, 1, '@ashhar kausar wat is going on???', 'qop vs invoker', 32, '2022-01-28'),
(77, 6, '@ashhar kausar sup brother', 'qop vs invoker', 32, '2022-01-28'),
(78, 6, '@ashhar kausar im lovin it', 'qop vs invoker', 32, '2022-01-28'),
(79, 18, 'Sup brothers', 'qop vs invoker', 107, '2022-01-31'),
(88, 18, 'testing res', 'qop vs invoker', 32, '2022-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `test_views`
--

CREATE TABLE `test_views` (
  `view_id` int(255) NOT NULL,
  `topic` longtext NOT NULL,
  `view_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_views`
--

INSERT INTO `test_views` (`view_id`, `topic`, `view_count`) VALUES
(1, 'qop vs invoker', 301),
(2, 'storm vs puck', 1),
(3, 'sf vs invoker', 1),
(4, 'juggernaut vs lifestealer', 2),
(5, '$threadname', 1),
(6, 'Test', 20),
(7, 'This_is_a_test', 48),
(8, '\'Running_second_test\'', 1),
(9, '\'Running_second_test\'', 1),
(10, 'Running_second_test', 30),
(11, 'sniper vs ember', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `thread_name` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `thread_creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `topic`, `thread_name`, `date`, `thread_creator`) VALUES
(1, 'qop vs invoker', 'Matchups', '2021-05-13', 'Ash'),
(2, 'juggernaut vs lifestealer', 'Matchups', '2021-05-13', 'Ash'),
(3, 'sf vs invoker', 'Matchups', '2021-05-13', 'Ash'),
(4, 'sniper vs ember', 'Matchups', '2021-05-13', 'Ash'),
(5, 'storm vs puck', 'Matchups', '2021-05-13', 'Ash'),
(17, 'This_is_a_test', 'Matchups', '2022/01/13', 'ashhar kausar'),
(20, 'Running_second_test', 'Matchups', '2022/01/14', 'ashhar kausar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Password` longtext NOT NULL,
  `status` varchar(30) NOT NULL,
  `admin` varchar(11) DEFAULT NULL,
  `date` date NOT NULL,
  `verification_code` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Name`, `profile_img`, `email`, `Password`, `status`, `admin`, `date`, `verification_code`) VALUES
(32, 'ashhar kausar', './images/uploads/height increaser 1 remodded.jpg', 'molashhar@gmail.com', '$2y$10$mV/RlEygjmZ7jx9DPDv35OBxyECTOL5FEXAKcV.EQcBN05SYlMAny', 'verified', 'true', '2021-12-01', ''),
(38, 'poop', './images/uploads/height increaser 1 remodded.jpg', 'ash@gmail.com', '$2y$10$/SfW4yrnBII6BFK0iPMyNOButhNF1yhCsz1c30Wdx3SHhw4FhnKdG', '', '', '2021-12-01', ''),
(51, 'joon', './images/uploads/height increaser 1 remodded.jpg', 'joon@gmail.com', 'asdfasdfasdf', 'verified', '', '2021-11-01', ''),
(100, 'Rashad', './images/uploads/height increaser 1 remodded.jpg', 'jonny@gmail.com', '2YDF(#$ETRJEDFSD', 'verified', '', '2021-08-13', ''),
(105, 'james', './images/uploads/laundryfolded2.png', 'ushman70@gmail.com', '$2y$10$W80d66EAi4b4frFnMGwpsOAXdnlrxHhyvqO7F1i8/Xepe92/jJhMy', 'verified', '', '2021-04-15', 'be66858192b7840'),
(106, 'James hagerty', './images/uploads/jk.jpg', 'dfgaefg@gmail.com', '$2y$10$xAAnu6DkcPTbhNe94adc6ObnOIFCf1aJyBiE03wGhJTr5J0VwoPhG', 'unverified', '', '2022-01-03', '3fa0332af6941eb'),
(107, 'joe', './images/uploads/mega.jpg', 'fgjhaefgadfb@gmail.com', '$2y$10$E/2P08peeH92A6U6h9L6xOGLYhTtElfFICe5uC6adcWkq1iqKlTPi', 'unverified', '', '2021-12-02', '2eb97fe2eb80686'),
(108, 'dfgwegsdfbsdfhsdfhse', './images/uploads/juju.jpg', 'dfgafbaba@gmail.coms', '$2y$10$E.F8BEEJGa/.ZIcjtpU7euCTuTuLq.w/vGEMUoiNhjzongxUSY0s2', 'unverified', '', '2021-12-22', '057884d9e857305');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_section`
--
ALTER TABLE `main_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `test_views`
--
ALTER TABLE `test_views`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `main_section`
--
ALTER TABLE `main_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `test_views`
--
ALTER TABLE `test_views`
  MODIFY `view_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
