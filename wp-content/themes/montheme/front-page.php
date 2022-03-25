<!--
    set front-page in http://localhost/WP_Grafikart/wp-admin/options-reading.php
    we define the home page and the blog 
-->
<?php get_header() ?>

    <?php while (have_posts()) : the_post(); ?>
        <h5><?php the_title(); ?></h5>
        <?php the_content(); ?>
        <a href="<?= get_post_type_archive_link('post') ?>">Voir les dernières actualités</a>
    <?php endwhile ?>

<?php get_footer() ?>