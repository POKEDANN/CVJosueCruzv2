$('.dropdownFile').fileinput({
    language: 'es',
    uploadUrl: '#',
    dropZoneEnabled: true,
    showUpload: false
});

$('.file').fileinput({
    language: 'es',
    uploadUrl: '#',
    dropZoneEnabled: false,
    showUpload: false
});

$( document ).ready(function() {
  $('.selectpicker').selectpicker({});
  new WOW().init();
  // $('.dropdown').hover(function() {
  //        $(this).toggleClass('open');
  //   });
});
$(document).click(function (event) {
    var clickover = $(event.target);
    var $navbar = $(".navbar-collapse");               
    var _opened = $navbar.hasClass("in");
    if (_opened === true && !clickover.hasClass("navbar-toggle")) {      
        $navbar.collapse('hide');
    }
});

$(window).load(function(){
    $('#popup').modal('show');
});


$(document).ready(function() {
  $('input#docs[type="radio"]').click(function(){
    if (this.checked) {
        $(".buttons-group > label[for='equipoPesado'").hide()
        $(".buttons-group > label[for='condano'").hide()
        $( "#equipoPesado" ).prop( "checked", false );
        $( "#condano" ).prop( "checked", false );
    }
  }) 
  $('input#resguardo[type="radio"]').click(function(){
    if (this.checked) {
        $(".buttons-group > label[for='equipoPesado'").show()
        $(".buttons-group > label[for='condano'").show()
    }
  }) 

});

