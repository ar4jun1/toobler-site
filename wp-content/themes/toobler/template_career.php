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
Template Name: career-details

*/
?>
    
<?php
    get_header();

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
                <button class="btn-primary cta-btn see-all-btns">SEE ALL OPENINGS</button>
            </div>
             <img src="<?php the_post_thumbnail(); ?>" alt="">
        </section>
        <section class="career-company-profile">
            <div class="layout-container">
                <div class="our-values-culture">
                    <h3 class="section-title"><?php echo html_entity_decode(get_field('cr_section-title')); ?></h3>
                    <p class="section-para"><?php echo strip_tags(get_field('cr_section-para')); ?></p>
                    <div class="layout-wrapper medium-grid">
                        <aside class="layout-sm-4">
                            <div class="item-block">
                                <span class="icon-block icon-transparency"></span>
                                <h3 class="item-title">Transparency</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. </p>
                            </div>
                        </aside> 
                        <aside class="layout-sm-4">
                            <div class="item-block">
                                <span class="icon-block icon-shake-hands"></span>
                                <h3 class="item-title">Respect</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
                            </div>
                        </aside>
                        <aside class="layout-sm-4">
                            <div class="item-block last">
                                <span class="icon-block icon-football"></span>
                                <h3 class="item-title">Life outside work</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="benefits-perks">
                    <div class="layout-wrapper small-grid">
                        <aside class="layout-md-6">
                            <div class="perk-block first-item">
                             <?php $benefits_imageone = get_field('benefits_imageone');?>
                                <figure class="media-block">
                                    <img src="<?php echo $benefits_imageone['url']; ?>" alt="">
                                </figure>
                            </div>
                            <div class="perk-block">
                             <?php $benefits_imagetwo = get_field('benefits_imagetwo');?>
                                <figure class="media-block">
                                    <img src="<?php echo $benefits_imagetwo['url']; ?>" alt="">
                                </figure>
                            </div>
                        </aside>
                        <aside class="layout-md-6">
                            <div class="perks-content">
                                <h3 class="section-title"><?php echo html_entity_decode(get_field('cr_perks-title')); ?></h3>
                                <p class="section-para"><?php echo html_entity_decode(get_field('cr_perks-para')); ?></p>
                                <ul class="perks-list">
                                    <li>
                                        <div class="list-title"><?php echo html_entity_decode(get_field('cr_benefits_list_one_h')); ?></div>
                                        <p><?php echo html_entity_decode(get_field('cr_benefits_list_one-p')); ?></p>
                                    </li>
                                    <li>
                                        <div class="list-title"><?php echo html_entity_decode(get_field('cr_benefits_list_two_h')); ?></div>
                                        <p><?php echo html_entity_decode(get_field('cr_benefits_list_two_p')); ?></p>
                                    </li>
                                    <li>
                                        <div class="list-title"><?php echo html_entity_decode(get_field('cr_benefits_list_three_h')); ?></div>
                                        <p><?php echo html_entity_decode(get_field('cr_benefits_list_three_p')); ?></p>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <section class="current-job-openings">
            <div class="layout-container">
                <div class="outer-wrapper">
                    <h3 class="section-title"><?php echo html_entity_decode(get_field('cr_current_opening')); ?></h3>
                    <p class="section-para"><?php echo strip_tags(get_field('cr_current_opening_p')); ?></p>
                    <ul class="current-openings-list">
                     	<?php wp_reset_postdata();
	                    $catId = get_cat_ID('career-details');
	                    $args1 = array( 'posts_per_page' => 2, 'category' => $catId );
	                    $myposts1 = get_posts( $args1 );

	                    foreach ( $myposts1 as $post ) : setup_postdata( $post ); ?>

                        <li>
                            <a href="<?php the_permalink() ?>" class="job-name"><?php echo the_title() ; ?></a>
                            <span class="location">Infopark, Kochi</span>
                             <p class="decription"><?php echo strip_tags(substr(get_field('crd_description'), 0,150)); if(strlen(get_field('crd_description'))>150) echo '...' ?></p>
                        </li>
                        <?php 
                    endforeach; 
                    wp_reset_postdata(); ?>  
                    </ul>
                    <div class="no-openings"><?php echo html_entity_decode(get_field('cr_no_openings')); ?></div>
                </div>
            </div>
        </section>
    </main>

     <script type="text/javascript">
        $(document).ready(function(){
            // currentOpenings scroll
            $('.see-all-btns').click(function(e) {
                var currentOpenings = $('.current-job-openings').offset().top - $('.site-header').height() + 4;
                $("html, body").animate({
                    scrollTop: currentOpenings
                });
                e.preventDefault();
            });
        });

    </script>
    <?php get_footer(); ?>
