



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
Template Name: Blog

*/
 

get_header(); ?>

<div class="blog-main-wrapper">
   
    <!--Blog Banner-->
    <?php  
        $New = new WP_Query( array( 'post_type' => 'slider','name'=>'blog_slider', 'posts_per_page' =>1) ); 
        $i=1;
        while ( $New->have_posts() ) : $New->the_post();   
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
    ?>

        <div class="banner">
            <figure>
                <img src="<?php echo $thumb['0'] ?>">
            </figure>
            <div class="content">
                <h4><a href="#"><?php the_title(); ?></a></h4>
                 <p><?php echo substr(get_the_excerpt(), 0,150); if(strlen(get_the_excerpt())>150) echo '...' ?></p>
                 <?php if(strlen(get_the_excerpt())>150): ?>
                <a href="#" class="blog-read">Read More<i></i></a>
              <?php endif; ?>
            </div>
        </div> 
    <?php $i++;  endwhile;  ?>

    <!--Blog post-->
    <div class="blog-post-wrapper">
       <div class="layout-wrapper">

      <?php  
          $blogPost = new WP_Query( array( 'post_type' => 'blog_cpt', 'meta_key'=>'custom_category_blog','meta_value'  => 'blog_post_blok','posts_per_page' =>2) );
          $i=1;
          while ( $blogPost->have_posts() ) : $blogPost->the_post();   
          $blogPostImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
      ?>

        <div class="layout-sm-6">
            <div class="post-blok">
                <figure>
                     <img src="<?php echo $blogPostImg['0']; ?>">
                </figure>
                <div class="content">
                     <h5><a href="#"><?php echo html_entity_decode(get_field('custom_links')); ?></a></h5>
                       <?php the_content(); ?>
                <a href="#" class="blog-read">Read More<i></i></a>
                </div>
            </div>
        </div>
         <?php $i++;  endwhile;  ?>
        
        </div>
    </div>  
       
    <div class="blog-list">
        <ul>

      <?php  
          $blogPostList = new WP_Query( array( 'post_type' => 'blog_cpt', 'meta_key'=>'custom_category_blog','meta_value'  => 'blog_post_list','posts_per_page' =>20) );
          $i=1;
          while ( $blogPostList->have_posts() ) : $blogPostList->the_post();   
          $blogPostListImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'client_testimonial' );
      ?>

           <li>
               <a href="#"><?php echo html_entity_decode(get_field('custom_links')); ?> </a>
               <p><?php echo substr(get_the_excerpt(), 0,75); if(strlen(get_the_excerpt())>75) echo '...' ?></p>
           </li>
         <?php $i++;  endwhile;  ?>

       </ul>
       <?php if($i > 9): ?>
           <span class="blog-older">
               <a href="#">Load More<i class="wide-arrow-right"></i></a>
           </span>
        <?php endif; ?>
    </div> 
    
</div>

    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery-2.2.4.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/navigation.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/main.js"></script>

<?php get_footer(); ?>
