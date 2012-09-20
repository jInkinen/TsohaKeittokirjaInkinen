

CREATE TABLE ruoka
(
	ID bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi nvarchar(100),
	aika int,
	ohje nvarchar(max)
)

CREATE TABLE aines
(
	ID bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi nvarchar(100),
	hinta smallmoney,
	ravinto int
)

CREATE TABLE ateria
(
	ID bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nimi nvarchar(100),
	kuvaus nvarchar(300)
)

CREATE TABLE ruoanainekset
(
	ID bigint NOT NULL PRIMARY KEY,
	RuokaID bigint,
	AinesID bigint,
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID),
	FOREIGN KEY (AinesID) REFERENCES aines(ID),
)

CREATE TABLE aterianruoat
(
	ID bigint NOT NULL PRIMARY KEY,
	AteriaID bigint,
	AinesID bigint,
	FOREIGN KEY (AteriaID) REFERENCES ateria(ID),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID)
)

CREATE TABLE kuvat
(
	ID bigint NOT NULL PRIMARY KEY,
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID),
	polku nvarchar(100)
)

CREATE TABLE ruokaTyypit
(
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID),
	tyyppi nvarchar(20),
	laji nvarchar(20)
)

CREATE TABLE kommentti
(
	ID bigint NOT NULL PRIMARY KEY,
	teksti nvarchar(max),
	pvm smalldatetime NOT NULL,
	FOREIGN KEY (Kommentoija) REFERENCES kayttaja(ID)
)

CREATE TABLE kayttaja
(
	ID bigint NOT NULL PRIMARY KEY,
	nimi nvarchar(100),
	salasana nvarchar(max),
	oikeudet bit
)

CREATE TABLE ostoskori
(
	FOREIGN KEY (kayttaja) REFERENCES kayttaja(ID),
	FOREIGN KEY (RuokaID) REFERENCES ruoka(ID)
	maara int
)