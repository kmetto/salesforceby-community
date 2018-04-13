<?php
/**
 * Created by PhpStorm.
 * User: Mashinskayam
 * Date: 12.04.2018
 * Time: 15:02
 */

wp_enqueue_script('main', get_template_directory_uri().'/dist/js/main.bundle.js', '', '', 'true');

wp_enqueue_style( 'styles', get_template_directory_uri().'/dist/css/styles.css', '', '', 'false' );