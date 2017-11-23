
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
Template Name: Career Details

*/
 

get_header(); ?>
<?php

    global $post;
    $myposts    = get_post($post->ID);
?>


<main id="main">
        <section class="c-inner-banner">
            <div class="banner-info">
                 <?php 
                    $banner_text = $myposts->post_content; 
                    echo html_entity_decode($banner_text);
                ?>
            </div>
           <img src="<?php the_post_thumbnail(); ?>" alt="">
        </section>
        <section class="career-details-block">
            <div class="layout-container"> 
                <h2><?php echo html_entity_decode(get_field('crd_description_heading')); ?></h2>
               <?php echo html_entity_decode(get_field('crd_description')); ?>
                <div class="sub-title"><?php echo html_entity_decode(get_field('crd_experience_required')); ?></div>
                <?php echo html_entity_decode(get_field('crd_experience_description')); ?>
                <h2><?php echo html_entity_decode(get_field('crd_sub_heading')); ?></h2>
                <ul class="icon-list circle-icon-list">
                    <?php echo html_entity_decode(get_field('crd_skills_required')); ?>
                </ul>
                <div class="apply-block">
                    <button class="btn-primary apply-btn">APPLY NOW</button>
                    <button class="btn share-block icon-share" ></button>
                </div>
            </div>
        </section>
        <section class="current-job-openings current-openings-details">
            <div class="layout-container">
                <div class="outer-wrapper">
                    <h4>Related Openings</h4>
                    <ul class="current-openings-list">
                    <?php wp_reset_postdata();
                    $catId = get_cat_ID('career-details');
                    $args1 = array( 'posts_per_page' => 2, 'category' => $catId );
                    $myposts1 = get_posts( $args1 );

                    foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
                        <li>
                            <a href="<?php the_permalink() ?>" class="job-name">Web Developers</a>
                            <span class="location">Infopark, Kochi</span>
                        </li>
                    <?php 
                    endforeach; 
                    wp_reset_postdata(); ?>  
                    </ul>
                </div>
            </div>
        </section>
    </main>    

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

    
</body>

</html>