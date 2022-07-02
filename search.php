<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$page = (get_query_var('page')) ? get_query_var('page') : 1;
$page_size = 15;
$s=get_search_query();
$args = array('posts_per_page' => $page_size, 's'=>$s, 'order' => 'DESC', 'orderby' => 'post_date', 'paged' => $page, 'post_type'=>'post');
$postslist = new WP_Query($args);
$total = $postslist->found_posts;
$postslist = $postslist->posts;
?>

<section>
        <div class="search-title">Kết quả tìm kiếm từ khoá: <?= $s ?></div>
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

</section>

<?php
get_footer();
