<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($user as $user):?>
        <tr>
            <th scope="row"><?=$user['user_id']?></th>
            <td><?=$user['user_pseudo']?></td>
            <td>
                <div class="row">
                    <form action="edit_user" style="display:inline;">
                        <button class="btn btn-success" name="user_id" value=<?=$user['user_id']?> type="submit">Editer</button>
                    </form>
                    <?php if($_SESSION['login'] != $user['user_pseudo']):?>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $user['user_id']?>">Supprimer</button>
                    <?php include 'includes/delete_model.php' ?>
                    <?php endif ?>
                </div>
            </td>

        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des utilisateurs';
$content = ob_get_clean();
include 'includes/layout.php';
?>
