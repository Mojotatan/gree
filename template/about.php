<?php
/*
Template Name: About Page
*/
get_header();
?>
<div class="clearfix"></div>
<div class="gree-midwest">
<h2><?php echo get_field('why-gree-midwest_title'); ?></h2>
<p><?php echo get_field('why-gree-midwest_description'); ?>	</p>
</div>
<div class="clearfix"></div>
<div class="our-history">
<h2><?php echo get_field('our_history_title'); ?></h2>
<p><?php echo get_field('our_history_description'); ?></p>
</div>
<div class="innovation">
  <div class="Innovation-GREE">
    <h2><?php echo get_field('innovation_title'); ?></h2>
    <p><?php echo get_field('innovation_description'); ?></p>
  </div>
</div>
<div class="blue-bg">
  <ul class="col-12 col-sm-12 col-md-6 mx-auto flex-nowrap row align-items-center justify-content-center">
	<li class="col-2"><img src="/wp-content/uploads/2018/06/logo_energy_star.png" alt="Energy Star Logo"/></li>
	<li class="col-3"><img src="/wp-content/uploads/2018/06/logo_dhri.png" alt="AHRI Logo"/></li>
	<li class="col-2"><img src="/wp-content/uploads/2018/06/logo_etl.png" alt="ETL Logo"/></li>
  </ul>
</div>
<div class="solar-project">
  <div class="solar-project-section">
    <h2><?php echo get_field('solar_project_title'); ?></h2>
    <ul>
      <li><strong>Project location:</strong> Malaysia Iskandar</li>
      <li><strong>City:</strong> 1 ° N  103 ° E </li>
      <li><strong>Average peak sun hours：</strong> 4.56h</li>
      <li><strong>Total capacity:</strong> 3024kW</li>
    </ul>
  </div>
  <div class="yeh-Brothers">
    <h2><?php echo get_field('solar_project_title'); ?></h2>
  </div>
</div>
<?php get_footer() ?>
