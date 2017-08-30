<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2><?= $title ?></h2>

<div class="row">
	<div class="col-md-4 col-md-offset-4">

	<!-- A EFFACER -->
		<a href="<?= $_THE_TOKEN_URL ?>"><?= $_THE_TOKEN_URL ?></a>
	<!-- A EFFACER -->


		<?php if(!empty($error)): ?>
				<div class="alert alert-danger">
					<?= $error ?>
				</div>
			<?php endif; ?>

		<form action="<?= $this->url('security_lost_pwd') ?>" method="POST">
			<div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email">
                </div>
              
                <button type="submit" class="btn btn-pink">Envoyer</button>
		</form>
	</div>
</div>

<?php $this->stop('main_content') ?>