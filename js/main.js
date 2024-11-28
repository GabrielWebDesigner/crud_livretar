// Função única para abrir o modal de exclusão para diferentes tipos de dados
$('#delete-modal').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget);
	var id = button.data('id'); // ID do item a ser excluído
	var type = button.data('type'); // Tipo de item: cliente, usuário ou livro

	var modal = $(this);
	var itemType = '';

	// Define o texto do título e corpo do modal de acordo com o tipo
	switch (type) {
		case 'cliente':
			itemType = 'Cliente';
			break;
		case 'usuario':
			itemType = 'Usuário';
			break;
		case 'livro':
			itemType = 'Livro';
			break;
	}

	modal.find('.modal-title').text("Excluir " + itemType + ":");
	modal.find('.modal-body').text("Deseja mesmo excluir o " + itemType.toLowerCase() + " (" + id + ")?");
	modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});
