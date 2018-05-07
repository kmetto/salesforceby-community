<?php
/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
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
        get_template_part( 'loop', 'single' );
        ?>
        </div><!-- #content -->
        <div class="main__sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- #container -->
<?php get_footer(); ?>
