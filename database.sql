create database stephen;

use stephen;

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL auto_increment,
  `btitle` varchar(100) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `auth` varchar(100) NOT NULL,
  `pub` varchar(100) NOT NULL,
  `yearpub` int(4) NOT NULL,
  PRIMARY KEY  (`id`)
);