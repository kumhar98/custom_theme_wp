<?php
get_header();

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
<?php

$the_query = new WP_Query(
    array(
        'post_type' => 'post',
    )
);
?>
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <div class="file">
        <a href="<?php the_permalink(); ?>" class="file-title" target="_blank">
            <i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo get_the_title(); ?>
        </a>
        <div class="file-description"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink()  ?>">Read More</a>
    </div>
<?php
endwhile;





get_footer();

?>