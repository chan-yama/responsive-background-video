<?php

function responsive_background_video()
{
  include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/responsive-background-video/views/rbv-view.php';
}

function responsive_background_video_short_code() {
    return responsive_background_video();
}
add_shortcode('responsive-background-video', 'responsive_background_video_short_code');