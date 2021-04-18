//Variáveis:
var output = $('#output-edit');
var newsletter = $('#receberEmails');

console.log('111');

//Variáveis que selecionam o input e o small abaixo deles de output


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


//CONTATO
var inputsContato = {

	inputNomeContato: $('#inputNameContato'),
	smallNomeContato: $('#small-validar-nome-contato'),
	
	inputEmailContato: $('#inputEmailContato'),
	smallEmailContato: $('#small-validar-email-contato'),
	
	inputTelefoneContato: $('#inputTelefoneContato'),
	smallTelefoneContato: $('#small-validar-telefone-contato'),
	
	inputCidadeContato: $('#inputCidadeContato'),
	smallCidadeContato: $('#small-validar-cidade-contato'),
	
	inputMensagemContato: $('#inputMensagem'),
	smallMensagemContato: $('#small-validar-mensagem-contato'),
	
	inputSenha: $('#inputPassword'),
	smallSenha: $('#small-validar-senha'),
	
	inputAssunto: $('#inputAssunto'),
	smallAssunto: $('#small-validar-assunto')
}

//Envia os dados ao clicar no botão enviar
$('#formReservar').on('submit', function (e) { 
	e.preventDefault();

	let concordou = 0;
	if(newsletter.is(':checked')){
		concordou = 1;
	}
	
	//Envia os dados para o sql_functions-index.php que envia para o BD
	$.ajax({
		method: "post",
		url: "_sql/sql_functions-index.php",
		dataType: 'JSON',
		data: $("#formReservar").serialize()+'&option=add&concordou='+concordou,
		success: function(data){

			output.empty();

			//Alerta se teve algum erro de validação

			if (isAllValid(data)) {
				if(data.erros.length == 0){
					output.append("<div class=\"alert alert-success mt-3\" role=\"alert\">Reserva efetuada com sucesso!</div>");
	
					setTimeout(() => {
						output.fadeOut(1000);
					}, 3000);
				}
				else{
					data.erros.forEach(element => {
						output.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro: "+element+"!</div>");
					});
				}
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

			$("#formReservar").each(function () {
				this.reset();
			});


			for (const key in inputsReserva) {
				let input = inputsReserva[key];
				input.removeClass('is-invalid is-valid text-danger text-success');
				input.empty();
			}
		}
		
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

function resetarValidacao() {
	
}

var outputContato = $('#output-contato');
var newsletterContato = $('#concordouContato');

$('#formContato').on('submit', function (e) {
	e.preventDefault();

	let concordou = 0;
	if(newsletterContato.is(':checked')){
		concordou = 1;
	}
	
	$.ajax({
		type: "post",
		url: "_sql/sql_functions-index.php",
		data: $(this).serialize()+'&option=contato&concordou='+concordou,
		dataType: "JSON",
		success: function (data) {
			outputContato.empty();

			//Alerta se teve algum erro de validação

			if(isAllValid(data)){
				outputContato.append("<div class=\"alert alert-success mt-3\" role=\"alert\">Mensagem efetuada com sucesso!</div>");

				setTimeout(() => {
					outputContato.fadeOut(1000);
				}, 3000);

			}
			else{
				data.erros.forEach(element => {
					outputContato.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro: "+element+"!</div>");
				});
			}

			if(!data.validaNome){
				outputContato.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar nome!</div>");
			}

			if(!data.validaEmail){
				outputContato.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar email!</div>");
			}

			if(!data.validaCidade){
				outputContato.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar nome da cidade!</div>");
			}

			if(!data.validaMensagem){
				outputContato.append("<div class=\"alert alert-danger mt-3\" role=\"alert\">Erro ao validar mensagem!</div>");
			}

			$('#formContato').each(function () {
				this.reset();
			});

			for (const key in inputsContato) {
				let input = inputsContato[key];
				input.removeClass('is-invalid is-valid text-danger text-success');
				input.empty();
			}
		}
	});

});


