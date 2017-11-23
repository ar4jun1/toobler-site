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
Template Name: Blog details

*/
 

get_header(); ?>

 <div class="blog-main-wrapper">
    <div class="blog details">


    <?php

        global $post;
        $myposts    = get_post($post->ID);
   ?>
    
            <div class="blog-tittle">
                <span class="sub-text"><?php echo html_entity_decode(get_field('blog_sub_text')); ?></span>
                <h2 class="blog-head-text"><?php echo html_entity_decode(get_field('blog_head_text')); ?> </h2>
                <div class="author-block">
                    <figure class="author-image"></figure>
                    <div class="info">
                        <div class="name">
                            <!-- <small>By</small><a href="#"><?php echo html_entity_decode(get_field('blog_author_name')); ?></a> -->
                            <small>By</small><a href="#"></a>
                        </div>
                        <div class="blog-date">
                           <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php if(get_field('blog_caption')): ?> 
            <div class="blog-caption">
                <p><?php echo html_entity_decode(get_field('blog_caption')); ?></p>
            </div>
        <?php endif; ?>

        <?php if(get_field('blog_content_first')): ?> 
            <div class="blog-content">
                <?php echo html_entity_decode(get_field('blog_content_first')); ?>
            </div>
        <?php endif; ?>

            <div class="bolg-email-block">
                <div class="info">
                    <h5><?php echo html_entity_decode(get_field('blog_emailBlock')); ?></h5>
                    <div class="common-form">
                        <div class="form-group">
                            <input placeholder="Enter your email address" class="form-control" type="text">
                            <button type="submit" class="btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php if(get_field('blog_content_second')): ?> 
            <div class="blog-content">
                <?php echo html_entity_decode(get_field('blog_content_second')); ?>
            </div>
        <?php endif; ?>

        <?php if(get_field('blog_tags_dt')): ?> 
            <div class="blog-subject">
                <div class="layout-wrapper">
                    <div class="layout-sm-10 layout-md-11">
                        <div class="subject-name">
                            <?php
                                $_explodeTtles= explode(",", html_entity_decode(get_field('blog_tags_dt'))); 
                                if($_explodeTtles){
                                    foreach ($_explodeTtles as $_explodeTtle) { ?>
                                        <a href="#"><?php echo $_explodeTtle; ?></a>
                                    <?php }
                                }  
                            ?>
                        </div>
                    </div>
                    <div class="layout-sm-2 layout-md-1">
                        <a class="share-block icon-share" href="#"></a>
                    </div>
                </div>
            </div> 
        <?php endif; wp_reset_postdata(); ?>            

        </div>
    </div>

    
    <section class="blog-comment-section">
        <div class="blog-main-wrapper">
            <div class="latest-stories">
                <h5>Latest stories</h5>
                <ul class="stories-block">

                 <?php $catId = get_cat_ID('blogOg');
                    $args1 = array( 'posts_per_page' => 3,'post__not_in'=>array($post->ID), 'category' => $catId );
                    $myposts1 = get_posts( $args1 );

                    foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>
                        <li>
                            <span class="count">1</span>
                            <div class="stories-list">
                                <a href="<?php the_permalink() ?>"><?php echo html_entity_decode(get_field('blog_head_text')); ?> </a>
                                <p><?php echo substr(html_entity_decode(get_field('blog_caption')), 0,90); if(strlen(get_field('blog_caption'))>90) echo '...' ?></p>
                            </div>
                        </li>

                    <?php endforeach; 
                    wp_reset_postdata(); ?>                    
                </ul>
            </div>
            <!--<div class="comments-area">
                <div class="comment-box">
                    <h6 class="comment-tittle">10 Comments</h6>
                    <div class="common-form">
                        <form action="" class="form-group">
                            <div class="form-group">
                                <textarea class="form-control" type="text"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->
        </div>
    </section>

    

    </body>

</html>