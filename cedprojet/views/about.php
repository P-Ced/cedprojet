<?php ob_start() ?>
	<p style="text-align: center;">
	<img src="images/logo.png" alt="Geek" />
	</p>
	<p>
				Nous vous proposons les dernières nouveautés de goodies mais aussi toute une série de collection inédite comme les goodies spécial Halloween, Noel ou ceux du nouvelle an.

				Pour votre confort, nous vous offrons la possibilité de profiter de notre catalogue fait avec passion, selon les sorties. Mais Goodies Geek, c’est aussi un service aux entreprises grâce à son département spécial.
	</p>
	<p>

				Pour ne pas manquer nos actions à venir, inscrivez-vous à notre <a href="<?URL?>" target="_blank">newsletter</a>.
	</p>
<iframe width="560" height="315" src="https://www.youtube.com/embed/0Nu3phaLpT0?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="display: block; margin-left: auto; margin-right: auto;"></iframe>
<?php
$title = 'A propos';
$content = ob_get_clean();
include 'includes/layout.php';
?>
