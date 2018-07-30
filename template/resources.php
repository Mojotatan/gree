<?php
/*
Template Name: Resources Page
*/
get_header();
?>
<div class="container">
<div class="row">
<div class="herobanner-contact">
<h2><?php the_title(); ?></h2>
<p><?php echo get_field('header_title'); ?></p>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="resourace-section">
<div class="row">
<?php
  $categories = get_categories( array(
    'taxonomy'	=> 'resource_category',
    'parent' => 0,
  "hide_empty" => 0
  ));

  $i=0;
  foreach( $categories as $category ) {
    ?>
	<div class="col-md-6 col-sm-6 col-12">
<div class="source-box">

			<h2><?php echo $category->name; ?></h2>
      <img src="<?php echo get_field('icon',$category); ?>" alt="<?php echo $category->name; ?>"/>
	     <a href="<?php echo  get_category_link( $category->term_id  ); ?>">Learn More</a>
</div></div>
      <?php
  }
?>
</div></div>

<?php get_footer() ?>
