<section id="discover-places" class="discover-places bg-gray-300">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Discover New Places</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div class="row single-posts">
            <?php
                $args       = array(
                    'post_type'         => 'post', 
                    'post_status'       => 'publish',
                    'posts_per_page'    => 3,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'culture',
                        ),
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'traveling',
                        ),
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'lifestyle',
                        ),
                    )
                );
                $the_query  = new WP_Query( $args );
        
                if($the_query->have_posts()):
                    while($the_query->have_posts()):
                        $the_query->the_post();
                        echo '<div class="col-md-4 single-post-item">';
                            if(has_post_thumbnail()) {
                                echo '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a>';
                            }
                            
                            echo '<div class="single-post-item-content">';
                                $the_cat    = get_the_category();
                                $cat_link   = get_category_link( $the_cat[0]->cat_ID );
                                ?>
                                <p><a href="<?php echo $cat_link; ?>"><?php echo  $the_cat[0]->cat_name; ?></a></p>
                                <?php echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
                                echo '<button data-wishlist-id="'.get_the_ID().'" class="sag-wishlist" href="#"><i class="bi bi-heart"></i></button>';
                                ?>
                                <p><?php the_excerpt(); ?> </p> 
                                <?php
                                printf( '<span>%s</span> by <a href="%s">%s</a>', get_the_date(), get_author_posts_url( get_the_author_meta( 'ID' )), get_the_author() );
                            echo '</div>';
                        echo '</div>';
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>

        </div>
          
        </div>
    </div>
</section>