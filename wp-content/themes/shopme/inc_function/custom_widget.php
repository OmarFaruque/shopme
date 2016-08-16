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







