<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php 
    setOG();
    get_header(); 
?>

    <div id="content" class="grid col-620">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><?php the_title(); ?></h1>

                <div class="post-meta">
                <?php responsive_post_meta_data(); ?>
				    <!--<?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('Nenhum Comentário', 'responsive'), __('1 Comentário', 'responsive'), __('% Comentários', 'responsive')); ?>
                        </span>
                    <?php endif; ?>--> 
                </div><!-- end of .post-meta -->
                                
                <div class="post-entry">
                    <?php //if ( has_post_thumbnail()) : ?>
                        <?php //the_post_thumbnail('thumb-post'); ?>
                    <?php //endif; ?>

                    <?php the_content(); ?>
                    
                    <div class="post-data">
                        <?php printf(__('Categoria: %s', 'responsive'), get_the_category_list(', ')); ?> 
                    </div><!-- end of .post-data -->

                    <?php if ( get_the_author_meta('description') != '' ) : ?>
                        <div id="author-meta">
                        <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                            <div class="about-author"><?php _e('','responsive'); ?> <?php the_author_posts_link(); ?></div>
                            <p><?php the_author_meta('description') ?></p>
                            <div class="author-twitter">
                                <a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt" data-count="vertical">Tweetar</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                            </div>
                            <div class="author-facebook">
                                <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-width="100" data-show-faces="true" data-font="arial"></div>
                            </div>                        
                        </div><!-- end of #author-meta -->
                    <?php endif; // no description, no author's meta ?>                    
                    
                </div><!-- end of .post-entry -->              
            </article><!-- end of #post-<?php the_ID(); ?> -->

            <div class="post-meta2">
                Deixe um comentário
            </div><!-- end of .post-meta2 -->
            <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="600" data-num-posts="10"></div>

        <?php endwhile; ?> 

        <div class="page-nav clearfix">
        <?php 
            if(function_exists('wp_pagenavi')) { 
                wp_pagenavi(); 
            }else { 
        ?>
        <?php get_template_part('includes/navigation'); ?>
        <?php } ?>
        </div> <!-- end .entry -->
        <?php else : ?>
        <?php get_template_part('includes/no-results'); ?>
        <?php endif; wp_reset_query(); ?>
        </div> <!-- end #et_pt_blog --> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>
