<?php ob_start(); ?>
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Goodies Geek</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						<?= $ERROR["REGISTER"] ?>
						<?= $SUCCES["REGISTER"] ?>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="enreg_nom" id="enreg_nom"  placeholder="entre ton nom"/>
								</div>
							</div>
						</div>

            <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Prénom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="enreg_prenom" id="enreg_prenom"  placeholder="entre ton prénom"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="enreg_email" id="enreg_email"  placeholder="entre ton Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="adresse" class="cols-sm-2 control-label">adresse</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="enreg_adresse" id="enreg_adresse"  placeholder="entre ton adresse"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Pseudo</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="enreg_pseudo" id="enreg_pseudo"  placeholder="entre ton pseudo"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Mot de passe</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="enreg_mdp" id="enreg_mdp"  placeholder="entre ton mot de passe"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirmer votre mot de passe</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_mdp" id="confirm_mdp"  placeholder="confirme ton mot de passe"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="register-submit" id="register-submit">S'inscrire</button>
						</div>
						<div class="login-register">
				            <a href="<?=URL . 'login'?>"><button type="button" class="btn btn-primary" style="display: block; margin-left: auto; margin-right: auto;">connection</button></a>
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
