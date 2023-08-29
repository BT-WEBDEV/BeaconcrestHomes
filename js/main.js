$(document).ready(function() {

	// Main Slider Full Screen 
	var $item = $('.carousel .item'); 
	var $wHeight = $(window).height()-$('#home_page').height();
	$item.eq(0).addClass('active');
	$item.height($wHeight); 
	$item.addClass('full-screen');

	$('.carousel img').each(function() {
	  var $src = $(this).attr('src');
	  var $color = $(this).attr('data-color');
	  $(this).parent().css({
	    'background-image' : 'url(' + $src + ')',
	    'background-color' : $color
	  });
	  $(this).remove();
	});

	$(window).on('resize', function (){
	  $wHeight = $(window).height()-$('#home_page').height();
	  $item.height($wHeight);
	});

	$('.carousel').carousel({
	  	interval: 7000,
      	pause: "false"
	});
	// End - Main Slider Full Screen 

var mediumScreen = 992;
var smallScreen = 768;
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
	descBu.css('left', '-1em');
	descBox.hide();
	emailForm.fadeIn(1000);
	emailBu.animate({marginLeft: '3em', opacity: 0}, 1000, function() {
		emailBu.hide();
		emailBu.css('margin-left','0.5em');
	});
	descBu.show();
	descBu.animate({left: '0', opacity: 100}, 500);
});
descBu.on('click', function() {
	emailForm.hide();
	descBox.fadeIn(1000);
	descBu.animate({left: '-2em', opacity: 0}, 1000, function() {
		descBu.hide();
	});
	emailBu.show();
	emailBu.animate({marginLeft: '0', opacity: 1}, 500);
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


// CONTACT - Map Size
var mapDiv = $('#contact-map-div');
function contactMapLarge() {
	var siblingColumn = $('#contact-content');
	var sibColH = siblingColumn.height();
	mapDiv.css('height', sibColH);
}
function contactMapSmall() {
	mapDiv.css('height', '20em');
}


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


// FUNCTIONS DEPENDING ON SCREEN SIZE
$(window).on('resize', function() {
	win = $(window).width() + scrollbarW;
	setTimeout(function() {
		win = $(window).width() + scrollbarW;
		enableFunctionsBasedOnWindowSize();
	}, 500);
});
function enableFunctionsBasedOnWindowSize() {
	if (win > mediumScreen) {
		contactMapLarge();
	}
	else {
		contactMapSmall();
	}
	if (win > smallScreen) {
		navIndicators();
		noFeaturesToggle();
	}
	else {
		removeNavIndicators();
		featuresToggle();
	}

}
var win = $(window).width();
enableFunctionsBasedOnWindowSize(win);


});


// Contact Form Thank you note Data validation
    $(document).on('submit', '#contact_form', function()
    {   
        // Disable the submit button while evaluating if the form should be submitted
        $('#button').prop('disabled', true);

        var re = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        var firstname = document.forms["sign-up-form"]["full-name"].value;
        var phone = document.forms["sign-up-form"]["phone"].value;
        var comment = document.forms["sign-up-form"]["comment"].value;
        var email = document.forms["sign-up-form"]["email"].value;
        var is_email = re.test(email);
        // var phone = document.forms["sign-up-form"]["phone"].value;
    if (firstname == null || firstname == "" || phone == null || phone == "" || email == null || email == "" || comment == null || comment == "") {
        alert("Required field (*) must be filled out");
        // Reactivate the button if the form was not submitted
        $('#button').prop('disabled', false);
        return false;
        }
    if(!is_email) {
        alert("A valid email address is required");
        // Reactivate the button if the form was not submitted
        $('#button').prop('disabled', false);
        return false;
    }
    else {
        var data = $(this).serialize();
        $.ajax({
        type : 'POST',
        url  : '/includes/swift-php-emailer.php',
        data : data,
        success :  function(data)
                   {                        
                        $("#contact_form").fadeOut(500).hide(function()
                        {
                            $(".result").fadeIn(500).show(function()
                            {
                                $(".result").html(data);
                            });
                        });
                        
                   }
        });
        return false;
        }
    });