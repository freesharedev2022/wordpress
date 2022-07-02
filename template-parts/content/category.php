<?php
$tag_info = get_queried_object();
$page_size = 15;
$page = (get_query_var('page')) ? get_query_var('page') : 1;
$type = $tag_info->taxonomy === 'category' ? 'category' : 'tags';
if($type !== 'category') {
    $args = array('posts_per_page' => $page_size, 'order' => 'DESC', 'orderby' => 'post_date', 'paged' => $page, 'tag_id' => $tag_info->term_id);
}else{
    $args = array('posts_per_page' => $page_size, 'order' => 'DESC', 'orderby' => 'post_date', 'paged' => $page, 'cat' => $tag_info->term_id);
}
$postslist = new WP_Query($args);
$total = $postslist->found_posts;
$total = intval($total);
$title = $type === 'category' ? 'Danh mục' : 'Thẻ Tags'
?>

<section>
        <div class="search-title"><?= $title ?> : <?= $tag_info->name; ?></div>
<?php
while ($postslist->have_posts()) : $postslist->the_post();
    $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium');
    $categories = get_the_category();
    ?>
    <?php require(get_template_directory(). '/template-parts/content/list-item.php') ?>
<?php
endwhile;
?>
</section>
