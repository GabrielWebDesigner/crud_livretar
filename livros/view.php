<?php
include("functions.php");
if (!isset($_SESSION)) session_start();
view($_GET['id']);
include(HEADER_TEMPLATE);
?>
<header>
	<h2>Descrição do Livro "<?php echo $livro['nome']; ?>"</h2>
</header>
<hr>
<div class="container text-start">
	<div class="row align-items-center">
		<div class="col">
			<h6>Id do livro:</h6>
			<p><?php echo $livro['id']; ?></p>

			<h6>Autor do livro:</h6>
			<p><?php echo $livro['autor']; ?></p>

			<h6>Estado do livro:</h6>
			<p><?php echo $livro['estadolivro']; ?></p>

			<h6>Resumo do livro:</h6>
			<p><?php echo $livro['resumo']; ?></p>

			<h6>Observações: </h6>
			<p><?php echo $livro['obs']; ?></p>

			<h6>Preço:</h6>
			<p><?php echo 'R$ ' . number_format($livro['preco'] / 100, 2, ',', '.'); ?></p>

			<h6>Data do Cadastro: </h6>
			<p><?php echo formatadata($livro['datacadastro'], "d-m-Y"); ?></p>
		</div>
		<div class="col">
			<h6>Foto:</h6>
			<?php
			if (!empty($livro['foto'])) {
				echo "<img src=\"fotos/" . $livro['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
			} else {
				echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
			}
			?>
		</div>
	</div>
</div>

<div id="actions" class="row">
	<div class="col-md-12 g-4">
		<?php if (isset($_SESSION['user'])) : ?>
			<a href="edit.php?id=<?php echo $livro['id']; ?>" class="button-74 me-4"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
		<?php endif; ?>
		<a href="index.php" class="button-74"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
	</div>
</div>
<?php clear_messages(); ?>

<?php include(FOOTER_TEMPLATE); ?>