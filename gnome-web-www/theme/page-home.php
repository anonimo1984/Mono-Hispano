<?php


add_action('wp_head', function() {
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_bloginfo('template_url').'/css/home.css" />';
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_bloginfo('template_url').'/css/news.css" />';
});

/*
 * Add link to global feeds instead of current page comments
 */
automatic_feed_links(false);
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; Feed" href="'.home_url('/').'feed/" />'; 
});

require_once("header.php"); ?>

    <!-- container -->
    <div id="container" class="two_columns">

        <div class="container_12">
            
            <div class="grid_12">
            
            <?php
            
            $temp_query = clone $wp_query;
            
            query_posts(array('post_type' => 'banners', 'posts_per_page' => 1));
            
            ?>

            <!-- home banner -->
            <div id="home_banner">
                <?php
                while ( have_posts() ) : the_post();
                
                $home_link = get_post_meta($post->ID, 'link', true);
                if($home_link != '') { echo '<a href="'.$home_link.'">'; }
                the_post_thumbnail(array(940, 280), array('alt' => get_the_excerpt($post->ID), 'title' => get_the_title($post->ID)));
                if($home_link != '') { echo '</a>'; }
                
                ?>
                <h2><?php the_title(); ?></h2>
                <p class="main_feature"><?php the_excerpt(); ?></p>
                <?php endwhile; ?>
            </div>
            
            <p style="text-align: center;">
                <a class="action_button" href="http://library.gnome.org/misc/release-notes/3.2/">Read the Release Notes</a>
                <a class="action_button" href="/gnome-3/">Discover GNOME 3</a>
            </p>
            
            <hr class="bottom_shadow" />
            
            <?php
            $wp_query = clone $temp_query;
            ?>
            
            
            </div>
            
            <div class="clear"></div>
            
            <div class="grid_12" style="margin-top: -20px; margin-bottom: -20px;">
                
                    <div class="grid_6 alpha">
                        <h4>We make great software available to all.</h4>
                        
                        <p>GNOME is an international community dedicated to making
                        great software that anyone can use, no matter what language
                        they speak or their technical or physical abilities.</p>
                        
                        <p><a class="more" href="/about/">About the GNOME Project</a></p>
                    </div>
                    
                    <div class="grid_6 omega">
                        <h4>Make a donation and become a Friend of GNOME!</h4>
                        <p>Your donation will ensure that GNOME continues to be a free and open source
                        desktop by providing resources to developers, software and education for end
                        users, and promotion for GNOME worldwide.</p>
                        <p><a class="more" href="http://www.gnome.org/friends/">Become a friend of GNOME</a></p>
                    </div>
                    
                    

                    <div class="clear"></div>
            
            </div>
            
            <div class="grid_12">
                
                <hr class="top_shadow" />
            
                <?php
                
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                
                ?>
                
                <div class="grid_8 alpha">
                    <h2 style="margin-top: 0;">Latest news</h2>
                    
                    
                    <div class="news_list">
                    
                        <?php
                        
                        query_posts(array('post_type' => 'post', 'posts_per_page' => 3));
                        
                        while ( have_posts() ) : the_post();
                        ?>
                            <div class="news">
                                <span class="date">
                                    <?php the_date(); ?>
                                </span>
                                
                                <a href="<?php the_permalink(); ?>">
                                    <strong><?php the_title(); ?></strong><br />
                                    <?php echo strip_tags(get_the_excerpt()); ?>
                                </a>
                            </div>
                        <?php
                        $i++;
                        endwhile;
                        ?>
                        
                        <p><a href="/news/" class="action_button">Older news...</a></p>
                    </div>
                    
                </div>
                
                <div class="grid_4 omega">
                    
                    <div class="about_box">
                        <h4>Get involved!</h4>
                        <p>The GNOME Project is a diverse international community which involves hundreds of contributors, many of whom are volunteers. Anyone can contribute to the GNOME!</p>
                        <p><a class="more" href="/get-involved/">Get involved</a></p>
                    </div>
                    
                    <div class="subtle_box" style="padding: 20px;">
                        <h4>Connect with us</h4>
                        
                        <div class="social_network_icons">
                            <ul>
                                <li>
                                    <a href="http://identi.ca/gnome">
                                        <img src="<?php bloginfo('template_url')?>/images/social_networks/identica.png" alt=" " />
                                        Identi.ca
                                    </a>
                                </li>
                                <li>
                                    <a href="http://twitter.com/gnome">
                                        <img src="<?php bloginfo('template_url')?>/images/social_networks/twitter.png" alt=" " />
                                        Twitter
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.facebook.com/GNOMEDesktop">
                                        <img src="<?php bloginfo('template_url')?>/images/social_networks/facebook.png" alt=" " />
                                        Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            
            </div>            
        <?php require_once("footer_art.php"); ?>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
