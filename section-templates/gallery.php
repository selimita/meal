<?php
/* global $section_id;
$meal_section             = get_post( $section_id );
$meal_section_title       = $meal_section->post_title;
$meal_section_description = $meal_section->post_content; */

$philo_args = array(
    'post_type' => 'section',
    'meta_key' => 'all_sections',
    'meta_value' => 'reservation',
    // 'posts_per_page' => 3,
);
// $acf_img = get_field('acf_image');
// $img_src = wp_get_attachment_image_url($acf_img,'large');
$philo_books = new WP_Query($philo_args);
// while($philo_books->have_posts()){
    $philo_books->the_post();
    ?>
<div class="section bg-light" data-aos="fade-up" id="section-reservation">
	<div class="container">
		<div class="row section-heading justify-content-center mb-5">
			<div class="col-md-8 text-center">
				<h2 class="heading mb-5">
                <?php the_title(); ?>
				</h2>
				<?php
				// echo apply_filters( 'the_content', $meal_section_description );
				?>
                <?php the_content(); ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10 p-5 form-wrap">
				<form action="#">
					<?php
					wp_nonce_field('reservation','rn');
					?>
					<div class="row mb-4">
						<div class="form-group col-md-4">
							<label for="name" class="label">Name</label>
							<div class="form-field-icon-wrap">
								<span class="icon ion-android-person"></span>
								<input type="text" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="email" class="label">Email</label>
							<div class="form-field-icon-wrap">
								<span class="icon ion-email"></span>
								<input type="email" class="form-control" id="email">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="phone" class="label">Phone</label>
							<div class="form-field-icon-wrap">
								<span class="icon ion-android-call"></span>
								<input type="text" class="form-control" id="phone">
							</div>
						</div>

						<div class="form-group col-md-4">
							<label for="persons" class="label">Number of Persons</label>
							<div class="form-field-icon-wrap">
								<span class="icon ion-android-arrow-dropdown"></span>
								<select name="persons" id="persons" class="form-control">
									<option value="1">1 person</option>
									<option value="2">2 persons</option>
									<option value="3">3 persons</option>
									<option value="4">4 persons</option>
									<option value="5">5+ persons</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="date" class="label">Date</label>
							<div class="form-field-icon-wrap">
								<span class="icon ion-calendar"></span>
								<input type="text" class="form-control" id="date">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="time" class="label">Time</label>
							<div class="form-field-icon-wrap">
								<span class="icon ion-android-time"></span>
								<input type="text" class="form-control" id="time">
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-4">
							<input type="submit" id="reservenow" class="btn btn-primary btn-outline-primary btn-block"
							       value="Reserve Now">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> <!-- .section -->
<?php
// }
wp_reset_query(); // MUST Reset Query
?>