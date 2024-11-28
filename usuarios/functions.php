<?php

include('../config.php');
include(DBAPI);

$usuarios = null;
$usuario = null;

/**
 * Listagem de Usuários
 */
function index()
{
	global $usuarios;
	if (!empty($_POST['users'])) {
		$usuarios = filter("usuarios", "nome like '%" . $_POST['users'] . "%'");
	} else {
		$usuarios = find_all("usuarios");
	}
}

/**
 *  Upload de imagens
 */
function upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo)
{
	// Verificar se o arquivo é uma imagem real
	$check = getimagesize($nome_temp);
	if ($check === false) {
		throw new Exception("O arquivo não é uma imagem.");
	}

	// Limitar o tamanho do arquivo (exemplo: 5MB)
	if ($tamanho_arquivo > 5000000) {
		throw new Exception("O arquivo é muito grande.");
	}

	// Limitar tipos de arquivos permitidos (exemplo: jpg, png)
	$tipos_permitidos = ['jpg', 'jpeg', 'png', 'gif'];
	if (!in_array($tipo_arquivo, $tipos_permitidos)) {
		throw new Exception("Tipo de arquivo não permitido.");
	}

	// Mover o arquivo
	if (!move_uploaded_file($nome_temp, $arquivo_destino)) {
		throw new Exception("Houve um erro ao mover o arquivo para a pasta de destino.");
	}
}


/**
 * Cadastro Usuários
 */
function add()
{
	if (!empty($_POST['usuario'])) {
		try {
			$usuario = $_POST['usuario'];

			// Verificar se o usuário enviou uma foto
			if (!empty($_FILES["foto"]["name"])) {
				// Configurações de upload da foto
				$pasta_destino = "fotos/";
				$tipo_arquivo = strtolower(pathinfo(basename($_FILES["foto"]["name"]), PATHINFO_EXTENSION));
				$nomearquivo = uniqid() . "." . $tipo_arquivo;  // Gerar um nome único para a imagem
				$arquivo_destino = $pasta_destino . $nomearquivo;
				$tamanho_arquivo = $_FILES["foto"]["size"]; // Tamanho do arquivo
				$nome_temp = $_FILES["foto"]["tmp_name"];   // Nome temporário do arquivo no servidor

				// Função de upload para mover a imagem para a pasta destino
				upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

				// Atribui o nome do arquivo ao campo 'foto' do usuário
				$usuario['foto'] = $nomearquivo;
			} else {
				// Caso não tenha foto, atribui uma imagem padrão
				$usuario['foto'] = 'semimagem.jpg';
			}

			// Criptografar a senha se ela for informada
			if (!empty($usuario['password'])) {
				$senha = criptografia($usuario['password']);
				$usuario['password'] = $senha;
			}

			// Salva o usuário no banco de dados
			save('usuarios', $usuario);

			// Redireciona para a página inicial após o cadastro
			header('Location: index.php');
			exit();  // Garantir que o script pare de ser executado após o redirecionamento
		} catch (Exception $e) {
			// Mensagem de erro
			$_SESSION['message'] = 'Aconteceu um erro: ' . $e->getMessage();
			$_SESSION['type'] = 'danger';
		}
	}
}

/**
 * Atualização/Edição de Usuários
 */
function edit()
{
	try {
		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			if (isset($_POST['usuario'])) {
				$usuario = $_POST['usuario'];

				//criptografando a senha
				if (!empty($usuario['password'])) {
					$senha = criptografia($usuario['password']);
					$usuario['password'] = $senha;
				}

				if (!empty($_FILES['foto']['name'])) {
					//Upload da foto
					$pasta_destino = "fotos/";
					$arquivo_destino = $pasta_destino . basename($_FILES['foto']['name']);
					$nomearquivo = basename($_FILES['foto']['name']);
					$resolução_arquivo = getimagesize($_FILES['foto']['tmp_name']);
					$tamanho_arquivo = $_FILES['foto']['size'];
					$nome_temp = $_FILES['foto']['tmp_name'];
					$tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

					upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

					$usuario['foto'] = $nomearquivo;
				}

				update('usuarios', $id, $usuario);
				header('Location: index.php');
			} else {
				global $usuario;
				$usuario = find("usuarios", $id);
			}
		} else {
			header("Location: index.php");
		}
	} catch (Exception $e) {
		$_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
		$_SESSION['type'] = "danger";
	}
}

/**
 * Visualização de um Usuário 
 */
function view($id = null)
{
	global $usuario;
	$usuario = find("usuarios", $id);
}

/**
 * Exclusão de um Usuario
 */
function delete($id = null)
{
	try {
		if (!empty($id)) {
			// Buscar o usuário antes de deletar para remover a foto se existir
			$usuario = find("usuarios", $id);

			// Verifica se o usuário existe
			if ($usuario) {
				// Se o usuário tiver uma foto (diferente da imagem padrão), ela será deletada
				if (isset($usuario['foto']) && $usuario['foto'] != 'semimagem.jpg') {
					$arquivo_foto = "fotos/" . $usuario['foto'];

					// Verifica se o arquivo existe no servidor antes de tentar deletar
					if (file_exists($arquivo_foto)) {
						unlink($arquivo_foto);  // Deleta a foto do servidor
					}
				}

				// Remover o usuário do banco de dados
				remove("usuarios", $id);

				// Mensagem de sucesso
				$_SESSION['message'] = "Usuário deletado com sucesso.";
				$_SESSION['type'] = "success";
			} else {
				throw new Exception("Usuário não encontrado.");
			}
		} else {
			throw new Exception("ID inválido.");
		}
	} catch (Exception $e) {
		// Mensagem de erro
		$_SESSION['message'] = "Erro ao deletar o usuário: " . $e->getMessage();
		$_SESSION['type'] = "danger";
	}

	// Redirecionar para a página inicial
	header("Location: index.php");
	exit();
}
