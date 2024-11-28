<?php
include('functions.php');
if (!isset($_SESSION)) session_start();
view($_GET['id']);
include(HEADER_TEMPLATE);
?>
<header>
	<h2>Leitor(a) "<?php echo $customer['name']; ?>"</h2>
	<hr>
</header>

<div class="container text-start mt-5">
	<div class="row align-items-center mb-5">
		<div class="col">
			<h6>Id:</h6>
			<p><?php echo $customer['id']; ?></p>
			<h6>CPF / CNPJ:</h6>
			<p><?php echo formatacpfcnpj($customer['cpf_cnpj']); ?></p>
			<h6>Data de Nascimento:</h6>
			<p><?php echo formatadata($customer['birthdate'], "d/m/Y"); ?></p>
			<h6>CEP:</h6>
			<p><?php echo formatacep($customer['zip_code']); ?></p>
		</div>
		<div class="col">
			<h6>Endereço:</h6>
			<p><?php echo $customer['address']; ?></p>
			<h6>Bairro:</h6>
			<p><?php echo $customer['hood']; ?></p>
			<h6>Data de Cadastro:</h6>
			<p><?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?></p>
			<h6>Alterado em:</h6>
			<p><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></p>
		</div>
		<div class="col">
			<h6>Cidade:</h6>
			<p><?php echo $customer['city']; ?></p>
			<h6>Telefone:</h6>
			<p><?php echo formataphone($customer['phone']); ?></p>
			<h6>UF:</h6>
			<p><?php echo $customer['state']; ?></p>
			<h6>Inscrição Estadual:</h6>
			<p><?php echo formataie($customer['ie']); ?></p>
		</div>
	</div>
	<div id="actions" class="row">
		<div class="col-md-12">
			<?php if (isset($_SESSION['user'])) : ?>
				<a href="edit.php?id=<?php echo $customer['id']; ?>" class="button-74 me-4"><i class="fa-solid fa-pencil me-2"></i>Editar</a>
			<?php endif; ?>
			<a href="index.php" class="button-74"><i class="fa-solid fa-arrow-left"></i> Cancelar</a>
		</div>
	</div>
</div>
<?php include(FOOTER_TEMPLATE); ?>