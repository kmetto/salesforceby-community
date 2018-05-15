<?php
/**
 * Template Name: User Info
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="main">
    <div class="main__posts" role="main">

    <?php
    /*
     * Run the loop to output the posts.
     * If you want to overload this in a child theme then include a file
     * called loop-index.php and that will be used instead.
     */
    // get_template_part( 'loop', 'single' );
    if ( have_posts() ) while ( have_posts() ) : the_post();
    the_content();
    endwhile;
    ?>
    </div><!-- #content -->
    <div class="main__sidebar">
        <?php get_sidebar(); ?>
    </div>
</div><!-- #container -->
<?php get_footer(); ?>