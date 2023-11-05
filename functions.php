<?php defined("ABSPATH") || die("!");
/**
 * import parent theme syle.css 
 * and add /script.js
 */
add_action('wp_enqueue_scripts', 'animestream_child_enqueue_styles');
function animestream_child_enqueue_styles(){
    $parenthandle = 'parent-style';
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle, get_template_directory_uri() . '/style.css',
        array(),
        $theme->parent()->get('Version')
    );
    //uncomment script bellow if you want to add custom script
    /*
    wp_enqueue_script('animestream-child-script', get_template_directory_uri() . '/script.js', array('jquery'), "1.0.0", TRUE);
    */
}