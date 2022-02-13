<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(


	$fields =  array(

	  'author' =>
	    '<p class="comment-form-author"><label for="author">' . __( '*Vardas', 'domainreference' ) . '</label></br> ' .
	    ( $req ? '<span class="required"></span>' : '' ) .
	    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'email' =>
	    '<p class="comment-form-email"><label for="email">' . __( '*El paštas', 'domainreference' ) . '</label> </br>' .
	    ( $req ? '<span class="required"></span>' : '' ) .
	    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'url' => '',
	),

  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit',
  'name_submit'       => 'submit',
  'title_reply'       => __( '<h6>Palikti komentarą</h6>' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'Komentuoti' ),
  'format'            => 'xhtml',

  'comment_field' =>  '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>',


		'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Jūsų el paštas nebus niekur matomas' ) . ( $req ? $required_text : '' ) .
    '</p>',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);

 ?>



<?php if ( post_password_required() ) {
	return;
} ?>
	<div id="comments" class="comments-area">

		<ul class="w3-pagination w3-border w3-round">
			<li><?php next_comments_link( '&#10094; Senesnis' ); ?></li>
			<li><?php previous_comments_link( 'Naujesnis &#10095;'); ?></li>
		</ul>

		<?php if ( have_comments() ) : ?>


			<h3 class="comments-title">
				<?php
				printf( _nx( '“%2$s” komentaras ', ' “%2$s” %1$s komentarai ', get_comments_number(), 'comments title'),
					number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h3>
			<ul class="comment-list">
				<?php
				wp_list_comments( array(
					'short_ping'  => true,
					'avatar_size' => 50,
					'reply_text'  => '',
				) );
				?>
			</ul>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
				<?php _e( 'Komentarai negalimi.' ); ?>
			</p>



		<?php endif; ?>
		<?php comment_form($args); ?>
	</div>
