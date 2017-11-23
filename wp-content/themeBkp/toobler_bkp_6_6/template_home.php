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
Template Name: Home

*/
 

get_header(); ?>




<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!--Home Banner-->       
        <section class="main-banner">            
            <div class="owl-carousel" id="main-banner">


    <?php  
        $New = new WP_Query( array( 'post_type' => 'slider','name'=>'_home_slider', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $New->have_posts() ) : $New->the_post(); ?>
    
    <?php 
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
    ?>
              <div class="item">
                  <div class="banner-content">
                      <h1><?php the_title(); ?></h1>
                       <?php the_content(); ?> 
                      <a href="#" class="lg secondary-btn-outline">Read more</a>
                      <a href="#" class="lg primary-btn">Get Started</a>                 
                  </div>
                  <img src="<?php echo $thumb['0'] ?>">
              </div>

    <?php $i++;?>
           
    <?php endwhile;  ?>                         
            </div>
            <button class="btn icon-down-arrow banner-scroll-arrow"></button>
        </section>
        
        <!--Welcome-->
        <section class="home-sub-info">
            <div class="layout-container">
                <div class="info">
				
				  <?php  wp_reset_query();
				  $post_id=get_the_ID();
				  $queried_post=get_post($post_id);?>
				   <?php echo $queried_post->post_content;?> </div>
					 
            </div>    
        </section>  
          
        <!--Project-->
        <section class="portfolio-home"> 
            <div class="layout-container">
                <div class="medium-grid">      
                   <div class="portfolio-grid">


    <?php  wp_reset_query();
        $caseStudymain1 = new WP_Query( array( 'post_type' => 'image_grid1','meta_key'=>'custom_category_sl','meta_value'  => 'image_grid1', 'posts_per_page' =>3) ); 
        $i=1;
        while ( $caseStudymain1->have_posts() ) : $caseStudymain1->the_post();   
        $thumbs_grid = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'image_grid1' );
    ?>  
    
                        <aside class="grid">
                            <figure><img src="<?php echo $thumbs_grid[0] ?>" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3><?php echo html_entity_decode(get_field('slider_text')); ?></h3>
                                       <?php the_content(); ?> 
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>

    <?php $i++;?>
           
    <?php endwhile;  ?> 

    <?php  wp_reset_query();
        $caseStudymain1 = new WP_Query( array( 'post_type' => 'image_grid1','meta_key'=>'custom_category_sl','meta_value'  => 'image_grid2', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $caseStudymain1->have_posts() ) : $caseStudymain1->the_post();   
        $thumbs_grid2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'image_grid1' );
    ?>
   
                        <aside class="grid grid-2x">
                            <figure><img src="<?php echo $thumbs_grid2[0] ?>" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3><?php echo html_entity_decode(get_field('slider_text')); ?></h3>
                                       <?php the_content(); ?> 
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>

    <?php $i++;?>
           
    <?php endwhile;  ?> 


    <?php  wp_reset_query();
        $caseStudymain1 = new WP_Query( array( 'post_type' => 'image_grid1','meta_key'=>'custom_category_sl','meta_value'  => 'image_grid3', 'posts_per_page' =>3) ); 
        $i=1;
        while ( $caseStudymain1->have_posts() ) : $caseStudymain1->the_post();   
        $thumbs_grid3 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'image_grid3' );
    ?>
    
                        <aside class="grid">
                            <figure><img src="<?php echo $thumbs_grid3[0] ?>" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3><?php echo html_entity_decode(get_field('slider_text')); ?></h3>
                                       <?php the_content(); ?> 
                                       <span class="secondary-btn-outline">
                                            <!-- <a href="#" class="btn">Explore</a>    -->
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>

    <?php $i++;?>
           
    <?php endwhile;  ?> 

                       
                  </div>
                  </div>   
              </div>
          </section>
        
        <!--What we do--> 
        <section class="what-we-do">            
            <div class="layout-container">
                <h2>What We Do</h2>
                    <div class="medium-grid"> 

    <?php  wp_reset_query();
        $caseStudymain1 = new WP_Query( array( 'post_type' => 'what_we_do','meta_key'=>'custom_category_hm','meta_value'  => 'WhatWeDo', 'posts_per_page' =>6) ); 
        $i=1;
        while ( $caseStudymain1->have_posts() ) : $caseStudymain1->the_post();   
        $thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'what_we_do' );
    ?> 

                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon <?php the_field('_icons'); ?>"></i>
                                <div class="grid-content">
                                   <a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
                                    <ul class="list">
                                    <?php the_content(); ?>
                                    </ul>
                                    <a href="<?php the_permalink() ?>" class="more-btn">Learn More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
    <?php $i++;?>
           
    <?php endwhile;  ?>     
                          
                    </div> 
            </div>
        </section>
        
         <!--New Case Study-->    
        <section class="home-case-study"> 
            <div class="layout-container">


    <?php  wp_reset_query();
        $caseStudymain1 = new WP_Query( array( 'post_type' => 'what_we_do','meta_key'=>'custom_category_hm','meta_value'  => 'new_case_study', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $caseStudymain1->have_posts() ) : $caseStudymain1->the_post();   
        $newCase = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'what_we_do' );
    ?> 
             <div class="grid">                  
                          <div class="layout-sm-5 layout-md-5 layout-lg-5">
                              <h5>NEW CASE STUDY</h5>
                              <h3><?php the_title(); ?></h3>
                              <p><?php the_content(); ?>
                              </p>
                              <a href="#" class="btn-primary">View Case Study</a>
                          </div>
                          <div class="case-screen">
                             <img src="<?php echo $newCase['0']; ?>">
                          </div>                    
                    </div>
    <?php $i++;?>
           
    <?php endwhile;  ?>             
            </div>
        </section>        
        
         <!--inspired section-->
        <section class="inspired-section">        
              <div class="layout-container">
                  <div class="tittle">
                      <h4>Be inspired</h4>
                      <a href="#">BROWSE OUR JOURNAL</a>
                  </div>
                  <div class="grid">

        <?php
        $category_query_args = array(
            'category_name' => 'beinspired',
            'posts_per_page'=> 1
        );

        $category_query = new WP_Query( $category_query_args );
        ?>
        <?php
        if ( $category_query->have_posts() ) :
         while ($category_query->have_posts() ): $category_query->the_post();

        ?>
                      <div class="layout-sm-12  layout-md-8 layout-lg-8">                                       
                          <div class="block inspired-details">                         
                              <div class="info">
                                   <h3><?php the_title(); ?> </h3>
                                   <div class="content"><?php echo get_the_content(); ?> <a href="<?php the_permalink() ?>">Read more<i class="arrow-right"></i></a></div>
                              </div>
                              <div class="inspire-image">
                                   <img src="<?php the_post_thumbnail(); ?> ">
                              </div>                        
                          </div> 
                      </div>

        <?php
        endwhile; endif;
        ?>
                    <div class="layout-sm-12  layout-md-4 layout-lg-4">

         <?php
        $category_query_args = array(
            'category_name' => 'beinspiredsec',
            'posts_per_page'=> 2
        );

        $category_query = new WP_Query( $category_query_args );
        ?>
        <?php
        if ( $category_query->have_posts() ) :
         while ($category_query->have_posts() ): $category_query->the_post();

        ?>
      
                      <div class="inspired-sub">                  
                            <div class="block sub-details">                            
                                 <div class="info">
                                     <h3><?php the_title(); ?> </h3>
                                     <div class="content"><?php echo get_the_content(); ?> <a href="<?php the_permalink() ?>"><i class="arrow-right"></i></a></div>
                                 </div>
                                 <div class="inspire-image">
                                   <img src="<?php the_post_thumbnail(); ?>">
                                 </div>                  
                            </div>
                      </div>
        <?php
          endwhile; endif;
        ?>

                    </div>
                </div>
            </div>
        </section>
         
          <!--Client say-->
          <section class="client-say">
                <div class="layout-container">
                    <div class="layout-lg-4">
                        <div class="about">
                          <h2>What They Say About us</h2>
                     </div>
                   </div>   
                   <div class="layout-lg-8">
                      <div class="test-block">
                          <div class="owl-carousel" id="client-say">

        <?php
        $category_query_args = array(
            'category_name' => 'whattheysay',
            'posts_per_page'=> 5
        );

        $category_query = new WP_Query( $category_query_args );
        ?>
        <?php
        if ( $category_query->have_posts() ) :
         while ($category_query->have_posts() ): $category_query->the_post();

        ?>
                  <div class="item">
                      <div class="item-wrap">
                          <div class="info">
                            <p><i class="icon-quote-left"></i><?php echo substr(get_the_excerpt(), 0,185); if(strlen(get_the_excerpt())>185) echo '...' ?>

                              <i class="icon-quote-right"></i></p>
                          </div>
                          <div class="testimonial-user">
                              <div class="user-image"></div>
                              <div class="user-name">
                                  <?php
                                  $_explodeTtle = explode("-", get_the_title()); 
                                  if(isset($_explodeTtle[0])) echo $_explodeTtle[0]; ?>
                                    <small>
                                      <?php if(isset($_explodeTtle[1])) echo $_explodeTtle[1]; ?>
                                    </small>
                              </div>
                          </div>
                          <button class="icon-play play-icon"></button>
                            <!-- <a href="<?php the_permalink() ?>"><span class="play-icon"></span></a> -->
                          <div class="video-block" id="video-block">
                                1
                          </div>
                      </div>
                  </div>

          <?php
            endwhile; endif;
          ?>       
           
                    </div>
                    </div>
                 </div>
             </div>       
        </section>  
        <section class="get-started">
             <div class="layout-container">                 
                <div class="get-info">
                     <h3>Got a project in mind? Okay, lets get Started .</h3>
                     <p>Let's build something great.</p> 
                     <a href="#" class="btn-primary">Get Started</a>                        
                </div>                                                             
             </div>    
        </section>
    </main>
</div>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery-2.2.4.js"></script>
    <!--<script src="js/lib/bootstrap.min.js"></script>-->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/navigation.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/packery.pkgd.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/imagesloaded.pkgd.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/owl.carousel.js"></script>

    <script>
        $(document).ready(function() {            
            
           //Banner    
            $("#main-banner").owlCarousel({
                singleItem : true,
                pagination : true,
                navigation : true,
                autoPlay : true,
                navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
            });
            
            //Client Say    
            $("#client-say").owlCarousel({
                singleItem : true,
                pagination : true,
                navigation : false,
                autoPlay : false,
                navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
            });
            
           // init Packery
            var $grid = $('.portfolio-grid').packery({
              itemSelector: '.grid',
              percentPosition: true,
              gutter: 15
            });
            
            // layout Packery after each image loads
            $grid.imagesLoaded().progress( function() {
              $grid.packery();
            }); 
             // banner icon click scroll to bottom 
            $('.banner-scroll-arrow').click(function() {
                $("html, body").animate({
                    scrollTop: $('.main-banner').height()
                });
            });
            
           
        });
    </script>
<?php get_footer(); ?>
