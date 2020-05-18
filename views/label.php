<a href="index.php">retour à l'index</a>

<p>Nom du label: <?= $label['name'] ?></p>

<p>Liste des Artistes:</p>

<?php if(sizeof($artists) > 0): ?>

    <ul>
        <?php foreach($artists as $artist): ?>
            <li>
                <a href="index.php?p=artist&artist_id=<?= $artist['id'] ?>"><?= $artist['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

        <?php else: ?>
            <p>le label n'a pas d'artistes</p>

<?php endif; ?>