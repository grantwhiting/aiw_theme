<?php
$menu = wp_get_nav_menu_object('Main');
$items = wp_get_nav_menu_items($menu->term_id);
$page = get_the_title($post->ID);
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<nav class="main-nav">
  <ul class="main-nav__list">
    <li class="nav-logo">
      <a href="/">
        <img src="<?php echo $logo[0]; ?>" alt="AIW Logo" />
      </a>
    </li>
    <?php foreach ($items as $item): ?>
    <li class="main-nav__list--item">
      <a class="<?php echo $page == $item->title ? 'active' : ''  ?>" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>
