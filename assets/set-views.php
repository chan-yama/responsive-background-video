<?php

// 通常の要素として追加するview
function rbv_view()
{
  include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/responsive-background-video/views/rbv-view.php';
}

function rbv_view_short_code()
{
  return rbv_view();
}
add_shortcode('responsive-background-video', 'rbv_view_short_code');

// bodyタグの一番上に挿入するview
function rbv_top_view_short_code()
{
  add_action('wp_enqueue_scripts', wp_enqueue_script('rbv-prepend-body-view', plugins_url('/responsive-background-video/javascripts/rbv.js', ''), array('jquery'), null, true));
  return rbv_view();
}
add_shortcode('responsive-background-video-top', 'rbv_top_view_short_code');
