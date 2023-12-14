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

// Function to fetch processed content via AJAX
function fetchProcessedContent(shortcode) {
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://portal.grupogeg.com/wp-admin/admin-ajax.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(xhr.responseText);
            } else {
                reject(new Error('Failed to fetch processed content'));
            }
        };
        xhr.onerror = function () {
            reject(new Error('Network error occurred while fetching processed content'));
        };
        xhr.send('action=parse-media-shortcode&content=' + encodeURIComponent(shortcode));
    });
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

        // Fetch processed content via AJAX
        fetchProcessedContent(pdfViewerCode)
            .then(function (processedContent) {
                // Sanitize and set modal content
                modal.querySelector('.modal-title').innerText = title;
                modal.querySelector('.modal-cv').innerHTML = sanitizeHTML(processedContent);

                // Other modal content population logic goes here
            })
            .catch(function (error) {
                console.error('Error fetching processed content:', error);
            });
    });
});