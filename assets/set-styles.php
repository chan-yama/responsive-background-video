<?php

// スタイルシート読み込み
function rbv_enqueue_style()
{
  wp_enqueue_style('rbv-css', plugins_url('/responsive-background-video/styles/rbv.css', ''));
}
add_action('wp_enqueue_scripts', 'rbv_enqueue_style');
