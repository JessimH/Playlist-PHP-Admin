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

<section class="form">
    <h3>formulaire de l'album</h3>
    <br>
    <br>
<form action="index.php?controller=albums&action=<?= isset($album) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="name">Nom :</label>
    <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($album) ? $album['name'] : '' ?>" />
    <br>

    <label for="year">Année :</label>
    <input  type="number" name="year" id="year" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['year'] : '' ?><?= isset($album) ? $album['year'] : '' ?>" />
    <br>

    <label for="artist_id">Artiste :</label>
    <select name="artist_id" id="pet-artist_id">
        <?php foreach ($artists as $artist): ?>
            <option value="<?= $artist['id']?>"
                <?php if(isset($album) && $album['artist_id'] == $artist['id']): ?>selected="selected"<?php endif; ?>><?= $artist['name']?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <input type="submit" value="Enregistrer"/>

</form>
</section>

</body>
