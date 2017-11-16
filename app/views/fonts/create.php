<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">Let's Create It !
	<small class="glyphicon glyphicon-pencil"></small>
</h1>
<hr class="col-xs-10 col-xs-offset-1"/>

<?php include __DIR__ . "./../ui/alert-box.php"; ?>

<section class="container-fluid col-xs-10 col-xs-offset-1">
	<form action="" method="post">
	  <div class="form-group col-xs-5 col-xs-offset-1">
	    <input name="fonts_name" class="form-control" placeholder="Nom de la Font">
	  	</div>
	    <div class="form-group col-xs-3">
	      <input name="fonts_line_height" class="form-control" placeholder="4">
	    </div>
	    <div class="form-group col-xs-1">
	  <button type="submit" class="btn btn-success glyphicon glyphicon-plus"></button>
	  </div>
	</form>
</section>

<?php include __DIR__ . "./../footer.php"; ?>
