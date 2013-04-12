<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/search.php
 * @link           http://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

        <div id="content-search" class="grid col-620">

<?php if (have_posts()) : ?>

    <h6><?php printf(__('Resultados da pesquisar por: %s', 'responsive' ), '<span>' . get_search_query() . '</span>'); ?></h6>

		<?php while (have_posts()) : the_post(); ?>
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <h1 class="post-title">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                </h1>
                
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
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    <?php endif; ?>

                    <div class="post-content">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_excerpt(); ?>
                        </a>
                    </div>

                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <div class="post-data">
                    <?php //the_tags(__('Tagged with:', 'responsive') . ' ', ', ', ''); ?> 
                    <?php //printf(__('Posted in %s', 'responsive'), get_the_category_list(', ')); ?> 
                </div><!-- end of .post-data -->             
                <hr class="shadow">
            <!-- <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div> -->               
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
