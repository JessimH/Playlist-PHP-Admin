<?php require ('partials/menu.php'); ?>
<?php require ('partials/header.php'); ?>

<body>
    <?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<section>
    <h2>ici la liste complète des albums : </h2>
    <h3><a class="add" href="index.php?controller=albums&action=new">Ajouter un album</a></h3>

<?php foreach($albums as $album): ?>
    <p><?=  htmlspecialchars($album['name']) ?>
    
        <a class="delete" href="index.php?controller=albums&action=delete&id=<?= $album['id'] ?>">supprimer</a>
        <a class="update" href="index.php?controller=albums&action=edit&id=<?= $album['id'] ?>">modifier</a>
    </p>
<?php endforeach; ?></section>

</body>

