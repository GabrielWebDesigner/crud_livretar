</main>
<footer id="footer" class="text-white py-5 mt-5">
    <div class="container">
        <div class="container">

            <div class="row g-4 align-items-center">
                <!-- Seção de Links -->
                <div class="col-md-4 text-md-start">
                    <h5 class="intro-title text-uppercase fw-bold mb-4">Navegação</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a class="intro-info text-decoration-none text-white-50 hover-text-white" href="<?php echo BASEURL; ?>index.php">Home</a>
                        </li>
                        <li class="mb-2">
                            <a class="intro-info text-decoration-none text-white-50 hover-text-white" href="<?php echo BASEURL; ?>livros/index.php">Livros</a>
                        </li>
                        <li class="mb-2">
                            <a class="intro-info text-decoration-none text-white-50 hover-text-white" href="<?php echo BASEURL; ?>customers/index.php">Clientes</a>
                        </li>
                    </ul>
                </div>

                <!-- Seção de Sobre -->
                <div class="col-md-4 text-center">
                    <h5 class="intro-title text-uppercase fw-bold mb-2">Sobre Nós</h5>
                    <p class="intro-text text-white-50 mt-5 mb-2">
                        Explore histórias incríveis e conecte-se com leitores do mundo inteiro. Descubra, compartilhe e viva experiências únicas através da leitura.
                    </p>
                </div>

                <!-- Seção de Contato -->
                <div class="col-md-4 text-md-end text-center mb-4">
                    <h5 class="intro-title text-uppercase fw-bold mb-5">Contato</h5>
                    <ul class="list-unstyled mb-2">
                        <li class="mb-2">
                            <i class="bi bi-envelope"></i>
                            <a href="mailto:contato@site.com" class="intro-info text-decoration-none text-white-50 hover-text-white mb-3">
                                contato@site.com
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-phone"></i>
                            <span class="intro-info text-white-50 hover-text-white">+55 (11) 99999-9999</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Rodapé Final -->
        <div class="footer-info row text-center mt-6 my-5 mb-2">
            <?php $hoje = new Datetime("now", new DatetimeZone("America/Sao_Paulo")); ?>
            <p class="text-footer hover-text-white mt-4">&copy; 2023 - <?php echo $hoje->format("Y") ?> - Projeto SW1 - Bryan_Moedas e Authentic_Coin. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>


<script src="<?php echo BASEURL; ?>js/jquery-3.7.0.min.js"></script>
<script src="<?php echo BASEURL; ?>js/popper.min.js"></script>
<script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
<script src="<?php echo BASEURL; ?>js/masks.js"></script>
<script src="<?php echo BASEURL; ?>js/main.js"></script>
</body>

</html>