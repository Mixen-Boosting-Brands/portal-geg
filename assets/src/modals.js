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

var ajaxurl = 'https://portal.grupogeg.com/wp-admin/admin-ajax.php';

// Function to fetch nonce via AJAX
function fetchNonce() {
    return new Promise(function (resolve, reject) {
        var nonceRequest = new XMLHttpRequest();
        nonceRequest.open('GET', ajaxurl + '?action=get_nonce', true);
        nonceRequest.onreadystatechange = function () {
            if (nonceRequest.readyState === 4) {
                if (nonceRequest.status === 200) {
                    var response = JSON.parse(nonceRequest.responseText);
                    if (response.success && response.data && response.data.nonce) {
                        resolve(response.data.nonce);
                    } else {
                        reject(new Error('Invalid nonce response'));
                    }
                } else {
                    reject(new Error('Failed to fetch nonce'));
                }
            }
        };
        nonceRequest.send();
    });
}

// Function to fetch processed content via AJAX
function fetchProcessedContent(nonce, shortcode) {
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

        // Include the nonce in the data
        var data = 'action=parse-media-shortcode&security=' + encodeURIComponent(nonce) + '&content=' + encodeURIComponent(shortcode);
        xhr.send(data);
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

        // Fetch nonce and processed content via AJAX
        fetchNonce()
            .then(function (nonce) {
                // Use the obtained nonce in your actual AJAX request
                makeAjaxRequest(nonce, pdfViewerCode);
            })
            .catch(function (error) {
                console.error('Error fetching nonce:', error);
            });
    });
});