<?php ob_start(); ?>
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">&eacute;diter article</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="update_nom" id="update_nom"  value="<?= $article['article_nom']?>"/>
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Lien image</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="update_image" id="update_image"  value="<?= $article['article_image']?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Code</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="update_code" id="update_code"  value="<?= $article['article_code']?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="adresse" class="cols-sm-2 control-label">Prix</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="update_prix" id="update_prix"  value="<?= $article['article_prix']?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Description</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="update_description" id="update_description"  value="<?= $article['article_description']?>"/>
								</div>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" class="btn btn-success btn-lg btn-block login-button" name="update2_submit" id="update2_submit">Modifier</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<?php
$title = "";
$content = ob_get_clean();
include 'includes/layout.php'; ?>
