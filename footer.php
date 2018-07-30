</section>
<div class="clearfix"></div>
<section class="container-fluid" style="background:#00285f;">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-6 col-sm-6 ftr-logo">
        <div class="f-logo"><a href="<?php echo get_settings('home'); ?>"><img src="<?php echo get_field('footer_logo','option'); ?>" alt=" <?php the_title(); ?>"/></a> </div>
      </div>
      <div class="col-md-8 col-6 col-sm-6">
        <div class="f-link">
					<ul>
            <li><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'rd-navbar-nav' , 'container'=> '') ); ?></li>
          	<li><?php echo get_field('address','option'); ?></li>
				</ul>
        </div>
      </div>
      <div class="col-md-2 col-12 col-sm-12">
        <div class="social-media">
					<ul>
						<li><a href="<?php echo get_field('facebook_link','option'); ?>" target="_blank"><img src="<?php echo get_field('facebook_img','option'); ?>" alt="<?php echo get_field('facebook_link','option'); ?>" /></a></li>
            <li><a href="<?php echo get_field('phone_link','option'); ?>"><img src="<?php echo get_field('phone_img','option'); ?>" alt="<?php echo get_field('phone_link','option'); ?>" /></a></li>
            <li><a href="mailto: sales@usgree.com"><img src="<?php echo get_field('email_img','option'); ?>" alt="sales@usgree.com" /></a></li>
					</ul>
      </div>
      </div>
    </div>
  </div>
</section>
<?php wp_footer() ?>
<script>
var $ = jQuery.noConflict();
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/core.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js" type="text/javascript"></script>
<script type= "text/javascript" src = "<?php bloginfo('template_url'); ?>/js/countries.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-validation/dist/jquery.validate.min.js"></script>

<script language="javascript">
	//populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	//populateCountries("country2");
	//populateCountries("country2");
  function searchDestributors(url){
    var divID = $('#destributor').val();
    window.location=url+"#"+divID;
  }
</script>
<script>
  $(document).ready(function() {

    $("#owl-demo4").owlCarousel({
      items : 1,
      lazyLoad : true,
      navigation : true,
	     autoPlay: 3000,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1]
    });
    $(".owl-carousel").owlCarousel();
    $('#myModal1').on('shown.bs.modal', function (e) {
      $('.popup-function1 .row h1').html($('#capacity').val()+' '+$('#tname').val());
      $('#pname').val($('#capacity').val()+' '+$('#tname').val());
      $('#modalform').validate();
    });

    if($('#issubmitted').val() == 'yes')
      $('#myModal').modal('show');
  });
</script>
<script>
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}

	var accordion = new Accordion($('#accordion'), false);
});
</script>
</body>
</html>
