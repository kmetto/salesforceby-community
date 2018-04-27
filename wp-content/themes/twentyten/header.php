<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		echo esc_html( ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<nav id="branding" class="nav" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
	            <?php
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						/*
						 * We need to figure out what the minimum width should be for our featured image.
						 * This result would be the suggested width if the theme were to implement flexible widths.
						 */
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}

					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
					elseif ( get_header_image() ) :
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
					?>
					<?php endif; ?>

                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Header menu widget") ) : ?>
                <?php endif;?>

                <div class="nav__menu" id="nav__menu">
                    <a class="menu__link" href="/">Публикации</a>
                    <a class="menu__link" href="/conferences">Конференции</a>
                </div>

                <form role="search" method="get" id="searchform" class="searchform" action="http://salesforceby-community/">
                    <div>
                        <label class="screen-reader-text" for="s">Найти:</label>
                        <input type="text" value="weff" name="s" id="s">
                        <input type="submit" id="searchsubmit" value="Поиск">
                    </div>
                </form>

                <div class="search-button-hidden" id="search-button-hidden">
                    <i class="icon-search"></i>
                </div>

                <div class="nav__user-actions">
                    <?php if(is_user_logged_in()):?>
                        <a href="/logout" class="button">Выйти</a>
                        <a href="<?php echo um_user_profile_url(); ?>" class="user__avatar user__avatar_header"><?php echo get_avatar( um_user('ID'), 120 ); ?></a>
                    <?php else:?>
                        <a href="/login" class="button">Войти</a>
                        <a href="/register" class="button button_brand">Регистрация</a>
                    <?php endif;?>
                </div>

            </nav><!-- #branding -->

		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">