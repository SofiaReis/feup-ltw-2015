BEGIN TRANSACTION;
CREATE TABLE "User" (
	`idUser`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`email`	TEXT NOT NULL,
	`username`	TEXT NOT NULL,
	`pass_hash`	TEXT NOT NULL,
	`firstname`	TEXT,
	`lastname`	TEXT
);
INSERT INTO `User` VALUES (1,'sofiareis1994@gmail.com','Fifas','f80a4688ce3250fc2bb0d8852d37b0b27e1bb7d620ea4d12d2c137aff9b94d0d','Sofia','Reis');
INSERT INTO `User` VALUES (2,'maria@gmail.com','Sofs','f80a4688ce3250fc2bb0d8852d37b0b27e1bb7d620ea4d12d2c137aff9b94d0d','Maria','Sofia');
INSERT INTO `User` VALUES (3,'pedromrvc@gmail.com','tantch','770bde8e55fed3c28d2252d16ef648e3dd6dd2c9fb8825b097a5950ee0220ba4','pedro','castro');
INSERT INTO `User` VALUES (4,'marialol@gmail.com','mariajrm','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','Maria','Marques');
INSERT INTO `User` VALUES (5,'vania@gmail.com','vania94','47d54e69b0d494de6a839e9c14ad6c184530a11eaad7ebc35cdba251e901c51f','Vania','Leite');
CREATE TABLE `Type` (
	`idType`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	INTEGER NOT NULL
);
INSERT INTO `Type` VALUES (1,'Party');
INSERT INTO `Type` VALUES (2,'Conference');
INSERT INTO `Type` VALUES (3,'Concert');
INSERT INTO `Type` VALUES (4,'Health');
INSERT INTO `Type` VALUES (5,'Workshop');
INSERT INTO `Type` VALUES (6,'Tests');
INSERT INTO `Type` VALUES (7,'Study Session');
CREATE TABLE "Image" (
	`idImage`	INTEGER NOT NULL,
	`path`	TEXT NOT NULL,
	`IdEvent`	INTEGER NOT NULL,
	PRIMARY KEY(idImage)
);
INSERT INTO `Image` VALUES (1,'./images/1/fc.jpg',1);
INSERT INTO `Image` VALUES (2,'./images/2/mega.jpg',2);
INSERT INTO `Image` VALUES (3,'./images/3/DSC_0430.jpg',3);
INSERT INTO `Image` VALUES (4,'./images/3/DSC_0415.jpg',3);
INSERT INTO `Image` VALUES (5,'./images/3/DSC_0353.jpg',3);
INSERT INTO `Image` VALUES (6,'./images/3/DSC_0408.jpg',3);
INSERT INTO `Image` VALUES (7,'./images/4/chillout_gin15-web.jpg',4);
INSERT INTO `Image` VALUES (8,'./images/4/moullinex_elsewhere.jpg',4);
INSERT INTO `Image` VALUES (9,'./images/5/corrida-web.jpg',5);
INSERT INTO `Image` VALUES (10,'./images/5/Captura de ecrã 2015-12-7, às 06.33.17.png',5);
INSERT INTO `Image` VALUES (11,'./images/6/quote4.jpg',6);
INSERT INTO `Image` VALUES (12,'./images/7/ano-novo-reveillon-fogos-comemoracao-20120101-63-size-598.jpg',7);
INSERT INTO `Image` VALUES (13,'./images/7/Passagem de Ano-Porto.jpg',7);
INSERT INTO `Image` VALUES (14,'./images/8/vdfpdc2014_copyright_hugo-lima-001.jpg',8);
INSERT INTO `Image` VALUES (15,'./images/8/ng2080175.jpg',8);
INSERT INTO `Image` VALUES (16,'./images/8/010.jpg',8);
INSERT INTO `Image` VALUES (17,'./images/8/20130715171438_R248ZBW832AG56QL24T3.jpg',8);
INSERT INTO `Image` VALUES (18,'./images/8/vdfpdc2014-copyright-hugo-lima-309.jpg',8);
INSERT INTO `Image` VALUES (19,'./images/8/N4.EVT1033d.jpg',8);
CREATE TABLE "EventInvite" (
	`idEvent`	INTEGER NOT NULL,
	`idUser`	INTEGER NOT NULL,
	PRIMARY KEY(idEvent,idUser)
);
INSERT INTO `EventInvite` VALUES (1,1);
INSERT INTO `EventInvite` VALUES (2,1);
INSERT INTO `EventInvite` VALUES (6,1);
INSERT INTO `EventInvite` VALUES (6,3);
INSERT INTO `EventInvite` VALUES (6,5);
INSERT INTO `EventInvite` VALUES (7,4);
INSERT INTO `EventInvite` VALUES (7,5);
CREATE TABLE "EventGo" (
	`idEvent`	INTEGER NOT NULL,
	`idUser`	INTEGER NOT NULL
);
INSERT INTO `EventGo` VALUES (1,1);
INSERT INTO `EventGo` VALUES (2,1);
INSERT INTO `EventGo` VALUES (3,3);
INSERT INTO `EventGo` VALUES (4,3);
INSERT INTO `EventGo` VALUES (6,4);
INSERT INTO `EventGo` VALUES (1,2);
INSERT INTO `EventGo` VALUES (6,1);
INSERT INTO `EventGo` VALUES (7,1);
INSERT INTO `EventGo` VALUES (2,4);
INSERT INTO `EventGo` VALUES (1,4);
CREATE TABLE "Event" (
	`idEvent`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT NOT NULL,
	`description`	TEXT NOT NULL,
	`idImage`	INTEGER,
	`idType`	INTEGER,
	`date`	TEXT NOT NULL,
	`idUser`	INTEGER NOT NULL,
	`public`	INTEGER DEFAULT 0,
	`local`	TEXT
);
INSERT INTO `Event` VALUES (1,'Feupcaffé','Não percas uma noite destas!',1,4,'2015-12-11',2,1,'Porto, Portugal');
INSERT INTO `Event` VALUES (2,'Mega Recolha','Ajuda como puderes!',2,4,'2015-12-17',2,1,'FEUP, Portugal');
INSERT INTO `Event` VALUES (3,'Arraial d&#039;Engenharia 2016','A vida &eacute; um Arraial',NULL,2,'2016-11-21',4,1,'Pal&aacute;cio de Cristal');
INSERT INTO `Event` VALUES (4,'Chill Out Gin','Depois dos exames chega a hora de relaxar',NULL,0,'2016-02-01',4,1,'AEFEUP');
INSERT INTO `Event` VALUES (5,'Corrida Solid&aacute;ria','Veste a camisola!',NULL,3,'2016-01-10',4,1,'AEFEUP');
INSERT INTO `Event` VALUES (6,'Estudar LTW','&Eacute;poca de Exames',NULL,1,'2015-12-25',4,0,'FEUP');
INSERT INTO `Event` VALUES (7,'Passagem de Ano Novo','Come&ccedil;ar o ano em grande!',NULL,1,'2015-12-31',1,0,'Porto');
INSERT INTO `Event` VALUES (8,'Paredes de Coura','Maior festival portugu&ecirc;s',NULL,2,'2016-07-21',4,0,'Paredes');
CREATE TABLE "Comment" (
	`idUser`	INTEGER NOT NULL,
	`idEvent`	INTEGER NOT NULL,
	`description`	TEXT NOT NULL,
	`date`	TEXT,
	`idComment`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
);
INSERT INTO `Comment` VALUES (4,6,'Ningu&eacute;m pode faltar!!!!','2015-12-07 07:36:15am',1);
INSERT INTO `Comment` VALUES (1,6,'YYYYYYYEEEEEEEEESSSSSSSSSSS','2015-12-07 07:38:17am',2);
COMMIT;
