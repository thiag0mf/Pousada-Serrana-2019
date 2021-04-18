//Variáveis:
let togglePasswordView = $('#toggle-password-view');

//Variáveis que selecionam o input e o small abaixo deles de output
let inputNome = $('#inputName');
let smallNome = $('#small-validar-nome');

let inputEmail = $('#inputEmail');
let smallEmail = $('#small-validar-email');

let inputTelefone = $('#inputTelefone');
let smallTelefone = $('#small-validar-telefone');

let inputCidade = $('#inputCidade');
let smallCidade = $('#small-validar-cidade');

let inputCPF = $('#inputCPF');
let smallCPF = $('#small-validar-cpf');

let inputCheckIn = $('input[name="checkIn"]');
let smallCheckIn = $('#small-validar-checkIn');

let inputCheckOut = $('input[name="checkOut"]');
let smallCheckOut = $('#small-validar-checkOut');

let inputQuartos = $('select[name="quartos"]');
let inputPessoas = $('select[name="pessoas"]');


//CONTATO
let inputNomeContato = $('#inputNameContato');
let smallNomeContato = $('#small-validar-nome-contato');

let inputEmailContato = $('#inputEmailContato');
let smallEmailContato = $('#small-validar-email-contato');

let inputTelefoneContato = $('#inputTelefoneContato');
let smallTelefoneContato = $('#small-validar-telefone-contato');

let inputCidadeContato = $('#inputCidadeContato');
let smallCidadeContato = $('#small-validar-cidade-contato');

let inputMensagemContato = $('#inputMensagem');
let smallMensagemContato = $('#small-validar-mensagem-contato');

let inputSenha = $('#inputPassword');
let smallSenha = $('#small-validar-senha');

let inputAssunto = $('#inputAssunto');
let smallAssunto = $('#small-validar-assunto');

let btnValor = $('#valor');


$(document).ready(function () {
    validaNome(inputNome, smallNome);
    validaNome(inputNomeContato, smallNomeContato);

    validaCidade(inputCidade, smallCidade);
    validaCidade(inputCidadeContato, smallCidadeContato);

    validaEmail(inputEmail, smallEmail);
    validaEmail(inputEmailContato, smallEmailContato);

    validaMensagem(inputMensagemContato, smallMensagemContato)
});

inputCheckIn.on('input', function () {
    verificarCheckIn();
});

inputCheckOut.on('input', function () {
    verificarCheckIn();
});

inputQuartos.on('input', function () {
    verificarQuarto();
});

inputPessoas.on('input', function () {
    verificarQuarto();
});

function verificarQuarto() {
    let quarto = inputQuartos.val();
    let pessoas = parseInt(inputPessoas.val());

    console.clear();

    $.ajax({
        type: "POST",
        url: "_sql/sql_functions-index.php",
        dataType: 'JSON',
        data: {
            option: 'verificarQuarto'
        },
        success: function (data) {
            let maxPessoasStandart = parseInt(data.maxPessoasStandart);
            let maxPessoasPremium = parseInt(data.maxPessoasPremium);


            if (pessoas <= maxPessoasStandart) {
                if (quarto != 'Premium' && quarto != 'Deluxe') {
                    inputQuartos.val('Standart');
    
                }
            } else if (pessoas > maxPessoasStandart && pessoas <= maxPessoasPremium) {
                if (quarto != 'Deluxe') {
                    inputQuartos.val('Premium');
    
                }

            } else if (pessoas > maxPessoasPremium) {
                inputQuartos.val('Deluxe');

            }

            verificarCheckIn();
        }
    });
}

function verificarCheckIn() {
    let checkIn = inputCheckIn.val();
    let checkOut = inputCheckOut.val();
    let quarto = inputQuartos.val();

    $.ajax({
        type: "POST",
        url: "_sql/sql_functions-index.php",
        dataType: 'JSON',
        data: {
            option: 'verificarCheckIn',
            checkIn: checkIn,
            checkOut: checkOut,
            quartos: quarto
        },
        success: function (data) {

            //Reserva autorizada
            if(data.reservaAutorizada){
                campoValido(inputCheckIn, smallCheckIn, 'Data Disponível!');
                campoValido(inputCheckOut, smallCheckOut, 'Data Disponível!');
            }
            //Reserva não autorizada
            else{
                campoInvalido(inputCheckIn, smallCheckIn, 'Data não disponível!');
                campoInvalido(inputCheckOut, smallCheckOut, 'Data não disponível!');
            }

            btnValor.empty();
            btnValor.append('R$'+data.valorReserva+',00');

        }
    });
}


//Colocar caracteres no input de telefone
function maskTelefone() {
    inputTelefone.inputmask({
        mask: ["(99) 9999-9999" ,"(99) 99999-9999"],
        placeholder: " "
    });
}

//Colocar caracteres no input de CPF
function maskCPF() {
    inputCPF.inputmask({
        mask: ["999.999.999-99"],
        placeholder: " "
    });
}

//Alterações quando o campo é válido
function campoValido(campo, small, mensagem) {
    campo.removeClass('is-invalid');
    campo.addClass('is-valid');
    small.removeClass('text-danger');
    small.addClass('text-success');
    small.empty();
    small.append(mensagem);
}

//Alterações quando o campo é inválido
function campoInvalido(campo, small, mensagem) {
    campo.removeClass('is-valid');
    campo.addClass('is-invalid');
    small.removeClass('text-success');
    small.addClass('text-danger');
    small.empty();
    small.append(mensagem);
}

//Valida CPF
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}

//Mostra de CPF é válido
inputCPF.on('input focus', function () {
    let cpf = $(this).val();

    $.ajax({
        type: "POST",
        url: "_sql/sql_functions-index.php",
        dataType: 'JSON',
        data: {
            option: 'verificarCpf',
            cpf: cpf
        },
        success: function (data) {
            if(data.cpfValido){
                campoValido(inputCPF, smallCPF, 'CPF VÁLIDO!');
            }
            else{
                campoInvalido(inputCPF, smallCPF, 'CPF Inválido! Digite novamente');
            }
        }
    });

    maskCPF();
});

function validaMensagem(inputMensagem, smallMensagem){
    //Mostra se a senha é forte ou fraca quando alguma tecla é clicada ou quando está em foco
    inputMensagem.on('input focus', function () {
        //Tira os espaços em branco do nome e pega o tamanho
        let mensagemFiltrado = $(this).val().replace(/ /g, '').length;

        if (mensagemFiltrado >= 20 
        && mensagemFiltrado <= 1500) {

            campoValido(inputMensagem, smallMensagem, 'MENSAGEM VÁLIDA!');
        } 
        else {
            campoInvalido(inputMensagem, smallMensagem, 'Mensagem inválida! Ele deve possuir entre 20 e 1500 caracteres!');
        }
    });
}

function validaNome(inputNome, smallNome){
    //Mostra se a senha é forte ou fraca quando alguma tecla é clicada ou quando está em foco
    inputNome.on('input focus', function () {
        //Tira os espaços em branco do nome e pega o tamanho
        let tamanhoNomeFiltrado = $(this).val().replace(/ /g, '').length;

        if (tamanhoNomeFiltrado >= 8 
        && tamanhoNomeFiltrado <= 40) {

            campoValido(inputNome, smallNome, 'NOME VÁLIDO!');
        } 
        else {
            campoInvalido(inputNome, smallNome, 'Nome inválido! Ele deve possuir entre 8 e 40 caracteres!');
        }
    });
}

function validaCidade(inputCidade, smallCidade){
    //Mostra se o nome da cidade é valido
    inputCidade.on('input focus', function () {
        //Tira os espaços em branco do nome e pega o tamanho
        let tamanhoNomeFiltrado = $(this).val().replace(/ /g, '').length;

        if (tamanhoNomeFiltrado >= 3 
        && tamanhoNomeFiltrado <= 30) {

            campoValido(inputCidade, smallCidade, 'CIDADE VÁLIDA!');
        } 
        else {
            campoInvalido(inputCidade, smallCidade, 'Cidade inválida! Ela deve possuir entre 3 e 30 caracteres!');
        }
    });
}

function validaEmail(inputEmail, smallEmail){
    //Mostra se o nome é forte ou fraca quando alguma tecla é clicada ou quando está em foco
    inputEmail.on('input focus', function () {
        //Pega o valor do email
        let emailInput = $(this).val();

        // Tira os espaços em branco do email e pega o tamanho
        let emailInputReplaceLength = emailInput.replace(/ /g, '').length;

        //Armazena em qual posição há um @
        let emailInputIndexArroba = emailInput.indexOf('@');

        //Verifica em qual posição há um ponto
        let emailInputIndexPonto = emailInput.indexOf(".");

        if (emailInputReplaceLength >= 8 
        && emailInputReplaceLength <= 40 
        && emailInputIndexArroba > 0 
        && emailInputIndexArroba < emailInputIndexPonto 
        && emailInputIndexPonto + 1 < emailInput.length 
        && emailInput.length == emailInputReplaceLength){

            campoValido(inputEmail, smallEmail, 'EMAIL VÁLIDO!');
        } 
        else {
            campoInvalido(inputEmail, smallEmail, 'Email inválido! Ele deve possuir entre 8 e 40 caracteres!');
        }
    });
}


//Mostra se a senha é forte ou fraca quando alguma tecla é clicada ou quando está em foco
inputTelefone.on('input focus', function () {
    //Colocar caracteres no input de telefone
    maskTelefone();

    //Pega o valor do telefone
    let telefoneVal =  $(this).val();

    //Pega o tamanho do telefone
    let telefoneLength = telefoneVal.length;    

	if (telefoneLength >= 14 
	&& telefoneLength <= 15
	&& telefoneVal.slice(-1) != ' ') {

		campoValido(inputTelefone, smallTelefone, 'TELEFONE VÁLIDO!');
	} 
	else {
		campoInvalido(inputTelefone, smallTelefone, 'Telefone inválido! Ele deve possuir entre 10 e 11 caracteres!');
	}
});

//Troca o tipo do input da senha de password para text e vice-versa
togglePasswordView.on('click', function () {
	inputSenha.prop('type', function( i, val ) {
		return val == 'password'? 'text': 'password';
	  });
});

//Mostra se a senha é forte ou fraca quando alguma tecla é clicada ou quando está em foco
inputSenha.on('input focus', function () {
    //Pega o valor da senha
    let senhaVal = $(this).val();

    //Tira os espaços em branco da senha e pega o tamanho
    let senhaReplaceLength = senhaVal.replace(/ /g, '').length;

	if (senhaReplaceLength >= 8 
    && senhaReplaceLength <= 40 
    && senhaVal.length == senhaReplaceLength) {

        campoValido(inputSenha, smallSenha, 'SENHA VÁLIDA!');
	} 
	else {
        campoInvalido(inputSenha, smallSenha, 'Senha inválida! Ele deve possuir entre 8 e 40 caracteres!');
	}
});

//Mostra se a senha é forte ou fraca quando alguma tecla é clicada ou quando está em foco
inputAssunto.on('input focus', function () {
    //Tira os espaços em branco do nome e pega o tamanho
    let tamanhoAssuntoFiltrado = $(this).val().replace(/ /g, '').length;

    if (tamanhoAssuntoFiltrado >= 8 
    && tamanhoAssuntoFiltrado <= 35) {

        campoValido(inputAssunto, smallAssunto, 'ASSUNTO VÁLIDO!');
    } 
    else {
        campoInvalido(inputAssunto, smallAssunto, 'Assunto inválido! Ele deve possuir entre 8 e 35 caracteres!');
    }
});

