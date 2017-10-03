<?php
// Template name: Contact

$main_email = get_post_meta($post->ID, 'main_email', true);
$main_phone = get_post_meta($post->ID, 'main_phone', true);

get_header();
?>

<div class="main-content__inner">
  <div class="contact-page">
    <div class="contact-box">
      <p>For general inquiries:</p>
      <p class="email"><?php echo $main_email; ?></p>
      <p class="phone"><?php echo $main_phone; ?></p>
    </div>
  </div>
</div>

<?php get_footer(); ?>
