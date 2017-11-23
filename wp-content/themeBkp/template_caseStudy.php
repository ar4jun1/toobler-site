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
	<?php  
        $New = new WP_Query( array( 'post_type' => 'slider','name'=>'case_study_slider', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $New->have_posts() ) : $New->the_post();   
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
    ?>
		<!--Banner-->
		<section class="casestudy-banner">
		    <div class="layout-container">
		        <div class="tittle">
		        	<?php $image = get_field('secondary_images');?>
		            <span><img src="<?php echo $image['url']; ?>"></span>
		            <p><?php the_field('slider_text'); ?></p>
		        </div> 
		        <div class="banner-image">
		            <img src="<?php echo $thumb['0']; ?>">
		        </div>       
		    </div>  
		</section>
    <?php $i++;  endwhile;  ?>


<!--Project Summary-->
<?php  wp_reset_query();
 	$New = new WP_Query( array( 'p' => get_the_ID(),'post_type' => 'any') ); 
    $i=1;
    while ( $New->have_posts() ) : $New->the_post();   
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'any'); ?>

		<section class="project-summary">
		    <div class="layout-container">
		        <div class="summary-content">
		            <h4><?php the_field('sub_heading'); ?></h4>
		            <?php echo html_entity_decode(get_field('_custom_para')); ?>
		        </div>
		    </div>
		</section>

    <?php $i++;  endwhile;  ?>
<!--Screenshot-->
<section class="casestudy-screens">
    <div class="layout-container">
        <div class="layout-wrapper">
            <div class="layout layout-xs-6 layout-sm-6 layout-lg-6">

    <?php  
        $caseStudymain = new WP_Query( array( 'post_type' => 'case_study','meta_key'=>'custom_category_cs','meta_value'  => 'casestudyScreens_sl', 'posts_per_page' =>2) ); 
        $i=1;
        while ( $caseStudymain->have_posts() ) : $caseStudymain->the_post();   
        $caseStudymainImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio_main' );
    ?> 
                 <figure><img src="<?php echo $caseStudymainImg['0']; ?>"></figure>
    <?php $i++;  endwhile;  ?>

            </div>
    <?php  wp_reset_query();
        $caseStudymain1 = new WP_Query( array( 'post_type' => 'case_study','meta_key'=>'custom_category_cs','meta_value'  => 'casestudyScreens_lg', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $caseStudymain1->have_posts() ) : $caseStudymain1->the_post();   
        $caseStudymain1Img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio_main' );
    ?>         

            <div class="layout layout-xs-6 layout-sm-6 layout-lg-6">  
                 <figure><img src="<?php echo $caseStudymain1Img['0']; ?>"></figure>
            </div> 
    <?php $i++;  endwhile;  ?>
        </div>
    </div>
</section>  
 


 <?php  wp_reset_query();
 	$New = new WP_Query( array( 'p' => get_the_ID(),'post_type' => 'any') ); 
    $i=1;
    while ( $New->have_posts() ) : $New->the_post();  ?>
<!--Client-info-->
<section class="client-sound">
    <div class="layout-container">
        <div class="layout-wrapper">
           <div class="info">
               <?php echo html_entity_decode(get_field('client_sound_content')); ?>
                <span>
                    <figure></figure>
                    <figcaption>
                <?php $_explodeTtle = explode("-", get_field('client_sound_title'));   ?>
                       <h6><?php if(isset($_explodeTtle[0])) echo $_explodeTtle[0]; ?></h6>
                           <small><?php if(isset($_explodeTtle[1])) echo $_explodeTtle[1]; ?></small>
                    </figcaption>
                </span>
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
    <?php $i++;  endwhile;  ?>


<!--Development-->
<section class="development-wrapper">
    <div class="layout-container">
        <div class="layout-wrapper">
            <div class="development-block">
        <?php  
              $caseStudyDev1 = new WP_Query( array( 'post_type' => 'case_study', 'meta_key'=>'custom_category_cs','meta_value'  => 'development_wrapper','posts_per_page' =>1) );
              $i=1;
              while ( $caseStudyDev1->have_posts() ) : $caseStudyDev1->the_post();   
              $caseStudyDev1Img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
        ?>
                <div class="content">
                    <h4><?php the_title(); ?></h4>
                    <?php the_content(); ?>
                </div> 
        <?php $i++;  endwhile;  ?>
   
                <ul>

        <?php  
              $caseStudyDev2 = new WP_Query( array( 'post_type' => 'case_study', 'meta_key'=>'custom_category_cs','meta_value'  => 'development_wrapper_img','posts_per_page' =>4) );
              $i=1;
              while ( $caseStudyDev2->have_posts() ) : $caseStudyDev2->the_post();   
              $caseStudyDev2Img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
        ?>
                    <li>
                        <span><figure><img src="<?php echo $caseStudyDev2Img['0']; ?>"></figure></span>
                        <h6><?php echo get_the_content(); ?></h6>
                    </li>
         <?php $i++;  endwhile;  ?>
                  
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
              $caseStudyDev2 = new WP_Query( array( 'post_type' => 'case_study', 'meta_key'=>'custom_category_cs','meta_value'  => 'key_Features_cs','posts_per_page' =>4) );
              $i=1;
              while ( $caseStudyDev2->have_posts() ) : $caseStudyDev2->the_post();   
              $caseStudyDev2Img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
        ?>
                <li>
                   <h5><?php echo html_entity_decode(get_field('cs_sub_heading')); ?></h5> 
                   <?php the_content(); ?>
                </li>
         <?php $i++;  endwhile;  ?>

            </ul>           
        </div>    
    </div>
</section>   
<section class="get-start-inside">
    <div class="layout-container">
        <div class="layout-wrapper content">
            <div class="layout-lg-8">
                <span class="sub-text">Got a project in mind? Okay, lets get Started .</span>
                <h4>Let's build something great.</h4>
            </div>
            <div class="layout-lg-4">
                <a href="#" class="btn-primary">Get Started</a>
            </div>
        </div>
    </div>
</section>
</main>
</div>

<?php get_footer(); ?>
