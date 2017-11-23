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
Template Name: Case study

*/
 

get_header(); ?>

get_header(); ?>
<?php

    global $post;
    $myposts    = get_post($post->ID);
?>

	
		<!--Banner-->
		<section class="casestudy-banner">
		    <div class="layout-container">
		        <div class="tittle">
		        	 <?php $image = get_field('cs_secondary_images');?>
		            <span><img alt="" src="<?php echo $image['url']; ?>"></span>
		            <p><?php echo html_entity_decode(get_field('cs_secondary_images_txt')); ?></p>
		        </div> 
		        <div class="banner-image">
		            <img alt="" src=<?php the_post_thumbnail(); ?>
		        </div>       
		    </div>  
		</section>


<!--Project Summary-->

		<section class="project-summary">
		    <div class="layout-container">
		        <div class="summary-content">
		            <h4><?php the_field('sub_heading'); ?></h4>
		            <?php echo html_entity_decode(get_field('_custom_para')); ?>
		        </div>
		    </div>
		</section>
   
<!--Screenshot-->
<section class="casestudy-screens">
    <div class="layout-container">
        <div class="layout-wrapper">
           <?php $image1 = get_field('cs_img_gr_one');?>
           <?php $image2 = get_field('cs_img_gr_two');?>
           <?php $image3 = get_field('cs_img_gr_thr');?>
            <div class="layout layout-xs-6 layout-sm-6 layout-lg-6">    
                 <figure><img alt="" src="<?php echo $image1['url']; ?>"></figure>    
              
                 <figure><img alt="" src="<?php echo $image2['url']; ?>"></figure>    
            </div>  
            <div class="layout layout-xs-6 layout-sm-6 layout-lg-6">  
                 <figure><img alt="" src="<?php echo $image3['url']; ?>"></figure>
            </div> 
        </div>
    </div>
</section>  
 


 <?php  wp_reset_query(); ?>
<!--Client-info-->
<section class="client-sound">
    <div class="layout-container">
        <div class="layout-wrapper">
           <div class="info">
               <?php echo html_entity_decode(get_field('client_sound_content')); ?>
                <div class="figure-wrap">
                    <figure></figure>
                    <div class="figcaption">
                <?php $_explodeTtle = explode("-", get_field('client_sound_title'));   ?>
                       <h6><?php if(isset($_explodeTtle[0])) echo $_explodeTtle[0]; ?></h6>
                           <small><?php if(isset($_explodeTtle[1])) echo $_explodeTtle[1]; ?></small>
                    </div>
                </div>
           </div>                       
        </div>
    </div>
</section>   
 
<!--Project-flow-->
<section class="project-flow">
    <div class="layout-container">
        <div class="layout-wrapper">
          <div class="content-block">
              <h2><?php echo html_entity_decode(get_field('project_flow_title')); ?></h2>
              <?php echo html_entity_decode(get_field('project_flow_content')); ?>
          </div>  
          <div class="content-block">
              <h2><?php echo html_entity_decode(get_field('project_flow_title2')); ?></h2>
               <?php echo html_entity_decode(get_field('project_flow_content2')); ?>
          </div>                                     
                       
        </div>
    </div>
</section>                  
        
<!--Result-->
<section class="casestudy-result">
    <div class="layout-container">
        <div class="result-content">
            <h4><?php echo html_entity_decode(get_field('casestudy_result_title')); ?></h4>
            <?php echo html_entity_decode(get_field('casestudy_result_content')); ?>
        </div>    
    </div>
</section>  


<!--Development-->
<section class="development-wrapper">
    <div class="layout-container">
        <div class="layout-wrapper">
            <div class="development-block">
        
                <div class="content">
                <?php echo html_entity_decode(get_field('cs_development_content')); ?>
                    
                </div> 
   
                <ul>

        <?php  
        $custom_cat1 =  get_field('cs_development_img_cat');
              $caseStudyDev2 = new WP_Query( array( 'post_type' => 'case_study', 'meta_key'=>'custom_category_cs','meta_value'  => $custom_cat1,'posts_per_page' =>4) );
              $i=1;
              while ( $caseStudyDev2->have_posts() ) : $caseStudyDev2->the_post();   
              $caseStudyDev2Img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
        ?>
                    <li>
                        <span><figure><img alt="" src="<?php echo $caseStudyDev2Img['0']; ?>"></figure></span>
                        <h6><?php echo get_the_content(); ?></h6>
                    </li>
         <?php $i++;  endwhile; wp_reset_postdata(); ?>
                  
                </ul>   
            </div>            
        </div>    
    </div>
</section>  
               
<!--Key Feature-->
<section class="key-features-wrapper">
    <div class="layout-container">
        <div class="layout-wrapper">
            <h4>Key Features</h4>
            <ul>

        <?php  
              $custom_cat2 =  get_field('cs_key_features_cat');
              $caseStudyDev2 = new WP_Query( array( 'post_type' => 'case_study', 'meta_key'=>'custom_category_cs','meta_value'  => $custom_cat2,'posts_per_page' =>4) );
              $i=1;
              while ( $caseStudyDev2->have_posts() ) : $caseStudyDev2->the_post();   
              $caseStudyDev2Img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
        ?>
                <li>
                   <h5><?php echo html_entity_decode(get_field('cs_sub_heading')); ?></h5> 
                   <?php the_content(); ?>
                </li>
         <?php $i++;  endwhile; wp_reset_postdata();  ?>

            </ul>           
        </div>    
    </div>
</section>   
<?php include(locate_template('template-parts/rocket.php')); ?>

<?php get_footer(); ?>
