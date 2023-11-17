<?php
require 'models/Database.php';

$images = $connexion->prepare('SELECT titre,image FROM annonce ORDER BY id DESC');
$images->execute();
$images = $images->fetchAll(); 

require 'views/photos/list.view.php';