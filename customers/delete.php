<?php
require('functions.php');

if (isset($_GET['id'])) {
    // Valida se o ID é um número inteiro válido
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id !== false && $id > 0) {
        // Verifica se o cliente existe antes de tentar excluí-lo
        $customer = find('customers', $id);
        if ($customer) {
            try {
                delete($id); // Função de exclusão do cliente
                $_SESSION['message'] = 'Cliente removido com sucesso!';
                $_SESSION['type'] = 'success';
            } catch (Exception $e) {
                // Tratamento de exceções em caso de erro na exclusão
                $_SESSION['message'] = 'Erro ao tentar remover o cliente: ' . $e->getMessage();
                $_SESSION['type'] = 'danger';
            }
        } else {
            // Caso o cliente não seja encontrado no banco de dados
            $_SESSION['message'] = 'Cliente não encontrado.';
            $_SESSION['type'] = 'warning';
        }
    } else {
        // Caso o ID não seja válido
        $_SESSION['message'] = 'ID inválido.';
        $_SESSION['type'] = 'danger';
    }
} else {
    // Caso o ID não tenha sido enviado na requisição
    $_SESSION['message'] = 'ID não definido.';
    $_SESSION['type'] = 'warning';
}

// Redireciona para a página de listagem após a operação
header('Location: index.php');
exit();
