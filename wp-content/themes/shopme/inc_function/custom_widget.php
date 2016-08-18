<?php
/*
* Widget Function
*/

class main_sidebar extends WP_Widget{
    public function __construct(){
        parent::__construct(false, $name = __('Main Sidebar'));
    }
    /*
    * Backend Form 
    */
    public function form($instance){
    
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'Most Popular Products' );
    $title_inerpage = ! empty( $instance['title_inerpage'] ) ? $instance['title_inerpage'] : __( '', 'Inner Page Title' );
     ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Home Page Title'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('title_inerpage'); ?>"><?php _e('Widget Inner Page Title'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title_inerpage'); ?>" name="<?php echo $this->get_field_name('title_inerpage'); ?>" type="text" value="<?php echo $title_inerpage; ?>" />
            </p>
    <?php }

    public function update( $new_instance, $old_instance){
            $instance = array();
            //$instance = $old_instance;
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['title_inerpage'] = ( ! empty( $new_instance['title_inerpage'] ) ) ? strip_tags( $new_instance['title_inerpage'] ) : '';
            return $instance;
    }



    /*
    * Fontend Output
    */
    public function widget($args, $instance){
	$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $termchildren = get_term_children( $current_term->term_id, $current_term->taxonomy );
    $taxonomy     = 'product-category';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 1;      // 1 for yes, 0 for no

    $tax_args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );

    echo $args['before_widget'];
    if(!( is_home() || is_page() ) ):
    	echo '<h3 class="page_title_widget">'.$current_term->name.'</h3>';
    	echo $args['before_title'];
	    echo $instance['title_inerpage'];
	    echo $args['after_title'];
	    echo '<ul class="sidebar_cat inner_page" data-role="listview">';
        if(count($termchildren) <= 0){
            wp_list_categories('taxonomy=product-category&depth=1&show_count=0&title_li=&child_of=' . $current_term->parent);
        }else{
	       wp_list_categories('taxonomy=product-category&depth=1&show_count=0&title_li=&child_of=' . $current_term->term_id);
        }
	    echo '</ul>';
	    echo '<br/><br/>';
	 endif;
	    echo $args['before_title'];
	    echo $instance['title'];
	    echo $args['after_title'];
	    echo '<ul class="sidebar_cat home" data-role="listview">';
	    wp_list_categories( $tax_args );
	    echo '</ul>';
	echo $args['after_widget'];
    }

}
/*
* Register Widget
*/
add_action( 'widgets_init', function(){
    register_widget( 'main_sidebar' );
});










/**
 * new WordPress Widget format
 * Wordpress Latest
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class queryLetter extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'queryLetter',
            'description' => 'Widget for Sidebar Query Letter',
        );
        parent::__construct( 'queryLetter', 'Query Letter', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];
        // custom code
        ?>
        <div class="quoteLetter">
        <?php
            if(!empty($instance['title'])){
                echo $args['before_title'];
                echo $instance['title'];
                echo $args['after_title'];
            }
        ?>
            <blockquote>
                <p class="text-center">Send a query if you want to know more.</p>
            </blockquote>
            <form class="text-center" action="<?= get_permalink($instance['action']); ?>" method="GET" accept-charset="utf-8">
              <input type="email" name="email" value="" placeholder="example@example.com">  
              <input class="btn btn-inverse btn-dark" type="submit" name="submit" value="Submit">
              
            </form>

        </div>
        <?php
        echo $args['after_widget'];

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
         $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', '' ); 
         $action = ! empty( $instance['action'] ) ? $instance['action'] : __( '', '' ); 
         ?>
           <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
           </p>
           <p>
                <label for="<?php echo $this->get_field_id('action'); ?>"><?php _e('Action'); ?></label>
                <select class="widefat" for="<?php echo $this->get_field_id('action'); ?>" name="<?php echo $this->get_field_name('action'); ?>">
                    <?php  $allPages = get_all_page_ids(); ?>
                    <option value="">Set Action Page</option>
                    <?php foreach( $allPages as $page): ?>
                        <option <?= ($action == $page)?'selected':''; ?> value="<?= $page; ?>"><?= get_the_title($page); ?></option>
                    <?php endforeach; ?>
                </select>
           </p>
    <?php }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = array();
        //$instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['action'] = ( ! empty( $new_instance['action'] ) ) ? strip_tags( $new_instance['action'] ) : '';
        return $instance;
    }
}

add_action( 'widgets_init', function(){
    register_widget( 'queryLetter' );
});