<?php 
    
function right_info_sc(){
    
    ?>
<!-- SLIDER STARTS HERE -->
<?php
if ( function_exists( 'ot_get_option' ) )
{
    $slides = ot_get_option( 'right_info_slider');
    $post_numbers = ot_get_option( 'left_image_slide_numbers');
    if ( ! empty( $slides ) || ! empty( $post_numbers )) {
        ?>
<div class="row">
    <div class="col-xs-12">
        <div id="slider" class="slider2">
            <!-- Start Most Rated -->
            <?php
            ?>
            <div class="most-rated">
                <span class="most-rated-title"><?php _e("Most Rated", "FoodRecipe") ?></span>
                <div class="item">
                    <?php
                    $top_recipe = ot_get_option( 'top_recipe_args');
                    $top_recipe_args = array(
                        'post_type' => 'recipe',
                        'posts_per_page' => 1,
                        'orderby' => 'meta_value_num',
                        'meta_key' => ($top_recipe == 'high_rating')? 'rating_average' : 'rating_counter',
                        'order' => 'DESC'
                    );
                    $top_recipe_query = new WP_Query($top_recipe_args);
                    if ( $top_recipe_query->have_posts() ) :
                        while ( $top_recipe_query->have_posts() ) :
                            $top_recipe_query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="img-box"><?php the_post_thumbnail('most-rated-thumb'); ?></a>
                            <h5><a href="<?php the_permalink(); ?>"><?php echo word_trim(get_the_title(),5,'...'); ?></a></h5>
                            <p><?php echo esc_attr(word_trim(get_the_excerpt(),5,'...')); ?></p>
                            <?php
                            $rating_check = ot_get_option('recipe_show_rating');
                            if($rating_check == 'show_rating'){
                                ?>
                                <p class="rate"><?php the_recipe_rating($post->ID); ?></p>
                            <?php } ?>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div><!-- End Most Rated -->
            <h2 class="slider-head">
                <?php
                $slider_title = ot_get_option('l_slider_title');
                echo (!empty($slider_title)) ?  wp_kses_post($slider_title) : __("Top Recipe of the Day", "FoodRecipe");
                ?>
            </h2>
            <!-- Top recipes statement -->
            <p class="slogan">
                <?php
                $slider_statement = ot_get_option('l_slider_statement');
                echo (!empty($slider_statement)) ?  wp_kses_post($slider_statement) : "&nbsp;";
                ?>
            </p>
            <!-- Start of Slides -->
            <div class="slides right-slider">
                <ul class="cycle-slideshow"  data-cycle-fx=scrollHorz data-cycle-timeout=4000 data-cycle-slides="li" data-cycle-pager=".cycle-pager">
                    <?php
                    if (ot_get_option('left_image_on_off') == "off") {
                        foreach ( $slides as $slide ) {
                            $slide_id[] = $slide ["id"];
                        }
                        $li_slider_args  = array('post__in' => $slide_id );
                    }else{
                        $post_number = !empty($post_numbers)? $post_numbers : 4;
                        $li_slider_args  = array( 'posts_per_page' => $post_number);
                    }
                    $li_slider_args['post_type'] = (ot_get_option( 'recipe_post_select') == 'on') ? array('recipe', 'post') : array('recipe');
                    $li_slider_query = new WP_Query( $li_slider_args );
                    if ( $li_slider_query->have_posts() ) :
                        while ( $li_slider_query->have_posts() ) :
                            $li_slider_query->the_post();
                            ?>
                            <li>
                                <?php
                                if(has_post_thumbnail()){?>
                                    <a href="<?php the_permalink(); ?>" class="img-box">
                                        <?php the_post_thumbnail( 'li-slider-thumb' ); ?>
                                    </a>
                                <?php }
                                ?>
                                <div class="slide-info">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php
                                    $rating_check = ot_get_option( 'recipe_show_rating' );
                                    if (($rating_check == 'show_rating' ) && (get_post_type() == "recipe") ) {
                                        ?>
                                        <div class="rating">
                                            <?php the_recipe_rating( $post->ID ); ?>
                                            <span><?php _e( 'Average Rating:', 'FoodRecipe' ); ?>
                                                <span>(<?php echo get_avg_rating( $post->ID ); ?> / 5)</span></span>
                                        </div>
                                    <?php
                                    } else {
                                        echo '<hr>';
                                    }
                                    ?>
                                    <p><?php echo esc_attr(word_trim( get_the_excerpt(), 28, ' ...' )); ?></p>
                                    <a href="<?php the_permalink(); ?>"
                                       class="readmore"><?php _e( 'Read more', 'FoodRecipe' ); ?></a>
                                </div>
                            </li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
                <div class="sliderNav">
                    <div class="cycle-pager"></div>
                </div>
            </div><!-- end of slides -->
        </div><!-- end of Slider div -->
        </div>
</div>
    <?php
    } else {
        ?>
        <div id="slider" class="no-slides-error">
            <?php _e('Please add slides to your selected slider in theme options. Follow documentation for more detail.', 'FoodRecipe'); ?>
        </div>
    <?php
    }
}
?>
<!-- SLIDER AREA ENDS HERE -->
    </div>
    <?php
    } 
    add_shortcode('right_info_sc', 'right_info_sc');