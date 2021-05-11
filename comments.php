<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to turnwall_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package turnwall
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="section comments-area <?php if ( get_comments_number() > 0 ) : ?>open<?php endif; ?>">
  <a class="comments-head">
    <?php comments_number(
      'No comments yet... Be the first?', 
      'One comment so far... Add your thoughts?', 
      '% comments so far... Add your thoughts?'
    ); ?>
    <span class="arrow-contain">
      <span class="bevicon bevico-arrow-forward transition"></span>
    </span>
  </a>
  <div class="section comment-contain" 
    <?php if ( get_comments_number() > 0 ){
      echo `style="display: block;"`;
    }; ?>>
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-10 right last">
            <?php if ( have_comments() ) : ?>
                                    
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                    <nav id="comment-nav-above" class="navigation-comment" role="navigation">
                        <h1 class="screen-reader-text">
                          <?php _e( 'Comment navigation', 'turnwall' ); ?>
                        </h1>
                        <div class="nav-previous">
                          <?php previous_comments_link( __( '&larr; Older Comments', 'turnwall' ) ); ?>
                        </div>
                        <div class="nav-next">
                          <?php next_comments_link( __( 'Newer Comments &rarr;', 'turnwall' ) ); ?>
                        </div>
                    </nav>
                <?php endif; // check for comment navigation ?>
                
                <ol class="comment-list">
                <?php
                    /* Loop through and list the comments. Tell wp_list_comments()
                      * to use turnwall_comment() to format the comments.
                      * If you want to overload this in a child theme then you can
                      * define turnwall_comment() and that will be used instead.
                      * See turnwall_comment() in inc/template-tags.php for more.
                      */
                    wp_list_comments( array( 'callback' => 'turnwall_comment' ) );
                  ?>
                </ol>
              
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                    <nav id="comment-nav-below" class="navigation-comment" role="navigation">
                        <h1 class="screen-reader-text">
                          <?php _e( 'Comment navigation', 'turnwall' ); ?>
                        </h1>
                        <div class="nav-previous">
                          <?php previous_comments_link( __( '&larr; Older Comments', 'turnwall' ) ); ?>
                        </div>
                        <div class="nav-next">
                          <?php next_comments_link( __( 'Newer Comments &rarr;', 'turnwall' ) ); ?>
                        </div>
                    </nav>
                <?php endif; // check for comment navigation ?>
                
            <?php endif; // have_comments() ?>
            
            <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
                <p class="no-comments">
                <?php _e( 'Comments are closed.', 'turnwall' ); ?>
                </p>
            <?php endif; ?>

            <?php comment_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
