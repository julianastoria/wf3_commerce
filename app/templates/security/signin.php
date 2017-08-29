<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2><?= $title ?></h2>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="<?= $this->url('security_signin') ?>" method="POST">
				<div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="user[email]" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="user[password]" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-pink">Submit</button>
			</form>
		</div>
		
	</div>

<?php $this->stop('main_content') ?>