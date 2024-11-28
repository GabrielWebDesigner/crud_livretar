<?php
include("functions.php");
if (!isset($_SESSION)) session_start();
index();
include(HEADER_TEMPLATE);
?>
<header class="mt-2">
	<div class="grid text-start">
		<div class="col-sm-6">
			<h6>Bem-vindo a nossa</h6>
			<h2>Biblioteca Virtual</h2>
		</div>
		<div class="col-sm-6">
			<?php if (isset($_SESSION['user'])) : ?>
				<a class="button-74 me-4" href="add.php"><i class="fa-solid fa-receipt me-2"></i>Vender meu livro</a>
			<?php endif; ?>
			<a class="button-74" href="index.php"><i class="fa-solid fa-refresh me-2"></i>Atualizar</a>
		</div>
	</div>
</header>
<hr>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5 mt-5">
	<?php if ($livros) : ?>
		<?php foreach ($livros as $livro) : ?>
			<article class="livrocard g-col">
				<section class="livrocard__hero" style="background-image: url('fotos/<?php echo !empty($livro['foto']) ? $livro['foto'] : 'semimagem.jpg'; ?>');">
					<header class="livrocard__hero-header">
						<span class="bookback no-click"><?php echo htmlspecialchars($livro['estadolivro']); ?></span>
						<div class="livrocard__icon">
							<a href="view.php?id=<?php echo $livro['id']; ?>"><i class="fa-regular fa-eye"></i></a>
						</div>
					</header>
				</section>
				<h6 class="livrocard__job-title"><?php echo $livro['nome']; ?></h6>
				<hr>
				<footer class="livrocard__footer">
					<div class="livrocard__job-summary">
						<img src="../assets/Livraria.svg" alt="logo da livraria" height="28" width="28">
						<div class="livrocard__job">
							<p>Id: <?php echo $livro['id']; ?></p>
							<p class="card__description">R$ <?php echo number_format($livro['preco'] / 100, 2, ',', '.'); ?>
						</div>
					</div>
					<?php if (isset($_SESSION['user'])) : ?>
						<a href="edit.php?id=<?php echo $livro['id']; ?>" class="button-74"><i class="fa-regular fa-pen-to-square"></i></a>
						<a href="#" class="button-74" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id="<?php echo $livro['id']; ?>" data-type="livro">
							<i class="fa-regular fa-trash-can"></i>
						</a>
					<?php else : ?>
						<a href="view.php?id=<?php echo $livro['id']; ?>" class="button-74"><i class="fa-regular fa-eye"></i></a>
						</a>
					<?php endif; ?>

				</footer>
			</article>
		<?php endforeach; ?>
	<?php else : ?>
		<div>Nenhum registro encontrado.</div>
	<?php endif; ?>
</div>
<?php include("modal.php"); ?>
<?php include(FOOTER_TEMPLATE); ?>