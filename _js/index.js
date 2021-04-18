var bgImage, content, titleImg, subtitleImg;

var w, h;

var header;

var divReserva, divAcomodacoes, divLocalizacao, divContato;

var scrolling = false;

var setFadeOuts = true;

var links = {
    goHome: $('#home'), 
    goReserve: $('#reserve'),
    goAcomodacoes: $('#acomodacoes'),
    goLocalizacao: $('#localizacao'),
    goContato: $('#contato')
}

var reserve;

//JS variables
var sections = {};

var checkIn, checkOut, quarto, clientes, modalReserva;
var checkInModal, checkOutModal, quartoModal, clientesModal;

$(document).ready(function () {
    init();
});



function init() { 
    bgImage = $('.background-image');
    content = $('.content');
    titleImg = $('#titleImg');
    subtitleImg = $('.subtitleImg');
    
    //RESERVA
    checkIn = $('#check-in');
    checkOut = $('#check-out');
    quartos = $('#quartos');
    clientes = $('#clientes');
    modalReserva = $('#modalReservar');
    //modalReserva = document.querySelector('#modalReservar');

    checkInModal = $('#check-in-modal');
    checkOutModal = $('#check-out-modal');
    quartoModal = $('#quartos-modal');
    clientesModal = $('#modalPessoas-modal');

    divReservaJS = document.querySelector('.reserva');
    
    header = $('#header');
    
    
    titleImg.fadeIn(1500);
    subtitleImg.fadeIn(1500);
    
    //Set eventos dos links do menu
    setHeaderLinkEvents();
    
    //Criando os objetos de sessão definidos no creating-objects.js
    setSections();
    resizeScreen();

    // =======================================
    //               RESERVA
    // ======================================

    modalReserva.on('show.bs.modal', function () {  

        checkInModal.prop('value', checkIn.val());
        checkOutModal.prop('value', checkOut.val());
    
        $('#quartos-modal > option[value="'+quartos.val()+'"]').prop('selected', 'selected');

        $('#modalPessoas-modal > option[value="'+clientes.val()+'"]').prop('selected', 'selected');

    });

}

// =======================================
//               ACOMODAÇÕES
// ======================================
var cardStandart = $('#reservaStandart'); 
var cardPremium = $('#reservaPremium'); 
var cardDeluxe = $('#reservaDeluxe'); 

var selectQuartos = $('#quartos-modal');

cardStandart.on('click', function () {
    selectQuartos.val('Standart');
});

cardPremium.on('click', function () {
    selectQuartos.val('Premium');
});

cardDeluxe.on('click', function () {
    selectQuartos.val('Deluxe');
});



//Criando os objetos de sessão definidos no creating-objects.js
function setSections() {
    divBgImage = new Section('#home', '.background-image');
    divReserva = new Section('#reserve', '.reserva');
    divLocalizacao = new Section('#localizacao', '.localizacao');
    divAcomodacoes = new Section('#acomodacoes', '.acomodacoes');
    divApresentacao = new Section('#acomodacoes', '.apresentacao');
    divContato = new Section('#contato', '.contato');
    divRodape = new Section('#contato', '.footer');
}

//Set eventos dos links do menu
function setHeaderLinkEvents() {
    for (const key in links) {
        const element = links[key];
        element.on('click', eval(key));
    }
}

//Eventos de click no menu
function goHome() {  
    setScroll(0, 1000);
}

function goReserve() {
    setScroll(divReserva.getX - header.height(), 1000);
}

function goAcomodacoes() {
    setScroll(divAcomodacoes.getX - header.height(), 1000);
}

function goLocalizacao() {
    setScroll(divLocalizacao.getX - header.height(), 1000);
}

function goContato() {
    setScroll(divContato.getX - header.height(), 1000);
}

//Eventos do scroll
$(window).scroll(function (e) { 
    
    e.stopPropagation();

    
    if ($(this).scrollTop() > 1 && setFadeOuts) {
        //divReserva.fadeOut(0);

        setFadeOuts = false;

    }
    
    //Adicionar o BG ao descer o scroll, para aparecer apenas depois da imagem: carousel.height()
    if ($(this).scrollTop() > h) {
        
        // if(animated.reserva){
        //     bgImage.css({
        //         'display': 'none'
        //     });
        // }
        
    } 
    
    
    //Remover BG depois de subir o scroll
    if ($(this).scrollTop() < h){
        
        bgImage.css({
            'display': 'block'
        });
    }
    
    //Fazer aparecer reserva
    if ($(this).scrollTop() > h/8) {
        
    } 
    
    //Remover BG depois de subir o scroll
    if ($(this).scrollTop() < 50){
        
        
    }
    
});

$(window).resize(function () { 
    resizeScreen();
    setSections();
});

function setScroll(h, time) {
    $('html, body').animate({
        scrollTop: h
    }, time);
}

function resizeScreen() {
    h = window.innerHeight;
    w = window.innerWidth;
    
    //Define content's top as the height of the window
    content.css('top',  h);
    
    //Define image's height as the height of the window
    bgImage.css('height', h);

    divReserva.element.css('min-height', h - header.height());
    
    //Set the title to the center plus 20%
    titleImg.css({
        'marginTop': getTopTitleImage()
    });
}

function getTopTitleImage() {
    let top = (h - titleImg.height())/2;
    
    return top;
}
