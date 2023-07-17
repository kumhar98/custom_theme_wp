<?php 
// get_template_directory_uri();
// bloginfo('template_directory')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
          bloginfo('name');
          ?>
          <?php
           wp_title();
           ?>
           <?php
          if (is_front_page()) {
          echo" | ";  bloginfo('description');
           }
        ?>
    </title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <?php wp_head() ?>
</head>
<?php // body_class(); add this code in boby tag?>
<body <?php echo body_class(); ?>>
    <!-- header section  -->
    <header class="header_wrapper">
        <div class="container">
            <div class="nav_main d_flex align">
                <div class="logo">
                    <img src="<?php echo get_header_image()?>" alt="logo">
                </div>
                <div class="nav main_nav">
                <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'menu-inner d_flex justify  font_gothic',
                            'container' => 'ul',
                        ));
                        ?> 
                </div>
                <div class="main_right d_flex align">
                    <div class="align social_media_icon">
                        <img src="<?php bloginfo('template_directory')?>/img/01.png" alt="img" class="youtube">
                        <img src="<?php bloginfo('template_directory')?>/img/02.png" alt="img" class="insta">
                        <img src="<?php bloginfo('template_directory')?>/img/03.png" alt="img" class="facebook">
                        <img src="<?php bloginfo('template_directory')?>/img/04.png" alt="img" class="linkedin">
                    </div>
                    <div class="nav_right ">
                        <div class="social_media">

                        </div>
                        <div class="btn_main d_flex align">
                            <div class="icon_bag">
                                <img src="<?php bloginfo('template_directory')?>/img/bag.png" alt="">
                            </div>
                            <div class="btn_login">
                                <a href="#">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <span id="bar" class="" > jsw jlxw</span> -->
            <label for="check" class="mobile_menu_icon">
                <input type="checkbox" id="check" />
                <span></span>
                <span></span>
                <span></span>
            </label>
    </header>