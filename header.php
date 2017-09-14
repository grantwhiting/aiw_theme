<?php
$menu = wp_get_nav_menu_object('Main');
$items = wp_get_nav_menu_items($menu->term_id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Architectural Iron Works</title>
    <meta name="description" content="Architectural Iron Works">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel=icon type="img/ico" href=/favicon.ico> -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/main.bundle.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body>
    <header>
      <nav class="main-nav">
        <ul class="main-nav__list">
          <li class="nav-logo">
            <img src="http://placehold.it/100x50?text=Logo" alt="AIW logo" />
          </li>
          <?php foreach ($items as $item): ?>
          <li class="main-nav__list--item">
            <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </header>

    <div class="main-content">
