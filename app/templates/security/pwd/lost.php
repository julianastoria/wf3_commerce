<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<h2><?= $title ?></h2>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
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