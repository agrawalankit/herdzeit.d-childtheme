<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit: 
 * @link http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'RECIPE_META_';

global $meta_boxes;

$meta_boxes = array();


// Metabox for additional recipe information
$meta_boxes[] = array(
	'id'		=> 'recipe_additional',
	'title'		=> __('Recipe Information', 'FoodRecipe'),
	'pages'		=> array( 'recipe' ),
	'fields'	=> array(
		
		array(
			'name'	=> __('Attach Images', 'FoodRecipe'),
			'desc'	=> __('Upload images related to this this recipe. These Images will appear in slider on recipe page.', 'FoodRecipe'),
			'id'	=> "{$prefix}more_images_recipe",
			'type'	=> 'plupload_image'
		),		
		array(
			'name'		=> __('Yield', 'FoodRecipe'),
			'id'		=> $prefix . 'yield',
			'desc'		=> __('How much/many does this recipe produce ?', 'FoodRecipe'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Servings', 'FoodRecipe'),
			'id'		=> $prefix . 'servings',
			'desc'		=> __('How many servings?', 'FoodRecipe'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'		=> __('Prep Time', 'FoodRecipe'),
			'id'		=> $prefix . 'prep_time',
			'desc'		=> __('How Many Minutes ?  Minutes Above 60 will be displayed in hours.', 'FoodRecipe'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Cook Time', 'FoodRecipe'),
			'id'		=> $prefix . 'cook_time',
			'desc'		=> __('How Many Minutes ?  Minutes Above 60 will be displayed in hours.', 'FoodRecipe'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Ready In', 'FoodRecipe'),
			'id'		=> $prefix . 'ready_in',
			'desc'		=> __('How Many Minutes ?  Minutes Above 60 will be displayed in hours.', 'FoodRecipe'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Ingredients', 'FoodRecipe'),
			'id'		=> $prefix . 'ingredients',
			'desc'		=> __('You can add list of ingredients here. To display the list you need to write [ingredients] short code in your content editor.', 'FoodRecipe'),
			'clone'		=> true,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Method Steps', 'FoodRecipe'),
			'id'		=> $prefix . 'method_steps',
			'desc'		=> __('You can add list of recipe method steps here.', 'FoodRecipe'),
			'clone'		=> true,
			'type'		=> 'textarea',
			'std'		=> ''
		)
		
		
		
	)
);


// Metabox for nutritional information
$meta_boxes[] = array(

	'id' => 'nutritional',
	'title' => __('Nutritional Information: (Optionsl) leaving it empty will not display Nutritional Info Box on Front End.', 'FoodRecipe'),
	'pages' => array( 'recipe' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'		=> __('Nutrient Name', 'FoodRecipe'),
			'id'		=> $prefix . 'nut_name',
			'desc'		=> __('Enter the name of nutritional Item Name', 'FoodRecipe'),
			'clone'		=> true,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Mass', 'FoodRecipe'),
			'id'		=> $prefix . 'nut_mass',
			'desc'		=> __('Enter Nutrient Mass', 'FoodRecipe'),
			'clone'		=> true,
			'type'		=> 'text',
			'std'		=> ''
		)
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function RECIPE_META_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'RECIPE_META_register_meta_boxes' );

