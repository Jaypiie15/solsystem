DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("7","Bobila","John Paul","Jaypiiie15","$2y$10$NlNQBU1.QRzkn.MDYfYSCufUJzA47/cqrJdffyQgrLeehZwO5rWsK","0","images/user.png");
INSERT INTO admin VALUES("9","demo","demo","demo","$2y$10$GGmPpPPSPOOja.cnDEow4.0Yiv34K.GOcRT0KCrtyZYpYPfn8jEBe","1","images/img.jpg");



DROP TABLE IF EXISTS net_leaders;

CREATE TABLE `net_leaders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO net_leaders VALUES("1","Emerde Dequina");
INSERT INTO net_leaders VALUES("2","James De Leon");
INSERT INTO net_leaders VALUES("3","Ike Torres");
INSERT INTO net_leaders VALUES("4","Val");
INSERT INTO net_leaders VALUES("5","Raymond Ipaniz");
INSERT INTO net_leaders VALUES("6","Dennis Sison");
INSERT INTO net_leaders VALUES("7","Jerome Abogado");
INSERT INTO net_leaders VALUES("8","Mark Padida");
INSERT INTO net_leaders VALUES("9","Hermar Garcia");
INSERT INTO net_leaders VALUES("10","Mj Rosete");
INSERT INTO net_leaders VALUES("11","Vernon Armoreda");
INSERT INTO net_leaders VALUES("12","Vandamme Armoreda");
INSERT INTO net_leaders VALUES("13","Meriam Batan");
INSERT INTO net_leaders VALUES("14","Shella Damian");
INSERT INTO net_leaders VALUES("15","Linda");
INSERT INTO net_leaders VALUES("16","Vanessa Armoreda");
INSERT INTO net_leaders VALUES("17","Marra Canaoay");
INSERT INTO net_leaders VALUES("18","Shiela Gonzales");
INSERT INTO net_leaders VALUES("19","Mary Holanda");
INSERT INTO net_leaders VALUES("20","Rowena Piacca");
INSERT INTO net_leaders VALUES("21","Denzel Marantan");
INSERT INTO net_leaders VALUES("24","Chem Bocal");
INSERT INTO net_leaders VALUES("26","demo");



DROP TABLE IF EXISTS students;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `encounter_batch` varchar(255) NOT NULL,
  `sol_batch` varchar(255) NOT NULL,
  `cell_leader` varchar(255) NOT NULL,
  `net_leader` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `training_level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `disciples` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `show_tbl` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO students VALUES("5","Bobila","Jaypiiie","Soliven","Nehemiah","Pending","Kuya Utoy","Vernon Armoreda","0919339906","Post","celllead","Pending","Active","","1");
INSERT INTO students VALUES("6","demo","sample","sample","sample","Pending","sample","Emerde Dequina","09193399065","Post","cellmem","Pending","Pending","images/user.png","1");



DROP TABLE IF EXISTS title;

CREATE TABLE `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO title VALUES("1","School of Leaders");



