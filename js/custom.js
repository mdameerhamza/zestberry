$(".slick-slider").slick({
    slidesToShow: 1,
    infinite:false,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    arrows:false,
    dots:true,
   });
   $(".products-slider").slick({
    slidesToShow: 3,
    infinite:false,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    arrows:false,
    dots:false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows:true,
        }
      },
      {
        breakpoint: 560,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:true,
        }
      },
    ]
   });
   $(".reviews-slider").slick({
    slidesToShow: 2.3,
    infinite:false,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    arrows:false,
    dots:false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
        }
      },
      {
        breakpoint: 560,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        }
      },
    ]
   });

  //WOW.JS Initializing
  new WOW().init();

  //Tabbing
  $('.tabset a').click(function(e){
    e.preventDefault();
    $('.tabset li').removeClass('active');
    $(this).closest('li').addClass('active');
    $('.tab').removeClass('active');
    var currentTab = $(this).attr('href');
    $(currentTab).addClass('active');
  });

  $('.list-view').click(function(){
    $('.blogs-list').removeClass('month-style');
    $('.blogs-list').addClass('list-style');
  });
  $('.month-view').click(function(){
    $('.blogs-list').removeClass('list-style');
    $('.blogs-list').addClass('month-style');
  });

  $('.search-opener').click(function(e){
	  e.preventDefault();
    $('#searchform').toggleClass('active');
  });

  $(document).ready(function(){
    $('.quantity').append('<div class="increase">+</div><div class="decrease">-</div>');

    $('.quantity').on('click', '.increase', function() {
        var input = $(this).siblings('input[type="number"]');
        var currentValue = parseInt(input.val());
        input.val(currentValue + 1);
    });

    $('.quantity').on('click', '.decrease', function() {
        var input = $(this).siblings('input[type="number"]');
        var currentValue = parseInt(input.val());
        if(currentValue > 0) {
            input.val(currentValue - 1);
        }
    });
    $('.related.products ul.products li, body.archive ul.products li').each(function(){
      $(this).find('img').wrapAll("<div class='img-holder'></div>");
    })
    $('.summary.entry-summary, .woocommerce-product-gallery, .woocommerce-tabs.wc-tabs-wrapper').wrapAll('<div class="rows_holder"></div>');
    $('.woocommerce-product-gallery.woocommerce-product-gallery--with-images:eq(1), .summary.entry-summary:eq(1)').remove();
    $('.woocommerce-message .button.wc-forward').attr('href', 'cart')



    $('.menu-opener a').click(function(e){
      e.preventDefault();
      $(this).toggleClass('active');
      $('#nav').toggleClass('active');
    });
    $("p").filter(function() {
        return $.trim($(this).text()) === '';
    }).remove();
	  
	  $('.bounce-arrow').click(function(){
		  $('html, body').animate({
			  scrollTop: $('.latest').offset().top - 130
		  }, 1000)
	  })
  });




//Circle Rotating
$(document).ready(function() {
  if ($('#circle').length) {
    const degreeToRadian = (angle) => {
      return angle * (Math.PI / 180);
    };
    
    const radius = 80;
    const diameter = radius * 2;
    
    const circle = document.querySelector("#circle");
    circle.style.width = `${diameter}px`;
    circle.style.height = `${diameter}px`;
    
    const text = circle.dataset.text;
    const characters = text.split("");
    
    const deltaAngle = 360 / characters.length;
    const characterOffsetAngle = 8;
    let currentAngle = -90;
    
    characters.forEach((character, index) => {
      const span = document.createElement("span");
      span.innerText = character;
      const xPos = radius * (1 + Math.cos(degreeToRadian(currentAngle)));
      const yPos = radius * (1 + Math.sin(degreeToRadian(currentAngle)));
    
      const transform = `translate(${xPos}px, ${yPos}px)`;
      const rotate = `rotate(${(index * deltaAngle) + characterOffsetAngle}deg)`;
      span.style.transform = `${transform} ${rotate}`;
    
      currentAngle += deltaAngle;
      circle.appendChild(span);
    });
  }
});


jQuery(document).ready(function($) {
  // Function to hide duplicate products based on title
  function hideDuplicateProducts() {
      var seen = {};
      $('.product').each(function() {
          var title = $(this).find('.woocommerce-loop-product__title').text();
          if (seen[title]) {
              $(this).hide(); // Hide duplicate product
          } else {
              seen[title] = true;
          }
      });
  }
  
  // Call the function once when the page loads
  hideDuplicateProducts();
});