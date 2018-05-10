<div class="modal fade" id="modal<?= $user['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer l'utilisateur ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <form action="suprime_user">
            <input type="hidden" name="user_id" value=<?=$user['user_id']?>>
            <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
