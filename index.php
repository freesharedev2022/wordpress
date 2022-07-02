<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<?php
$page = (get_query_var('page')) ? get_query_var('page') : 1;
$page_size = 20;
$args = array('posts_per_page' => $page_size, 'order' => 'DESC', 'orderby' => 'post_date', 'paged' => $page);
$postslist = new WP_Query($args);
$total = $postslist->found_posts;
$postslist = $postslist->posts;
?>

<section>

    <h4><small>RECENT POSTS</small></h4>
    <?php
    foreach ($postslist as $post):
        setup_postdata($post);
        $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium');
        $categories = get_the_category();
        ?>
        <?php require(get_template_directory(). '/template-parts/content/list-item.php') ?>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
    <hr>

</section>


<?php
get_footer();
