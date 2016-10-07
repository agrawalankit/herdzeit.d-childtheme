<form action="<?php echo home_url(); ?>" id="searchform">
    <p>
        <input type="text" name="s" id="s" class="field" value="" placeholder="<?php _e('Recipe, Ingredient, Skill Level, Cuisine...', 'FoodRecipe');?>" />
        <input type="submit" name="s_submit" id="s-submit" value=""/>
    </p>
</form>
<p class="statement"><span class="fireRed"><?php _e('Top Recipe Types', 'FoodRecipe');?>:</span>
    <?php
    if ( function_exists( 'ot_get_option' ) ) {
        $term_numbers = intval(ot_get_option('header_terms_count'));
    } else {
        $term_numbers = 12;
    }
    $term_options = array(
        'number'    =>  3,/*$term_numbers*/
        'orderby' => 'count',
        'order' => 'DESC'
    );
    $terms = get_terms("recipe_type", $term_options);
    $count = count($terms);
    if ( $count > 0 ){
        $the_limit = $count;
        foreach ( $terms as $term ) {
            ?>
            <a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo $term->name; ?></a>
            <?php
            $the_limit--;
            if($the_limit < 1) { break; } else { echo ', '; }
        }
    }
    ?>
</p>
