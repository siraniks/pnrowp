/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {
    
    // BG
    
    wp.customize( 'bg_color', function( value ) {
		value.bind( function( to ) {
            $('body').css( 'background-color', to );
		} );
	} );
    
    wp.customize( 'bg_image', function( value ) {
		value.bind( function( to ) {
			$('body').css( 'background-image', 'url( ' + to + ')' );
		} );
	} );
    
    wp.customize( 'bg_repeat', function( value ) {
		value.bind( function( to ) {
			$('body').css( 'background-repeat', to );
		} );
	} );
    
    wp.customize( 'bg_position', function( value ) {
		value.bind( function( to ) {
			$('body').css( 'background-position', to );
		} );
	} );
    
    wp.customize( 'bg_attachment', function( value ) {
		value.bind( function( to ) {
			$('body').css( 'background-attachment', to );
		} );
	} );
    
    wp.customize( 'bg_size', function( value ) {
		value.bind( function( to ) {
			$('body').css( 'background-size', to );
		} );
	} );
    
    wp.customize( 'bg_blend', function( value ) {
		value.bind( function( to ) {
			$('body').css( 'background-blend-mode', to );
		} );
	} );
    
    
    // HEADER (formerly CONTACTS)
    
    wp.customize( 'header_text_color', function( value ) {
		value.bind( function( to ) {
            $imp = ' !important';
            $('h6.rp2').css( 'color', to );
            $('h6.dnr2').css( 'color', to );
            $('a.pnr2').css( 'color', to );
            $('h5.rnr2').css( 'color', to );
            $('.logohr').css( 'border-color', to );
		} );
	} );
    
    wp.customize( 'header_link_color', function( value ) {
		value.bind( function( to ) {
            $('a.pnr2:hover').css( 'color', to );
		} );
	} );
    
    wp.customize( 'subhead_link_color', function( value ) {
		value.bind( function( to ) {
            $('a.subhead-link').css( 'color', to );
		} );
	} );
    
    wp.customize( 'contact_adr', function( value ) {
		value.bind( function( to ) {
			$( '#adr' ).text( to );
		} );
	} );
    
    wp.customize( 'contact_email', function( value ) {
		value.bind( function( to ) {
			$( '#email' ).text( to );
		} );
	} );
    
    wp.customize( 'contact_telnum', function( value ) {
		value.bind( function( to ) {
			$( '#telnum' ).text( to );
		} );
	} );
    
    // ALERT BAR
    
    wp.customize( 'alert_disp', function( value ) {
		value.bind( function( to ) {
            $('.alert').css( 'display', to );
		} );
	} );
    
    wp.customize( 'alert_header', function( value ) {
		value.bind( function( to ) {
			$( 'strong#alertheader' ).text( to );
		} );
	} );
    
    wp.customize( 'alert_msg', function( value ) {
		value.bind( function( to ) {
			$( '#alertmsg' ).text( to );
		} );
	} );
    
    wp.customize( 'fbcomment_disp', function( value ) {
		value.bind( function( to ) {
            $('#fbcommentbox').css( 'display', to );
		} );
	} );
    
    // ADMIN
    
    wp.customize( 'admin-pres', function( value ) {
		value.bind( function( to ) {
			$( '#admin-pres' ).html(function() {
                return '<img src="' + to + '" alt="Philippine President" class="aligncenter">'
            });
		} );
	} );
    
    wp.customize( 'admin-sec', function( value ) {
		value.bind( function( to ) {
			$( '#admin-sec' ).html(function() {
                return '<img src="' + to + '" alt="DENR ecretary" class="aligncenter">'
            });
		} );
	} );
    
    
    wp.customize( 'admin-rd', function( value ) {
		value.bind( function( to ) {
			$( '#admin-rd' ).html(function() {
                return '<img src="' + to + '" alt="Regional Director" class="aligncenter">'
            });
		} );
	} );
    
    wp.customize( 'admin-penro', function( value ) {
		value.bind( function( to ) {
			$( '#admin-penro' ).html(function() {
                return '<img src="' + to + '" alt="PENRO" class="aligncenter">'
            });
		} );
	} );
    
    wp.customize( 'admin_sec-name', function( value ) {
		value.bind( function( to ) {
			$('#admintext-sec').text( to );
		} );
	} );  
    
    wp.customize( 'admin_rd-name', function( value ) {
		value.bind( function( to ) {
			$('#admintext-rd').text( to );
		} );
	} ); 
    
    wp.customize( 'admin_penro-name', function( value ) {
		value.bind( function( to ) {
			$('#admintext-penro').text( to );
		} );
	} ); 
    
    
    // CONTENT
    
    wp.customize( 'panel_text_color', function( value ) {
		value.bind( function( to ) {
			$('.news-item-wrapper p').css( 'color', to );
            $('ul.pagenation li a').css('color', to );
            $('.breadbg').css( 'background-color', to );
            $('#sidebar').css('color', to );
            $('#sidebar p').css('color', to );
            $('#sidebar b').css('color', to );
            $('#sidebar i').css('color', to );
            $('#sidebar span').css('color', to );
            //$('.sidenav-content hr').css('border-color', to );
            $('h3.headertext').css('color', to );
            $('#servertime').css('color', to );
            $('#serverdate').css('color', to );
            $('a.subhead-link:hover').css( 'color', to );
            
		} );
	} );    
    
    wp.customize( 'panel_links_color', function( value ) {
		value.bind( function( to ) {
			$('.card-title a').css( 'color', to );
            $('.card-title').css( 'color', to );
            $('#sidebar a').css('color', to );
            $('li.mob-item-header a').css('color', to );
            $('.announcement img:hover').css('border-color', to );
            $('a.back-to-top:hover').css('color', to );
            $('h4.pnr2 a:hover').css('color', to );
            $('.announcement li a').css('color', to );
            $('h3.headertext').css('color', to );
            $('i.cnr').css('color', to );
            $('.announcement img:hover').css('border-color', to );
            //$('.top-nav').css('background-color', to );
            $('.admintext').css('color', to );
            $('.news-item-img').css('border-color', to );
            $('.announcement ul li:before').css('border-color', to );
		} );
	} );
    
    wp.customize( 'panel_bg_color', function( value ) {
		value.bind( function( to ) {
			$('.card').css( 'background-color', to );
            $('ul.pagenation li a.actve').css('color', to );
            $('.news-item-wrapper').css( 'background-color', to );
            $('.breadcrumb').css('color', to );
            $('#mySidenav').css('color', to );
		} );
	} );
    
    wp.customize( 'btn_color', function( value ) {
		value.bind( function( to ) {
            $('#readBtn').css( 'background-color', to );
            $('#readBtn').css( 'border-color', to );
            $('ul.pagenation li a.actve').css( 'background-color', to );
            $('ul.pagenation li a.actve').css( 'border-color', to );
            $('#mainnavbtn').css( 'background-color', to );
            $('#mainnavbtn').css( 'border-color', to );
            $('.cat-text a').css('color', to );
            $('.cat-icon').css('color', to );
            $('.taglist li a:hover').css('background', to );
            $('.taglist li a:hover').css('border-color', to );
		} );
	} );
    
    wp.customize( 'read-btn_textbox', function( value ) {
		value.bind( function( to ) {
			$( '#readBtn' ).text( to );
		} );
	} );
    
    wp.customize( 'restrict_copy', function( value ) {
		value.bind( function( to ) {
            var moz = '-moz-';
			$( '.card-block p' ).css( '-webkit-user-elect', to );
            $( '.card-block p' ).css( '-khtml-user-elect', to );
            $( '.card-block p' ).css( '-moz-user-elect', moz + to );
            $( '.card-block p' ).css( '-o-user-elect', to );
            $( '.card-block p' ).css( 'user-elect', to );
		} );
	} );
    
    // WIDGET
    
    wp.customize( 'w_1_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w1').css( 'display', to );
		} );
	} );
    
    wp.customize( 'w_2_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w2').css( 'display', to );
		} );
	} );
    
    wp.customize( 'w_3_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w3').css( 'display', to );
		} );
	} );
    
    wp.customize( 'w_4_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w4').css( 'display', to );
		} );
	} );
    
    wp.customize( 'w_5_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w5').css( 'display', to );
		} );
	} );
    
    wp.customize( 'w_6_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w6').css( 'display', to);
		} );
	} );
    
    wp.customize( 'w_7_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w7').css( 'display', to);
		} );
	} );
    
    wp.customize( 'w_8_disp', function( value ) {
		value.bind( function( to ) {
            var imp = '!important';
            $('.w8').css( 'display', to);
		} );
	} );
    
    // MENU
    
    wp.customize( 'menu_btn_color', function( value ) {
		value.bind( function( to ) {
            var imp = ' !important';
            $('#mainnavbtn').css( 'background-color', to );
            $('#mainnavbar').css( 'background-color', to );
            $('nav#primary_nav_wrap').css( 'background-color', to );
            $('nav#primary_nav_wrap ul ul a:hover').css( 'background-color', to );
            $('a.subhead-time').css( 'background-color', to );
            $('#mainnavbtn').css( 'border-color', to );
		} );
	} );
    
    wp.customize( 'menu_panel_color', function( value ) {
		value.bind( function( to ) {
            $('#mySidenav').css( 'background-color', to );
            $('nav#primary_nav_wrapper').css( 'background-color', to );
            $('#primary_nav_wrapper ul ul li a').css( 'background-color', to );
		} );
	} );
    
    wp.customize( 'menu_link_color', function( value ) {
		value.bind( function( to ) {
            $('li.mob-item-header a').css( 'color', to );
            $('.sidenav-header-text').css( 'color', to );
            $('.sidenav-sub-text').css( 'color', to );
            $('ul.mob-menu li a').css( 'color', to );
            $('ul.menu li a').css( 'color',  to );
		} );
	} );
    
    // FOOTER
    
    
    wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( to ) {
            $('.footer-sub').css( 'color', to );
			$('.footer-sub p').css( 'color', to );
            $('.footer-sub a').css( 'color', to );
            $('.footer-sub a').css( 'color', to );
            $('.footcontact').css( 'color', to );
            $('.footdnr').css( 'color', to );
            $('.footpnr').css( 'color', to );
            $('.footrnr').css( 'color', to );
            $('.footcnr').css( 'color', to );
            
		} );
	} );
    
//    wp.customize( 'footer_header-link_color', function( value ) {
//		value.bind( function( to ) {
//			$('ul.unstyled li.footnav-first-level a').css( 'color', to );
//            $('ul.unstyled ul.footnav-second-level li a').css( 'color', to );
//		} );
//	} );
    
    wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( to ) {
			$('.footer').css( 'background-color', to);
		} );
	} );
    
    wp.customize( 'footer_bg_image', function( value ) {
		value.bind( function( to ) {
			$('.footer').css( 'background-image', 'url(' + to + ')' );
		} );
	} );
	
	
} )( jQuery );