<?php $this->layout('layout', ['title' => 'products']) ?>

<?php $this->start('main_content') ?>
	<a href= "<?= $this->url('product_create') ?>">Ajouter un produit</a>

<h2>Liste des Produits :</h2>


<?php $this->stop('main_content') ?>