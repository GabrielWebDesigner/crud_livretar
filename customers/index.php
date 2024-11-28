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
            <h2>Comunidade de Leitores</h2>
        </div>
        <div class="col-sm-6">
            <?php if (isset($_SESSION['user'])) : ?>
                <a class="button-74 me-4" href="add.php"><i class="fa fa-plus"></i> Cadastrar Clientes</a>
            <?php endif; ?>
            <a class="button-74" href="index.php"><i class="fa-solid fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>
<hr>
<table class="table table-hover mt-5">
    <thead>
        <tr>
            <th>
                <h6>ID</h6>
            </th>
            <th width="30%">
                <h6>Nome</h6>
            </th>
            <th>
                <h6>CPF/CNPJ</h6>
            </th>
            <th>
                <h6>Telefone</h6>
            </th>
            <th>
                <h6>Adicionado em</h6>
            </th>
            <th>
                <h6>Atualizado em</h6>
            </th>
            <th>
                <h6>Opções</h6>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($customers) : ?>
            <?php foreach ($customers as $customer) : ?>
                <tr class="align-middle">
                    <td><?php echo $customer['id']; ?></td>
                    <td><?php echo htmlspecialchars($customer['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo formatacpfcnpj($customer['cpf_cnpj']); ?></td>
                    <td><?php echo formataphone($customer['phone']); ?></td>
                    <td><?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?></td>
                    <td><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $customer['id']; ?>" class="button-74 me-2 mt-1 mb-1"><i class="fa fa-eye"></i> </a>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <a href="edit.php?id=<?php echo $customer['id']; ?>" class="button-74 me-2 mt-1 mb-1"><i class="fa fa-pencil"></i> </a>
                            <a href="#" class="button-74 me-1 mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id="<?php echo $customer['id']; ?>" data-type="cliente">
                                <i class="fa fa-trash"></i>
                            </a>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum registro encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php include("modal.php"); ?>

<?php include(FOOTER_TEMPLATE); ?>