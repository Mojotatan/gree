<?php
/*
Template Name: Product Page
*/
get_header();
?>
<div class="clearfix"></div>
<div class="product-icon">
<div class="container">
	<div class="row">
		<?php
		$categories = get_categories( array(
			'taxonomy'	=> 'product_category',
			'parent' => 0
		));

		$i=0;
		foreach( $categories as $category ) {
			?>
			<div class="col-2 no-gutters"><a href="<?php echo  get_category_link( $category->term_id  ); ?>"><img class="header-nav-product-icon-img" src="<?php echo get_field('dark_icon',$category); ?>" alt=""/>
			<span class="spandex"><?php echo $category->name; ?></span></a></div>
				<?php
		}
		?>
	</div>
</div>
</div>
<div class="banner-slider">
<div id="owl-demo4" class="fadeOut owl-carousel">
        <div class="item">
  			<h3><?php the_field('product_home_title'); ?></h3>
        <p><?php the_field('product_home_subtitle'); ?></p>
        </div>

   </div>

</div>

<section class="product-section">
<h1><?php the_title(); ?></h1>
<?php
$categories = get_categories( array(
  'taxonomy'	=> 'product_category',
  'parent' => 0
));

$i=0;
foreach( $categories as $category ) {
  if($i>0){
    ?>
    <div class="clearfix"></div>
  	<hr>
    <?php
  }
	if($i%2 == 0){
	?>
	<div class="row">
	<div class="col-md-6 col-6">
	<div class="heat-section">
	<h2><?php echo $category->name; ?></h2>
	<p><?php echo $category->description; ?></p>
	<a href="<?php echo  get_category_link( $category->term_id  ); ?>" class="<?php echo get_field('button_class',$category); ?>"></a>
	</div>
	</div>
	<div class="col-md-6 col-6">
	<div class="product1"><img src="<?php echo get_field('image',$category); ?>"/></div>
	</div>
	</div>
	<?php
} else{
	?>
	<div class="row">
	<div class="col-md-6 col-6">
	<div class="product2"><img src="<?php echo get_field('image',$category); ?>"/></div>
	</div>
	<div class="col-md-6 col-6">
	<div class="heat-section2">
	<h2><?php echo $category->name; ?></h2>
	<p><?php echo $category->description; ?>	</p>
	<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?> " class="<?php echo get_field('button_class',$category); ?>"></a></div>
	</div>
	</div>
	<?php
}

$i++;

}
	 ?>
</section>
<?php get_footer() ?>
