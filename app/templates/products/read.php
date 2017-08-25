<?php $this->layout('layout', ['title' => "$name" ]) ?>

<?php $this->start('main_content') ?>
<a href="<?= $this->url('product_update', ['id' => $id]) ?>">Modifier le produit</a>
<a href="<?= $this->url('product_delete', ['id' => $id]) ?>">Supprimer le produit</a>
	
	<h2><?= $name ?></h2>
	<p><?= $description ?></p>
		<img src="<?= $image ?>">
	<p><?= $price ?></p>
<?php $this->stop('main_content') ?>