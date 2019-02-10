<?php
// Template name: Standard Template
get_header();
?>

<div class="main-content__inner">
    <?php while(have_posts()): the_post(); ?>
        <div class="section text-section">
            <h2 class="section__title">
              <span><?php the_title(); ?></span>
            </h2>
            <div><?php the_content(); ?></div>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
