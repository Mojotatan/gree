<?php
/*
Template Name: Contact Page
*/
get_header();
the_post();
?>
	<div class="container">
		<div class="row">
			<div class="herobanner-contact">
				<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
			</div>
		</div>
	</div>
 <div class="clearfix"></div>
 <div class="contact-section">
			<?php
						if( have_rows('social') ):
						while( have_rows('social') ): the_row();
				?>
							<div class="section1">
								<div class="icon-img"><img src="<?php echo get_sub_field('image'); ?>" alt="<?php the_content(); ?>"/></div>
								<div class="section1-left">
										<h2><?php echo get_sub_field('title'); ?></h2>
										<?php if( get_sub_field('contact_type') == 'phone'): 
											$phone_number = '+1' . preg_replace("/[^0-9]/", "", get_sub_field('description')); ?>
											<a href="tel:<?php echo $phone_number; ?>"><?php echo get_sub_field('description'); ?></a>
										<?php elseif ( get_sub_field('contact_type') == 'email'): 
											$email_address = get_sub_field('description'); ?>
											<a href="mailto:<?php echo $email_address; ?>"><?php echo get_sub_field('description'); ?></a>
										<?php elseif ( get_sub_field('contact_type') == 'address'): 
											$street_address = get_sub_field('description'); ?>
											<span id="contact-page-address"><?php echo get_sub_field('description'); ?></span>
										<?php endif; ?>
								</div>
							</div>
							 <?php
							 		endwhile;
							 		endif;
							 	?>

</div>
<div class="contact-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2971.832401511699!2d-87.649079!3d41.8534341!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2c5797f72869%3A0x45f7739e1e3c3918!2s930+W+21st+St%2C+Chicago%2C+IL+60608%2C+USA!5e0!3m2!1sen!2sin!4v1528520338472" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="clearfix"></div>
<?php get_footer() ?>
