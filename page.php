<?php
get_header();
the_post();
?>
<section class="home_banner header_wrapper">
    <div class="container">
        <div class="header_middle">
            <h1 class="font_Playfair">
                Empower and motivate your team
            </h1>
            <p class="font_Lato">
                With our uniquely crafted speaking engagements
            </p>
            <div class="header_btn d_flex align justify">
                <a href="" class="font_gothic btn_get">Get in Touch</a>
                <a href="" class="font_gothic btn_watch d_flex align"> <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 14V0L11 7L0 14Z" />
                    </svg> Watch Now</a>
            </div>
        </div>
        <div class="header_bottom">
            <div class="swiper cardSlider">
                <div class="aap_logos swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/Microsoft_logo.png" alt="Microsoft_logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/turner.png" alt="turner">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/fox.png" alt="fox">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/sony.png" alt="sony">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/Microsoft_logo.png" alt="Microsoft_logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/Microsoft_logo.png" alt="Microsoft_logo">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/turner.png" alt="turner">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/fox.png" alt="fox">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/sony.png" alt="sony">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php bloginfo('template_directory') ?>/img/Microsoft_logo.png" alt="Microsoft_logo">
                    </div>

                </div>
                <!-- <div class="swiper-pagination my_pagination"></div> -->
            </div>
        </div>
    </div>
    </div>
</section>
<h1><?php the_title();  ?></h1>
<!-- featured image get code this function don't need to image tag-->
<?php 
the_post_thumbnail();
// $image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size, $icon)
/***<img src="<?php echo $image[0] ?>" alt="featured image"> ***/


?>
<!-- the_content(); the content don't use echo keyword
  get_the_content() get the content use echo keyword -->
  <!-- use the_post function don't work the content function 
  the_post function in top the header section -->
<?php 
  the_content();
?>
<?php
get_footer()
?>