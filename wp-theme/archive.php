<?php
// Archive Template for Blog/News Listing

get_header();

if ( have_posts() ) :
    echo '<h1>' . esc_html( get_the_archive_title() ) . '</h1>';  
    while ( have_posts() ) : the_post();
        echo '<article>';  
        echo '<h2><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h2>';
        echo '<div>' . get_the_excerpt() . '</div>';
        echo '</article>';
    endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
?>