<?php get_header() ?>
<?php the_post(); ?>
<?php
global  $js;
$status = '';
$pname  = '';
$js     = '';
if(!empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['zip'])){

  function tidy_input($text) {
    return (htmlspecialchars(stripslashes(trim($text))));
  }

  // Submitted form data
  $pname   = tidy_input($_POST['pname']);
  $name   = tidy_input($_POST['name']);
  $email  = tidy_input($_POST['email']);
  $zip    = tidy_input($_POST['zip']);
  $comments  = tidy_input($_POST['comments']);
  $radiog_dark    = tidy_input($_POST['radiog_dark']);

  /*
   * Send email to admin
   */
  // $to     = get_option('admin_email','tatan42@gmail.com');
//   $to = 'mmcclafferty@es99.agency';
  $to = 'sales@usgree.com';
  $subject= 'Contact Request Submitted';

  function set_email_to_html() {
    return 'text/html';
  }
  add_filter('wp_mail_content_type', 'set_email_to_html');

  $htmlContent = '
  <h4>Contact request has submitted for '.$pname.'.</h4>
  <table>
      <tr>
          <th>Name:</th><td>'.$name.'</td>
      </tr>
      <tr>
          <th>Email:</th><td>'.$email.'</td>
      </tr>
      <tr>
          <th>Zip Code:</th><td>'.$zip.'</td>
      </tr>
      <tr>
          <th>Project Type:</th><td>'.$radiog_dark.'</td>
      </tr>
      <tr>
          <th>Additional Comments:</th><td>'.$comments.'</td>
      </tr>
  </table>';


  // Additional headers
  $headers = 'From: Wordpress Gree <wp@gree.com>' . "\r\n";

  $success = wp_mail($to, $subject, $htmlContent, $headers);
  remove_filter('wp_mail_content_type', 'set_email_to_html');

  // Send email
  if($success){
      $status = 'ok';
  }else{
      $status = 'err';
  }

  echo '<input type="hidden" id="issubmitted" value="yes">';
}

$mobileAccourdian = '';
?>
<?php $productBackground = get_post() ? get_field('background') : '' ?>

<div class="container">
  <div class="row">

  </div>
</div>
<div class="clearfix"></div>


<!-- START PRODUCT AREA -->
    <div class="GMV5-CNT">

    <?php if($productBackground): ?>
    <div class="product-header row">
			<?php if(is_single('gateway-of-building-protocol' )){ ?>
				<div class="product-title col-md-12 col-12 col-sm-12">
					<div class="gateway-prdct gmv5-textbox">
					  <h2><?php the_title(); ?></h2>
					  <?php the_content(); ?>
					</div>
				  </div>
				  <div class="product-hero-image col-md-12 col-12 col-sm-12">
  					<div class="gateway-prdct-img">
  					  <h3><?php echo get_field('image_title'); ?></h3>
  					</div>
  					<div class="text-center"><img class="img-responsive main-product-img" src="<?php echo get_field('product_image'); ?>" alt="<?php echo get_field('request_button_title'); ?>"/> </div>
				  </div>
			<?php } else { ?>
        <div class="product-hero-image col-md-12 col-12 col-sm-6">
          <div class="prdct-img col-8 mx-auto"><img class="img-responsive" src="<?php echo get_field('product_image'); ?>" alt="<?php echo get_field('request_button_title'); ?>"/> </div>
        </div>
                <div class="product-title col-md-12 col-12 col-sm-6">
                <div class="gmv5-textbox col-md-6 mx-md-auto">
                  <h2><?php the_title(); ?></h2>
                  <?php the_content(); ?>
                </div>
                </div>
			<?php } ?>
        </div>
		<?php if(get_field('capacity_title')) { ?>
			<div class="col-sm-6">
            <div class="capacity-box">
              <h4><?php echo get_field('capacity_title'); ?></h4>
              <!-- Mobile Accourdian -->
              <?php
              $mobileAccourdian.= '<li>
        				<div class="link">'.get_field('capacity_title').'</div><div class="submenu">
      						<div class="download-pdf">
      							<ul>';
              ?>
              <select name="capacity" id="capacity">
                <?php
                    if( have_rows('capacity') ):
                    while( have_rows('capacity') ): the_row();
                ?>
                  <option value="<?php echo get_sub_field('dropdown'); ?>"><?php echo get_sub_field('dropdown'); ?></option>
                <?php
                  endwhile;
                  endif;
                ?>
              </select>
              <a href="<?php echo get_field('request_button_link'); ?>" data-toggle="modal" data-target="#myModal1"><?php echo get_field('request_button_title'); ?></a></div>
          </div>
          <div class="col-sm-6">
            <ul class="prd-icon">
              <?php
									if( have_rows('icon') ):
									while( have_rows('icon') ): the_row();
							?>

                  <li><img class="product-feature-icon" src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_field('image_description'); ?>"/>
                  <span class="product-feature-icon-description"><?php echo get_sub_field('image_hover_label'); ?></span> </li>

										 <?php
												endwhile;
												endif;
											?>

            </ul>
          </div>
        </div>


    <?php } else { ?>
      <!-- Byrd: To avoid 'undefined' in request a quote form -->
      <select hidden name="capacity" id="capacity"><option value=""></option></select>
      <div id="unknown-spacer" style="width:100%;height:150px"></div>
		<?php /*if(!is_single('gateway-of-building-protocol' )){ ?>
			<div class="row">
			<div class="col-md-6">
            <div class="capacity-box">
			</div>
			</div>
			</div>
			<?php }*/ ?>
    <?php } ?>

    <?php else: ?>
        <div class="product-header row">
			<?php if(is_single('gateway-of-building-protocol' )){ ?>
				<div class="product-title col-md-12 col-12 col-sm-12">
					<div class="gateway-prdct gmv5-textbox">
					  <h2><?php the_title(); ?></h2>
					  <?php the_content(); ?>
					</div>
				  </div>
				  <div class="product-hero-image col-md-12 col-12 col-sm-12">
  					<div class="gateway-prdct-img">
  					  <h3><?php echo get_field('image_title'); ?></h3>
  					</div>
  					<div class="text-center"><img class="img-responsive main-product-img" src="<?php echo get_field('product_image'); ?>" alt="<?php echo get_field('request_button_title'); ?>"/> </div>
				  </div>
			<?php } else { ?>
				  <div class="product-title col-md-6 col-12 col-sm-6">
					<div class="gmv5-textbox">
					  <h2><?php the_title(); ?></h2>
					  <?php the_content(); ?>
					</div>
				  </div>
				  <div class="product-hero-image col-md-6 col-12 col-sm-6">
					<div class="prdct-img"><img class="img-responsive" src="<?php echo get_field('product_image'); ?>" alt="<?php echo get_field('request_button_title'); ?>"/> </div>
				  </div>
			<?php } ?>
        </div>
		<?php if(get_field('capacity_title')) { ?>
        <div class="row">
          <div class="col-xs-12 offset-sm-6 col-sm-6 gmv5-capecity">
            <h2><?php echo get_field('image_title'); ?></h2>
            <p><?php echo get_field('image_description'); ?></p>
         </div>
			<div class="col-sm-6">
            <div class="capacity-box">
              <h4><?php echo get_field('capacity_title'); ?></h4>
              <!-- Mobile Accourdian -->
              <?php
              $mobileAccourdian.= '<li>
        				<div class="link">'.get_field('capacity_title').'</div><div class="submenu">
      						<div class="download-pdf">
      							<ul>';
              ?>
              <select name="capacity" id="capacity">
                <?php
                    if( have_rows('capacity') ):
                    while( have_rows('capacity') ): the_row();
                ?>
                  <option value="<?php echo get_sub_field('dropdown'); ?>"><?php echo get_sub_field('dropdown'); ?></option>
                <?php
                  endwhile;
                  endif;
                ?>
              </select>
              <a href="<?php echo get_field('request_button_link'); ?>" data-toggle="modal" data-target="#myModal1"><?php echo get_field('request_button_title'); ?></a></div>
          </div>
          <div class="col-sm-6">
            <ul class="prd-icon">
              <?php
									if( have_rows('icon') ):
									while( have_rows('icon') ): the_row();
							?>

                  <li><img class="product-feature-icon" src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_field('image_description'); ?>"/>
                  <span class="product-feature-icon-description"><?php echo get_sub_field('image_hover_label'); ?></span> </li>

										 <?php
												endwhile;
												endif;
											?>

            </ul>
          </div>
        </div>


    <?php } else { ?>
      <!-- Byrd: To avoid 'undefined' in request a quote form -->
      <select hidden name="capacity" id="capacity"><option value=""></option></select>
      <div style="width:100%;height:150px"></div>
		<?php /*if(!is_single('gateway-of-building-protocol' )){ ?>
			<div class="row">
			<div class="col-md-6">
            <div class="capacity-box">
			</div>
			</div>
			</div>
			<?php }*/ ?>
    <?php } ?>
    
    <?php endif; ?>

    <!-- START FEATURES AREA -->
        <div class="row features-box">
          <div class="col-md-12">
            <div class="feature-box">
              <h2 class="text-center"><?php echo get_field('features_title'); ?></h2>
              <div class="features-list">
                  <?php echo get_field('features_description'); ?>
              </div>
            </div>
          </div>
        </div>
		<?php if(get_field('specification_description') != ''){ ?>
        <div class="row">
          <div class="col-md-12">
            <div class="specific">
              <h2><?php echo get_field('specification_title'); ?></h2>
            </div>
            <div class="clearfix"></div>
            <div class="table-row">
          <?php echo get_field('specification_description'); ?>
            </div>
          </div>
        </div>
		<?php } ?>
        <div class="row document-box">
          <div class="col-md-12 text-center">
            <?php if(get_field('to_see_full_specification_title') != ''){ ?>
			<p style="color:#00285f;"><?php echo get_field('to_see_full_specification_title'); ?> </p>
            <a href="<?php echo get_field('download_button_link'); ?>" download target="_blank"><?php echo get_field('download_button_title'); ?></a>
			<?php } ?>
            <h2 class="text-center"><?php echo get_field('document_title'); ?></h2>
          </div>
          <ul class="box-spe container row">
            <?php
                if( have_rows('document') ):
                while( have_rows('document') ): the_row();
            ?>

                      <li class="col col-sm-6"><strong><?php echo get_sub_field('title'); ?> </strong> </br>
                      <a href="<?php echo get_sub_field('button_link'); ?>" target="_blank"><?php echo get_sub_field('button_title'); ?></a></li>

                   <?php
                      endwhile;
                      endif;
                    ?>




            <?php
                if( have_rows('product') ):
                  ?>
                  <!-- <div class="hr-line"></div> -->
                  <style>.main-product-img {display: none}</style>
                  <?php
                while( have_rows('product') ): the_row();
            ?>
              <div class="sub-prod-background"><img src="<?php echo site_url('wp-content/uploads/2018/06/control_3_plain.svg');?>" /></div>
              <div class="col-md-12">
              <div class="gateway-prdct">
              <h3><?php echo get_sub_field('image_title'); ?></h3>

</div></div>

                      <div class="col-md-12 col-12 col-sm-12">
                        <div class="text-center"><img class="img-responsive sub-prod-img" src="<?php echo get_sub_field('product_image'); ?>" alt="<?php echo get_sub_field('image_title'); ?>"/> </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="text-center"><?php echo get_sub_field('features_title'); ?></h2>
                          <div class="features-list">
                      		    <?php echo get_sub_field('features_description'); ?>
                          </div>
                        </div>
                      </div>

                      <?php if(get_sub_field('document_title') != '') { ?>
                      <div class="col-md-12 text-center">

                        <h2 class="text-center"><?php echo get_sub_field('document_title'); ?></h2>
                      </div>
                    <?php } ?>
                      <?php
                          if( have_rows('document') ):
                          while( have_rows('document') ): the_row();
                      ?>

                      <li class="col col-sm-6"><strong><?php echo get_sub_field('title'); ?></strong> </br>
                    <a href="<?php echo get_sub_field('button_link'); ?>" target="_blank"><?php echo get_sub_field('button_title'); ?></a></li>



                             <?php
                                endwhile;
                                endif;
                              ?>

                              <!-- <div class="hr-line"></div> -->
                   <?php
                      endwhile;
                      else:
                        ?>
                        <!-- <li style="display:block;">
                          <hr>
                        </li> -->
                        <?php
                      endif;
                    ?>
                    <li style="display:block;">
                      <hr>
                    </li>
             <li class="col col-sm-6"><a class="reqAQuo" href="<?php echo get_field('request_a_quote_button_link'); ?>" data-toggle="modal" data-target="#myModal1"><?php echo get_field('request_a_quote_button_name'); ?></a></li>
           <li class="col col-sm-6"><a href="<?php echo get_field('find_a_distributor_button_link'); ?>" ><?php echo get_field('find_a_distributor_button_name'); ?></a></li>
            <li style="display:block;">
              <hr>
            </li>
          </ul>
        </div>
      </div>


      <!-- END PRODUCT AREA -->

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center releted-item3">
              <h2 class="text-center" style="color:#00285F;font-weight:bold"><?php echo get_field('related_item_title'); ?></h2>
              <p><?php echo get_field('related_item_description'); ?></p>
            </div>


            <div class="relate-box d-flex flex-wrap">
              <?php
                if( have_rows('related_items') ):
                while( have_rows('related_items') ): the_row();
                  
                  $cat = get_sub_field('category');
                  //print_r($cat);
              ?>
                  <a href="<?php echo get_term_link($cat); ?>" class="col-md-6 col-lg-3 col-12 my-2">
                    <img src="<?php the_field('icon',$cat); ?>" alt="<?php echo $cat->name; ?>"/>
                    <span><?php echo $cat->name; ?></span>
                  </a>
              <?php
                endwhile;
                endif;
              ?>
            </div>
          </div>
        </div>
  </div>

  <!-- Model Box -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="popup-function1">
          <form action="" method="post" id="modalform">
  <div class="row">

  <h1><?php the_title(); ?></h1>
  <input type="hidden" class="form-control" name="pname" id="pname" value="<?php the_title(); ?>">
  <input type="hidden" class="form-control" name="tname" id="tname" value="<?php the_title(); ?>">
  <div class="col-md-5 col-12">
  <div class="recover-system">
  <img src="<?php echo get_field('popup_image'); ?>" alt="<?php echo get_field('popup_title'); ?>"/>
  </div>
  </div>
  <div class="col-md-7 col-12">
  <div class="recover-system">
  <div class="form-group">
      <label>Name*</label>
      <input type="text" class="form-control" name="name" id="" placeholder="Please enter your name" required>
    </div>
    <div class="form-group">
      <label>Email*</label>
      <input type="email" class="form-control" name="email" id="" placeholder="Tell us where to send your quote" required>
    </div>
    <div class="form-group">
      <label>Zip Code*</label>
      <input type="text" class="form-control" name="zip" id="" placeholder="Where is your project?" required>
    </div>
    <div class="form-group">
      <label>Project Type*</label>
      <div class="radio-check">
  <ul>
  <li><input type="radio" name="radiog_dark" id="radio5" value="Residential" class="css-checkbox" />
  <label for="radio5" class="css-label radGroup2">Residential</label></li>
  <li><input type="radio" name="radiog_dark" id="radio6" value="Commerical" class="css-checkbox" />
  <label for="radio6" class="css-label radGroup2">Commerical</label></li>

  </ul>
  </div>
    </div>

    <div class="form-group">
      <label>Additional Comments</label>
      <textarea class="form-control" id="" placeholder="Please tell us your project’s square footage, how many units you may need and any additional information" rows="4" name="comments"></textarea>
    </div>
  </div>
  </div>
  <div class="col-md-12 col-12">
  <button type="submit" class="submit-form">Send</button>
  </div>

  </div>
  </form>
  </div>

        </div>



      </div>
    </div>





    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="popup-thankyou">
    <h2>Thank you!</h2>
    <p>We appreciate your interest in the</p>
    <h2><?php echo $pname; ?></h2>
    <p>A Gree midwest representative will reach out to you soon via email.</p>
    <a href="#" data-dismiss="modal">Back to Products</a>
    <div class="releted-item2">
    <h2>Related Items</h2>
    <p>See other products that work with this system.</p>
    <ul class="d-flex">
      <?php
        if( have_rows('related_items') ):
        while( have_rows('related_items') ): the_row();
          $cat = get_sub_field('category');
          //print_r($cat);
      ?>
      <li class="col-md-3 col-lg-3 col-12 my-2">
        <a href="<?php echo get_term_link($cat); ?>">
          <div class="thankyou-related-items-icon"><img src="<?php the_field('icon',$cat); ?>" alt="<?php echo $cat->name; ?>"/></div>
          <div class="thankyou-related-items-span"><span><?php echo $cat->name; ?></span></div>
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

        </div>
      </div>

      <script type="text/javascript">
      var product_feature_icon = document.getElementsByClassName('product-feature-icon');
      product_feature_icon.addEventListener('mouseenter', function(event){
        console.log('product_feature_icon');


      });
      </script>

<?php get_footer() ?>
