<?php
// global $section_id;
// $meal_section = get_post( $section_id );
    $philo_args = array(
        'post_type' => 'section',
        'meta_key' => 'all_sections',
        'meta_value' => 'banner',
        // 'posts_per_page' => 3,
    );
    // $acf_img = get_field('acf_image');
    // $img_src = wp_get_attachment_image_url($acf_img,'large');
    $philo_books = new WP_Query($philo_args);
    while($philo_books->have_posts()){
        $philo_books->the_post();
        ?>
        <div class="cover_1 overlay bg-slant-white bg-light">
        <div class="img_bg" style="background-image: url(<?php echo get_field('banner_image'); ?>);" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10" data-aos="fade-up">
                        <h2 class="heading mb-5"><?php the_title(); ?></h2>
                        <p class="sub-heading mb-5"><?php the_content(); ?> <a href="#">Free-Template.co</a>
                        </p>
                        <p><a href="<?php the_field('banner_url'); ?>" class="smoothscroll btn btn-outline-white px-5 py-3"><?php the_field('banner_button'); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .cover_1 -->
<?php
}
wp_reset_query(); // MUST Reset Query
?>