# Agence IMMOBOULLIER

Notre prestataire du jour est une agence immobillière nommé **IMMOBOULLIER**.

Cet agence souhaiterait avoir un **site web** pour **lister,ajouter,modifier** ses **annonces** immobillières.

## Cahier des charges

Un ***dashboard*** afin d'administrer les annonces immobillières :

- **Lister** toutes les annonces
- **Ajouter** une annonce
- **Modifer** une annonce
- **Supprimer** une annonce

Deux formulaires pour **ajouter** et **modifier** une annonce.

La page d’**accueil** du site web devra **lister** tous les biens immobiliers par **ordre décroissant** de création d'un bien immobilier.

L'affichage des biens immobiliers sur la page d'accueil devra être ainsi dans l'ordre :

- **Titre** de l'annonce , préciser le **type** de bien immobilier (**location/vente**)
- **Image** du bien immobillier
- **Description** du bien immobillier
- **Surface** , **nombre de pièces** du bien immobillier
- **Prix** du bien immobillier
- **Estimation énergétique**
- **Emission de CO2**

La **bar de navigation** du site web devra contenir :

- Un lien vers la page d'accueil nommé **Accueil**
- Un lien nommé **Photos** listant , par **ordre décroissant** de création les biens immobilliers , que par **photos** sous forme de **galleries** ainsi vous devez avoir le **titre de l'annonce** et la **photo**
- Un lien nommé **Prix** listant tous les biens immobilliers comme sur la **page d'acceuil** par **ordre croissant de prix**
- Un lien **Admin** pour le **dashboard** qui permet de gérer les biens immobiliers

La base de donnée se nommera **immoboullier**.

Une table **annonce** devra avoir les champs suivants :

```
id
titre
description
image
type
prix
surface
piece
energie
pollution
cree_le
modifiee_le
```

Entrer un **jeu de donnée** au minimum de **10** biens immobiliers et plus si vous le souhaiter , **soigner** les données , entrer des données plausibles.

Détail du formulaire pour ajouter une annonce :

- Le champ **type** devra avoir deux choix **vente** ou **location**
- Le champ **prix** est libre
- Le champ **surface** correspond à la superficie du bien immobillier , il est libre
- Le champ **piece** correspond aux nombres de pièces du bien immobillier , c'est une liste déroulante avec les choix suivants 1,2,3,4,5 pièces
- Avoir la possibilité de **téléverser** une **image** du bien immobillier
- L'**estimation énergétique** et la **pollution au CO2** sont un choix multiple : **A,B,C,D,E,F,G**

# GIT

- Créer un **dépôt** sur un service tel que github ou autre pour y héberger votre travail
- Faire des **commits** atomiques
- Travailler sur une branche **develop** et abuser des **branches** pour votre travail
- **Partager** votre dépôt en **privée** avec une invitation

# Data

Exporter votre **MCD** (Modèle Conceptuel des Données) c'est à dire votre **schema de base de donnée** avec l'option pour **créer la base de donnée en sql** , que vous mettrez dans un dossier **data**.

Dans le même dossier **data** , mettez des **captures d’écrans** de vos pages , c'est à dire **6** (Accueil,Photos,Prix,Admin,Formulaire d'ajout,Formulaire de modification)

# Code

- Utiliser l'architecure **MVC** vue ensemble
- Bien avoir un **code** lisible , **bien indenté**
- Ne pas hésiter à ajouter des **commentaires**
- **Aérer** votre code pour qu'il soit agréable à lire pour vous et les autres
- Soyez cohérent , pensez toujours à quelqu'un qui reprend ou lit votre code
- **Personnaliser** votre code afin qu'il soit unique
- Ne laissez **AUCUN code,nom de variable,fonctions** , d'un projet précédent

# Design

- Aucune **feuille de style externe** du type bootstrap,etc... ne devra être utilisés
- Faire votre propre **feuille de style**
- Soigner votre **design**

# Barème de notation

- **Git** /2
- **Base de donnée** /3
- **Frontend HTML/CSS** /4
- **Backend PHP** /10
- **Clean Code** /1