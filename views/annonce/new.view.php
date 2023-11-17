<?php require 'views/partials/header.php'; ?>

<h2>Ajout d'une nouvelle annonce</h2>

<form method="POST" enctype="multipart/form-data">
    <!------------>
    <!-- TITRE -->
    <!------------>
    <div>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= isset($_POST['titre']) ? $_POST['titre'] : '' ?>">
    </div>

    <!----------------->
    <!-- DESCRIPTION -->
    <!----------------->
    <div>
        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="10"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
    </div>

    <!------------>
    <!-- IMAGE -->
    <!------------>
    <div>
        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
    </div>

    <!------------>
    <!-- TYPE -->
    <!------------>
    <div>
        <label for="type">Type de location :</label>

        <input type="radio" name="type" id="type" value="location" 
        
        <?= (isset($_POST['type']) && $_POST['type'] == 'location' ) ? 'checked' : '' ?>  >Location

        <input type="radio" name="type" id="type" value="vente" 
        
        <?= (isset($_POST['type']) && $_POST['type'] == 'vente' ) ? 'checked' : '' ?>

        >Vente
    </div>

    <!------------>
    <!-- PRIX -->
    <!------------>
    <div>
        <label for="prix">Prix :</label>
        <input type="text" name="prix" id="prix" value="<?= isset($_POST['prix']) ? $_POST['prix'] : '' ?>">
    </div>

    <!------------>
    <!-- SURFACE -->
    <!------------>
    <div>
        <label for="surface">Surface :</label>
        <input type="text" name="surface" id="surface" value="<?= isset($_POST['surface']) ? $_POST['surface'] : '' ?>">
    </div>

    <!------------>
    <!-- PIECE -->
    <!------------>
    <div>
        <label for="piece">Nombre de piéce :</label>
        <select name="piece" id="piece">
            <option value="">-</option>

            <?php for ($p=1;$p<=5;$p++) : ?>
                <option value="<?=$p?>"
                <?php if (isset($_POST['piece']) &&  $p == $_POST['piece'] ):  ?>
                    selected
                <?php endif; ?> 
                >
                <?=$p?>
                </option>
            <?php endfor; ?>

            ?>

        </select>
    </div>
    <!------------>
    <!-- ENERGIE -->
    <!------------>
    <div>
        <label for="energie">Estimation énergétique :</label>
        A <input type="checkbox" name="energie[]" value="A">
        B <input type="checkbox" name="energie[]" value="B">
        C <input type="checkbox" name="energie[]" value="C">
        D <input type="checkbox" name="energie[]" value="D">
        E <input type="checkbox" name="energie[]" value="E">
        F <input type="checkbox" name="energie[]" value="F">
        G <input type="checkbox" name="energie[]" value="G">
    </div>
    <!--------------->
    <!-- POLLUTION -->
    <!--------------->
    <div>
        <label for="pollution">Pollution au CO2 :</label>
        A <input type="checkbox" name="pollution[]" value="A">
        B <input type="checkbox" name="pollution[]" value="B">
        C <input type="checkbox" name="pollution[]" value="C">
        D <input type="checkbox" name="pollution[]" value="D">
        E <input type="checkbox" name="pollution[]" value="E">
        F <input type="checkbox" name="pollution[]" value="F">
        G <input type="checkbox" name="pollution[]" value="G">
    </div>

    <!------------>
    <!-- SUBMIT -->
    <!------------>
    <div>
        <input type="submit" value="Ajouter">
    </div>
</form>

<?php
if (isset($errors) && !empty($errors)) :
    foreach ($errors as $error) :
?>
        <p class="error"><?= $error ?></p>
<?php
    endforeach;
endif;
?>

<?php require 'views/partials/footer.php' ?>