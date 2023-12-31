<?php 
    /* Template Name: Oferta de valor */
    get_header();
    $currentlang = get_bloginfo('language');
?>

	<!-- Incluir header interna -->
    <?php include get_template_directory() . '/includes/header-interna.php'; ?>
    <!-- /Incluir header interna -->

	<section class="titulos-no-italica pt-60 pb-30">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="titulo-verde mb-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800" data-aos-once="true"><?php esc_html_e( 'Así lo construimos', 'geg' ); ?></h1>
				</div>
			</div>
			<div class="row" data-aos="fade-right" data-aos-delay="900" data-aos-duration="800" data-aos-once="true">
				<div class="col">
					<!-- Slider main container -->
					<div class="swiper slider-oferta-de-valor">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
						<?php if( have_rows('slides') ): while( have_rows('slides') ): the_row(); ?>
							<?php if( get_sub_field('slide') ): ?>
							<div class="swiper-slide">
								<img src="<?php echo get_sub_field('slide'); ?>" alt="" class="img-fluid" loading="lazy">
								<div class="swiper-lazy-preloader"></div>
							</div>
							<?php endif; ?>
						<?php endwhile; endif; ?>
						</div>

						<!-- If we need navigation buttons -->
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="titulos-no-italica equipo pt-30 pb-60">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2><?php esc_html_e( 'Nuestro equipo', 'geg' ); ?></h2>
				</div>
			</div>
			<div class="row">
			<?php
				$current_post_id = get_the_ID(); // Get the current post ID

				$args = array(
					'post_type' => 'equipo',
					'posts_per_page' => -1,
					'post__not_in'   => array($current_post_id), // Exclude the current post
				);

				$the_query = new WP_Query( $args );
			?>
			<?php if ($the_query->have_posts()): $i = 6; while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="col-6 col-lg-3">
					<div class="card mb-3" data-aos="fade-right" data-aos-delay="<?php echo $i; ?>00" data-aos-duration="800" data-aos-once="true">
						<a 
							href="javascript:void(0)"
							data-bs-toggle="modal"
							data-bs-target="#modal"
							data-bs-titulo="<?php the_title(); ?>"
							data-bs-thumbnail-url="<?php echo get_the_post_thumbnail_url(get_the_ID(),'proceso'); ?>"
							data-bs-cv-pages="<?php if( have_rows('datos_del_integrante') ): while( have_rows('datos_del_integrante') ): the_row(); ?><?php if( have_rows('cv') ): while( have_rows('cv') ): the_row(); ?><?php if( get_sub_field('pagina') ): ?><?php echo get_sub_field('pagina'); ?><?php endif; ?><?php endwhile; endif; ?><?php endwhile; endif; ?>"
						>
							<?php the_post_thumbnail('integrante', array('class' => 'img-fluid')); ?>
							<div class="card-body">
								<div>
									<h5 class="card-title mb-0">
										<?php the_title(); ?>
									</h5>
								<?php if( have_rows('datos_del_integrante') ): while( have_rows('datos_del_integrante') ): the_row(); ?>
									<hr class="my-1">
									<?php if( get_sub_field('puesto') ): ?>
										<p class="mb-0 text-uppercase"><?php the_sub_field('puesto'); ?></p>
									<?php endif; ?>
								<?php endwhile; endif; ?>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php $i++; endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			</div>
			<?php edit_post_link(); // Always handy to have Edit Post Links available. ?>
		</div>
	</section>

<?php get_footer(); ?>