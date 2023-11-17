<?php
require 'models/Database.php';

(isGetIdValid()) ? $id = $_GET['id'] : abort();

$annonce = $connexion->prepare('SELECT * FROM annonce WHERE id = :id');

$annonce->bindParam(':id', $id);

$annonce->execute();

$annonce = $annonce->fetch(); 

if ( empty($annonce) || $annonce === false ) :
    abort();
endif;

require 'views/annonce/show.view.php';
