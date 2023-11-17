<?php
require 'models/Database.php';

$annonces = $connexion->prepare('SELECT * FROM annonce ORDER BY id DESC');
$annonces->execute();
$annonces = $annonces->fetchAll(); 



require 'views/annonce/list.view.php';