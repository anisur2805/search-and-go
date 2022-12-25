<section class="locations-section bg-opacity-50 bg-body">
    <div class="container">
        <div class="row text-center">
            <h2 class="section-title"> Most Popular Locations </h2>
            <p class="section-subtitle"> Some fail to bear in mind that everyone is sentenced to death. Death is a treacherous virus that strikes randomly. The only truth is that nobody is going to make it out alive. We are all living on probation and our expiry date is indefinite. </p>
        </div>

        <div class="row pt-4">
            <ul class="location-lists">
                <?php
                $terms = get_terms(
                    array( 
                        'taxonomy'  => 'sag_location',
                        'number'    => 7,
                    )
                );
                
                foreach ($terms as $term) {
                    $term_meta  = get_term_meta( $term->term_id, 'sg_term_img', true );
                    ?>
                    <li>
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"> 
                            <img class="img-fluid" src="<?php echo esc_url( $term_meta ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" />
                            <h3><?php echo esc_attr( $term->name ); ?></h3> </a>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<?php
