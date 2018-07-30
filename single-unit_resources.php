<?php get_header() ?>

	<div id="content">
		<?php echo get_field('download_title'); ?>

	<?php echo get_field('download'); ?>


	<?php
			if( have_rows('download_pdf') ):
			while( have_rows('download_pdf') ): the_row();
	?>

				<?php echo get_sub_field('title'); ?>

		     <a href="<?php echo get_field('download_button_link'); ?>" download target="_blank"><?php echo get_field('download_button_name'); ?></a>

	<?php
			endwhile;
			endif;
		?>





	</div>

<?php get_footer() ?>
