<?php if(wp_is_mobile()): ?>
  <?php $video_url = plugins_url('/responsive-background-video/videos/video_sm.gif', '') ?>
<?php else: ?>
  <?php $video_url = plugins_url('/responsive-background-video/videos/video_lg.gif', '') ?>
<?php endif; ?>

<div id="responsive-background-video" class="responsive-background-video" style="background-image: url('<?php echo $video_url; ?>">
  <p>
    <?php if(!empty(get_option('rbv_title'))): ?>
      <?php echo get_option('rbv_title'); ?>
    <?php endif; ?>

    <?php if(!empty(get_option('rbv_description'))): ?>
      <br/>
      <span class="small">
        <?php echo nl2br(get_option('rbv_description')); ?>
      </span>
    <?php endif; ?>

    <?php if(!empty(get_option('rbv_button_text'))&&!empty(get_option('rbv_button_url'))): ?>
      <br/>
      <?php $button_text = get_option('rbv_button_text'); ?>
      <a class="btn btn-outline-secondary btn-lg" href="<?php echo get_option('rbv_button_url'); ?>" title="<?php echo $button_text; ?>" role="button">
        <?php echo $button_text; ?>
      </a>
    <?php endif; ?>
  </p>
</div>