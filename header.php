<!DOCTYPE html>
<html lang="en">
<head>

    

    <meta charset="utf-8">
    <title>Solo Theme</title>

    <?php wp_head(); ?>

</head>
<body>

<header>
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'top-bar',
            'menu' => 'top-bar',
            'container_class' => 'top-bar'
        ));
        ?>
    </div>
</header>
    