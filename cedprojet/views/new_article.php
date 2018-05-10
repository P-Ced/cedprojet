<?php ob_start(); ?>
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">ajouter un article</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						<?= $ERROR["ajouter"] ?>
						<?= $SUCCES["ajouter"] ?>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="article_nom" id="article_nom"  placeholder="entre le nom de l'article"/>
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Image</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="article_image" id="article_image"  placeholder="entre le lien de l'image"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Description</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="article_description" id="article_description"  placeholder="entre la description de l'article"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="adresse" class="cols-sm-2 control-label">Prix</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="article_prix" id="article_prix"  placeholder="entre le prix de l'article"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Code</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="article_code" id="article_code"  placeholder="entre le code article"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Catégorie</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="article_cat" id="article_cat"  placeholder="entre la categorie (1/2/3/4)"/>
								</div>
								<small id="loginHelp" class="form-text text-muted">1) Figurine, 2) Mug, 3) Poster, 4) Accessoire</small>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="new_article" id="new_article">Enregistré produit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <?php
    $title = "";
    $content = ob_get_clean();
    include 'includes/layout.php';
    ?>
