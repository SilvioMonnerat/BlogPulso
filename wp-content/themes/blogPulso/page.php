<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Pages Template
 *
 *
 * @file           page.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

    <div id="content" class="grid col-620">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <h1 class="post-title"><?php the_title(); ?></h1>
 
                <?php //if ( comments_open() ) : ?>               
                <div class="post-meta">
                <?php //responsive_post_meta_data(); ?>
                
				    <?php //if ( comments_open() ) : ?>
                        <!-- <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'responsive'), __('1 Comment &darr;', 'responsive'), __('% Comments &darr;', 'responsive')); ?>
                        </span> -->
                    <?php //endif; ?> 
                </div><!-- end of .post-meta -->
                <?php //endif; ?> 
                
                <div class="post-entry">
                    <?php the_content(__('leia mais', 'responsive')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
            
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php endwhile; ?> 
    <?php endif; ?>  
      
        </div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
