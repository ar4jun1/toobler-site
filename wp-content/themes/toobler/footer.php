<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tooblers
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

						<!-- TOOBLER FOOTER OPEN -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="layout-container">
        <div class="footer-nav">
            <div class="menu-footer-menu-container">
               <!--  <ul id="menu-footer-menu" class="menu">
                    <li><a href="#">home</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Case Studies</a></li>
                </ul> -->
                <?php wp_nav_menu(
                      array(
                        'theme_location'  => 'secondary',
                          'container'=>'ul',
                          'menu_class'=>'nav navbar-nav navbar-right'
                        )
                    ); ?>
            </div>
        </div>
        <div class="copyright">&copy; 2017  Toobler Technologies. <a href="<?php echo getPageUrl('template_privacy_policy.php'); ?>">Privacy Policy </a></div>
        
        <div class="social-shares">
            <a href="https://twitter.com/toobler?lang=en" class="icon-twitter"></a>
            <a href="https://www.linkedin.com/company/toobler" class="icon-linkdin"></a>
            <a href="https://www.facebook.com/TooblerTechnologies/" class="icon-facebook"></a>
        </div>
    </div>
</footer>		
						<!-- TOOBLER FOOTER CLOSE -->

		
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php

/**
     * get page url respect to page teamplates
     */
    function getPageUrl($meta_value = "", $returnId = false){

        $result_page_url = '';
        $id = "";
        if($meta_value){
            $result_pages = get_pages(
                    array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => $meta_value
                    )
            );
            if($result_pages){
                $first_page = reset($result_pages);
                $id = $first_page->ID;
                $result_page_url = get_permalink($first_page->ID);
            }
        }
        if($returnId){
            return $id ;
        }else{
            return $result_page_url;
        }
        
    }


 wp_footer(); ?>

</body>
</html>
