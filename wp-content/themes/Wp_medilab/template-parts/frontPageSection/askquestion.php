<section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
          <?php
         $blogs_args = array(
            'post_type' => 'question',
            'posts_per_page' => 4,
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1"><?php the_title();?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                <?php the_excerpt()?>
                </p>
              </div>
            </li>
            <?php }
         wp_reset_query(); ?>


          </ul>
        </div>

      </div>
    </section>