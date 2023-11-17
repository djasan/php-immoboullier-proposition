<?php require 'views/partials/header.php' ?>
<section class="annonce">
<p><a href="/new" class="btn btn-norm">Ajouter une annonce</a></p>

    <table>
        <tr>
            <th>#</th>
            <th>Id</th>
            <th>Image</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Type</th>
            <th>Prix</th>
            <th>Surface</th>
            <th>Piéces</th>
            <th>Energie</th>
            <th>Pollution</th>
            <th>Action</th>
        </tr>

    <?php
    $i = 1;
    foreach ($annonces as $annonce) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $annonce['id'] ?></td>           
            <td>
                <?php if($annonce['image']): ?>    
                    <img src="uploads/<?= $annonce['image']?>" class="imgxs">
                <?php else: ?>
                    ...
                <?php endif; ?>
            </td>
            <td><?= $annonce['titre'] ?></td>
            <td><?= substr($annonce['description'],0, 20) . ' (...)' ?></td>
            <td><?= $annonce['type'] ?></td>
            <td><?= $annonce['prix'] ?> €</td>
            <td><?= $annonce['surface'] ?> m2</td>
            <td><?= $annonce['piece'] ?></td>
            <td><?= $annonce['energie'] ?></td>
            <td><?= $annonce['pollution'] ?></td>
            <td>
                <a href="/show?id=<?=$annonce['id']?>" class="btn btn-norm">Voir</a>
                <a href="/update?id=<?=$annonce['id']?>" class="btn btn-norm">Modifier</a>
                <a href="/delete?id=<?=$annonce['id']?>" class="btn btn-supp" onClick="return confirm('Etes vous certain de vouloir supprimer cette annonce !?');" >X</a>
            </td>
    </tr>
    <?php
        $i = $i + 1;
    endforeach; ?>

    </table>

</section>

<?php require 'views/partials/footer.php' ?>