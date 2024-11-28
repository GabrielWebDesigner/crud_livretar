<?php
require "config.php";
require DBAPI;
if (!isset($_SESSION)) session_start();
include(HEADER_TEMPLATE);
$db = open_database();
?>
<h1>Livretar</h1>

<hr class="border-white-25 my-4 mb-4">

<h2 class="mb-2 mt-5">Nos Conheça</h2>
<p class="italico">"Mais que ler nós nos libertamos, eu diria que ler um livro é se livretar" - Gabriel Rodrigues</p>
<h5>Somos mais que uma biblioteca online onde você pode comprar e vender, somos uma comunidade onde as pessoas se conhecem e trocam histórias veja só, você pode:</h5>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
	<div class="col d-flex align-items-start">
		<i class="fa-solid fa-book-quran flex-shrink-0 me-3 p-1 fs-3 navicons"></i>
		<div>
			<h3 class="mb-0 fs-4">Consultar Livros</h3>
			<p>Está em busca de uma nova história navegue pelo nosso catálogo de livros</p>
		</div>
	</div>
	<div class="col d-flex align-items-start">
		<i class="fa-solid fa-box-archive flex-shrink-0 me-3 p-1 fs-3 navicons"></i>
		<div>
			<h3 class="mb-0 fs-4">Vender seus Livros</h3>
			<p>Tem um livro parado em casa mande para gente para que você possa desapegar das velhas histórias</p>
		</div>
	</div>
	<div class="col d-flex align-items-start">
		<i class="fa-solid fa-people-carry-box flex-shrink-0 me-3 p-1 fs-3 navicons"></i>
		<div>
			<h3 class="mb-0 fs-4">Se tornar um trocardor de histórias</h3>
			<p>Cadastre-se para que possa conhecer novas histórias</p>
		</div>
	</div>
	<div class="col d-flex align-items-start">
		<i class="fa-solid fa-people-group flex-shrink-0 me-3 p-1 fs-3 navicons"></i>
		<div>
			<h3 class="mb-0 fs-4">Conhecer uma comunidade</h3>
			<p>Conheça as pessoas que frequentam a nossa biblioteca e troque histórias</p>
		</div>
	</div>
</div>
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5 d-flex justify-content-evenly">
	<div class="citacao col">
		<div class="citacao-name">Senhor dos anéis</div>
		<div class="quote">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
				<path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
			</svg>
		</div>
		<div class="body-text">"Nem todos os que vagam estão perdidos."</div>
		<div class="author">- J.R.R. Tolkien</div>
	</div>
	<div class="citacao col">
		<div class="citacao-name">O velho e o mar</div>
		<div class="quote">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
				<path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
			</svg>
		</div>
		<div class="body-text">"A coragem é a graça sob pressão."</div>
		<div class="author">- Ernest Hemingway</div>
	</div>
	<div class="citacao col">
		<div class="citacao-name">O Morro dos Ventos Uivantes</div>
		<div class="quote">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
				<path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
			</svg>
		</div>
		<div class="body-text">"O que não é amado não pode ser eterno."</div>
		<div class="author">- Emily Brontë</div>
	</div>
	<div class="citacao col">
		<div class="citacao-name">O Pequeno Príncipe</div>
		<div class="quote">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
				<path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
			</svg>
		</div>
		<div class="body-text">"Tu te tornas eternamente responsável por aquilo que cativas."</div>
		<div class="author">- Antoine de Saint-Exupéry</div>
	</div>
	<div class="citacao col">
		<div class="citacao-name">Middlemarch</div>
		<div class="quote">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
				<path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
			</svg>
		</div>
		<div class="body-text">"É melhor ter amado e perdido do que nunca ter amado."</div>
		<div class="author">- George Eliot</div>
	</div>
</div><?php if (isset($_SESSION['user'])) : ?>
	<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
		<div class="col">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h6 class=" mt-2 mb-2">Visitar o catálogo de livros</h6>
				</div>
				<img src="assets/livroestante.jpg" class="card-img-top" alt="Livro Estante" />
				<div class="card-body">
					<p class="card-text">
						Navegue pela nossa biblioteca virtual e encontre as histórias que buscam no preço que você sonha em adquirir
					</p>
				</div>
				<a href="../crud_livretar/livros/index.php">
					<div class="card-footer d-flex align-items-center">
						<button class="button-74 me-auto" role="button">Consultar</button>
						<i class="fa-solid fa-circle-chevron-right icons"></i>
					</div>
				</a>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h6 class="mt-2 mb-2">Venda seu livro</h6>
				</div>
				<img src="assets/livrocoffee.jpg" class="card-img-top" alt="Livro Coffee" />
				<div class="card-body">
					<p class="card-text">
						Tem algum livro parado em casa venda ele por aqui e libere espaço para novas histórias em sua coleção
					</p>
				</div>
				<a href="../crud_livretar/livros/add.php">
					<div class="card-footer d-flex align-items-center">
						<button class="button-74 me-auto" role="button">Vender</button>
						<i class="fa-solid fa-circle-chevron-right icons"></i>
					</div>
				</a>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h6 class="mb-2 mt-2">Conheça amantes dos livros</h6>
				</div>
				<img src="assets/livroflor.jpg" class="card-img-top" alt="Livro Flor" />
				<div class="card-body">
					<p class="card-text">
						Conheça uma comunidade que adora ler e que desejam compartilhar suas histórias com amantes de livros
					</p>
				</div>
				<a href="../crud_livretar/customers/index.php">
					<div class="card-footer d-flex align-items-center">
						<button class="button-74 me-auto" role="button">Conhecer</button>
						<i class="fa-solid fa-circle-chevron-right icons"></i>
					</div>
				</a>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h6 class="mb-2 mt-2">Faça parte da nossa comunidade</h6>
				</div>
				<img src="assets/livraria.jpg" class="card-img-top" alt="Livraria" />
				<div class="card-body">
					<p class="card-text">
						Faça seu cadastro no nosso site para que você possa compartilhar e conhecer novas histórias
					</p>
				</div>
				<a href="../crud_livretar/customers/add.php">
					<div class="card-footer d-flex align-items-center">
						<button class="button-74 me-auto" role="button">Me Cadastrar</button>
						<i class="fa-solid fa-circle-chevron-right icons"></i>
					</div>
				</a>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="row row-cols-md-2 g-5 mb-5">
		<div class="col">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h6 class=" mt-2 mb-2">Visitar o catálogo de livros</h6>
				</div>
				<img src="assets/livroestante.jpg" class="card-img-top" alt="Livro Estante" />
				<div class="card-body">
					<p class="card-text">
						Navegue pela nossa biblioteca virtual e encontre as histórias que buscam no preço que você sonha em comprar
					</p>
				</div>
				<a href="../crud_livretar/livros/index.php">
					<div class="card-footer d-flex align-items-center">
						<button class="button-74 me-auto" role="button">Consultar</button>
						<i class="fa-solid fa-circle-chevron-right icons"></i>
					</div>
				</a>
			</div>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h6 class="mb-2 mt-2">Conheça amantes dos livros</h6>
				</div>
				<img src="assets/livroflor.jpg" class="card-img-top" alt="Livro Flor" />
				<div class="card-body">
					<p class="card-text">
						Conheça uma comunidade que adora ler e que desejam compartilhar suas histórias com amantes de livros
					</p>
				</div>
				<a href="../crud_livretar/customers/index.php">
					<div class="card-footer d-flex align-items-center">
						<button class="button-74 me-auto" role="button">Conhecer</button>
						<i class="fa-solid fa-circle-chevron-right icons"></i>
					</div>
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>