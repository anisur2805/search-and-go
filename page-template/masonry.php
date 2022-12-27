<?php

/**
 * Template Name: Masonry Page 
 */

get_header();
?>
<main id="primary" class="site-main sag-gallery-wrapper sag-gallery-masonry-wrapper">
    <div class="sag-blog-banner"></div> 
    
    <div class="container sag-container">
        <div class="sag-blog-topbar text-center">
            <h3 class="page-title">
                <?php _e('Read our latest posts', 'search-and-go'); ?>
            </h3>
            <p>
                <?php _e('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.', 'search-and-go'); ?>
            </p>
        </div>

        <div class="sag-gallery sag-masonry-gallery">
            <?php
            $args = array(
                'post_type' => 'sag_listing',
                'posts_per_page' => -1,
            );
            $sag_listings = get_posts($args);

            if ($sag_listings) {
                
                foreach ($sag_listings as $sag_listing) {
                    echo '<div class="sag-gallery-item sag-masonry-gallery-item">';
                    if (has_post_thumbnail($sag_listing->ID)) {
                        echo get_the_post_thumbnail($sag_listing->ID, 'medium');
                    }
                    echo '<h3><a href="' . get_the_permalink($sag_listing->ID) . '">' . $sag_listing->post_title . '</a></h3>';
                    echo '<p>' . $sag_listing->post_excerpt . '</p>';
                    echo '<a class="sag-button sag-read-more" href="' . get_permalink( $sag_listing->ID ) . '">' . __('Read more', 'search-and-replace') . '</a>';
                    echo '</div>';
                }
            } else {
                // No posts were found
                echo '<p>No posts were found.</p>';
            }
            ?>

        </div>
    </div>
</main><!-- #main -->

<?php get_footer();
