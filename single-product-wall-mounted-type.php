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
//   $to     = 'mmcclafferty@es99.agency';
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
<div class="container">
  <div class="row">

  </div>
</div>
<div class="clearfix"></div>
<div class="container">
<div class="wall-mounted">
	<div class="row">
		<div class="col-md-12 col-12 col-sm-12 text-center">
			<img class="img-responsive" src="<?php echo get_field('product_image'); ?>" alt="<?php echo get_field('request_button_title'); ?>"/>
		</div>
    </div>
    <div class="row">
        <div class="col-md-12">
			<div class="gmv5-textbox text-center">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
            </div>
        </div>
    </div>

    <!-- Capacity Dropdown -->
		<?php if(get_field('capacity_title')) { ?>
      
			<div class="col-sm-6 mx-auto">
            <div class="capacity-box">
              <h4 class="col-3"><?php echo get_field('capacity_title'); ?></h4>
              <!-- Mobile Accourdian -->
              <?php
              $mobileAccourdian.= '<li>
        				<div class="link">'.get_field('capacity_title').'</div><div class="submenu">
      						<div class="download-pdf">
      							<ul>';
              ?>
              <select class="col-9 mx-auto" name="capacity" id="capacity">
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
              <a class="col-6 mx-auto" href="<?php echo get_field('request_button_link'); ?>" data-toggle="modal" data-target="#myModal1"><?php echo get_field('request_button_title'); ?></a></div>
          </div>

    <?php } else { ?>
      <!-- Byrd: To avoid 'undefined' in request a quote form -->
      <select hidden name="capacity" id="capacity"><option value=""></option></select>
      <div style="width:100%;height:150px"></div>
      <?php } ?>

<!-- Capacity Dropdown END -->


<div class="row">
	  <div class="col-md-12">
		<h3 class="text-center"><?php echo get_field('features_title'); ?></h3>
    <div class="features-list">
		    <?php echo get_field('features_description'); ?>
    </div>
	  </div>
	</div>

        <div class="row document-box">
          <div class="col-md-12 text-center">
            <h3 class="text-center"><?php echo get_field('document_title'); ?></h3>
          </div>
          <ul class="box-spe">
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

            <li style="display:block;">
              <hr>
            </li>

             <li class="col col-sm-6"><a href="<?php echo get_field('request_a_quote_button_link'); ?>" data-toggle="modal" data-target="#myModal1"><?php echo get_field('request_a_quote_button_name'); ?></a></li>
           <li class="col col-sm-6"><a href="<?php echo get_field('find_a_distributor_button_link'); ?>" ><?php echo get_field('find_a_distributor_button_name'); ?></a></li>
            <li style="display:block;">
              <hr>
            </li>
          </ul>
        </div>
        <div class="text-center releted-item3">
          <h3 class="text-center"><?php echo get_field('related_item_title'); ?></h3>
          <p><?php echo get_field('related_item_description'); ?></p>
        </div>


        <div class="relate-box">
          <?php
						if( have_rows('related_items') ):
						while( have_rows('related_items') ): the_row();
							$cat = get_sub_field('category');
							//print_r($cat);
					?>
							<a href="<?php echo get_term_link($cat); ?>">
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
  <ul>
    <?php
      if( have_rows('related_items') ):
      while( have_rows('related_items') ): the_row();
        $cat = get_sub_field('category');
        //print_r($cat);
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

      </div>
    </div>






<?php get_footer() ?>
