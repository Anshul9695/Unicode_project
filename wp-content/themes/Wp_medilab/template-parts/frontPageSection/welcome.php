 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
    <div class="container">
    <?php
         $blogs_args = array(
            'post_type' => 'welcomebanner',
            'posts_per_page' => 1,
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
      <h1><?php the_title();?></h1>
      <h2><?php the_excerpt();?></h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
      <?php }
         wp_reset_query(); ?>
    </div>
  </section><!-- End Hero -->
