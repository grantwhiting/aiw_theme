<?php
// Template name: Home

// Get produc pod
$params = array(
  'limit' => -1
);

$productsPod = pods('product', $params);

get_header();
?>

<div class="home-page">
  <section class="section text-section">    
    <?php while (have_posts()): the_post(); ?>
    <h2 class="section__title">
      <span><?php the_title(); ?></span>
    </h2>
    <div class="section__content"><?php the_content(); ?></div>
    <?php endwhile; ?>    
  </section>

  <section class="section fade-in">
    <div class="image-grid">
      <?php
      if ($productsPod->total() > 0):
        while($productsPod->fetch()):
          $ID = $productsPod->field('html_id');
          $title = $productsPod->field('title');
          $content = $productsPod->field('content');
          $featuredImage = $productsPod->display('featured_image');
      ?>
      <a href="<?= get_site_url(); ?>/products/<?php echo strtolower($title); ?>" class="image-grid__item">
        <img class="image-grid__item--featured-image" src="<?php echo $featuredImage; ?>" />
        <p><?php echo $title; ?></p>
      </a>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>
