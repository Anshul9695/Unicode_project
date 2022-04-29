<?php
get_header();
?>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php the_title(); ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">By :<?php echo get_the_author_meta('display_name', $author_id);
                                                                        echo get_the_date('j F, Y'); ?></div>
                        </header>
                        <!-- Preview image figure-->
                        <img class="img-fluid rounded" src="<?php the_post_thumbnail(); ?>" />
                        <!-- Post content-->
                        <section class="mb-5">
                            <p><?php the_content() ?></p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                Comments:- <?php echo get_comments_number(); ?>
                                <?php comments_template('', true); ?>
                            </div>
                        </div>
                    </section>
                </div>
        <?php }
        } ?>
        <?php get_sidebar('main-sidebar') ?>
    </div>
</div>
<!-- Footer-->
<?php
get_footer();
?>