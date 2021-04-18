//Variáveis globais
var emailsSelected = [];
var emails = $('#emails');
let closeItem = $('.close-item');
var qtdSelect;
var msg;


//Validação dos campos do formulário
var assunto = $('#assunto');
var mensagem = $('#mensagem');
var smallValidarAssunto = $('#small-validar-assunto');
var smallValidarMensagem = $('#small-validar-mensagem');
var assuntoValido = false;
var mensagemValida = false;

$(document).ready(function () {
    console.log('teste');
    $.ajax({
        method: 'post',
        dataType: 'JSON',
        url: "./_sql/sql_admin-email-send.php",
        data: {
            option: 'getListaEmails'
        },
        success: function (data) {
            console.log('dentro');
            console.log(data);

            //Recebe os emails e usa-os para fazer o autocomplete
            $('#emails').autocomplete({
                source: data,
                minLength: 1,
                select: function (event, ui) {
                    //Coloca os emails no dropdown que mostra os selecionados
                    log(ui.item.value);
                }
            });
        }
    });
});

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

assunto.on('input focus', function () {
    let valor = $(this).val().replace(/ /g, '').length;
    
    if(valor >= 20 && valor <= 60){
        campoValido(assunto, smallValidarAssunto, 'Assunto válido!');
        assuntoValido = true;
    }
    else{
        campoInvalido(assunto, smallValidarAssunto, 'Assunto inválido! Digite um assunto entre 20 e 60 caracteres!');
        assuntoValido = false;
    }
});

mensagem.on('input focus', function () {
    let valor = $(this).val().replace(/ /g, '').length;
    
    if(valor >= 30 && valor <= 1000){
        campoValido(mensagem, smallValidarMensagem, 'Mensagem válida!');
        mensagemValida = true;
    }
    else{
        campoInvalido(mensagem, smallValidarMensagem, 'Mensagem inválida! Digite um mensagem entre 30 e 1000 caracteres caracteres!');
        mensagemValida = false;
    }
});

//Função de colocar os emails selecionados no dropdown 
function log( message ) {
    var log = $( "#log" );

    if(emailsSelected.indexOf(message) == -1){
        emailsSelected.push(message);
        let msg = '<p class="dropdown-item m-0 pb-2" id="'+emailsSelected.length+'"><span class="close-item mr-2 pt-2" style="font-size: 1.5rem">&times;</span>'+message+'</p>';
        var content = log.html() + msg;
    
        log
        .empty()
        .append(content)
        .scrollTop( 0 );
    }
}

//Coloca quantos emails foram selecionados no input de pesquisa
function putQtdInput() {
    qtdSelect = emailsSelected.length;
    msg = qtdSelect == 1?'email selecionado':'emails selecionados';

    emails.val('['+qtdSelect+'] '+msg);
}

emails.on('focusout', emails, function () {
    putQtdInput();
});

//Quando clicado o [x] do item no dropdown, apaga ele do array e tira da tela
$(document).on('click', '.close-item', function () {
    let pItem = $(this).parent();
    let id = pItem.prop('id');
    
    pItem.css('display', 'none');
    
    //Apaga o item do array
    emailsSelected.splice(id-1, id);
    
    putQtdInput();
});


//Recebe os emails do BD em array

//Envia o email
$('#enviarMensagem').on('click', function () {
    //Verifica se assunto e mensagem são válidos
        let radioEscolhido = $('.radioSelect:checked').prop("id");
        var selectEmail;
        var dadosSelectEmails;

        //Seleciona qual input radio deve ser escolhido para pegar os dados de seleção de email
        if(radioEscolhido == 'selecionarTodos'){

            selectEmail = 'todos';
            dadosSelectEmails = true;

        }else if (radioEscolhido == 'selecionarTipo') {
            let tipoChecked = [];
            
            $('input[name="checkTipo"]:checked').each(function () {

                if($(this).prop("id") == "checkReservaAtiva"){
                    tipoChecked.push('reservaAtiva');
                }

                if($(this).prop("id") == "checkSemReserva"){
                    tipoChecked.push('semReserva');
                }

            });

            dadosSelectEmails = tipoChecked;
            selectEmail = 'tipo';

        }else if (radioEscolhido == 'selecionarIndividual') {
            dadosSelectEmails = emailsSelected;
            selectEmail = 'individual';
        }

        //Envia os informações para o servidor
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "./_sql/sql_admin-email-send.php",
            data: {
                option: 'setMensagem',
                selectEmail: selectEmail,
                dadosEmail: dadosSelectEmails,
                assunto: $('#assunto').val(),
                mensagem:  $('#mensagem').val()
            },
            success: function (data) {
                //Exibe informações de resposta do servidor
                // console.log('Quantidade de emails: '+data.qtdEmail);
                // console.log('Quantidade de tentativas: '+data.cont);
                // console.log('--------------- Emails selecionados para receber email ---------------');

                //Imprime no console todos os emails que foram selecionados receberem email
                console.log(data);

                //Funções de personalização do modal
                function emailsEnviados() {
                    var emailsEnviados = '<ul>';

                    data.emails.forEach(element => {
                        emailsEnviados +='<br><li>'+element+'</li>'; 
                        
                    });

                    return emailsEnviados+'</ul>';
                }

                function erros() {
                    var erros = '<ul>';

                    for (let i = 0; i <= errosLength - 1 ; i++) {
                        
                    }

                    data.erros.forEach(element => {
                        erros += '<br><li>'+element+'</li>'; 
                        
                    });

                    return erros+'</ul>';
                }
            
                //Personaliza o modal
                let outputModalContent = $('#output-modal-content');
                let modalTitulo = $('#modal-titulo');
                let output = $('#output');

                function resetaModal() {
                    outputModalContent
                        .removeClass('bg-success')
                        .removeClass('bg-danger');
    
                    modalTitulo.empty();
                    output.empty();
                }

                resetaModal();


                if(data.erros.length == 0){
                    outputModalContent.addClass("bg-success");
                    modalTitulo.append("SUCESSO:");
                    output.append('<h5>E-mail enviado para:</h5>'+ emailsEnviados());
                }
                else{
                    outputModalContent.addClass("bg-danger");
                    modalTitulo.append("ERRO:");
                    output.append('<h5>O servidor obteu os seguintes erros:</h5>'+ erros());
                }

                //Mostra o modal, e ao fecha-lo recarrega a página
                $('#modal-output')
                .modal('show')
                .on('hidden.bs.modal', function () {
                    // if(data.erros.length == 0){
                    //     location.reload(); 
                    // }
                });

            }
        });

});