<!--
<html> 
    <body>
        <div class='container'>
        </div> end div class container from header.php -->

        <footer>
            <?php wp_nav_menu([
                'theme_location'    => 'footer-nav', 
                'container'         => false,
                'menu_class'        => 'navbar-nav mr-auto'
            ]); ?> 
        </footer>
        
        <?php wp_footer() ?>
    </body>
</html>