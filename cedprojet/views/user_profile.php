<?php ob_start(); ?>
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Profil <?=$_SESSION['login']?></h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						<?= $ERROR["profil"] ?>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="profil_nom" id="profil_nom"  value="<?= $user['user_nom']?>"/>
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Pr&eacute;nom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="profil_prenom" id="profil_prenom"  value="<?= $user['user_prenom']?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="profil_email" id="profil_email"  value="<?= $user['user_email']?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="adresse" class="cols-sm-2 control-label">Adresse</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="profil_adresse" id="profil_adresse"  value="<?= $user['user_adresse']?>"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Modifier mot de passe</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="profil_mdp" id="profil_mdp"  placeholder="entre ton mot de passe"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirmer votre modification de mot de passe</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_mdp" id="confirm_mdp"  placeholder="confirme ton mot de passe"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-success btn-lg btn-block login-button" name="profil-submit" id="profil-submit">Modifier</button>
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
