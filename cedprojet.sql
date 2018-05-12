DROP DATABASE IF EXISTS projet;
CREATE DATABASE projet;
USE projet;

DROP TABLE IF EXISTS type_user;
CREATE TABLE type_user(type_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, type_nom VARCHAR(20) NOT NULL UNIQUE) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO type_user (type_nom)
	VALUES ('client'),('admin');

DROP TABLE IF EXISTS users;
CREATE TABLE users (user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, user_nom VARCHAR(100) DEFAULT NULL, user_prenom VARCHAR(100) DEFAULT NULL, user_email VARCHAR(150) NOT NULL UNIQUE, user_adresse VARCHAR(150) DEFAULT NULL, user_pseudo VARCHAR(200) NOT NULL UNIQUE, user_mdp VARCHAR(200) NOT NULL, user_type INT NOT NULL REFERENCES type_user(type_id)) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO users (user_nom, user_prenom, user_email, user_adresse, user_pseudo, user_mdp, user_type)
	VALUES('Parmentier','cedric','cedric-parmentier@hotmail.com','Rue de Binche, n°24','cedric','$2y$10$PQ.98hh.BMK7.Uw7TG0DBekBLNeZ9v733SoDal4yBvXHE8e8/ZrnW',2), ('bram','bo','pap@fgio','rue de bla','koko','$2y$10$/VMcZnVXZiA25gDREeVibOZJ4IhhzXXhCm6hQUzrXmTcOFKiZxoti',1);

DROP TABLE IF EXISTS cat;
CREATE TABLE cat (cat_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, cat_nom VARCHAR(20) NOT NULL UNIQUE) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO cat(cat_nom)
	VALUES('figurine'),('mug'),('poster'),('accessoire');

DROP TABLE IF EXISTS articles;
CREATE TABLE articles (article_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, article_nom VARCHAR(200) NOT NULL, article_image VARCHAR(200) DEFAULT 'https://actucameroun.com/wp-content/uploads/2016/11/_tunisie_victime_de_la_margin_783777542_no-image.png', article_description TEXT DEFAULT NULL, article_prix FLOAT NOT NULL, article_code VARCHAR(200) DEFAULT NULL UNIQUE, article_cat INT NOT NULL REFERENCES cat(cat_id)) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO articles (article_nom, article_image, article_description, article_prix, article_code, article_cat)
	VALUES('figurine dva','https://image.noelshack.com/fichiers/2018/19/3/1525899865-dva.jpg','piou piou piou bisou dva!',30,'fig_dva_1',1), ('figurine iron man','https://image.noelshack.com/fichiers/2018/19/3/1525899880-iron-man.jpg','sublime figurine d\'iron man',25.5,'fig_ironman_1',1), ('figurine black panther','https://image.noelshack.com/fichiers/2018/19/3/1525899873-black-panther.jpg','le hero le plus sombre de marvel au sens propre',15.5,'fig_blackpanther_1',1), ('mug bb8','https://image.noelshack.com/fichiers/2018/19/4/1525947893-mug-bb8.jpg','joli mug en forme de bb8 le droid le plus apprécier apres r2d2',20,'mug_bb8_1',2), ('mug game of throne','https://image.noelshack.com/fichiers/2018/19/4/1525947894-mug-game-of-throne.jpg','joli mug de game of throne',15.5,'mug_game_of_trhone_1',2), ('mug walking dead','https://image.noelshack.com/fichiers/2018/19/4/1525947894-mug-the-walking-dead.jpg','joli mug de walking dead',15.5,'mug_walking_dead_1',2), ('poster black clover','https://image.noelshack.com/fichiers/2018/19/4/1525948582-black-clover-2.jpg','joli poster de black clover',5.25,'poster_black_clover_1',3), ('poster iron man','https://image.noelshack.com/fichiers/2018/19/4/1525948582-iron-man.jpg','joli poster d\'iron man',5.25,'poster_iron_man_1',3), ('poster carte made in abyss','https://image.noelshack.com/fichiers/2018/19/4/1525948582-made-in-abyss.jpg','joli poster de la carte des profondeur de la serie made in abyss',5.25,'poster_made_in_abyss_1',3), ('poubelle r2d2','https://image.noelshack.com/fichiers/2018/19/4/1525948887-r2d2-poubelle.jpg','poubelle en forme de r2d2 pour un style incroyable!',36.99,'accessoire_r2d2_1',4), ('peignoir zelda','https://image.noelshack.com/fichiers/2018/19/4/1525948914-peignoir-zelda.jpg','peignoir avec le logo de zelda pour avoir la plus grande des classe!',25.99,'accessoire_zelda_1',4), ('portal gun rick et morty','https://image.noelshack.com/fichiers/2018/19/4/1525948914-portal-gun-rick.jpg','portal gun de rick pour voyager partout',16.4,'accessoire_rick_et_morty_1',4);

DROP TABLE IF EXISTS commandes;
CREATE TABLE commandes (commande_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, commande_user VARCHAR(200) NOT NULL, commande_prix FLOAT NOT NULL) ENGINE=INNODB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS listes;
CREATE TABLE listes (liste_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, liste_commande INT NOT NULL REFERENCES commandes(commande_id), liste_code VARCHAR(200), liste_qte INT, liste_prix FLOAT NOT NULL) ENGINE=INNODB DEFAULT CHARSET=latin1;
