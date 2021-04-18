$(window).one('load', function() {
    
    function animateMenu(time) {
        let menu = $('#aside-menu');
        
        //Coloca o menu para o lado
        menu.css({
            left: '-'+menu.width()+'px'
        });

        //Animação do menu
        setTimeout(function () {
            menu.animate({
                left: 0
            }, 500);
            
        }, time);
    }

    function animateTable() {
        let boxAnimation = $('.box-animation');
        let topSize = boxAnimation.outerHeight() + boxAnimation.offset().top;

        topSize = topSize < 1000?topSize:1000;

        let corpoTabela = $('.corpoTabela');
        let qtdLinhas = corpoTabela.children().length; 
        

        //Sobe a tabela    
        boxAnimation.css({
            top: '-'+topSize+'px'
        });


        //Conta quantas linhas há na tabela, e fixa o tamanho máximo de 10, colocando tempo proporcional a quantidade
        qtdLinhas = qtdLinhas < 10? qtdLinhas:10;
        let time = qtdLinhas * 200;
        
        //Animação da tabela
        boxAnimation.animate({
            top: '0px'
        }, time);

        return time;
    }
    
    animateMenu(animateTable());


});

