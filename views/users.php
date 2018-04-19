<?php
ob_start();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Login</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user):?>
        <tr>
            <th scope="row"><?=$user['id']?></th>
            <td><?=$user['login']?></td>
            <td>
                <div class="row">
                    <form action="user">
                        <input type="hidden" name="id" value=<?=$user['id']?>>
                        <button class="btn btn-outline-success" type="submit">Editer</button>
                    </form>
                    <?php if($_SESSION['login'] != $user['login']):?>
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?= $user['id']?>">
                        Supprimer
                    </button>
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
