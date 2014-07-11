jQuery(document).ready(function(){
    
    jQuery(window).load(function() {
      jQuery('.flexslider').flexslider();
      jQuery(".video-embed").fitVids();
    });

    jQuery('.search-form').popover({
      container: 'body',
      placement: 'bottom',
      html: 'true',
      template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',
      content: '<form role="search" method="get" class="search-form form-inline" action="/"><div class="input-group"><label for="s" class="sr-only"><span>Search for:</span></label><input type="search" class="search-field form-control" placeholder="search for..." value="" name="s" /><span class="input-group-btn"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button></span></div></form>'
    });

    
var container = document.querySelector('.js-masonry');

imagesLoaded( container, function() {
  msnry = new Masonry( container, {
    columnWidth: 360,
    itemSelector: '.profiles'
  });
});


});


