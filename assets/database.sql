create database takalo;

use takalo;

create table Utilisateur(
    id_utilisateur int primary key auto_increment,
    nom varchar(100),
    email varchar(100),
    mdp varchar(100)
);

create table Categorie(
    id_categorie int primary key auto_increment,
    nom_categorie varchar(100)
);

create table Objet(
    id_objet int primary key auto_increment,
    id_categorie int,
    nom_objet varchar(100),
    prix double,
    id_proprietaire int,
    descri varchar(100),
    stat int,
    img varchar(100),
    foreign key(id_proprietaire) references Utilisateur(id_utilisateur),
    foreign key(id_categorie) references Categorie(id_categorie)
);

create table Proposition(
    id_proposition int primary key auto_increment,
    id_client int,
    id_cible int,
    id_objet int,
    id_objet_cible int,
    stat int,
    foreign key(id_client) references Utilisateur(id_utilisateur),
    foreign key(id_cible) references Utilisateur(id_utilisateur),
    foreign key(id_objet) references Objet(id_objet)
);

insert into Utilisateur values(null,"Julia","julia3@gmail.com","juju");
insert into Utilisateur values(null,"Bela","bela6@gmail.com","bebe");
insert into Utilisateur values(null,"Thora","thora4@gmail.com","thot");
insert into Utilisateur values(null,"Renee","renee8@gmail.com","rere");
insert into Utilisateur values(null,"Debbie","debbie7@gmail.com","dede");
insert into Utilisateur values(null,"Lisa","lisa3@gmail.com","lili");
insert into Utilisateur values(null,"admin","admin@gmail.com","admin");

insert into Objet values(null,1,"T-Shirt Nike",15000,4,"T-Shirt Nike blanc",0,"nike.jpg");
insert into Objet values(null,2,"Pantalon Adidas",22000,6,"Pantalon Adidas noir",0,"adidas.jpg");
insert into Objet values(null,4,"Chaussures Reebok",50000,1,"Chaussures Reebok marron",0,"reebok.jpg");

insert into Objet values(null,"T-Shirt",13000,1,"T-Shirt Nike ",0,"noir.jpg");
insert into Objet values(null,"Pantalon Adidas",12,1,"Pantalon Adidas noir",0,"adidas.jpg");
insert into Objet values(null,"Chaussures Reebok",30,1,"Chaussures Reebok marron",0,"reebok.jpg");

insert into Categorie values(null,'Haut');
insert into Categorie values(null,'Bas');
insert into Categorie values(null,'Accessoires');
insert into Categorie values(null,'Chaussures');
insert into Categorie values(null,'Autres');

insert into Proposition values(null,1,4,1,3,0);
insert into Proposition values(null,4,1,1,3,0);
