<?php ob_start(); ?>
<div class="container">
    <table class="table table-fixed table-striped">
          <thead>
              <tr>
                  <th>Qte</th>
                  <th>Images</th>
                  <th>Nom</th>
                  <th>Prix</th>
              </tr>
          </thead>
        <body>
        <?php foreach ($article as $article): ?>
            <tr>
                <td><?= $_SESSION['panier'][$article['article_id']] ?></td>
                <td><img src="<?= $article['article_image'] ?>" style="width:75px;height:100px;"></td>
                <td><?= $article['article_nom'] ?></td>
                <td><?= $article['article_prix'] . "€" ?></td>
                <td><a href="panier?del=<?= $article['article_id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <td></td>
        <td></td>
        <td>
          <?php if (!empty($_SESSION['panier'])): ?>
            <button onclick="window.location.href='<?=URL?>payement'" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-ok"></span> Ok </button>
          <?php endif; ?>
        </td>
        </body>
    </table>
</div>
<?php
$title = "Panier";
$content = ob_get_clean();
include 'includes/layout.php'; ?>
