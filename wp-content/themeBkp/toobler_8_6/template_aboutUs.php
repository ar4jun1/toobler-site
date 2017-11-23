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
Template Name: About us

*/
 

get_header(); ?>


<!--Main-->      
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!--About Banner-->   

    <?php  
        $New = new WP_Query( array( 'post_type' => 'slider','name'=>'_aboutus_slider', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $New->have_posts() ) : $New->the_post();   
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
    ?>

                  <section class="about-banner"> 
                          <div class="banner-info">
                               <h3><?php the_title(); ?></h3>
                               <?php the_content(); ?>
                          </div>  
                          <img src="<?php echo $thumb['0'] ?>">           
                  </section> 
          
    <?php $i++; endwhile;  ?>       


        <!--Our Story--> 
        <section class="our-story">
            <div class="layout-container">
                <div class="layout-wrapper">
        <?php  
        $_id = 241;   //server
        // $_id = 201;  //Local
        $args = array(
              'p'         => $_id, // ID of a page, post, or custom type
              'post_type' => 'any'
            );
        $New1 = new WP_Query( $args ); 
        $i=1;
        while ( $New1->have_posts() ) : $New1->the_post(); ?>
                     <div class="layout-lg-6">
                         <div class="sub-content">
                             <span><i class="icon-toobler-round"></i></span>
                             <p><?php the_field('_custom_para'); ?></p>
                         </div>
                     </div>
                     <div class="layout-lg-6">                      
                           <div class="story-main">  


                            <h3></h3>
                             
                                 <h4><?php the_title(); ?></h4>
                                 <?php the_content(); ?>                   
                          </div>     
                     </div>
                </div>        
            </div>   
        </section>
        
        
       <!--Our Vision--> 
        <section class="our-vision">
            <div class="layout-container">
                <div class="layout-wrapper">                  
                    <div class="our-vision-block">     
                     <h4><?php the_field('sub_heading'); ?></h4>
                     <?php the_field('wysiwyg-editor'); ?>
                    </div>                  
                </div>
            </div>   
        </section>

        <?php $i++;  endwhile;  ?>
        
        <!--Values--> 
        <section class="values-live"> 
            <div class="layout-container">
                <div class="layout-wrapper">
                    <div class="layout-lg-4">
                        <div class="tittle">
                           <span>
                           The Values <br> We Live By
                           <i class="icon-line-arrow-right"></i>
                           </span>
                        </div>    
                    </div>  

    <?php  
        $New = new WP_Query( array( 'post_type' => 'values_we_live', 'posts_per_page' =>5) ); 
        $i=1;
        while ( $New->have_posts() ) : $New->the_post(); ?>
    
    <?php 
        $thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'what_we_do' );
    ?>

                    <div class="layout-xs-6 layout-lg-4">
                        <div class="block">
                          <div class="info">
                              <span class="<?php the_field('_icons'); ?>"></span>
                               <div class="grid-content">
                                  <h4><?php the_title(); ?></h4>
                                  <?php the_content(); ?>
                               </div>  
                          </div>
                        </div>
                     </div>  

    <?php $i++; endwhile;  ?>                                                      
                </div>         
            </div>    
        </section>
        
        
        <!--Team--> 
        <section class="team-section">
            <div class="layout-container">              
                <div class="layout-wrapper">
                    <div class="tittle">
                        <h4>The Faces of Toobler</h4>
                        <p>Meet our talented team of creatives, fun-lovers, and magic makers</p>
                    </div>
    <?php  
        $aboutMain = new WP_Query( array( 'post_type' => 'face_of','meta_key'=>'cuctom_category_abt','meta_value'  => 'FaceOf', 'posts_per_page' =>8) ); 
        $i=1;
        while ( $aboutMain->have_posts() ) : $aboutMain->the_post();   
        $thumbsValue = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'face_of' );
    ?>                                     
                    <div class="layout-xs-4 layout-lg-3">                    
                        <div class="team-block">
                               <img src="<?php echo $thumbsValue[0] ?>">
                               <div class="grid-content">
                                  <span class="name">
                                      <h4><?php the_title(); ?></h4>
                                  </span>
                                   <div class="overlay">
                                    <div class="team-info">
                                       <h4><?php the_title(); ?></h4>
                                       <?php the_content(); ?>
                                    </div>
                                  </div>                                
                               </div>  
                          </div>
                    </div> 
    <?php $i++; endwhile;  ?>                  
                </div>    
            </div>
        </section>


    <?php  
        $aboutMain = new WP_Query( array( 'post_type' => 'face_of','meta_key'=>'cuctom_category_abt','meta_value'  => 'commonImages', 'posts_per_page' =>8) ); 
        $i=1;
        while ( $aboutMain->have_posts() ) : $aboutMain->the_post();   
        $thumbsValue = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'face_of' );
    ?>   

         <!--Team Activity--> 
        <section class="team-activity">
            <div class="layout-container">
                <div class="layout-wrapper">
                    <div class="layout-sm-4 layout-lg-4">
                        <div class="activity-image">
                          <?php $image = get_field('image1');?>
                           <img src="<?php echo $image['url']; ?>">
                        </div>
                        <div class="activity-image">
                           <?php $image2 = get_field('image2');?>
                           <img src="<?php echo $image2['url']; ?>">
                        </div>
                    </div>
                    <div class="layout-sm-4 layout-lg-4">
                        <div class="project-info">
                            <div class="block">
                                <i class="icon-rocket"></i>
                                <?php $block_1 = get_field('block_1');
                                if($block_1){
                                  $block1 = explode("-", $block_1);
                                }
                                  ?>
                                <span class="count"><?php if(isset($block1[0])) echo $block1[0]; ?></span>
                                <span class="status"><?php if(isset($block1[1])) echo $block1[1]; ?></span>
                            </div>
                            <div class="block">
                                <i class="icon-cart"></i>
                                <?php $block_2 = get_field('block_2');
                                if($block_2){
                                  $block2 = explode("-", $block_2);
                                } ?>
                                <span class="count"><?php if(isset($block2[0])) echo $block2[0]; ?></span>
                                <span class="status"><?php if(isset($block2[0])) echo $block2[1]; ?></span>
                            </div>
                            <div class="block">
                                <i class="icon-person"></i>
                                <?php $block_3 = get_field('block_3');
                                if($block_3){
                                  $block3 = explode("-", $block_3);
                                }?>
                                <span class="count"><?php if(isset($block3[0])) echo $block3[0]; ?></span>
                                <span class="status"><?php if(isset($block3[0])) echo $block3[1]; ?></span>
                            </div>
                            <div class="block">
                                <i class="icon-search"></i>
                                <?php $block_4 = get_field('block_4');
                                if($block_4){
                                  $block4 = explode("-", $block_4);
                                }?>
                                <span class="count"><?php if(isset($block4[0])) echo $block4[0]; ?></span>
                                <span class="status"><?php if(isset($block4[0])) echo $block4[1]; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="layout-sm-4 layout-lg-4">
                        <div class="activity-image">
                           <?php $image3 = get_field('image3');?>
                           <img src="<?php echo $image3['url']; ?>">
                        </div>
                        <div class="activity-image">
                           <?php $image4 = get_field('image4');?>
                           <img src="<?php echo $image4['url']; ?>">
                        </div>
                    </div>
                </div>
            </div>  
        </section>
    <?php $i++; endwhile;  ?> 

        <!--Get started--> 
        <section class="get-start-inside">
            <div class="layout-container">
                <div class="layout-wrapper content">
                    <div class="layout-sm-8">
                        <span class="sub-text">Got a project in mind? Okay, lets get Started .</span>
                        <h4>Let's build something great.</h4>
                    </div>
                    <div class="layout-sm-4">
                        <a href="#" class="btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
         
       
    </main>
</div>
<?php get_footer(); ?>
