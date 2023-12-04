<?php
require 'models/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $errors = [];

    $titre = sanitizeData($_POST['titre'],'string');
    $description = sanitizeData($_POST['description'],'string');
    $prix = sanitizeData($_POST['prix'],'int');
    $surface = sanitizeData($_POST['surface'],'int');
    $piece = sanitizeData($_POST['piece'],'int');
    
    // Titre
    if (!isStringValid($titre,5,100)) :
        $errors[] = 'Titre vide ou trop long !!!';
    endif;

    // Description
    if (!isStringValid($description,10,3000)) :
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
        $errors[] = 'Veuillez renseigner le type de location !!!';
    else:
        $type = $_POST['type'];
    endif;

    // Prix
    if (!isStringValid($prix,3,10)) :
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

    //========
    // INSERT
    //========

    if (empty($errors)) :
        $annonceNew = $connexion->prepare('INSERT INTO annonce (
            titre,
            description,
            image,
            type,
            prix,
            piece,
            surface,
            energie,
            pollution) 
            VALUES (
                :titre , 
                :description , 
                :image , 
                :type , 
                :prix , 
                :piece , 
                :surface, 
                :energie, 
                :pollution)');
        
        $annonceNew->bindValue(':titre', $titre, PDO::PARAM_STR);
        $annonceNew->bindValue(':description', $description, PDO::PARAM_STR);
        $annonceNew->bindValue(':image', $image, PDO::PARAM_STR);
        $annonceNew->bindValue(':type', $type, PDO::PARAM_STR);
        $annonceNew->bindValue(':prix', $prix, PDO::PARAM_INT);
        $annonceNew->bindValue(':piece', $piece, PDO::PARAM_INT);
        $annonceNew->bindValue(':surface', $surface, PDO::PARAM_INT);
        $annonceNew->bindValue(':energie', $energie, PDO::PARAM_STR);
        $annonceNew->bindValue(':pollution', $pollution, PDO::PARAM_STR);
        
        $annonceNew->execute();

        $lastInsertId = $connexion->lastInsertId();

        if($lastInsertId) :
            redirectUrl('list');
        else:
            abort();
        endif;
    endif;

endif;

include 'views/annonce/new.view.php';
