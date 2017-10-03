<?php
$menu = wp_get_nav_menu_object('Main');
$items = wp_get_nav_menu_items($menu->term_id);
$page = get_the_title($post->ID);
?>

<div class="mobile-nav">
  <div class="mobile-nav__bar">
    <img src="http://placehold.it/100x50?text=Logo" alt="AIW logo" />

    <button class="hamburger hamburger--spin" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>

  <ul class="mobile-nav__list">
    <?php foreach ($items as $item): ?>
    <li class="mobile-nav__list--item">
      <a class="<?php if($page==$item->title){echo 'active';} ?>" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
