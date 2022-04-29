<section id="services" class="services">
  <div class="container">

    <div class="section-title">
      <h2>Services</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">
    <?php
         $blogs_args = array(
            'post_type' => 'service',
            'posts_per_page' => 6,
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="icon-box">
          <div class="icon"><i class="fas fa-heartbeat"></i></div>
          <h4><a href=""><?php the_title(); ?></a></h4>
          <p><?php the_excerpt(); ?></p>
        </div>
      </div>
      <?php }
         wp_reset_query(); ?>

    </div>

  </div>
</section>