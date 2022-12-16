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
            <ul class="location-lists">

                <?php
                $terms = get_terms('listing_item');
                foreach ($terms as $term) {
                    $term_meta  = get_term_meta( $term->term_id, 'sg_term_img', true );
                    ?>
                    <li>
                        <a> 
                            <img class="img-fluid" src="<?php echo $term_meta; ?>" alt="" />
                            <h3><?php echo $term->name; ?></h3> </a>
                        </a>
                    </li>
                <?php
                }
                ?>

                <!-- <li>
                    <a href="#">
                        <img src="<?php echo $term_meta; ?>" alt="">
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
