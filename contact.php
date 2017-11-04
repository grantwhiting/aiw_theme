<?php
// Template name: Contact

$main_email = get_post_meta($post->ID, 'main_email', true);
$main_phone = get_post_meta($post->ID, 'main_phone', true);

get_header();
?>

<div class="main-content__inner">
  <div class="contact-page">
    <?php while(have_posts()): the_post(); ?>
    <div class="contact-box"><?php the_content(); ?></div>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
