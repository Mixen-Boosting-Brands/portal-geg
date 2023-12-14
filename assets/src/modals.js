const modal = document.getElementById('modal');

if (modal) {
    modal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget;

        // Extract info from data-bs-* attributes
        const titulo = button.getAttribute('data-bs-titulo');
        const cvPages = button.getAttribute('data-bs-cv-pages').split('https://portal.grupogeg.com');

        // Remove the first empty string element
        cvPages.shift();

        // Update the modal's content.
        const modalTitulo = modal.querySelector('.modal-title');
        const modalCV = modal.querySelector('.modal-cv-pages');

        // Build the Swiper slider content
        let sliderContent = `
            <!-- Slider main container -->
            <div class="swiper slider-cv">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">`;

        cvPages.forEach(imageUrl => {
            sliderContent += `
                    <div class="swiper-slide">
                        <img src="${imageUrl}" alt="" class="img-fluid">
                    </div>`;
        });

        sliderContent += `
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>`;

        // Set modal title
        modalTitulo.textContent = `${titulo}`;

        // Inject the slider content into modalCV
        modalCV.innerHTML = sliderContent;

        // Initialize Swiper
        const mySwiper = new Swiper('.modal-cv .swiper', {
            // Swiper options (customize as needed)
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
}