import DOMPurify from 'dompurify';

// Function to sanitize HTML content using DOMPurify
function sanitizeHTML(html) {
    return DOMPurify.sanitize(html);
}

// Function to generate PDF viewer dynamically
function generatePDFViewer(shortcodeId) {
    // Customize this based on your plugin's requirements
    var viewerCode = '[dflip id="' + shortcodeId + '"][/dflip]';
    // Add any additional logic or customization if needed
    return viewerCode;
}

// Event listener for modal trigger button
document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function (button) {
    button.addEventListener('click', function () {
        // Get the modal element
        var modal = document.querySelector(button.getAttribute('data-bs-target'));

        // Get data attributes
        var title = button.getAttribute('data-bs-titulo');
        var thumbnailUrl = button.getAttribute('data-bs-thumbnail-url');
        var shortcodeId = button.getAttribute('data-bs-cv-id');

        // Generate PDF viewer dynamically
        var pdfViewerCode = generatePDFViewer(shortcodeId);

        // Sanitize and set modal content
        modal.querySelector('.modal-title').innerText = title;
        modal.querySelector('.modal-cv').innerHTML = sanitizeHTML(pdfViewerCode);

        // Manually trigger WordPress shortcode processing
        // You may need to adjust the URL based on your WordPress setup
        fetch('https://portal.grupogeg.com/wp-admin/admin-ajax.php?action=process_shortcode')
          .then(response => response.text())
          .then(() => {
            // Other modal content population logic goes here
          })
          .catch(error => console.error('Error processing shortcode:', error));
    });
});