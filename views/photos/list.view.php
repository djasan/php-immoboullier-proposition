<?php require 'views/partials/header.php' ?>
<section class="imagelist">
    <?php
    foreach ($images as $image) : ?>
        <article class="card">
            <h3><?= $image['titre'] ?></h3>
            <p>
                <img src="uploads/<?= $image['image'] ?>">
            </p>
        </article>
    <?php endforeach; ?>

</section>

<?php require 'views/partials/footer.php' ?>