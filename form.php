<?php
/*
Plugin Name: Loginfrom
Plugin URI: 
Description:Smpale Login form
Version: 1.1
Author: Masum Sakib
Author URI: 
Text Domain:  loginsakib
License: GPLv2 or later
*/

/**
 * Login Form logo change 
 * 
 */
function loginsakib_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo plugin_dir_url( __FILE__ ). '/assets/images/login.png' ?>);
		height:100px;
		width:100px;
		background-size: cover;
		background-repeat: no-repeat;
        padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'loginsakib_login_logo' );



/**
 * Login Form logo Url and title change  
 * 
 */

function loginsakib_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'loginsakib_login_logo_url' );

function loginsakib_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'loginsakib_login_logo_url_title' );


/**
 * Login Form text change
 * 
 * reurn $translated_text
 */
add_action('login_head', function() {
    add_filter('gettext', function($translated_text, $text_to_translated, $text_domin) {
        if( 'Username or Email Address' == $text_to_translated){
            $translated_text = _e('Enput Your Phone Number Or Email Address', 'loginsakib');
        }elseif('Password' == $text_to_translated) {
             $translated_text = _e('Enter Your Password', 'loginsakib');
        };
        return $translated_text;
    }, 10, 3);
});


/*
* enqueue style and script
*
*/

function loginsakib_login_stylesheet() {
    wp_enqueue_style( 'loginsakib-style', plugin_dir_url( __FILE__ ) . '/assets/css/style.css' );
    wp_enqueue_script( 'loginsakib-js', plugin_dir_url( __FILE__ ) . '/assets/js/main.js', ['jquery'], null, true );
}
add_action( 'login_enqueue_scripts', 'loginsakib_login_stylesheet' );

