//Variáveis:
let outputEdit = $('#output-edit');
let corpoTabela = $('.corpoTabela');

//Esvazia a tabela e preenche com os dados do BD
function update(){
    //Esvazia a tabela
    corpoTabela.empty();

    //Pega os dados do arquivo sql_functions-admin.php e coloca na tabela
    $.ajax({
        method: "post",
        url: "_sql/sql_functions-edit-reserva.php",
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
;
});

//Exclui a linha do botão excluir clicado
$(document).on('click', '.btn-excluir', function (e) {
    e.preventDefault();
    //Pega o atributo data-id da linha do botão clicado
    let rowIdReserva = $(this).parent().parent().attr('data-id-reserva');

    //Pede confirmação para deletar a linha
        //Envia o id da linha clicada para o arquivo sql_functions-admin.php, e ele exclui a linha
        $.ajax({
            method: "POST",
            url: "_sql/sql_functions-edit-reserva.php",
            data: {
                idRowReserva: rowIdReserva,
                option: 'delete'
            },
            success: function(data){
                //Alerta se funcionou e atualiza a tabela
                alert(data);
                update();
            }
        });
    
});

var inputs = {
    nome: $('input[name="nome"]'),
    email: $('input[name="email"]'),
    telefone: $('input[name="telefone"]'),
    cpf: $('input[name="cpf"]'),
    cidade: $('input[name="cidade"]'),
    estado: $('select[name="estado"]'),
    newsletter: $('#receberEmails'),
    checkIn: $('input[name="checkIn"]'),
    checkOut: $('input[name="checkOut"]'),
    quarto: $('select[name="quartos"]'),
    pessoas: $('select[name="pessoas"]'),
    valor: $('#valor')
}

var rowIdReserva;
var rowIdCliente;

//Abre modal para edição dos dados
$(document).on('click', '.btn-editar', function (e) {
    e.preventDefault();

    rowIdReserva = $(this).parent().parent().attr('data-id-reserva');
    rowIdCliente = $(this).parent().parent().attr('data-id-cliente');
    
    //Envia os dados para o sql_functions-index.php que envia para o BD
	$.ajax({
		method: "post",
		url: "_sql/sql_functions-edit-reserva.php",
		dataType: 'JSON',
		data: {
            option: 'openModal',
            idRowReserva: rowIdReserva
        },
        success: function(data){

            setValues(data);

            console.log(data);
        }
    
    });
	
});

function setValues(data) {
    inputs.nome.val(data.nome);
    inputs.email.val(data.email);
    inputs.telefone.val(data.telefone);
    inputs.cpf.val(data.cpf);
    inputs.cidade.val(data.cidade);
    inputs.estado.val(data.estado);
    inputs.checkIn.val(data.checkIn);
    inputs.checkOut.val(data.checkOut);
    inputs.quarto.val(data.quarto);
    inputs.pessoas.val(data.pessoas);

    inputs.valor.empty();
    inputs.valor.append('R$'+data.valor+',00');

    inputs.valor.attr('data-valor', data.valor);


    if(data.newsletter == '1'){
        inputs.newsletter.prop('checked', true);
    }
    else{
        inputs.newsletter.prop('checked', false);
    }
}

//Variáveis:
var output = $('#output-edit');
var newsletter = $('#receberEmails');

var inputsReserva = {
    inputNome: $('#inputName'),
    smallNome: $('#small-validar-nome'),

    inputEmail: $('#inputEmail'),
    smallEmail: $('#small-validar-email'),

    inputTelefone: $('#inputTelefone'),
    smallTelefone: $('#small-validar-telefone'),

    inputCidade: $('#inputCidade'),
    smallCidade: $('#small-validar-cidade'),

    inputCPF: $('#inputCPF'),
    smallCPF: $('#small-validar-cpf'),

    inputCheckIn: $('input[name="checkIn"]'),
    smallCheckIn: $('#small-validar-checkIn'),

    inputCheckOut: $('input[name="checkOut"]'),
    smallCheckOut: $('#small-validar-checkOut')
}


//Envia os dados ao clicar no botão enviar
$('#formReservar').on('submit', function (e) { 
    e.preventDefault();

	var concordou = 0;
	if(newsletter.is(':checked')){
		concordou = 1;
    }
    
	//Envia os dados para o sql_functions-index.php que envia para o BD
	$.ajax({
		method: "post",
		url: "_sql/sql_functions-edit-reserva.php",
		dataType: 'JSON',
		data: $("#formReservar").serialize()+'&option=update&concordou='+concordou+'&rowIdReserva='+rowIdReserva+'&idRowCliente='+rowIdCliente,
		success: function(data){

            output.empty();

			//Alerta se teve algum erro de validação

            if (isAllValid(data)){
				output.append("<div class=\"alert alert-success mt-3\" role=\"alert\">Reserva efetuada com sucesso!</div>");
			}
			else{
				data.erros.forEach(element => {
					output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro: "+element+"!</div>");
				});
			}

			if(!data.validaNome){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar nome!</div>");
			}

			if(!data.validaEmail){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar email!</div>");
			}

			if(!data.validaTelefone){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar telefone!</div>");
			}

			if(!data.validaReserva){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar data de reserva!</div>");
			}

			if(!data.validaCPF){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar CPF!</div>");
			}

			if(!data.validaCidade){
				output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar nome da cidade!</div>");
            }

            for (const key in inputsReserva) {
                let input = inputsReserva[key];
                input.removeClass('is-invalid is-valid text-danger text-success');
                input.empty();
            }

			
		}
		
	});

});


// //Atualiza a tabela ao fechar
$(document).on('hidden.bs.modal', '#modalEdit', function () {
    update();

    output.empty();

    //Limpa a informação de preenchimento do formulário
    var elementInput = ['#check-in-modal', '#check-out-modal', '#inputName', '#inputEmail', '#inputTelefone', '#inputCPF', '#inputCidade'];
    var smallInput = ['checkIn', 'checkOut', 'nome', 'email', 'telefone', 'cpf', 'cidade'];

    smallInput.forEach(elementSmall => {
        $('#small-validar-'+elementSmall+'').empty();
    });

    elementInput.forEach(elementInput => {
        $(elementInput).removeClass('is-invalid');
        $(elementInput).removeClass('is-valid');
    });

});

function isAllValid(data) {
    var valid = true;

    for (const key in data) {
        if (!data[key]) {
            valid = false;
        }
    }

    return valid;
}





