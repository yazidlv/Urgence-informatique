
<?php
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   $res= $db->exec('create table if not exists users(
   id int NOT NULL auto_increment primary key,
   nom varchar(30) NOT NULL,
   prenom varchar(30) NOT NULL,
   mail varchar(50) not null,
   password varchar(40),
   role int (2) not null,)');


?>
