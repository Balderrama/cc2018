/**
 * Created by BALDERRAMA on 12/08/2017.
 */
// MUESTRA Y OCULTA MENU MOVIL
$('#menu-toggle').click(function(){
    $('nav.menu').toggleClass('left-0');
    $(this).toggleClass('open');
});