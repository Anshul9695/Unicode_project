<section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
        <?php
         $blogs_args = array(
            'post_type' => 'docter',
            'posts_per_page' => 4,
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img  class="img-fluid" src="<?php the_post_thumbnail()?>"></div>
              <div class="member-info">
                <h4><?php the_title();?></h4>
                <p><?php the_excerpt(); ?></p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <?php }
         wp_reset_query(); ?>
        </div>

      </div>
    </section>