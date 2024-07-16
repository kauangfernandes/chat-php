<div id="cont-message" class="messages">
    <ul class="list-group list-group-flush">
        <?php
            if(is_array($results[1])){
                foreach ($results[1] as $message) {
                    if($message->id_user == $_SESSION['id_user']){
                        echo "<li class='list-group-item d-flex justify-content-end'>{$message->message}</li>";
                    } else {
                        echo "<li class='list-group-item'>{$message->message}</li>";
                    }
                }
            }
        ?>
    </ul>
</div>

<div class="card py-4 sticky-buttom">
    <div class="list-group list-group-flush">
        <div class="list-group-item">
            <?php
                if(is_object($results[0])){
                    echo "Você esta falando com:<strong> {$results[0]->name} | {$results[0]->email} </strong>";
                }
            ?>
        </div>

        <form action="" method="post" class="list-group-item">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Menssagem</label>
            </div>

            <div class="py-2 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Messagem enviada com Sucesso :)</h5>
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