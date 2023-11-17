<?php
require 'models/Database.php';

(isGetIdValid()) ? $id = $_GET['id'] : abort();

$annonceDelete = $connexion->prepare('DELETE FROM annonce WHERE id = :id');

$annonceDelete->bindValue(':id', $id, PDO::PARAM_INT);

$annonceDelete->execute();

redirectUrl('admin');