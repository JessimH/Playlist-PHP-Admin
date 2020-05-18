

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
    <h3>formulaire de l'artiste</h3>
    <br>
    <br>

    <form action="index.php?controller=artists&action=<?= isset($artist) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

        <label for="name">Nom :</label>
        <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($artist) ? $artist['name'] : '' ?>" />
        <br>
        
        <label for="label_id">Label :</label>
        <select name="label_id" id="pet-label_id">
            <?php foreach ($labels as $label): ?>
                <option value="<?= $label['id']?>"<?php if(isset($artist) && $artist['label_id'] == $label['id']): ?>selected="selected"<?php endif; ?>><?= $label['name']?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="biography">Bio :</label>
        <textarea name="biography" id="biography"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['biography'] : '' ?><?= isset($artist) ? $artist['biography'] : '' ?></textarea>
        <br>

        <label for="image">image :</label>
        <input type="file" name="image" id="image" />
        <br>
        
        <input type="submit" value="Enregistrer" />

    </form>
</section>

</body>
