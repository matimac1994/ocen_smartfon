/*
Navicat MySQL Data Transfer

Source Server         : ocen_smartfon
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : ocen_smartfon

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-02-12 16:52:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `archiwum_uzytkownicy`
-- ----------------------------
DROP TABLE IF EXISTS `archiwum_uzytkownicy`;
CREATE TABLE `archiwum_uzytkownicy` (
  `ID_UZYTKOWNIKA` int(10) NOT NULL,
  `LOGIN` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `HASLO` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `MAIL` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `IMIE` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `NAZWISKO` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `MIASTO` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `TYP_UZYTKOWNIKA` int(10) DEFAULT NULL,
  `DATA` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci
/*!50100 PARTITION BY RANGE (UNIX_TIMESTAMP(DATA))
(PARTITION p0 VALUES LESS THAN (1483225200) ENGINE = InnoDB,
 PARTITION p1 VALUES LESS THAN (1490997600) ENGINE = InnoDB,
 PARTITION p2 VALUES LESS THAN (1498860000) ENGINE = InnoDB,
 PARTITION p3 VALUES LESS THAN (1506808800) ENGINE = InnoDB,
 PARTITION p4 VALUES LESS THAN (1514761200) ENGINE = InnoDB,
 PARTITION p5 VALUES LESS THAN MAXVALUE ENGINE = InnoDB) */;

-- ----------------------------
-- Records of archiwum_uzytkownicy
-- ----------------------------
INSERT INTO `archiwum_uzytkownicy` VALUES ('27', 'ddd', '$2y$10$vnICxCBn4gKfoxHOPGTsZuY.u7MVP54sJ/LQrgeeK.YObxIHhKWZ.', 'ddd@ddd', 'ddd', 'ddd', 'ddd', null, '2016-12-09 20:54:17');
INSERT INTO `archiwum_uzytkownicy` VALUES ('28', 'moniczka', '$2y$10$z6Vaernui8EZ3KqpxJKME.svhPNI4OBefPLZZrrxycFE54xwyeDWC', 'moniczka16.1996@o2.pl', 'Monika', 'Maciejak', 'Pobiednik Mały', null, '2016-12-09 20:54:20');
INSERT INTO `archiwum_uzytkownicy` VALUES ('32', '1231frwerf', '$2y$10$T.hphJKiCLe1MKGnnDEt3uQLDfw8YIVCo4diRfkQwJNVDwzKvFRny', 'aaa@aaa.pl', 'monik', 'maciej', 'Pbkl', null, '2016-12-09 20:54:24');
INSERT INTO `archiwum_uzytkownicy` VALUES ('19', 'mati', '$2y$10$23G54zhN/b76/r9MXQfGPeFDhCiNLA9QhRoB36VpXmDCds8pZxGcK', 'mati@aaa.pl', 'Mateusz', 'Maciejak', 'Kraków', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('21', 'matiwsrh1994', '$2y$10$12j4mVI82M06EpYlzBX.q.CBbOJo9MQKt6.slSPBfVFvuvk6zc4KG', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('23', 'ola', '$2y$10$f4UKFzoaZj/8gQhr/1/0/uezpom/6hMwAdbmJOg/leMkFFH1C53RS', 'ola@ola.pl', 'Ola', 'Ola', 'Kraków', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('24', 'aaa', '$2y$10$GtAGVJTtzkSSju4/hj2F6.LiM6pq7.4nM4lyDnhpNjlmFIk67Xy.2', 'aaa@aaa.pl', 'aaa', 'aaa', 'aaa', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('26', 'qqq', '$2y$10$OC1sWRsMRYbTGCcZ9R3Wd./0SguKz2HG.xAfmBxrFU/fcO65HChpG', 'qqq@qqq', 'qqq', 'qqq', 'qqq', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('29', 'raz', '$2y$10$hxU32ABwa58wnhbL/FRCgO31y6R0Zq/E.K7HFS3bBs7yWHCUh7MiS', 'trzy@faf', 'faf', 'fasf', 'fas', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('30', 'artur', '$2y$10$XZKtoInTfCfFqQ6zYH1mtut0P2vs25N9WBPFT.AeVqx3vg0Rz8Xyq', 'a@a.pl', 'artur', 'niewiarowski', 'krk', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('31', 'mk', '$2y$10$nHiU2161SAFOemWiXaNYNO7iHE2vdd.a4Vp3.TbpJReuxM5NLwCaK', 'nxjhasg@o2.pl', '', '', '', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('33', 'abc', '$2y$10$Izhw5T0wwAVlFi4she4yJ.Jqv0na21dniWeYUGjAYb8e.xvVJlROm', 'asd@dad', 'sda', 'dasd', 'asdasd', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('34', 'ccc', '$2y$10$c9JbBnRqrsuXzJBSoC/I9.C8nMHBfW36k.rnP85mtZx4praVKkr3u', 'aa@aa', 'mati', 'mati', 'mati', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('35', 'rrr', '$2y$10$cpfKtc4tKUJqiza7P4cVnuEqp5UlB1HgCEgB.a5inxzDZR1KcvKLq', 'rrr@rrr', 'mati', 'adas', 'dfad', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('36', 'matimac1994', '$2y$10$CCECWLvQqa130tpe70jxI..f6G/zGkbvTGmQklbkeulB3sCle6Qs2', 'matihaha@cos.pl', 'Mateusz ', 'Maciejak', 'Pobiednik Mały', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('37', 'aaaaaaaaaaaaaaaaaaaa', '$2y$10$Nz8ZAYdGXkXeCGIGzxu/8.kcI5.2MMUkBYquc/ycRtn0LmVGR9kfW', 'aaa@aaa', 'aaa', 'aaa', 'aaa', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('38', 'avc', '$2y$10$CeFFCv7zyHDNy7xiG34fCO9SeWbUCuDy2sr/YNRDOHjeU0sXhk8dS', 'avc@avc', 'cos', 'cos', 'cos', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('39', 'mateusz.maciejak.1994', '$2y$10$DwflgSykNKhx4G3w8WgUSu6P2R7F2BJfxz/XTWiURjFQe0VRLhH1K', 'cos@cos', 'Mateusz', 'Maciejak', 'Pobiednik Mały', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('40', 'ppp', '$2y$10$1purvfoiVaCIfiV5KhoQF.RUjDIIk.xJrv2ooNYLebx/4N11AZc9K', 'ppp@ppp', 'ppp', 'ppp', 'ppp', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('41', 'ttt', '$2y$10$6upVVyM1r/9iSBJ35ftu5urGteokPJyQol.7T1nWMsaulIZi7clpG', 'ttt@ttt', 'ttt', 'ttt', 'ttt', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('42', 'zxc', '$2y$10$Raz5.P2F14icuSSi/stRoOrhR3tpsqiZGdOXKYRiJaEb2ViuSQTEm', 'cos@cos.pl', 'mati', 'mati', 'mati', null, '2017-01-13 21:21:00');
INSERT INTO `archiwum_uzytkownicy` VALUES ('43', 'ccc', '$2y$10$6JaToXUX8eH2VtN83V3eReuJt4EcAj6HJ2esa4envt6FE9XMAY2Ji', 'ccc@ccc', 'ccc', 'ccc', 'ccc', null, '2017-01-13 22:11:13');
INSERT INTO `archiwum_uzytkownicy` VALUES ('44', 'ccc', '$2y$10$6Lx4JAmhPNSMzo9v9y/vSO0.SqfDkjp0rR2OX7Ty54yy9HDaQyM/u', 'ccc@ccc', 'ccc', 'ccc', 'ccc', '2', '2017-01-14 22:14:28');
INSERT INTO `archiwum_uzytkownicy` VALUES ('48', ' ', '$2y$10$aZ.TyTCDX2GIpoBYaM0Qcu2A4IkhTfcNm3wXjh5nTm.fJE7SkLAJW', 'asd@asa', '', '', '', '2', '2017-01-31 21:30:24');
INSERT INTO `archiwum_uzytkownicy` VALUES ('50', 'mama', '$2y$10$w5WBwNU2WbfJhrUZV6TUdOIj4FHqcZbpSJkDWEG1eLjR3WVFOBovi', 'sdd@dsa.pl', 'dasdasd', 'dsadaw', 'dwaadwad', '2', '2017-02-04 13:45:11');
INSERT INTO `archiwum_uzytkownicy` VALUES ('55', 'matiwsrh1994', '$2y$10$zTOemYepB5OSzlxn3MLGF.7W/QQ9zU9fhps7SVmbNnmbk18LZaHIq', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '2', '2017-02-04 22:22:12');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'ccc@ccc', 'ccc', 'ccc', 'ccc', '2', '2017-02-05 14:14:15');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'ccc@ccc', 'ccca', 'ccc', 'ccc', '2', '2017-02-05 14:37:52');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'ccc@ccc.pl', 'ccca', 'ccc', 'ccc', '2', '2017-02-05 14:41:25');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'ccc@ccc.pla', 'ccca', 'ccc', 'ccc', '2', '2017-02-05 14:45:12');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'mati@mati.pl', 'ccc', 'ccc', 'ccc', '2', '2017-02-05 14:46:52');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'qqq@qqq.pl', 'ccc', 'ccc', 'ccc', '2', '2017-02-05 14:47:36');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'ccc@ccc.pl', 'ccc', 'ccc', 'ccc', '2', '2017-02-05 14:48:35');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$YVNKw3Byy57RH71vFVePk.KCzP3fyBFHGB/WPDIQlhLeI3Hprf/py', 'ccc@aaa.pl', 'ccc', 'ccc', 'ccc', '2', '2017-02-05 15:28:26');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$wRbgh3/g8jBdDQ3KtgSvxeZE3VjmQndCpH0Y66nOCzUTnym5BlWWS', 'ccc@aaa.pl', 'ccc', 'ccc', 'ccc', '2', '2017-02-05 15:29:17');
INSERT INTO `archiwum_uzytkownicy` VALUES ('45', 'adad', '$2y$10$PGe3p/b.vommv51b7wStH.7d0mNba1d1Y/DyPyClAktzP4Pdf5ClG', 'dsads@dasd', '', '', '', '2', '2017-02-06 11:56:53');
INSERT INTO `archiwum_uzytkownicy` VALUES ('49', 'dawdwadwad', '$2y$10$F4lk0xAYcbACKui4FH2JUOYVPcps5EjOR2HdggOwMFjiHQUlpyR3u', 'aaa@aaaa.pl', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaasdwd', 'dwdawdawdawdwa', '2', '2017-02-06 11:58:01');
INSERT INTO `archiwum_uzytkownicy` VALUES ('51', '      ', '$2y$10$PUZ/oK5mCXudZgu5CiKWPO1McRP9LzY/uga8bRjZlQVMmT8csI4Ye', 'aaa@aaa.pl', '', '', '', '2', '2017-02-06 11:58:21');
INSERT INTO `archiwum_uzytkownicy` VALUES ('55', 'matiwsrh1994', '$2y$10$zTOemYepB5OSzlxn3MLGF.7W/QQ9zU9fhps7SVmbNnmbk18LZaHIq', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '1', '2017-02-06 12:01:40');
INSERT INTO `archiwum_uzytkownicy` VALUES ('57', 'matiwsrh1994', '$2y$10$G2Xjyhvro5Y2Iq4kRHO/JuRrdQGx4tL1Kooz5XJCv0LWikv52tTe6', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '2', '2017-02-06 12:03:25');
INSERT INTO `archiwum_uzytkownicy` VALUES ('57', 'matiwsrh1994', '$2y$10$G2Xjyhvro5Y2Iq4kRHO/JuRrdQGx4tL1Kooz5XJCv0LWikv52tTe6', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '1', '2017-02-06 12:03:53');
INSERT INTO `archiwum_uzytkownicy` VALUES ('58', 'matiwsrh1994', '$2y$10$8O.wvBxsU2gHQs0qYc/Er.rJQWZ38z3wKAq7TkYTlEG2RXPK6rcRW', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '2', '2017-02-06 12:06:57');
INSERT INTO `archiwum_uzytkownicy` VALUES ('53', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '$2y$10$laljRlEl0w86UWwhbbJ3sO34xW2PwOFbF1QoiQKuENcQoQ7KpuOy6', 'aaaaaa@aaasaaa.pl', 'faeeaf', 'fawf', 'fawfwaf', '2', '2017-02-06 12:07:28');
INSERT INTO `archiwum_uzytkownicy` VALUES ('56', 'qqq', '$2y$10$V.w4tNdM8DKY76Vvae3t6ex.SMKYS0e/KoS3foDqeVnsnN9aZagfG', 'qqq@qqq.pl', '', '', '', '2', '2017-02-06 12:07:45');
INSERT INTO `archiwum_uzytkownicy` VALUES ('50', 'mama2', '$2y$10$w5WBwNU2WbfJhrUZV6TUdOIj4FHqcZbpSJkDWEG1eLjR3WVFOBovi', 'sdd@dsa.pl', 'dasdasd', 'dsadaw', 'dwaadwad', '2', '2017-02-06 12:09:45');
INSERT INTO `archiwum_uzytkownicy` VALUES ('52', 'mati.maciejak', '$2y$10$GAD4Y9AakXQAIWf8dyG9feZAQrl7lOD0rmCmPIRXVwe8Lr0sV0uVy', 'mati.hahah@o2.pl', 'Mateusz', '', '', '2', '2017-02-06 12:11:58');
INSERT INTO `archiwum_uzytkownicy` VALUES ('47', 'aaa', '$2y$10$M79kCDT0VCz7z59kNI5Di.VH5pSLMD4Ygzv.QelkGVhYATGFGNBZe', 'ccc@ccc', 'dwad', 'daw', 'dawd', '2', '2017-02-06 12:13:09');
INSERT INTO `archiwum_uzytkownicy` VALUES ('54', 'mati', '$2y$10$Pg0r.fJVsxxTBOQKzi/GG.7x4PemZgM6XF7JnUvX.NJ1GTxLvES8m', 'mati@mati.pl', 'Mati', 'Mati', 'Mati', '2', '2017-02-06 12:13:51');
INSERT INTO `archiwum_uzytkownicy` VALUES ('61', 'rrrr', '$2y$10$kNX.7yVRqEH8LUbp.wLYhOlptX9SdjU4wKv4oEsPSmCqvYER0Jo/K', 'rrr@rrr.pl', '', '', '', '2', '2017-02-06 12:33:57');
INSERT INTO `archiwum_uzytkownicy` VALUES ('60', 'qqq', '$2y$10$8sH1e8.AWwEyQ9rIml2JBOuZkWSI2SdjWcxwyxniaPfwpathQISza', 'qqq@qqq.pl', '', '', '', '2', '2017-02-06 12:34:15');
INSERT INTO `archiwum_uzytkownicy` VALUES ('59', 'aaaaa', '$2y$10$Cic7owaZqtr26.ztRn9c2OuB6tMNNOdFsH.t1etEcc6g/0x8plYSW', 'aaaaaa@aaasaaa.pl', '', '', '', '2', '2017-02-06 12:34:56');
INSERT INTO `archiwum_uzytkownicy` VALUES ('62', 'aaa', '$2y$10$mWx/Goa.6jZZlq3Ra8ykKeqo3qEn/kwMnXMUzl6aEAoWoqeVsdY7.', 'aaa@aaa.pl', '', '', '', '2', '2017-02-06 14:34:02');
INSERT INTO `archiwum_uzytkownicy` VALUES ('62', 'aaa', '$2y$10$gpJs0jNO2etevrJdSM0DcusKJeCrpdhdKD./NqX7ck2YZ11YXHNG2', 'aaa@aaa.pl', '', '', '', '2', '2017-02-06 14:34:30');
INSERT INTO `archiwum_uzytkownicy` VALUES ('62', 'aaa', '$2y$10$hqsx9eEL4eJhtT3V.T7nZ.8dKUZcwTAUOQcZxl0afwQ/oqQNtMy12', 'aaa@aaa.pl', '', '', '', '2', '2017-02-06 15:06:30');
INSERT INTO `archiwum_uzytkownicy` VALUES ('64', 'ddd', '$2y$10$ImnXk2YxiEIdl5Sr1Df1yethwUYplAst91yvV7F6LZYn9argxp4Tu', 'ddd@ddd.pl', '', '', '', '2', '2017-02-06 15:06:38');
INSERT INTO `archiwum_uzytkownicy` VALUES ('62', 'aaa', '$2y$10$hqsx9eEL4eJhtT3V.T7nZ.8dKUZcwTAUOQcZxl0afwQ/oqQNtMy12', 'aaa@aaa.pl', '', '', '', '3', '2017-02-06 15:07:27');
INSERT INTO `archiwum_uzytkownicy` VALUES ('58', 'matiwsrh1994', '$2y$10$8O.wvBxsU2gHQs0qYc/Er.rJQWZ38z3wKAq7TkYTlEG2RXPK6rcRW', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '1', '2017-02-06 15:07:32');
INSERT INTO `archiwum_uzytkownicy` VALUES ('58', 'matiwsrh1994', '$2y$10$8O.wvBxsU2gHQs0qYc/Er.rJQWZ38z3wKAq7TkYTlEG2RXPK6rcRW', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '2', '2017-02-06 15:08:30');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$n..vUkZm11xi3sc8QDvyd.synrTbsxJhJyBQDwAO3Hdgi7rJOkm7e', 'ccc@aaa.pl', 'ccc', 'ccc', 'ccc', '2', '2017-02-06 15:13:42');
INSERT INTO `archiwum_uzytkownicy` VALUES ('62', 'aaa', '$2y$10$hqsx9eEL4eJhtT3V.T7nZ.8dKUZcwTAUOQcZxl0afwQ/oqQNtMy12', 'aaa@aaa.pl', '', '', '', '2', '2017-02-06 15:13:48');
INSERT INTO `archiwum_uzytkownicy` VALUES ('63', 'bbb', '$2y$10$w1tV2doHj7aY3NlXg/CkL.MtKmpr97QC4fc.8MyopjEIBTB2AhRYe', 'bbb@bbb.pl', '', '', '', '2', '2017-02-06 15:13:53');
INSERT INTO `archiwum_uzytkownicy` VALUES ('46', 'ccc', '$2y$10$n..vUkZm11xi3sc8QDvyd.synrTbsxJhJyBQDwAO3Hdgi7rJOkm7e', 'ccc@aaa.pl', 'ccc', 'ccc', 'ccc', '3', '2017-02-07 01:43:35');
INSERT INTO `archiwum_uzytkownicy` VALUES ('65', 'eee', '$2y$10$VjMjGjjoW3UItK86bd.R0.jXlRIPR1k5X5Ae2desjp513AYmmrUx6', 'eee@eee.pl', '', '', '', '2', '2017-02-07 09:41:31');
INSERT INTO `archiwum_uzytkownicy` VALUES ('58', 'matiwsrh1994', '$2y$10$8O.wvBxsU2gHQs0qYc/Er.rJQWZ38z3wKAq7TkYTlEG2RXPK6rcRW', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '1', '2017-02-07 09:42:52');
INSERT INTO `archiwum_uzytkownicy` VALUES ('64', 'ddd', '$2y$10$ImnXk2YxiEIdl5Sr1Df1yethwUYplAst91yvV7F6LZYn9argxp4Tu', 'ddd@ddd.pl', '', '', '', '3', '2017-02-07 10:17:13');
INSERT INTO `archiwum_uzytkownicy` VALUES ('58', 'matiwsrh1994', '$2y$10$8O.wvBxsU2gHQs0qYc/Er.rJQWZ38z3wKAq7TkYTlEG2RXPK6rcRW', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejako', 'Pobiednik Mały', '1', '2017-02-12 11:59:08');

-- ----------------------------
-- Table structure for `marki`
-- ----------------------------
DROP TABLE IF EXISTS `marki`;
CREATE TABLE `marki` (
  `ID_MARKI` int(10) NOT NULL AUTO_INCREMENT,
  `NAZWA_MARKI` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_MARKI`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of marki
-- ----------------------------
INSERT INTO `marki` VALUES ('1', 'Samsung');
INSERT INTO `marki` VALUES ('2', 'Apple');
INSERT INTO `marki` VALUES ('3', 'Nokia');
INSERT INTO `marki` VALUES ('4', 'HTC');
INSERT INTO `marki` VALUES ('5', 'Sony');
INSERT INTO `marki` VALUES ('6', 'Sony Ericsson');
INSERT INTO `marki` VALUES ('7', 'Motorola');
INSERT INTO `marki` VALUES ('8', 'Huawei');
INSERT INTO `marki` VALUES ('9', 'Xiaomi');
INSERT INTO `marki` VALUES ('10', 'BlackBerry');
INSERT INTO `marki` VALUES ('11', 'LG');
INSERT INTO `marki` VALUES ('12', 'Microsoft');
INSERT INTO `marki` VALUES ('13', 'Lenovo');
INSERT INTO `marki` VALUES ('14', 'ZTE');
INSERT INTO `marki` VALUES ('15', 'OnePlus');
INSERT INTO `marki` VALUES ('16', 'Google');
INSERT INTO `marki` VALUES ('17', 'Asus');
INSERT INTO `marki` VALUES ('18', 'TP-LINK');
INSERT INTO `marki` VALUES ('19', 'Kruger&Matz');
INSERT INTO `marki` VALUES ('20', 'TCL');
INSERT INTO `marki` VALUES ('21', 'Vivo');
INSERT INTO `marki` VALUES ('22', 'OPPO');
INSERT INTO `marki` VALUES ('23', 'Meizu');
INSERT INTO `marki` VALUES ('24', 'Alcatel');
INSERT INTO `marki` VALUES ('25', 'Acer');

-- ----------------------------
-- Table structure for `modele`
-- ----------------------------
DROP TABLE IF EXISTS `modele`;
CREATE TABLE `modele` (
  `ID_MODELU` int(10) NOT NULL AUTO_INCREMENT,
  `NAZWA_MODELU` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `ID_MARKI` int(10) DEFAULT NULL,
  `ID_SYSTEMU` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_MODELU`),
  KEY `ID_WERSJI` (`ID_SYSTEMU`),
  KEY `ID_MARKI` (`ID_MARKI`),
  CONSTRAINT `MODEL_MARKA` FOREIGN KEY (`ID_MARKI`) REFERENCES `marki` (`ID_MARKI`),
  CONSTRAINT `MODEL_SYSTEM` FOREIGN KEY (`ID_SYSTEMU`) REFERENCES `systemy` (`ID_SYSTEMU`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of modele
-- ----------------------------
INSERT INTO `modele` VALUES ('1', 'Xperia X8', '6', '1');
INSERT INTO `modele` VALUES ('2', 'Xperia Neo V', '6', '1');
INSERT INTO `modele` VALUES ('3', 'Moto G (1st gen)', '7', '1');
INSERT INTO `modele` VALUES ('4', 'Moto G (2nd gen)', '7', '1');
INSERT INTO `modele` VALUES ('5', 'Moto E (1st gen)', '7', '1');
INSERT INTO `modele` VALUES ('6', 'Moto X (1st gen)', '7', '1');
INSERT INTO `modele` VALUES ('9', 'Galaxy S3', '1', '1');
INSERT INTO `modele` VALUES ('10', 'Galaxy S4', '1', '1');
INSERT INTO `modele` VALUES ('11', 'Galaxy S5', '1', '1');
INSERT INTO `modele` VALUES ('12', 'Galaxy S6', '1', '1');
INSERT INTO `modele` VALUES ('13', 'Galaxy S7', '1', '1');
INSERT INTO `modele` VALUES ('14', 'Galaxy Ace', '1', '1');
INSERT INTO `modele` VALUES ('15', 'P8', '8', '1');
INSERT INTO `modele` VALUES ('16', 'P8 Lite', '8', '1');
INSERT INTO `modele` VALUES ('17', 'P9', '8', '1');
INSERT INTO `modele` VALUES ('18', 'P9 Lite', '8', '1');
INSERT INTO `modele` VALUES ('19', 'Y5', '8', '1');
INSERT INTO `modele` VALUES ('21', 'Iconia Tab A100', '25', '1');
INSERT INTO `modele` VALUES ('22', 'Iconia Tab A101', '25', '1');
INSERT INTO `modele` VALUES ('23', 'Iconia Tab A500', '25', '1');
INSERT INTO `modele` VALUES ('24', 'Eee Pad Transformer', '17', '1');
INSERT INTO `modele` VALUES ('25', 'Eee Pad Transformer Prime', '17', '1');
INSERT INTO `modele` VALUES ('26', 'Amaze 4G', '4', '1');
INSERT INTO `modele` VALUES ('27', 'ChaCha', '4', '1');
INSERT INTO `modele` VALUES ('28', 'Desire', '4', '1');
INSERT INTO `modele` VALUES ('29', 'Desire HD', '4', '1');
INSERT INTO `modele` VALUES ('30', 'Desire S', '4', '1');
INSERT INTO `modele` VALUES ('31', 'EVO 3D', '4', '1');
INSERT INTO `modele` VALUES ('32', 'Explorer', '4', '1');
INSERT INTO `modele` VALUES ('33', 'Incredible S', '4', '1');
INSERT INTO `modele` VALUES ('34', 'Rezound', '4', '1');
INSERT INTO `modele` VALUES ('35', 'Rhyme', '4', '1');
INSERT INTO `modele` VALUES ('36', 'Sensation', '4', '1');
INSERT INTO `modele` VALUES ('37', 'Sensation XE', '4', '1');
INSERT INTO `modele` VALUES ('38', 'Sensation XL', '4', '1');
INSERT INTO `modele` VALUES ('39', 'Vivid', '4', '1');
INSERT INTO `modele` VALUES ('40', 'Wildfire', '4', '1');
INSERT INTO `modele` VALUES ('41', 'Wildfire S', '4', '1');
INSERT INTO `modele` VALUES ('42', 'Optimus 2X', '11', '1');
INSERT INTO `modele` VALUES ('43', 'Optimus 3D P920', '11', '1');
INSERT INTO `modele` VALUES ('44', 'Optimus Black P970', '11', '1');
INSERT INTO `modele` VALUES ('45', 'GT540', '11', '1');
INSERT INTO `modele` VALUES ('46', 'Optimus One P500', '11', '1');
INSERT INTO `modele` VALUES ('47', 'ATRIX', '7', '1');
INSERT INTO `modele` VALUES ('48', 'DEFY', '7', '1');
INSERT INTO `modele` VALUES ('49', 'DEFY+', '7', '1');
INSERT INTO `modele` VALUES ('50', 'Droid RAZR', '7', '1');
INSERT INTO `modele` VALUES ('51', 'XOOM', '7', '1');
INSERT INTO `modele` VALUES ('53', 'Galaxy Ace S5830', '1', '1');
INSERT INTO `modele` VALUES ('54', 'Galaxy Fit S5670', '1', '1');
INSERT INTO `modele` VALUES ('55', 'Galaxy Gio S5660', '1', '1');
INSERT INTO `modele` VALUES ('56', 'Galaxy Mini S5570', '1', '1');
INSERT INTO `modele` VALUES ('57', 'Galaxy Nexus', '1', '1');
INSERT INTO `modele` VALUES ('58', 'Galaxy Note', '1', '1');
INSERT INTO `modele` VALUES ('59', 'Galaxy W I8150', '1', '1');
INSERT INTO `modele` VALUES ('60', 'Galaxy Y S5360', '1', '1');
INSERT INTO `modele` VALUES ('61', 'I9000 Galaxy S', '1', '1');
INSERT INTO `modele` VALUES ('62', 'I9001 Galaxy S Plus', '1', '1');
INSERT INTO `modele` VALUES ('63', 'I9100 Galaxy S II', '1', '1');
INSERT INTO `modele` VALUES ('64', 'I9103 Galaxy R', '1', '1');
INSERT INTO `modele` VALUES ('65', 'P6200 Galaxy Tab 7.0 Plus', '1', '1');
INSERT INTO `modele` VALUES ('66', 'P6800 Galaxy Tab 7.7', '1', '1');
INSERT INTO `modele` VALUES ('67', 'Galaxy Tab 10.1', '1', '1');
INSERT INTO `modele` VALUES ('68', 'W8', '6', '1');
INSERT INTO `modele` VALUES ('69', 'Xperia active', '6', '1');
INSERT INTO `modele` VALUES ('70', 'Xperia Arc', '6', '1');
INSERT INTO `modele` VALUES ('71', 'Xperia Arc S', '6', '1');
INSERT INTO `modele` VALUES ('72', 'Xperia mini', '6', '1');
INSERT INTO `modele` VALUES ('73', 'Xperia mini pro', '6', '1');
INSERT INTO `modele` VALUES ('74', 'Xperia Neo', '6', '1');
INSERT INTO `modele` VALUES ('75', 'Xperia PLAY', '6', '1');
INSERT INTO `modele` VALUES ('76', 'Xperia pro', '6', '1');
INSERT INTO `modele` VALUES ('77', 'Xperia ray', '6', '1');
INSERT INTO `modele` VALUES ('78', 'Xperia x10', '6', '1');
INSERT INTO `modele` VALUES ('79', 'Xperia x10 mini', '6', '1');
INSERT INTO `modele` VALUES ('80', 'Xperia x10 mini pro', '6', '1');
INSERT INTO `modele` VALUES ('82', 'Curve 8520', '10', '4');
INSERT INTO `modele` VALUES ('83', 'Bold Touch 9900', '10', '4');
INSERT INTO `modele` VALUES ('84', 'Bold 9790', '10', '4');
INSERT INTO `modele` VALUES ('85', 'Curve 9380', '10', '4');
INSERT INTO `modele` VALUES ('86', 'Curve 9360', '10', '4');
INSERT INTO `modele` VALUES ('87', 'Bold 9780', '10', '4');
INSERT INTO `modele` VALUES ('88', 'Curve 3G 9300', '10', '4');
INSERT INTO `modele` VALUES ('89', 'Torch 9810', '10', '4');
INSERT INTO `modele` VALUES ('90', 'Torch 9860', '10', '4');
INSERT INTO `modele` VALUES ('91', 'PlayBook', '10', '4');
INSERT INTO `modele` VALUES ('92', 'Bold 9700', '10', '4');
INSERT INTO `modele` VALUES ('93', 'Torch 9800', '10', '4');
INSERT INTO `modele` VALUES ('94', 'Storm 9530', '10', '4');
INSERT INTO `modele` VALUES ('95', 'Bold 9000', '10', '4');
INSERT INTO `modele` VALUES ('96', 'Curve 8900', '10', '4');
INSERT INTO `modele` VALUES ('97', 'Storm 9500', '10', '4');
INSERT INTO `modele` VALUES ('98', 'Torch 9850', '10', '4');
INSERT INTO `modele` VALUES ('99', 'Curve 9370', '10', '4');
INSERT INTO `modele` VALUES ('100', 'IPhone 2G', '2', '2');
INSERT INTO `modele` VALUES ('101', 'IPhone 3G', '2', '2');
INSERT INTO `modele` VALUES ('102', 'IPhone 3GS', '2', '2');
INSERT INTO `modele` VALUES ('103', 'IPhone 4', '2', '2');
INSERT INTO `modele` VALUES ('104', 'IPhone 4S', '2', '2');
INSERT INTO `modele` VALUES ('105', 'IPad', '2', '2');
INSERT INTO `modele` VALUES ('106', 'Ipad 2', '2', '2');
INSERT INTO `modele` VALUES ('107', 'N8', '3', '5');
INSERT INTO `modele` VALUES ('108', 'C5', '3', '5');
INSERT INTO `modele` VALUES ('109', '500', '3', '5');
INSERT INTO `modele` VALUES ('110', 'E5', '3', '5');
INSERT INTO `modele` VALUES ('111', '6120 Classic', '3', '5');
INSERT INTO `modele` VALUES ('112', 'E7', '3', '5');
INSERT INTO `modele` VALUES ('113', 'C6', '3', '5');
INSERT INTO `modele` VALUES ('114', 'C7', '3', '5');
INSERT INTO `modele` VALUES ('115', 'E72', '3', '5');
INSERT INTO `modele` VALUES ('116', '701', '3', '5');
INSERT INTO `modele` VALUES ('117', '5800 XpressMusic', '3', '5');
INSERT INTO `modele` VALUES ('118', '700', '3', '5');
INSERT INTO `modele` VALUES ('119', 'E71', '3', '5');
INSERT INTO `modele` VALUES ('120', '5233', '3', '5');
INSERT INTO `modele` VALUES ('121', 'X7', '3', '5');
INSERT INTO `modele` VALUES ('122', '5230', '3', '5');
INSERT INTO `modele` VALUES ('123', 'X6', '3', '5');
INSERT INTO `modele` VALUES ('124', '603', '3', '5');
INSERT INTO `modele` VALUES ('125', 'N97', '3', '5');
INSERT INTO `modele` VALUES ('126', 'E63', '3', '5');
INSERT INTO `modele` VALUES ('127', '5530 XpressMusic', '3', '5');
INSERT INTO `modele` VALUES ('128', 'E52', '3', '5');
INSERT INTO `modele` VALUES ('129', 'N96', '3', '5');
INSERT INTO `modele` VALUES ('130', 'N82', '3', '5');
INSERT INTO `modele` VALUES ('131', 'E75', '3', '5');
INSERT INTO `modele` VALUES ('132', 'E66', '3', '5');
INSERT INTO `modele` VALUES ('133', 'N81', '3', '5');
INSERT INTO `modele` VALUES ('134', 'N70', '3', '5');
INSERT INTO `modele` VALUES ('135', '6700 Slide', '3', '5');
INSERT INTO `modele` VALUES ('136', 'E65', '3', '5');
INSERT INTO `modele` VALUES ('137', 'E51', '3', '5');
INSERT INTO `modele` VALUES ('138', 'N78', '3', '5');
INSERT INTO `modele` VALUES ('139', '6220 Classic', '3', '5');
INSERT INTO `modele` VALUES ('140', 'N85', '3', '5');
INSERT INTO `modele` VALUES ('141', '7 Mozart', '4', '3');
INSERT INTO `modele` VALUES ('142', '7 Pro', '4', '3');
INSERT INTO `modele` VALUES ('143', '7 Surround', '4', '3');
INSERT INTO `modele` VALUES ('144', 'Arrive', '4', '3');
INSERT INTO `modele` VALUES ('145', 'HD7', '4', '3');
INSERT INTO `modele` VALUES ('146', 'Radar', '4', '3');
INSERT INTO `modele` VALUES ('147', 'Titan', '4', '3');
INSERT INTO `modele` VALUES ('148', 'Trophy', '4', '3');
INSERT INTO `modele` VALUES ('149', 'C900 Optimus 7Q', '11', '3');
INSERT INTO `modele` VALUES ('150', 'E900 Optimus 7', '11', '3');
INSERT INTO `modele` VALUES ('151', 'Jil Sander Mobile', '11', '3');
INSERT INTO `modele` VALUES ('152', 'Quantum', '11', '3');
INSERT INTO `modele` VALUES ('153', 'Lumia 710', '3', '3');
INSERT INTO `modele` VALUES ('154', 'Lumia 800', '3', '3');
INSERT INTO `modele` VALUES ('155', 'Lumia 900', '3', '3');
INSERT INTO `modele` VALUES ('156', 'Focus', '1', '3');
INSERT INTO `modele` VALUES ('157', 'Focus S I937', '1', '3');
INSERT INTO `modele` VALUES ('158', 'I8700 Omnia 7', '1', '3');
INSERT INTO `modele` VALUES ('159', 'Omnia W I8350', '1', '3');
INSERT INTO `modele` VALUES ('160', 'Allegro', '15', null);
INSERT INTO `modele` VALUES ('161', 'Iphone 5s', '2', '2');
INSERT INTO `modele` VALUES ('162', 'Iphone 7', '2', '2');
INSERT INTO `modele` VALUES ('163', 'Pixel', '16', '1');
INSERT INTO `modele` VALUES ('164', 'Pixel XL', '16', '1');
INSERT INTO `modele` VALUES ('165', 'Galaxy Note 2', '1', '1');
INSERT INTO `modele` VALUES ('166', 'Ascend', '8', '1');
INSERT INTO `modele` VALUES ('167', 'RedMi 4 Pro', '9', '1');
INSERT INTO `modele` VALUES ('168', 'Enjoy 6s', '8', '1');
INSERT INTO `modele` VALUES ('169', 'Lumia 650', '12', '3');
INSERT INTO `modele` VALUES ('170', 'Lumia 950', '12', '3');
INSERT INTO `modele` VALUES ('171', 'Xperia XZ', '5', '1');
INSERT INTO `modele` VALUES ('172', 'X Compact', '5', '1');
INSERT INTO `modele` VALUES ('173', 'Xperia XA Ultra', '5', '1');
INSERT INTO `modele` VALUES ('174', 'X', '5', '1');

-- ----------------------------
-- Table structure for `oceny_modelu`
-- ----------------------------
DROP TABLE IF EXISTS `oceny_modelu`;
CREATE TABLE `oceny_modelu` (
  `ID_OCENY` int(10) NOT NULL AUTO_INCREMENT,
  `DATA_OCENY` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DATA_ZAKUPU` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `O_EKRAN` double(10,0) DEFAULT NULL,
  `O_WYGLAD` double(10,0) DEFAULT NULL,
  `O_BATERIA` double(10,0) DEFAULT NULL,
  `O_CENA_JAKOSC` double(10,0) DEFAULT NULL,
  `O_WYTRZYMALOSC` double(10,0) DEFAULT NULL,
  `O_APARAT` double(10,0) DEFAULT NULL,
  `O_OPROGRAMOWANIE` double(10,0) DEFAULT NULL,
  `O_DODATKI` double(10,0) DEFAULT NULL,
  `CZY_POLECASZ` tinyint(10) DEFAULT NULL,
  `OPINIA` varchar(5000) COLLATE utf8_polish_ci DEFAULT NULL,
  `OCENA_SMARTFONA` double(10,2) DEFAULT NULL,
  `ILE_KRYTERIOW` int(10) DEFAULT NULL,
  `ID_UZYTKOWNIKA` int(10) DEFAULT NULL,
  `ID_MODELU` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_OCENY`),
  KEY `ID_UZY` (`ID_UZYTKOWNIKA`),
  KEY `ID_MOD` (`ID_MODELU`),
  CONSTRAINT `OCENA_MODEL` FOREIGN KEY (`ID_MODELU`) REFERENCES `modele` (`ID_MODELU`),
  CONSTRAINT `OCENA_UZYTKOWNIK` FOREIGN KEY (`ID_UZYTKOWNIKA`) REFERENCES `uzytkownicy` (`ID_UZYTKOWNIKA`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of oceny_modelu
-- ----------------------------
INSERT INTO `oceny_modelu` VALUES ('56', '2017-02-07 01:13:16', '2017-02-01', '9', '7', '3', '10', '3', '10', '3', '10', '0', 'gwrgre', '6.11', '9', '46', '163');
INSERT INTO `oceny_modelu` VALUES ('59', '2017-02-07 01:44:20', '2017-02-01', '8', '0', '6', '5', '7', '8', '4', '7', '0', 'g3rg5g53', '5.63', '8', '58', '87');
INSERT INTO `oceny_modelu` VALUES ('60', '2017-02-07 01:44:50', '2017-02-02', '9', '7', '8', '9', '8', '8', '8', '9', '0', 'dawdawfaewf', '7.33', '9', '64', '163');
INSERT INTO `oceny_modelu` VALUES ('61', '2017-02-07 01:45:02', '2017-02-01', '5', '10', '9', '5', '9', '4', '9', '9', '0', 'faewfawf', '6.67', '9', '64', '87');
INSERT INTO `oceny_modelu` VALUES ('62', '2017-02-07 01:45:14', '2017-02-02', '9', '8', '6', '3', '9', '5', '9', '7', '0', 'wafawfa', '6.22', '9', '64', '106');
INSERT INTO `oceny_modelu` VALUES ('63', '2017-02-07 01:49:30', '2016-10-13', '9', '6', '6', '3', '7', '9', '5', '9', '0', 'asdawdawdwada', '6.00', '9', '62', '55');
INSERT INTO `oceny_modelu` VALUES ('64', '2017-02-07 01:49:46', '2017-02-01', '8', '10', '10', '10', '10', '9', '8', '7', '0', 'dwasdawda', '8.00', '9', '62', '10');
INSERT INTO `oceny_modelu` VALUES ('66', '2017-02-07 01:50:37', '2017-02-02', '9', '9', '8', '7', '8', '10', '8', '8', '0', 'yw64yh64eyhew4y6', '7.44', '9', '62', '161');
INSERT INTO `oceny_modelu` VALUES ('67', '2017-02-07 10:07:58', '2016-11-11', '10', '6', '10', '9', '1', '5', '6', '4', '1', 'Pocem ten smartfon jest świetny', '6.78', '9', '58', '167');
INSERT INTO `oceny_modelu` VALUES ('68', '2017-02-07 10:10:01', '2017-02-03', '6', '9', '3', '8', '6', '8', '8', '5', '1', 'gevwhuiuuiarfaroiighripeuhgeruiwghreiuhger[oigherqipghrpiuuiipupiuwegiuguipewhgfpweghewpiughwerpiuegwhoiewhiowegig', '7.00', '9', '46', '167');
INSERT INTO `oceny_modelu` VALUES ('69', '2017-02-07 10:15:10', '2017-02-03', '7', '9', '0', '8', '0', '0', '0', '0', '0', 'jhgwreoiupgweiupgohiowrpoiugoiuwrohiuwefoihewfpoi', '8.00', '3', '46', '24');
INSERT INTO `oceny_modelu` VALUES ('70', '2017-02-12 11:02:40', '2017-02-03', '6', '3', '9', '7', '2', '8', '7', '1', '0', '', '4.78', '9', '58', '25');
INSERT INTO `oceny_modelu` VALUES ('71', '2017-02-12 11:06:47', '2017-02-08', '5', '4', '3', '3', '2', '3', '6', '6', '0', '', '3.56', '9', '58', '24');
INSERT INTO `oceny_modelu` VALUES ('72', '2017-02-12 14:22:04', '2017-02-01', '5', '8', '9', '3', '6', '8', '5', '8', '0', '<script>alert(\\\"helle\\\")</script>', '5.78', '9', '58', '164');
INSERT INTO `oceny_modelu` VALUES ('73', '2017-02-12 14:25:16', '2017-02-01', '7', '8', '7', '6', '9', '9', '7', '8', '0', '<h1>COSOFKASF</h1>', '6.78', '9', '58', '97');
INSERT INTO `oceny_modelu` VALUES ('74', '2017-02-12 14:33:25', '2017-02-01', '6', '5', '5', '6', '6', '6', '6', '6', '0', '<script>alert(\\\"hello\\\")</script>', '5.11', '9', '58', '45');
INSERT INTO `oceny_modelu` VALUES ('75', '2017-02-12 14:37:20', '2017-02-02', '5', '6', '7', '7', '4', '7', '5', '7', '1', '<script>document.write(\\\"UNTRUSTED INPUT: \\\" + document.location.hash);<script/>', '6.44', '9', '58', '16');
INSERT INTO `oceny_modelu` VALUES ('76', '2017-02-12 16:50:22', 'ccqcwqdc', '7', '5', '4', '0', '0', '0', '0', '0', '0', 'cwqcqw', '5.33', '3', '46', '25');

-- ----------------------------
-- Table structure for `parametry`
-- ----------------------------
DROP TABLE IF EXISTS `parametry`;
CREATE TABLE `parametry` (
  `ID_PARAMETRU` int(10) NOT NULL,
  `EKRAN` float(10,0) DEFAULT NULL,
  `ROZDZIELCZOSC` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `APARAT` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `KAMERA` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `PROCESOR` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `LICZBA_RDZENI` int(10) DEFAULT NULL,
  `RAM` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `PAMIEC` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `KARTA_SD` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `BATERIA` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `WAGA` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `ID_MODELU` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_PARAMETRU`),
  KEY `ID_MODELU` (`ID_MODELU`),
  CONSTRAINT `PARAMETRY_MODEL` FOREIGN KEY (`ID_MODELU`) REFERENCES `modele` (`ID_MODELU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of parametry
-- ----------------------------

-- ----------------------------
-- Table structure for `probylogowania`
-- ----------------------------
DROP TABLE IF EXISTS `probylogowania`;
CREATE TABLE `probylogowania` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `IP` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `CZAS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BLOKADA` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of probylogowania
-- ----------------------------

-- ----------------------------
-- Table structure for `sesja`
-- ----------------------------
DROP TABLE IF EXISTS `sesja`;
CREATE TABLE `sesja` (
  `ID_SESJA` int(10) NOT NULL AUTO_INCREMENT,
  `ID_UZYTKOWNIKA` int(10) DEFAULT NULL,
  `ID` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `IP` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `WEB` varchar(500) COLLATE utf8_polish_ci DEFAULT NULL,
  `TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TYP_UZYT` int(10) NOT NULL,
  PRIMARY KEY (`ID_SESJA`),
  KEY `UZYTKOWNIK_SESJA` (`ID_UZYTKOWNIKA`),
  KEY `TYP_SESJA` (`TYP_UZYT`),
  CONSTRAINT `TYP_SESJA` FOREIGN KEY (`TYP_UZYT`) REFERENCES `typ_uzytkownika` (`ID_TYP`),
  CONSTRAINT `UZYTKOWNIK_SESJA` FOREIGN KEY (`ID_UZYTKOWNIKA`) REFERENCES `uzytkownicy` (`ID_UZYTKOWNIKA`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of sesja
-- ----------------------------
INSERT INTO `sesja` VALUES ('134', '58', '0241237516e4e712bc773e13ae254fd9a0c0ac44', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', '2017-02-12 16:51:46', '1');

-- ----------------------------
-- Table structure for `systemy`
-- ----------------------------
DROP TABLE IF EXISTS `systemy`;
CREATE TABLE `systemy` (
  `ID_SYSTEMU` int(10) NOT NULL AUTO_INCREMENT,
  `NAZWA_SYSTEMU` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `TWORCA` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_SYSTEMU`),
  UNIQUE KEY `NAZWA_SYSTEMU` (`NAZWA_SYSTEMU`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of systemy
-- ----------------------------
INSERT INTO `systemy` VALUES ('1', 'Android', 'Google');
INSERT INTO `systemy` VALUES ('2', 'iOS', 'Apple');
INSERT INTO `systemy` VALUES ('3', 'Windows Phone', 'Microsoft');
INSERT INTO `systemy` VALUES ('4', 'BlackBerry OS', 'BlackBerry');
INSERT INTO `systemy` VALUES ('5', 'Symbian', 'Nokia');
INSERT INTO `systemy` VALUES ('6', 'Windows Mobile', 'Microsoft');
INSERT INTO `systemy` VALUES ('7', 'bada OS', 'Samsung');

-- ----------------------------
-- Table structure for `typ_uzytkownika`
-- ----------------------------
DROP TABLE IF EXISTS `typ_uzytkownika`;
CREATE TABLE `typ_uzytkownika` (
  `ID_TYP` int(10) NOT NULL AUTO_INCREMENT,
  `NAZWA_TYP` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_TYP`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of typ_uzytkownika
-- ----------------------------
INSERT INTO `typ_uzytkownika` VALUES ('1', 'ADMIN');
INSERT INTO `typ_uzytkownika` VALUES ('2', 'UZYTKOWNIK');
INSERT INTO `typ_uzytkownika` VALUES ('3', 'MODERATOR');

-- ----------------------------
-- Table structure for `uzytkownicy`
-- ----------------------------
DROP TABLE IF EXISTS `uzytkownicy`;
CREATE TABLE `uzytkownicy` (
  `ID_UZYTKOWNIKA` int(10) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `HASLO` varchar(300) COLLATE utf8_polish_ci DEFAULT NULL,
  `MAIL` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `IMIE` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `NAZWISKO` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `MIASTO` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `ID_TYP` int(10) NOT NULL DEFAULT '2',
  PRIMARY KEY (`ID_UZYTKOWNIKA`),
  KEY `ID_TYP` (`ID_TYP`),
  CONSTRAINT `UZYTKOWNIK_TYP` FOREIGN KEY (`ID_TYP`) REFERENCES `typ_uzytkownika` (`ID_TYP`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- ----------------------------
-- Records of uzytkownicy
-- ----------------------------
INSERT INTO `uzytkownicy` VALUES ('46', 'ccc', '$2y$10$n..vUkZm11xi3sc8QDvyd.synrTbsxJhJyBQDwAO3Hdgi7rJOkm7e', 'ccc@aaa.pl', 'ccc', 'ccc', 'ccc', '2');
INSERT INTO `uzytkownicy` VALUES ('58', 'matiwsrh1994', '$2y$10$8O.wvBxsU2gHQs0qYc/Er.rJQWZ38z3wKAq7TkYTlEG2RXPK6rcRW', 'matiwsrh1994@gmail.com', 'Mateusz', 'Maciejak', 'Pobiednik Mały', '1');
INSERT INTO `uzytkownicy` VALUES ('62', 'aaa', '$2y$10$hqsx9eEL4eJhtT3V.T7nZ.8dKUZcwTAUOQcZxl0afwQ/oqQNtMy12', 'aaa@aaa.pl', '', '', '', '2');
INSERT INTO `uzytkownicy` VALUES ('63', 'bbb', '$2y$10$w1tV2doHj7aY3NlXg/CkL.MtKmpr97QC4fc.8MyopjEIBTB2AhRYe', 'bbb@bbb.pl', '', '', '', '3');
INSERT INTO `uzytkownicy` VALUES ('64', 'ddd', '$2y$10$ImnXk2YxiEIdl5Sr1Df1yethwUYplAst91yvV7F6LZYn9argxp4Tu', 'ddd@ddd.pl', '', '', '', '2');
INSERT INTO `uzytkownicy` VALUES ('65', 'eee', '$2y$10$VjMjGjjoW3UItK86bd.R0.jXlRIPR1k5X5Ae2desjp513AYmmrUx6', 'eee@eee.pl', '', '', '', '3');
INSERT INTO `uzytkownicy` VALUES ('66', 'cccc', '$2y$10$mcoVYuQeVU0SjB63xAm8muXG7VAWFbzZw0nC.UfGNnfsmpuKXn3ha', 'abc@abc.pl', '', '', '', '2');
INSERT INTO `uzytkownicy` VALUES ('67', 'qqqq', '$2y$10$Dx0jVBU8TPu88gOXG07X0OOpGMug.Ahoejo3GczomvV5CCdyCtUci', 'qqqq@qq.pl', 'fef', 'fwafqa', 'few', '2');
INSERT INTO `uzytkownicy` VALUES ('68', 'mati.maciejak', '$2y$10$rxZaCMWZo./sJCpDhBk.W.a59ys1cpX15JyItj9Gnmk1DVIUn0a3q', 'aaa@sdasd.pl', '', '', '', '2');

-- ----------------------------
-- View structure for `pokaz_oceny_data`
-- ----------------------------
DROP VIEW IF EXISTS `pokaz_oceny_data`;
CREATE ALGORITHM=UNDEFINED DEFINER=`mamaciej`@`localhost` SQL SECURITY DEFINER VIEW `pokaz_oceny_data` AS select `oceny_modelu`.`OCENA_SMARTFONA` AS `OCENA_SMARTFONA`,`oceny_modelu`.`DATA_OCENY` AS `DATA_OCENY`,`marki`.`NAZWA_MARKI` AS `NAZWA_MARKI`,`modele`.`NAZWA_MODELU` AS `NAZWA_MODELU` from ((`oceny_modelu` join `marki`) join `modele`) where ((`oceny_modelu`.`ID_MODELU` = `modele`.`ID_MODELU`) and (`modele`.`ID_MARKI` = `marki`.`ID_MARKI`)) order by `oceny_modelu`.`DATA_OCENY` desc limit 5 ;

-- ----------------------------
-- Procedure structure for `INSERT_SYSTEM`
-- ----------------------------
DROP PROCEDURE IF EXISTS `INSERT_SYSTEM`;
DELIMITER ;;
CREATE DEFINER=`mamaciej`@`localhost` PROCEDURE `INSERT_SYSTEM`(IN `NAZWA_SYSTEMU_IN` varchar(100),IN `TWORCA_IN` varchar(100))
BEGIN
	declare exit handler for sqlstate '23000'
begin
	signal sqlstate '45000' set message_text="Podany system już istnieje !", mysql_errno='1001';
end;

INSERT INTO SYSTEMY (NAZWA_SYSTEMU, TWORCA) VALUES (NAZWA_SYSTEMU_IN, TWORCA_IN);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `USUN_OCENE`
-- ----------------------------
DROP PROCEDURE IF EXISTS `USUN_OCENE`;
DELIMITER ;;
CREATE DEFINER=`mamaciej`@`localhost` PROCEDURE `USUN_OCENE`(IN `ID_OCENY_IN` int,IN `ID_UZYTKOWNIKA_IN` int)
BEGIN
	DELETE FROM OCENY_MODELU WHERE ID_OCENY = ID_OCENY_IN AND ID_UZYTKOWNIKA = ID_UZYTKOWNIKA_IN;

END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for `SUMA_ID_MODELU`
-- ----------------------------
DROP FUNCTION IF EXISTS `SUMA_ID_MODELU`;
DELIMITER ;;
CREATE DEFINER=`mamaciej`@`localhost` FUNCTION `SUMA_ID_MODELU`(`ID_MODELU_IN` int) RETURNS double
BEGIN
	
	DECLARE C double;

	DECLARE EXIT HANDLER FOR SQLEXCEPTION
begin
return 0;
end;
	SELECT SUM(OCENA_SMARTFONA) INTO C FROM OCENY_MODELU WHERE ID_MODELU = ID_MODELU_IN;

	RETURN C;
END
;;
DELIMITER ;

-- ----------------------------
-- Event structure for `CZYSZCZENIE`
-- ----------------------------
DROP EVENT IF EXISTS `CZYSZCZENIE`;
DELIMITER ;;
CREATE DEFINER=`mmaciejak`@`%` EVENT `CZYSZCZENIE` ON SCHEDULE EVERY 1 MINUTE STARTS '2016-10-27 10:23:08' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM ARCHIWUM_UZYTKOWNICY
	WHERE DATEDIFF(CURRENT_TIMESTAMP,DATA) > 2
;;
DELIMITER ;

-- ----------------------------
-- Event structure for `CZYSZCZENIE_PROB_LOGOWANIA`
-- ----------------------------
DROP EVENT IF EXISTS `CZYSZCZENIE_PROB_LOGOWANIA`;
DELIMITER ;;
CREATE DEFINER=`mamaciej`@`localhost` EVENT `CZYSZCZENIE_PROB_LOGOWANIA` ON SCHEDULE EVERY 1 MINUTE STARTS '2016-12-09 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM probylogowania
WHERE TIMESTAMPDIFF(MINUTE, CZAS, CURRENT_TIMESTAMP) > 10
;;
DELIMITER ;

-- ----------------------------
-- Event structure for `CZYSZCZENIE_SESJI`
-- ----------------------------
DROP EVENT IF EXISTS `CZYSZCZENIE_SESJI`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `CZYSZCZENIE_SESJI` ON SCHEDULE EVERY 1 DAY STARTS '2016-12-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM SESJA
WHERE DATEDIFF(CURRENT_TIMESTAMP,TIME) > 1
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `sprawdzenie_insert`;
DELIMITER ;;
CREATE TRIGGER `sprawdzenie_insert` BEFORE INSERT ON `uzytkownicy` FOR EACH ROW IF lower(NEW.LOGIN)<>NEW.LOGIN then
set NEW.LOGIN = lower(NEW.LOGIN);
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `sprawdzenie_update`;
DELIMITER ;;
CREATE TRIGGER `sprawdzenie_update` BEFORE UPDATE ON `uzytkownicy` FOR EACH ROW IF lower(NEW.LOGIN)<>NEW.LOGIN then
set NEW.LOGIN = lower(NEW.LOGIN);
END IF
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `archiwizacja_after_update`;
DELIMITER ;;
CREATE TRIGGER `archiwizacja_after_update` AFTER UPDATE ON `uzytkownicy` FOR EACH ROW INSERT INTO ARCHIWUM_UZYTKOWNICY(ID_UZYTKOWNIKA, LOGIN, HASLO, MAIL, IMIE, NAZWISKO, MIASTO, TYP_UZYTKOWNIKA,  DATA)
values(OLD.ID_UZYTKOWNIKA, OLD.LOGIN, OLD.HASLO, OLD.MAIL, OLD.IMIE, OLD.NAZWISKO,OLD.MIASTO, OLD.ID_TYP, CURRENT_TIMESTAMP)
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `archiwizacja_after_delete`;
DELIMITER ;;
CREATE TRIGGER `archiwizacja_after_delete` AFTER DELETE ON `uzytkownicy` FOR EACH ROW INSERT INTO ARCHIWUM_UZYTKOWNICY(ID_UZYTKOWNIKA, LOGIN, HASLO, MAIL, IMIE, NAZWISKO, MIASTO, TYP_UZYTKOWNIKA, DATA)
values(OLD.ID_UZYTKOWNIKA, OLD.LOGIN, OLD.HASLO, OLD.MAIL, OLD.IMIE, OLD.NAZWISKO,OLD.MIASTO, OLD.ID_TYP, CURRENT_TIMESTAMP)
;;
DELIMITER ;
