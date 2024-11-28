<?php
include("../config.php");
include(HEADER_TEMPLATE);
?>
<section class="d-flex justify-content-center">
    <div class="card-switch">
        <div class="flip-card__inner">
            <div class="flip-card__front">
                <div class="title">Log in</div>
                <form class="flip-card__form" action="valida.php" method="post">
                    <input class="flip-card__input" id="log" placeholder="Usuário" name="login" required>
                    <input class="flip-card__input" id="pass" placeholder="Senha" name="senha" type="password" required>
                    <div class="col-12 mb-2">
                        <button type="submit" class="flip-card__btn m-2"><i class="fa-solid fa-user-check"></i> Conectar</button>
                        <a href="<?php echo BASEURL; ?>" class="flip-card__btn p-1"><i class="fa-solid fa-arrow-left"></i> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include(FOOTER_TEMPLATE); ?>