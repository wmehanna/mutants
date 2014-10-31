SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `analysts`;
CREATE TABLE IF NOT EXISTS `analysts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationdate` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `analysts` (`id`, `lastname`, `firstname`, `username`, `password`, `creationdate`) VALUES
(1, 'Mehanna', 'Wassim', 'wmehanna', 'eaca3b7137dc66b23401684eeb88af4e', NULL),
(2, 'Ma', 'Morakat', 'mma', 'a9f9d8d4b6db81aed3933664f7352542', NULL),
(3, 'Bedard', 'Yannick', 'ybedard', '65831f34e3c7b371f2687e6ff09a90e2', NULL);

DROP TABLE IF EXISTS `analysts_clients_assoc`;
CREATE TABLE IF NOT EXISTS `analysts_clients_assoc` (
  `id` int(11) NOT NULL auto_increment,
  `analysts_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `analysts_clients_assoc` (`id`, `analysts_id`, `clients_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3);

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `isactive` int(11) NOT NULL default '1',
  `imagepath` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `clients` (`id`, `name`, `isactive`, `imagepath`) VALUES
(1, 'Tim Hortons', 1, './logos/timhortons.jpg'),
(2, 'Boutique informatique', 1, ''),
(3, 'Logiciel résultat UQAM', 1, './logos/uqam.jpg');

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` varchar(255) NOT NULL,
  `recordid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `masters`;
CREATE TABLE IF NOT EXISTS `masters` (
  `id` int(11) NOT NULL auto_increment,
  `id_analysts` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `masters` (`id`, `id_analysts`) VALUES
(1, 1);

DROP TABLE IF EXISTS `tb1`;
CREATE TABLE IF NOT EXISTS `tb1` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) NOT NULL,
  `text_1` varchar(255) default NULL,
  `text_2` varchar(255) default NULL,
  `text_3` varchar(255) default NULL,
  `parentkey_9` varchar(255) default NULL,
  `parentkey_15` varchar(255) default NULL,
  `sectiontitle_18` varchar(255) default NULL,
  `memo_25` varchar(255) default NULL,
  `sectiontitle_28` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `tb1` (`id`, `isactive`, `text_1`, `text_2`, `text_3`, `parentkey_9`, `parentkey_15`, `sectiontitle_18`, `memo_25`, `sectiontitle_28`) VALUES
(1, 1, 'Mehanna', 'Wassim', 'MEHW11078301', NULL, NULL, NULL, 'w4l0dWRpYW50IGVuIHNjaWVuY2Vz', NULL),
(2, 1, 'Ma', 'Morakat', 'MMAF33450899', NULL, NULL, NULL, '', NULL),
(3, 1, 'Bédard', 'Yannick', 'YAN12121235', NULL, NULL, NULL, '', NULL),
(4, 1, 'Lapointe', 'Bob', 'LAPB12435608', NULL, NULL, NULL, '', NULL),
(5, 1, 'Roman', 'François', 'FRAR11056309', NULL, NULL, NULL, '', NULL),
(6, 1, 'Gérard', 'Jean', 'GERJ33445566', NULL, NULL, NULL, '', NULL),
(7, 1, 'Legault', 'Jacques', 'JACL12368905', NULL, NULL, NULL, '', NULL),
(8, 1, 'labontée', 'René', 'RENL14151618', NULL, NULL, NULL, '', NULL),
(9, 1, 'Lavallée', 'Robert', 'LAVR15235499', NULL, NULL, NULL, '', NULL);

DROP TABLE IF EXISTS `tb2`;
CREATE TABLE IF NOT EXISTS `tb2` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) NOT NULL default '1',
  `text_4` varchar(255) default NULL,
  `foreignkey_8` varchar(255) default NULL,
  `parentkey_10` varchar(255) default NULL,
  `foreignkey_12` varchar(255) default NULL,
  `parentkey_13` varchar(255) default NULL,
  `query_14` varchar(255) default NULL,
  `foreignkey_16` varchar(255) default NULL,
  `query_17` varchar(255) default NULL,
  `sectiontitle_19` varchar(255) default NULL,
  `query_36` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `tb2` (`id`, `isactive`, `text_4`, `foreignkey_8`, `parentkey_10`, `foreignkey_12`, `parentkey_13`, `query_14`, `foreignkey_16`, `query_17`, `sectiontitle_19`, `query_36`) VALUES
(1, 1, '', '1', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(2, 1, '', '2', NULL, '', NULL, NULL, '4', NULL, NULL, NULL),
(3, 1, '', '3', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(4, 1, '', '5', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(5, 1, '', '8', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(6, 1, '', '6', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(7, 1, '', '9', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(8, 1, '', '7', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(9, 1, '', '4', NULL, '', NULL, NULL, '', NULL, NULL, NULL);

DROP TABLE IF EXISTS `tb3`;
CREATE TABLE IF NOT EXISTS `tb3` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) NOT NULL default '1',
  `numeric_5` varchar(255) default NULL,
  `numeric_6` varchar(255) default NULL,
  `foreignkey_7` varchar(255) default NULL,
  `foreignkey_23` varchar(255) default NULL,
  `query_24` varchar(255) default NULL,
  `text_29` varchar(255) default NULL,
  `sectiontitle_30` varchar(255) default NULL,
  `query_37` varchar(255) default NULL,
  `text_38` varchar(255) default NULL,
  `query_39` varchar(255) default NULL,
  `query_40` varchar(255) default NULL,
  `memo_41` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

INSERT INTO `tb3` (`id`, `isactive`, `numeric_5`, `numeric_6`, `foreignkey_7`, `foreignkey_23`, `query_24`, `text_29`, `sectiontitle_30`, `query_37`, `text_38`, `query_39`, `query_40`, `memo_41`) VALUES
(1, 1, '72', '50', '1', '2', NULL, '', NULL, NULL, '', NULL, NULL, 'TCdleGFtZW4gaW50cmEgZXN0IHBhc3NhYmxlLCBtYWlzIGxlIGZpbmFsIGF1cmFpdCBwdSDDqnRyZSBtaWV1eCBmYWl0Lg=='),
(2, 1, '22', '0', '1', '1', NULL, '', NULL, NULL, '', NULL, NULL, 'QXVjdW4gZWZmb3J0IMOgIGwnZXhhbWVuIGludHJhLg=='),
(3, 1, '50', '60', '1', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, '80', '80', '2', '4', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(5, 1, '90', '88', '3', '8', NULL, '', NULL, NULL, '', NULL, NULL, 'RXhjZWxsZW50'),
(6, 1, '50', '100', '3', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, '12', '33', '4', '7', NULL, '', NULL, NULL, '', NULL, NULL, 'RMOpZmluaXRpdmVtZW50IGlsIHkgYSB1biBwcm9ibMOobWUuICBBdWN1bmUgcHLDqXNlbmNlIGRhbnMgbGUgY291cnMu'),
(8, 1, '85', '12', '3', '5', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(9, 1, '10', '90', '1', '4', NULL, '', NULL, NULL, '', NULL, NULL, 'V293ICEgdm91cyBwYXNzZXogbWFpcyBkZSBqdXN0ZXNzZSEgVHLDqHMgYmllbiBwb3VyIGxlIGZpbmFsIQ=='),
(10, 1, '-30', '-10', '2', '1', NULL, '', NULL, NULL, '', NULL, NULL, 'VHLDqHMgYmllbiE='),
(11, 1, '0', '0', '3', '1', NULL, '', NULL, NULL, '', NULL, NULL, ''),
(12, 1, '10.99999999', 'patate', '4', '1', NULL, '', NULL, NULL, '', NULL, NULL, 'Vm91cyBkZXZleiByZXByZW5kcmUgY2UgY291cnMu'),
(13, 1, '99', '33', '9', '2', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(14, 1, '73', '66', '4', '2', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(15, 1, '95', '78', '7', '4', NULL, '', NULL, NULL, '', NULL, NULL, 'w4lsw6h2ZSBtb2TDqGxl'),
(16, 1, '62', '63', '5', '4', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(17, 1, '56', '30', '8', '4', NULL, '', NULL, NULL, '', NULL, NULL, 'SWwgbmUgdm91cyBtYW5xdWFpdCBxdWUgNyUgcG91ciBwYXNzZXIh'),
(18, 1, '78', '55', '1', '5', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(19, 1, '99', '90', '9', '5', NULL, '', NULL, NULL, '', NULL, NULL, 'Vm91cyDDqnRlcyBpbnZpdMOpIMOgIMOqdHJlIGTDqW1vbnN0cmF0ZXVyIGRhbnMgbGUgY291cnMgZGUgbGEgcHJvY2hhaW5lIHNlc3Npb24u'),
(20, 1, '89', '70', '5', '5', NULL, '', NULL, NULL, '', NULL, NULL, NULL),
(21, 1, '11', '22', '7', '8', NULL, '', NULL, NULL, '', NULL, NULL, '');

DROP TABLE IF EXISTS `tb4`;
CREATE TABLE IF NOT EXISTS `tb4` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) NOT NULL default '1',
  `text_11` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

INSERT INTO `tb4` (`id`, `isactive`, `text_11`) VALUES
(1, 1, 'INF1120'),
(2, 1, 'INF2120'),
(3, 1, 'INF1130'),
(4, 1, 'INF5151'),
(5, 1, 'INM5151'),
(6, 1, 'INF3135'),
(7, 1, 'INF3105'),
(8, 1, 'INF4105'),
(9, 1, 'INF2160'),
(10, 1, 'INF3143'),
(11, 1, 'INF3172'),
(12, 1, 'INF3180'),
(13, 1, 'INF3270'),
(14, 1, 'INF4170'),
(15, 1, 'INF4375'),
(16, 1, 'INF5153'),
(17, 1, 'INF5180'),
(18, 1, 'INF6150');

DROP TABLE IF EXISTS `tb5`;
CREATE TABLE IF NOT EXISTS `tb5` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `text_20` varchar(255) default NULL,
  `numeric_26` varchar(255) default NULL,
  `query_27` varchar(255) default NULL,
  `text_49` varchar(255) default NULL,
  `numeric_50` varchar(255) default NULL,
  `memo_51` varchar(255) default NULL,
  `boolean_52` varchar(255) default NULL,
  `boolean_56` varchar(255) default NULL,
  `text_57` varchar(255) default NULL,
  `memo_58` varchar(255) default NULL,
  `numeric_59` varchar(255) default NULL,
  `text_60` varchar(255) default NULL,
  `memo_61` varchar(255) default NULL,
  `numeric_62` varchar(255) default NULL,
  `text_63` varchar(255) default NULL,
  `foreignkey_74` varchar(255) default NULL,
  `query_75` varchar(255) default NULL,
  `boolean_76` varchar(255) default NULL,
  `query_77` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

INSERT INTO `tb5` (`id`, `isactive`, `text_20`, `numeric_26`, `query_27`, `text_49`, `numeric_50`, `memo_51`, `boolean_52`, `boolean_56`, `text_57`, `memo_58`, `numeric_59`, `text_60`, `memo_61`, `numeric_62`, `text_63`, `foreignkey_74`, `query_75`, `boolean_76`, `query_77`) VALUES
(6, 1, 'Tomate', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIDEwa2c=', '2.50', '', '1', NULL, 'on', NULL),
(7, 1, 'Laitue', '', NULL, '', '', '', '', '', '', '', '', '', 'Y2Fpc3NlIGRlIDEyIGxhaXR1ZXM=', '3.00', '', '1', NULL, '', NULL),
(8, 1, 'Pain Panini', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIDEyIHBhaW5z', '2.00', '', '1', NULL, 'on', NULL),
(9, 1, 'Mayonnaise', '', NULL, '', '', '', '', '', '', '', '', '', 'MTIgcG90IGRlIDFrZw==', '6.90', '', '1', NULL, 'on', NULL),
(10, 1, 'Poulet et nouille', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG9ubmUgMSBjaGF1ZHJvbg==', '5.00', '', '2', NULL, 'on', NULL),
(11, 1, 'Crème de brocoli', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG9ubmUgMSBjaGF1ZHJvbg==', '5.00', '', '2', NULL, '', NULL),
(12, 1, 'Minestrone', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG9ubmUgMSBjaGF1ZHJvbg==', '5.00', '', '2', NULL, 'on', NULL),
(13, 1, 'Muffins aux carottes', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG91emFpbmU=', '2.50', '', '3', NULL, 'on', NULL),
(14, 1, 'Muffins aux bleuets', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG91emFpbmU=', '2.50', '', '3', NULL, 'on', NULL),
(15, 1, 'Muffins double chocolat', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG91emFpbmU=', '2.50', '', '3', NULL, '', NULL),
(16, 1, 'Crème Boston', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIDI0IGJlaWduZXM=', '3.50', '', '3', NULL, 'on', NULL),
(17, 1, 'Roussette', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIDI0IGJlaWduZXM=', '3.50', '', '3', NULL, 'on', NULL),
(18, 1, 'Danoise', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIGRvdXpl', '1.50', '', '3', NULL, 'on', NULL),
(19, 1, 'Croissant au fromage', '', NULL, '', '', '', '', '', '', '', '', '', 'MjQsIGNvbmdlbMOpcw==', '1.95', '', '3', NULL, '', NULL),
(20, 1, 'Croissant aux amandes', '', NULL, '', '', '', '', '', '', '', '', '', 'MjQsIGNvbmdlbMOpcw==', '1.95', '', '3', NULL, 'on', NULL),
(21, 1, 'Lait', '', NULL, '', '', '', '', '', '', '', '', '', 'MThM', '3.00', '', '4', NULL, 'on', NULL),
(22, 1, 'Sucre', '', NULL, '', '', '', '', '', '', '', '', '', 'MjQgc2FjIGRlIDJrZw==', '10.00', '', '4', NULL, 'on', NULL),
(23, 1, 'Grains de café', '', NULL, '', '', '', '', '', '', '', '', '', 'MTBrZw==', '12.95', '', '4', NULL, '', NULL),
(24, 1, 'Saveur Vanille', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIDUgbGl0cmUgw6AgbGEgdmFuaWxsZSwgcG91ciBsZXMgbGF0dMOpcw==', '2.00', '', '4', NULL, '', NULL),
(25, 1, 'Dinde en tranche', '', NULL, '', '', '', '', '', '', '', '', '', 'MTAwIHRyYW5jaGVz', '2.45', '', '1', NULL, 'on', NULL),
(26, 1, 'Cup Petit', '', NULL, '', '', '', '', '', '', '', '', '', 'Y2Fpc3NlIGRlIDI0MCB1bml0w6k=', '10.00', '', '4', NULL, 'on', NULL),
(27, 1, 'Cup Moyen', '', NULL, '', '', '', '', '', '', '', '', '', 'Y2Fpc3NlIGRlIDI0MCB1bml0w6lz', '10.00', '', '4', NULL, 'on', NULL),
(28, 1, 'Cup Grand', '', NULL, '', '', '', '', '', '', '', '', '', 'Y2Fpc3NlIGRlIDI0MCB1bml0w6lz', '10.00', '', '4', NULL, 'on', NULL),
(29, 1, 'Oignon', '', NULL, '', '', '', '', '', '', '', '', '', 'c2FjIGRlIDVrZw==', '4.95', '', '1', NULL, 'on', NULL),
(30, 1, 'Panini', '', NULL, '', '', '', '', '', '', '', '', '', 'bWlhbQ==', '30.00', '', '1', NULL, 'on', NULL),
(31, 1, 'Roussette', '', NULL, '', '', '', '', '', '', '', '', '', 'ZG91emFpbmU=', '1.95', '', '3', NULL, 'on', NULL),
(32, 1, 'Velouté de champignon', '', NULL, '', '', '', '', '', '', '', '', '', 'cGV1dCBmb3VybmlyIDEwIGtnIGRlIHNvdXBl', '10.00', '', '2', NULL, 'on', NULL),
(33, 0, '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '--------------', NULL, '', NULL);

DROP TABLE IF EXISTS `tb6`;
CREATE TABLE IF NOT EXISTS `tb6` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `text_21` varchar(255) default NULL,
  `text_22` varchar(255) default NULL,
  `text_53` varchar(255) default NULL,
  `sectiontitle_54` varchar(255) default NULL,
  `parentkey_64` varchar(255) default NULL,
  `text_65` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `tb6` (`id`, `isactive`, `text_21`, `text_22`, `text_53`, `sectiontitle_54`, `parentkey_64`, `text_65`) VALUES
(1, 1, '0001', '', '366 Longueuil', NULL, NULL, NULL),
(2, 1, '0010', '', '8100 Pie-IX', NULL, NULL, NULL),
(3, 1, '0100', '', '3440 St-Laurent', NULL, NULL, NULL),
(4, 1, '0110', '', '674 Sherbrooke', NULL, NULL, NULL),
(5, 1, '0012', '', '1508  de Bleury', NULL, NULL, NULL),
(6, 1, '1101', '', '8115 Ave Papineau', NULL, NULL, NULL);

DROP TABLE IF EXISTS `tb7`;
CREATE TABLE IF NOT EXISTS `tb7` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `text_31` varchar(255) default NULL,
  `foreignkey_33` varchar(255) default NULL,
  `numeric_34` varchar(255) default NULL,
  `boolean_35` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

INSERT INTO `tb7` (`id`, `isactive`, `text_31`, `foreignkey_33`, `numeric_34`, `boolean_35`) VALUES
(1, 1, 'Antec Sonata III Black ATX 16IN Mid Tower Quiet Case 3X5.25 2X3.5 4X3.5IN 500W 120mm Fan', '1', '127.29', 'on'),
(2, 1, '650W ATX12V DUAL POWER SUPPLY 120MM DOUBLE BALL BEARING FAN', '1', '81.59', NULL),
(3, 1, 'Antec TriCool 120MM DBB Case Fan 3-SPEED 1200/1600/2200RPM 25/28/30DBA 39/56/79CFM 3 & 4PINS', '1', '9.50', 'on'),
(4, 1, 'Antec Notebook Cooler Basic Aluminum Passive Flip Up', '1', '13.36', 'on'),
(5, 1, 'AMD A8-3850 APU W/ AMD Radeon 65XX HD GFX Quad Core Processor Socket FM1 2.9GHZ 4MB 100W Retail Box', '3', '92.3', NULL),
(6, 1, 'Amd A8-5600K Apu Quad Core Processor Socket FM2 3.2GHZ 4MB 100W Retail Box', '3', '107.50', NULL),
(7, 1, 'ATI FirePro V4900 1GB GDDR5 DVI 2x DisplayPort PCI-E Eyefinity Workstation Video Card Retail', '3', '156.31', 'on'),
(8, 1, 'Cooler Master HAF X EATX Tower Case Black 6X5.25 5X3.5INT No PS Front USB3.0', '2', '202.4', NULL),
(9, 1, 'Cooler Master Extreme 2 Power Plus 525W ATX 12V Energy Star Power Supply 20/24PIN 120mm Fan', '2', '46', NULL),
(10, 1, 'Cooler Master Haf 932 Advanced Full Tower EATX Case 7X5.25 2X3.5 5X3.5INT USB3.0 eSATA 1394 Black', '2', '184.40', NULL),
(11, 1, 'Cooler Master Elite Power 460W ATX Power Supply 12V V2.3 20/24PIN 120mm Fan', '2', '36.80', NULL),
(12, 1, 'Cooler Master R4-L2R-20AC 120mm Blue LED Case Fan 2000RPM 69CFM 19DBA 3/4 Pin', '2', '5.75', NULL),
(13, 1, 'Cooler Master Hyper 212 Evo Direct Touch 4 Heatpipe Heatsink AM2 AM3 LGA1366/1155/1156/2011 120mm', '2', '31.05', NULL),
(14, 1, 'ASUS GeForce GTX 660 OC DirectCU 1020MHZ 2GB 6.0GHZ GDDR5 2xDVI HDMI DisplayPort PCI-E Video Card', '4', '194.67', NULL),
(15, 1, 'ASUS VE247H 23.6IN Widescreen LED LCD Monitor 1920x1080 2MS 10M1DC HDMI DVI-D VGA Speakers', '4', '153.37', NULL),
(16, 1, 'ASUS Taichi DH51 Intel i5 3317U 4GB 128GB SSD 11.6IN Touchscreen BT Windows 8 Ultrabook Convertible', '4', '1234.48', 'on'),
(17, 1, 'ASUS GeForce GTX 660 Ti DirectCU OC 1058MHZ 2GB 6GHZ GDDR5 2xDVI HDMI DisplayPort PCI-E Video Card', '4', '298.79', NULL),
(18, 1, 'ASUS GeForce GTX 660 OC DirectCU 1020MHZ 2GB 6.0GHZ GDDR5 2xDVI HDMI DisplayPort PCI-E Video Card', '4', '194.67', NULL),
(19, 1, 'ASUS BW-12B1ST Blu-Ray Writer 12X BD-R 16X DVD+R SATA Black Retail', '4', '68.58', 'on'),
(20, 1, 'ASUS P8B75-M LE Micro ATX LGA1155 B75 DDR3 2PCI-E16 2PCI SATA3 DVI HDMI USB3.0 Motherboard', '4', '71.14', NULL),
(21, 1, 'Intel Core i7 3770K Unlocked Quad Core Hyperthreading Processor LGA1155 3.5GHZ Ivy Bridge 8MB Retail', '5', '357.91', NULL),
(22, 1, 'Intel Core i5 3470 Quad Core Processor LGA1155 3.2GHZ Ivy Bridge 6MB Retail', '5', '197.55', NULL),
(23, 1, 'Intel Core i5 3570K Unlocked Quad Core Processor LGA1155 3.4GHZ Ivy Bridge 6MB Retail', '5', '237.67', NULL),
(24, 1, 'Intel 520 Series 240GB 2.5in SSD MLC 25nm SATA3 Solid State Disk Drive Retail w/ Mounting Bracket', '5', '257.97', NULL),
(25, 1, 'Microsoft Windows 8 64Bit Full Version English OEM', '6', '98.90', NULL),
(26, 1, 'Microsoft Windows 7 Professional Edition 64BIT DVD SP1 OEM', '6', '140.48', NULL),
(27, 1, 'Microsoft 4FD-00016 Comfort Mouse 4500 USB MAC/WIN White', '6', '24.38', NULL),
(28, 1, 'Microsoft XBox360 Wireless Common Controller for Windows USB Black', '6', '44.22', NULL);

DROP TABLE IF EXISTS `tb8`;
CREATE TABLE IF NOT EXISTS `tb8` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `text_32` varchar(255) default NULL,
  `parentkey_42` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `tb8` (`id`, `isactive`, `text_32`, `parentkey_42`) VALUES
(1, 1, 'Antec', NULL),
(2, 1, 'Coolermaster', NULL),
(3, 1, 'Amd', NULL),
(4, 1, 'Asus', NULL),
(5, 1, 'Intel', NULL),
(6, 1, 'Microsoft', NULL);

DROP TABLE IF EXISTS `tb9`;
CREATE TABLE IF NOT EXISTS `tb9` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `sectiontitle_43` varchar(255) default NULL,
  `text_44` varchar(255) default NULL,
  `text_45` varchar(255) default NULL,
  `memo_46` varchar(255) default NULL,
  `boolean_47` varchar(255) default NULL,
  `text_48` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `tb9` (`id`, `isactive`, `sectiontitle_43`, `text_44`, `text_45`, `memo_46`, `boolean_47`, `text_48`) VALUES
(1, 1, NULL, 'Corriger les critiques du cours INM5151', 'Jacques Berger', 'Q29ycmVjdGlvbiBkZSBjZXMgY3JpdGlxdWVzIGF2ZWMgcGFzc2lvbi4=', 'on', 'Jacques Berger'),
(2, 1, NULL, 'Préparer le cours INF2015', 'Jacques Berger', 'MSkgTW9kaWZpZXIgbGVzIG5vdGVzIGRlIGNvdXJzDQoyKSBSw6lkaWdlciBsJ2V4YW1lbiBpbnRyYQ0KMykgUHLDqXBhcmVyIGxlIFRQMQ==', '', 'Jacques Berger'),
(3, 1, NULL, 'Préparer le cours INM5151', 'Jacques Berger', 'UHJlbmRyZSBsZSBwaXJlIFNSUyBkdSBncm91cGUgSGl2ZXJzIDIwMTMgYWZpbiBkZSBsZSBkb25uZXIgYXV4IMOpdHVkaWFudHMgZGUgbCdhdXRvbW5lIDIwMTMgY29tbWUgY3JpdGlxdWUu', '', 'Jacques Berger'),
(4, 1, NULL, 'Rencontre étudiant X1 pour contestation de sa critique', 'Jacques Berger', 'TCfDqXR1ZGlhbnQgbidhY2NlcHRlIHBhcyBzYSBub3RlIGRlIDk5JSwgaWwgdmV1dCBzb24gMTAwJQ==', '', 'Jacques Berger'),
(5, 1, NULL, 'Présenter le prototype (les mutants)', 'Jacques Berger', '', 'on', 'Équipe mutants');

DROP TABLE IF EXISTS `tb10`;
CREATE TABLE IF NOT EXISTS `tb10` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `text_73` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `tb10` (`id`, `isactive`, `text_73`) VALUES
(1, 1, 'Salle à manger'),
(2, 1, 'Soupe'),
(3, 1, 'Boulangerie'),
(4, 1, 'Café'),
(5, 1, 'patate');

DROP TABLE IF EXISTS `tb11`;
CREATE TABLE IF NOT EXISTS `tb11` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `numeric_55` varchar(255) default NULL,
  `text_66` varchar(255) default NULL,
  `sectiontitle_67` varchar(255) default NULL,
  `foreignkey_68` varchar(255) default NULL,
  `foreignkey_69` varchar(255) default NULL,
  `foreignkey_70` varchar(255) default NULL,
  `numeric_71` varchar(255) default NULL,
  `foreignkey_72` varchar(255) default NULL,
  `foreignkey_78` varchar(255) default NULL,
  `foreignkey_79` varchar(255) default NULL,
  `parentkey_80` varchar(255) default NULL,
  `foreignkey_81` varchar(255) default NULL,
  `query_82` varchar(255) default NULL,
  `numeric_83` varchar(255) default NULL,
  `numeric_84` varchar(255) default NULL,
  `numeric_85` varchar(255) default NULL,
  `query_86` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `tb11` (`id`, `isactive`, `numeric_55`, `text_66`, `sectiontitle_67`, `foreignkey_68`, `foreignkey_69`, `foreignkey_70`, `numeric_71`, `foreignkey_72`, `foreignkey_78`, `foreignkey_79`, `parentkey_80`, `foreignkey_81`, `query_82`, `numeric_83`, `numeric_84`, `numeric_85`, `query_86`) VALUES
(1, 1, '', 'Barney Stinson', NULL, '', '', '6', '2', '1', '10', '13', NULL, '21', NULL, '1', '1', '3', NULL),
(2, 1, '', 'Mr. Simpson', NULL, '', '', '7', '1', '2', '10', '13', NULL, '21', NULL, '2', '2', '3', NULL),
(3, 1, '', 'Daniel Laforest', NULL, '', '', '9', '10', '1', '12', '15', NULL, '21', NULL, '30', '50', '2', NULL),
(4, 1, '', 'Daniel Paquette', NULL, '', '', '8', '50', '3', '12', '16', NULL, '22', NULL, '50', '50', '20', NULL),
(5, 1, '', 'Mathieu', NULL, '', '', '9', '20', '5', '11', '13', NULL, '21', NULL, '10', '1', '1', NULL),
(6, 1, '', 'Sunny', NULL, '', '', '25', '20', '4', '11', '13', NULL, '21', NULL, '20', '1', '1', NULL),
(7, 1, '', 'patate', NULL, '', '', '--------------', '', '--------------', '--------------', '--------------', NULL, '--------------', NULL, '', '', '', NULL);

DROP TABLE IF EXISTS `tb12`;
CREATE TABLE IF NOT EXISTS `tb12` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `query_87` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tb13`;
CREATE TABLE IF NOT EXISTS `tb13` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  `text_88` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tb14`;
CREATE TABLE IF NOT EXISTS `tb14` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tb15`;
CREATE TABLE IF NOT EXISTS `tb15` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tb16`;
CREATE TABLE IF NOT EXISTS `tb16` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tb17`;
CREATE TABLE IF NOT EXISTS `tb17` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tb18`;
CREATE TABLE IF NOT EXISTS `tb18` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isactive` int(2) unsigned default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `tbdetails`;
CREATE TABLE IF NOT EXISTS `tbdetails` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `elementname` varchar(30) NOT NULL default '1',
  `isactive` int(2) NOT NULL default '1',
  `objecttype` varchar(30) NOT NULL,
  `objectname` varchar(255) NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `tbid` int(5) NOT NULL,
  `defvalue` varchar(255) NOT NULL,
  `sign` varchar(5) NOT NULL,
  `query` varchar(9999) NOT NULL,
  `foreignkey` int(11) NOT NULL,
  `parentkey` int(11) NOT NULL,
  `linkedview` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

INSERT INTO `tbdetails` (`id`, `elementname`, `isactive`, `objecttype`, `objectname`, `order`, `tbid`, `defvalue`, `sign`, `query`, `foreignkey`, `parentkey`, `linkedview`) VALUES
(1, 'Nom', 1, 'text', 'text_1', 2, 1, '', '', '1', 0, 0, 0),
(2, 'Prénom', 1, 'text', 'text_2', 3, 1, '', '', '1', 0, 0, 0),
(3, 'Code Permanant', 1, 'text', 'text_3', 4, 1, '', '', '1', 0, 0, 0),
(4, 'Sigle', 0, 'text', 'text_4', 1, 2, '', '', '', 0, 0, 0),
(5, 'Examen intra', 1, 'numeric', 'numeric_5', 4, 3, '0', '%', '', 0, 0, 0),
(6, 'Examen final', 1, 'numeric', 'numeric_6', 5, 3, '0', '%', '', 0, 0, 0),
(7, 'Inscriptions', 1, 'foreignkey', 'foreignkey_7', 2, 3, '', '', '', 2, 0, 8),
(8, 'Vers Élèves', 1, 'foreignkey', 'foreignkey_8', 2, 2, '', '', '', 1, 0, 5),
(9, 'Mes Cours', 0, 'parentkey', 'parentkey_9', 5, 1, '', '', '', 0, 2, 1),
(10, 'Mes Notes', 0, 'parentkey', 'parentkey_10', 3, 2, '', '', '', 0, 3, 2),
(11, 'Sigle du cours', 1, 'text', 'text_11', 1, 4, '', '', '1', 0, 0, 0),
(12, 'Vers Liste des cours', 0, 'foreignkey', 'foreignkey_12', 2, 2, '', '', '', 4, 0, 0),
(13, 'Mes Notes', 1, 'parentkey', 'parentkey_13', 4, 2, '', '', '', 0, 3, 23),
(14, 'Sigle', 0, 'query', 'query_14', 3, 2, '', '', 'c2VsZWN0IHRleHRfMTEgZnJvbSB0YjQgd2hlcmUgdGI0LmlkID0gdGIyLmZvcmVpZ25rZXlfMTY=', 0, 0, 0),
(15, 'Mes Inscriptions', 1, 'parentkey', 'parentkey_15', 7, 1, '', '', '', 0, 2, 1),
(16, 'Vers Cours', 0, 'foreignkey', 'foreignkey_16', 2, 2, '', '', '', 4, 0, 3),
(17, 'Élève', 1, 'query', 'query_17', 3, 2, '', '', 'c2VsZWN0IGNvbmNhdCh0ZXh0XzEsJyAnLHRleHRfMikgZnJvbSB0YjEgd2hlcmUgdGIxLmlkID0gdGIyLmZvcmVpZ25rZXlfOA==', 0, 0, 0),
(18, 'Informations', 1, 'sectiontitle', 'sectiontitle_18', 1, 1, '', '', '', 0, 0, 0),
(19, 'Inscriptions', 1, 'sectiontitle', 'sectiontitle_19', 1, 2, '', '', '', 0, 0, 0),
(20, 'Nom du produit', 1, 'text', 'text_20', 1, 5, 'id', '', '', 0, 0, 0),
(21, 'no Succursale', 1, 'text', 'text_21', 1, 6, '', '', '', 0, 0, 0),
(22, 'Prénom', 0, 'text', 'text_22', 2, 6, '', '', '', 0, 0, 0),
(23, 'Sigle du cours', 1, 'foreignkey', 'foreignkey_23', 3, 3, '', '', '', 4, 0, 3),
(24, 'Sigle du cours', 0, 'query', 'query_24', 6, 3, '', '', 'c2VsZWN0IHRleHRfMTEgZnJvbSB0YjQgd2hlcmUgdGI0LmlkID0gZm9yZWlnbmtleV8yMw==', 0, 0, 0),
(25, 'Description', 1, 'memo', 'memo_25', 8, 1, '', '', '', 0, 0, 0),
(26, 'Prix', 0, 'numeric', 'numeric_26', 2, 5, '2', '$', '', 0, 0, 0),
(27, 'Somme', 0, 'query', 'query_27', 3, 5, '', '', 'bnVtZXJpY18yNis1', 0, 0, 0),
(28, 'Inscriptions', 1, 'sectiontitle', 'sectiontitle_28', 6, 1, '', '', '', 0, 0, 0),
(29, 'Notes', 0, 'text', 'text_29', 6, 3, '', '', '', 0, 0, 0),
(30, 'Notes', 1, 'sectiontitle', 'sectiontitle_30', 1, 3, '', '', '', 0, 0, 0),
(31, 'Produit', 1, 'text', 'text_31', 2, 7, '', '', '', 0, 0, 0),
(32, 'Marque', 1, 'text', 'text_32', 1, 8, '', '', '', 0, 0, 0),
(33, 'Marque', 1, 'foreignkey', 'foreignkey_33', 1, 7, '', '', '', 8, 0, 9),
(34, 'Prix', 1, 'numeric', 'numeric_34', 3, 7, '', '$', '', 0, 0, 0),
(35, 'En spécial', 1, 'boolean', 'boolean_35', 4, 7, '', '', '', 0, 0, 0),
(36, 'Moyenne de tout les cours', 1, 'query', 'query_36', 5, 2, '', '', 'Y29uY2F0KChzZWxlY3QgYXZnKG51bWVyaWNfNSArIG51bWVyaWNfNiApLzIgZnJvbSB0YjMsdGI0IHdoZXJlIGZvcmVpZ25rZXlfNyA9IHRiMi5pZCksICcgJScp', 0, 0, 0),
(37, 'Code Permanant', 0, 'query', 'query_37', 7, 3, '', '', 'c2VsZWN0IHRleHRfMyBmcm9tIHRiMix0YjEgd2hlcmUgdGIzLmZvcmVpZ25rZXlfNyA9IHRiMi5pZCBhbmQgdGIyLmZvcmVpZ25rZXlfOCA9IHRiMS5pZA==', 0, 0, 0),
(38, 'Étudiant', 0, 'text', 'text_38', 8, 3, '', '', '', 0, 0, 0),
(39, 'Étudiant', 0, 'query', 'query_39', 9, 3, '', '', 'c2VsZWN0IGNvbmNhdCh0ZXh0XzEsJyAnLHRleHRfMikgZnJvbSB0YjIsdGIxIHdoZXJlIHRiMy5mb3JlaWdua2V5XzcgPSB0YjIuaWQgYW5kIHRiMi5mb3JlaWdua2V5XzggPSB0YjEuaWQ=', 0, 0, 0),
(40, 'Note finale', 1, 'query', 'query_40', 10, 3, '', '', 'Y29uY2F0KCgobnVtZXJpY182K251bWVyaWNfNSkgLyAyKSwnICUgJyk=', 0, 0, 0),
(41, 'Commentaire', 1, 'memo', 'memo_41', 11, 3, '', '', '', 0, 0, 0),
(42, 'Produits associés', 1, 'parentkey', 'parentkey_42', 2, 8, '', '', '', 0, 7, 10),
(43, 'Détails de la tâche', 1, 'sectiontitle', 'sectiontitle_43', 1, 9, '', '', '', 0, 0, 0),
(44, 'Titre', 1, 'text', 'text_44', 2, 9, '', '', '', 0, 0, 0),
(45, 'Assigné par', 1, 'text', 'text_45', 3, 9, '', '', '', 0, 0, 0),
(46, 'Descripton', 1, 'memo', 'memo_46', 5, 9, '', '', '', 0, 0, 0),
(47, 'Fermer', 1, 'boolean', 'boolean_47', 6, 9, '', '', '', 0, 0, 0),
(48, 'Assigné à', 1, 'text', 'text_48', 4, 9, '', '', '', 0, 0, 0),
(49, 'Catégorie', 0, 'text', 'text_49', 2, 5, '', '', '', 0, 0, 0),
(50, 'prix', 0, 'numeric', 'numeric_50', 5, 5, '', '', '', 0, 0, 0),
(51, 'description', 0, 'memo', 'memo_51', 6, 5, '', '', '', 0, 0, 0),
(52, 'statut', 0, 'boolean', 'boolean_52', 7, 5, '', '', '', 0, 0, 0),
(53, 'Adresse', 1, 'text', 'text_53', 3, 6, '', '', '', 0, 0, 0),
(54, 'Commandes', 1, 'sectiontitle', 'sectiontitle_54', 4, 6, '', '', '', 0, 0, 0),
(55, 'no Succursale', 0, 'numeric', 'numeric_55', 1, 11, '', '', '', 0, 0, 0),
(56, 'En Stock', 0, 'boolean', 'boolean_56', 8, 5, '', '', '', 0, 0, 0),
(57, 'Statut', 0, 'text', 'text_57', 9, 5, '', '', '', 0, 0, 0),
(58, 'Description', 0, 'memo', 'memo_58', 10, 5, '', '', '', 0, 0, 0),
(59, 'Prix', 0, 'numeric', 'numeric_59', 11, 5, '', '', '', 0, 0, 0),
(60, 'Statut', 0, 'text', 'text_60', 12, 5, '', '', '', 0, 0, 0),
(61, 'Description', 1, 'memo', 'memo_61', 3, 5, '', '', '', 0, 0, 0),
(62, 'Prix', 1, 'numeric', 'numeric_62', 5, 5, '', '', '', 0, 0, 0),
(63, 'Statut', 0, 'text', 'text_63', 4, 5, '', '', '', 0, 0, 0),
(64, 'Vers Commandes', 1, 'parentkey', 'parentkey_64', 5, 6, '', '', '', 0, 11, 28),
(65, 'Région', 1, 'text', 'text_65', 6, 6, '', '', '', 0, 0, 0),
(66, 'Nom responsable', 1, 'text', 'text_66', 2, 11, '', '', '', 0, 0, 0),
(67, 'Commande', 1, 'sectiontitle', 'sectiontitle_67', 3, 11, '', '', '', 0, 0, 0),
(68, '', 0, 'foreignkey', 'foreignkey_68', 4, 11, '', '', '', 0, 0, 0),
(69, '', 0, 'foreignkey', 'foreignkey_69', 5, 11, '', '', '', 0, 0, 0),
(70, 'Salle à manger', 1, 'foreignkey', 'foreignkey_70', 4, 11, '', '', '', 5, 0, 27),
(71, 'Quantité', 1, 'numeric', 'numeric_71', 5, 11, '', '', '', 0, 0, 0),
(72, 'Vers clients', 1, 'foreignkey', 'foreignkey_72', 1, 11, '', '', '', 6, 0, 29),
(73, 'Nom catégorie', 1, 'text', 'text_73', 1, 10, '', '', '', 0, 0, 0),
(74, 'Catégorie', 1, 'foreignkey', 'foreignkey_74', 2, 5, '', '', '', 10, 0, 30),
(75, 'Catégorie', 1, 'query', 'query_75', 13, 5, '', '', 'c2VsZWN0IHRleHRfNzMgZnJvbSB0YjEwIHdoZXJlIHRiMTAuaWQgPSBmb3JlaWdua2V5Xzc0', 0, 0, 0),
(76, 'En stock', 1, 'boolean', 'boolean_76', 14, 5, '', '', '', 0, 0, 0),
(77, 'Status', 1, 'query', 'query_77', 15, 5, '', '', 'KGNhc2Ugd2hlbiBib29sZWFuXzc2ID0gJ29uJyB0aGVuICdFbiBzdG9jaycgZWxzZSAnRW4gcnVwdHVyZSBkZSBzdG9jaycgZW5kKQ==', 0, 0, 0),
(78, 'Soupe', 1, 'foreignkey', 'foreignkey_78', 6, 11, '', '', '', 5, 0, 31),
(79, 'Boulangerie', 1, 'foreignkey', 'foreignkey_79', 8, 11, '', '', '', 5, 0, 32),
(80, 'Café', 0, 'parentkey', 'parentkey_80', 8, 11, '', '', '', 0, 0, 0),
(81, 'Café', 1, 'foreignkey', 'foreignkey_81', 10, 11, '', '', '', 5, 0, 33),
(82, 'Total', 1, 'query', 'query_82', 12, 11, '', '', 'KG51bWVyaWNfNzEgKiAoc2VsZWN0IG51bWVyaWNfNjIgZnJvbSB0YjUgd2hlcmUgdGIxMS5mb3JlaWdua2V5XzcwID0gdGI1LmlkKSkNCisNCihudW1lcmljXzgzICogKHNlbGVjdCBudW1lcmljXzYyIGZyb20gdGI1IHdoZXJlIHRiMTEuZm9yZWlnbmtleV83OCA9IHRiNS5pZCkpDQorDQoobnVtZXJpY184NCAqIChzZWxlY3QgbnVtZXJpY182MiBmcm9tIHRiNSB3aGVyZSB0YjExLmZvcmVpZ25rZXlfNzkgPSB0YjUuaWQpKQ0KKw0KKG51bWVyaWNfODUgKiAoc2VsZWN0IG51bWVyaWNfNjIgZnJvbSB0YjUgd2hlcmUgdGIxMS5mb3JlaWdua2V5XzgxID0gdGI1LmlkKSk=', 0, 0, 0),
(83, 'Quantité', 1, 'numeric', 'numeric_83', 7, 11, '', '', '', 0, 0, 0),
(84, 'Quantité', 1, 'numeric', 'numeric_84', 9, 11, '', '', '', 0, 0, 0),
(85, 'Quantité', 1, 'numeric', 'numeric_85', 11, 11, '', '', '', 0, 0, 0),
(86, 'No succursale', 1, 'query', 'query_86', 1, 11, '', '', 'c2VsZWN0IHRleHRfMjEgZnJvbSB0YjYgd2hlcmUgdGI2LmlkID0gdGIxMS5mb3JlaWdua2V5Xzcy', 0, 0, 0),
(87, 'test', 1, 'query', 'query_87', 1, 12, '', '', '', 0, 0, 0),
(88, '', 1, 'text', 'text_88', 1, 13, '', '', '', 0, 0, 0);

DROP TABLE IF EXISTS `tblist`;
CREATE TABLE IF NOT EXISTS `tblist` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tbname` varchar(30) NOT NULL,
  `client_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL default '1',
  `creationdate` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

INSERT INTO `tblist` (`id`, `tbname`, `client_id`, `isactive`, `creationdate`) VALUES
(1, 'Enregistrement des élèves', 3, 1, NULL),
(2, 'Inscriptions aux cours', 3, 1, NULL),
(3, 'Notes', 3, 1, NULL),
(4, 'Liste des cours', 3, 1, NULL),
(5, 'Produits', 1, 0, NULL),
(6, 'Clients', 1, 1, NULL),
(7, 'Produits', 2, 1, NULL),
(8, 'Marque', 2, 1, NULL),
(9, 'Tâches', 3, 1, NULL),
(10, 'Catégories', 1, 1, NULL),
(11, 'Commandes', 1, 1, NULL),
(12, 'patate', 3, 1, NULL),
(13, 'Test', 1, 1, NULL),
(14, 'test2', 2, 1, NULL),
(15, 'test2', 2, 1, NULL),
(16, 'test2', 2, 1, NULL),
(17, 'test2', 2, 1, NULL),
(18, 'test2', 2, 1, NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `clients_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationdate` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `visible` tinyint(1) NOT NULL,
  `viewname` varchar(30) NOT NULL,
  `elements` varchar(9999) NOT NULL,
  `tbid` int(5) NOT NULL,
  `filter` varchar(9999) NOT NULL default 'MQ==',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

INSERT INTO `views` (`id`, `visible`, `viewname`, `elements`, `tbid`, `filter`) VALUES
(1, 1, 'Mes Inscriptions', 'query_17,query_36', 2, 'MQ=='),
(2, 1, 'Notes INF1120', 'numeric_5,numeric_6,query_24,query_39', 3, 'MSBhbmQgZm9yZWlnbmtleV8yMyA9IDE='),
(3, 1, 'Liste des cours', 'text_11', 4, 'MQ=='),
(4, 1, 'Tous les élèves', 'text_1,text_2,text_3', 1, 'MQ=='),
(5, 1, 'Élèves actifs', 'text_1,text_2', 1, 'MQ=='),
(6, 1, 'Tous les produits', 'text_20,numeric_62,query_75,query_77', 5, 'MQ=='),
(7, 1, 'Clients', 'text_21,text_53', 6, 'MQ=='),
(8, 1, 'Notes Inscriptions', 'query_17', 2, 'MQ=='),
(9, 1, 'Tous les marques', 'text_32', 8, 'MSBvcmRlciBieSB0ZXh0XzMyIGFzYw=='),
(10, 1, 'Tous les produits', 'text_31,numeric_34', 7, 'MQ=='),
(11, 1, 'Produits Asus', 'text_31,numeric_34', 7, 'MSBhbmQgZm9yZWlnbmtleV8zMyA9IDQ='),
(12, 1, 'Produits AMD', 'text_31,numeric_34', 7, 'MSBhbmQgZm9yZWlnbmtleV8zMyA9IDM='),
(13, 1, 'Produits Antec', 'text_31,numeric_34', 7, 'MSBhbmQgZm9yZWlnbmtleV8zMyA9IDE='),
(14, 1, 'Produits Intel', 'text_31,numeric_34', 7, 'MSBhbmQgZm9yZWlnbmtleV8zMyA9IDU='),
(15, 1, 'Produits Microsoft', 'text_31,numeric_34', 7, 'MSBhbmQgZm9yZWlnbmtleV8zMyA9IDY='),
(16, 1, 'Spéciaux en cours', 'text_31,numeric_34', 7, 'MSBhbmQgYm9vbGVhbl8zNT0nb24n'),
(17, 1, 'Notes INF2120', 'numeric_5,numeric_6,query_24,query_37', 3, 'MSBhbmQgZm9yZWlnbmtleV8yMyA9IDI='),
(19, 1, 'Notes INF5151', 'numeric_5,numeric_6,query_24,query_37', 3, 'MSBhbmQgZm9yZWlnbmtleV8yMyA9IDQ='),
(20, 1, 'Notes INM5151', 'numeric_5,numeric_6,query_24,query_37', 3, 'MSBhbmQgZm9yZWlnbmtleV8yMyA9IDU='),
(21, 1, 'Notes INF3135', 'numeric_5,numeric_6,query_24,query_37', 3, 'MSBhbmQgZm9yZWlnbmtleV8yMyA9IDY='),
(22, 1, 'Notes INF3105', 'numeric_5,numeric_6,query_24,query_37', 3, 'MSBhbmQgZm9yZWlnbmtleV8yMyA9IDc='),
(23, 1, 'Toutes notes', 'numeric_5,numeric_6,query_40,memo_41', 3, 'MQ=='),
(24, 1, 'Tâches actives', 'text_44,text_45,memo_46,text_48', 9, 'MSBhbmQgYm9vbGVhbl80NyA8PiAnb24n'),
(25, 1, 'Tâches complétées', 'text_44,text_45,memo_46', 9, 'MSBhbmQgYm9vbGVhbl80NyA9ICdvbic='),
(27, 1, 'Salle à manger', 'text_20,numeric_62', 5, 'MSBhbmQgZm9yZWlnbmtleV83NCA9IDE='),
(28, 1, 'Commandes clients', 'text_66,query_82,query_86', 11, 'MQ=='),
(29, 1, 'Clients commandes', 'text_21', 6, 'MQ=='),
(30, 1, 'Toutes les catégories', 'text_73', 10, 'MQ=='),
(31, 1, 'Soupes', 'text_20,numeric_62', 5, 'MSBhbmQgZm9yZWlnbmtleV83NCA9IDI='),
(32, 1, 'Boulangerie', 'text_20,numeric_62', 5, 'MSBhbmQgZm9yZWlnbmtleV83NCA9IDM='),
(33, 1, 'Café', 'text_20,numeric_62', 5, 'MSBhbmQgZm9yZWlnbmtleV83NCA9IDQ='),
(34, 1, 'En stock', 'text_20,memo_61,numeric_62', 5, 'MSBhbmQgYm9vbGVhbl83NiA9ICdvbic='),
(35, 1, 'test vue', '', 13, 'MQ=='),
(36, 1, '', '', 13, 'MQ=='),
(37, 1, '', '', 8, 'MQ==');


ALTER TABLE `history` ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tblist` (`id`) ON DELETE CASCADE;