<?php
include("functions.php");
if (!isset($_SESSION)) session_start();
add();
include(HEADER_TEMPLATE);
?>

<h2 class="mt-2">Se Cadastre</h2>

<form action="add.php" method="post">
	<hr />
	<div class="row mt-5 mb-5">
		<div class="form-group col-md-7">
			<label for="name">
				<h6>Nome / Razão Social</h6>
			</label>
			<input type="text" class="form-control" minlength="2" maxlength="60" placeholder="Digite seu Nome/Razão Social" name="customer['name']" required>
		</div>

		<div class="form-group col-md-2">
			<label for="cpf" class="">
				<h6>CPF</h6>
			</label>
			<input type="text" class="form-control input-custom" id="cpf" name="cpf"
				placeholder="Digite seu CPF" required>
			<div class="invalid-feedback">Por favor, insira um CPF válido.</div>
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">
				<h6>Data de Nascimento</h6>
			</label>
			<input type="date" class="form-control" name="customer['birthdate']" required>
		</div>
	</div>

	<div class="row mb-5">
		<div class="form-group col-md-5">
			<label for="campo1">
				<h6>Endereço</h6>
			</label>
			<input type="text" class="form-control" minlength="5" maxlength="60" placeholder="Digite seu Endereço" name="customer['address']" required>
		</div>

		<div class="form-group col-md-3">
			<label for="campo2">
				<h6>Bairro</h6>
			</label>
			<input type="text" class="form-control" minlength="1" maxlength="50" placeholder="Digite seu Bairro" name="customer['hood']" required>
		</div>

		<div class="form-group col-md-2">
			<label for="cep">
				<h6>CEP</h6>
			</label> <input type="text" class="form-control input-custom" id="cep" name="cep"
				placeholder="Digite seu CEP" required>
			<div class="invalid-feedback">Por favor, insira um CEP válido.</div>
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">
				<h6>Data de Cadastro</h6>
			</label>
			<input type="date" class="form-control" name="customer['created']" disabled>
		</div>
	</div>

	<div class="row mb-5">
		<div class="form-group col-md-5">
			<label for="campo1">
				<h6>Município</h6>
			</label>
			<input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Digite seu Município" name="customer['city']" required>
		</div>

		<div class="form-group col-md-2">
			<label for="telefone">
				<h6>Telefone</h6>
			</label>
			<input type="tel" class="form-control input-custom" id="telefone" name="telefone"
				placeholder="(xx) xxxx-xxxx" required pattern="^\(\d{2}\) \d{4,5}-\d{4}$">
			<div class="invalid-feedback">Por favor, insira um número de telefone válido.</div>
		</div>

		<div class="form-group col-md">
			<label for="campo3">
				<h6>UF</h6>
			</label>
			<input type="text" class="form-control" minlength="2" maxlength="2" placeholder="UF" name="customer[state]" pattern="[A-Za-z]{2}" title="A UF deve conter apenas duas letras maiúsculas" required
				oninput="this.value = this.value.toUpperCase().replace(/[^A-Za-z]/g, '')">
		</div>

        <div class="form-group col-md-2">
            <label for="campo3">
                <h6>Inscrição Estadual</h6>
            </label>
            <input
                type="text"
                class="form-control"
                minlength="10"
                maxlength="12"
                placeholder="Digite sua IE"
                name="customer[ie]"
                id="campo3"
                value="<?php echo isset($customer['ie']) ? formataie($customer['ie']) : ''; ?>"
                pattern="\d{2}\.\d{3}\.\d{3}-\d{2}"
                title="A Inscrição Estadual deve estar no formato 35.123.456-7"
                required
                oninput="formatarie(this)">
        </div>  

	</div>

	<div id="actions" class="row mt-2">
		<div class="col-md-12">
			<button type="submit" class="button-74 me-4"><i class="fa-solid fa-sd-card"></i> Salvar</button>
			<a href="index.php" class="button-74"> <i class="fa-solid fa-arrow-left"></i> Cancelar</a>
		</div>
	</div>
</form>

<?php include(FOOTER_TEMPLATE); ?>