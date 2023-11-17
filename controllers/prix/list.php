<?php
require 'models/Database.php';

$prix = $connexion->prepare('SELECT * FROM annonce ORDER BY prix');
$prix->execute();
$prix = $prix->fetchAll(); 


require 'views/prix/list.view.php';