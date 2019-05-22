CREATE DATABASE test;
use test;

CREATE TABLE members ( 
id int(10) NOT NULL auto_increment, 
username varchar(20) NOT NULL, 
password varchar(100) NOT NULL, PRIMARY KEY (id) ) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO members (username, password) VALUES (
    "admin", PASSWORD("1234")
);

CREATE TABLE vehicle (
id int(10) auto_increment PRIMARY KEY, 
matricula varchar(20) NOT NULL,
fechaEntrada DATE NOT NULL,
titular VARCHAR(100) NOT NULL,
tipo VARCHAR(100) NOT NULL,
averia text(500) NOT NULL,
mecanico varchar(100) NOT NULL
);

INSERT INTO vehicle VALUES (
    null, "1234qwe", "1999-04-02", "Paquito", "Moto", "Cadena rota", "Adrian"),
    (null, "1234qwe", "1999-04-30", "Paquito", "Moto", "Cadena rota", "Adrian"),
    (null, "1234qwe", "1999-03-10", "Paquito", "Moto", "Cadena rota", "Jose"),
    (null, "1234qwe", "1999-04-29", "Paquito", "Moto", "Cadena rota", "Adrian"
);

CREATE TABLE mecanic (
id int(10) NOT NULL auto_increment PRIMARY KEY, 
name varchar (50) NOT NULL,
speciality varchar (50) NOT NULL
);

INSERT INTO mecanic (name, speciality) VALUES 
('Adrian', 'chapista'),
('Jose', 'mecanico'),
('Aday', 'Electricista');

CREATE TABLE repair (
id int(10) NOT NULL auto_increment PRIMARY KEY, 
mecanicId int(11) NOT NULL,
vehicleId int(11) NOT NULL,
FOREIGN KEY (mecanicId) REFERENCES mecanic (Id) on update cascade on delete cascade,
FOREIGN KEY (vehicleId) REFERENCES vehicle (Id) on update cascade on delete cascade
);