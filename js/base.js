//Version 3.5
jQuery(document).ready(function($) {

  //Specifically for the Global Alert Banner
  $('.close-alert-banner').on( 'click', function () {
    $(this).parent().slideUp();
    
    var alert_id = $(this).parent().attr('data-alertid');
    Cookies.set( 'bs-alert-' + alert_id, 'hidden', { expires: 7 });
    return false;
  });

  //Scroll Anchor links
  // use .scroll in the body generically
  // use .has-scroll added to nav <li> to target child <a>
  $(".scroll, .has-scroll a").click(function(event) {
    event.preventDefault();
    var full_url = this.href,
      parts = full_url.split('#'),
      trgt = parts[1],
      target_offset = $('#'+trgt).offset(),
      target_top = target_offset.top;
    $('html, body').animate({scrollTop:target_top}, 500);
  });

  //Main Menu
  $('header .menu-item-has-children > a').click(function(event){
    event.preventDefault();
    
    // DESKTOP
    if($(window).width() >= 992) {
      $(this).parent().find('.sub-menu').addClass('submenu-open', 550);
      $(this).parent().siblings().find('.sub-menu').removeClass('submenu-open', 300);
    } 
    // MOBILE
    else {
      // $(this).parent().find('.sub-menu').toggleClass('submenu-open', 300);
      $(this).parent().find('.sub-menu').slideToggle();
    }
  });
  $(document).mouseup(function(e){
    var container = $('header .menu-item-has-children');
    if($(window).width() >= 992) {
      if (!container.is(e.target)
        && container.has(e.target).length === 0){
          $(container).find('.sub-menu').removeClass('submenu-open', 300);
      }
    }
  });

  // Mobile Menu Handling
  $('.navbar-toggle').on('click', function () {
    if ( $(this).hasClass('open') ) {
      $(this).removeClass('open');
    }
    else {
      $(this).addClass('open');
    }
    //show the nav
    if ( $('.public-navbar-main').hasClass('open') ) {
      $('.public-navbar-main').removeClass('open');
    }
    else {
      $('.public-navbar-main').addClass('open');
    }
    // Prevent back page scroll
    if ( $('html').hasClass('nav-open') ) {
      $('html').removeClass('nav-open');
    }
    else {
      $('html').addClass('nav-open');
    }		
  });


  //Comments section
  $('.comments-head').click(function(){
    $('.comment-contain').slideToggle();
    $('.comments-area').toggleClass('open');
  });


  //Any modals, sliders, etc.

  // Default
  $('.button-modal').click(function() {
    $( $(this).data('target') ).fadeIn(300);
  });

  //Close
  $('.close-button').click(function() {
    $(this).closest('.modal-wrapper').fadeOut(300);
  });
  $('.close-target').click(function() {
    $(this).closest('.modal-wrapper').fadeOut(300);
  });


  //Older:
  $('.close').click(function(){
    $(this).parent().slideUp();
  });
  $('.modal-close').click(function(){
    $(this).parent().parent().fadeOut();
  });
  $('.modal-button').click(function(){
    $('.modal-block').fadeIn();
  });


  //Move the Main Site Navigation as the page moves
  var navbar = $(".public-navbar-main"),
    header = $(".public-header"),
    prevScrollTop = 0,
    $window = $(window),
    showOffset = 100;
    fixedOffsetDown = 700;
    fixedOffsetUp = 200
      
  $window.scroll(function() {
    // Down
    if (prevScrollTop < $window.scrollTop()) {
      if ($window.scrollTop() > showOffset) {
        navbar.addClass('hidenav');
      }
      if ($window.scrollTop() > fixedOffsetDown) {
        header.removeClass('header-top');
        navbar.removeClass('nav-top');
      }
    }
    //Up
    else {
      header.removeClass('hidenav');
      
      if ($window.scrollTop() < showOffset) {
        navbar.addClass('hidenav');
      } else {
        navbar.removeClass('hidenav');
      }
      if ($window.scrollTop() < fixedOffsetUp) {
        header.addClass('header-top');
        navbar.addClass('nav-top');
      }
    };
    // At top of page
    if ($window.scrollTop() < showOffset) {
      if (navbar.hasClass('hidenav')) {
        navbar.removeClass('hidenav');
      }
    };
    prevScrollTop = $window.scrollTop();
  });
  //Show menu when footer is in view
  var bottomHit = $('.site-footer').waypoint({
    handler: function(direction){
      if ((direction === 'down')) {
        navbar.addClass('supernav');
      }
      else if ((direction === 'up')) {
        navbar.removeClass('supernav');
      }
    },
    offset: '100%',
  });


  //Blog search show/hide
  $(document).on('click', '.search-toggle', function() {
    $('.searchform').removeClass('hidden');
  });

  $(document).on('click', '.search-close', function() {
    $('.searchform').addClass('hidden');
  });


  //Contain social sharing buttons once bottom is scrolled to
  var bottomHitSocial = $('.comments-area').waypoint({
    handler: function(direction) {
      if (($(window).width() > 768)) {
        if ((direction === 'down')) {
          $('.social-share').removeClass('sticky-share');
          $('.social-share').addClass('sticky-share-bottom');
        }
        else if ((direction === 'up')) {
          $('.social-share').removeClass('sticky-share-bottom');
          $('.social-share').addClass('sticky-share');
        }
      }
    },
    offset: 550,
  });

  
  //Stick social sharing button positions on scroll
  var authorGone = $('.social-share').waypoint({
    handler: function(direction) {
      if (($(window).width() > 768)) {
        if ((direction === 'down')) {
          $('.social-share').addClass('sticky-share');
        }
        else if ((direction === 'up')) {
          $('.social-share').removeClass('sticky-share');
        }
      }
    },
    offset: 85,
  });


  // Expandables
  $('.expand-trigger').click(function() {
      $(this).closest('.expandable').find('.expand-content').slideToggle();
  });
  $('.collapse-trigger').click(function() {
      $(this).closest('.expand-content').slideUp();
  });


});