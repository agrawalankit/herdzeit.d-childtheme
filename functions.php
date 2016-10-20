<?php
require_once 'theme-options.php';
require_once 'shortcodes/right-slider-sc.php';
require_once 'shortcodes/post-grid.php';
    
    
    
class frcChildThemeInit{
        
    private $_theme_directory_uri = "";
      
        
        
    public function __construct() {

            add_action('init', array($this, 'set_theme_directory'));
            add_action('wp_enqueue_scripts', array($this, 'enqueue_public_scripts_and_styles')); //enqueue public facing elements
            add_filter( 'wp_nav_menu_objects', array($this, 'add_menu_parent_class') );

           // add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts_and_styles')); //enqueues admin elements
        }

    /**
     * Set the theme variables
     */    
    public function set_theme_directory(){
        
        $this->_theme_directory_uri = get_stylesheet_directory_uri();
        
    }
    /**
     * enqueue public style and css
     */    
        
    public function enqueue_public_scripts_and_styles() {
       
        //public styles
        wp_enqueue_style(
            'frc_main_css', $this->_theme_directory_uri . '/style.css', time(), 'screen'
        );
        //public scripts
        wp_enqueue_script(
            'frc_main_js', $this->_theme_directory_uri . '/js/' . 'main.min.js', array('jquery'), time()
        );
         wp_enqueue_script(
            'bootstrap_js', $this->_theme_directory_uri . '/js/dev/' . 'bootstrap.js', array('jquery'), time()
        );
        
    }
    
    function add_menu_parent_class( $items ) {

    $parents = array();
    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'has-children';
        }
    }

    return $items;
}

    
    
    

 }//class
   
    $frcChildTheme = new frcChildThemeInit; 