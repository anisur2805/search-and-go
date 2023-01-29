<li>
    <div class="sg-feature-img">
        <a href=<?php echo get_the_permalink(); ?>>
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) );
            } else {
                echo '<img src="https://cdn.pixabay.com/photo/2022/11/07/18/33/hibiscus-7577002_960_720.jpg" class="img-fluid" />';
            }?>
        </a>
    </div>
    <div class="sg-result-content">
        <h3 class="sg-listing-title">
            <a href=<?php echo get_the_permalink(); ?>>
                <?php the_title();?>
            </a>
        </h3>
        <span class="sg-listing-item-address"> <span>Avinguda del Marquès de l'Argentera, 15, 08003 Barcelona, Spain</span> </span>
        <p class="sg-post-excerpt"><?php echo get_the_excerpt(); ?></p>
    </div>
</li>