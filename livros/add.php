<?php
include("functions.php");
if (!isset($_SESSION)) session_start();
add();
include(HEADER_TEMPLATE); ?>

<h2 class="mt-2">Informações do seu livro</h2>
<form action="add.php" method="post" enctype="multipart/form-data">
    <hr>
    <div class="row mb-5 mt-5">
        <div class="form-group col-md-4">
            <label for="nome">
                <h6>Nome</h6>
            </label>
            <input type="text" class="form-control" id="nome" name="livro[nome]" required>
        </div>

        <div class="form-group col-md-4">
            <label for="autor">
                <h6>Autor do Livro</h6>
            </label>
            <input type="text" class="form-control" id="autor" name="livro[autor]" required>
        </div>

        <div class="form-group col-md-4">
            <label for="estadolivro">
                <h6>Estado do livro</h6>
            </label>
            <select class="form-select" aria-label="Default select example" id="estadolivro" name="livro[estadolivro]" required>
                <option selected>Condição do Livro</option>
                <option value="Novo">Novo</option>
                <option value="Semi novo">Semi Novo</option>
                <option value="Usado">Usado</option>
                <option value="Só o pó">Só o pó</option>
            </select>
        </div>
    </div>

    <div class="row mb-5">
        <div class="form-group col-md-4">
            <label for="resumo">
                <h6>Resumo do Livro</h6>
            </label>
            <input type="text" class="form-control" id="resumo" name="livro[resumo]">
        </div>
        <div class="form-group col-md-4">
            <label for="obs">
                <h6>Observações sobre o livro</h6>
            </label>
            <input type="text" class="form-control" id="obs" name="livro[obs]">
        </div>

        <div class="form-group col-md-4">
            <label for="preco">
                <h6>Preço</h6>
            </label>
            <input type="text" class="form-control" id="preco" name="livro[preco]" required>
        </div>
    </div>

    <div class="row mb-5">
        <div class="form-group col-md-4">
            <label for="datacadastro">
                <h6>Data do Cadastro</h6>
            </label>
            <input type="date" class="form-control" id="datacadastro" name="livro[datacadastro]" disabled>
        </div>

        <div class="form-group col-md-4">
            <label for="foto">
                <h6>Foto NF</h6>
            </label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>

        <div class="form-group col-md-2">
            <label for="imgPreview">
                <h6>Pré visualização</h6>
            </label>
            <img class="form-control rounded" id="imgPreview" src="./fotos/semimagem.jpg" alt="" srcset="">
        </div>
    </div>

    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="button-74 me-4"><i class="fa-solid fa-sd-card"></i> Salvar</button>
            <a href="index.php" class="button-74"><i class="fa-solid fa-arrow-left"></i> Cancelar</a>
        </div>
    </div>
</form>
<?php include(FOOTER_TEMPLATE); ?>
<script>
    $(document).ready(() => {
        $("#foto").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#imgPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>