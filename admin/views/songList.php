<?php require ('partials/menu.php'); ?>
<?php require ('partials/header.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<section>
    <h2>ici la liste complète des chansons : </h2>
    <h3><a class="add" href="index.php?controller=songs&action=new">Ajouter une chanson </a></h3>

<?php foreach($songs as $song): ?>
    <p><?=  htmlspecialchars($song['title']) ?>
        <a class="delete" href="index.php?controller=songs&action=delete&id=<?= $song['id'] ?>">supprimer</a>
        <a class="update" href="index.php?controller=songs&action=edit&id=<?= $song['id'] ?>">modifier</a>
    </p>
<?php endforeach; ?></section>


