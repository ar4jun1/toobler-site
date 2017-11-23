



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


    <!--Blog Banner-->

  <?php $catId = get_cat_ID('Blog-banner');
          $args1 = array( 'posts_per_page' => 1, 'category' => $catId );
          $Blogbannersub = get_posts( $args1 );
          $i = 0;
          foreach ( $Blogbannersub as $post ) : setup_postdata( $post ); $i++;?>
            <div class="featured-blog">
                <img alt="" src="<?php the_post_thumbnail(); ?>">
                <div class="content">
                    <div class="layout-container">
                        <div class="featured-article-label">Featured Article</div>
                        <h4><a href="<?php the_permalink() ?>"><?php echo html_entity_decode(get_field('blog_head_text')); ?></a></h4>

                        <?php /*if(get_field('blog_content_first')): */?> 
                            <!--<p>-->
                              <?php /* echo substr(strip_tags(get_field('blog_content_first')), 0,150); if(strlen(strip_tags(get_field('blog_content_first')))>150) echo '...'*/ ?> 
                            <!--</p>-->
                        <?php /*endif; */ ?>
                        
                        
                        <div class="published-by">Published by <a href="<?php the_permalink() ?>"><?php echo get_the_author(); ?></a></div>
                    </div>
                </div>
            </div> 

    <?php endforeach; 
          wp_reset_postdata();
    ?>
   
<div class="blog-main-wrapper">

    <!--Blog post-->
    <div class="blog-post-wrapper blog-landing">
       <div class="blog-block-title">Top Posts</div>
       <div class="layout-wrapper">
       <?php $catId = get_cat_ID('Blog-banner-sub');
          $args1 = array( 'posts_per_page' => 2, 'category' => $catId );
          $Blogbannersub = get_posts( $args1 );
          $i = 0;
          foreach ( $Blogbannersub as $post ) : setup_postdata( $post ); $i++;?>
            <div class="layout-sm-6">
              <div class="post-blok">
                  <figure>
                       <img alt="" src="<?php the_post_thumbnail(); ?>">
                  </figure>
                  <div class="content">
                       <h5><a href="<?php the_permalink() ?>"><?php echo html_entity_decode(get_field('blog_sub_text')); ?></a></h5>
                       <div class="post-by">By<a href="<?php the_permalink() ?>"><?php echo get_the_author(); ?></a></div>
                         <?php echo html_entity_decode(get_field('blog_head_text')); ?>
                  <a href="<?php the_permalink() ?>" class="blog-read">Read More  <i class="icon-arrow-right"></i></a>
                  </div>
              </div>
            </div>
          <?php endforeach; 
              wp_reset_postdata();
          ?>
          </div>
    </div>
    <div class="blog-list">
        <div class="blog-block-title">Latest Posts</div>
        <ul>

     
      <?php $catId = get_cat_ID('blogOg');
          $args1 = array( 'posts_per_page' => 3, 'category' => $catId );
          $myposts1 = get_posts( $args1 );
          $i = 0;
          foreach ( $myposts1 as $post ) : setup_postdata( $post ); $i++;?>

           <li>
               <a href="<?php the_permalink() ?>"><?php echo html_entity_decode(get_field('blog_head_text')); ?> </a>
               <p><?php echo substr(get_field('blog_caption'), 0,75); if(strlen(get_field('blog_caption'))>75) echo '...' ?></p>
           </li>
        <?php endforeach; 
              wp_reset_postdata();
        ?>
       <?php if($i > 9): ?>
           <li class="blog-older">
               <a href="#">Load More<i class="wide-arrow-right"></i></a>
           </li>
        <?php endif; ?>
       </ul>
    </div> 
    
</div>

<?php get_footer(); ?>
