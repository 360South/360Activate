$(document).ready(function() {

	// Opera 8.0+
	var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
		// Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';
		// At least Safari 3+: "[object HTMLElementConstructor]"
	var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
		// Internet Explorer 6-11
	var isIE = /*@cc_on!@*/false || !!document.documentMode;
		// Edge 20+
	var isEdge = !isIE && !!window.StyleMedia;
		// Chrome 1+
	var isChrome = !!window.chrome && !!window.chrome.webstore;
		// Blink engine detection
	var isBlink = (isChrome || isOpera) && !!window.CSS;
	
	if(isFirefox) {
		//$('.js-date').datetimepicker();		
	}
	
	$(".js-datepicker").datepicker();
	
	$(".js-datepicker").focus(function() {
		
		var today = new Date(),
			dd    = today.getDate(),
			mm    = today.getMonth() + 1,
			yyyy  = today.getFullYear();
		
		if(dd < 10) {
			dd = '0' + dd
		} 
		
		if(mm < 10) {
			mm = '0' + mm
		} 
		
		$(this).val(mm+'/'+dd+'/'+yyyy);  
	});
	
	$('.js-package-change').on('change', function() {
		$('.m-form fieldset:not(:first-child())').hide();
		switch($(this).val()) {
			case '1':
				$('.m-form #myoko-package').show();
				$('.m-form #general-package').show();
				$('.m-form #lessons').show();
				break;
			case '2':
				$('.m-form #odyssey-package').show();
				$('.m-form #general-package').show();
				$('.m-form #lessons').hide();
				break;
			case '3':
				$('.m-form #secret-package').show();
				$('.m-form #general-package').show();
				$('.m-form #lessons').show();
				break;
		}
	});
	
	$('.js-rental-change').on('change', function() {
		$(this).parent().parent().parent().find('.js-rental-changed').toggle();
	});
	
	$('.js-find').on('change', function() {
		$('.js-findmouth, .js-findother').hide();
		
		if($(this).val() == 'Word of Mouth') {
			$('.js-findmouth').toggle();
		} else if($(this).val() == 'Other') {
			$('.js-findother').toggle();	
		}		
	});

	$('.js-package-change, .js-rental-change, .js-find').trigger('change');
	
	function checkLimit(item) {
		
		var tooltip      = item.parent().find('.u-tooltip'),
			notification = item.parent().find(".a-notification"),
			travelers    = 0;
		
		tooltip.find('input[type="number"]').each(function(index, element) {
			travelers = travelers + parseInt($(this).val());
        });
		
		if(travelers > 9) {
			notification.removeClass('u-hidden');
			notification.html("<strong>Oops</strong>.. Sorry.. The maximum is 10 travelers. Call us for advice!");
			setTimeout(function(){ $(".u-tooltip .a-notification").addClass('u-hidden'); }, 3000);
				
			return false;
			
		} else {
			notification.addClass('u-hidden');
			notification.html("");
			
			return true;
		}
	}
	
	function numberOfTravelers(item) {
		var tooltip   = item.parent().find('.u-tooltip'),
			adult     = 0,
			children  = 0,
			infants   = 0,
			travelers = 0,
			text      = '';	
		
		tooltip.find('input[type="number"]').each(function(index, element) {		
			travelers = travelers + parseInt($(this).val()),
				name  = $(this).attr('name');		
						
			switch(name.substring(2, name.lenght)) {
				case 'adult':
					adult = adult + parseInt($(this).val());
					console.log('adult ' + $(this).val());
					break;
				case 'children':
					children = children + parseInt($(this).val());
					console.log('children ' + $(this).val());
					break;
				case 'infants':
					infants = infants + parseInt($(this).val());
					console.log('infants ' + $(this).val());
					break;
			}
        });
		
		if(children == 0 && infants == 0) {
			text = 'adult';
		} else {
			text = 'travelers';
		}
		
		item.val(travelers + ' ' + text);
	}
		
	$(".js-travelers").click(function() {
	  $(this).parent().find('.u-tooltip').removeClass('u-hidden');
	  numberOfTravelers($(this));
	});
	
	$(".u-tooltip").on("mouseenter", function() {

	}).on("mouseleave", function() {
		$(this).addClass('u-hidden');
	});

	$(".u-tooltip .js-close").click(function() {
		$(this).parent().parent().addClass('u-hidden');
	});

	$(".js-increase").click(function(e) {
		var js_travelers = $(this).parent().parent().parent().parent().parent().find(".js-travelers");
		
		if(checkLimit(js_travelers) == false) return false;
				
		var val = $(this).parent().find('input').val(),
			val = parseInt(val) + 1;
			
		$(this).parent().find('input').val(val);
		
		// Calculate number of Travelers
		numberOfTravelers(js_travelers);
	});
	
	$(".js-decrease").click(function(e) {
		var js_travelers = $(this).parent().parent().parent().parent().parent().find(".js-travelers");
		
		var input = $(this).parent().find('input'),
			val   = input.val();
			
		if(val != input.attr('min')) {
			val = parseInt(val) - 1;	
		}
		
		$(this).parent().find('input').val(val);
		
		// Calculate number of Travelers
		checkLimit(js_travelers);
		numberOfTravelers(js_travelers);
	});

	// Form Validation
	$.validator.setDefaults({
		debug: true,
		success: "valid"
	});
	
	$('.js-request-form').validate({
		rules: {
			package: {
				required: true
			},
			fname: {
				required: true
			},
			lname: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true
			},
			m_adate : {
				required: true
			},
			m_ddate : {
				required: true
			},
			m_nights : {
				required: true
			},
			m_people : {
				required: true
			},
			m_rooms: {
				required: true
			},
			m_hotel: {
				required: true
			},
			m_lift: {
				required: true
			},
			o_date: {
				required: true
			},
			o_people: {
				required: true
			},
			o_rooms: {
				required: true
			},
			o_ability: {
				required: true
			}
			
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
});

