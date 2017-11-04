<?php
// Template name: Process

get_header();
?>

<div class="main-content__inner">
  <?php while(have_posts()): the_post(); ?>
  <h2 class="section__title">
    <span><?php the_title(); ?></span>
  </h2>
  <div class="section__content"><?php the_content(); ?></div>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
