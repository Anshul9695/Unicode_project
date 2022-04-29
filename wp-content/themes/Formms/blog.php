<?php /* Template Name: blog */ ?>
<?php get_header(); ?>
   <!-- Start blog-->
   <section id="blog" class="section">
       <div class="container">

          <?php 
           $blogs_args=array(
            'post_type'=>'post',
         );
         $blog_posts=new WP_Query($blogs_args);
          
          if($blog_posts->have_posts()){?>
            <div class="row">
          <h1 class="text-center">Letest Post</h1>
          </div>
          <?php }?>

           <div class="row">
              <?php
            $blogs_args=array(
               'post_type'=>'post',
               'posts_per_page'=> 3
            );
            $blog_posts=new WP_Query($blogs_args);
            while($blog_posts->have_posts()){
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
                           <h5><?php echo get_the_author_meta('display_name', $author_id); echo get_the_date( 'j F, Y' );?></h5>
                           <h5>Comment:-<?php echo get_comments_number();?></h5>
                           <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-gray-border btn-success">Read More</a>
                       </div>
                   </div>
               
               </div>
               <?php } ?>
      
               
           </div> <!--/.row-->
        
       </div> <!--/.container-->
   </section>
   <!-- End blog-->
<?php get_footer(); ?>