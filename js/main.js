
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

  // Prevents the screen from scrolling to top when archive or category is clicked in top nav on iPad
  $('a#category').click(function(e){
    e.preventDefault();
  });
  $('a#archive').click(function(e){
    e.preventDefault();
  });

  // Adds icon to comments written by post author
  $('.bypostauthor p.name').append('<span><i class="material-icons">perm_identity</i></span>');

  // For content pagination, aligns the next page arrow to the right hand side of the screen
  $('.content-pagination i').each(function() {
    if ('arrow_forward' == this.innerText) {
      $(this).parent().parent().addClass('fl-right');
    }
  });

  // Adds extra padding if content contains a list to make room for number/bullets
  $(function() {
    if (($('#blog-post-content ol').length > 0) || ($('#blog-post-content ul').length > 0)) {
      $('#blog-post-content').addClass("extra-padding");
    }
    if (($('#page-content ol').length > 0) || ($('#page-content ul').length > 0)) {
      $('#page-content').addClass("extra-padding");
    }
  });

  // Moves the top nav and fade div down to make room for admin bar if in edit mode
  $(function() {
    var inEditMode = $('body.admin-bar').length > 0;
    if (inEditMode) {
      $('nav.nav-fixed').addClass('move-nav-down');
      $('.side-nav').addClass('move-nav-down');
      $('div.fadeOut').addClass('move-fade-div-down');
    }
  });

  // Adds bubble class to chat formatted posts
  $('div.format-chat p').wrap("<div class='bubble'></div>");

  // Adds a label to sticky posts
  $('div.sticky').prepend('<div class="pinned-posts"><a class="ui teal tag label">Featured</a></div>');

  // Adds extra right margin if top nav shows pages dropdown
  if ($('#dd>li').length > 2) {
    $('#dd').addClass('big-nav');
  }

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