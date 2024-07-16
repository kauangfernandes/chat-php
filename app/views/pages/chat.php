<div id="cont-message" class="messages">
    <ul class="list-group list-group-flush">

    </ul>
</div>

<div class="card py-4 sticky-buttom">
    <div class="list-group list-group-flush">
        <div class="list-group-item">
            <?php
                if(is_object($results[0])){
                    echo "Você esta falando com: {$results[0]->name} | {$results[0]->email}";
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