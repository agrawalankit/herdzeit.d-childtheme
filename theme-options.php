<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => 'Select second item for whats hot area'
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => 'Home Page'
      ),
      array(
        'id'          => 'content_block_01',
        'title'       => 'Content Block 01'
      ),
      array(
        'id'          => 'content_block_02',
        'title'       => 'Content Block 02'
      ),
      array(
        'id'          => 'content_block_03',
        'title'       => 'Content Block 03'
      ),
      array(
        'id'          => 'left_image_slider',
        'title'       => 'Left Image Slider'
      ),
      array(
        'id'          => 'basic_slider',
        'title'       => 'Basic Slider'
      ),
      array(
        'id'          => 'nivo_slider',
        'title'       => 'Nivo Slider'
      ),
      array(
        'id'          => 'thumbnail_slider',
        'title'       => 'Thumbnail Slider'
      ),
      array(
        'id'          => 'accordion_slider',
        'title'       => 'Accordion Slider'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      ),
      array(
        'id'          => 'other_options',
        'title'       => 'Other Options'
      ),
      array(
        'id'          => 'contact_options',
        'title'       => 'Contact Options'
      ),
      array(
        'id'          => 'werbeflaechen',
        'title'       => 'Werbeflächen'
      ),
      array(
        'id'          => 'custom_recipe_options',
        'title'       => 'Recipe Options'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'header_logo_image',
        'label'       => 'Header Logo',
        'desc'        => 'Logo of your site.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload your favicon in PNG format.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'slider_type',
        'label'       => 'Select Home Page Slider',
        'desc'        => 'Select the Slider Type from given list.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Left Image Slider',
            'label'       => 'Left Image Slider',
            'src'         => ''
          ),
          array(
            'value'       => 'Basic Slider',
            'label'       => 'Basic Slider',
            'src'         => ''
          ),
          array(
            'value'       => 'Nivo Slider',
            'label'       => 'Nivo Slider',
            'src'         => ''
          ),
          array(
            'value'       => 'Thumbnail Slider',
            'label'       => 'Thumbnail Slider',
            'src'         => ''
          ),
          array(
            'value'       => 'Accordion Slider',
            'label'       => 'Accordion Slider',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'whats_hot_random',
        'label'       => 'Angesagte Gerichte: Zufall',
        'desc'        => '4 Rezepte, welche einen der hier ausgewählten Rezept-Typen beinhalten, werden zufällig ausgesucht.<br />
<br />
<strong>Hinweis:</strong> Es werden auf der Homepage maximal 4 Rezepte bzw. Rezept-Typen dargestellt, auch wenn man mehr als 4 auswählt.<br />
<br />

<strong style="color:red">Wichtig:</strong> Bei den "What\'s Hot"-Einstellungen (direkt hier drunter) darf KEIN Rezept ausgewählt sein! Entweder werden alle 4 manuell ausgewählt oder sie werden durch diesen Zufallsgenerator ausgewählt.',
        'std'         => '',
        'type'        => 'taxonomy-checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => 'recipe_type',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'whats_hot1',
        'label'       => 'First Whats Hot Recipe',
        'desc'        => 'Select first item for whats hot area',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'whats_hot2',
        'label'       => 'Second Whats Hot Recipe',
        'desc'        => 'Select second item for whats hot area',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'whats_hot3',
        'label'       => 'Third Whats Hot Recipe',
        'desc'        => 'Select third item for whats hot area',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'whats_hot4',
        'label'       => 'Fourth Whats Hot Recipe',
        'desc'        => 'Select fourth item for whats hot area',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_01_image',
        'label'       => 'Content Block 01 - Bild',
        'desc'        => 'Bild hochladen / auswählen.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'content_block_01',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_01_title',
        'label'       => 'Content Block 01 Titel',
        'desc'        => 'Ein Titel für den Text im Content Block 01.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'content_block_01',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_01_text',
        'label'       => 'Content Block 01 - Text',
        'desc'        => 'Text für den Content Block 01 (ca. 50 Wörter, <b>maximal 55</b>!).',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'content_block_01',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_02_image',
        'label'       => 'Content Block 02 Bild',
        'desc'        => 'Bild für den Content Block 02.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'content_block_02',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_02_title',
        'label'       => 'Content Block 02 Titel',
        'desc'        => 'Überschrift für den Text im Content Block 02.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'content_block_02',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_02_text',
        'label'       => 'Content Block 02 Text',
        'desc'        => 'Text für den Content Block 02 (ca. 50 Wörter, <b>maximal 55</b>).',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'content_block_02',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_03_image',
        'label'       => 'Content Block 03 - Bild',
        'desc'        => 'Bild hochladen/ auswählen 1',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'content_block_03',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_03_title',
        'label'       => 'Content Block 03 - Titel',
        'desc'        => 'Überschrift für den Text im Content Block 03.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'content_block_03',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_block_03_text',
        'label'       => 'Content Block 03 - Text',
        'desc'        => 'Text für den Content Block 03 (ca. 50 Wörter, <b>maximal 55</b>)',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'content_block_03',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'l_slider_statement',
        'label'       => 'Slider Statement',
        'desc'        => 'Enter statement for slider.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'left_image_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'right_info_slider',
        'label'       => 'Right Info Slider',
        'desc'        => 'Tags (Schlagworte) oder Rezept-Kategorien wählen; aus diesen wird der jeweils aktuellste Post dargestellt. (1 Post pro Tag/Kategorie, danach aus der nächsten, usw)

Wird ein Post gefunden, welcher schon über ein anderes Schlagwort in die Auswahl gelangt ist, wird stattdessen der vorherhige (zeitlich gesehen) dargestellt.',
        'std'         => '',
        'type'        => 'taxonomy-checkbox',
        'section'     => 'left_image_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => 'post_tag,recipe_type,cuisine,course',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'b_slider_statement',
        'label'       => 'Slider Statement',
        'desc'        => 'Enter Slider Heading Statement',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'basic_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'basic_image_slider',
        'label'       => 'Basic Slider',
        'desc'        => 'Select Images and recipe post IDs to show in Basic Slider.
Required dimension is:
width: 905px;
height: 386px;',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'basic_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'nivo_image_slider',
        'label'       => 'Nivo Image Slider',
        'desc'        => 'Select Images for Nivo Slider and give Recipe Post IDs.
Required dimension is:
width: 905px;
height: 370px;',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'nivo_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'thumb_slider_images',
        'label'       => 'Thumbnail Slider Images',
        'desc'        => 'Add images for thumbnail slider.
Required dimension is:
width: 905px;
height: 370px;',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'thumbnail_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'accor_slider_images',
        'label'       => 'Accordion Slider Images',
        'desc'        => 'Select Images for Accordion Slider and add links for those.
width: 740px
height: 425px',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'accordion_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_logo_image',
        'label'       => 'Select Footer Logo Image',
        'desc'        => 'Select an image for your footer logo.
Should not be wider than 157px.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_about_us',
        'label'       => 'Footer About Us Information',
        'desc'        => 'Enter about us information for footer about us portion. Will be best with around 32 charactors.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_readmore_link',
        'label'       => 'Footer Readmore Link',
        'desc'        => 'Enter URL for readmore button in footer about us portion.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'copyright_statement',
        'label'       => 'Copyright Statement',
        'desc'        => 'Enter copyright statement for footer',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_dev_statement',
        'label'       => 'Designer and Developer Statement',
        'desc'        => 'Enter Designer and Developter Statement',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'weekly_special_recipe',
        'label'       => 'Rezept der Woche',
        'desc'        => 'Aus dieser Auswahl an Tags (Schlagworten) und Kategorien wird jede Woche ein anderes zufälliges Rezept angezeigt.
Das zufällige Rezept bleibt eine Woche dasselbe (wenn währenddessen nicht weitere Tags oder Kategorien ausgewählt werden) und wechselt dann.
Je umfangreicher die Auswahl, desto umfangreicher sind die Möglichkeiten für ein zufälliges Rezept.',
        'std'         => '',
        'type'        => 'taxonomy-checkbox',
        'section'     => 'other_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => 'post_tag,recipe_type,cuisine,course',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'recipe_template_type',
        'label'       => 'Select Single Recipe Template Type',
        'desc'        => 'Select from the options how you want to show your single recipe page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'other_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'Recipe Template with Sidebar',
            'label'       => 'Recipe Template with Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'Recipe Template Full Width',
            'label'       => 'Recipe Template Full Width',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'gmap_api_key',
        'label'       => 'Google Map API Key.',
        'desc'        => 'To learn about how to get google api key visit
<a href="https://developers.google.com/maps/documentation/javascript/tutorial">this link</a>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'map_latitude',
        'label'       => 'Map Latitude',
        'desc'        => 'Enter Google Map Latitude for your place. You can get Latitude Value From
	<a href="http://itouchmap.com/latlong.html">this link</a>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'map_longitude',
        'label'       => 'Map Longitude',
        'desc'        => 'Enter Google Map Longitude for your place. You can get Longitude Value From <a href="http://itouchmap.com/latlong.html">this link</a>',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'map_zoom_level',
        'label'       => 'Map Zoom Level',
        'desc'        => 'Enter Google Map Zoom Level',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_form_heading',
        'label'       => 'Contact Form Heading',
        'desc'        => 'Give a heading to your contact form.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_email_address',
        'label'       => 'Contact Email Address',
        'desc'        => 'Enter an email address for contact form to send you emails on.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'post_content_werbefl__che',
        'label'       => 'Post Content Werbefläche',
        'desc'        => 'HTML-Code für die Werbefläche, welche mitten im Inhalt von Posts (Rezepten) angezeigt werden.
Bilder werden automatisch in der Breite auf 250 Pixel gebracht (gängige Breite für quadratische Werbeflächen), die Höhe automatisch angepasst.

<strong>Gut für quadratische Werbung geeignet</strong>',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'werbeflaechen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'banner_ad',
        'label'       => 'Horizontaler Banner',
        'desc'        => 'HTML-Code für einen horizontalen, länglichen Werbebanner. Wird im oberen Bereich der Seite angezeigt.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'werbeflaechen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'plugin',
        'label'       => 'Plugin',
        'desc'        => '',
        'std'         => '',
        'type'        => 'gallery',
        'section'     => 'werbeflaechen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'recipe_info_show_hide',
        'label'       => 'Show Recipe Info',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'custom_recipe_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => 'Hide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'recipe_show_social_icons',
        'label'       => 'Show Recipe Social Icons',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'custom_recipe_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show_social',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide_social',
            'label'       => 'Hide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'recipe_show_rating',
        'label'       => 'Show Recipe Rating',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'custom_recipe_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show_rating',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide_rating',
            'label'       => 'Hide',
            'src'         => ''
          )
        )
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}