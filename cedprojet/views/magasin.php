<?php ob_start();
$cat = '';
?>
<div class="window">
    <div class="main" role="main">
        <div class="movie-list">
            <ul class="list">
                <?php foreach ($article as $article):
                    switch ($article['article_cat']) {
                        case 1:
                            $cat = 'Figurine';
                            break;
                        case 2:
                            $cat = 'Mug';
                            break;
                        case 3:
                            $cat = 'Poster';
                            break;
                        case 4:
                            $cat = 'Accessoire';
                            break;
                        default:
                            $cat = 'Erreur';
                            break;
                    }?>
                    <li>
                        <img src="<?= $article['article_image'] ?>" alt="" class="cover"/>
                        <p class="titre"><?= $article['article_nom'] ?></p>
                        <p class="prix"><?= '<strong>Prix : </strong>' . $article['article_prix'] . '€' ?></p>
                        <?php if ($article['article_cat'] <= 3 || $article['article_cat'] == 5) { ?>
                            <p class="code"><?= '<strong>code : </strong>' . $article['article_code'] ?></p><?php
                        } ?>
                        <p class="cat"><strong>Genre : </strong><?= $cat ?></p>
                        <a href = "#" title="<?=$article['article_description']?>" class="btn btn-info articleInfo" role="button">Plus d'info</a>
                        <?php if (!empty($_SESSION['login'])): ?>
                            <a href="addpanier?article_id=<?= $article['article_id'] ?>"class="btn btn-warning add addPanier" role="button">Ajouter au panier</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] == 1){ ?>
                            <p class="editer">
                            <form class="test" action="edit_article" method="post">
                                <button type="submit" type="submit" name="update_article" class="btn btn-primary"
                                        value="<?= $article['article_id'] ?>">Editer
                                </button>
                                <button type="submit" type="submit" name="delete_article" class="btn btn-danger"
                                        value="<?= $article['article_id'] ?>">Supprimer
                                </button>
                            </form>
                            </p>
                          <?php }
                         }?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div> <!-- movie list -->
    </div> <!-- main -->
</div> <!-- window -->
<?php
$title = 'Article';
$content = ob_get_clean();
include 'includes/layout.php'; ?>
