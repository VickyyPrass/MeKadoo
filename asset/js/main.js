"use strict";
//*============================================ 
//***************SEARCH BOX******************//
//*============================================ 
const btnShowInput = document.querySelector('nav .button-bar .search i');
btnShowInput.addEventListener('click', function() {
    const showInput = document.querySelector('header input.search_keyword');
    showInput.classList.toggle('show1');
    showInput.focus();

    const showBtnSearch = document.querySelector('header .btn-search');
    showBtnSearch.classList.toggle('show2');
});

//*============================================ 
//******************BACK TO TOP**************//
//*============================================ 
const backTop = document.querySelector('div.back-to-top');
window.onscroll = function(ev) {
    let getBody = document.body; //IE 'quirks'
    let getDocument = document.documentElement; //IE with doctype
    getDocument = (getDocument.clientHeight) ? getDocument : getBody;

    if (getDocument.scrollTop > 300) {
        backTop.style.display = 'block';
    } else {
        backTop.style.display = 'none';
    }
};
backTop.addEventListener('click', function() {
    window.scroll({
        top: 0,
        behavior: 'smooth'
    });
});


//* JQUERY
$(document).ready(function() {
    //*============================================ 
    //***************BANNER SLIDE****************//
    //*============================================ 
    $('.carousel').carousel({
        interval: 4000,
        wrap: true,
        touch: true
    });

});