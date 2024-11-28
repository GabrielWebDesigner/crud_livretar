<?php
include("functions.php");

if (isset($_GET['id'])) {
	try {
		//consultando o usuário para obter o nome do arquivo da foto
		$book = find("livros", $_GET['id']);

		//Chamando a função delete para apagar o usuário do banco de dados
		delete($_GET['id']);

		//Apagando o araquivo da foto do usuário pasta fotos
		if (!empty($book['foto']) && $book['foto'] != 'semimagem.jpg') {
			unlink("fotos/" . $book['foto']);
		}
	} catch (Exception $e) {
		$_SESSION['message'] = "Não foi possível realizar a operação: " . $e->GetMessage();
		$_SESSION['type'] = "danger";
	}
}
