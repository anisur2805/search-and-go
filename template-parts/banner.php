<?php
$terms = get_terms(
    array( 
        'taxonomy'  => 'sag_location',
        'number'    => 5,
    )
);
?>
<section id="banner" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/images/home-image-new.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Find the Best Places to Be</h1>
                <p>All the top locations – from restaurants and clubs, to cinemas, galleries, and more.</p>
                <form action="">
                <div class="sg-filter-row">
                    <div class="sg-filter-row-keyword flex1 mb-20px">
                        <input type="text" name="keyword" id="keyword-hp" class="" placeholder="Keyword" value="" autocomplete="off">

                        <?php 
                            $url              = site_url().$_SERVER['REQUEST_URI'];
                            $extract_url      = explode('/', $url);
                            $location_item    = $extract_url[sizeof($extract_url)-2];
                            $sg_location_args = array(
                                'post_type'      => 'sag_listing',
                                'post_status'    => 'publish',
                            );
                            $location_query =  new WP_Query( $sg_location_args );
                            
                            if($location_query->have_posts()){
                                while ($location_query->have_posts()){
                                    $location_query->the_post();
                                    $keywords = get_the_term_list( $post->ID, 'sag_keywords', '<ul><li>', '</li><li>', '</li></ul>' );
                                }
                                wp_reset_postdata();
                            }
                        ?>

                    </div>
                    <div class="sg-filter-row-category flex1 mb-20px">
                        <!-- <h5>Category</h5> -->
                        <select>
                            <option value="">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                    <div class="sg-filter-row-location flex1 mb-20px">
                        <!-- <h5>Categories</h5> -->
                        <?php 
                        $args = array(
                            'show_option_none' => __( 'Select category', 'textdomain' ),
                            // 'show_count'       => 1,
                            'orderby'          => 'name',
                            // 'echo'             => 0,
                            'taxonomy'         => 'sag_location',
                        );
                        wp_dropdown_categories( $args );
                        ?>
                        <select class="d-none">
                            <option value="">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                        <?php $categories = get_the_terms( $post->ID, 'sag_location' ); ?>
                    </div>
                </div>

                <a class="sg-btn" href="<?php echo esc_url( home_url('listing-item' ) ); ?>"><i class="bi bi-search"></i> Search place</a>

                    <ul class="location-lists">
                        <?php                        
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