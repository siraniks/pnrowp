var $ = jQuery.noConflict();

$(document).ready(function () {
    
    $('.menu-item-has-children').click(function() {
       $('.menu-item-has-children').css('display','block'); 
    });
    
    // Replace source
//    $('img').error(function() {
//         $(this).attr('src', + '../images/image-not-found.jpg');
//    });

    // Or, hide them
    $(".news-item-wrapper img").error(function() {
//            $(this).hide();
        $('a.img-link').removeAttr("href");
        $(this).replaceWith('<span class="img-placeholder"></span>');
    });   
    
    // Toggle Comment Box
    $('#commentbox-btn-hide').hide();
    
    $('#commentbox-btn-show').click(function() {
        var x = $('div#fbcommentbox');
        var hidebtn = $('#commentbox-btn-hide');
        x.css('display','block');
        x.css('visibility','visible');
        x.css('height','auto');
        x.css('overflow','auto');
        $(this).hide();
        hidebtn.show();
    });
    
    $('#commentbox-btn-hide').click(function() {
        var x = $('div#fbcommentbox');
        var showbtn = $('#commentbox-btn-show');
        x.css('display','none');
        x.css('visibility','hidden');
        x.css('height','10px');
        x.css('overflow','hidden');
        $(this).hide();
        showbtn.show();
    });
    
    if ($('#commentbox-btn-show').hasClass('disabled')) {
        $('#commentbox-btn-show').text('Comments Disabled');
    } 
    
    // Override PAGASA Time Stamp 
    // $('iframe #serverdate').addClass("invisible");
    
//    $('iframe').load( function() {
//        $('iframe').contents().find("head")
//        .append($("<style type='text/css'>  #serverdate{display:none !important;}  </style>"));
//    });
    
    // Tooltip
    "use strict";
    $('[data-toggle="tooltip"]').tooltip();
    // $('a').tooltip('show'); // this is to test if tooltips work
    
    // Add a class to image thumbnail inside the_content
    //$('#contentThumbs').addClass('img-fluid img-thumbnail');
    
    // Back to Top
    var amountScrolled = 500;

    $(window).scroll(function () {
        if ($(window).scrollTop() > amountScrolled) {
            //$('a.back-to-top').css("display", "block");
            $('a.back-to-top').fadeIn('slow');
        } else {
            //$('a.back-to-top').css("display", "none");
            $('a.back-to-top').fadeOut('slow');
        }
    });
    
    $('a.back-to-top, a.simple-back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });
    
    // For Map
    $('.maps').click(function () {
        $('.maps iframe').css("pointer-events", "auto");
    });

    $(".maps").mouseleave(function () {
        $('.maps iframe').css("pointer-events", "none");
    });
    
    $('#mainnavbtn').click(function () {
//        $('#mySidenav').css("width", "280px");
        $('#mySidenav').css("visibility", "visible");
        $('#mySidenav').css("opacity", "1");
        $('#mySidenav').css("left", "280");
        $('.closeBtn').css('opacity', "1");
        $('.userBtn').css('opacity', "1");
        $('.planeBtn').css('opacity', "1");
        $('.callBtn').css('opacity', "1");
        $('#sidenav-overlay').css("background-color", "rgba(0,0,0,0.9)");
        $('#sidenav-overlay').css("opacity", "0.9");
        $('#sidenav-overlay').css("pointer-events", "auto");
        $('body').css("overflow-y", "hidden");
        $('ac-small').css('height', 0);
        $('.sidenav').animate({
            scrollTop: 0
        }, 700);
        return false;
    });
    
    $('#opacdown').mouseover(function () {
        $('.sombra').hide();
    });
    
    $('#opacdown').mouseout(function () {
        $('.sombra').show();
    });
    
    $('.closeBtn').click(function () {
//        $('#mySidenav').css("width", "0px");
        $('#mySidenav').css("visibility", "hidden");
        $('#mySidenav').css("opacity", "0");
        $('#sidenav-overlay').css("background-color", "rgba(0,0,0,0)");
        $('#sidenav-overlay').css("opacity", "0");
        $('#sidenav-overlay').css("pointer-events", "none");
        $('body').css("overflow-y", "auto");
        $('ac-small').css('height', 0);
        $('.closeBtn').css('opacity', "0");
        $('.userBtn').css('opacity', "0");
        $('.planeBtn').css('opacity', "0");
        $('.callBtn').css('opacity', "0");
    });
    
    $('.xbtn').click(function () {
        $('#mySidenav').css("width", "0px");
        $('#sidenav-overlay').css("background-color", "rgba(0,0,0,0)");
        $('#sidenav-overlay').css("opacity", "0");
        $('#sidenav-overlay').css("pointer-events", "none");
        $('body').css("overflow-y", "auto");
        $('ac-small').css('height', 0);
    });
    
    $('#sidenav-overlay').click(function () {
//        $('#mySidenav').css("width", "0px");
        $('#mySidenav').css("visibility", "hidden");
        $('#mySidenav').css("opacity", "0");
        $('#sidenav-overlay').css("background-color", "rgba(0,0,0,0)");
        $('#sidenav-overlay').css("pointer-events", "none");
        $('body').css("overflow-y", "auto");
        $('ac-small').css('height', 0);
    });
    
    $('.new-mobi-menu .dropdown a').click(function (e) {
        e.preventDefault();
        if ($(this).parent().children('.mobi-sub-menu:first').is(':visible')) {
            $(this).parent().children('mobi-sub-menu:first').hide();
        } else {
            $(this).parent().children('mobi-sub-menu:first').show();
        }
    });
    
});
