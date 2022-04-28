$(document).ready(function() {

	

	$(".input-telephone").inputmask("mask", {
		"mask": "+7-(999)-999-99-99",
		'placeholder': '+7-(___)-___-__-__'
	}); 
	

	

	$('body').on('keyup', '.field-error', function(){
		$(this).removeClass('field-error')
		$(this).parents('.input-wrp').find('.error').remove()
	})

	$('body').on('click', '.header-nav i.fa', function(){
		$('.header-nav').toggleClass('active')
	})



	$('.fixed-menu-btn').on('click', function(){
		$('.sidebar-left-fixed').toggleClass('hidden')

		if($('.sidebar-left-fixed').hasClass('hidden')){
			$('body').attr('data-menu', 'hidden')
			setCookie('visible_menu', 0, 365);
		}else{
			$('body').attr('data-menu', '')
			setCookie('visible_menu', 1, 365);
		}
	})
    
    $('.sidebar-fixed-content').on('click', function(){
    	if($('.sidebar-left-fixed').hasClass('hidden')){
			$('.sidebar-left-fixed').toggleClass('hidden')
            $('body').attr('data-menu', '')
			setCookie('visible_menu', 1, 365);
		}else{
			
		}
    })

	if($(window).width() < 1570 && getCookie('visible_menu') == '') {
		$('.sidebar-left-fixed').toggleClass('hidden')
		$('body').attr('data-menu', 'hidden')
		setCookie('visible_menu', 0, 365);
	}

	



	$('.tabs-controls a').on('click', function(e){
	 var ul = $(this).parents('.tabs-controls')
	 var li = $(this).parents('li')
	 if(!li.hasClass('active')){
	 	$(ul.data('id')).find('.active').removeClass('active')
	 	$($(this).attr('href')).addClass('active')
	 	ul.find('.active').removeClass('active')
	 	li.addClass('active')
	 }
		e.preventDefault();
	})




	var magnificPopupArgs = {
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom',
	}
	$('.thanks-popup-link, .popup-link').magnificPopup( magnificPopupArgs )




  $('.entry-content table').wrap('<div class="entry-table-content"></div>')
	$('.entry-content table').addClass('visible')


	function changeImageSize(wrp){
		var img = wrp.find('img')
		img.on('load', function(){
			var width = $(this)[0].naturalWidth;
			var height = $(this)[0].naturalHeight
			var gH = $(wrp).height();
			var gW = $(wrp).width();
			var g = gW/gH
			if(width/height > g){
				$(this).css({
					height: gH,
					width: 'auto',
				})
			}else{
				$(this).css({
					height: 'auto',
					width: gW,
				})
			}
			$(this).css({
				left: (gW-$(this).width())/2,
				top: (gH-$(this).height())/2
			})
		}).each(function() {
		  if(this.complete) $(this).load();
		});
	}
	//changeImageSize($('.gallery-item'))

	
	$('.ajax-form').on('submit', function(e){
		var errors = false;
		var form = $(this)
		var btn = $(this).find('input[type="submit"]')
		var btnText = btn.val();;
		btn.focus()
		form.find('.field-required').each(function(){
			if($(this).val() == '' && $(this).attr('type') != 'hidden'){
				errors = true;
				$(this).addClass('field-error')
				$(this).parents('.input-wrp').append('<p class="error">Неккоректная инфомрация</p>')
			}
		})
		if(!btn.hasClass('form-is-sending') && !errors){
			$.ajax({
				type: 'post',
				url: ajax_url,
				data: form.serialize(),
				beforeSend: function(){
					btn.addClass('form-is-sending').val('Подождите...')
				}
			})
			  .done(function(data){
			  	if(data=='true'){
			  		form[0].reset();
			  		var thanksText = form.data('send-text') ? form.data('send-text') : 'Благодарим за обращение<br>мы свяжемся с вами в ближайшее время'; 
			  		showThanksPopup(thanksText);
                  	yaCounter42606399.reachGoal('ORDER');
			  	}else{
    				alert('Error, try again')
			  	}
			  })
			  .always(function(){
			  	btn.removeClass('form-is-sending').val(btnText)
			  })
		}
		e.preventDefault();
	})





});


function showThanksPopup(text){
	$('#thanks-popup .table-cell h4').html(text)
	$('.thanks-popup-link').click();
}


var hpProjectsSlider;
var hpReviewsSlider;

$(document).ready(function() {
	

	var topSlider = $('.hp-slider').lightSlider({
    loop:true,
    enableDrag: true,
    enableTouch: true,
    controls: false,
    slideMargin: 0,
    pager: true,
    adaptiveHeight: false,
    item: 1,
    slideMove: 1,
    mode: 'slide',
    speed: 500
  });

  // Entry Content Slider
  if($('.gallery-size-full').size() > 0){
  	$('.gallery-size-full').each(function(){
  		var gallery = $(this)
  		var wrpId = 'wrp-'+gallery.attr('id')
  		$('<div id="'+wrpId+'" class="gallery-wrp"></div>').insertBefore(gallery)
  		$('#'+wrpId).append(gallery)
  		var slider = gallery.lightSlider({
		    loop:true,
		    enableDrag: true,
		    enableTouch: true,
		    controls: false,
		    slideMargin: 0,
		    pager: false,
		    adaptiveHeight: true,
		    item: 1,
		    slideMove: 1,
		    mode: 'slide',
		    speed: 500,
		    onSliderLoad: function(){
		    	var id = 'controls-'+gallery.attr('id')
		    	$('#'+wrpId).append( $('<div id="'+id+'" class="gallery-controls"><span class="prev"></span><span class="next"></span></div>') )
	        $('#'+id+' .prev').on('click', function(){ slider.goToPrevSlide(); })
	        $('#'+id+' .next').on('click', function(){ slider.goToNextSlide(); })
	      }
		  });
  	})
  }

  hpProjectsSlider = $('.done-projects-slider').bxSlider({
  	speed: 500,
  	adaptiveHeight: true,
  	adaptiveHeightSpeed: 500,
  	responsive: true,
  	pager: false,
  	controls: false,
  	mode: 'fade'
  });

  hpReviewsSlider = $('.hp-reviews-slider').bxSlider({
  	speed: 500,
  	adaptiveHeight: true,
  	adaptiveHeightSpeed: 500,
  	responsive: true,
  	pager: false,
  	controls: false,
  	mode: 'fade'
  });

  
  $('.done-projects-menu a').on('click', function(e){
  	if(!$(this).parent().hasClass('active')) {
  		var num = parseInt($(this).data('slide'))
	  	hpProjectsSlider.goToSlide(num)
	  	hpReviewsSlider.goToSlide(num)
	  	$('.done-projects-menu .active').removeClass('active')
	  	$(this).parent().addClass('active')
  	}
  	e.preventDefault()
  })

  $('.hp-reviews-slider-controls .prev').on('click', function(){
  	hpReviewsSlider.goToPrevSlide();
  })

  $('.hp-reviews-slider-controls .next').on('click', function(){
  	hpReviewsSlider.goToNextSlide();
  })



  // Sideabr scroll
  var prevScroll = 0;
	var sidebarFixed = $('.sidebar-fixed-content')
	$(window).on('scroll', function(e) {
		var currScroll = $(window).scrollTop() - prevScroll
		sidebarFixed.scrollTop(sidebarFixed.scrollTop() + currScroll);
		
	  prevScroll = $(window).scrollTop()
	});



	// Product order btns
	$('.single-product-left-application-btn').on('click', function(){
		var title = $('.page-title').text()
		$('#order-product-popup .popup-title').html('оставьте заявку на '+title)
		$('#order-product-popup input[name="u-product-id"]').val($(this).data('id'))
		$('#order-product-popup input[name="u-product-detail"]').val('')
	})

	$('body').on('click', '.order-detail-link', function(){
		$('.single-product-left-application-btn').click()

		var title = $('#order-product-popup .popup-title')

		if($(this).parents('.product-table-mobile').size() > 0){
			var detail = $(this).parents('.product-table-mobile').find('header').text()
		}else{
			var detail = $(this).parents('tr').find('td:first-child').text()
		}
		title.html(title.html() + ' ('+detail+')')
		$('#order-product-popup input[name="u-product-detail"]').val(detail)
	})


	// Product Table Scripts
	if($('.wrapper').width() > 750){
		$('.product-table table').stickyTableHeaders();
	}

	$('.product-table table thead tr').append('<td style="width: 250px"></td>')
	$('.product-table table tbody tr').each(function(){
		var newTD = $('<td style="width: 250px"><a href="#order-product-popup" class="left-application popup-link order-detail-link" data-id="'+$('.single-product-left-application-btn').data('id')+'">Оставить заявку</a></td>')
		$(this).append(newTD)
	})


	if($('.product-images').size() > 0){
		var smallImagesCount = $('.small-img').size()
		$('.small-images').css({
			'max-width': smallImagesCount*100 + smallImagesCount*10 + 10
		})
	}


	// Product table mobile
	$('body').on('click', '.product-table-mobile header', function(){
		$(this).parent().toggleClass('active')
		$(this).find('i.fa').toggleClass('fa-caret-down fa-caret-up')
	})

	// Home Projects done mobile
	$('body').on('click', '.project-open-btn-mobile a', function(e){
		$('.done-projects-slider .active').removeClass('active')
		$(this).parent().addClass('active')
		$(this).parent().next().addClass('active')

		var num = parseInt($(this).data('slide'))
  	hpReviewsSlider.goToSlide(num)

		e.preventDefault();
	})
		



});






$(document).ready(function(){

/*	$('[data-lightbox], .entry-content a[href*=".jpg"], .entry-content a[href*=".jpeg"], .entry-content a[href*=".png"], .entry-content a[href*=".gif"]').magnificPopup({
		//delegate: 'a',
		type: 'image',
		tLoading: 'Загрузка изображения #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			tCounter: '', //'<span class="mfp-counter">%curr% из %total%</span>',
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});*/
})





$(document).ready(function(){


	$(window).on('resize', function(){
		//$('.header-bottom-nav .wrapper').append($('.header-bottom-nav-list'))
		changeProductCategoryBlocks()
		$('.header-right').insertAfter( $('.header-middle .header-skype-wrp') )
		changeElementSizes($('.single-product-listing'), 0);
		changeElementSizes($('.delivers-list-wrp .block'), 0);

		$('.hp-about .products-number').insertAfter($('.hp-about .years-working'))
		$('.footer-right').insertAfter($('.footer-menu'))
		$('.footer-bottom>.wrapper>.clear').remove()


		// 320
		$('.contacts-help-block').prepend($('.contacts-help-block .popup-link'))
		$('.site-header .wrapper .right').append($('.header-nav'))
		$('.header-nav i.fa').remove()
		$('.footer-bottom i.fa-bars').remove()
		$('.footer-fixed-menu').remove()

		destroySertificatsSlider();
		destroyUsefulInfoSlider();
		destroySeeMoreSlider();
		destroyProductTables();



		if($('.wrapper').width() < 750){
			$('.hp-about ul').prepend($('.hp-about .products-number'))

			$('.footer-right').insertAfter($('.footer-about'))

			$('<div class="clear"></div>').insertAfter($('.footer-right'))

			$('.product-category-block').css('height', 'auto')

			changeElementSizes($('.single-product-listing'), 'auto');
			changeElementSizes($('.delivers-list-wrp .block'), 'auto');
		}

		if($('.wrapper').width() < 580){
			$('.contacts-help-block').append($('.contacts-help-block .popup-link'))

			createSertificatsSlider();
			createUsefulInfoSlider();
			createSeeMoreSlider();
			changeProductTables();

			createDoneProjectsMobile();

			$('.site-header .wrapper').append($('.header-nav'))
			$('.header-nav').append('<i class="fa fa-bars"></i>')

			// create footer fixed menu
			//$('.footer-bottom').append($('<i class="fa fa-bars"></i>'))
			//$('body').append($('<div class="footer-fixed-menu"></div>'))
			//$('.footer-fixed-menu').append($('.footer-menu ul').clone()).append($('.footer-catalog ul').clone())
		}
	});

	$(window).trigger('resize')
	$(window).on('load', function(){
		$(window).trigger('resize')
	})

})







function changeProductCategoryBlocks(){
	if($('.product-category-block').size() > 0){
		for(var i = 0; i < $('.product-category-block').size(); i+=2){
			var h1 = $('.product-category-block:eq('+i+')').outerHeight();
			var h2 = $('.product-category-block:eq('+(i+1)+')').outerHeight();
			if (h1 > h2) {
				$('.product-category-block:eq('+(i+1)+')').css('height', h1)
			}else{
				$('.product-category-block:eq('+i+')').css('height', h2)
			}
		}

	}
}

function changeElementSizes(elems, height){
	if(height == 'auto'){
		elems.css('height', 'auto')
	}else{
		var h = 0;
		elems.each(function(){
			if($(this).outerHeight() > h){
				h = $(this).outerHeight()
			}
		})

		elems.css('height', h)
	}
}



var sertificatsSlider;
var usefulInfoSlider;
var seeMoreSlider;

function createSertificatsSlider(){

	if(sertificatsSlider != null && sertificatsSlider.lightSlider){ sertificatsSlider.destroy(); }

	if($('.sertificats-wrp .sertificats').size() > 0){
		sertificatsSlider = $('.sertificats-wrp .sertificats').lightSlider({
	    loop:true,
	    enableDrag: true,
	    enableTouch: true,
	    controls: false,
	    slideMargin: 0,
	    pager: true,
	    adaptiveHeight: false,
	    item: 1,
	    slideMove: 1,
	    mode: 'fade',
	    speed: 500
	  });	
	}
}

function createUsefulInfoSlider(){

	if(usefulInfoSlider != null && usefulInfoSlider.lightSlider){ usefulInfoSlider.destroy(); }

	if($('.useful-info .three-post-wrp').size() > 0){
		usefulInfoSlider = $('.useful-info .three-post-wrp').lightSlider({
	    loop:true,
	    enableDrag: true,
	    enableTouch: true,
	    controls: false,
	    slideMargin: 0,
	    pager: true,
	    adaptiveHeight: true,
	    item: 1,
	    slideMove: 1,
	    mode: 'slide',
	    speed: 500
	  });	
	}

}

function createSeeMoreSlider(){

	if(seeMoreSlider != null && seeMoreSlider.lightSlider){ seeMoreSlider.destroy(); }

	if($('.recent-products .products-listing').size() > 0){
		seeMoreSlider = $('.recent-products .products-listing').lightSlider({
	    loop:true,
	    enableDrag: true,
	    enableTouch: true,
	    controls: false,
	    slideMargin: 0,
	    pager: true,
	    adaptiveHeight: true,
	    item: 1,
	    slideMove: 1,
	    mode: 'slide',
	    speed: 500
	  });	
	}

}


function destroySertificatsSlider(){
	if(sertificatsSlider != null && sertificatsSlider.lightSlider){ sertificatsSlider.destroy(); }
}

function destroyUsefulInfoSlider(){
	if(usefulInfoSlider != null && usefulInfoSlider.lightSlider){ usefulInfoSlider.destroy(); }
}

function destroySeeMoreSlider(){
	if(seeMoreSlider != null && seeMoreSlider.lightSlider){ seeMoreSlider.destroy(); }
}


function changeProductTables(){
	$('.product-table tbody tr').each(function(){
		var tableMobile = $('<div class="product-table-mobile"></div>')

		var title = $(this).find('td:first-child').text()
		tableMobile.append('<header>'+title+' <i class="fa fa-caret-down"></i></header>')

		var tableMobileCont = $('<div class="cont"></div>')
		tableMobile.append(tableMobileCont)

		var str = '<table><tbody>';
		$(this).find('td:not(:first):not(:last)').each(function(index, elem){
			var t = $(this).parents('table').find('thead td:eq('+(index+1)+')')
			str += '<tr><td>'+t.text()+'</td><td>'+$(elem).text()+'</td></tr>'
		})
		str += '</tbody></table>'

		tableMobileCont.append(str)	
		tableMobileCont.append($(this).find('td:last-child').html())	

		$('.product-table').append(tableMobile)
	})
}
function destroyProductTables(){
	$('.product-table-mobile').remove()
}


function createDoneProjectsMobile(){
	destroyDoneProjectsMobile()

	$('.done-projects-slider .slide').each(function(index, elem){
		var button = $('<div class="project-open-btn-mobile"></div>')
		button.insertBefore($(elem))
		var link = $('.done-projects-menu li:eq('+index+')').html()
		button.append(link).find('a').append($('<i class="fa fa-caret-down"></i>'))

		if(index == 0){
			button.addClass('active')
			button.next().addClass('active')
		}
	})

}
function destroyDoneProjectsMobile(){
	$('.project-open-btn-mobile').remove()
	if($('.done-projects-slider').size() > 0 && hpProjectsSlider != null ){ hpProjectsSlider.destroySlider(); }
}



function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires +"; path=/";
}

function checkCookie(name) {
    var cock = getCookie(name);
    if (cock != "") {
        return true;
    } else {
       return false;
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}


function deleteCookie(name) {
  setCookie(name, "", {
    expires: -1
  })
}