<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2><?= $title ?></h2>

<div>
	<strong>Nom</strong> <?= $user['username'] ?>
</div>

<div>
	<strong>Email</strong> <?= $user['email'] ?>
</div>

<?php $this->stop('main_content') ?>