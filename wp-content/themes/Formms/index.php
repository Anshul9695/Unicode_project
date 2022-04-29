<?php /* Template Name: home */ ?>
<?php
get_header();
?>
<!-- slider section -->
<section class="slider_section ">
   <div class="slider_bg_box">
      <?php
      $blogs_args = array(
         'post_type' => 'banner',
         'posts_per_page' => 1
      );
      $blog_posts = new WP_Query($blogs_args);
      while ($blog_posts->have_posts()) {
         $blog_posts->the_post();
      ?>
         <!-- Start Blog item #1-->
         <img src="<?php the_post_thumbnail(); ?>" />
   </div>
   <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container ">
               <div class="row">
                  <div class="col-md-7 col-lg-6 ">
                     <div class="detail-box">
                        <h1>
                           <span>
                              <?php echo get_the_title(); ?>
                           </span>
                        </h1>
                        <p>
                           <?php the_excerpt(); ?>
                           <a href="<?php the_permalink(); ?>" class="btn btn-gray-border btn-danger">View in Details</a>
                        </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   <?php }
      wp_reset_query(); ?>
   </div>
</section>
<!-- end slider section -->
</div>
<!-- why section -->

<!-- end why section -->


<!-- end why section -->
<!-- Start blog-->
<section id="blog" class="section">
   <div class="container heading_container heading_center">
   <?php
         $blogs_args = array(
            'post_type' => 'post',
         );
         $blog_posts = new WP_Query($blogs_args);

         if ($blog_posts->have_posts()) { ?>
            <div class="row">
               <h2>
                  Our Latest<span>  Posts</span>
               </h2>
            </div>
         <?php } ?>
      <div class="row">
         <?php
         $blogs_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
         );
         $blog_posts = new WP_Query($blogs_args);
         while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
         ?>
            <!-- Start Blog item #1-->
            <div class="col-md-4">
               <div class="blog-post">
                  <div class="post-media">
                     <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                     </a>
                  </div>
                  <div class="post-desc">
                     <h4><?php the_title(); ?></h4>
                     <h5><?php echo get_the_author_meta('display_name', $author_id);
                           echo get_the_date('j F, Y'); ?></h5>
                     <h5>Comment:-<?php echo get_comments_number(); ?></h5>
                     <p><?php the_excerpt(); ?></p>
                     <a href="<?php the_permalink(); ?>" class="btn btn-gray-border btn-success">Read More</a>
                  </div>
               </div>
            </div>
         <?php }
         wp_reset_query(); ?>
      </div>
      <!--/.row-->
   </div>
   <!--/.container-->
</section>
<!-- End blog-->
<!-- arrival section -->
<!-- <section class="arrival_section">
   <div class="container">
      <div class="box">
         <div class="arrival_bg_box">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrival-bg.png" alt="">
         </div>
         <div class="row">
            <div class="col-md-6 ml-auto">
               <div class="heading_container remove_line_bt">
                  <h2>
                     #NewArrivals
                  </h2>
               </div>
               <p style="margin-top: 20px;margin-bottom: 30px;">
                  Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
               </p>
               <a href="<?php the_permalink(); ?>">
                  Shop Now
               </a>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!-- end arrival section -->

<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <?php
         $blogs_args = array(
            'post_type' => 'post',
         );
         $blog_posts = new WP_Query($blogs_args);

         if ($blog_posts->have_posts()) { ?>
            <div class="row">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
         <?php } ?>

      </div>
      <div class="container">
         <div class="row">
            <?php
            $blogs_args = array(
               'post_type' => 'product',
               'posts_per_page' => 12
            );
            $blog_posts = new WP_Query($blogs_args);
            while ($blog_posts->have_posts()) {
               $blog_posts->the_post();
            ?>
               <!-- Start Blog item #1-->
               <div class="col-md-4">
                  <div class="blog-post">
                     <div class="post-media">
                        <a href="<?php the_permalink(); ?>">
                           <?php the_post_thumbnail(); ?>
                        </a>
                     </div>
                     <div class="post-desc">
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-gray-border btn-danger">View</a>
                     </div>
                  </div>
               </div>
            <?php }
            wp_reset_query(); ?>
         </div>
      </div>
</section>
<!-- end product section -->

<?php
get_footer();
?>