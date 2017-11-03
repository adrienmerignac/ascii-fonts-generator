<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">Authentification</h1>
<hr class="col-xs-10 col-xs-offset-1"/>

<?php include __DIR__ . "./../ui/alert-box.php"; ?>

<section class="container-fluid col-xs-10 col-xs-offset-1">

<?php if(!$user): ?>

	<form action="" method="post">
	  <div class="form-group col-xs-5 col-xs-offset-1">
	    <input name="user_mail" class="form-control" placeholder="Mail">
	  	</div>
	    <div class="form-group col-xs-5">
	      <input name="user_pswd" type="password" class="form-control" placeholder="Password">
	    </div>
	    <div class="form-group col-xs-1">
        <input name="token" value="<?= $token ?>" type="hidden" />
	  <button type="submit" class="btn btn-info">LogIn</button>
	  </div>
	</form>
</section>

<?php endif; ?>

<?php include __DIR__ . "./../footer.php"; ?>