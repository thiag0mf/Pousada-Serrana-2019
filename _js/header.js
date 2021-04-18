var header, logo, navLinks, cont = 0;
var bg;
var headerHeight;

var bgImagens = [];
var icons = [];

$(document).ready(function () {

    //Get BG Images
    $.ajax({
        method: "post",
        url: "_sql/ajax_sql_functions.php",
        dataType: 'JSON',
        data: {
            option: 'getBGImages'
        },
        success: function (data) {
            bgImagens = data;
        }
    });

    //Get Icons
    $.ajax({
        method: "post",
        url: "_sql/ajax_sql_functions.php",
        dataType: 'JSON',
        data: {
            option: 'getIcons'
        },
        success: function (data) {
            icons = data;
        }
    });

    header = $('#header');

    logo = $('.logo');

    titleImg = $('#titleImg');
    subtitleImg = $('.subtitleImg');

    navLinks = $('.nav-link');

    bg = $('.background-image');

    setSizes();

    $(window).scroll(function () { 

        //Adicionar o BG ao descer o scroll, para aparecer apenas depois da imagem: carousel.height()
        if ($(this).scrollTop() > 250) {
            while (cont == 1) {
                header.fadeOut(0);
                cont++;
            }
            
            addBG();
            header.fadeIn(500);
        } 
    
        //Remover BG depois de subir o scroll
        if ($(this).scrollTop() < 50){
            cont = 1;
            removeBG();
        }

        //Set the menu link dependendo do scroll
        Section.elementsArray.forEach(function(e, index) {
            let scroll = $(this).scrollTop() + headerHeight + window.innerHeight/10;

            if(Section.elementsLength > 0){

                if(scroll > e.getX - window.innerHeight * 0.5){
                    animateSections(e);
                }


                //Set the menu link dependendo do scroll
                if (scroll - headerHeight > e.getX ){
                    if(Section.elementsArray[index+1] != undefined){
                        if (scroll - headerHeight < Section.elementsArray[index + 1].getX){
                            setMenuLink(e.nameLinkMenu);
                        }
                    }
                    else{
                        setMenuLink(e.nameLinkMenu);
                    }
                }
            }else{
    
                if (scroll - headerHeight > e.getX){
                    setMenuLink(e.nameLinkMenu);
                }
            }
    
        });
        
    });

    
    function removeBG(){
        header.removeClass('navbar-light fixed-top itens-color');
        header.addClass('transparent');
    
        navLinks.removeClass('itens-color');
    
        logo.prop('src', icons[0]);
    }
    
    function addBG(){
        header.removeClass('transparent position-absolute');
        header.addClass('navbar-light fixed-top itens-color');
    
        navLinks.addClass('itens-color');
    
        logo.prop('src', icons[1]);
    }

    function setMenuLink(e){
        navLinks.each(function(){
            $(this).css('opacity', '0.5');
        });

        $(e).css('opacity', '1');
       
        if(e == '#home'){
            bg.css({
                backgroundImage: "url(" + bgImagens[0]+")"
            });
            titleImg.fadeIn();
            subtitleImg.fadeIn();
        }

        if (e == '#reserve' || e == '#localizacao'){
               
                bg.css({
                    backgroundImage: "url(" + bgImagens[1] +")"
                });
                titleImg.fadeOut();
                subtitleImg.fadeOut();
            }

                if(e == '#acomodacoes' || e == '#contato'){
                   
                    titleImg.fadeOut();
                    subtitleImg.fadeOut();
                    bg.css({
                        backgroundImage: "url(" + bgImagens[2] +")"
                    });
                }
        
    }

    function animateSections(e) {
        //Slide Up
        let selector = e.jsElement + ' .animationSlideTop';
        let rowsSlideUp = $(selector);

        rowsSlideUp.animate({
            marginTop: '-15px',
            opacity: 1
        }, 1000);

        //Fades
        selector = e.jsElement + ' .animationFade';
        let rowsToFade = $(selector);

        rowsToFade.fadeIn(1500);

        //Slide Right
        selector = e.jsElement + ' .animationSlideRight';
        let rowsSlideRight = $(selector);

        rowsSlideRight.animate({
            marginLeft: '0px',
            opacity: 1
        }, 1000);

        //Slide Left
        selector = e.jsElement + ' .animationSlideLeft';
        let rowsSlideLeft = $(selector);

        rowsSlideLeft.animate({
            marginLeft: '0px',
            opacity: 1
        }, 1000);

        //Bouncy
        selector = e.jsElement + ' .animationBouncy';
        let rowsBouncing = $(selector);

        rowsBouncing.css('animation', 'ease-in-out forwards bouncing 1.5s');
    }

});

function setSizes() {
    headerHeight = header.height();
}

$(window).resize(function () {
    setSizes();
});




