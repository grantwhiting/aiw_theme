<?php
$page = get_the_title($post->ID);
$pageTagline = get_post_meta(
  $post->ID,
  'Tagline',
  true);
$pageImgSrc = wp_get_attachment_image_src(
  get_post_thumbnail_id($post->ID),
  'aiw-featured-image');

// Get slides for custom slider
$params = array(
  'limit' => -1
);

$homeSlider = pods(
  'home_slider',
  $params);
?>

<header id="js-parallax-window" class="<?php echo strtolower($page) ?>_header parallax-window">
  <div class="parallax-static-content">
    <?php get_template_part('/includes/_navigation'); ?>
    <div class="owl-carousel-header">
      <div class="tagline">
        <h1>AIW</h1>
        <p><?php echo $pageTagline; ?></p>
        <a class="cta-button" href="/process">Get Started</a>
      </div>
      <div id="js-parallax-background" class="parallax-background" style="background-image: url(<?php echo $pageImgSrc[0]; ?>);">
        <div class="owl-carousel owl-theme">
          <?php
          if ($homeSlider->total() > 0):
            while ($homeSlider->fetch()):
              $slides = $homeSlider->field('slides.guid');
              foreach ($slides as $slide):
          ?>
              <img src="<?php echo $slide; ?>" />
          <?php
              endforeach;
            endwhile;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</header>
