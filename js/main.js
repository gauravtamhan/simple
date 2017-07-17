
jQuery(document).ready(function($) {

  var controller = new ScrollMagic.Controller();

  $(".button-collapse").sideNav();
  // $('.materialboxed').materialbox();


  $(function() {
    // this will get the full URL at the address bar
    var url = window.location.href;

    // passes on every "a" tag
    $("nav a").each(function() {
      // checks if its the same on the address bar
      if (url == (this.href)) {
        $(this).closest("li>a").addClass("active");
      }
    });
    $("ul.side-nav a").each(function() {
      // checks if its the same on the address bar
      if (url == (this.href)) {
        $(this).closest("li>a").addClass("active-side");
      }
    });
  });

  // :REMOVED MATERIALBOX INIT:

  // build scene
  var scene = new ScrollMagic.Scene({
    triggerElement: "#trigger",
    duration: 360,
    triggerHook: 'onEnter'
  })
  // animate color and top border in relation to scroll position
  .setTween("#animate", {opacity: 0.0, scale: 0.0}) // the tween durtion can be omitted and defaults to 1
  .setPin("#animate")
  // .addIndicators() // add indicators (requires plugin)
  .addTo(controller);


  $('div.content p').addClass('flow-text');
  $('div.content ul li').addClass('flow-text');
  $('div.content ol li').addClass('flow-text');
  $("div.wp-caption p").removeClass('flow-text');
  $('img').addClass('responsive-img');

  // Put "Leave a Reply" section into row-col divs
  var elements = $('div#respond').children();
  elements.detach();
  $('div#respond').prepend('<div class="row no-row-spacing"><div class="col m10 offset-m1">');
  $('div#respond>div>div').append(elements[0]);
  $('div#respond').append('<div class="row"><div class="col s12 m10 offset-m1">');
  $('div#respond div:nth-child(2)>div').append(elements[1]);

  // Post Comment button
  $('form p.form-submit').addClass('links');
  $('form p.form-submit #submit').addClass('waves-effect waves-teal btn-flat')
});



