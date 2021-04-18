var btnExcluirTermo;
var btnExcluirImg;


$(document).ready(function () {
    btnExcluirTermo = $('.remover-termo');

    btnExcluirTermo.on('click', function(){

        if(confirm("Você tem certeza que deseja excluir este termo?")){

            let idTermo = $(this).attr('data-id');
    
            $.ajax({
                type: "post",
                url: "_sql/sql_functions_change_data.php",
                data: {
                    option: 'excluirTermo',
                    idTermo: idTermo
                },
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    if (data.resultado) alert('Exclusão realizada com sucesso!');

                    location.reload();
                }
            });
        }

    });

    btnExcluirImg = $('.btn-excluir-img');

    btnExcluirImg.on('click', function (e) {
        e.preventDefault();

        if(confirm("Você tem certeza que deseja excluir esta imagem?")){

            let idImagem = $(this).attr('data-id');
    
            $.ajax({
                type: "post",
                url: "_sql/sql_functions_change_data.php",
                data: {
                    option: 'excluirImagem',
                    idImagem: idImagem
                },
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    if (data.resultado) alert('Exclusão realizada com sucesso!');

                    location.reload();
                }
            });
        }
    });
});
