<?php require 'views/partials/header.php' ?>
<section class="unPrix">
    <?php
    foreach ($prix as $unPrix) : ?>
        <article class="card">
            <p>
                <a href="/show?id=<?= $unPrix['id'] ?>">
                    <?= $unPrix['titre'] ?>
                </a> - <strong><?= ucfirst($unPrix['type']) ?></strong>
            </p>
            <p>
                <img src="uploads/<?= $unPrix['image'] ?>" alt="<?= $unPrix['titre'] ?>">
            </p>
            <p>
            <?= substr($unPrix['description'],0, 100) . ' (...)' ?>
            </p>
            <p>
                <strong><?= $unPrix['surface'] ?> m2</strong> - <strong><?= $unPrix['piece'] ?> piéces</strong>
            </p>
            <p>
            <strong><?= $unPrix['prix'] ?> €</strong>
            </p>
            <p>
            Estimation énergétique : <strong><?= $unPrix['energie'] ?></strong>
            </p>
            <p>
            Emission de CO2 : <strong><?= $unPrix['pollution'] ?></strong>
            </p>
        </article>
    <?php endforeach; ?>

</section>

<?php require 'views/partials/footer.php' ?>