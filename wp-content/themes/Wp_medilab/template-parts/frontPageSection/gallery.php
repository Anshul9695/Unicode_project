<section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">
        <?php
         $blogs_args = array(
            'post_type' => 'gallery',
            'posts_per_page' => 8,
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <img class="img-fluid" src="<?php the_post_thumbnail()?>" />
            </div>
          </div>
          <?php }
         wp_reset_query(); ?>
        </div>

      </div>
    </section>