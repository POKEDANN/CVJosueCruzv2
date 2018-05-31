$(function(){
    $(".sentences").typed({
        strings: ["WEB DEVELOPER FRONT END"],
        typeSpeed: 100,
    backSpeed: 100
  });
});

$( document ).ready(function() {
    $(window).on("scroll", function() {
         if ($(this).scrollTop() > 600) {
           $("#menu").addClass("fixed-top");
         } else {
           $("#menu").removeClass("fixed-top");
         }
    });
    if (document.documentElement.clientWidth <= 767) {
        $(window).on("scroll", function() {
             if ($(this).scrollTop() > 442) {
               $("#menu").addClass("fixed-top");
             } else {
               $("#menu").removeClass("fixed-top");
             }
        });
    }
    $('#inicio').click(function() {
                $('body').scrollTo('#carouselExampleIndicators', 800);
        });
    $('#exp').click(function() {
                $('body').scrollTo('#exper', 800);
        });
    $('#super').click(function() {
                $('body').scrollTo('#superp', 800);
        });
    $('#portaf').click(function() {
                $('body').scrollTo('#portafolios', 800);
        });
    $('#hob').click(function() {
                $('body').scrollTo('#hobb', 800);
        });
    $('#contrat').click(function() {
                $('body').scrollTo('#contact', 800);
        });
    $('#btnContra').click(function() {
                $('body').scrollTo('#contact', 800);
        });
    $(".rotate").textrotator({
        animation: "flip",
        separator: ",",
    speed: 2000
});
    $('.carousel').carousel({
        interval: 10000
});
    $(".test-circle").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 90,
});
    $(".test-circle1").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 80,
});
    $(".test-circle2").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 50,
});
    $(".test-circle3").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 50,
});
    $(".test-circle4").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 50,
});
    $(".test-circle5").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 50,
});
    $(".test-circle6").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 20,
});
    $(".test-circle7").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 80,
});
    $(".test-circle8").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 30,
});
    $(".test-circle9").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 50,
});
    $(".test-circle10").circliful({
    animationStep: 4,
    foregroundBorderWidth: 5,
    backgroundBorderWidth: 15,
    percent: 30,
});

// window.sr = ScrollReveal({ reset: true });
// // Customizing a reveal set
// sr.reveal('#carousel-example-generic, .danielTitle, .webParag, .fa-github, .fa-bitbucket-square, .fa-facebook-square, .contactBtn, .text-center, .Learning, .style-two, .danielPhoto, .profileParag, .descargarPerfil, .myProfile, .tecnologias, .test-circle, .test-circle1, .test-circle2, .test-circle3, .test-circle4, .test-circle5, .test-circle6, .portfolio, .simplefilter, .search-row, .style-twos, .panel-default, .img-rounded, .timeline-panel, .fa-briefcase, .style-four, .blanco, .timeline-badge, .fa-globe, .ingles, .rotate, .progress-bar, .glyphicon-check, .margen, .miContacto, .contactTitle, .contactSubtitle, label, input, .divider, textarea', 
//     { duration: 1300});
});