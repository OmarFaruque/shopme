<?php
/*
* Default Theme Function file
*/
// Add Thumbnail Images Support
add_theme_support( 'post-thumbnails' );
if (!function_exists('addShopmeThemeScript')) {
function addShopmeThemeScript()
{
// All CSS files
wp_enqueue_style('shop-me-style', get_stylesheet_uri());
wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
wp_enqueue_style('shopme-css', get_template_directory_uri() . '/css/shopme.css');
wp_enqueue_style('background-css', get_template_directory_uri() . '/css/background.css');
// All Jquery
wp_enqueue_script('jquery', 'http://code.jquery.com/jquery.js', array(), '1.0.0', false);
wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '1.0.1', true);
wp_enqueue_script( 'zoom_js', get_template_directory_uri() . '/js/jquery.elevateZoom.js', array(), '1.0.2', true );
wp_enqueue_script('shopme-js', get_template_directory_uri() . '/js/shopme.js', array(), '1.0.3', true);
}
add_action('wp_enqueue_scripts', 'addShopmeThemeScript');
}
/*
* Reguster menu
*/
register_nav_menus( array(
'top_menu' => 'Site Main Menu',
'footer_menu' => 'Site Footer Menu',
) );
/**
* Creates a sidebar
* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
*/
add_action( 'widgets_init', 'shopme_widget_init' );
function shopme_widget_init() {
register_sidebar( array(
'name' => __( 'Main Sidebar', 'Shop Me' ),
'id' => 'main_sidebar',
'description' => __( 'widget for Main Sidebar in Homepage & Product Page.', 'Shop Me' ),
'before_widget' => '<li id="%1$s" class="widget %2$s">',
'after_widget'  => '</li>',
'before_title'  => '<h4 class="widgettitle">',
'after_title'   => '</h4>',
) );
}
function email_content_type(){
return "text/html";
}
add_filter( 'wp_mail_content_type','email_content_type' );
/*
* Mail Function
*/
if(!function_exists('send_email')){
    function send_email($post, $file){
    $admin_email = get_option( 'admin_email' );
    move_uploaded_file($file["attachment"]["tmp_name"],WP_CONTENT_DIR .'/uploads/mail_upload/'.basename($file['attachment']['name']));
    $attachments = array( WP_CONTENT_DIR . '/uploads/mail_upload/'.basename($file['attachment']['name']) );
    $headers = 'From: '.$_POST['p_name'].' <'.$_POST['email'].'>' . "\r\n";
    $message = '<table style="width:600px; margin:0 auto;">
        <thead style="background: #3F51B5; color: #9E9E9E;">
            <tr>
                <th style="background:url("http://watershopbd.com/pub/media/wysiwyg/LS-RO-301.jpg")">
                    <h3 style="margin-bottom:0px;"><i>Mail From:</i></h3>
                    <h1 style="margin-top:0px; font-size: 30px; font-family: cursive;">'.$_POST['p_name'].'</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="margin-top:15px; padding:10px; border:1px solid #ccc;"><b>Email:</b><br/>'.$_POST['email'].'</td>
            </tr>
            <tr>
                <td style="border:1px solid #ccc;padding:10px;"><b>Subject:</b><br/>'.$_POST['subject'].'</td>
            </tr>
            <tr>
                <td style="border:1px solid #ccc;padding:10px;"><b>Query for:</b><br/>'.implode($_POST['product_select'], '<br/>    ').'</td>
            </tr>
            <tr>
                <td style="border:1px solid #ccc;padding:10px;"><b>Message:</b><br/>'.$_POST['message'].'</td>
            </tr>
            <tfoot>
            <tr><td style="background:#ccc; padding:10px; text-align:center;">This Mail from <b>'.get_bloginfo( 'name' ).'</b> Contact Us Page</td></tr>
            </tfoot>
        </tbody>
    </table>';
    $status = wp_mail( $admin_email, $_POST['subject'], $message, $headers, $attachments );
        if($status == true){
        $wc_headers = 'From: '.get_bloginfo( 'name' ).' <'.$admin_email.'>' . "\r\n";
        $wlc_mssg = '<table style="width:600px; margin:0 auto;">
            <thead style="background:#204e6d; color:#fff;">
                <tr>
                    <th style="padding-bottom:15px;" colspan="4" rowspan="" headers="" scope="">
                        <h1 style="margin-bottom:0px;">Thank You, We Got Your Message.</h1>
                        <i>We come back to you as soon as possiable.</i>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" rowspan="" headers="" style="text-align: center;background: #616567;padding: 10px;font-size: 20px; font-family: monospace;text-transform: uppercase;color: #fff;">Our Other Product</td>
                </tr>';
                $topTaxs = get_terms('product-category', array( 'parent' => 0 ));
                $l_count = 0;
                foreach($topTaxs as $s_tax):
                $thumbImage = get_tax_meta($s_tax->term_id,'ba_image_field_id');
                $imgAlt = get_post_meta($thumbImage['id'], '_wp_attachment_image_alt', true);
                $wlc_mssg .= ($l_count % 4 == 0)? '<tr>':'';
                $wlc_mssg .= '<td colspan="" rowspan="" headers="">
                        <div style="border:1px solid #ddd;">
                            <a style="text-decoration: none; color: #795548;" href="'.home_url('/product-category/' . $s_tax->slug . '/' ).'">
                                <div style="padding:10px;">
                                    <img style="max-width:100%; display:block; margin:0 auto;" src="' . $thumbImage['url'] .'" alt="'. $imgAlt . '">
                                </div>
                                <h4 style="text-align: center; background: #0e101c; margin: 0px; padding: 8px;bottom: 0;position: relative;   color: #fff;">'. $s_tax->name .'</h4>
                            </a>
                        </div></td>';
                $wlc_mssg .= ($l_count % 4 == 3)? '</tr>':'';
                $l_count++;
                endforeach;
                $wlc_mssg .= '<tfoot><tr><td colspan="4"  style="text-align: left;color: #fff;padding: 15px;border: 1px solid #ddd; background: rgb(32, 78, 109);"><i>Best, <br/>The '.get_bloginfo('name').' team</i></td></tr></tfoot>';
            $wlc_mssg .= '</tbody>
        </table>';
            $wc_status = wp_mail( $_POST['email'], 'Thank Your from ' . get_bloginfo( 'name' ), $wlc_mssg, $wc_headers );
            if($wc_status==true){

                echo '<script>jQuery(document).ready(function(){jQuery(".page_contactus h4").text("Thank You, Your We Got Your Mail & We back to you as soon as possiable."); jQuery(".page_contactus h4").addClass("text-success").removeClass("text-normal");});</script>';
            }else{
                  echo '<script>jQuery(document).ready(function(){jQuery(".page_contactus h4").text("Sorry, Your Message send failed. Please Try Again."); jQuery(".page_contactus h4").addClass("text-danger").removeClass("text-normal");});</script>';
            }
        }
    }
}
require_once('ch_admin_option/admin-function.php');
require_once('inc_function/reg_custom_post.php');
require_once('inc_function/metabox.php');
require_once('inc_function/custom_widget.php'); 