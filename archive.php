<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<?php
if (get_the_archive_title() == null) {
    if (have_posts()) : ?>
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/content/content', get_post_format());
        endwhile;
    else :
        get_template_part('template-parts/content/content', 'none');
    endif;
} else {
    get_template_part('template-parts/content/category', 'none');
} ?>

<?php get_footer(); ?>
