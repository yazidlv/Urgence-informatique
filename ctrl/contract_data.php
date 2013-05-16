<?php
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   $res= $db->exec('create table if not exists contract(
   id_contract int NOT NULL auto_increment primary key,
   id_client int NOT NULL,
   start_date date NOT NULL,
   end_date date not null,)');
	
	
?>