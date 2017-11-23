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
        <div class="copyright">&copy; Toobler Technologies. <a href="#">Privacy Policy </a></div>
        <div class="social-shares">
            <a href="https://twitter.com/toobler?lang=en" class="icon-twitter"></a>
            <a href="https://www.linkedin.com/company/toobler" class="icon-linkedin"></a>
            <a href="https://www.facebook.com/TooblerTechnologies/" class="icon-fb"></a>
        </div>
    </div>
</footer>		
						<!-- TOOBLER FOOTER CLOSE -->

		
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php
 wp_footer(); ?>

</body>
</html>