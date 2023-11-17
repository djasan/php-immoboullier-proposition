<?php
require 'models/Database.php';

(isGetIdValid()) ? $id = $_GET['id'] : abort();

$annonceUpdate = $connexion->prepare('SELECT * FROM annonce WHERE id = :id');

$annonceUpdate->bindValue(':id', $id);
$annonceUpdate->execute();
$annonceUpdate = $annonceUpdate->fetch(); 

if ( empty($annonceUpdate) || $annonceUpdate === false ) :
    abort();
endif;

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $errors = [];

    $titre = sanitizeData($_POST['titre'],'string');
    $description = sanitizeData($_POST['description'],'string');
    $prix = sanitizeData($_POST['prix'],'int');
    $surface = sanitizeData($_POST['surface'],'int');
    $piece = sanitizeData($_POST['piece'],'int');
    
    // Titre
    if (!isStringValid($titre,10,100)) :
        $errors[] = 'Titre vide ou trop long !!!';
    endif;

    // Description
    if (!isStringValid($description,50,3000)) :
        $errors[] = 'Description vide ou trop long !!!';
    endif;

    // Image
    $imageFileType = strtolower(pathinfo(imageUpload('image'),PATHINFO_EXTENSION));

    if (!empty($imageFileType)) :
        $image = imageUpload('image');
    else:
        $errors[] = imageUpload('image');
    endif;

    // Type
    if(!isset($_POST['type'])) :
        $errors[] = 'Veuillez renseigner le typ de location !!!';
    else:
        $type = $_POST['type'];
    endif;

    // Prix
    if (!isStringValid($prix,4,10)) :
        $errors[] = 'Prix vide ou trop long !!!';
    endif;

    // Surface
    if (!isStringValid($surface,2,10)) :
        $errors[] = 'Surface vide ou trop long !!!';
    endif;   

    // Piéces
    if (!isStringValid($piece,1,1)) :
        $errors[] = 'Veuillez renseigner le nombre de piéces !!!';
    endif; 

    // Energie
    if(isset($_POST['energie'])):
        $energie =  implode(',',$_POST['energie']);
    else:
        $errors[] = 'Veuillez renseigner l\'estimation énergétique !!!';
    endif;

    // Pollution
    if(isset($_POST['pollution'])):
        $pollution =  implode(',',$_POST['pollution']);
    else:
        $errors[] = 'Veuillez renseigner la pollution au CO2 !!!';
    endif;

    // UPDATE

    if (empty($errors)) :
        $annonceNewUpdate = $connexion->prepare('UPDATE annonce SET 
        titre = :titre ,
        description = :description ,
        image = :image ,
        type = :type , 
        prix = :prix , 
        piece = :piece , 
        surface = :surface ,
        energie = :energie ,
        pollution = :pollution,
        modifiee_le = now()
        WHERE id = :id');
        
        $annonceNewUpdate->bindValue(':id', $id, PDO::PARAM_INT);
        $annonceNewUpdate->bindValue(':titre', $titre, PDO::PARAM_STR);
        $annonceNewUpdate->bindValue(':description', $description, PDO::PARAM_STR);
        $annonceNewUpdate->bindValue(':image', $image, PDO::PARAM_STR);
        $annonceNewUpdate->bindValue(':type', $type, PDO::PARAM_STR);
        $annonceNewUpdate->bindValue(':prix', $prix, PDO::PARAM_INT);
        $annonceNewUpdate->bindValue(':piece', $piece, PDO::PARAM_INT);
        $annonceNewUpdate->bindValue(':surface', $surface, PDO::PARAM_INT);
        $annonceNewUpdate->bindValue(':energie', $energie, PDO::PARAM_STR);
        $annonceNewUpdate->bindValue(':pollution', $pollution, PDO::PARAM_STR);

        $annonceNewUpdate->execute();

        redirectUrl('admin');

    endif;

endif;

include 'views/annonce/update.view.php';