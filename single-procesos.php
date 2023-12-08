<?php get_header(); ?>

	<!-- Incluir header interna -->
    <?php include get_template_directory() . '/includes/header-interna.php'; ?>
    <!-- /Incluir header interna -->

	<section class="pb-30">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h1 class="titulo-verde mb-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800" data-aos-once="true"><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row" data-aos="fade-right" data-aos-delay="900" data-aos-duration="800" data-aos-once="true">
				<div class="col">
				<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
					<div class="mt-4">
						<?php comments_template(); ?>
					</div>
					<?php edit_post_link(); // Always handy to have Edit Post Links available. ?>
				<?php endwhile; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'Lo sentimos, no hay nada que mostrar aquí.', 'geg' ); ?></p>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="pt-30 pb-60">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>Más procesos</h2>
					<!-- Slider main container -->
					<div class="swiper slider-procesos">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
						<?php 
							$args = array(
								'post_type' => 'procesos',
								'posts_per_page' => -1
							);

							$the_query = new WP_Query( $args );
						?>
						<?php if ($the_query->have_posts()): $i = 6; while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<div class="swiper-slide">
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

						<!-- If we need navigation buttons -->
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>