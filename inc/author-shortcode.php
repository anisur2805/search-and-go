<?php 
    $user_id = get_current_user_id();
    $member_since = get_the_author_meta( 'user_registered', $user_id );
    $avatar_url = get_avatar_url( $user_id );
    $name = get_the_author_meta( 'display_name', $user_id );
    $user_rating = get_user_meta( $user_id, 'user_rating', true );
    $user_bio = get_the_author_meta( 'user_description', $user_id );

    $user_email = get_the_author_meta( 'user_email', $user_id );
    $user_url = get_the_author_meta( 'user_url', $user_id );
    $args = array(
        'user_id' => $user_id,
        'status' => 'approve'
    );
    $reviews = get_comments( $args );
    $review_count = count( $reviews );
    $user_rating = 0;
    foreach( $reviews as $review ) {
        $rating = get_comment_meta( $review->comment_ID, 'rating', true );
        $user_rating += (int) $rating;
    }
    $user_rating = $user_rating / $review_count;

    $args = array(
        'author' => $user_id,
        'post_type' => 'sag_listing',
        'post_status' => 'publish',
        'numberposts' => -1,
    );
    $custom_posts = get_posts( $args );
    $total_post = count( $custom_posts );

?>

<div class="sag-wrapper sag-author-profile-content">
    <div class="container-fluid">
        <div class="sag-author-header-row row sag-mb-40">
            <div class="col-md-6">
                <div class="sag-author-info sag-card-block">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="<?php echo esc_url( $avatar_url ); ?>" alt="" />
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <?php echo esc_attr( $name ); ?>
                    <p><?php echo 'Member since: ' . human_time_diff( strtotime( $member_since ) ) . ' ago' ?></p>

                    <?php 
                    ?>
                    </div>
                </div>
                </div>
            </div>
            <div class="sag-author-posts col-md-6">
            <div class="sag-author-info sag-card-block">
                <ul>
                    <li>
                        <?php echo $user_rating; ?>
                        <i class="bi bi-star-fill"></i>
                    </li>
                    <li>
                        <?php echo esc_attr($review_count . ' review'); ?>
                    </li>
                    <li>
                        <?php esc_attr_e($total_post . ' listings'); ?>
                    </li>
                </ul>
            </div>
            </div>
        </div>

        <div class="sag-author-details-row row sag-mb-40">
            <div class="col-md-8">
                <div class="sag-author-info sag-card-block sag-author-block">
                    <div class="sag-author-header">
                        <i class="bi bi-person"></i> <?php esc_html_e('About'); ?>
                    </div>
                    <div class="sag-author-content">
                        <?php if( $user_bio ) {
                            echo esc_html( $user_bio );
                        } else {
                            echo '<p>' . esc_html( 'Noting to show' ) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
                <div class="sag-author-block sag-author-info sag-card-block">
                    <div class="sag-author-header">
                        <i class="bi bi-person"></i> <?php esc_html_e('Contact Info'); ?>
                    </div>
                    <div class="sag-author-content">
                        <ul>
                            <li><a href="mailto:<?php echo esc_attr($user_email); ?>"><i class="bi bi-envelope"></i> <?php echo esc_attr($user_email); ?></a></li>
                            <li><a href="<?php echo esc_attr($user_url); ?>"><i class="bi bi-browser-chrome"></i>  <?php echo esc_attr($user_url); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sag-author-listing-posts-wrapper">
            <div class="row sag-mb-40">
                <h3><?php esc_html_e('Author Listings'); ?></h3>
            </div>
            <div class="row">
                <?php 
                    // Query for author post
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $args = array(
                        'post_type' => 'sag_listing',
                        'post_status' => 'publish',
                        'paged' => $paged,
                        'posts_per_page' => 5
                    );
                    $sag_listing_query = new WP_Query( $args );

                    if( $sag_listing_query->have_posts() ) {
                        while( $sag_listing_query->have_posts() ) {
                            $sag_listing_query->the_post();
                            echo '<div class="col-md-4">';
                                echo '<div class="sag-card-block">';
                                    if(has_post_thumbnail()) {
                                        echo '<div class="author-feature-image">' .the_post_thumbnail('large').'</div>';
                                    } else {
                                        echo '<div class="author-feature-image no-img"></div>';
                                    }
                                    echo '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
                                    echo '<p>' . get_the_excerpt() . '</p>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }

                    $pagination = paginate_links( array(
                        'base'    => get_pagenum_link() . '%_%',
                        'format'  => 'page/%#%',
                        'current' => $paged,
                        'total'   => $sag_listing_query->max_num_pages
                    ) );
                    
                    echo '<div class="sag-pagination">' . $pagination . '</div>';

                    wp_reset_postdata();
                    ?>
            </div>
        </div>
    </div>
</div>