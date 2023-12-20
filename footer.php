<?php 
    $currentlang = get_bloginfo('language');
    if( !is_home() ):
?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="<?php echo esc_url( home_url() ); ?>">
                        <figure>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png" alt="" class="logo img-fluid" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="200" data-aos-once="true">
                        </figure>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400" data-aos-once="true">
                <?php if( have_rows('datos_de_contacto', 'option') ): while( have_rows('datos_de_contacto', 'option') ): the_row(); ?>
                    <h3><?php esc_html_e( 'Dirección', 'geg' ); ?></h3>
                    <address>
                        <p>
                            <?php the_sub_field('direccion'); ?>
                        </p>
                    </address>
                    <h3><?php esc_html_e( 'Contacto Corporativo', 'geg' ); ?></h3>
                    <?php if( have_rows('telefono_1') ): while( have_rows('telefono_1') ): the_row(); ?><a href="tel:+52<?php the_sub_field('telefono_sin_formato'); ?>"><?php the_sub_field('telefono_con_formato'); ?></a><?php endwhile; endif; ?> <?php esc_html_e( 'y', 'geg' ); ?> <?php if( have_rows('telefono_2') ): while( have_rows('telefono_2') ): the_row(); ?><a href="tel:+52<?php the_sub_field('telefono_sin_formato'); ?>"><?php the_sub_field('telefono_con_formato'); ?></a><?php endwhile; endif; ?>
                <?php endwhile; endif; ?>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="600" data-aos-once="true">
                    <h3 class="mt-3 mt-lg-0"><?php esc_html_e( 'Navegación', 'geg' ); ?></h3>
                    <nav>
                        <ul class="list-unstyled">
                        <?php if ( $currentlang == "en-US" ): ?>
                            <li>
                                <a href="<?php echo get_page_link('21'); ?>"><?php echo get_the_title('21'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo get_page_link('25'); ?>"><?php echo get_the_title('357'); ?></a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo get_page_link('2'); ?>"><?php echo get_the_title('2'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo get_page_link('23'); ?>"><?php echo get_the_title('23'); ?></a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="800" data-aos-once="true">
                    <h3 class="mt-3 mt-lg-0"><?php esc_html_e( 'Página web', 'geg' ); ?></h3>
                    <nav>
                        <ul class="list-unstyled">
                            <li>
                            <?php if ( $currentlang == "en-US" ): ?>
                                <a href="https://grupogeg.com/en/" class="btn btn-primary"><?php esc_html_e( 'Ingresar', 'geg' ); ?></a>
                            <?php else: ?>
                                <a href="https://grupogeg.com/" class="btn btn-primary"><?php esc_html_e( 'Ingresar', 'geg' ); ?></a>
                            <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
            <?php if( have_rows('datos_de_contacto', 'option') ): while( have_rows('datos_de_contacto', 'option') ): the_row(); ?>
                <?php if( have_rows('redes_sociales') ): while( have_rows('redes_sociales') ): the_row(); ?>
                    <ul class="social list-inline mt-4">
                    <?php if( get_sub_field('linkedin') ): ?>
                        <li class="list-inline-item">
                            <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_sub_field('youtube') ): ?>
                        <li class="list-inline-item">
                            <a href="<?php the_sub_field('youtube'); ?>" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_sub_field('facebook') ): ?>
                        <li class="list-inline-item">
                            <a href="<?php the_sub_field('facebook'); ?>" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_sub_field('instagram') ): ?>
                        <li class="list-inline-item">
                            <a href="<?php the_sub_field('instagram'); ?>" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_sub_field('twitter') ): ?>
                        <li class="list-inline-item">
                            <a href="<?php the_sub_field('twitter'); ?>" target="_blank">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_sub_field('tiktok') ): ?>
                        <li class="list-inline-item">
                            <a href="<?php the_sub_field('tiktok'); ?>" target="_blank">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
                <?php endwhile; endif; ?>
            <?php endwhile; endif; ?>
                    <ul class="social list-inline mt-2">
                        <li class="list-inline-item">
                            <a href="https://open.spotify.com/show/3ywoYPFOUJYmZE8OAjHDhs" target="_blank">
                                <i class="fa-brands fa-spotify"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://music.amazon.com.mx/podcasts/65abd1cc-d794-45c2-9abb-a9560cbc2619/global-engineering-group" target="_blank">
                                <i class="fa-brands fa-amazon"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://podcasts.apple.com/mx/podcast/global-engineering-group/id1670720372" target="_blank">
                                <i class="fa-solid fa-podcast"></i>
                            </a>
                        </li>
                        <li class="list-inline-item" style="position: relative; top: 5px;">
                            <a href="https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9kOGIyM2I4NC9wb2RjYXN0L3Jzcw?sa=X&ved=0CAMQ4aUDahcKEwiYkovC7vz9AhUAAAAAHQAAAAAQAQ" target="_blank">
                                <img class="img-fluid" src="https://img.icons8.com/ios-filled/50/000000/google-podcasts.png" alt="" />
                            </a>
                        </li>   
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col text-end mt-4">
                    <?php if ( $currentlang == "en-US" ): ?><a href="https://grupogeg.com/en/privacy-policy/"><?php esc_html_e( 'Aviso de Privacidad', 'geg' ); ?></a><?php else: ?><a href="https://grupogeg.com/aviso-de-privacidad/"><?php esc_html_e( 'Aviso de Privacidad', 'geg' ); ?></a><?php endif; ?> | &copy;  <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Todos los derechos reservados.', 'geg' ); ?><br><?php esc_html_e( 'Hecho con', 'geg' ); ?> <i class="fa-solid fa-heart"></i> <?php esc_html_e( 'por', 'geg' ); ?> <a href="https://mixen.mx" target="_blank">Mixen</a>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

    <!-- Modales -->
    <div class="modal modal-cv fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <span class="modal-cv-pages"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php wp_footer(); ?>

    <!-- a href="https://wa.me/52614?text=Hola%20FOO%20BAR,%20necesito%20información." class="whatsapp" target="_blank"><i class="fab fa-whatsapp whatsapp-icon"></i></a -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/app.bundle.js?ver=<?php echo rand(111,999)?>"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P4JDSD90KY"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-P4JDSD90KY');
    </script>
</body>
</html>
