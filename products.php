<?php
// Template name: Products

// Get products pod
$params = array(
  'limit' => -1
);

$productsPod = pods('product', $params);
$productsPod2 = pods('product', $params);

get_header();
?>


<div class="main-content__inner">
  <div class="products">
    <?php
    if ($productsPod2->total() > 0):
      while ($productsPod2->fetch()):
        $ID = $productsPod2->field('html_id');
        $title = $productsPod2->field('title');
        $content = $productsPod2->field('content');
        $images = $productsPod2->field('gallery.guid');
    ?>

    <section id="<?php echo $ID; ?>" class="section text-section">
      <h2 class="section__title">
        <span><?php  echo $title; ?></span>
      </h2>
      <div><?php echo $content; ?></div>
    </section>

    <section class="section fade-in">
      <div class="js-grid custom-grid-container">
        <div class="custom-grid">
        <?php foreach ($images as $image): ?>
          <div class="custom-grid__item with-image portfolio js-grid-item" onclick="triggerModal('<?php echo $image; ?>')">
            <img class="grid-image auto-height-image" data-src="<?php echo $image; ?>" src="#"/>
          </div>
        <?php endforeach; ?>
        </div>
        <button class="show-more-button">More</button>
      </div>
    </section>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</div>


<!--  Modal -->
<script type="text/javascript">
  function triggerModal(src) {
    var modalCheck = document.getElementById("modal-1");
    var modalImg = document.getElementById("modal-image");
    modalImg.src = src;
    modalCheck.checked = true;
  }
</script>

<div class="modal">
  <input class="modal-state" id="modal-1" type="checkbox" />
  <div class="modal-fade-screen">
    <div class="modal-inner full-image-content">
      <div class="modal-close" for="modal-1"></div>
      <div class="modal-content">
        <img id="modal-image" src="" />
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
