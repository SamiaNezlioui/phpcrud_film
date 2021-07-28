
CREATE TABLE film (
id int primary key auto_increment,
titre varchar(50),
annee date,
image varchar(50)
);

/*Ajout des films*/
insert into film (titre, annee, image) values
("l'etrange noel de mr Jack", "1993-12-24", "/images/noel.jpg" ),
("cobra", "1986-06-10", "/images/cobra.jpg" ),
("interstellar", "2014-11-07", "/images/interstellar.jpg" );

SELECT * FROM film;

/*editer les films*/

UPDATE film set titre = "interstelar"  where id=3;