
<footer>
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu' => 'footer-bar',
            'container_class' => 'footer-bar'
        ));
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>