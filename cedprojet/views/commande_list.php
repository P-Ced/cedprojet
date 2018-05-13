<?php ob_start(); ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id/Code</th>
            <th scope="col">User/quantit&eacute;</th>
            <th scope="col">Total/Prix</th>
        </tr>
    </thead>
    <tbody>
          <?php foreach($commandes as $commandes):?>
          <tr>
              <th scope="row"><?=$commandes['commande_id']?></th>
              <th scope="row"><?=$commandes['commande_user']?></th>
              <th scope="row"><?=$commandes['commande_prix']?> €</th>
              <?php $commande = getListeByCommandeId($commandes['commande_id']);?>
        </tr>
            <?php foreach($commande as $liste):?>
        <tr>
            <td><?=$liste['liste_code']?></td>
            <td><?=$liste['liste_qte']?></td>
            <td><?=$liste['liste_prix']?> €</td>
        </tr>
          <?php endforeach ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = "Commandes";
$content = ob_get_clean();
include 'includes/layout.php'; ?>
