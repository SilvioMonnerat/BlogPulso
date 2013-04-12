<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
   Template Name: Blog Pulso
 *
 * @file           blog-excerpt.php
 * @package        Responsive 
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/blog-excerpt.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<?php
    if ( get_query_var('paged') )
	    $paged = get_query_var('paged');
	elseif ( get_query_var('page') ) 
	    $paged = get_query_var('page');
	else 
		$paged = 1;
		query_posts("post_type=post&paged=$paged"); 
?> 
    <div id="content-blog" class="grid col-620">
     
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
                
                <div class="post-meta">
                    <?php// responsive_post_meta_data(); ?>
				    <?php// if ( comments_open() ) : ?>
                       <!--  <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                            <?php comments_popup_link(__('Nenhum Comentário', 'responsive'), __('1 Comentário', 'responsive'), __('% Comentários', 'responsive')); ?>
                        </span>
                    <?php //endif; ?> -->
                </div><!-- end of .post-meta -->
                
                <div class="post-entry">
                    <?php //if ( has_post_thumbnail()) : ?>
                        <?php// the_post_thumbnail('thumb-post'); ?>
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

                <hr class="shadow">
            </article><!-- end of #post-<?php the_ID(); ?> -->
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