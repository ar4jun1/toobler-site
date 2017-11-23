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
Template Name: Services

*/
?>
    
<?php
    get_header();

        global $post;
        $myposts    = get_post($post->ID);
?>

    <!--Main-->
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <!--About Banner-->
            <section class="c-inner-banner">
                <div class="banner-info">
                    <?php 
                    $banner_text = $myposts->post_content; 
                    echo html_entity_decode($banner_text);
                    ?>
                </div>
                <img src="<?php the_post_thumbnail(); ?>" alt="">
            </section> 
            
            <section class="services-anchors">
                <div class="layout-container">
                    <ul>
                    <?php wp_reset_postdata();
                    $catId = get_cat_ID('services-details');
                    $args1 = array( 'posts_per_page' => 6, 'category' => $catId );
                    $myposts1 = get_posts( $args1 );
                    // print_r($myposts1); die("p");

                    foreach ( $myposts1 as $post ) : setup_postdata( $post );
                    if(get_field('sd_menu_name')) : ?>
                        <li>
                        <?php $menuid= str_replace(' ', '-', get_field('sd_menu_name')); ?>
                            <a href="#<?php echo $menuid; ?>"><?php echo html_entity_decode(get_field('sd_menu_name')); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php 
                    endforeach; 
                    wp_reset_postdata(); ?>  
                        
                    </ul>
                </div>
            </section>
            
            <section class="services-content-block">
                <div class="layout-container">
                <?php wp_reset_postdata();
                    $catId1 = get_cat_ID('services-details');
                    $args2 = array( 'posts_per_page' => 6, 'category' => $catId1 );
                    $myposts2 = get_posts( $args2 );

                    foreach ( $myposts2 as $post ) : setup_postdata( $post ); ?>
                    <?php $menuid= str_replace(' ', '-', get_field('sd_menu_name')); ?>
                    <?php $image = get_field('sd_summary_image');?>
                    <?php if(get_field('sd_menu_name')) : ?>
                    <div class="services-grid-item" id="<?php echo $menuid; ?>">
                        <div class="media-block">
                            <img src="<?php echo $image['url']; ?>" alt="">
                        </div>
                        <div class="content-block">
                            <?php 
                                echo html_entity_decode(get_field('service_datail_summary')); 
                            ?>
                            <ul class="icon-list">
                            <?php $lists = get_field('sd_summary_list'); 
                            $explodes = explode('-', $lists);
                            foreach ($explodes as  $explode) { ?>
                                 
                                <li><?php echo $explode; ?></li>
                            <?php   }  ?>
                                
                            </ul>
                            <a href="<?php the_permalink() ?>" class="primary-more-btn">Learn More</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php 
                    endforeach; 
                    wp_reset_postdata(); ?>  
                     
                    
                    
                </div>
            </section>

        <?php include(locate_template('template-parts/rocket.php')); ?>
        </main>
    </div>
   
   
    
    <script>
        $(document).ready(function(){
           $('.services-anchors li a').click(function(e){
              var linkLoc =  $(this).attr("href"),
                  excludeValue = $('.site-header').height() + $('.services-anchors').height();
              $('html,body').animate({
                  scrollTop: $(linkLoc).offset().top -  excludeValue - 15
              }, 300);
              e.preventDefault();
           }); 
           
           function stickyNav(){
               var bannerHeight = $('.c-inner-banner').height()
               if( $(window).scrollTop() > bannerHeight ){
                   $('.site-header').addClass('remove-shadow');
                   $('.services-anchors').addClass('is-sticky');
               }else{
                   $('.services-anchors').removeClass('is-sticky');
                   $('.site-header').removeClass('remove-shadow');
               }
           }
            //init on loading
            stickyNav();

            //play on scrolling
            $(window).on('scroll', stickyNav);

           
        });
    </script>
    
<?php get_footer(); ?>
