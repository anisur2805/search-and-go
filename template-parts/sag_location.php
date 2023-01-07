<section class="single-listing-item">
    <div class="container-fluid g-0">
        <div class="row g-0">
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14591.539698443348!2d90.3847218!3d23.893698949999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1sen!2sbd!4v1671196247088!5m2!1sen!2sbd" width="100%" height="900px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5 py-2 px-4">

            <?php get_template_part('/template-parts/search', 'form' ); ?>

                <div class="sg-filter-row-2">
                    <p>5 Results Found</p>
                    <div class="sortby-row">
                        <p class="sortby">
                            Sortby
                        </p>
                        <select>
                            <option value="">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                </div>

                <div class="row sg-result-row">
                    <div class="sg-result-posts">
                        <?php
                            $url_data = $_GET;
                            $url            = site_url().$_SERVER['REQUEST_URI'];
                            $extract_url    = explode('/', $url);
                            $location_item  = $extract_url[sizeof($extract_url)-2];
                            
                            $sg_location_args = array(
                                'post_type'      => 'sag_listing',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    'relation' => 'OR',
                                    array(
                                        'taxonomy' => 'keyword',
                                        'field'    => 'slug',
                                        'terms'    => $url_data['keyword'],
                                    ),
                                    array(
                                        'taxonomy' => 'sag_category',
                                        'field'    => 'slug',
                                        'terms'    => $url_data['sag_category'],
                                    ),
                                    array(
                                        'taxonomy' => 'sag_location',
                                        'field'    => 'slug',
                                        'terms'    => $url_data['sag_location'],
                                    ),
                                )
                            );
                            $location_query =  new WP_Query( $sg_location_args );
                            
                        ?>
                            <?php 
                                if ($location_query->have_posts()) {
                                    echo '<ul>';
                                    while ($location_query->have_posts()) {
                                        $location_query->the_post(); ?>
                                            <li>
                                                <div class="sg-feature-img">
                                                    <a href=<?php echo get_the_permalink(); ?>>
                                                        <?php if( has_post_thumbnail()){
                                                            the_post_thumbnail('large', array('class' => 'img-fluid'));
                                                        } else { 
                                                            echo '<img src="https://cdn.pixabay.com/photo/2022/11/07/18/33/hibiscus-7577002_960_720.jpg" class="img-fluid" />'; 
                                                        } ?>    
                                                    </a>
                                                </div>
                                                <div class="sg-result-content">
                                                    <h3 class="sg-listing-title">
                                                        <a href=<?php echo get_the_permalink(); ?>>
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <span class="sg-listing-item-address"> <span>Avinguda del Marquès de l'Argentera, 15, 08003 Barcelona, Spain</span> </span>
                                                    <p class="sg-post-excerpt"><?php echo get_the_excerpt(); ?></p>
                                                </div>
                                            </li>
                                        <?php 
                                    }
                                    echo '</ul>';
                                    wp_reset_postdata();
                                } else {
                                    _e('No Posts found!', 'search-and-go');
                                }

                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
