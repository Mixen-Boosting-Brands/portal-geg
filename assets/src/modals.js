import DOMPurify from 'dompurify';

// Function to sanitize HTML content using DOMPurify
function sanitizeHTML(html) {
    return DOMPurify.sanitize(html);
}

// Event listener for modal trigger button
document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function (button) {
    button.addEventListener('click', function () {
        // Get the modal element
        var modal = document.querySelector(button.getAttribute('data-bs-target'));

        // Get data attributes
        var title = button.getAttribute('data-bs-titulo');
        var thumbnailUrl = button.getAttribute('data-bs-thumbnail-url');
        var cv = button.getAttribute('data-bs-cv');

        // Encode the entire data-bs-cv attribute value
        cv = encodeURIComponent(cv);

        // Sanitize and set modal content
        modal.querySelector('.modal-title').innerText = title;
        modal.querySelector('.modal-cv').innerHTML = sanitizeHTML(decodeURIComponent(cv));

        // Other modal content population logic goes here
    });
});