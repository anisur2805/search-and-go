<section class="locations-section">
    <div class="container">
        <div class="row text-center">
            <h2 class="section-title">
                Most Popular Locations
            </h2>
            <p class="section-subtitle">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
            </p>
        </div>

        <div class="row">
            <ul>

                <?php
                $args = array(
                    'hide_empty' => false, // also retrieve terms which are not used yet
                    'meta_query' => array(
                        array(
                           'key'       => 'feature-group',
                           'value'     => 'kitchen',
                           'compare'   => 'LIKE'
                        )
                    )
                );

                $terms = get_terms('listing_item');

         

                foreach ($terms as $term) {
                    var_dump($term);
                    $term_meta  = get_term_meta( $term->term_id, 'txt_upload_image', true );
                    $url = wp_get_attachment_url( $term_meta );
                ?>
                    <a> 
                        <img src="<?php echo $url; ?>" alt=""/>
                        <h3><?php echo $term->name; ?></h3> </a>
                        <p><?php echo $term->description; ?></p> 
                    </a>
                <?php
                }
                ?>

                <!-- <li>
                    <a href="#">
                        <img src="<?php echo $url; ?>" alt="">
                        <h4 class="location-category">
                            The Eiffel Tower
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/eiffel-tower-featured-768x576.jpg" alt="">
                        <h4 class="location-category">
                            The Eiffel Tower
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/eiffel-tower-featured-768x576.jpg" alt="">
                        <h4 class="location-category">
                            The Eiffel Tower
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="https://searchandgo.qodeinteractive.com/wp-content/uploads/2016/03/eiffel-tower-featured-768x576.jpg" alt="">
                        <h4 class="location-category">
                            The Eiffel Tower
                        </h4>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</section>

<?php
