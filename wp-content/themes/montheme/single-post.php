<?php get_header() ?>

<?php if (have_posts()) : ?>

    <div class="row">

        <?php while (have_posts()) : the_post(); ?>
            <h1><?php the_title() ?></h1>
            <!-- method #1 WP origin <?php // the_post_thumbnail() ?> -->
            <!-- method #2 with html tag 'img' and CSS -->
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width: 150px; height=auto">
            <p><?php the_content() ?></p>
        <?php endwhile ?>

    </div>
    <!-- /end/div/class row -->

<?php else : ?>
    <!-- <h3>pas d'articles en cours</h3> -->
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif ?>

<?php get_footer() ?>