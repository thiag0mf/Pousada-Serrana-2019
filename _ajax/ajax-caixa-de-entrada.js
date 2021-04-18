//Variáveis:
//let outputEdit = $('#output-edit');
var corpoTabela = $('.corpoTabela');
var output = $('#output-edit');

//Esvazia a tabela e preenche com os dados do BD
function update(){
    //Esvazia a tabela
    corpoTabela.empty();

    //Pega os dados do arquivo sql_functions-admin.php e coloca na tabela
    $.ajax({
        method: "post",
        url: "_sql/sql_functions-caixa-de-entrada.php",
        data: {
            option: 'select'
        },
        success: function (data) {
            corpoTabela.append(data);
        }
    });
}

update();

//Atualiza a tabela ao clicar no botão de atualização
$('#update').on('click', function () { 
	update();
});

var rowIdMensagem;

//Exclui a linha do botão excluir clicado
$(document).on('click', '.btn-excluir', function (e) {
    e.preventDefault();
    //Pega o atributo data-id da linha do botão clicado
    rowIdMensagem = $(this).parent().parent().attr('data-id-mensagem');

    //Pede confirmação para deletar a linha
        //Envia o id da linha clicada para o arquivo sql_functions-admin.php, e ele exclui a linha
        $.ajax({
            method: "POST",
            url: "_sql/sql_functions-caixa-de-entrada.php",
            data: {
                idRowMensagem: rowIdMensagem,
                option: 'delete'
            },
            success: function(data){
                //Alerta se funcionou e atualiza a tabela
                alert(data);
                update();
            }
        });
});

//Abre modal para edição dos dados
$(document).on('click', '.btn-editar', function (e) {
    e.preventDefault();

    rowIdMensagem = $(this).parent().parent().attr('data-id-mensagem');
	
});

//Envia os dados ao clicar no botão enviar
$('#formEnviarEmail').on('submit', function (e) { 
    e.preventDefault();

    console.log($(this).serialize()+'&option=sendEmail&idRowMensagem='+rowIdMensagem);
    
	//Envia os dados para o sql_functions-index.php que envia para o BD
	$.ajax({
		method: "post",
		url: "_sql/sql_functions-caixa-de-entrada.php",
		dataType: 'JSON',
		data: $(this).serialize()+'&option=sendEmail&idRowMensagem='+rowIdMensagem,
		success: function(data){

            output.empty();

			//Alerta se teve algum erro de validação

			if(data.erros.length == 0){
				output.append("<div class=\"alert alert-success mt-3\" role=\"alert\">Email enviado com sucesso!</div>");
			}

			if(!data.validaMensagem){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar mensagem!</div>");
			}

			if(!data.validaAssunto){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar assunto!</div>");
			}
			
		}
		
	});

});

// //Atualiza a tabela ao fechar
$(document).on('hidden.bs.modal', '#modalEdit', function () {
    update();

    output.empty();

    //Limpa a informação de preenchimento do formulário
    var elementInput = ['#inputAssunto', '#inputMensagem'];
    var smallInput = ['assunto', 'mensagem-contato'];

    smallInput.forEach(elementSmall => {
        $('#small-validar-'+elementSmall+'').empty();
    });

    elementInput.forEach(elementInput => {
        $(elementInput).removeClass('is-invalid');
        $(elementInput).removeClass('is-valid');
    });

});