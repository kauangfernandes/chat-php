<div id="cont-message" class="messages overflow-auto">
    <ul id="lista" class="list-group list-group-flush">
    </ul>
</div>

<div class="card py-4 fixed-bottom">
    <div class="list-group list-group-flush">
        <div class="list-group-item">
            <?php
                if(is_object($results[0])){
                    echo "Você esta falando com:<strong> {$results[0]->name} | {$results[0]->email} </strong>";
                }
            ?>
        </div>

        <form id="form-mensagem" action="" method="post" class="list-group-item">
            <div class="form-floating">
                <textarea name="menssagem" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"><?php echo isset($_POST['menssagem'])?$_POST['menssagem']:''?></textarea>
                <label for="floatingTextarea">Menssagem</label>
            </div>

            <div class="text-danger">
                <?php echo $results[1][0] ?>
            </div>

            <div class="py-2 d-flex justify-content-end">
                <button id="botao-reset" type="reset" class="btn btn-lg btn-warning mx-1">Limpar</button>
                <button type="submit" class="btn btn-lg btn-primary mx-1">Enviar</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Mensagem enviada com Sucesso :)</h5>
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