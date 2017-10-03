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
    <h2 class="section__title">
      <span>We Are AIW</span>
    </h2>
    <p class="section__content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tincidunt tempus purus sit amet eleifend. Sed turpis dui, rutrum cursus ligula eu, pretium convallis nisl. Proin in iaculis ipsum.</p>
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
      <a href="/aiw/products/<?php echo strtolower($title); ?>" class="image-grid__item">
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
