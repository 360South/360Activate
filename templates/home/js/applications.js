/*
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 */
var ft = {
	postheader: function() {
		if($(window).width() <= 980) {
			var windowHeight     = $(window).height(),
				bodyFontSize     = $('body').css('font-size'),
				emFontSize       = parseInt(bodyFontSize.replace("px","")) * 3.75,
				postheaderHeight = windowHeight * 0.55 + emFontSize;
			
			if ($('.postheader').length > 0) {
				$('.postheader').css('height', parseInt(postheaderHeight));
				$('.loader').css('top', parseInt(postheaderHeight) - emFontSize*2);
			} else if ($('.video').length > 0) {
				$('.video').css('height', parseInt(postheaderHeight));
				$('.loader').css('top', parseInt(postheaderHeight) - emFontSize - 15);
			}
		
		} else {
			$('.video').css('height','');
			$('.postheader').css('height', '');
			$('.loader').css('top', '');
		}
	},
    init: function() {

        $carousel = $('body').find('.sliderBlock');
        if ($carousel.length > 0) {
            function initialize() {
                var settings = {
                    stagePadding: ($('body').width() - $('.container').width()) / 2,
                    loop: true,
                    smartSpeed: 500,
                    margin: 2,
                    items: 1,
                    nav: false
                };

                $carousel.owlCarousel(settings);
                $carousel.find('.owl-item').each(function() {
                    $(this).css('width', $('.container').width());
                });
                //$carousel.data('owlCarousel').reInit( settings );
            }

            var id;
            $(window).resize(function() {
                clearTimeout(id);
                id = setTimeout(initialize, 100);
            });

            initialize();
        }
		
		$(window).on("resize", function(){
			ft.postheader();	
		});
		
		if ($(window).width() <= 980) {
			
			ft.postheader();

            var container = document.getElementById('starfield');
            var starfield = new Starfield();

            starfield.stars = 70;
            starfield.minVelocity = 50;
            starfield.maxVelocity = 70;

            starfield.initialise(container);
            starfield.start();

            // Pretty simple huh?
            /*if ($('#parallax').length > 0) {
                var image = document.getElementById('parallax'),
                    parallax = new Parallax(image);
            }*/
			
        } else {
			
            if ($('#parallax').length > 0) {
                $(window).scroll(function() {
                    var windowTop = $(window).scrollTop();
                    $('#parallax').find('.postheader__background .img').css({
						/*'background-position':'0 '+ windowTop * -0.1+'px',*/
                        'opacity': 1 - (windowTop / 500)
                    });
                }).scroll();
            }
        }

        $('.select').on('change', function() {
            $select = $(this);
            $('#portfolio .project').parent().show();

            if ($select.val() != 0) {
                $('#portfolio .project').each(function() {

                    if ($select.attr('name') == 'service') {

                        var services = $(this).attr($select.attr('name') + '-id').split(',');

                        console.log($.inArray($select.val(), services));

                        if ($.inArray($select.val(), services) == -1) {
                            $(this).parent().hide();
                        }

                    } else {
                        if ($(this).attr($select.attr('name') + '-id') != $select.val()) {
                            $(this).parent().hide();
                        }
                    }
                });
            }
        });

		$('.js-architecture').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/architecture/lightbox/architecture-01.jpg' },
				  {	src: '/images/services/photography/architecture/lightbox/architecture-02.jpg' },
				  {	src: '/images/services/photography/architecture/lightbox/architecture-03.jpg' },
				  {	src: '/images/services/photography/architecture/lightbox/architecture-04.jpg' },
				  {	src: '/images/services/photography/architecture/lightbox/architecture-05.jpg' },
				  {	src: '/images/services/photography/architecture/lightbox/architecture-06.jpg' },
				  {	src: '/images/services/photography/architecture/lightbox/architecture-07.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-camping').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/camping/lightbox/camping-01.jpg' },
				  {	src: '/images/services/photography/camping/lightbox/camping-02.jpg' },
				  {	src: '/images/services/photography/camping/lightbox/camping-03.jpg' },
				  {	src: '/images/services/photography/camping/lightbox/camping-04.jpg' },
				  {	src: '/images/services/photography/camping/lightbox/camping-05.jpg' },
				  {	src: '/images/services/photography/camping/lightbox/camping-06.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-commercial').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/commercial/lightbox/commercial-01.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-02.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-03.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-04.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-05.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-06.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-07.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-08.jpg' },
				  {	src: '/images/services/photography/commercial/lightbox/commercial-09.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-fashion').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-01.jpg' },
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-02.jpg' },
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-03.jpg' },
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-04.jpg' },
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-05.jpg' },
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-06.jpg' },
				  {	src: '/images/services/photography/fashion-and-retail/lightbox/fashion-07.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-health').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/health-and-lifestyle/lightbox/health-lifestyle-01.jpg' },
				  {	src: '/images/services/photography/health-and-lifestyle/lightbox/health-lifestyle-02.jpg' },
				  {	src: '/images/services/photography/health-and-lifestyle/lightbox/health-lifestyle-03.jpg' },
				  {	src: '/images/services/photography/health-and-lifestyle/lightbox/health-lifestyle-04.jpg' },
				  {	src: '/images/services/photography/health-and-lifestyle/lightbox/health-lifestyle-05.jpg' },
				  {	src: '/images/services/photography/health-and-lifestyle/lightbox/health-lifestyle-06.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-industrial').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/industrial/lightbox/industrial-01.jpg' },
				  {	src: '/images/services/photography/industrial/lightbox/industrial-02.jpg' },
				  {	src: '/images/services/photography/industrial/lightbox/industrial-03.jpg' },
				  {	src: '/images/services/photography/industrial/lightbox/industrial-04.jpg' },
				  {	src: '/images/services/photography/industrial/lightbox/industrial-05.jpg' },
				  {	src: '/images/services/photography/industrial/lightbox/industrial-06.jpg' },
				  {	src: '/images/services/photography/industrial/lightbox/industrial-07.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-learning').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-01.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-02.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-03.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-04.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-05.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-06.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-07.jpg' },
				  {	src: '/images/services/photography/learning-and-edu/lightbox/edu-08.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-portrait').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/portrait/lightbox/portrait-01.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-02.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-03.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-04.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-05.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-06.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-07.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-08.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-09.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-10.jpg' },
				  {	src: '/images/services/photography/portrait/lightbox/portrait-11.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-product').on("click", function(e){
			e.preventDefault();
			$.magnificPopup.open({
				items: [
				  {	src: '/images/services/photography/product/lightbox/product-01.jpg' },
				  {	src: '/images/services/photography/product/lightbox/product-02.jpg' },
				  {	src: '/images/services/photography/product/lightbox/product-03.jpg' },
				  {	src: '/images/services/photography/product/lightbox/product-04.jpg' },
				  {	src: '/images/services/photography/product/lightbox/product-05.jpg' }
				],
			  	type: 'image',
			  	gallery: {
			  		enabled: true
			  	},
			}, 0);
		});
		
		$('.js-request-form').validate({
			rules: {
				name: { required: true },
				email: { required: true, email: true },
				phone: { required: true },
				company: { required: true },
				timeframe: { required: true },
				project: { required: true }
			},
			submitHandler: function(form) {
				
				$('html, body').animate({
                    scrollTop: 0
                }, 400, function() {

                    var $intro = $('.intro-title'),
                        $line = $('.intro-line'),
                        $loader = $('.loader'),
                        $content = $('#content'),
                        $postheader = $('.postheader__background');

                    $postheader.fadeOut(500);

                    $intro.css('-webkit-transform', 'translate3d(0, 100%, 0)');
                    $line.css('-webkit-transform', 'translate3d(100%, 0, 0)');
                    $content.css({
                        '-webkit-transform': 'translate3d(0, 30px, 0)',
                        'opacity': 0
                    });

                    clearTimeout($loader.t);
                    $loader.t = setTimeout((function() {
                        $loader.addClass('loading').removeClass('t+100');
                        $('#section').fadeOut(400, function(){
							form.submit();	
						});
                    }), 400);
                });
				
				
			}
		});
		
		$('.js-toggle').on('click', function() {
            $toggle = $(this);
			$(this).toggleClass('is-open');
			$(this).parent().find('.toggle-container').toggle();
        });

        $('.js-play__game').on('click', function() {

            $('body').addClass('is-game__active');

            /*$.each([ 'bgctx', 'playerctx', 'asteroidctx', 'hudctx' ], function( index, value ) {
            	
            	$('<canvas>').attr({
            		id: value
            	}).css({
            		width: $(window).width() + 'px',
            		height: $(window).height() + 'px'
            	}).appendTo('.game__container');

            });*/

            /*var bgctx       = document.getElementById("bgctx").getContext("2d");
            var playerctx   = document.getElementById("playerctx").getContext("2d");
            var asteroidctx = document.getElementById("asteroidctx").getContext("2d");
            var hudctx      = document.getElementById("hudctx").getContext("2d");

            //handleResize();
            checktouch();
            preloadImages();
				
            function update() {
            	
            	if (pause === false) {
            		clearCanvas();
            		checkCollision();
            		moveShip();
            		moveAsteroids();
            		drawscore();
            		ship();
            		bgspeedReset();
            	} else {
            		bgspeedPause();
            	}
            	requestAnimationFrame(update);
            }
				
            update();
				
            animationTimeout (createAsteroids, 5000);
            animationInterval (lvlup, 15000);
            animationInterval (upscore, 200);*/

        });

        $('.select').each(function() {
            var $this = $(this);
            $this.wrap('<div class="select-hidden bg:gray-3 clearfix"></div>');
            $this.after('<div class="select-styled"></div>');
            var $styledSelect = $this.next('div.select-styled');
            $this.on('change', function() {
                $styledSelect.text($this.find('option:selected').text());
            });
            $this.trigger("change");
        });
		/*$('.select').niceSelect();*/
		
		var width = $(window).width();
		if (width > 860) {
			$('#modal-iframe').iziModal({
				iframe:true,
				width:800,
				onOpening:function(){
					var url = $('#modal-iframe').attr('src');
						url = url+'&autoplay=true';
					$('#modal-iframe').attr('src',url);
				},
				onClosing:function(){
					var url = $('#modal-iframe').attr('src');
						url = url.replace('&autoplay=true','');
					$('#modal-iframe').attr('src',url);
				}
			});
			$(document).on('click', '.trigger', function (event) {
				event.preventDefault();
				$('#modal-iframe').iziModal('open', event); // Use "event" to get URL href
			});	
		} else {
			$('#modal-iframe').hide();
		}
		
		/*$('.item-104 > a').click(function(e){
			e.preventDefault();
			e.stopImmediatePropagation();
			$('.child-menu').stop().animate({
				opacity:1
			},125,function(){
				$(this).css({visibility:'visible'});
			});
		});
		$('.close-menu').click(function(e){
			e.preventDefault();
			$('.child-menu').stop().animate({
				opacity:0
			},250,function(){
				$(this).css({visibility:'hidden'});
			});
		});*/

        $(window).scroll(function() {
            var windScroll = $(window).scrollTop(),
                yHeight = $(window).height() * 0.85;

            $('.animate').each(function(i) {
                if ($(this).offset().top < (windScroll + yHeight)) {
                    $(this).addClass('is-animated');
                }
            });

        }).scroll();

        ! function(s) {
            "use strict";

            function e(s) {
                return new RegExp("(^|\\s+)" + s + "(\\s+|$)")
            }

            function n(s, e) {
                var n = a(s, e) ? c : t;
                n(s, e)
            }
            var a, t, c;
            "classList" in document.documentElement ? (a = function(s, e) {
                return s.classList.contains(e)
            }, t = function(s, e) {
                s.classList.add(e)
            }, c = function(s, e) {
                s.classList.remove(e)
            }) : (a = function(s, n) {
                return e(n).test(s.className)
            }, t = function(s, e) {
                a(s, e) || (s.className = s.className + " " + e)
            }, c = function(s, n) {
                s.className = s.className.replace(e(n), " ")
            });
            var i = {
                hasClass: a,
                addClass: t,
                removeClass: c,
                toggleClass: n,
                has: a,
                add: t,
                remove: c,
                toggle: n
            };
            "function" == typeof define && define.amd ? define(i) : s.classie = i
        }(window);

        $('textarea.text-field__input').on('keydown', function() {
            var textarea = this;
            setTimeout(function() {
                textarea.style.cssText = 'height:auto;';
                textarea.style.cssText = 'height:' + textarea.scrollHeight + 'px';
            }, 0);
        });

        $('select.text-field__input').on('focus', function() {
        	$("select.text-field__input option").each(function () {
		        if ($(this).hasClass() == "emptyselect") {
		            $(this).attr("disabled", "disabled");
		            return;
		        }
			});
        });

        if ($('#slider__tool').length > 0) {

            var slider = document.getElementById('slider__tool');

            noUiSlider.create(slider, {
                start: [60, 95],
                step: 5,
                margin: 5,
                connect: true,
                range: {
                    'min': 10,
                    'max': 150
                }
            });

            slider.noUiSlider.on('slide', function(values, handle) {
                setMinimun(values[0], values[1]);
            });

            var valueInput = document.getElementById('budget');

            // When the slider value changes, update the input and span
            slider.noUiSlider.on('update', function(values, handle) {
                valueInput.value = '$' + values[0].substring(0, values[0].length - 3) + 'k - $' + values[1].substring(0, values[1].length - 3) + 'k';
            });

            valueInput.addEventListener('change', function() {
                slider.noUiSlider.set([null, this.value]);
            });
        }

        $(".js-typed").typed({
            strings: ["Holographic Displays", "Virtual Reality", "Augmented Reality", "3D Animation"],
            typeSpeed: 100,
            loop: true,
            backDelay: 1250
        });

        if (!String.prototype.trim) {
            (function() {
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call(document.querySelectorAll('input.text-field__input, textarea.text-field__input, select.text-field__input')).forEach(function(inputEl) {
            if (inputEl.value.trim() !== '') {
                classie.add(inputEl.parentNode, 'is-filled');
            }

            inputEl.addEventListener('focus', onInputFocus);
            inputEl.addEventListener('blur', onInputBlur);
        });

        function onInputFocus(ev) {
            classie.add(ev.target.parentNode, 'is-filled');
        }

        function onInputBlur(ev) {
            if (ev.target.value.trim() === '') {
                classie.remove(ev.target.parentNode, 'is-filled');
            }
        }

        /*if($('.postheader hr').length > 0) {
        	$('.postheader hr').css('width', $('.postheader .topheading').width() + 'px')
        }*/

        $('.js-open__menu, .js-close__menu').on('click', function(){
            $('body').toggleClass('is-menu__opened');
            if ($('body').hasClass('is-menu__opened')) {
                $('main').css({'overflow':'hidden', 'height':'100vh'});
            } else {
                setTimeout(function() {
                    $('main').css({'overflow':'inherit', 'height':'auto'});
                }, 750);
            }
        });

        $('#section .btn').each(function() {
            var $this = $(this),
                text = $this.text();
            $this.text('');
            $this.append('<span><strong>' + text + '</strong></span>');
        });

        $('.js-scroll-down').on('click', function() {
            if ($('.postheader').length > 0) {
                $('html, body').animate({
                    scrollTop: $('.postheader').height()
                }, 500);
            } else {
                $('html, body').animate({
                    scrollTop: $('#main').height()
                }, 500);
            }
        });

        $('.js-scroll-up').on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });

        $(document).on("scroll", function() {
            if ($(document).scrollTop() >= $('.postheader').height()) {
                $('.js-scroll-up').addClass('is-visible');
            } else {
                $('.js-scroll-up').removeClass('is-visible');
            }
        });
		
		$('.js-submit').on("click", function(e) {
			e.preventDefault();

			$('.js-request-form').submit();
        });

    }
};

$(document).ready(function() {
    'use strict';
	
	if($('#section').hasClass('home-page') || $('#section').hasClass('com_project_article')){
		$('.loader').addClass('t+100').removeClass('hidden');
	} else {
		$('.loader').removeClass('t+100').removeClass('hidden');
	}
	
    $('#main').smoothState({
        blacklist: '.fa-bars, .js-submit, .js-request-form, .no-link',
//		forms: '.request-form',
        onStart: {
            duration: 2000,
            render: function(container) {
                $('html, body').animate({
                    scrollTop: 0
                }, 400, function() {

                    var $intro = $('.intro-title'),
                        $line = $('.intro-line'),
                        $loader = $('.loader'),
                        $content = $('#content'),
                        $postheader = $('.postheader__background');

                    $postheader.removeClass('is-active');

                    $intro.css('-webkit-transform', 'translate3d(0, 100%, 0)');
                    $line.css('-webkit-transform', 'translate3d(100%, 0, 0)');
                    $content.css({
                        '-webkit-transform': 'translate3d(0, 30px, 0)',
                        'opacity': 0
                    });

                    clearTimeout($loader.t);
                    $loader.t = setTimeout((function() {
                        $loader.addClass('loading').removeClass('t+100').removeClass('hidden');
                        $('#section').fadeOut(400);
                    }), 400);
                });
            }
        },
        onReady: {
            duration: 250,
            render: function($container, $newContent) {
                $newContent[2].style.display = "none";

                var $main = $('#main');

                $('#main').html($newContent);

				$('#main').find('.postheader__background').removeClass('is-active');

                $('#main').find('.js-up').addClass('animate-up');

                $main.find('.intro-title').css('-webkit-transform', 'translate3d(0, 100%, 0)');
                $main.find('.intro-line').css('-webkit-transform', 'translate3d(-100%, 0, 0)');
                $main.find('#content').css({
                    '-webkit-transform': 'translate3d(0, 30px, 0)',
                    'opacity': 0
                });

                $('#main').find('#section').fadeIn(50);

            }
        },
        onAfter: function(container, newContent) {
            duration: 1500,

			$('#main').find('.postheader__background').addClass('is-active');

            /*if ($('#main').find('#section').hasClass('com_project_article') || $('#main').find('#section').hasClass('com_profiles_list') || $('#main').find('#section').hasClass('com_content_article')) {
                $('.loader').addClass('t+100').removeClass('hidden');
            } else if($('#main').find('#section').hasClass('com_broswer_form')) {
                $('.loader').addClass('hidden').removeClass('t+100');
            } else {
                $('.loader').removeClass('t+100').removeClass('hidden');
            }*/
			if($('#section').hasClass('home-page') || $('#section').hasClass('com_project_article')){
				$('.loader').addClass('t+100').removeClass('hidden');
			} else {
				$('.loader').removeClass('t+100').removeClass('hidden');
			}

            var $intro = $('.intro-title'),
                $line = $('.intro-line'),
                $content = $('#content');

            clearTimeout($intro.t);
            $intro.t = setTimeout((function() {
                $intro.css('-webkit-transform', 'translate3d(0, 0, 0)');
                $line.css('-webkit-transform', 'translate3d(0, 0, 0)');
            }), 600);

            clearTimeout($content.t);
            $content.t = setTimeout((function() {
                $content.css({
                    '-webkit-transform': 'translate3d(0, 0, 0)',
                    'opacity': 1
                });
            }), 900);

            $('.loader').removeClass('loading');

            ft.init();
        }
    }).data('smoothState');

    ft.init();

});

function fbShare(url) {
    var winTop = (screen.height / 2) - (350 / 2);
    var winLeft = (screen.width / 2) - (520 / 2);
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url + '&redirect_uri=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=520, height=350');
}

function twitterShare(status) {
    var winTop = (screen.height / 2) - (380 / 2);
    var winLeft = (screen.width / 2) - (540 / 2);
    window.open('https://twitter.com/home?status=' + status, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=520, height=350');
}

function linkedinShare(url) {
    var winTop = (screen.height / 2) - (620 / 2);
    var winLeft = (screen.width / 2) - (540 / 2);
    window.open('https://plus.google.com/share?url=' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=520, height=620');
}