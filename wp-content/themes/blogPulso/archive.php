<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

        <div id="content-archive" class="grid col-620">

<?php if (have_posts()) : ?>
        
        <?php $options = get_option('responsive_theme_options'); ?>
		<?php if ($options['breadcrumb'] == 0): ?>
		<?php echo responsive_breadcrumb_lists(); ?>
        <?php endif; ?>
        
		   <h6>
			    <?php if ( is_day() ) : ?>
				    <?php printf( __( 'Arquivos diários: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Arquivos mensais: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Arquivos anuais: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Arquivos do Blog', 'responsive' ); ?>
				<?php endif; ?>
			</h6>
                    
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
