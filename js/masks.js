document.addEventListener('DOMContentLoaded', function () {
    // Função para aplicar a máscara ao campo
    const applyMask = (input, mask, pattern) => {
        input.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').replace(mask, pattern);
        });
    };

    // Máscara para o telefone
    const telefone = document.getElementById('telefone');
    if (telefone) {
        telefone.addEventListener('input', function () {
            this.value = this.value
                .replace(/\D/g, '') // Remove caracteres não numéricos
                .replace(/^(\d{2})(\d)/, '($1) $2') // Adiciona parênteses
                .replace(/(\d{5})(\d)/, '$1-$2') // Adiciona hífen
                .replace(/(-\d{4})\d+?$/, '$1'); // Limita ao formato padrão
        });
    }

    // Máscara para o CEP
    const cep = document.getElementById('cep');
    if (cep) {
        cep.addEventListener('input', function () {
            this.value = this.value
                .replace(/\D/g, '') // Remove caracteres não numéricos
                .replace(/^(\d{5})(\d)/, '$1-$2') // Adiciona hífen
                .replace(/(-\d{3})\d+?$/, '$1'); // Limita ao formato padrão
        });
    }

    // Máscara para o CPF
    const cpf = document.getElementById('cpf');
    if (cpf) {
        cpf.addEventListener('input', function () {
            this.value = this.value
                .replace(/\D/g, '') // Remove caracteres não numéricos
                .replace(/^(\d{3})(\d)/, '$1.$2') // Adiciona ponto
                .replace(/^(\d{3}\.\d{3})(\d)/, '$1.$2') // Adiciona ponto
                .replace(/^(\d{3}\.\d{3}\.\d{3})(\d)/, '$1-$2') // Adiciona hífen
                .replace(/(-\d{2})\d+?$/, '$1'); // Limita ao formato padrão
        });
    }

    // Validação do CPF
    const cpfInput = document.getElementById('cpf');
    if (cpfInput) {
        cpfInput.addEventListener('blur', function () {
            const cpfValue = this.value.replace(/\D/g, '');
            if (cpfValue.length !== 11) {
                this.setCustomValidity('Por favor, insira um CPF válido.');
            } else {
                this.setCustomValidity('');
            }
        });
    }

    // Formatação para Preço
    const preco = document.getElementById('preco');
    const formulario = document.querySelector('form'); // Seletor do formulário

    if (preco) {
        // Função para formatar o preço
        function formatarPreco(preco) {
            preco = preco.replace(/\D/g, ""); // Remove caracteres não numéricos
            preco = (preco / 100).toFixed(2); // Formata como decimal com 2 casas
            preco = preco.replace(".", ","); // Substitui ponto por vírgula
            preco = preco.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Adiciona separador de milhar
            return preco;
        }

        // Função para remover a formatação do preço (para envio)
        function removerFormatacao(preco) {
            return preco.replace(/\D/g, ""); // Remove "R$", pontos e vírgulas
        }

        // Inicializa o valor do campo com "R$ 0,00" caso esteja vazio
        if (!preco.value) {
            preco.value = "R$ 0,00";
        }

        // Formatar o preço enquanto o usuário digita
        preco.addEventListener('input', function () {
            let valor = this.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
            if (!valor) valor = "0"; // Caso o valor esteja vazio, assume "0"
            this.value = "R$ " + formatarPreco(valor); // Aplica a formatação com "R$"
        });

        // Antes de enviar, remove a formatação para enviar o valor correto
        formulario.addEventListener('submit', function (event) {
            let valorSemFormatacao = removerFormatacao(preco.value); // Remove a formatação
            preco.value = valorSemFormatacao; // Define o valor sem formatação no campo
        });
    }

    // Pré-visualização de imagem
    document.getElementById("foto").addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById("imgPreview").setAttribute("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

// Função para formatar a Inscrição Estadual (ie)
function formatarie(input) {
    input.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

        // Aplica a formatação para o formato XX.XXX.XXX-X somente quando o tamanho é apropriado
        if (value.length <= 2) {
            value = value.replace(/^(\d{2})/, '$1'); // Apenas mantém os dois primeiros dígitos
        } else if (value.length <= 5) {
            value = value.replace(/^(\d{2})(\d{1,3})/, '$1.$2'); // Adiciona o primeiro ponto
        } else if (value.length <= 8) {
            value = value.replace(/^(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3'); // Adiciona o segundo ponto
        } else {
            value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4'); // Adiciona o hífen somente com todos os dígitos
        }

        this.value = value; // Atualiza o valor do campo com a formatação
    });
}

// Aplica a formatação ao campo de Inscrição Estadual
const ie = document.getElementById('campo3');
if (ie) {
    formatarie(ie); // Aplica a máscara
}
