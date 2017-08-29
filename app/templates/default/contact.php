<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
	<h2>Formulaire de contact :</h2>

	<form method="POST">
		<div>
			<label for="name">Votre nom : </label>
			<input type="text" id="name" name="name" value="<?= $name ?>">
		</div>

		<div>
			<label for="email">Votre email : </label>
			<input type="text" id="email" name="email" value="<?= $email ?>">
		</div>

		<div>
			<label for="message">Votre message</label>
			<textarea id="message" name="message" rows="8" cols="80"><?= $message ?></textarea>
		</div>
		<button type="submit" class="btn btn-pink" name="button">Envoi</button>
	</form>
<?php $this->stop('main_content') ?>