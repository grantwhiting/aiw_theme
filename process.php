<?php
// Template name: Process

get_header();
?>

<div class="main-content__inner">
  <section class="section text-section">
    <?php while(have_posts()): the_post(); ?>
    <h2 class="section__title">
      <span><?php the_title(); ?></span>
    </h2>
    <div><?php the_content(); ?></div>
    <?php endwhile; ?>
  </section>
</div>

<?php get_footer(); ?>
