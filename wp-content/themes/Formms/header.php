<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="<?php language_attributes(); ?>" />
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title><?php the_title(); ?></title>
   <?php
   wp_head();
   ?>
</head>

<body <?php body_class(); ?>>
   <div class="hero_area">
      <!-- header section strats -->
      <?php
      wp_body_open();
      ?>
      <header class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
               <?php
               $custom_logo_id = get_theme_mod('custom_logo');
               $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

               if (has_custom_logo()) {
                  echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
               } else {
                  echo '<h1>' . get_bloginfo('name') . '</h1>';
              
               } ?>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <?php
                  wp_nav_menu(array(
                     "theme_location" => "primary"
                  ));
                  ?>
               </div>
            </nav>
         </div>
      </header>
      <!-- end header section -->