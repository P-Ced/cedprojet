<?php ob_start(); ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Prix total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($commandes as $commandes):?>
        <tr>
            <th scope="row"><?=$commandes['commande_id']?></th>
            <td><?=$commandes['commande_user']?></td>
            <td><?=$commandes['commande_prix']?> €</td>

        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = "Commandes";
$content = ob_get_clean();
include 'includes/layout.php'; ?>
