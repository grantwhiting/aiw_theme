<?php
// Template name: Portfolio

// Get portfolio pods
$params = array(
  'limit' => -1
);

$portfolioPod = pods('portfolio', $params);

get_header();
?>

<div class="main-content__inner">
  <div class="portfolio-page">
    <section class="section text-section">
      <?php while(have_posts()): the_post(); ?>
      <h2 class="section__title">
        <span><?php the_title(); ?></span>
      </h2>
      <div><?php the_content(); ?></div>
      <?php endwhile; ?>
    </section>

    <section class="section select-section fade-in">
      <div class="select-section__tabs">
        <button id="showJobs" class="active tab" href="javascript:void(0)">View Jobs</button>
        <button id="showImages" class="tab" href="javascript:void(0)">View All Images</button>
      </div>
    </section>

    <section class="section fade-in toggle-section">
      <div id="allJobs" class="js-grid custom-grid-container active">
        <div class="custom-grid">
          <?php
          $idx = 0;
          if ($portfolioPod->total() > 0):
            while ($portfolioPod->fetch()):
              $title = $portfolioPod->field('title');
              $featuredImage = $portfolioPod->display('featured_image');
              $content = $portfolioPod->field('content');
              $images = $portfolioPod->field('gallery.ID');
          ?>
          <div class="custom-grid__item with-image portfolio js-grid-item trigger-owl" onclick='triggerModalWithOwl("<?php echo $title; ?>", <?php echo json_encode($content); ?>, <?php echo json_encode($images); ?>)'>
            <div class="grid-image auto-height-image" data-src="<?php echo $featuredImage; ?>"></div>
            <div class="grid-info">
              <h4><?php echo $title; ?></h4>
            </div>
          </div>
          <?php
            $idx++;
            endwhile;
          endif;
          ?>
        </div>
        <button class="show-more-button">More</button>
      </div>

      <div id="allImages" class="image-gallery custom-grid-container">
        <div class="image-gallery__tags">
          <?php
          // get all categories
          $categories = get_categories();

          // Map $categories to new array and get new $category name
          $categoryList = array_map(function($category) {
              return $category->name;
          }, $categories);

          // Break tags list into a comma seperated string
          $categoryList = implode(', ', $categoryList);

          // Query for the images
          $query_images_args = array(
              'post_type' => 'attachment',
              'post_mime_type' => 'image',
              'category_name' => $categoryList,
              'post_status' => 'inherit',
              'posts_per_page' => -1,
          );
          $query_images = new WP_Query($query_images_args);
          ?>

          <input name="image-filter" id="checkbox_all" rel="all" type="radio" checked />
          <label for="checkbox_all">All</label>
          <?php
          foreach ($categories as $category):
            if ($category->name == "Uncategorized") {
              continue;
            }
            $catName = str_replace(' ', '-', $category->name);
          ?>
          <input name="image-filter" id="checkbox_<?php echo $catName; ?>" rel="<?php echo strtolower($catName); ?>" type="radio" />
          <label for="checkbox_<?php echo $catName; ?>"><?php echo $catName; ?></label>
          <?php endforeach; ?>
        </div>

        <ul class="custom-grid sortable-grid">
        <?php
        foreach($query_images->posts as $image):
          $imageCategories = get_the_category($image->ID);
          $imageCategoryList = array_map(function($imageCategory) {
              return $category = str_replace(' ', '-', $imageCategory->cat_name);
          }, $imageCategories);
          $imageCategoryList = implode(' ', $imageCategoryList);
        ?>
          <li class="all <?php echo strtolower($imageCategoryList); ?>">
            <div class="custom-grid__item with-image portfolio image-gallery__item" onclick="triggerModal('<?php echo pods_image_url($image->ID, 'large'); ?>')">
              <div class="grid-image auto-height-image" data-src="<?php echo pods_image_url($image->ID, 'large'); ?>"></div>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
    </section>
  </div>
</div>

<!-- Modal -->
<script type="text/javascript">
  function triggerModalWithOwl(title, content, imgArr) {
    var modalCheck = document.getElementById("modal-1");
    var modalContent = document.getElementById("modal-content");
    var modalTitle = document.getElementById("modal-title");
    var imageGallery = document.getElementById("image-gallery");

    modalTitle.innerHTML = title;
    modalContent.innerHTML = content;

    if (imgArr.length > 0) {
      imgArr.forEach(function(src) {
        var img = new Image();
        img.className += "owl-image";
        img.src = src;
        imageGallery.prepend(img);
      });
    }

    imgArr = [];

    modalCheck.checked = true;
  }

  function emptyOwl() {
    var owlItem = document.getElementsByClassName("owl-item");
    while (owlItem.length > 0){
      owlItem[0].parentNode.removeChild(owlItem[0]);
    }

    var owlStage = document.getElementsByClassName("owl-stage-outer");
    while (owlStage.length > 0) {
      owlStage[0].parentNode.removeChild(owlStage[0]);
    }
  }

  function triggerModal(src) {
    var modalCheck = document.getElementById("modal-2");
    var modalImg = document.getElementById("modal-image");
    modalImg.src = src;
    modalCheck.checked = true;
  }
</script>

<div class="modal">
  <label for="modal-1"></label>
  <input class="modal-state" id="modal-1" type="checkbox" />
  <div class="modal-fade-screen destroy-owl" onclick="emptyOwl()">
    <div class="section modal-inner">
      <div class="modal-close destroy-owl" for="modal-1" onclick="emptyOwl()"></div>
      <h2 class="section__title">
        <span id="modal-title"></span>
      </h2>
      <div class="modal-intro">
        <div id="image-gallery" class="owl-carousel owl-theme"></div>
      </div>
      <div id="modal-content" class="modal-content"></div>
    </div>
  </div>
</div>

<div class="modal">
  <label for="modal-2"></label>
  <input class="modal-state" id="modal-2" type="checkbox" />
  <div class="modal-fade-screen">
    <div class="modal-inner full-image-content">
      <div class="modal-close" for="modal-2"></div>
      <div class="modal-content">
        <img id="modal-image" src="" />
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
