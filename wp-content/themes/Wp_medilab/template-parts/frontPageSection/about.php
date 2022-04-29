<section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
        <?php
         $blogs_args = array(
            'post_type' => 'about',
            'posts_per_page' => 1,
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3><?php the_title();?></h3>
            <p><?php the_excerpt()?></p>
          </div>
          <?php }
         wp_reset_query(); ?>

        </div>

      </div>
    </section>