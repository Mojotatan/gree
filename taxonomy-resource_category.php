<?php get_header(); ?>
<div class="clearfix"></div>
<div class="container">
	<div class="row">
		<div class="indoorunits">
			<h2><?php echo single_cat_title() ?> <br>Resources</h2>
			<?php the_archive_description(); ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="accordian-section">
	<h1>DOWNLOADS</h1>
		<?php
			global $wp_query;
			if($wp_query->post_count == 1){
				?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php
					if( have_rows('download') ):
					while( have_rows('download') ): the_row();
				?>
					<div class="submenu-single">
						<div class="download-pdf">
							<ul>
								<?php
										if( have_rows('description') ):
										while( have_rows('description') ): the_row();
								?>
										<li class="col col-sm-5 justify-content-center d-inline-flex flex-wrap my-3">
											<h2><?php echo get_sub_field('sub_title'); ?></h2>
											<a href="<?php echo get_sub_field('download_button_file'); ?>" download><?php echo get_sub_field('download_button_name'); ?></a>
										</li>
								<?php
									endwhile;
									endif;
								?>
							</ul>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
				<?php endwhile; ?>
				<?php
			}else{
		?>
		<ul id="accordion" class="accordion">
		<?php while ( have_posts() ) : the_post(); ?>
			<li>
				<div class="link"><?php the_title() ?></div>
				<?php
					if( have_rows('download') ):
					while( have_rows('download') ): the_row();
				?>
					<div class="submenu">
						<div class="download-pdf">
							<ul>
								<?php
										if( have_rows('description') ):
										while( have_rows('description') ): the_row();
								?>
										<li class="col col-sm-5 justify-content-center d-inline-flex flex-wrap my-3">
											<h2><?php echo get_sub_field('sub_title'); ?></h2>
											<a href="<?php echo get_sub_field('download_button_file'); ?>" download><?php echo get_sub_field('download_button_name'); ?></a>
										</li>
								<?php
									endwhile;
									endif;
								?>
							</ul>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php } ?>

</div>
<?php get_footer() ?>
