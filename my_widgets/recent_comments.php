<?php
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */

class Recent_Comments extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'recent_comments', // Base ID
            'Recent_Comments', // Name
            array( 'description' => __( 'A Recent Comments', 'recent comments' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        $output = '';

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;

        /**
         * Filters the arguments for the Recent Comments widget.
         *
         * @since 3.4.0
         *
         * @see WP_Comment_Query::query() for information on accepted arguments.
         *
         * @param array $comment_args An array of arguments used to retrieve the recent comments.
         */
        $comments = get_comments( apply_filters( 'widget_comments_args', array(
            'number'      => $number,
            'status'      => 'approve',
            'post_status' => 'publish'
        ) ) );

        $output .= $args['before_widget'];
        if ( $title ) {
            $output .= $args['before_title'] . $title . $args['after_title'];
        }

        $output .= '<ul id="recentcomments">';
        if ( is_array( $comments ) && $comments ) {
            // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
            $post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
            _prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

            foreach ( (array) $comments as $comment ) {
                $output .= '<li><i class="material-icons">chevron_right</i>';
                /* translators: comments widget: 1: comment author, 2: post link */
                $output .= sprintf( _x( '%1$s  %2$s', 'widgets' ),
                    '<a class="comment-author-link">'.get_comment_author_link( $comment ) .'</a>',
                    '<a href="' . esc_url( get_comment_link( $comment ) ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a>'
                );
                $output .= '</li>';
            }
        }
        $output .= '</ul>';
        $output .= $args['after_widget'];

        echo $output;
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = absint( $new_instance['number'] );
        return $instance;
    }
}

add_action( 'widgets_init', 'wpdocs_register_widgets' );

function wpdocs_register_widgets() {
    register_widget( 'Recent_Comments' );
}
