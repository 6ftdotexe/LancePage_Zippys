create table `type`(
    id INT NOT NULL,
    name VARCHAR(20),
    PRIMARY KEY (ID)
);

create table `makes`(
    id INT NOT NULL,
    name VARCHAR(20),
    PRIMARY KEY (ID)
);

create table `class`(
    id INT NOT NULL,
    name VARCHAR(20),
    PRIMARY KEY (ID)
);

create table `vehicles`(
    id INT NOT NULL,
    year YEAR,
    model VARCHAR(50),
    price FLOAT(6,2),
    typeID INT,
    classID INT,
    makeID INT,
    PRIMARY KEY (ID)
);

INSERT INTO type VALUES (1, 'SUV');
INSERT INTO type VALUES (2, 'Truck');
INSERT INTO type VALUES (3, 'Sedan');
INSERT INTO type VALUES (4, 'Coupe');

INSERT INTO class VALUES (1, 'Utility');
INSERT INTO class VALUES (2, 'Economy');
INSERT INTO class VALUES (3, 'Luxury');
INSERT INTO class VALUES (4, 'Sports');

INSERT INTO makes VALUES (1 , 'Chevy');
INSERT INTO makes VALUES (2 , 'Ford');
INSERT INTO makes VALUES (3 , 'Cadillac');
INSERT INTO makes VALUES (4 , 'Nissan');
INSERT INTO makes VALUES (5 , 'Hyundai');
INSERT INTO makes VALUES (6 , 'Dodge');
INSERT INTO makes VALUES (7 , 'Infiniti');
INSERT INTO makes VALUES (8 , 'Buick');
