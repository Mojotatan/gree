<?php get_header() ?>

	<div id="content">

		<?php the_post(); ?>
		<div id="post-<?php the_ID() ?>" class="post">
			<h1 class="post-title"><?php the_title() ?></h1>
			<div class="post-meta">Posted on <?php the_time('F j, Y'); ?> in: <?php the_category(', '); ?><span class="sep">|</span><a href="#comments">Jump To Comments</a></div>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div><!-- .post -->

		<?php comments_template(); ?>

	</div><!-- #content -->

<?php get_footer() ?>
