<div class="card">
  <ul class="list-group list-group-flush">
    <?php
        if(is_array($results[0]) && count($results[0]) > 0){
            foreach ($results[0] as $chat) {

                if($_SESSION['id_user'] == $chat->id_user_one){
                    echo "<li class='list-group-item'><a href='/chat?id_chat={$chat->id_chat}&id_user_two={$chat->id_user_two}'>{$chat->user_two_name} | {$chat->email_user_two}</a></li>";
                } else {
                    echo "<li class='list-group-item'><a href='/chat?id_chat={$chat->id_chat}&id_user_one={$chat->id_user_one}'>{$chat->user_one_name} | {$chat->email_user_one}</a></li>";
                }

            }

        } else {
            echo "<li class='list-group-item'>Nenhum chat encontrado.</li>";
        }
    ?>
    
  </ul>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Login feito com Sucesso :)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <span>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-continue" data-bs-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>