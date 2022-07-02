<hr>
<h2><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h2>
<h5><span class="glyphicon glyphicon-time"></span> <?= NiceTime(get_post_time()) ?></h5>

<h5>
    <?php foreach($categories as $item){
      $cate_link = get_category_link($item);
        ?>
    <span class="label label-danger"><a href="<?= $cate_link; ?>"><?= $item->name; ?></a></span>
    <?php } ?>
</h5><br>
<h5 class="comment"><span><?= get_comments_number() ?> comment</span></h5>
<p><?= get_the_excerpt() ?></p>
<br><br>
