DROP DATABASE IF EXISTS "demo_base";
CREATE DATABASE IF NOT EXISTS 'demo_base';
USE 'demo_base';

DROP TABLE IF EXISTS 'admin',
CREATE TABLE 'admin' (
'id' int(11) AUTO_INCREMENT,
'login' varchar (50),
'password' varchar (45),
CONSTRAINT PRIMARY KEY pk ('id')
);