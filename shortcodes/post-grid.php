<?php 
    function whatsHotShortcode(){
    
    
    ?>
 <!-- Home Page Whats Hot Recipe Area -->
  <div id="whats-hot" class="clearfix">
    <div class="col-xs-12">
               
                        <h2 class="w-bot-border"><?php _e('Angesagte', 'FoodRecipe'); ?> <span><?php _e('Gerichte', 'FoodRecipe'); ?></span></h2>
     </div><!-- col-xs-12 -->
                        
                                <?php

                                    $whats_hot = array();
                                    if( function_exists( 'get_option_tree' ))
                                        {
                                            
                                            if(get_option_tree( 'whats_hot1', $theme_options, false ) !== NULL ) { $whats_hot[] = intval(get_option_tree( 'whats_hot1', $theme_options, false )); }
                                            if(get_option_tree( 'whats_hot2', $theme_options, false ) !== NULL ) { $whats_hot[] = intval(get_option_tree( 'whats_hot2', $theme_options, false )); }
                                            if(get_option_tree( 'whats_hot3', $theme_options, false ) !== NULL ) { $whats_hot[] = intval(get_option_tree( 'whats_hot3', $theme_options, false )); }
                                            if(get_option_tree( 'whats_hot4', $theme_options, false ) !== NULL ) { $whats_hot[] = intval(get_option_tree( 'whats_hot4', $theme_options, false )); }
                                        }

                                    $whats_hot_args = array( 'post_type'=>'recipe', 'orderby' => 'rand', 'posts_per_page'=>4 );

                                    if( count($whats_hot) === 4 ) {

                                        $whats_hot_args = array( 'post_type'=>'recipe', 'posts_per_page'=>4, /*'post__in' => $whats_hot*/ );

                                    } else { // Zufall aus den ausgewählten Rezepttypen

                                        $whatshotrandomterms = ot_get_option( 'whats_hot_random', $option_tree, false, true, -1 );

                                        if( count($whatshotrandomterms) > 0 ) {

                                            $special_args = array( 'post_type'=>'recipe', 'orderby' => 'rand', 'posts_per_page'=> 30, 'tax_query' => array(
                                                                                array(
                                                                                    'taxonomy' => 'recipe_type',
                                                                                    'field' => 'id',
                                                                                    'terms' => $whatshotrandomterms
                                                                                )

                                                                            ));

                                            $whatshotrandomquery = new WP_Query( $special_args );

                                            $whatshotcandidates = array();

                                            if ( $whatshotrandomquery->have_posts() ) {
                                                while ( $whatshotrandomquery->have_posts() ) {
                                                    $whatshotrandomquery->the_post();

                                                    $whatshotcandidates[] = get_the_ID();
                                                }
                                            }

                                            $whats_hot_args = array( 'post_type'=>'recipe', 'posts_per_page'=>4, /*'post__in' => $whatshotcandidates*/ );

                                            //var_dump($whatshotcandidates);
                                        }

                                    }

                                        $whats_hot_query = new WP_Query( $whats_hot_args );

                                        if ( $whats_hot_query->have_posts() )
                                        while ( $whats_hot_query->have_posts() ) :
                                        $whats_hot_query->the_post();

                                        $terms = get_the_terms( $post->ID, 'recipe_type' );

                                        if ( $terms && !is_wp_error( $terms ) ) :

                                            $first_term;
                                            foreach($terms as $term)
                                            {
                                                    $first_term = $term;
                                                    break;
                                            }

                                            ?>
                                            <div class="col-lg-3 col-md-6 col-xs-12 hot-col">
                                                    <h3><a href="<?php echo get_term_link($first_term->slug, 'recipe_type' ); ?>"><?php echo $first_term->name; ?></a></h3>
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recipe-4column-thumb', array('class' => 'img-thumbnail img-responsive', 'style' => 'width:100%')); ?></a>
                                                    <h4><a href="<?php the_permalink(); ?>"><?php echo word_trim(get_the_title(), 5, '...'); ?></a></h4>
                                                    <p class="wh-excerpt"><?php echo word_trim(get_the_excerpt(), 25, true); ?></p><a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Weiter', 'FoodRecipe'); ?></a>

                                            </div>
                                             <?php

                                    endif;

                                    endwhile;
                            ?>
                        

                        </div><!-- end of whats-hot div -->
                       
                       
    <?php 
        
        }
        add_shortcode('whats_hot', 'whatsHotShortcode');
    
    
    
    ?>
