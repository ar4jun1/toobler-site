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
                      <a href="#" class="lg primary-btn get-started-btn">Get Started</a>
                  </div>
                  <img alt="" src="<?php echo $thumb['0'] ?>">
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

    <?php wp_reset_postdata();
          $catId = get_cat_ID('case-study');
          $args1 = array( 'posts_per_page' => 3, 'category' => $catId );
          $myposts1 = get_posts( $args1 );

                      foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
                        <a href="<?php the_permalink() ?>" class="grid">
                            <?php $image1 = get_field('cs_hp_image');?>
                            <figure><img alt="" src="<?php echo $image1['url']; ?>"></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <?php echo html_entity_decode(get_field('cs_hp_description')); ?>
                                   </div>                                    
                               </div>
                            </div>
                        </a>

    <?php endforeach;  ?>  

    <?php wp_reset_postdata();
          $catId = get_cat_ID('case-study-m');
          $args1 = array( 'posts_per_page' => 1, 'category' => $catId );
          $myposts1 = get_posts( $args1 );

                      foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
                       <a href="<?php the_permalink() ?>" class="grid grid-2x">
                          <?php $image2 = get_field('cs_hp_image');?>
                            <figure><img alt="" src="<?php echo $image2['url']; ?>"></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <?php echo html_entity_decode(get_field('cs_hp_description')); ?>
                                   </div>                                    
                               </div>
                            </div>
                        </a>

    <?php endforeach;  ?> 

    <?php wp_reset_postdata();
          $catId = get_cat_ID('case-study-l');
          $args1 = array( 'posts_per_page' => 3, 'category' => $catId ,'orderby'=>'post_date','order'=>'ASC');
          $myposts1 = get_posts( $args1 );

                      foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
                        <a href="<?php the_permalink() ?>" class="grid">
                            <?php $image3 = get_field('cs_hp_image');?>
                            <figure><img alt="" src="<?php echo $image3['url']; ?>"></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                      <?php echo html_entity_decode(get_field('cs_hp_description')); ?>
                                   </div>                                    
                               </div>
                            </div>
                        </a>

    <?php endforeach; ?>  

                       
                  </div>
                  </div>   
              </div>
          </section>
        
        <!--What we do--> 
        <section class="what-we-do">            
            <div class="layout-container">
                <h2>What We Do</h2>
                    <div class="medium-grid"> 

    <?php wp_reset_postdata();
          $catId1 = get_cat_ID('services-details');
          $args2 = array( 'posts_per_page' => 6, 'category' => $catId1 );
          $myposts2 = get_posts( $args2 );

          foreach ( $myposts2 as $post ) : setup_postdata( $post ); ?>
          <?php $menuid= str_replace(' ', '-', get_field('sd_menu_name')); ?>
          <?php $image = get_field('sd_summary_image');?>
          <?php if(get_field('sd_menu_name')) : ?>

                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon <?php the_field('sd_icon_class'); ?>"></i>
                                <div class="grid-content">
                                   <a href="<?php the_permalink() ?>"><h3><?php 
                                echo html_entity_decode(get_field('services_detail_heading')); 
                            ?></h3></a>
                                    <ul class="list">
                                    <?php 
                                        echo html_entity_decode(get_field('content_list_home')); 
                                    ?>
                                    </ul>
                                    <a href="<?php the_permalink() ?>" class="more-btn">Learn More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
    <?php endif; ?>
    <?php endforeach; 
          wp_reset_postdata(); 
    ?>  
                     
                          
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
                              <h3><?php the_title(); ?></h3>
                              <p><?php the_content(); ?>
                              </p>
                              <a href="#" class="btn-primary">View Case Study</a>
                          </div>
                          <div class="case-screen">
                             <img alt="" src="<?php echo $newCase['0']; ?>">
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
                      <!--<a href="#">BROWSE OUR JOURNAL</a>-->
                  </div>
                  <div class="grid">

        
        <?php $catId = get_cat_ID('beinspiredMain');
              $args1 = array( 'posts_per_page' => 1, 'category' => $catId );
              $myposts1 = get_posts( $args1 );

              foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
                      <div class="layout-sm-12  layout-md-8 layout-lg-8">                                       
                          <div class="block inspired-details">                         
                              <div class="info">
                                  <h3><a href="<?php the_permalink() ?>"><?php echo html_entity_decode(get_field('blog_head_text')); ?></a> </h3>
                                   <!--<div class="content"><?php //echo get_the_content(); ?> <a href="<?php //the_permalink() ?>">Read more<i class="arrow-right"></i></a></div>-->
                              </div>
                              <div class="inspire-image"> 
                                   <img alt="" src="<?php the_post_thumbnail(); ?> ">
                              </div>                        
                          </div> 
                      </div>

        <?php endforeach; 
              wp_reset_postdata();
        ?>    
                    <div class="layout-sm-12  layout-md-4 layout-lg-4">

         <?php $catId = get_cat_ID('beinspiredMainSec');
              $args2 = array( 'posts_per_page' => 2, 'category' => $catId );
              $myposts2 = get_posts( $args2 );

              foreach ( $myposts2 as $post ) : setup_postdata( $post ); ?>
      
                      <div class="inspired-sub">                  
                            <div class="block sub-details">                            
                                 <div class="info">
                                     <h3><a href="<?php the_permalink() ?>"><?php echo html_entity_decode(get_field('blog_head_text')); ?> </a></h3>
                                     <!--<div class="content"><?php //echo get_the_content(); ?> <a href="<?php //the_permalink() ?>"><i class="arrow-right"></i></a></div>-->
                                 </div>
                                 <div class="inspire-image">
                                   <img alt="" src="<?php the_post_thumbnail(); ?>">
                                 </div>                  
                            </div>
                      </div>
        <?php endforeach; 
              wp_reset_postdata();
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
            'posts_per_page'=> 6
        );

        $category_query = new WP_Query( $category_query_args );
        ?>
        <?php
        if ( $category_query->have_posts() ) :
            $i=1;
         while ($category_query->have_posts() ): $category_query->the_post();

        ?>
                  <div class="item">
                      <div class="item-wrap">
                          <div class="info">
                            <p><i class="icon-quote-left"></i><?php echo get_the_content(); ?>

                              <i class="icon-quote-right"></i></p>
                          </div>
                          <div class="testimonial-user">
                            <?php $image = get_field('test_clinet_image');?>
                              <div class="user-image"><img src="<?php echo $image['url']; ?>" alt=""></div>
                              <div class="user-name">
                                  <?php
                                  $_explodeTtle = explode("-", get_the_title()); 
                                  if(isset($_explodeTtle[0])) echo $_explodeTtle[0]; ?>
                                    <small>
                                      <?php if(isset($_explodeTtle[1])) echo $_explodeTtle[1]; ?>
                                    </small>
                              </div>
                          </div>
                          <?php 
                           $webmFile = get_field('test_clinet_video_webm');
                           $mpFile = get_field('clinet_video_mp4');
                           $ogvFile = get_field('clinet_video_ogv'); 
                           if($webmFile['url'] || $mpFile['url'] || $ogvFile['url']){
                          ?>
                          <button name="video<?php echo $i ?>" class="icon-play play-icon"></button> 
                          <?php } ?>
                      </div>
                  </div>

          <?php
            $i++;
            endwhile; endif;
          ?>       
           
                    </div>
                    </div>
                 </div>
             </div>       
        </section>  
        
        <?php include(locate_template('template-parts/rocket.php')); ?>
                    
         <!--Video modal start-->
        <div class="modal-box video-modal-box">
            <div class="modal-wrap">

                <div class="close-btn close-fn">X</div>

        <?php

        $category_query_args = array(
            'category_name' => 'whattheysay',
            'posts_per_page'=> 6
        );

        $category_query = new WP_Query( $category_query_args );
        ?>
        <?php
        if ( $category_query->have_posts() ) :
            $i=1;
         while ($category_query->have_posts() ): $category_query->the_post();

        ?>    
              <?php $image = get_field('test_clinet_image');?>
                <video id="video<?php echo $i ?>" class="video-js vjs-default-skin" controls  height="485" poster="<?php echo $image['url']; ?>"> 

                 <?php $webmFile = get_field('test_clinet_video_webm'); 
                          if($webmFile){  ?>  
                    <source class="webm" src="<?php echo $webmFile['url']; ?>" type="video/webm" /> 
                    <?php } ?>
                   <?php $mpFile = get_field('clinet_video_mp4'); 
                          if($mpFile){  ?>  
                    <source class="mp4" src="<?php echo $mpFile['url']; ?>" type='video/mp4' />
                    <?php } ?>
                    <?php $ogvFile = get_field('clinet_video_ogv'); 
                    if($ogvFile){  ?> 
                    <source class="ogv" src="<?php echo $ogvFile['url']; ?>" type='video/ogg' /> 
                    <?php } ?>
                </video>

        <?php
            $i++;
            endwhile; endif;
        ?>     
            </div>
        </div>   
        <!--Video modal end-->
        
    </main>
</div>


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
                singleItem: true,
                pagination: true,
                navigation: false,
                mouseDrag : false, 
                autoPlay: false,
                //autoHeight: true,
                navigationText: ["<i class='icon-banner-arrow-left'></i>", "<i class='icon-banner-arrow-right'></i>"]
            });
            
            //home testimonial modal video
            currentVid = '';
            var video1 = videojs('#video1'),
                video2 = videojs('#video2'),
                video3 = videojs('#video3'),
                video4 = videojs('#video4');
            
            $('.client-say .play-icon').click(function(){
                $('body').addClass('overflow-hidden');
                var videoId = '#' + $(this).attr("name");
                currentVid = videoId;
                $('.modal-box').fadeIn();
                $('.video-modal-box .video-js').hide();
                $(videoId).show();
                videojs(videoId).play();
            });
            $('.close-fn').click(function(){
                $('body').removeClass('overflow-hidden');
                $('.modal-box').fadeOut();
                videojs(currentVid).pause();
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
                    scrollTop: $('.main-banner').height() + 4
                });
            });
            
            // get started scroll
            $('.get-started-btn').click(function(e) {
                var getStartedTarget = $('.get-started').offset().top - $('.site-header').height() + 4;
                $("html, body").animate({
                    scrollTop: getStartedTarget
                });
                $('.get-started .form-control').focus();
                e.preventDefault();
            });
            
           
        });
    </script>
<?php get_footer(); ?>