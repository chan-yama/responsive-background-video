<?php

function responsive_background_video()
{
  $args = array(
    'numberposts' => 1, //表示（取得）する記事の数
    'post_type'   => 'rbv', //投稿タイプの指定
  );
  $posts = get_posts($args);

  include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/responsive-background-video/views/rbv-view.php';
}
