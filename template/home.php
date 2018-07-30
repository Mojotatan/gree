<?php
/*
Template Name: Home Page
*/
get_header('home');
?>
<section class="top-img" style="">
  <img  src="<?php echo get_field('header_image'); ?>" class="header-image" alt="<?php echo get_field('the_world_title'); ?>"/>
  <img src="<?php echo get_field('header_image_for_mobile'); ?>" class="header-image-for-mobile" alt="<?php echo get_field('the_world_title'); ?>"/>
  <img src="<?php echo get_field('header_image_for_tablet'); ?>" class="header-image-for-tablet" alt="<?php echo get_field('the_world_title'); ?>"/>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-6">
        <div class="brand-top"> <?php echo get_field('the_world_title'); ?></div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<div class="container" id="homepage-container-1">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-6 temprature">
      <div class="extrem-img"><img src="<?php echo get_field('ultra_heat_img'); ?>" alt="<?php echo get_field('extreme_title'); ?>"/> </div>
    </div>
    <div class="col-md-6 col-sm-6 col-6 temprature">
      <div class="extrem-temprature">
        <h2><?php echo get_field('extreme_title'); ?></h2>
        <p><?php echo get_field('extreme_description'); ?></p>
        <a href="<?php echo get_field('ultra_heat_button_link'); ?>"><?php echo get_field('ultra_heat_button_name'); ?></a>
      </div>
    </div>
  </div>
</div>
<section class="sun-power">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-6">
        <div class="power-cooling-system">
          <h2><?php echo get_field('let_the_sun_title'); ?></h2>
          <p><?php echo get_field('let_the_sun_description'); ?></p>
          <a href="<?php echo get_field('gmv5_solar_button_link'); ?>"><?php echo get_field('gmv5_solar_button_name'); ?></a></div>
      </div>
      <div class="col-md-6 col-sm-6 col-6">
        <div class="solar-power"><img src="<?php echo get_field('gmv5_solar_image'); ?>" alt="<?php echo get_field('let_the_sun_title'); ?>"/> </div>
      </div>
    </div>
  </div>
</section>
<section class="container-fluid" style="background:#4a90e2;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="expert-engry">
          <h2><?php echo get_field('experts_in_energy_title'); ?> </h2>
          <p><?php echo get_field('experts_in_energy_description'); ?></p>
          <ul>
            <?php
            		if( have_rows('experts') ):
            		while( have_rows('experts') ): the_row();
            ?>
            			<?php echo get_sub_field('title'); ?>
                  <li><img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('experts'); ?>"/></li>
            <?php
            		endwhile;
            		endif;
            	?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section style="background:#fff;">
  <div class="container" id="product-type-container">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="product-tyope">
          <h2><?php echo get_field('product_types_title'); ?></h2>
          <?php
            if ( have_rows('product') ):
          ?>
            <ul class="align-items-start justify-content-around">
              <?php
                while( have_rows('product') ): the_row();
              ?>
                <li class="col-sm-2 col-5 my-sm-0 my-md-3">
                  <a href="<?php echo get_sub_field('image_link'); ?>">
                  <?php $product_name = strtolower(preg_replace('/\s+/', '', get_sub_field('title'))); ?>
                    <div class="home-product-type-big-icon" id="<?php echo $product_name; ?>"></div>
                    <div class="home-product-type-span">
                    <span><?php echo get_sub_field('title'); ?></span></div>
                  </a>
                </li>
              <?php
                endwhile;
              ?>
            </ul>
          <?php
            endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="case-study">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="gree-bring">
          <h2><?php echo get_field('gree_brings_title'); ?></h2>
            <a href="<?php echo get_field('learn_about_button_link'); ?>"><?php echo get_field('learn_about_button_name'); ?></a> </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<?php if (
    ($emailImg = get_field('email_img', 'options'))
    && ($emailLink = get_field('email_link', 'options'))
    && ($phoneImg = get_field('phone_img', 'options'))
    && ($phoneLink = get_field('phone_link', 'options'))
): ?>
    <section class="container-fluid find-bg" id="contact-us-box-homepage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-us-box">
                        <h2><?= get_field('contact_title') ?></h2>
                        <p><?= get_field('contact_description') ?></p>
                        <div class="options">
                            <a href="<?= esc_attr($emailLink) ?>" style="background-image: url(<?= esc_attr($emailImg) ?>)"></a>
                            <a href="<?= esc_attr($phoneLink) ?>" style="background-image: url(<?= esc_attr($phoneImg) ?>)"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<div class="clearfix"></div>
<section class="container-fluid find-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="find-destributor">
          <h2><?php echo get_field('find_a_title'); ?></h2>
          <p><?php echo get_field('find_a_description'); ?></p>
          <div class="select-box">
            <select id="destributor" name ="destributor">
              <option>Select State</option>
              <?php
            			if( have_rows('distributor',45) ):
            			while( have_rows('distributor',45) ): the_row();
            	?>
                  <option value="<?php echo strtolower(str_replace(' ','_',get_sub_field('title'))); ?>"><?php echo get_sub_field('title'); ?></option>
            	<?php
            			endwhile;
            			endif;
            		?>
            </select>
          </div>
          <a href="javascript:searchDestributors('<?php echo get_field('search_dealer_button_link'); ?>');"><?php echo get_field('search_dealer_button_name'); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>
