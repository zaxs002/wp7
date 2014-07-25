<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$GLOBALS['comment'] = $comment;

switch ( $comment->comment_type ) :
case 'pingback'  :
case 'trackback' :
?>
<li class="post pingback">
    <p><?php _e( 'Pingback:', 'yit' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'yit'), ' ' ); ?></p>
    <?php
    break;

    default:
        $depth = yit_comment_depth( get_comment_ID() );
    ?>
<li <?php comment_class( yit_comment_has_children( $comment->comment_ID ) ? ' parent' : '' ); ?> id="li-comment-<?php comment_ID(); ?>">
    <div class="<?php echo 'offset' . ( $depth - 1 ) . ' span' . ( 10 - yit_comment_depth( get_comment_ID() ) ) ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-container">
            <div class="row">
                <div class="comment-author vcard span1">
                    <?php echo get_avatar( $comment, 56 ); ?>
                </div>

                <div class="comment-content span<?php echo 9 - $depth ?>">
                    <div class="comment-border group">
                        <div class="comment-meta commentmetadata reply comment-author-name comment-date">
                            <!-- author name -->
                            <?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

                            <!-- date -->
                            <a class="date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                <?php
                                // translators: 1: date, 2: time
                                printf( __( '%1$s', 'yit' ), get_comment_date( 'M, j - Y' ) ); ?></a>

                            <!-- reply -->
                            <?php
                            comment_reply_link( array_merge( $args, array(
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'reply_text' => apply_filters( 'yit_comment_reply_link_text', __( '- reply', 'yit' ) )
                            ) ) ); ?>
                        </div>
                        <div class="comment-content">
                            <?php if ( $comment->comment_approved == '0' ) : ?>
                                <em class="moderation"><?php _e( 'Your comment is awaiting moderation.', 'yit' ); ?></em>
                                <br />
                            <?php endif; ?>
                            <div class="comment-body"><?php comment_text(); ?></div>
                        </div>
                    </div>
                    <div class="quote_img"></div>
                </div>
            </div>
        </div><!-- #comment-##  -->
    </div>
<?php
break;
endswitch;
