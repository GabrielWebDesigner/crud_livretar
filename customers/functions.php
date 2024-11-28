<?php

include('../config.php');
include(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function index()
{
    global $customers;
    $customers = find_all('customers');
}

/**
 *  Visualização de um Cliente
 */
function view($id = null)
{
    global $customer;
    $customer = find('customers', $id);
}

/**
 *  Cadastro de Clientes
 */
function add()
{
    if (!empty($_POST['customer'])) {
        // Define o fuso horário para a data e hora atual
        $today = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

        // Obtém os dados do cliente do formulário
        $customer = $_POST['customer'];
        // Define as datas de criação e modificação
        $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");

        // Valide e sanitize os dados do cliente aqui

        try {
            save("customers", $customer);
            header('Location: index.php');
            exit;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

/**
 *  Edição de Clientes
 */
function edit()
{
    $new = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['customer'])) {
            $customer = $_POST['customer'];
            $customer['modified'] = $new->format("Y-m-d H:i:s");

            // Valida se o cliente foi encontrado e atualiza
            if (!empty($customer)) {
                update('customers', $id, $customer);
                header('Location: index.php');
                exit;
            } else {
                echo "Erro ao atualizar o cliente.";
            }
        } else {
            global $customer;
            $customer = find('customers', $id);
        }
    } else {
        header('Location: index.php');
        exit;
    }
}

/**
 *  Exclusão de um Cliente
 */
function delete($id = null)
{
    global $customers;
    $customers = remove('customers', $id);
    header("Location: index.php");
    exit;
}
