<?php $this->layout('layout', ['title' => $name]) ?>

<?php $this->start('main_content') ?>

<h2>Modification d'un produit</h2>

<form method="POST">
	<div>
		<label for="name">Nom :</label>
		<input type="text" id="name" name="name" value="<?= $name ?>">
	</div>

	<div>
		<label for="description">Description :</label>
		<textarea id="description" name="description" rows="8" cols="80"><?= $description ?></textarea>
	</div>

	<div>
		<label for="image">Image :</label>
		<input type="text" id="image"  name="image" value="<?= $image ?>">
	</div>

	<div>
		<label for="price">Prix : </label>
		<input type="number" id="price"  name="price" value="<?= $price ?>">
	</div>

	<button type="submit" name="button">Modifier</button>
</form>

<?php $this->stop('main_content') ?>