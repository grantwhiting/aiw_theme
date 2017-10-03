<?php
$page = get_the_title($post->ID);
?>

<!DOCTYPE html>
<html id="mainHTML" lang="en">
  <head>
    <title>Architectural Iron Works</title>
    <meta name="description" content="Architectural Iron Works">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel=icon type="img/ico" href=/favicon.ico> -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/main.bundle.css" />
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php wp_head(); ?>

    <script type="text/javascript">
      document.getElementById("mainHTML").style.display = "none";
    </script>
  </head>

  <body>
    <!-- Header -->
    <?php
    if ($page == 'Home') {
      get_template_part('/includes/_home-header');
      echo "<div class='main-content'>";
    } else if (is_404() || $page == 'Contact') {
      get_template_part('/includes/_no-banner-header');
      echo "<div class='main-content no-banner'>";
    } else {
      get_template_part('/includes/_default-header');
      echo "<div class='main-content'>";
    }
    ?>
