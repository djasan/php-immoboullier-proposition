<?php require 'views/partials/header.php' ?>

<section>
<article class="card">
            <h3><?= $annonce['titre'] ?></h3>
            <p>
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

</section>

<p><a href="/admin" class="btn btn-norm">Retour à la liste des annonces</a></p>
<?php require 'views/partials/footer.php' ?>