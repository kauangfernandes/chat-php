<div class="h100-vh d-flex justify-content-center align-items-center">
    <form action="/login" method="post" class="w-100">

        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>">
            <label for="floatingInput">E-mail:</label>
        </div>
        <div class="text-danger">
            <?php echo $results[0][0]; ?>
        </div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?php echo isset($_POST['password'])?$_POST['password']:''?>">
            <label for="floatingPassword">Password:</label>
        </div>
        <div class="text-danger">
            <?php echo $results[0][1]; ?>
        </div>

        <button type="submit" class="btn btn-primary">Fazer login</button>
    </form>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Atualização completa :)</h5>
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