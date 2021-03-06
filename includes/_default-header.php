<?php
$page = get_the_title($post->ID);
$pageTagline = get_post_meta($post->ID, 'Tagline', true);
$pageImgSrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'aiw-featured-image');
?>

<header
  id="js-parallax-window" class="<?php echo strtolower($page) ?>_header parallax-window">
  <div class="parallax-static-content">
    <?php get_template_part('/includes/_navigation'); ?>
    <div class="tagline">
      <h1 class="outline"><?php echo $pageTagline; ?></h1>
    </div>
  </div>
  <?php if ($page != 'home'): ?>
  <div id="js-parallax-background" class="parallax-background" style="background-image: url(<?php echo $pageImgSrc[0]; ?>);"></div>
  <?php endif ?>
</header>
