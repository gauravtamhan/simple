
jQuery(document).ready(function($) {

  /*
   *  SCROLLMAGIC:
   *  code for title animation effect on home page
   */
  var isHomePage = document.getElementById('trigger');
  if (isHomePage) {
    var controller = new ScrollMagic.Controller();

    var scene = new ScrollMagic.Scene({
      triggerElement: "#trigger",
      duration: 360,
      triggerHook: 'onEnter'
    })
    .setTween("#animate", {opacity: 0.0, scale: 0.0})
    .setPin("#animate")
    .addTo(controller);
  }


  /*
   *  CUSTOM FUNCTION:
   *  code for active links remaining underlined on nav menus
   */
  $(function() {
    var url = window.location.href;
    $("nav a").each(function() {
      if (url == (this.href)) {
        $(this).closest("li>a").addClass("active");
      }
    });
    $("ul.side-nav a").each(function() {
      if (url == (this.href)) {
        $(this).closest("li>a").addClass("active-side");
      }
    });
  });


  /*
   *  INIT:
   *  code for initializing components from Materialize
   */
  $(".button-collapse").sideNav();

  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );


  /*
   *  THEME GENERATION:
   *  code for adding the required classes to make the theme function properly
   */
  // $('.materialboxed').materialbox();
  $("ul.side-nav a").addClass('waves-effect waves-teal');
  $('div.content p').addClass('responsive-text');
  $('div.content ul li').addClass('responsive-text');
  $('div.content ol li').addClass('responsive-text');
  $("div.wp-caption p").removeClass('responsive-text');
  $('img:not(.nav-fixed img)').addClass('responsive-img');
  $('img.avatar').addClass('circle');

  // Put "Leave a Reply" section into row-col divs
  var elements = $('div#respond').children();
  elements.detach();
  $('div#respond').prepend('<div class="row no-row-spacing"><div class="col m10 offset-m1">');
  $('div#respond>div>div').append(elements[0]);
  $('div#respond').append('<div class="row"><div class="col s12 m10 offset-m1">');
  $('div#respond div:nth-child(2)>div').append(elements[1]);

  // Post Comment button
  $('form p.form-submit').addClass('links');
  $('form p.form-submit #submit').addClass('waves-effect waves-teal btn-flat');
  // $('#comment-pagination a').addClass('center-align');

});


/*
 *  OTHER FUNCTIONS:
 *  code for opening the search modal
 */
function openModal() {
  jQuery('#search').val("");
  jQuery('.tiny.modal')
  .modal({ blurring: true })
  .modal('show');
}