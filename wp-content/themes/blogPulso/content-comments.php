<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('Este post é protegido por senha. Digite a senha para ver os comentários.', 'responsive'); ?></p>
    
	<?php return; } ?>

<?php if (have_comments()) : ?>
    <h6 id="comments">
			<?php
				printf( _n('Um comentário sobre &ldquo;%2$s&rdquo;', '%1$s comentários on &ldquo;%2$s&rdquo;', get_comments_number(), 'responsive'),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
			?>
    </h6>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; comentários mais antigos','responsive' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'comentários mais recentes &#8250;','responsive', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=60&type=comment'); ?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; comentários mais antigos','responsive' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'comentários mais recentes &#8250;','responsive', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks','responsive') : $txt = __('Pings&#47;Trackbacks','responsive');
?>

    <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'responsive' ), $count, $txt, get_the_title() )?></h6>

    <ol class="commentlist">
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>


<?php endif; ?>