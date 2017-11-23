
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
Template Name: Services Detail

*/
 

get_header(); ?>
    <?php

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
            
             <section class="values-live">
                <div class="layout-container">
                    <div class="our-vision-intro">
                        <?php echo html_entity_decode(get_field('our-vision-intro')); ?>
                    </div>
                    <div class="layout-wrapper">
                        <div class="layout-sm-6  layout-lg-4">
                            <div class="tittle">
                                <span>
                           The Values <br> We Live By
                           <i class="icon-line-arrow-right"></i>
                           </span>
                            </div>
                        </div>
                        <div class="layout-xs-6 layout-lg-4">
                            <div class="block">
                                <div class="info">
                                    <span class="icon-idea"></span>
                                    <div class="grid-content">
                                        <h4>Idea</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layout-xs-6  layout-lg-4">
                            <div class="block">
                                <div class="info">
                                    <span class="icon-interaction"></span>
                                    <div class="grid-content">
                                        <h4>Interaction Design</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layout-xs-6 layout-lg-4">
                            <div class="block">
                                <div class="info">
                                    <span class="icon-visual-design"></span>
                                    <div class="grid-content">
                                        <h4>Visual Design</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layout-xs-6 layout-lg-4">
                            <div class="block">
                                <div class="info">
                                    <span class="icon-quality-analysis"></span>
                                    <div class="grid-content">
                                        <h4>Quality Analysis</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layout-xs-6 layout-lg-4">
                            <div class="block">
                                <div class="info">
                                    <span class="icon-engineering"></span>
                                    <div class="grid-content">
                                        <h4>Engineering</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="wireframe-and-prototype">
                <div class="layout-container">
                    <div class="wrap-block">
                        <?php $image = get_field('services_main_image');?>
                        <div class="media-block"><img src="<?php echo $image['url']; ?>" alt=""></div>
                        <div class="content-block">
                            <h5 class="how-we-do">How we do it</h5>
                            <h2><?php echo html_entity_decode(get_field('services_main_heading')); ?></h2>
                            <div class="sub-title"><?php echo html_entity_decode(get_field('services_sub_heading')); ?></div>
                            <?php echo html_entity_decode(get_field('services_main_content')); ?>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="ux-for-startups">
                <div class="layout-container">
                    <div class="wrap-block">
                        <h2><?php echo html_entity_decode(get_field('services_main_heading2')); ?></h2>
                        <?php echo html_entity_decode(get_field('services_main_content2')); ?>

                        <figure>
                            <?php $image2 = get_field('services_main_image2');?>
                            <img src="<?php echo $image2['url']; ?>" alt="">
                        </figure>
                        
                        <ul class="ux-faq">
                            <?php echo html_entity_decode(get_field('sd_faq')); ?>
                        </ul>
                    </div>
                </div>
            </section>
            
            <?php include(locate_template('template-parts/rocket.php')); ?>


        </main>
    </div>

    <!--<script src="js/lib/bootstrap.min.js"></script>-->
    <script src="js/navigation.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        $(document).ready(function(){ 
            
        });
    </script>
    
<?php get_footer(); ?>
