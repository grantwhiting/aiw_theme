<?php
$page = get_the_title($post->ID);
$frontpageId = get_option('page_on_front');
$isStandardTemplate = is_page_template('standard.php');
$isContactTemplate = is_page_template('contact.php');
?>

<!DOCTYPE html>
<html id="mainHTML" lang="en">
  <head>
    <title>Architectural Iron Works</title>
    <meta name="description" content="Architectural Iron Works">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel=icon type="img/ico" href=/favicon.ico> -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/main.bundle.css" />
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>

    <script type="text/javascript">
      document.getElementById("mainHTML").style.display = "none";
    </script>
  </head>

  <body>
    <!-- Header -->
    <?php
    if ($post->ID == $frontpageId)
    {
      get_template_part('/includes/_home-header');
      echo "<div class='main-content'>";
    }
    else if (is_404() ||
      $isContactTemplate ||
      $isStandardTemplate)
    {
      get_template_part('/includes/_no-banner-header');
      echo "<div class='main-content no-banner'>";
    }
    else
    {
      get_template_part('/includes/_default-header');
      echo "<div class='main-content'>";
    }
    ?>
