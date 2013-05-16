<?php
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   $res= $db->exec('create table if not exists incident(
   id_incident int NOT NULL auto_increment primary key,
   id_materiel int NOT NULL,
   description varchar(300) NOT NULL,
   etat int not null,)');
	
	
?>