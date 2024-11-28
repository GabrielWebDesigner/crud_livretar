<?php
include("functions.php");
if (!isset($_SESSION)) session_start();
edit();
include(HEADER_TEMPLATE);
?>

<header>
	<h2>Atualizar Informações</h2>
</header>

<form action="edit.php?id=<?php echo $livro['id']; ?>" method="post" enctype="multipart/form-data">
	<hr>
	<div class="row mb-5 mt-5">
		<div class="form-group col-md-4">
			<label for="nome">
				<h6>Nome</h6>
			</label>
			<input type="text" class="form-control" name="livro[nome]" value="<?php echo ($livro['nome']); ?>">
		</div>
		<div class="form-group col-md-4">
			<label for="autor">
				<h6>Autor</h6>
			</label>
			<input type="text" class="form-control" name="livro[autor]" value="<?php echo ($livro['autor']); ?>">
		</div>
		<div class="form-group col-md-4">
			<label for="estadolivro">
				<h6>Estado do Livro</h6>
			</label>
			<select class="form-select" aria-label="Default select example" id="estadolivro" name="livro[estadolivro]" required>
				<option selected value="<?php echo $livro['estadolivro']; ?>">Estado do Livro</option>
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
			<input type="text" class="form-control" name="livro[resumo]" value="<?php echo $livro['resumo']; ?>">
		</div>
		<div class="form-group col-md-4">
			<label for="obs">
				<h6>Observações do livro</h6>
			</label>
			<input type="text" class="form-control" name="livro[obs]" value="<?php echo $livro['obs']; ?>">
		</div>
		<div class="form-group col-md-4">
			<label for="preco">
				<h6>Preço</h6>
			</label>
			<!-- Campo de texto para exibir o preço com "R$" e vírgula -->
			<input type="text" class="form-control" name="livro[preco]" id="preco" value="<?php echo 'R$ ' . number_format($livro['preco'] / 100, 2, ',', '.'); ?>" oninput="formatarPreco(this)">
		</div>
	</div>

	<div class="row mb-5">
		<div class="form-group col-md-4">
			<label for="datacadastro">
				<h6>Data do Cadastro</h6>
			</label>
			<input type="date" class="form-control" name="livro[datacadastro]" value="<?php echo formatadata($livro['datacadastro'], "Y-m-d"); ?>" disabled>
		</div>
		<?php
		$foto = "";
		if (empty($livro['foto'])) {
			$foto = "sem_imagem.jpg";
		} else {
			$foto = $livro['foto'];
		}
		?>
		<div class="form-group col-md-4">
			<label for="foto">
				<h6>Foto NF</h6>
			</label>
			<input type="file" class="form-control" id="foto" name="foto" value="fotos/<?php echo $foto; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="pre">
				<h6>Pré-Visualização</h6>
			</label>
			<img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="fotos/<?php echo $foto; ?>" alt="Foto da NF" srcset="">
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