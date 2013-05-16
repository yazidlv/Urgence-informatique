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

class User{

public function addUser($nom, $prenom, $mail,$role, $password)
{
    $data=array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'mail'=>$mail,
            'role'=>$role,
            'password'=>$password
    );
$query="INSERT INTO users(nom, prenom,mail,password,role)
        values (nom: , prenom: , mail: , password: ,role: ";
		   $res=$db->exec($query);

}
public function addRole($role, $designation)
{


    $data=array(
            'id_role'=>$role,
            'disignation'=>$designation

    );

    $query = "INSERT INTO role (id_role , disignation )
        values (id_role: , disignation:)";

    // exécution de la requête
	   $res=$db->exec($query);

}
public function getId($mail,$password)

{
    $mail=$_GET('mail');
    $password=$_GET('password');

    $query='SELECT matricule FROM users where password="'.$password.'" and mail="'.$mail.'"';

    // écrire requête avec PDO
	   $res=$db->query($query);

}

public function getRole()
{
   $matricule= User::getId;


    $query=" SELECT roles.designation from users, role where id_role=role and users.id= $matricule";
    // écrire l'éxcution de la requéte
	   $res=$db->query($query);
}

public function getmail()
{
    $id= User::getId;

    $query="SELECT mail from users where id='".$id."'";

    //écrire la requête
	   $res=$db->query($query);

}
}
?>