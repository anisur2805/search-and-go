<section id="banner" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/images/home-image-new.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Find the Best Places to Be</h1>
                <p>All the top locations – from restaurants and clubs, to cinemas, galleries, and more.</p>
                <form action="">
                <div class="sg-filter-row">
                    <div class="sg-filter-row-keyword flex1 mb-20px">
                        <h5>Keywords</h5>
                        <input type="text" name="keyword" id="keyword" class="" placeholder="Keyword" value="" autocomplete="off">
                    </div>
                    <div class="sg-filter-row-category flex1 mb-20px">
                        <h5>Category</h5>
                        <select>
                            <option value="">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                    <div class="sg-filter-row-location flex1 mb-20px">
                        <h5>Location</h5>
                        <select>
                            <option value="">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                </div>

                <a class="sg-btn" href="<?php echo esc_url( home_url('listing-item' ) ); ?>"><i class="bi bi-search"></i> Search place</a>

                    <ul class="location-lists">
                        <?php
                        $terms = get_terms(
                            array( 
                                'taxonomy'  => 'listing_item',
                                'number'    => 5,
                            )
                        );
                        
                        foreach ($terms as $term) {
                            $term_meta  = get_term_meta( $term->term_id, 'sg_term_icon', true );
                            ?>
                            <li>
                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"> 
                                    <i class="bi <?php echo $term_meta; ?>"></i>
                                    <h3><?php echo esc_attr( $term->name ); ?></h3> </a>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </form>

            </div>
        </div>
    </div>
</section>