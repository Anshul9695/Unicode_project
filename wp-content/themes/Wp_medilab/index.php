<?php

/**
 *Main template file.
 *
 *@package Wp_medilab
 */
?>
<?php get_header(); ?>
<?php

$blogs_args = array(
  'post_type' => 'welcomebanner',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/welcome'); 
} 


  //welcome secction 
?>

<main id="main">
  <!-- ======= Why Us Section ======= -->
  <?php


$blogs_args = array(
  'post_type' => 'whyus',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/whyus');
} 


  ?>
  <!-- End Why Us Section -->

  <!-- ======= About Section ======= -->
  <?php

$blogs_args = array(
  'post_type' => 'about',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/about');
} 
  
  ?>
  <!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <?php

$blogs_args = array(
  'post_type' => 'count',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/counts');
} 

  
  ?>
  <!-- End Counts Section -->

  <!-- ======= Services Section ======= -->
  <?php

$blogs_args = array(
  'post_type' => 'service',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/services');
} 
  ?>
  <!-- End Services Section -->

  <!-- ======= Appointment Section ======= -->
  <?php


// $blogs_args = array(
//   'post_type' => 'appointment',
// );
// $blog_posts = new WP_Query($blogs_args);

// if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/appointments');
// }   
  ?>
  <!-- End Appointment Section -->

  <!-- ======= Departments Section ======= -->
  <?php


$blogs_args = array(
  'post_type' => 'department',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/departments');
}  
  ?>
  <!-- End Departments Section -->

  <!-- ======= Doctors Section ======= -->
  <?php

$blogs_args = array(
  'post_type' => 'docter',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/docter');
} 
  ?>
  <!-- End Doctors Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
  <?php


$blogs_args = array(
  'post_type' => 'question',
);
$blog_posts = new WP_Query($blogs_args);

if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/askquestion');
} 


  ?>
  <!-- End Frequently Asked Questions Section -->

  <!-- ======= Testimonials Section ======= -->
  <?php
   $blogs_args = array(
    'post_type' => 'testimonial',
 );
 $blog_posts = new WP_Query($blogs_args);

 if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/testimonials');
    
 } 
 
  ?>
  <!-- End Testimonials Section -->

  <!-- ======= Gallery Section ======= -->
  <?php
 $blogs_args = array(
    'post_type' => 'gallery',
 );
 $blog_posts = new WP_Query($blogs_args);

 if ($blog_posts->have_posts()) { 
       get_template_part('template-parts/frontPageSection/gallery');
    
 } 
 ?>


  
 
  <!-- End Gallery Section -->

  <!-- ======= Contact Section ======= -->
  <?php
   $blogs_args = array(
    'post_type' => 'contact',
 );
 $blog_posts = new WP_Query($blogs_args);

 if ($blog_posts->have_posts()) { 
  get_template_part('template-parts/frontPageSection/contact');
    
 } 
  
  ?>
  <!-- End Contact Section -->

</main><!-- End #main -->
<?php get_footer(); ?>