DROP DATABASE IF EXISTS projet;
CREATE DATABASE projet;
USE projet;

DROP TABLE IF EXISTS type_user;
CREATE TABLE type_user(type_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, type_nom VARCHAR(20) NOT NULL UNIQUE) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO type_user (type_nom)
	VALUES ('client'),('admin');

DROP TABLE IF EXISTS users;
CREATE TABLE users (user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, user_nom VARCHAR(50) DEFAULT NULL, user_prenom VARCHAR(50) DEFAULT NULL, user_email VARCHAR(100) NOT NULL UNIQUE, user_adresse VARCHAR(150) DEFAULT NULL, user_pseudo VARCHAR(50) NOT NULL UNIQUE, user_mdp VARCHAR(200) NOT NULL, user_type INT NOT NULL REFERENCES type_user(type_id)) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO users (user_nom, user_prenom, user_email, user_adresse, user_pseudo, user_mdp, user_type)
	VALUES('Parmentier','cedric','cedric-parmentier@hotmail.com','Rue de Binche, n°24','cedric','$2y$10$PQ.98hh.BMK7.Uw7TG0DBekBLNeZ9v733SoDal4yBvXHE8e8/ZrnW',1), ('bram','bo','pap@fgio','rue de bla','koko','$2y$10$/VMcZnVXZiA25gDREeVibOZJ4IhhzXXhCm6hQUzrXmTcOFKiZxoti',2);

DROP TABLE IF EXISTS cat;
CREATE TABLE cat (cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, cat_nom VARCHAR(20) NOT NULL UNIQUE) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO cat(cat_nom)
	VALUES('figurine'),('mug'),('poster'),('accessoire');

DROP TABLE IF EXISTS articles;
CREATE TABLE articles (article_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, article_nom VARCHAR(50) NOT NULL, article_image VARCHAR(200) DEFAULT 'https://actucameroun.com/wp-content/uploads/2016/11/_tunisie_victime_de_la_margin_783777542_no-image.png', article_description TEXT DEFAULT NULL, article_prix FLOAT NOT NULL, article_code VARCHAR(50) DEFAULT NULL UNIQUE, article_cat INT NOT NULL REFERENCES cat(cat_id)) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO articles (article_nom, article_image, article_description, article_prix, article_code, article_cat)
	VALUES('figurine dva','https://image.noelshack.com/fichiers/2018/19/3/1525899865-dva.jpg','blablabla',15.5,'fig_dva_1',1), ('figurine iron man','https://image.noelshack.com/fichiers/2018/19/3/1525899880-iron-man.jpg','bliblibli',15.5,'fig_ironman_1',1), ('figurine black panther','https://image.noelshack.com/fichiers/2018/19/3/1525899873-black-panther.jpg','blobloblo',15.5,'fig_blackpanther_1',1);

