<?php 
    /* Template Name: Portada */
    get_header();
    $currentlang = get_bloginfo('language');
?>

	<!-- Incluir header interna -->
    <?php include get_template_directory() . '/includes/header-interna.php'; ?>
    <!-- /Incluir header interna -->

	<section class="py-60">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="titulo-verde mb-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800" data-aos-once="true"><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
			<?php 
				$args = array(
					'post_type' => 'procesos',
					'posts_per_page' => -1
				);

				$the_query = new WP_Query( $args );
			?>
			<?php if ($the_query->have_posts()): $i = 6; while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="col-lg-3">
					<div class="card mb-3" data-aos="fade-right" data-aos-delay="<?php echo $i; ?>00" data-aos-duration="800" data-aos-once="true">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('proceso', array('class' => 'img-fluid')); ?>
							<div class="card-body">
								<h5 class="card-title mb-0">
									<?php the_title(); ?>
								</h5>
							</div>
						</a>
					</div>
				</div>
			<?php $i++; endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>