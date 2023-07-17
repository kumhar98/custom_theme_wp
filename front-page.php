<?php
get_header();
the_post();

?>
<section class="home_banner header_wrapper">
    <div class="container">
        <div class="header_middle">
            <h1 class="font_Playfair">
                <?php the_field('test_new' ,'options')  ?>
            </h1>
            <p class="font_Lato">
                <?php the_field('content')  ?>
            </p>
            <div class="header_btn d_flex align justify">
                <?php
                $link = get_field('button');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="btn_get font_gothic" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
                <?php
                $watch_now = get_field('watch_now');
                if ($watch_now) :
                    $link_url = $watch_now['url'];
                    $link_title = $watch_now['title'];
                    $link_target = $watch_now['target'] ? $link['target'] : '_self';
                ?>
                    <a class="font_gothic btn_watch d_flex align" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 14V0L11 7L0 14Z" />
                        </svg>
                        <?php echo esc_html($link_title); ?>
                    </a>
                <?php endif; ?>
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
<!-- first section Home section  -->
<div class="main_div">
    <section class="section1">
        <div class="main_content">
            <div class="container">
                <div class=" d_flex align justify">
                    <div class="tagline">
                        <p class="font_Playfair">
                            <?php
                            echo the_field('contend1');
                            ?>
                        </p>
                        <h1 class="author"> <?php
                                            echo the_field('author_name');
                                            ?></h1>
                    </div>
                    <div class="paragraph ">
                        <p class="font_20 font_Poppins">
                            <?php
                            echo the_field('contend2');
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="help_main">
            <div class="container">
                <div class="help_top">
                    <span class="font_gothic font_22"><?php the_field('title') ?></span>
                    <h1 class="font_55 font_gothic"><?php the_field('sub_title') ?></h1>
                    <p class="font_20 font_gothic">
                        <?php
                        the_field('contend');
                        ?>
                    </p>

                    <a href="" class="font_gothic">Lear n More</a>

                </div>
                <div class="main_card d_flex">
                    <?php

                    // Check rows existexists.
                    if (have_rows('card_details')) {
                        while (have_rows('card_details')) {
                            the_row();
                    ?>
                            <div class="card " id="first">
                                <div class="icon">
                                    <img src="<?php the_sub_field('card_image') ?>" alt="">
                                    <img src="<?php the_sub_field('card_image_hover') ?>" alt="">
                                </div>

                                <h4 class="font_22 font_gothic"><?php the_sub_field('card_title') ?></h4>
                                <p class="font_gothic">
                                    <?php the_sub_field('card_contend') ?>
                                </p>
                                <?php
                                $read_btn =   get_sub_field('card_button');
                                if ($read_btn) {
                                    $link_url = $read_btn['url'];
                                    $link_title = $read_btn['title'];
                                    $link_target = $read_btn['target'] ? $link['target'] : '_self';

                                ?>
                                    <a class=" font_gothic" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>


                                    <!-- <a href="#">Read More</a> -->
                            </div>
                <?php
                                }
                            }
                        }
                ?>
                </div>
            </div>
        </div>
    </section>
    <section class="about_section">
        <div class="container">
            <div class="about_main d_flex align">
                <div class="about_img">
                    <img src="<?php bloginfo('template_directory') ?>/img/about.png" alt="about">
                    <div class="count">
                        <h2 class="font_gothic">3,600+</h2>
                        <span class="font_gothic font_20">Satisfied Clients</span>
                    </div>
                </div>
                <div class="about_content">
                    <span class="font_22 font_gothic">ABOUT US</span>
                    <h1 class="font_55 font_gothic"></h1>
                    <p class="font_20 font_gothic">
                        Our goal is simple, help others improve their mental health. <br> <br>
                        <span>
                            Think of your experience with us like a really great movie!
                        </span>
                        <br>
                        <br>
                        You won’t realize how much time has past, and you’ll be a little sad when it’s over.<br>
                        <br>
                        Our speaking engagements are made to empower, foster positivity & most importantly teach
                        others how to improve themselves.
                    </p>
                    <a href="" class="btn_about font_gothic">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <img src="<?php bloginfo('template_directory') ?>/img/Ellipse.svg" alt="Ellipse" class="ellipse">
</div>
<section class="what_our_section">
    <div class="container">
        <div class="what_our_main">
            <div class="top_content">
                <span class="font_22 font_gothic">What OUR</span>
                <h1 class="font_gothic">Happy clients are saying</h1>
            </div>
            <div class="img_main d_flex align">
                <div class="img_container">
                    <img src="<?php bloginfo('template_directory') ?>/img/img2.png" alt="img">
                </div>
                <div class="content">
                    <img src="<?php bloginfo('template_directory') ?>/img/quote-icon2.svg" alt="quote">
                    <p class="font_20 font_gothic">
                        Choice Forward is the best!!! They truly helped me move forward with a lot of my issues.
                    </p>
                    <h4 class=" name font_20 font_gothic">Jennifer Smith</h4>
                    <span class=" post font_20 font_gothic">Student</span>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="garden_marcus">
    <!-- Garden Marcus -->
    <section class="garden_marcus_section">
        <div class="container">
            <div class="row d_flex">
                <div class="col-1">
                    <h1 class="font_55 font_gothic">Garden Marcus</h1>
                    <p class="font_20 font_gothic">
                        It all began with some squirrels (yes squirrels)!
                        <br><br>
                        In 2016 Marcus and his wife Dana battled to keep their garden alive when a group of
                        squirrels
                        had other plans.
                        <br><br>
                        During this period Marcus discovered the countless parallels between plants and people. Both
                        have intricate systems and when one thing is thrown off balance, look out!
                        ​ <br><br>
                        In 2019, a friend suggested he take his thoughts and positivity to social media as "Garden
                        Marcus," the embodiment of the Choice Forward philosophy.
                        <br><br>
                        Through the eyes and voice of Garden Marcus we are able to utilize a fresh and modern
                        perspective to help motivate and keep others balanced.

                    </p>
                    <div class="brn_container">

                        <a href="#" class="font_gothic">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="img_container">
                        <img src="<?php bloginfo('template_directory') ?>/img/img3.png" alt="">
                        <div class="ellipse"></div>
                        <div class="square"></div>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php bloginfo('template_directory') ?>/img/Mask.png" alt="Mask" class="Mask">
    </section>
    <!-- Garden Marcus End -->
    <!--  Blog section  -->
    <section class="blog_section">
        <div class="container">
            <div class="blog_main">
                <div class="row d_flex">
                    <div class="col">
                        <span class="font_22 font_gothic">Blog</span>
                        <h1 class="font_gothic">What’s happening </h1>
                        <p class="font_gothic">Come and read the latest!</p>
                        <h4 class="font_gothic">Categories</h4>
                        <div class="right_icon d_flex align">
                            <img src="<?php bloginfo('template_directory') ?>/img/right_icon.svg" alt="">
                            <span class="font_20 font_gothic"> Balance</span>
                        </div>
                        <div class="right_icon d_flex align">
                            <img src="<?php bloginfo('template_directory') ?>/img/right_icon.svg" alt="">
                            <span class="font_20 font_gothic"> Life Changes</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card_img">
                            <img src="<?php bloginfo('template_directory') ?>/img/woman.png" alt="">
                        </div>
                        <div class="card_content">
                            <h3 class="font_gothic">Why we need to be motivated</h3>
                            <p class="font_20 font_gothic">This is a preview of how your blog post would look.</p>
                            <a href="" class="font_gothic">Read More</a>
                        </div>

                    </div>
                    <div class="col">
                        <div class="card_img">
                            <img src="<?php bloginfo('template_directory') ?>/img/woman1.png" alt="">
                        </div>
                        <div class="card_content">
                            <h3 class="font_gothic">5 ways to be happier right now</h3>
                            <p class="font_20 font_gothic">This is just an example.</p>
                            <a href="" class="font_gothic">Read More</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--  Blog section End -->
    <section class="grow_book_section">
        <div class="container">
            <div class="row d_flex">
                <div class="col">
                    <img src="<?php bloginfo('template_directory') ?>/img/book.png" alt="">
                </div>
                <div class="col">
                    <h1 class="font_gothic">
                        How to grow <br>
                        Nurture Your Garden, <br>Nurture Yourself</h1>
                    <p class="font_gothic">
                        New book COMING May 2023!
                    </p>
                    <span class="font_gothic font_20">New book COMING May 2023!</span>
                    <div class="input_container d_flex">
                        <input type="text" name="email" value="" class="inputeEmail font_gothic" placeholder="Email Address">
                        <input type="submit" value="submit" class="btn_submit font_gothic">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="as_seen_section">
        <div class="container">
            <div class="as_seen_main">
                <h1 class="font_gothic">As seen in</h1>
                <div class="row d_flex  justify">
                    <div class="col">
                        <img src="<?php bloginfo('template_directory') ?>/img/card1.png" alt="img">
                        <div class="card_content">
                            <img src="<?php bloginfo('template_directory') ?>/img/name_card.png" alt="img" class="name_image">
                            <a href="#" class="font_20 font_gothic">Meet Garden Marcus, the TikTok Plantfluencer
                                Brimming With Positivity</a>
                        </div>
                    </div>
                    <div class="col">
                        <img src="<?php bloginfo('template_directory') ?>/img/card1 (2).png" alt="img">
                        <div class="card_content">
                            <img src="<?php bloginfo('template_directory') ?>/img/card_name1.png" alt="img" class="name_image">
                            <a href="#" class="font_20 font_gothic">TikTok’s plant positivity guru has important
                                life lessons for you</a>
                        </div>
                    </div>
                    <div class="col">
                        <img src="<?php bloginfo('template_directory') ?>/img/card3.png" alt="img">
                        <div class="card_content">
                            <img src="<?php bloginfo('template_directory') ?>/img/card_name2.png" alt="img" class="name_image">
                            <a href="#" class="font_20 font_gothic">How Plants Can Help People Grow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="subscribe">
        <div class="container">
            <div class="subscribe_main">
                <div class="row d_flex align">
                    <div class="col">
                        <p class="font_22 font_gothic">keep up to date with advantage</p>
                        <h2 class="font_gothic">Subscribe to Our Newsletter</h2>
                    </div>
                    <div class="col">
                        <div class="input_container d_flex">
                            <input type="text" name="email" value="" class="inputeEmail font_gothic" placeholder="Email Address">
                            <input type="submit" value="submit" class="btn_submit font_gothic">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form_section">
        <form method="post" action="">
            <h1>Comment Form</h1>
            <label for="inputName">Name</label>
            <input type="text" id="inputName" name="name">
            <label for="inputName">lname</label>
            <input type="text" id="inputName" name="lname">
            <label for="inputName">comment</label>
            <input type="text" id="inputName" name="comment">
            <select name="categort" id="">
                <option value="category"> select your category </option>
                <?php
                $terms = get_terms([
                    'taxonomy' => 'locations',
                    'hide_empty' => false,
                ]);
                foreach ($terms as $key => $value) {
                ?>
                    <option value="<?php  echo $value->name?>"> <?php  echo $value->name?> </option>

                <?php } ?>
            </select>

            <input type="submit" value="save" name="btn_submit">
            <!-- <button type="submit" name="btn_submit">save</button> -->
        </form>
    </section>
    <!-- get all categories this function -->
    <?php
    $cat =  get_categories(['taxonomy' => 'category']);
    foreach ($cat as $key => $value) {
    ?>
        <a href="<?php echo get_category_link($value->term_id);  ?>"><?php echo  $value->name; ?></a>
    <?php
    }
    ?>

    <!-- get custom post wp query check below -->
    <?php
    $arr = [
        'post_type' => 'movies',
        'post_status' => 'publish'
    ];
    $result  = new WP_Query($arr);

    while ($result->have_posts()) {
        $result->the_post();
    ?>
        <h1><?php the_title() ?></h1>
    <?php
    }
    ?>
    <!-- get custom category  check below -->
    <?php
    // $newcat = get_term([
    //     'taxonomy' => 'location',
    //     'hide_empty' => false,
    //     'orderby' => 'name',
    //     'order' => 'ASD',
    //     'number' => 1
    // ]);
    $categories = get_terms([
        'taxonomy' => 'locations',
        'hide_empty' => false,
        //     'orderby' => 'name',
        //     'order' => 'ASD',
        //     'number' => 1,
        'parent' => 0 // use  this key and shoe only parent category
    ]);

    foreach ($categories as $key => $value) {
        
        ?>
        <a href="<?php echo get_term_link($value->term_id)  ?>">
            <p><?php echo $value->name ?></p>
            <img src="<?php echo get_term_meta($value->term_id, 'term_image', true) ?>" alt="img">
        </a>
        <?php
        $args = [
            'post_type' => 'movies',
            'post_status' => 'publish',
            // 'posts_per_page' => 8, 
            // 'orderby’ => 'title', 
            // 'order’ => 'ASC',
            'tax_query' => [[
                'taxonomy' => 'locations',
                'terms' => $value->term_id,
                'field' => 'term_id'
            ]]
        ];
        $cate = new WP_Query($args);
        while ($cate->have_posts()) {
            $cate->the_post();
            echo the_title();
        }
        ?>
    <?php  }
    ?><?php 
$args = array(
    'post_type' => 'movies'
);

$post_query = new WP_Query($args);

if ($post_query->have_posts()) {
    while ($post_query->have_posts()) {
        $post_query->the_post();
        ?>
        <h2><?php the_title(); ?></h2>
        <?php
        $m_meta_description = get_post_meta(get_the_ID(), 'custom_meta_field', true);
        echo 'meta box value: ' . $m_meta_description;
        ?>
        <h1><?php echo $m_meta_description ?></h1>
        <?php
    }
}?>
    <?php get_footer(); ?>