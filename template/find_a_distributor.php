<?php
/*
Template Name: Find a distributor Page
*/
get_header();
?>
<div class="container">
  <div class="row">
    <div class="herobanner-contact">
      <h2>FIND A<br />DISTRIBUTOR</h2>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<section class="distributor">
  <div class="col-md-12">
    <div class="select-state">
      <label>Search by State</label>
      <select id="destributor" name ="destributor">
        <option value="">Select State</option>
        <?php
            if( have_rows('distributor') ):
            while( have_rows('distributor') ): the_row();
        ?>
            <option value="<?php echo strtolower(str_replace(' ','_',get_sub_field('title'))); ?>"><?php echo get_sub_field('title'); ?></option>
        <?php
            endwhile;
            endif;
          ?>
      </select>
      <button onclick="searchDestributors('');"><?php echo get_field('find_a_distributor_button_name'); ?></button>
    </div>
  </div>
	<?php
			if( have_rows('distributor') ):
			while( have_rows('distributor') ): the_row();
  ?>
  <span class="distributor-list-anchor" id="<?php echo strtolower(str_replace(' ','_',get_sub_field('title'))); ?>"></span> <!-- Added this line to fix issue of anchor ending up covered by fixed header -->
	<!-- <div class="row namedist" id="<?php //echo strtolower(str_replace(' ','_',get_sub_field('title'))); ?>"> -->
	<div class="row namedist">
    <div class="col-md-5 col-12 col-sm-6">
      <h2><?php echo get_sub_field('title'); ?></h2>
    </div>
    <div class="col-md-7 col-12 col-sm-6">
		 <?php
		 		if( have_rows('description') ):
          $i = 0;
		 		while( have_rows('description') ): the_row();
				 ?>
            <?php if(get_sub_field('phone_number') == '') {
              ?>
              <div class="lova-padding">
                <p><?php echo get_sub_field('name'); ?></p>
                <p><?php echo get_sub_field('address'); ?></p>
              </div>
              <?php
            } else {
              ?>
              <div class="row bluebdr">
                <div class="col-md-6">
                  <strong><?php echo get_sub_field('name'); ?></strong>
   								<p><?php echo get_sub_field('address'); ?></p>
                 </div>
                 <div class="col-md-6"> <strong class="hidden-xs">&nbsp;</strong>
   								<p>P:<?php echo get_sub_field('phone_number'); ?></br>
   								E: <?php echo get_sub_field('email'); ?></p>
                 </div>
               </div>
              <?php
            }

              $i++;
				 		endwhile;
				 		endif;
				 	?>
        </div>
      </div>
	<?php
			endwhile;
			endif;
		?>
  </section>
  <div class="clearfix"></div>
<?php get_footer() ?>
