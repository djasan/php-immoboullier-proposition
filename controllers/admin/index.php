<?php
require 'models/Database.php';

$requete = 'SELECT * FROM annonce ORDER BY id DESC';

$annonces = $connexion->query($requete)->fetchAll();

require 'views/admin/index.view.php';