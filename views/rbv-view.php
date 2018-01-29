<?php if(wp_is_mobile()): ?>
  <?php $video_url = plugins_url('/responsive-background-video/videos/video_sm.gif', '') ?>
<?php else: ?>
  <?php $video_url = plugins_url('/responsive-background-video/videos/video_lg.gif', '') ?>
<?php endif; ?>

<?php if ($posts): ?>
  <?php foreach ($posts as $post): ?>
    <?php setup_postdata($post);?>
    <div id="responsive-background-video" class="responsive-background-video" style="background-image: url('<?php echo $video_url; ?>">
      <p>
        <?php echo get_the_title($post->ID); ?>

        <?php if(!empty(get_post_meta($post->ID, 'description', true))): ?>
          <br/>
          <span class="small">
            <?php echo nl2br(get_post_meta($post->ID, 'description', true)); ?>
          </span>
        <?php endif; ?>

        <?php if(!empty(get_post_meta($post->ID, 'button_text', true))): ?>
          <br/>
          <?php $button_text = get_post_meta($post->ID, 'button_text', true); ?>
          <a class="btn btn-outline-secondary btn-lg" href="<?php echo get_post_meta($post->ID, 'button_url', true); ?>" title="<?php echo $button_text; ?>" role="button">
            <?php echo $button_text; ?>
          </a>
        <?php endif; ?>
      </p>
    </div>
  <?php endforeach; ?>
<?php endif; ?>