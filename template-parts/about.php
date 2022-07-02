<?php
/**
 * Template Name: About Me
 */

get_header();
?>

<div class="container">
    <h2 class="title mb-3"><?= get_the_title() ?></h2>
    <div>
        <?php get_the_content() ?>
    </div>
</div>
<?php
get_footer();
