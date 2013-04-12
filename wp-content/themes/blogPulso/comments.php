<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Comments Template
 *
 *
 * @file           comments.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2010 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/comments.php
 * @link           http://codex.wordpress.org/Theme_Development#Comments_.28comments.php.29
 * @since          available since Release 1.0
 */
?>

<?php if (comments_open()) : ?>

    

    <?php
   /* $fields = array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name','responsive') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
        'email' => '<p class="comment-form-email"><label for="email">' . __('E-mail','responsive') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>',
        'url' => '<p class="comment-form-url"><label for="url">' . __('Website','responsive') . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
    );

    $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields));

    comment_form($defaults);*/
    ?>

   <!--  <div class="fb-comments" data-href="http://grupodemidiarj.com.br/" data-width="600" data-num-posts="10"></div> -->
    <?php endif; ?>
