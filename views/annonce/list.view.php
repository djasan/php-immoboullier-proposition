<?php require 'views/partials/header.php' ?>
<section class="annonce">
    <?php
    
    echo (empty($annonces)) ? 'Aucune annonce actuellement' : '';

    foreach ($annonces as $annonce) : ?>
        <article class="card">
            <p>
                <a href="/annonce?id=<?= $annonce['id'] ?>">
                    <?= $annonce['titre'] ?>
                </a> - <strong><?= ucfirst($annonce['type']) ?></strong>
            </p>
            <p>
                <img src="uploads/<?= $annonce['image'] ?>" alt="<?= $annonce['titre'] ?>">
            </p>
            <p>
            <?= substr($annonce['description'],0, 100) . ' (...)' ?>
            </p>
            <p>
                <strong><?= $annonce['surface'] ?> m2</strong> - <strong><?= $annonce['piece'] ?> piéces</strong>
            </p>
            <p>
            <strong><?= $annonce['prix'] ?> €</strong>
            </p>
            <p>
            Estimation énergétique : <strong><?= $annonce['energie'] ?></strong>
            </p>
            <p>
            Emission de CO2 : <strong><?= $annonce['pollution'] ?></strong>
            </p>
        </article>
    <?php endforeach; ?>

</section>

<?php require 'views/partials/footer.php' ?>