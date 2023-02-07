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

create table Sous_categorie(
    id_sous int primary key auto_increment,
    id_categorie int,
    nom_sous varchar(100),
    foreign key(id_categorie) references Categorie(id_categorie)
);

create table Objet(
    id_objet int primary key auto_increment,
    nom_objet varchar(100),
    prix double,
    id_proprietaire int,
    descri varchar(100),
    stat int,
    foreign key(id_proprietaire) references Utilisateur(id_utilisateur)
);

create table Details(
    id_objet int,
    img varchar(100),
    foreign key(id_objet) references Objet(id_objet)
);

create table Proposition(
    id_client int,
    id_cible int,
    id_objet int,
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

