<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Tooblesr
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>



<dsiv id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!--Home Banner-->       
        <section class="main-banner">            
            <div class="owl-carousel" id="main-banner">
                <div class="item">
                    <div class="banner-content">
                        <h1>Digital transformation driven by out-thought solutions.</h1>
                        <p>We scale your business helping you stay out in front with agile and responsive approaches.</p>  
                        <a href="#" class="lg secondary-btn-outline">Read more</a>
                        <a href="#" class="lg primary-btn">Get Started</a>                 
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-01-a.jpg">
                </div>
                <div class="item">
                    <div class="banner-content">
                        <h1>Digital transformation driven by out-thought solutions.</h1>
                        <p>We scale your business helping you stay out in front with agile and responsive approaches.</p>   
                        <a href="#" class="lg secondary-btn-outline">Read more</a>
                        <a href="#" class="lg primary-btn">Get Started</a>                                 
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-01-a.jpg">
              </div>
            <div class="item">
                <div class="banner-content">
                    <h1>Digital transformation driven by out-thought solutions.</h1>
                    <p>We scale your business helping you stay out in front with agile and responsive approaches.</p> 
                    <a href="#" class="lg secondary-btn-outline">Read more</a>
                    <a href="#" class="lg primary-btn">Get Started</a>                                
                </div>                   
                  <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-01-a.jpg">
            </div>                
            </div>
        </section>
        
        <!--Welcome-->
        <section class="home-sub-info">
            <div class="layout-container">
                <p class="info">
                    At Toobler, we believe innovative solutions to complex business problems require mastery of multiple disciplines. Our experience strategy, experience design, technology, delivery and agile transformation practices work together to embody one unique experience from concept to deployment. When teams are made from the best consultants and practitioners in the industry, our clients can expect the best. With Toobler, you can be confident in realizing a seamless, meaningful solution - one that drives value for your business, your employees and your customers. A solution that delivers on the power of experience.
                </p>
            </div>    
        </section>  
          
        <!--Project-->
        <section class="portfolio-home"> 
            <div class="layout-container">
                <div class="medium-grid">      
                   <div class="portfolio-grid">
                        <aside class="grid">
                            <figure><img src="img/portfolio/portfolio-01.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                        <aside class="grid">
                            <figure><img src="img/portfolio/portfolio-02.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                        <aside class="grid">
                            <figure><img src="img/portfolio/portfolio-03.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                        <aside class="grid grid-2x">
                            <figure><img src="img/portfolio/portfolio-04.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                        <aside class="grid">
                            <figure><img src="img/portfolio/portfolio-05.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                        <aside class="grid">
                            <figure><img src="img/portfolio/portfolio-06.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                        <aside class="grid">
                            <figure><img src="img/portfolio/portfolio-07.jpg" alt=""></figure>
                            <div class="grid-content">
                               <div class="portfolio-block">
                                   <div class="contnet">
                                       <h3>The Hotel</h3>
                                       <p>Tablet application for on demand room services in Hotels for Australia</p>
                                       <span class="secondary-btn-outline">
                                            <a href="#" class="btn">Explore</a>   
                                       </span>
                                   </div>                                    
                               </div>
                            </div>
                        </aside>
                </div>
                </div>   
            </div>
        </section>
        
        <!--What we do--> 
        <section class="what-we-do">            
            <div class="layout-container">
                <h2>What We Do</h2>
                    <div class="medium-grid">                      
                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon icon-web"><img src="img/web-application-icon.png"></i>
                                <div class="grid-content">
                                    <h3>Web Application Development</h3>
                                    <ul class="list">
                                        <li>Market Analysis</li>
                                        <li>Opportunity Identification</li>
                                        <li>Facilitated Ideation</li>
                                        <li>Business Modeling</li>
                                        <li>Journey and Service Mapping </li>
                                    </ul>
                                    <a href="#" class="more-btn">Lern More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon icon-web"><img src="img/native-app-icon.png"></i>
                                <div class="grid-content">
                                    <h3>Native Apps for Mobile & Tablet</h3>
                                    <ul class="list">
                                        <li>Market Analysis</li>
                                        <li>Opportunity Identification</li>
                                        <li>Facilitated Ideation</li>
                                        <li>Business Modeling</li>
                                        <li>Journey and Service Mapping </li>
                                    </ul>
                                    <a href="#" class="more-btn">Lern More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon icon-web"><img src="img/cloud-ico.png"></i>
                                <div class="grid-content">
                                    <h3>Cloud for Businesses</h3>
                                    <ul class="list">
                                        <li>Market Analysis</li>
                                        <li>Opportunity Identification</li>
                                        <li>Facilitated Ideation</li>
                                        <li>Business Modeling</li>
                                        <li>Journey and Service Mapping </li>
                                    </ul>
                                    <a href="#" class="more-btn">Lern More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon icon-web"><img src="img/user-experience.png"></i>
                                <div class="grid-content">
                                    <h3>User Experience Design</h3>
                                    <ul class="list">
                                        <li>Market Analysis</li>
                                        <li>Opportunity Identification</li>
                                        <li>Facilitated Ideation</li>
                                        <li>Business Modeling</li>
                                        <li>Journey and Service Mapping </li>
                                    </ul>
                                    <a href="#" class="more-btn">Lern More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon icon-web"><img src="img/iot-icon.png"></i>
                                <div class="grid-content">
                                    <h3>IoT
(Internet of Things)</h3>
                                    <ul class="list">
                                        <li>Market Analysis</li>
                                        <li>Opportunity Identification</li>
                                        <li>Facilitated Ideation</li>
                                        <li>Business Modeling</li>
                                        <li>Journey and Service Mapping </li>
                                    </ul>
                                    <a href="#" class="more-btn">Lern More</a>                                                                     
                                </div>  
                            </div>
                        </div>  
                        <div class="col layout-md-6 layout-lg-4">
                            <div class="service-block">
                              <i class="service-icon icon-web"><img src="img/big-data-icon.png"></i>
                                <div class="grid-content">
                                    <h3>Big Data</h3>
                                    <ul class="list">
                                        <li>Market Analysis</li>
                                        <li>Opportunity Identification</li>
                                        <li>Facilitated Ideation</li>
                                        <li>Business Modeling</li>
                                        <li>Journey and Service Mapping </li>
                                    </ul>
                                    <a href="#" class="more-btn">Lern More</a>                                                                     
                                </div>  
                            </div>
                        </div>                            
                    </div> 
            </div>
        </section>
        
         <!--New Case Study-->    
        <section class="home-case-study"> 
            <div class="layout-container">
                <div class="grid">                  
                        <div class="layout-sm-5 layout-md-5 layout-lg-5">
                            <h5>NEW CASE STUDY</h5>
                            <h3>GoSite Website Builder</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.
                            </p>
                            <a href="#" class="btn-primary">View Case Study</a>
                        </div>
                        <div class="case-screen">
                           <img src="img/new-case-study.png">
                        </div>                    
                </div>
            </div>
        </section>        
        
         <!--inspired section-->
        <section class="inspired-section">        
            <div class="layout-container">
                <div class="tittle">
                    <h4>Be inspired</h4>
                    <a href="#">BROWSE OUR JOURNAL</a>
                </div>
                <div class="grid">
                    <div class="layout-sm-12  layout-md-8 layout-lg-8">                                       
                        <div class="block inspired-details">                         
                            <div class="info">
                                 <h3>Does it make sense 
deploying Swift instead of Java in Android? </h3>
                                 <div class="content">25th October 2016 <a href="#">Read more<i class="arrow-right"></i></a></div>
                            </div>
                            <div class="inspire-image">
                                 <img src="img/inspired-01.jpg">
                            </div>                        
                        </div> 
                    </div>
                    <div class="layout-sm-12  layout-md-4 layout-lg-4">
                        <div class="inspired-sub">                  
                            <div class="block sub-details">                            
                                 <div class="info">
                                     <h3>Finally !!! CSS Variable has arrived. </h3>
                                     <div class="content">25th October 2016 <a href="#"><i class="arrow-right"></i></a></div>
                                 </div>
                                 <div class="inspire-image">
                                   <img src="img/inspired-01-a.jpg">
                                 </div>                  
                            </div>
                        </div>
                        <div class="inspired-sub">                 
                            <div class="block sub-details">                             
                                 <div class="info">
                                     <h3>How to migrate from Parse to MongoDB and AWS?</h3>
                                    <div class="content">25th October 2016 <a href="#"><i class="arrow-right"></i></a></div>
                                 </div>
                                 <div class="inspire-image">
                                     <img src="img/inspired-01-b.jpg">
                                 </div>                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         
        <!--Client say-->
        <section class="client-say">
             <div class="layout-container">
                 <div class="layout-lg-4">
                   <div class="about">
                        <h2>What They Say About us</h2>
                        <a href="#">Go to testimonials</a>    
                   </div>
                 </div>   
                 <div class="layout-lg-8">
                    <div class="test-block">
                        <div class="owl-carousel" id="client-say">
                        <div class="item">
                           <div class="info">
                                <p>I believe that Toobler provided me the highest level of communication & coding during my product development. The world h.as greatly benefited from hands of their 
                                innovative team!
                                </p>
                            </div>
                            <div class="testimonial-user">
                                <div class="user-image"></div>
                                <div class="user-name">
                                    Lee Barrett
                                    <small>Founder, Shopbox UK</small>
                                </div>
                            </div>
                            <span class="play-icon"></span>
                            <div class="video-block" id="video-block">
                                1
                            </div>
                        </div>
                         <div class="item">
                           <div class="info">
                                <p>I believe that Toobler provided me the highest level of communication & coding during my product development. The world h.as greatly benefited from hands of their 
                                innovative team!
                                </p>
                            </div>
                            <div class="testimonial-user">
                                <div class="user-image"></div>
                                <div class="user-name">
                                    Lee Barrett
                                    <small>Founder, Shopbox UK</small>
                                </div>
                            </div>
                            <span class="play-icon"></span>
                           <div class="video-block" id="video-block">
                                1
                            </div>
                        </div>
                         <div class="item">
                           <div class="info">
                                <p>I believe that Toobler provided me the highest level of communication & coding during my product development. The world h.as greatly benefited from hands of their 
                                innovative team!
                                </p>
                            </div>
                            <div class="testimonial-user">
                                <div class="user-image"></div>
                                <div class="user-name">
                                    Lee Barrett
                                    <small>Founder, Shopbox UK</small>
                                </div>
                            </div>
                            <span class="play-icon"></span>
                           <div class="video-block" id="video-block">
                                1
                            </div>
                        </div>                
                    </div>
                    </div>
                 </div>
             </div>       
        </section>  
        <section class="get-started">
             <div class="layout-container">                 
                <div class="get-info">
                     <h3>Got a project in mind? Okay, lets get Started .</h3>
                     <p>Let's build something great.</p> 
                     <a href="#" class="btn-primary">Get Started</a>                        
                </div>                                                             
             </div>    
        </section>
    </main>
</div>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery-2.2.4.js"></script>
    <!--<script src="js/lib/bootstrap.min.js"></script>-->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/navigation.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/packery.pkgd.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/imagesloaded.pkgd.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/owl.carousel.js"></script>

    <script>
        $(document).ready(function() {            
            
           //Banner    
            $("#main-banner").owlCarousel({
                singleItem : true,
                pagination : true,
                navigation : true,
                autoPlay : true,
                navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
            });
            
            //Client Say    
            $("#client-say").owlCarousel({
                singleItem : true,
                pagination : true,
                navigation : false,
                autoPlay : false,
                navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
            });
            
           // init Packery
            var $grid = $('.portfolio-grid').packery({
              itemSelector: '.grid',
              percentPosition: true,
              gutter: 15
            });
            
            // layout Packery after each image loads
            $grid.imagesLoaded().progress( function() {
              $grid.packery();
            }); 
            
           
        });
    </script>
<?php get_footer();
