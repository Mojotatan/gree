<?php
	global $wp_query;
	if($wp_query->post_count == 1){
		the_post();
		echo '<script>window.location.replace("'.get_the_permalink().'");</script>';
	}
?>
<?php get_header(); ?>
<div class="clearfix"></div>
<div class="container">
	<div class="row">
		<div class="indoor-listing indoor-prodcut-<?php echo $wp_query->post_count; ?>">
			<h2><?php echo single_cat_title() ?></h2>
			<?php the_archive_description(); ?>
		</div>
	</div>
</div>
<section class="indoor-section">
	<div class="row">
		<?php
			$ages = get_terms( 'product_category', array(
				'hide_empty' => 0,
				'parent' => get_queried_object_id(),
			));
			if(count($ages) > 0){
				$i=0;
				foreach($ages AS $key => $cat){
					if($i > 0){
					?>
					<div class="col-md-12 col-sm-12 col-12">
					<ul class="box-spe" style="padding: 37px 0 0 0"><li style="display:block"><hr style="opacity:1"></li></ul>
					</div>
					<?php } ?>
					<div class="col-md-12 col-sm-12 col-12">
						<h2><?php echo $cat->name; ?></h2>
					</div>
					<?php
						$posts_array = get_posts(
                        array('posts_per_page' => -1,
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'product_category',
                                'field' => 'term_id',
                                'terms' => $cat->term_id,
                                )
                            )
                        )
                    );

					foreach($posts_array AS $key2 => $val){ ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="indoor-product">
								<h3><?php echo $val->post_title; ?></h3>
								<div class="indoor-prod-section">
									<div class="product-list">
									<?php
										/* grab the url for the full size featured image */
										$featured_img_url = get_the_post_thumbnail_url($val->ID,'full');
									?>
									<img src="<?php  echo $featured_img_url; ?>" alt=""/>
									</div>
								</div>
								<a href="<?php the_permalink($val->ID) ?>">Learn More</a>
							</div>
						</div>
					<?php }
					$i++;
				}
			} else {
				global $wp_query;

				if($wp_query->post_count == 2){
					?>
					<!-- <div class="col-md-3 col-sm-6 col-12">
						&nbsp;
					</div> -->
					<?php
				}

				if($wp_query->post_count == 1){
					?>
					<!-- <div class="col-md-3 col-sm-6 col-12" style="margin-right:12.5%;">
						&nbsp;
					</div> -->
					<?php
				}
			?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="indoor-product">
						<h3><?php the_title() ?></h3>
						<div class="indoor-prod-section">
							<div class="product-list">
								<?php
									/* grab the url for the full size featured image */
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
								?>
								<img src="<?php  echo $featured_img_url; ?>" alt=""/>
							</div>
						</div>
						<a href="<?php the_permalink() ?>">Learn More</a>
					</div>
				</div>
			<?php endwhile ?>
		<?php } ?>
	</div>
</section>



<div class="clearfix"></div>
<div class="container">
	<div class="row">
			<div class="releted-item">
				<ul class="box-spe">
					<li style="display:block;">
						<hr>
					</li>
				</ul>
				<h2>Related Items</h2>
				<p>See other products that work with this system.</p>
				<ul>
					<?php $cID	= get_term_by('id', get_queried_object_id(), 'product_category'); ?>
					<?php
						if( have_rows('related_items', $cID) ):
						while( have_rows('related_items', $cID) ): the_row();
							$cat = get_sub_field('category', $cID);
					?>
						<li>
							<a href="<?php echo get_term_link($cat); ?>">
								<img src="<?php the_field('icon',$cat); ?>" alt="<?php echo $cat->name; ?>"/>
								<span><?php echo $cat->name; ?></span>
							</a>
						</li>
					<?php
						endwhile;
						endif;
					?>
				</ul>
			</div>
	</div>
</div>
<?php get_footer() ?>
