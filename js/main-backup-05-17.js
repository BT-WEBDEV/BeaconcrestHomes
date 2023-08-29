$(document).ready(function() {

var scrollbarW = 16;

// STICKY NAVIGATION - Dynamic Affix Menu
if ($('.carousel')[0]) {
	$('#nav').affix({
	  offset: {
	    top: $('header').height()
	  }
	});
	$(window).on('scroll', function() {
		if ($('#nav').hasClass('affix-top')) {
			$('#home-head').css('margin-top', 0);
		}
		else {
			$('#home-head').css('margin-top', $('#nav').height());
		}
	});
}
else {
	var nav = $('#nav');
	var navH = nav.height();
	nav.removeClass('navbar-static').addClass('navbar-fixed-top');
	nav.next().css('margin-top', navH);
}
// This fixes a click but with Bootstrap's Affix
$('.navbar').on('affix.bs.affix', function(){
    if( !$(window).scrollTop() ) return false;
});


// NAVIGATION - Current Page Color, Hover, Indicators
var url = $(location).attr('href');
var urlBits = url.split('/');
var curPage = urlBits[urlBits.length-2];
var navLi = $('nav ul li');
var navItems = $('nav ul li a').not($('.dropdown-menu li a'));

function navIndicators() {
	navItems.each(function() {
		var curNavItem = $(this);
		var aAttr = curNavItem.attr('href');
		if (aAttr.indexOf(curPage) >= 0) {
			curNavItem.addClass('navItemHighlight');
			curNavItem.addClass('navIndicatorCss');
		}
		curNavItem.hover(function() {
			curNavItem.parent().addClass('navIndicatorCss');
		}, function() {
			if (!(curNavItem.parent().hasClass('open'))) {
				curNavItem.parent().removeClass('navIndicatorCss');
			}
		});
	});
}
function removeNavIndicators() {
	navItems.each(function() {
		var curNavItem = $(this);
		curNavItem.removeClass('navItemHighlight navIndicatorCss');
		curNavItem.parent().removeClass('navIndicatorCss');
		curNavItem.hover(function() {
			curNavItem.parent().removeClass('navIndicatorCss');
		});
	});
}
function windowSizeForNavHover() {
	var win = $(window).width();
	$(window).on('resize', function() {
		win = $(window).width();
		setTimeout(function() {
			if (win > 760) {
				navIndicators();
			}
			else {
				removeNavIndicators();
			}
		}, 500);
	});
}
if ($(window).width() > 768) {
	navIndicators();
}
windowSizeForNavHover();


// TEXT IMAGE COMBO MODULES
function comboDivSizer() {
	var comboDivs = $('.text-image-combo');
	comboDivs.each(function() {
		var textDiv = $(this).children('.combo-text');
		var imageDiv = $(this).children('.combo-image');
		textDivH = textDiv.outerHeight();
		imageDiv.css('height', textDivH);
	});
}
$(window).resize(function() {
	comboDivSizer();
});
comboDivSizer();


// PROPERTY OVERLOOK - Thumbnail Hover
var enlargeTab = $('.enlarge');
var thumbDiv = $('.property-thumb');
var thumb = $('.property-thumb .thumbnail');
enlargeTab.hide();
thumbDiv.hover(function() {
	enlargeTab.slideDown();
	thumb.addClass('border-img');
}, function() {
	enlargeTab.slideUp();
	thumb.removeClass('border-img');
});

// PROPERTY OVERLOOK - Toggle Email, Description
var emailBu = $('#toggle-email');
var descBu = $('#toggle-desc');
var emailForm = $('#property-email');
var descBox = $('#property-description');
emailForm.hide();
emailBu.on('click', function() {
	emailForm.fadeIn(300);
	descBox.hide();
	emailBu.animate({marginLeft: '0.5em', opacity: 0}, 1000);
	descBu.show();
	descBu.animate({marginLeft: '0', opacity: 100}, 1000);
});
descBu.on('click', function() {
	emailForm.hide();
	descBox.fadeIn(300);
	descBu.animate({marginLeft: '-0.5em', opacity: 0}, 1000).hide();
	emailBu.animate({marginLeft: '0', opacity: 1}, 1000);
});

// PROPERTY OVERLOOK - Toggle Features
var featuresHead = $('.features').children('h5');
var featuresList = $('.features').children('ul');
function featuresToggle() {
	featuresHead.each(function() {
		if ($(this).text().indexOf("See ") == -1)
		$(this).prepend("See ");
	});
	featuresList.hide();
	featuresHead.on('click', function() {
		$(this).siblings('ul').toggle();
	});
}
function noFeaturesToggle() {
	featuresHead.each(function() {
		if ($(this).text().indexOf("See ") >= 0) {
			$(this).text($(this).text().substring(3));
		}
	});
	featuresList.show();
}
function featuresToggleCheck() {
	var win = $(window).width();
	$(window).on('resize', function() {
		win = $(window).width();
		setTimeout(function() {
			if (win < 992) {
				featuresToggle();
			}
			else {
				noFeaturesToggle();
			}
		}, 500);
	});
}
if ($(window).width() < 992) {
	featuresToggle();
}
featuresToggleCheck();


// CONTACT - Google Map
var mapDiv = $('#contact-map-div');
function gMapSizer() {
	var siblingColumn = $('#contact-content');
	var sibColH = siblingColumn.height();
	mapDiv.css('height', sibColH);
}
if ($(document).width() > 992) {
	gMapSizer();
}
function windowSizeForMapSizer() {
	var win = $(window).width();
	$(window).on('resize', function() {
		win = $(window).width();
		setTimeout(function() {
			if ((win + scrollbarW) > 992) {
				gMapSizer();
			}
			else {
				mapDiv.css('height', '20em');
			}
		}, 500);
	});
}
windowSizeForMapSizer();


// BUILD ON YOUR LOT - FAQ List 
var faqLi = $('.faq-question');
var faqDrop = $('ul.faq-drop');
var faqDropLi = $('.faq-question .faq-drop li');

function dropUlStyle(listItem, style, dropUl) {
	if (style == 'none') {
		dropUl.slideDown();
		listItem.addClass('clicked-question');
	}
	else {
		dropUl.slideUp();
		$('img.faq-drop-arrow').remove();
		listItem.removeClass('clicked-question');
	}
}

faqLi.on('click', function() {
	var dropDisplay = $(this).children('ul').css('display');
	dropUlStyle($(this), dropDisplay, $(this).children('ul'));
});


// STICKY FOOTER 
function set_footer_height() {
	var footerH = $('footer').outerHeight();
	$('body').css('padding-bottom', footerH);
}
$(window).resize(function() {
	set_footer_height();
});
set_footer_height();


}); // END READY