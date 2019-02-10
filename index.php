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
    <div><?php the_content(); ?></div>
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

          //Lower case everything
          $seoUrl = strtolower($title);
          //Make alphanumeric (removes all other characters)
          $seoUrl = preg_replace("/[^a-z0-9_\s-]/", "", $seoUrl);
          //Clean up multiple dashes or whitespaces
          $seoUrl = preg_replace("/[\s-]+/", " ", $seoUrl);
          //Convert whitespaces and underscore to dash
          $seoUrl = preg_replace("/[\s_]/", "-", $seoUrl);
      ?>
      <a href="<?= get_site_url(); ?>/products/<?php echo $seoUrl; ?>" class="image-grid__item">
        <div class="image-grid__item--featured-image" style="background-image: url(<?php echo $featuredImage; ?>);"></div>
        <p><?php echo $title; ?></p>
      </a>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </section>

  <section class="section fade-in">
      <div class="external-links">
        <p><a href="//www.nfrc.org">NFRC</a></p>
        <p>Proudly Providing <a href="//www.sunvalleybronze.com">Sun Valley Bronze</a></p>
      </div>
  </section>
</div>

<?php get_footer(); ?>
