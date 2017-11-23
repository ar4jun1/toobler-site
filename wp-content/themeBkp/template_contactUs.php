

<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
/*
Template Name: Contact-us

*/
 
get_header(); ?>


<section class="contact-wrapper">
    <div class="layout-container">
        <?php  
            $New = new WP_Query( array( 'post_type' => 'slider','name'=>'contact_info', 'posts_per_page' =>1) ); 
            $i=1;
            while ( $New->have_posts() ) : $New->the_post();   
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
        ?>

            <div class="conatct-info">
                <h4><?php echo html_entity_decode(get_field('slider_text')); ?></h4>
                <?php the_content(); ?>
            </div>

        <?php $i++; endwhile;  ?> 

        <?php echo do_shortcode('[promo_form]'); ?>
    </div> 
</section>
  
<section class="contact-content">
        <div class="visit-content">
            <div class="block">
                <h5>Visit Us</h5>
                <p>
                    <strong>Toobler Technologies</strong> 1st Floor, Lulu Cyber Tower-1<br>
                    Infopark, Kakkanad
                </p>
                <a href="#" class="btn-secondary">Get Direction</a>
            </div> 
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/contact/office-image.jpg">   
        </div>
      <div class="connect">
          <div class="block">
                <h5>Let’s Connect</h5>
                <ul>
                    <li class="call"><i class="icon-call"></i>+91 484 4034359</li>
                    <li><i class="icon-skype"></i>toobler.technologies</li>
                    <li><i class="icon-message"></i><a href="#">info@toobler.com</a></li>
                </ul>
            </div>
      </div>
</section>


    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery-2.2.4.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/navigation.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/main.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/owl.carousel.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            
            //on load
            $('.common-form .form-control').each(function() {
                var inputItem = $(this).val();
                
                if(inputItem === "") {
                    $(this).removeClass('has-value');
                } else {
                    $(this).addClass('has-value');
                }
            });
            
            //on focusout
            $('.common-form .form-control').focusout(function(){
                var text_val = $(this).val();
                
                if(text_val === "") {
                    $(this).removeClass('has-value');
                } else {
                    $(this).addClass('has-value');
                }
            });
        });

    </script>


 <?php get_footer(); ?>
