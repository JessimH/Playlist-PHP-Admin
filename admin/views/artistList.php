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

<h2>ici la liste complète des artistes : </h2>
<h3><a class="add" href="index.php?controller=artists&action=new" >Ajouter un artiste </a></h3>

<section class="artists">
	<?php foreach($artists as $artist): ?>

		<div class="artist">
			<img src="assets/images/artist/<?= $artist['image'] ?>" alt="">
			<h2><?=  htmlspecialchars($artist['name']) ?></h2>
			<p>"<?= $artist['biography'] ?>"</p>
			<ul>
				<li><a class="delete" href="index.php?controller=artists&action=delete&id=<?= $artist['id'] ?>">supprimer</a></li>
				<li><a class="update" href="index.php?controller=artists&action=edit&id=<?= $artist['id'] ?>">modifier</a></li>
			</ul>
		</div>
		
	<?php endforeach; ?>
</section>
</body>


