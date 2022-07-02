<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<article>
    <header class="blog-post-header">
        <h1><?= get_the_title() ?></h1>
        <div class="meta mb-3"><span class="date">Xuất bản <?= NiceTime(get_post_time()) ?></span><span class="comment"><a  class="text-link" href="#comment"><?= get_comments_number() ?> bình luận</a></span></div>
    </header>
    <div class="main-content">
        <?= get_the_content() ?>
    </div>
    <div class="article-tags">

        <?php
        $post_tags = get_the_tags();
        $tag_id = '';
        $tag_query = [];
        if ($post_tags) {
            echo '<span class="tag-subtitle">Thẻ Tags : </span>';
            foreach ($post_tags as $tag) {
                $tag_id = $tag_id . $tag->term_id . ',';
                $tag_link = get_tag_link($tag->term_id); ?>
                <a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a><span class="tag-dot"></span>
                <?php
            }
        }
        if($tag_id) {
            $args = array('posts_per_page' => 6, 'post__not_in' => [get_the_ID()], 'order' => 'DESC', 'orderby' => 'post_date', 'tag__in' => $tag_id);
            $tag_query = get_posts($args);
        }

        if(count($tag_query) == 0) {
            $tag_query = get_posts(array(
                'category__in' => wp_get_post_categories(get_the_ID()),
                'numberposts' => 6,
                'post__not_in' => array(get_the_ID())
            ));
        }
        ?>
    </div>

    <div class="blog-comments-section" id="comment">
        <div id="disqus_thread"></div>
        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
    </div><!--//blog-comments-section-->
</article>