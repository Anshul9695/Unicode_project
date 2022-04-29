<?php

/**
 *template header .
 *
 *@package Wpunicode
 */
?>
    <!DOCTYPE html>
<html lang="<?php language_attributes();?>">

<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php the_title(); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php wp_head();?>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body <?php body_class();?>>
<?php wp_body_open()?>
<!-- Top bar start here. -->
 <?php
 get_template_part('template-parts/header/topbar');
 ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">


    <?php
               $custom_logo_id = get_theme_mod('custom_logo');
               $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

               if (has_custom_logo()) {
                  echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
               } else {
                  echo '<h1>' . get_bloginfo('name') . '</h1>';
              
               } ?>

      <!-- <h1 class="logo me-auto"><a href="index.html">Medilab</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <?php 
        get_template_part('template-parts/header/nav');
        ?>

      <!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->