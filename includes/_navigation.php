<?php
$menu = wp_get_nav_menu_object('Main');
$items = wp_get_nav_menu_items($menu->term_id);
$page = get_the_title($post->ID);
?>

<nav class="main-nav">
  <ul class="main-nav__list">
    <li class="nav-logo">
      <a href="/">
        <img src="http://placehold.it/100x50?text=Logo" alt="AIW logo" />
      </a>
    </li>
    <?php foreach ($items as $item): ?>
    <li class="main-nav__list--item">
      <a class="<?php echo $page == $item->title ? 'active' : ''  ?>" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>
