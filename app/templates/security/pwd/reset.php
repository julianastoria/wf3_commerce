<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2><?= $title ?></h2>

<div class="row">
	<div class="col-md-4 col-md-offset-4">

			<?php if(!empty($error)): ?>
				<div class="alert alert-danger">
					<?= $error ?>
				</div>
			<?php endif; ?>

		<form action="<?= $this->url('security_reset_pwd', ["token" => $token]) ?>" method="POST">

		<input type="text" name="token" value="<?= $token ?>">

			<div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
                </div>

                <div class="form-group">
                    <label for="repeat_password">Répèter le nouveau mot de passe</label>
                    <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Répèter le nouveau mot de passe">
                </div>
              
                <button type="submit" class="btn btn-pink">Envoyer</button>
		</form>
	</div>
</div>


<?php $this->stop('main_content') ?>