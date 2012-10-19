CREATE TABLE ruoka
(
	ID bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi varchar(100),
	aika int(11),
	ohje text
);

CREATE TABLE aines
(
	ID bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi varchar(100),
	hinta double,
	ravinto double,
	yksikko varchar(10)
);

CREATE TABLE ateria
(
	ID bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi varchar(100),
	kuvaus varchar(300)
);

CREATE TABLE ruoanainekset
(
	ID bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	RuokaID bigint(20),
	AinesID bigint(20),
	maara double,
	yksikko tinyint,
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID),
	FOREIGN KEY (AinesID) REFERENCES aines(ID)
);

CREATE TABLE aterianruoat
(
	ID bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	AteriaID bigint,
	RuokaID bigint,
	FOREIGN KEY (AteriaID) REFERENCES ateria(ID),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID)
);

CREATE TABLE ostoskori
(
	kayttaja bigint,
	RuokaID bigint,
	maara int,
	FOREIGN KEY (kayttaja) REFERENCES kayttaja(ID),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID)
);

CREATE TABLE kayttaja
(
	ID bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi varchar(100) NOT NULL,
	salasana varchar(255) NOT NULL,
	oikeudet int
);

CREATE TABLE ruokatyypit
(
	RuokaID bigint(20) NOT NULL,
	tyyppi varchar(20),
	laji varchar(20),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID)
);

CREATE TABLE kommentit
(
	ID bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	kayttaja bigint(20),
	RuokaID bigint(20),
	teksti varchar(1000),
	pvm TIMESTAMP NOT NULL,
	FOREIGN KEY (kayttaja) REFERENCES kayttaja(ID),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID)
);

CREATE TABLE kuvat
(
	ID bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	RuokaID bigint(20),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID),
	kuva blob NOT NULL
);