<?php
/**
 * Plugin Name: Module Setting 1.0.0
 * Plugin URI: http://module.codeteam.xyz
 * Description: Cấu Hình Module
 * Version: 1.0.0 
 * Author: Dinh Trieu
 * Author URI: https://www.facebook.com/huudinh85
 * License: GPLv2 
 */
?>
<?php
    $link =  get_option('mfpd_option_name');
    $html = '';
    if(!class_exists('module_1_0_0')) {
        class module_1_0_0 {
            function __construct() {
                
                if(!function_exists('add_shortcode')) {
                    return;
                }
                add_shortcode( 'module' , array(&$this, 'module_func') );
            }

            function module_func($atts = array(), $content = null) {
                global $html;
                // extract(shortcode_atts(array('name' => 'World'), $atts));
                // return '<div><p>Hello '.$name.'!!!</p></div>';
                return $html;
            }
        }
        if ( shortcode_exists( 'module' ) ) {
            // The short code exists.
        } else{
            add_action('wp_footer', 'change_this_name');
            function change_this_name(){ 
                global $html;
                //echo $html;
            };
        }
    }
    function mfpd_load() {
        global $mfpd;
        $mfpd = new module_1_0_0();
    }
    add_action( 'plugins_loaded', 'mfpd_load' );
?>
<?php
    function register_mysettings() {
        register_setting( 'mfpd-settings-group', 'mfpd_option_name' );
    }
    function mfpd_create_menu() {
        add_menu_page('My First Plugin Settings', 'Module Settings', 'administrator', __FILE__, 'mfpd_settings_page', 'dashicons-admin-settings', 100);
        add_action( 'admin_init', 'register_mysettings' );
    }
    add_action('admin_menu', 'mfpd_create_menu'); 
    
    function mfpd_settings_page() {
?>
    <div class="wrap">
    <h2>Trang cài Module</h2>
    <?php if( isset($_GET['settings-updated']) ) { ?>
        <div id="message" class="updated">
            <p><strong><?php _e('Settings saved.') ?></strong></p>
        </div>
    <?php } ?>
    <form method="post" action="options.php">
        <?php settings_fields( 'mfpd-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Nhập ID Module</th>
            <td><input type="text" style="width:50%" name="mfpd_option_name" value="<?php echo get_option('mfpd_option_name'); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
<?php } ?>