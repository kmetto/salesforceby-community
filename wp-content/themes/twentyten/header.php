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
	<div id="header" class="wrapper">
		<div id="masthead">
			<nav id="branding" class="nav" role="banner">
				<div class="nav__logo">
					<img src="<?=get_template_directory_uri().DIRECTORY_SEPARATOR.'dist'.DIRECTORY_SEPARATOR.'static'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'salesforceby_logo.svg';?>" alt="" class="nav__logo-img img__logo">
				</div>
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
                        <a href="/login" class="button button_brand">Войти</a>
                        <a href="/register" class="button button_sf">Регистрация</a>
                    <?php endif;?>
                </div>

            </nav><!-- #branding -->

		</div><!-- #masthead -->
	</div><!-- #header -->
	<header class="header">
		<div class="wrapper">
			<div class="header__container">
				<div class="header__col header__col_left">
					<img class="header__image" src="<?=resolveStatic(['dist', 'static', 'images', 'sf-coomunity.png']);?>" alt="">
				</div>
				<div class="header__col header__col_right">
					<p class="header__title">Belarusian<br>Salesforce<br>Community</p>
				</div>
			</div>
		</div>
	</header>
	<div class="wrapper content">