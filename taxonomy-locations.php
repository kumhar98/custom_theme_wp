<?php 
 get_header();
?>
<?php
$catData = get_queried_object();
echo  $catData->name;
  $args = [
            'post_type' => 'movies',
            'post_status' => 'publish',
            // 'posts_per_page' => 8, 
            // 'orderby’ => 'title', 
            // 'order’ => 'ASC',
    'tax_query'=>[[
        'taxonomy' => 'locations',
        'terms' => $catData->term_id,
        'field' => 'term_id'
    ]
]
    ];
  $result = new WP_Query($args);

  while ($result->have_posts()) {
    $result->the_post();
         the_title();
         the_content();
  }
?>
<?php
 get_footer();
?>