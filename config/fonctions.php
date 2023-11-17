<?php

declare(strict_types=1);

function dbug($value)
{
    echo '<pre style="background-color:black;color:white;overflow: auto;padding: 1rem;font-family:monospace;">';
    //print_r($value);
    var_dump($value);
    echo '</pre>';
}

function dd($value)
{
    dbug($value);
    die('Script php arrété !!!');
}

function redirectUrl(string $path = ''): void
{
    $homeUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $path;
    header("Location: {$homeUrl}");
    die();
}

function sanitizeData($data, $type)
{
    switch ($type):
        case 'string':
            $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS;
            break;
        case 'int':
            $filter = FILTER_SANITIZE_NUMBER_INT;
            break;
    endswitch;

    return trim(filter_var($data, $filter));
}

function isStringValid($value, $min = 1, $max = 50)
{
    $value = trim($value);
    return strlen($value) >= $min && strlen($value) <= $max;
}

function imageUpload($fileFieldName)
{
    //========
    // IMAGE
    //========
    $uploaddir = "uploads/";
    $uploadfile = $uploaddir . basename($_FILES[$fileFieldName]['name']);
    $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && 
    $imageFileType != "png" && 
    $imageFileType != "jpeg" && 
    $imageFileType != "gif"
     ) :
        return "Le fichier téléversé n'est pas autorisé , seul les extensions suivantes sont autorisés :JPG, JPEG, PNG , GIF !!!";
    endif;

    if ($_FILES[$fileFieldName]["size"] > 500000) :
        return "Le poid de l'image est supérieur à 550 ko !!!";
    endif;

    $fileError = $_FILES[$fileFieldName]['error'];

    $phpFileUploadErrors = [
        0 => 'Aucune erreur , le fichier est téléversé avec succés',
        1 => 'Le fichier téléversé  dépasse la taille autorisé par PHP',
        2 => 'Le fichier téléversé dépasse la taille autorisé par le formualire',
        3 => 'Le fichier téléversé a été partiellement téléversé',
        4 => 'Aucun fichier séléctionné',
        6 => 'Dossier temporaire manquant',
        7 => 'Echec d\'ecriture sur le disque dur',
        8 => 'Un extension PHP a arrété le téléversement du fichier',
    ];

    if (array_key_exists($fileError, $phpFileUploadErrors) && $phpFileUploadErrors[0]) :
        move_uploaded_file($_FILES[$fileFieldName]['tmp_name'], $uploadfile);
        return basename($_FILES[$fileFieldName]['name']);
;    else:
        return  $phpFileUploadErrors[$fileError];
    endif; 
}

function isGetIdValid(): bool
{
   if (isset($_GET['id']) && is_numeric($_GET['id'])):
      return true;
   else:
      return false;
   endif;
}

