<?php
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   $res= $db->exec('create table if not exists materiel(
   id_mat int NOT NULL auto_increment primary key,
   reference varchar(50) NOT NULL,
   nom varchar(30) NOT NULL,
   role int (3) not null,)');
	
	
?>