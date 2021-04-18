var editAdmin = $('#btn-edit-admin');
var form = $('#formEditAdmin');

editAdmin.on('click', function(){
    form.submit();
});

var inputImagem = $('input[name="imagem"]');
var labelImagem = $('#label-imagem');
var nome_arquivo;

inputImagem.on('change', function () {
    nome_arquivo = $( this ).val().split("\\").pop();
    
    labelImagem.empty();
    labelImagem.append(nome_arquivo);
});
