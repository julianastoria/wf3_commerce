<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2><?= $title ?></h2>

<form method="POST">
<?php if(!empty($error)): ?>
				<div class="alert alert-danger">
					<?= $error ?>
				</div>
			<?php endif; ?>
			
	<div>
		<label for="username">Nom Prénom</label>
		<input type="text" id="username" name="username" value="<?= $username?>">
	</div>

	<div>
		<label for="email">Adresse email</label>
		<input type="email" id="email" name="email" value="<?= $email ?>">
	</div>

	<div>
		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password">
	</div>

	<div>
		<label for="repeat_password">Répéter le mot de passe</label>
		<input type="password" id="repeat_password" name="repeat_password">
	</div>

	<button type="submit" class=" btn btn-pink"> Je m'inscris</button>
</form>

<?php $this->stop('main_content') ?>