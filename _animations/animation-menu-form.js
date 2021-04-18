$(window).one('load', function() {
    
    var dropSexo = $('#dropTipo');
    var emails = $('#emails');
    var dropIndividual = $('#dropIndividual');
    var dropdownIndividual = $('#dropdownIndividual');

    //Anima o menu lateral
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

    //Anima o formulario
    function animateForm() {
        let boxAnimation = $('.form-animation');
        let boxContentAnimation = $('.form-content-animation');
        let title = $('#title');
        let topSize = title.outerHeight() + title.offset().top;
    
    
        boxAnimation.css({
            top: '-'+topSize+'px'
        });
        
        boxAnimation.animate({
            top: '0px'
        }, 500, function () { 
            boxContentAnimation.slideToggle(1000);
        });
    }
    $(window).on('pageshow', function () {
        animateMenu(1500);
        animateForm();
    });

    //ANIMATION DO DROPDOWN
    function openDropdown() {
        while(!(dropdownIndividual.hasClass('show'))){
            dropIndividual.dropdown('toggle');
        }
    }

    //Abre o modal e deixa o link ativo ao selecionar sexo
    $('.item-sexo').on('click', function () {
        dropSexo.dropdown('toggle');

        if($(this).children().prop('checked'))
            $(this).toggleClass('active');
    });

    //Decide o que fazer o clicar no radio input
    $('.radioSelect').on('click', function () {
        $('.labelRadio').addClass("text-muted");
        
        var radioId = $(this).prop('id');

        $('label[for="'+radioId+'"]').removeClass("text-muted");

        let menuDropSexo = $('#menuDropTipo');
        let logIndividual = $('#logIndividual');

        //Habilita ou desabilita o campo de selecionar por sexo
        if(radioId == 'selecionarTipo'){
           menuDropSexo.removeClass('d-none');

           dropSexo.css({
                cursor: 'pointer',
                backgroundColor: '#fff'
            });

            dropSexo.parent().css({
                cursor: 'pointer',
                backgroundColor: '#fff'
            });
        }
        else{
            menuDropSexo.addClass('d-none');

            dropSexo.css({
                cursor: 'not-allowed',
                backgroundColor: '#e9ecef'
            });

            dropSexo.parent().css({
                cursor: 'not-allowed',
                backgroundColor: '#e9ecef'
            });
        }

        //Habilita ou desabilita o campo de selecionar todos
        let inputTodos = $('#inputTodos');
        if(radioId == 'selecionarTodos'){
            inputTodos.css({
                cursor: 'pointer',
                backgroundColor: '#fff'
            });

            inputTodos.parent().css({
                cursor: 'pointer',
                backgroundColor: '#fff'
            });
         }
         else{
            inputTodos.css({
                cursor: 'not-allowed',
                backgroundColor: '#e9ecef'
            });

            inputTodos.parent().css({
                cursor: 'not-allowed',
                backgroundColor: '#e9ecef'
            });
         }

         //Habilita ou desabilita o campo de selecionar individuamente
        if(radioId == 'selecionarIndividual'){
            emails.css('cursor', 'pointer');
            emails.prop('disabled', false);
            logIndividual.removeClass('d-none');
        }else{
            emails.css('cursor', 'not-allowed');
            emails.prop('disabled', true);
            logIndividual.addClass('d-none');
        }

    });

    $('#selecionarTodos').click();


    emails.
        on('keyup click focusin input', function () {
            openDropdown();
        })
        .on('click', function () {
            $(this).val('');
            if((dropdownIndividual.hasClass('show'))){
                dropIndividual.dropdown('toggle');
            }
        });

        //Determina quantas vezes tentar abrir dropdown do selecionar individual ao clicar em um item
        function uiMenuClick(vezes) {
            for (let i = 0; i <= vezes ; i++) {
                setTimeout(function () {
                    emails.val('');
                    openDropdown();
                }, 100*i);
            }
        }

    $('.ui-menu').on('click', function () {
        uiMenuClick(6);
    });

});
