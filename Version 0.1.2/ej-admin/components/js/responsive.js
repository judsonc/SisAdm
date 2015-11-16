$(document).ready(function() {
    $("button.close").click(close);
    $("#dropmenu").click(menu);
    $("#dropdown").click(dropdown);
    $("#up").click(editphoto);

     $('[data-toggle="offcanvas"]').click(function () {
         $('.row-offcanvas').toggleClass('active')
     });
});

function close(){
    var parent = jQuery(this).parent();
    parent.remove();
}

function menu(){
    if($( "#dropmenu1" ).hasClass( "hidden-phone" )){
        $( "#dropmenu1" ).removeClass( "hidden-phone" );
        $( "#dropmenu1" ).addClass( "visible-phone" );
    }else{
        $( "#dropmenu1" ).removeClass( "visible-phone" );
        $( "#dropmenu1" ).addClass( "hidden-phone" );
    }
}

function dropdown(){
    if($( "#open-dropdown" ).hasClass( "open" )){
        $( "#open-dropdown" ).removeClass( "open" );
    }else{
        $( "#open-dropdown" ).addClass( "open" );
	}
}

function editphoto(){
    $("#editphoto").show();
    $("#newphoto").hide();
}
/*
$(document).ready(function() {
    $("#home1").click(home);
    $("#banners1").click(banners);
    $("#quemsomos1").click(quemsomos);
    $("#servicos1").click(servicos);
    $("#portfolio1").click(portfolio);
    $("#contato1").click(contato);
    $("#perfil1").click(perfil);
});

function home(){
    $("#home").show();
    $("#banners").hide();
    $("#quemsomos").hide();
    $("#servicos").hide();
    $("#portfolio").hide();
    $("#contato").hide();
    $("#perfil").hide();

    $( "#home1" ).addClass( "active" );
    $( "#banners1" ).removeClass( "active" );
    $( "#quemsomos1" ).removeClass( "active" );
    $( "#servicos1" ).removeClass( "active" );
    $( "#portfolio1" ).removeClass( "active" );
    $( "#contato1" ).removeClass( "active" );
    $( "#perfil1" ).removeClass( "active" );
}

function banners(){
    $("#home").hide();
    $("#banners").show();
    $("#quemsomos").hide();
    $("#servicos").hide();
    $("#portfolio").hide();
    $("#contato").hide();
    $("#perfil").hide();

    $( "#home1" ).removeClass( "active" );
    $( "#banners1" ).addClass( "active" );
    $( "#quemsomos1" ).removeClass( "active" );
    $( "#servicos1" ).removeClass( "active" );
    $( "#portfolio1" ).removeClass( "active" );
    $( "#contato1" ).removeClass( "active" );
    $( "#perfil1" ).removeClass( "active" );
}

function quemsomos(){
    $("#home").hide();
    $("#banners").hide();
    $("#quemsomos").show();
    $("#servicos").hide();
    $("#portfolio").hide();
    $("#contato").hide();
    $("#perfil").hide();

    $( "#home1" ).removeClass( "active" );
    $( "#banners1" ).removeClass( "active" );
    $( "#quemsomos1" ).addClass( "active" );
    $( "#servicos1" ).removeClass( "active" );
    $( "#portfolio1" ).removeClass( "active" );
    $( "#contato1" ).removeClass( "active" );
    $( "#perfil1" ).removeClass( "active" );
}

function servicos(){
    $("#home").hide();
    $("#banners").hide();
    $("#quemsomos").hide();
    $("#servicos").show();
    $("#portfolio").hide();
    $("#contato").hide();
    $("#perfil").hide();

    $( "#home1" ).removeClass( "active" );
    $( "#banners1" ).removeClass( "active" );
    $( "#quemsomos1" ).removeClass( "active" );
    $( "#servicos1" ).addClass( "active" );
    $( "#portfolio1" ).removeClass( "active" );
    $( "#contato1" ).removeClass( "active" );
    $( "#perfil1" ).removeClass( "active" );
}

function portfolio(){
 	$("#home").hide();
    $("#banners").hide();
    $("#quemsomos").hide();
    $("#servicos").hide();
    $("#portfolio").show();
    $("#contato").hide();
    $("#perfil").hide();

    $( "#home1" ).removeClass( "active" );
    $( "#banners1" ).removeClass( "active" );
    $( "#quemsomos1" ).removeClass( "active" );
    $( "#servicos1" ).removeClass( "active" );
    $( "#portfolio1" ).addClass( "active" );
    $( "#contato1" ).removeClass( "active" );
    $( "#perfil1" ).removeClass( "active" );
}

function contato(){
 	$("#home").hide();
    $("#banners").hide();
    $("#quemsomos").hide();
    $("#servicos").hide();
    $("#portfolio").hide();
    $("#contato").show();
    $("#perfil").hide();

    $( "#home1" ).removeClass( "active" );
    $( "#banners1" ).removeClass( "active" );
    $( "#quemsomos1" ).removeClass( "active" );
    $( "#servicos1" ).removeClass( "active" );
    $( "#portfolio1" ).removeClass( "active" );
    $( "#contato1" ).addClass( "active" );
    $( "#perfil1" ).removeClass( "active" );
}

function perfil(){
    $("#home").hide();
    $("#banners").hide();
    $("#quemsomos").hide();
    $("#servicos").hide();
    $("#portfolio").hide();
    $("#contato").hide();
    $("#perfil").show();

    $( "#home1" ).removeClass( "active" );
    $( "#banners1" ).removeClass( "active" );
    $( "#quemsomos1" ).removeClass( "active" );
    $( "#servicos1" ).removeClass( "active" );
    $( "#portfolio1" ).removeClass( "active" );
    $( "#contato1" ).removeClass( "active" );
    $( "#perfil1" ).addClass( "active" );
}
*/
