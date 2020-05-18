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
    <h2>ici la liste complète des labels : </h2>
    <h3><a class="add" href="index.php?controller=labels&action=new">Ajouter un label</a></h3>

<?php foreach($labels as $label): ?>
    <p><?=  htmlspecialchars($label['name']) ?>
        <a class="delete" href="index.php?controller=labels&action=delete&id=<?= $label['id'] ?>">supprimer</a>
        <a class="update" href="index.php?controller=labels&action=edit&id=<?= $label['id'] ?>"> modifier</a>
    </p>
<?php endforeach; ?></section>
    