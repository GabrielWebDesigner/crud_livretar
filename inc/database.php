<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database()
{
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$conn->set_charset("utf8");
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn)
{
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 * Pesquisa um Registro pelo ID em uma Tabela
 */
function find($table = null, $id = null)
{
	$database = open_database();
	$found = null;

	try {
		if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id = " . intval($id); // Use intval para garantir a segurança
			$result = $database->query($sql);

			if ($result && $result->num_rows > 0) {
				$found = $result->fetch_assoc();  // Retorna os dados do cliente
			}
		}
	} catch (Exception $e) {
		$_SESSION['message'] = $e->getMessage();
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
	return $found;
}

function find_all($table)
{
	$database = open_database();
	$sql = "SELECT * FROM {$table}";

	try {
		$result = $database->query($sql);
		if ($result) {
			return $result->fetch_all(MYSQLI_ASSOC); // Retorna os dados como um array associativo
		}
	} catch (Exception $e) {
		$_SESSION['message'] = $e->getMessage();
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
	return []; // Retorna um array vazio se falhar
}

function save($table = null, $data = null)
{
	$database = open_database();
	$columns = [];
	$values = [];

	foreach ($data as $key => $value) {
		$columns[] = trim($key);  // Não é necessário remover aspas
		$values[] = "'" . $database->real_escape_string($value) . "'"; // Escapa os valores
	}

	$sql = "INSERT INTO " . $table . " (" . implode(',', $columns) . ") VALUES (" . implode(',', $values) . ");";

	if ($database->query($sql) === TRUE) {
		$_SESSION['message'] = 'Registro cadastrado com sucesso.';
		$_SESSION['type'] = 'success';
	} else {
		$_SESSION['message'] = 'Não foi possível realizar a operação: ' . $database->error; // Captura o erro do banco
		$_SESSION['type'] = 'danger';
	}

	close_database($database);
}


function update($table = null, $id = 0, $data = null)
{
	$database = open_database();
	$items = [];

	foreach ($data as $key => $value) {
		$items[] = trim($key, "'") . "='" . $database->real_escape_string($value) . "'"; // Escapa os valores
	}

	$sql = "UPDATE " . $table . " SET " . implode(',', $items) . " WHERE id=" . intval($id) . ";"; // Use intval para garantir a segurança
	try {
		$database->query($sql);
		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';
	} catch (Exception $e) {
		$_SESSION['message'] = 'Não foi possível realizar a operação: ' . $e->getMessage();
		$_SESSION['type'] = 'danger';
	}
	close_database($database);
}

/**
 * Remove uma linha de uma tabela pelo ID do registro
 */
function remove($table = null, $id = null)
{
	$database = open_database();
	try {
		if ($id) {
			$sql = "DELETE FROM " . $table . " WHERE id = " . intval($id); // Use intval para garantir a segurança
			$result = $database->query($sql);
			if ($result) {
				$_SESSION['message'] = "Registro removido com sucesso.";
				$_SESSION['type'] = 'success';
			}
		}
	} catch (Exception $e) {
		$_SESSION['message'] = "Erro ao remover registro: " . $e->getMessage();
		$_SESSION['type'] = 'danger';
	}
	close_database($database);
}

/**
 * Pesquisa registros pelo parâmetro $p que foi passado
 */
function filter($table = null, $p = null)
{
	$database = open_database();
	$found = null;

	try {
		if ($p) {
			$sql = "SELECT * FROM " . $table . " WHERE " . $p; // Adicione um espaço após WHERE
			$result = $database->query($sql);
			if ($result && $result->num_rows > 0) {
				$found = [];
				while ($row = $result->fetch_assoc()) {
					array_push($found, $row);
				}
			} else {
				throw new Exception("Não foram encontrados registros de dados!");
			}
		}
	} catch (Exception $e) {
		$_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
		$_SESSION['type'] = "danger";
	}

	close_database($database);
	return $found;
}

/**
 * Criptografia
 */
function criptografia($senha)
{
	$custo = "08";
	$salt = "CflfllePArKlBJomM0F6aJ";
	$hash = crypt($senha, "$2a$" . $custo . "$" . $salt . "$");

	return $hash;
}

function clear_messages()
{
	$_SESSION['message'] = null;
	$_SESSION['type'] = null;
}

function formatadata($date, $formato)
{
	$dt = new DateTime($date, new DateTimeZone("America/Sao_Paulo"));
	return $dt->format($formato);
}

function formatacep($cep)
{
	$cp = substr($cep, 0, 5) . "-" . substr($cep, 5);
	return $cp;
}

function formatacpfcnpj($cpf_cnpj)
{
	// Formata CPF ou CNPJ
	if (strlen($cpf_cnpj) === 11) {
		return substr($cpf_cnpj, 0, 3) . "." . substr($cpf_cnpj, 3, 3) . "." . substr($cpf_cnpj, 6, 3) . "-" . substr($cpf_cnpj, 9, 2); // CPF
	} elseif (strlen($cpf_cnpj) === 14) {
		return substr($cpf_cnpj, 0, 2) . "." . substr($cpf_cnpj, 2, 3) . "." . substr($cpf_cnpj, 5, 3) . "/" . substr($cpf_cnpj, 8, 4) . "-" . substr($cpf_cnpj, 12, 2); // CNPJ
	}
	return $cpf_cnpj; // Retorna sem formatação se o tamanho não corresponder
}

function formataphone($phone)
{
	$phone = "(" . substr($phone, 0, 2) . ") " . substr($phone, 2, 5) . "-" . substr($phone, 7, 4);
	return $phone;
}

function formataie($inscricao)
{
	$inscricao = preg_replace('/\D/', '', $inscricao);

	$inscricao = substr($inscricao, 0, 2) . "." . substr($inscricao, 2, 3) . "." . substr($inscricao, 5, 3) . "-" . substr($inscricao, 8, 1);
	return $inscricao;
}

/* Masks */