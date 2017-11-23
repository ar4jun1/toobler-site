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
Template Name: Privacy policy

*/
get_header(); ?>
    <?php

        global $post;
        $myposts    = get_post($post->ID);
    ?>
<div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="cms-page-wrapper">
                <div class="layout-container">
                    <h2 class="page-title">Privacy Policy</h2>

                    <?php 
                        $banner_text = $myposts->post_content; 
                        echo html_entity_decode($banner_text);
                    ?>
                    <ul class="list-unstyled listing-privacy-policy">
                    <?php echo html_entity_decode(get_field('pr_introduction_list')); ?>
                    </ul>

                    <hr/>
                    <?php echo html_entity_decode(get_field('pr_intrduction_sec')); ?>
                    <hr/>


                    <?php echo html_entity_decode(get_field('pr_intrduction_thd')); ?>

                    <ul class="list-unstyled listing-privacy-policy">
                    <?php echo html_entity_decode(get_field('pr_introduction_list_two')); ?>
                    </ul>


                    

                    <hr/>
                    <?php echo html_entity_decode(get_field('pr_intrduction_frth')); ?>
                    
                    <hr/>
                    <?php echo html_entity_decode(get_field('pr_intrduction_vth')); ?>

                         
                </div>
            </div>
             <?php include(locate_template('template-parts/rocket.php')); ?>
             </main>
    </div>
      <script>
        $(document).ready(function(){ 
            
        });
    </script>

 <?php get_footer(); ?>
