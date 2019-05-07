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
        <h1 class="outline">AIW</h1>
        <p class="outline"><?php echo $pageTagline; ?></p>
        <a class="cta-button" href="/process">Get Started</a>
        <span id="arrowDown" class="arrow-down bounce animate" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-down.png)"></span>
      </div>
      <div id="js-parallax-background" class="parallax-background header-image" style="background-image: url(<?php echo $pageImgSrc[0]; ?>);">
        <!-- <div class="owl-carousel owl-theme">
          <?php
          if ($homeSlider->total() > 0):
            while ($homeSlider->fetch()):
              $slides = $homeSlider->field('slides.guid');
              foreach ($slides as $slide):
          ?>
            <div class="owl-image owl-lazy" data-src="<?php echo $slide; ?>" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/ajax-loader.gif)"></div>
          <?php
              endforeach;
            endwhile;
          endif;
          ?>
        </div> -->
      </div>
    </div>
  </div>
</header>
