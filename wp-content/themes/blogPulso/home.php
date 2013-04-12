<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Home Page
 *
 * Note: You can overwrite home.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes
 *
 * @file           home.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

    <!-- start of slider -->
    <?php if (is_home() && (strpos ($_SERVER['REQUEST_URI'], 'page') === false)){ ?>
    
        <div class="theme-default">
            <div id="slider" class="nivoSlider">

            <?php $query = new WP_query( array( 
                    'posts_per_page' => '4'
                     )); 
            //d($query);
            ?>
            <?php  if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
                <?php 
                    $thumb  = '';
                    $width  = 960;
                    $height = 400;
                    $title  = get_the_title();
                    $img = get_post_image_src($post->ID);
                    //d($img);
                    $default_attr = array(
                        'src'   => $src,
                        'class' => "attachment-$size",
                        'alt'   => trim(strip_tags( $attachment->post_excerpt )),
                        'title' => trim(strip_tags( $attachment->post_title )),
                    );
                    $thumbnail = get_the_post_thumbnail($width,$height);
                    $thumb = $thumbnail["thumb"];
                    //the_crop_image($img, '&amp;w=960&amp;h=300&amp;zc=1');
                 ?>
                 <?php if(has_post_thumbnail()): ?>
                 <a href="<?php the_permalink(); ?>">
                    <?php the_crop_image($img, "&amp;w=$width&amp;h=$height&amp;zc=1", 'sliderImage', "' title='$title", "<img src='%s' class='%s' alt='%s' data-transition='slideInLeft'/>"); ?>
                    <!-- <img src="<?php echo $img; ?>" data-thumb="<?php $img; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" title="<?php echo $title; ?>" data-transition="slideInLeft" /> -->
                </a> 
                <?php endif; ?>
                <!-- <img src="<?php bloginfo('template_url'); ?>/images/toystory.jpg" data-thumb="<?php bloginfo('template_url'); ?>/images/toystory.jpg" title="This is an example of a caption This is an example of a caption"  data-transition="" />
                <img src="<?php bloginfo('template_url'); ?>/images/up.jpg" data-thumb="<?php bloginfo('template_url'); ?>/images/up.jpg" title="This is an example of a caption" data-transition="" />
                <img src="<?php bloginfo('template_url'); ?>/images/walle.jpg" data-thumb="<?php bloginfo('template_url'); ?>/images/walle.jpg" title="This is an example of a caption"  data-transition="" />
                <img src="<?php bloginfo('template_url'); ?>/images/nemo.jpg" data-thumb="<?php bloginfo('template_url'); ?>/images/nemo.jpg" title="This is an example of a caption" data-transition="" /> -->
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <div class="control-nav"></div>
        </div>            
    <?php } ?>  <!-- end of slider -->          
         
    <div id="content-blog" class="grid col-620">
     
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
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
                    <?php 
                    $thumb  = '';
                    $width  = 140;
                    $height = 140;
                    $title  = get_the_title();
                    $img = get_post_image_src($post->ID);
                    //d($img);
                    $default_attr = array(
                        'src'   => $src,
                        'class' => "attachment-$size",
                        'alt'   => trim(strip_tags( $attachment->post_excerpt )),
                        'title' => trim(strip_tags( $attachment->post_title )),
                    );
                    $thumbnail = get_the_post_thumbnail($width,$height);
                    $thumb = $thumbnail["thumb"];
                    //the_crop_image($img, '&amp;w=960&amp;h=300&amp;zc=1');
                 ?>
                 <?php if(has_post_thumbnail()): ?>
                 <a href="<?php the_permalink(); ?>">
                    <?php the_crop_image($img, "&amp;w=$width&amp;h=$height&amp;zc=1", 'sliderImage', "' title='$title", "<img src='%s' class='%s' alt='%s' data-transition='slideInLeft'/>"); ?>
                </a> 
                <?php endif; ?>

                    <div class="post-content">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_excerpt(); ?>
                        </a>
                    </div>
                </div><!-- end of .post-entry -->
                <br /><br />
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