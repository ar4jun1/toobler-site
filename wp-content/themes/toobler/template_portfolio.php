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
Template Name: Portfolio

*/
 

get_header(); ?>


<!--Main-->      
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!--Portfolio Banner-->       
        <section class="portfolio_banner"> 
                <div class="banner-info">
                   <div class="layout-container">
        <?php  
            $New = new WP_Query( array( 'post_type' => 'slider','name'=>'_portfolio_slider', 'posts_per_page' =>1) ); 
            $i=1;
            while ( $New->have_posts() ) : $New->the_post();   
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
        ?>
                  <div class="project-info">
                      <?php $image = get_field('secondary_images');?>
                      <span class="project-logo">
                          <img alt="" src="<?php echo $image['url']; ?>">
                      </span>
                      <h5><?php the_title(); ?></h5>
                  </div>
                  <div class="explore-project">
                      <a href="#">Explore<i class="icon-round-next2"></i></a>
                  </div>

        <?php $i++;  endwhile;  ?>
                    </div>             
                </div>  
                <img alt="" src="<?php echo $thumb['0'] ?>">           
        </section> 
                  
        <!--Portfolio--> 
        <section class="portfolio-main"> 
            <div class="layout-container">
                <div class="medium-grid">      
                   <div class="portfolio-grid layout-wrapper">
                        <?php  
                            $portfolioMain = new WP_Query( array( 'post_type' => 'portfolio_main','meta_key'=>'custom_category','meta_value'  => 'portfolio_imagegrid', 'posts_per_page' =>10) ); 
                            $i=1;
                            while ( $portfolioMain->have_posts() ) : $portfolioMain->the_post();   
                            $portfolioMainImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio_main' );
                        ?>
                       <div class="layout-sm-6 layout-lg-6">
                           <aside class="grid">
                            <figure><img alt="" src="<?php echo $portfolioMainImg['0']; ?>"></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3><?php echo html_entity_decode(get_field('portfolio_title')); ?></h3>
                                       <?php the_content(); ?>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                       </div>

                        <?php $i++; endwhile;  ?>                                             
                    </div>
                </div>   
            </div>
        </section>

<!--What Client Say-->     
<section class="what-client-say">
    <h1 class="page-title">What Our Clients Say</h1>
    <div class="layout-container">
            <div class="testi-video-panel">
            <div class="video-testi videoWrapper">
                      <video id="video1" class="video-js vjs-default-skin" controls height="485" poster="<?php echo get_stylesheet_directory_uri() ?>/img/poster-AronSmith.jpg"> 
                         <!-- <source class="webm" src="<?php echo get_stylesheet_directory_uri() ?>/video/aronSmith.webm" type="video/webm" />  -->
                         <source class="mp4" src="<?php echo get_stylesheet_directory_uri() ?>/video/aronSmith.mp4" type='video/mp4' />
                         <!-- <source class="ogv" src="<?php echo get_stylesheet_directory_uri() ?>/video/aronSmith.ogv" type='video/ogg' />  -->
                       </video>

                       <video id="video4" class="video-js vjs-default-skin" controls height="485" poster="<?php echo get_stylesheet_directory_uri() ?>/img/poster-williamWillLopez.jpg">
                           <!-- <source class="webm" src="<?php echo get_stylesheet_directory_uri() ?>/video/williamWillLopez.webm" type="video/webm" /> -->
                           <source class="mp4" src="<?php echo get_stylesheet_directory_uri() ?>/video/williamWillLopez.mp4" type='video/mp4' /> 
                           <!-- <source class="ogg" src="<?php echo get_stylesheet_directory_uri() ?>/video/williamWillLopez.ogv" type='video/ogg' />  -->
                      </video>

                      <video id="video2" class="video-js vjs-default-skin" controls height="485" poster="<?php echo get_stylesheet_directory_uri() ?>/img/poster-danielBox.jpg">
                          <!-- <source class="ogv" src="<?php echo get_stylesheet_directory_uri() ?>/video/danielBox.ogv" type='video/ogg' /> -->
                          <!-- <source class="webm" src="<?php echo get_stylesheet_directory_uri() ?>/video/danielBox.webm" type="video/webm" />    -->
                          <source class="mp4" src="<?php echo get_stylesheet_directory_uri() ?>/video/danielBox.mp4" type='video/mp4' /> 
                       </video>
                      <video id="video3" class="video-js vjs-default-skin" controls height="485" poster="<?php echo get_stylesheet_directory_uri() ?>/img/poster-leeBarrett.jpg">
                          <!-- <source class="webm" src="<?php echo get_stylesheet_directory_uri() ?>/video/leeBarrett.webm" type="video/webm" /> -->
                          <source class="mp4" src="<?php echo get_stylesheet_directory_uri() ?>/video/leeBarrett.mp4" type='video/mp4' />
                          <!-- <source class="ogg" src="<?php echo get_stylesheet_directory_uri() ?>/video/leeBarrett.ogv" type='video/ogg' />  -->
                       </video>

                </div>

                <!-- <div class="video-testi videoWrapper">

          <?php  
              $portFolioVideo = new WP_Query( array( 'post_type' => 'portfolio_main', 'meta_key'=>'custom_category','meta_value'  => 'portfolio_videos','posts_per_page' =>4) );
              $i=1;
              while ( $portFolioVideo->have_posts() ) : $portFolioVideo->the_post();   
          ?>

                      <video id="video<?php echo $i;?>" class="video-js vjs-default-skin" controls   preload="auto" height="485" data-setup="{}">
                          <?php $mpFile = get_field('portfolio_video_mp'); 
                          if($mpFile){  ?>                    
                             <source class="mp4" src="<?php echo $mpFile['url']; ?>" type='video/mp4' />
                          <?php } ?>

                          <?php $webmFile = get_field('portfolio_video_webm'); 
                          if($webmFile){  ?>  
                             <source class="webm" src="<?php echo $webmFile['url']; ?>" type="video/webm" /> 
                          <?php } ?>

                          <?php $ogvFile = get_field('portfolio_video_ogv'); 
                          if($ogvFile){  ?> 
                             <source class="ogv" src="<?php echo $ogvFile['url']; ?>" type='video/ogg' /> 
                          <?php } ?>
                          
                      </video>

        <?php $i++; endwhile;  ?>       
                </div> -->


                <div class="test-video-details">
                    <div class="client-details">
                        <figure>
                            <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/testimonials/aron.png">
                        </figure>
                        <h4>Aron Smith <small>Founder, Yacket</small></h4>
                    </div>                    
                    <div class="video-item-wrap owl-carousel">                                       
                       <div class="video-item" id="aronSmith">
                            <figure>
                                <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/testimonials/aron.png">
                            </figure>                     
                        </div>
                        <div class="video-item" id="williamWillLopez">
                            <figure>
                                <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/testimonials/william-will-lopez.png">
                            </figure>                       
                        </div>
                        <div class="video-item" id="danielBox">
                            <span class="caret"></span>
                            <figure>
                                <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/testimonials/daniel.png">
                            </figure>
                        </div>
                         <div class="video-item" id="leeBarrett">
                            <figure>
                                <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/testimonials/lee.png">
                            </figure>
                        </div>
                    
                    </div>
                </div>                
            </div>     
    </div>
</section>     
                
        
<section class="testimonial-wrapper">
         <div class="layout-container">                
                <div class="test-block">
                    <div class="owl-carousel" id="client-testimonial">

          <?php  
              $clientTestimonial = new WP_Query( array( 'post_type' => 'portfolio_main', 'meta_key'=>'custom_category','meta_value'  => 'clientTestinomial','posts_per_page' =>10) );
              $i=1;
              while ( $clientTestimonial->have_posts() ) : $clientTestimonial->the_post();   
              $clientTestimonialImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
          ?>

                        <div class="item">
                           <div class="content">
                               <p><?php echo substr(get_the_excerpt(), 0,185); if(strlen(get_the_excerpt())>185) echo '...' ?>

                                </p>                               
                           </div>
                           <div class="client-details">
                               <figure>  
                                   <img alt="" src="<?php echo $clientTestimonialImg['0']; ?>">                                 
                               </figure>
                               <?php
                                $_explodeTtle = explode("-", get_the_title());   ?>
                               <h4><?php if(isset($_explodeTtle[0])) echo $_explodeTtle[0]; ?>
                                   <small><?php if(isset($_explodeTtle[1])) echo $_explodeTtle[1]; ?></small>
                               </h4>
                           </div> 
                        </div>

        <?php $i++; endwhile;  ?>       


                        

                </div>
                </div>
         </div>       
        </section>
        
        <!--Map Wrapper-->
        <section class="map-wrapper">
            <div class="layout-container">
                <div class="block">
                    <div class="contnet">
                        <h3>Clients Around The World</h3>
                        <p>Here’s a look at some of our clients, past and present.</p>
                    </div>    
                </div>
            </div>
        </section> 
        
        <section class="client-wrapper">
            <div class="layout-container">
               <div class="gallery-item">
                  <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/shopbox.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/yacket.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/blacktri.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/hummingblue.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/bluestacks.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/permit-puller.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/fonu2.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/saleswp.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/advisorfi.png">    
                       </figure>
                   </div>
                   
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/cordist-technology.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/every-click.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/sparky-bus.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/topic-tracker.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/mimo.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/off-mx.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/giant-waste.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/discover-coffe.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/milo.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/elephent.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/net-locker.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/vumee.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/diy.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5"> 
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/generation-web.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/apps-business.png">    
                       </figure>
                   </div>
                   <div class="gallery-columns-5">
                       <figure>
                           <img alt="" src="<?php echo get_stylesheet_directory_uri() ?>/img/clients/kitchen-cabinet.png">    
                       </figure>
                   </div>
               </div>                
            </div>
        </section>
        
        <?php include(locate_template('template-parts/rocket.php')); ?>
       
    </main>
</div>


    <script type="text/javascript">
        $(document).ready(function() {

            // Video 
            var video1Player = videojs('#video1');
            var video2Player = videojs('#video2');
            var video3Player = videojs('#video3');
            var video4Player = videojs('#video4');
            $('.video-item-wrap .video-item#aronSmith').click(function(){
                $('.videoWrapper .video-js').hide();
                $('.videoWrapper #video1').show();
                //video1Player.play();
                video2Player.pause();
                video3Player.pause();
                video4Player.pause();
                $('.video-item').removeClass('active');
                $(this).addClass('active');
            });
            $(".video-item-wrap .video-item#danielBox").click(function() {
                $('.videoWrapper .video-js').hide();
                $('.videoWrapper #video2').show();
                video1Player.pause();
                video2Player.play();
                video3Player.pause();
                video4Player.pause();
                $('.video-item').removeClass('active');
                $(this).addClass('active'); 
            });
            $(".video-item-wrap .video-item#leeBarrett").click(function() {
                $('.videoWrapper .video-js').hide();
                $('.videoWrapper #video3').show();
                video1Player.pause();
                video2Player.pause();
                video3Player.play();
                video4Player.pause();
                $('.video-item').removeClass('active');
                $(this).addClass('active'); 
            });		 
            $(".video-item-wrap .video-item#williamWillLopez").click(function() {
                $('.videoWrapper .video-js').hide();
                $('.videoWrapper #video4').show();
                video1Player.pause();
                video2Player.pause();
                video3Player.pause();
                video4Player.play();
                $('.video-item').removeClass('active');
                $(this).addClass('active'); 
            });			
            $("#client-testimonial").owlCarousel({
                items: 3,
                
                itemsDesktop : [1199, 3],
                itemsDesktopSmall : [979, 3],
                itemsTablet : [768, 2],
                itemsTabletSmall : false,
                itemsMobile : [639, 1],
                
                
                pagination: false,
                navigation: true,
                autoPlay: true,
                navigationText: ["<i class='icon-arrow-left'></i>", "<i class='icon-arrow-right'></i>"]
            });

            $(".video-item-wrap").owlCarousel({
                autoPlay: 3000,
                items : 4,
                dragBeforeAnimFinish: false,
                mouseDrag: true,
                touchDrag: true,
                autoPlay: false,
                navigation : false,
                pagination : false,
                itemsDesktop : [1199, 4],
                itemsDesktopSmall : [979, 4],
                itemsTablet : [768, 4],
                itemsMobile : [767, 4],
              });
            // testimonal slider 
            //==================
            var urlNo = location.hash.split('#')[1]
              if ( urlNo == 0 || urlNo == 1 || urlNo == 2 || urlNo == 3 ) {
                  owl = $(".video-item-wrap").data('owlCarousel');
                  owl.jumpTo(urlNo);
                  $('.video-item-wrap .video-item').eq(urlNo).click();
              }else{
                 $('.video-item-wrap .video-item').eq(0).click();
              } 
         });
        </script>

<?php get_footer(); ?>
