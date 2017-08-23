<?php $this->layout('layout', ['title' => 'Ajouter un produit']) ?>

<?php $this->start('main_content') ?>

<h2>Ajout d'un produit</h2>

<form method="POST">
	<div>
		<label for="name">Nom :</label>
		<input type="text" id="name" name="name" value="">
	</div>

	<div>
		<label for="description">Description :</label>
		<textarea id="description" name="description" rows="8" cols="80"></textarea>
	</div>

	<div>
		<label for="image">Image :</label>
		<input type="text" id="image"  name="image" value="">
	</div>

	<div>
		<label for="price">Prix : </label>
		<input type="number" id="price"  name="price" value="">
	</div>

	<button type="submit" name="button">Enregistrer</button>
</form>

<?php $this->stop('main_content') ?>