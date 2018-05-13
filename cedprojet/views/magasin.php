<?php ob_start();?>
<div class="window">
    <div class="main" role="main">
        <div class="movie-list">
            <ul class="list">
              <?php foreach ($article as $article):?>
                    <li>
                        <img src = "<?=$article['article_image']?>" alt="image"/>
                        <p class = "titre"><?= $article['article_nom'] ?></p>
                        <p class = "prix"><strong>Prix : </strong><?=$article['article_prix'] . '€' ?></p>
                        <p class = "code"><strong>code : </strong><?=$article['article_code'] ?></p>
                        <p class = "description"><strong>Description: </strong><?=$article['article_description']?></p>
                        <?php if (!empty($_SESSION['login'])): ?>
                            <a href="ajouter_panier?article_id=<?= $article['article_id']?>"class="btn btn-success add addPanier btn-block">Ajouter au panier</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['type'])) {
                            if ($_SESSION['type'] == 2){ ?>
                            <form action="edit_article?article_id=<?=$article['article_id']?>" method="post">
                                <button type="submit" name="update_article" class="btn btn-dark btn-block" value="<?= $article['article_id'] ?>">Editer</button>
                            </form>
                            <form action="suprimer_article?article_cat=<?=$article['article_cat']?>" method="post">
                                <button type="submit" name="suprimer_article" class="btn btn-danger btn-block" value="<?= $article['article_id'] ?>">Supprimer</button>
                            </form>
                          <?php }
                         }?>
                    </li>
              <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php
$title = '';
$content = ob_get_clean();
include 'includes/layout.php'; ?>
