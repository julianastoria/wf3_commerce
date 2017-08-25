<?php $this->layout('layout', ['title' => 'Liste des produits']) ?>

<?php $this->start('main_content') ?>
	<a href= "<?= $this->url('product_create') ?>">Ajouter un produit</a>

<h2>Liste des Produits :</h2>
	
	<?php foreach ($products as $product) : ?>
	<h2><a href="<?= $this->url('product_read', ["id" => $product['id']]) ?>"><?= $product['name'] ?><a></h2><br>
		<p><?= $product['description'] ?></p><br>
		<img src="<?= $product['image'] ?>"><br>
		<p><?= $product['price'] ?></p><br><br>
	<?php endforeach; ?>

<?php $this->stop('main_content') ?>