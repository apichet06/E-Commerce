<!-- Plugins-->
<script src="plugins/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="plugins/bootstrap4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-notify.min.js"></script>
<script src="plugins/imagesloaded.pkgd.js"></script>
<script src="plugins/masonry.pkgd.min.js"></script>
<script src="plugins/isotope.pkgd.min.js"></script>
<script src="plugins/jquery.matchHeight-min.js"></script>
<script src="plugins/slick/slick/slick.min.js"></script>
<script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="plugins/slick-animation.min.js"></script>
<script src="plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="plugins/jquery.slimscroll.min.js"></script>
<script src="plugins/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/gmap3.min.js"></script> 
<!-- Custom scripts-->
<script src="js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
<!-- แปลภาษา-->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
    //   function googleTranslateElementInit() {
    //       new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    // }
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
    function triggerHtmlEvent(element, eventName) {
          var event;
          if (document.createEvent) {
              event = document.createEvent('HTMLEvents');
              event.initEvent(eventName, true, true);
              element.dispatchEvent(event);
        } else {
              event = document.createEventObject();
              event.eventType = eventName;
              element.fireEvent('on' + event.eventType, event);
        }
  }

  jQuery('.lang-select').click(function() {
    var theLang = jQuery(this).attr('data-lang');
    jQuery('.goog-te-combo').val(theLang);

    window.location = jQuery(this).attr('href');
    location.reload();
});
</script>